<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cat;
use App\Departamentos;
use App\Municipios;

class CatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cats = Cat::with(['departamento','municipio'])->paginate(10);
        return view('cats.index', compact('cats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departamentos = Departamentos::get();
        $departamento_id = $departamentos->first()->id;
        $departamentos = $departamentos->pluck('nombre', 'id');
        $municipios = Municipios::where('departamento_id', $departamento_id)->get()->pluck('nombre', 'id');

        return view('cats.create',compact('departamentos','municipios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cat = Cat::create([
            'nombre' => $request->nombre,
            'direccion' => $request->direccion,
            'email' => $request->email,
            'departamento_id' => $request->departamento_id,
            'municipio_id' => $request->municipio_id,
            'activo' => $request->activo,
        ]);
        return redirect()->route('cats.edit', $cat->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cat = Cat::with(['departamento','municipio'])->find($id);
        return view('cats.show', compact('cat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cat = Cat::find($id);
        $departamentos = Departamentos::get();
        $municipios = Municipios::where('departamento_id', $cat->departamento_id)->get();

        $departamentos = $departamentos->pluck('nombre', 'id');
        $municipios = $municipios->pluck('nombre', 'id');

        return view('cats.edit',compact('cat','departamentos','municipios'));
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
         $cat = Cat::find($id);
            $cat->nombre = $request->nombre;
            $cat->direccion = $request->direccion;
            $cat->email = $request->email;
            $cat->departamento_id = $request->departamento_id;
            $cat->municipio_id = $request->municipio_id;
            $cat->activo = $request->activo;
        $cat->save();

        return redirect()->route('cats.edit', $cat->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat = Cat::find($id);
        $cat->delete();
        return back();
    }
}
