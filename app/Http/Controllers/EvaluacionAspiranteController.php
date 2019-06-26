<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Models
use App\EvaluacionesAspirantes;

class EvaluacionAspiranteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $evaluacionesAspirantes = EvaluacionesAspirantes::with([
            'aplicante.usuario.detail.tipoDocumento',
            'aplicante.detalleConvocatoria.curso.programa'])
            ->whereHas('aplicante.detalleConvocatoria', function($query) use ($id){
                $query->where('convocatoria_id', '=', $id);
            })
            ->get();

        return view('evaluacionesAspirantes.index', compact('evaluacionesAspirantes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $evaluacionAspirante = EvaluacionesAspirantes::with(['aplicante.usuario.detail.tipoDocumento'])->find($id);
        return view('evaluacionesAspirantes.show',compact('evaluacionAspirante'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $id_convocatoria)
    {
        $evaluacionAspirante = EvaluacionesAspirantes::with(['aplicante.usuario.detail.tipoDocumento'])->find($id);
        //dd($evaluacionAspirante);
        return view('evaluacionesAspirantes.edit',compact('evaluacionAspirante','id_convocatoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $id_convocatoria)
    {
        $evaluacionAspirante = EvaluacionesAspirantes::find($id);
            $evaluacionAspirante->ensayo = $request->ensayo;
            $evaluacionAspirante->prueba_conocimiento = $request->prueba_conocimiento;
        $evaluacionAspirante->save();

        return redirect()->route('evaluacionesAspirantes.index',$id_convocatoria)->with('info','Se ha actualizado correctamente los datos de la evaluación');
    }
}
