<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Modelos
use App\Convocatorias;

class ConvocatoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $convocatorias = Convocatorias::paginate(10);
        return view('convocatorias.index', compact('convocatorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        return view('convocatorias.create',compact('programas','cursos','cat'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $convocatoria = new Convocatorias;
            $convocatoria->descripcion = $request->descripcion;
            $convocatoria->fecha_inicio = $request->fecha_inicio;
            $convocatoria->fecha_finalizacion = $request->fecha_finalizacion;
            $convocatoria->activa =  $request->activa;        
        $convocatoria->save();

        return redirect()->route('convocatorias.edit', $convocatoria->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $convocatoria = Convocatorias::find($id);
        return view('convocatorias.show', compact('convocatoria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $convocatoria = Convocatorias::find($id);
        return view('convocatorias.edit',compact('convocatoria'));
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
        $convocatoria = Convocatorias::find($id);
            $convocatoria->descripcion = $request->descripcion;
            $convocatoria->fecha_inicio = $request->fecha_inicio;
            $convocatoria->fecha_finalizacion = $request->fecha_finalizacion;
            $convocatoria->activa = $request->activa;
        $convocatoria->save();

        return redirect()->route('convocatorias.edit', $convocatoria->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Convocatoria = Convocatorias::find($id);
        $Convocatoria->delete();
        return back();
    }
}
