<?php

namespace App\Http\Controllers;

use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use Caffeinated\Shinobi\Models\Role;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Support\Facades\Hash;

//Model
use App\Tipos_Documento;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('detail')->paginate();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::get();
        $documentos = Tipos_Documento::where('activo', 1)->get()->pluck('descripcion', 'id');
        return view('users.create',compact('roles','documentos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->detail()->create([
            'user_id' => $user->id,
            'tipo_documento_id'  => $request->detail['tipo_documento_id'],
            'numero_documento'   => $request->detail['numero_documento'],
            'primer_nombre'      => $request->detail['primer_nombre'],
            'segundo_nombre'     => $request->detail['segundo_nombre'],
            'primer_apellido'    => $request->detail['primer_apellido'],
            'segundo_apellido'   => $request->detail['segundo_apellido']
        ]);

        //Si el nombre es default, se asigna el rol de aspirantes (rol 2 por defecto en el sistema)
        if($request->name=='default'){
            //Asignacion del permiso al usuario
            DB::table('role_user')->insert([
                'role_id' => '2',   
                'user_id' => $user->id,
            ]);
            //redirecciono al login;
            return redirect()->route('login');        
        }

        return redirect()->route('users.edit', $user->id)
            ->with('info', 'Usuario registrado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::with('detail')->find($id);
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::with('detail')->find($id);
        $documentos = Tipos_Documento::where('activo', 1)->get()->pluck('descripcion', 'id');
        $roles = Role::get();
        return view('users.edit',compact('user', 'roles','documentos') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $user = User::with('detail')->find($id);
            $user->name = $request->name;
            $user->email    = $request->email;
            $user->password = bcrypt($request->password);
        $user->save();

        $user->detail->update([
            'tipo_documento_id'  => $request->detail['tipo_documento_id'],
            'numero_documento'   => $request->detail['numero_documento'],
            'primer_nombre'      => $request->detail['primer_nombre'],
            'segundo_nombre'     => $request->detail['segundo_nombre'],
            'primer_apellido'    => $request->detail['primer_apellido'],
            'segundo_apellido'   =>  $request->detail['segundo_apellido']
        ]);


        $user->roles()->sync($request->get('roles'));
        return redirect()->route('users.edit', $user->id)
            ->with('info', 'Usuario guardado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::with('detail')->find($id);
        $user->detail()->delete();
        $user->delete();
        return back()->with('info', 'Eliminado correctamente');
    }

    public function createExternal()
    {
        $documentos = Tipos_Documento::where('activo', 1)->get()->pluck('descripcion', 'id');
        return view('users.create',compact('documentos'));
    }
}
