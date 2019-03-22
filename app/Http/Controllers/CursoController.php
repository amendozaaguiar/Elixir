<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cursos;
use App\Programas;

//Request
use App\Http\Requests\CursoRequest;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cursos = Cursos::with('programa')->paginate(10);
        return view('cursos.index', compact('cursos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $programas = Programas::where('activo', 1)->get();
        $programas= $programas->pluck('nombre', 'id');
        return view('cursos.create', compact('programas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CursoRequest $request)
    {
        $curso = Cursos::create([
            'programa_id' => $request->programa_id,
            'nombre' => $request->nombre,
            'perfil' => $request->perfil,
            'activo' => $request->activo,
        ]);
        return redirect()->route('cursos.index')->with('info', 'Se ha creado correctamente el curso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $curso = Cursos::with('programa')->find($id);
        return view('cursos.show',compact('curso'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $curso = Cursos::find($id);
        $programas = Programas::where('activo', 1)->get();
        $programas= $programas->pluck('nombre', 'id');
        return view('cursos.edit',compact('curso','programas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CursoRequest $request, $id)
    {
        $curso = Cursos::find($id);
            $curso->programa_id = $request->programa_id;
            $curso->nombre = $request->nombre;
            $curso->perfil = $request->perfil;
            $curso->activo = $request->activo;
        $curso->save();

        return redirect()->route('cursos.index')->with('info', 'Se han actualizado correctamente los datos del curso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $curso = Cursos::find($id);
        $curso->delete();
        
        return back()->with('info','Se ha eliminado correctamente el curso');
    }

    /**
     * Muestra los Cursos de acuerdo al programa enviado
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getCursos($id)
    {
        $cursos =  Cursos::where('programa_id', $id)->pluck('nombre', 'id');
        return json_encode($cursos);
    }
}
