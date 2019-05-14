<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Modelos
use App\Convocatorias;
use App\DetalleConvocatorias;
use App\AplicantesConvocatorias;
use App\EvaluacionesAspirantes;

//Request
use App\Http\Requests\ConvocatoriaRequest;

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
        return view('convocatorias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ConvocatoriaRequest $request)
    {
        $convocatoria = new Convocatorias;
            $convocatoria->descripcion = $request->descripcion;
            $convocatoria->fecha_inicio = $request->fecha_inicio;
            $convocatoria->fecha_finalizacion = $request->fecha_finalizacion;
            $convocatoria->activa =  $request->activa;        
        $convocatoria->save();

        return redirect()->route('convocatorias.index')->with('info','Se ha creado correctamente la convocatoria');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Convocatoria = Convocatorias::with('detalleConvocatoria.aplicantes.usuario.detail.tipoDocumento','detalleConvocatoria.curso.programa')
            ->where('id',$id)
            ->get();

        return view('convocatorias.show', compact('Convocatoria'));
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
    public function update(ConvocatoriaRequest $request, $id)
    {
        $convocatoria = Convocatorias::find($id);
            $convocatoria->descripcion = $request->descripcion;
            $convocatoria->fecha_inicio = $request->fecha_inicio;
            $convocatoria->fecha_finalizacion = $request->fecha_finalizacion;
            $convocatoria->activa = $request->activa;
        $convocatoria->save();

        return redirect()->route('convocatorias.index')->with('info','Se han actualizado correctamente los datos de la convocatoria');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function reportOne($id)
    {
        $convocatoria = Convocatorias::find($id);
        $detalleConvocatoria = DetalleConvocatorias::with('convocatoria','cat','programa','curso')
            ->where('convocatoria_id',$id)
            ->get();
        return view('convocatorias.report.one', compact('convocatoria','detalleConvocatoria'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function reportTwo($id)
    {
     $AplicacionesAspirante = AplicantesConvocatorias::whereHas('detalleConvocatoria', function ($query) use($id){
            $query->where('convocatoria_id', $id);
        })
        ->with('detalleConvocatoria.curso.programa',
        'detalleConvocatoria.curso.programa',
        'detalleConvocatoria.cat',
        'usuario.detail',
        'evaluacion')
        ->get();
    //dd($AplicacionesAspirante);
    return view('convocatorias.report.two', compact('AplicacionesAspirante'));    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function reportThree($id)
    {
       $AplicacionesAspirante = AplicantesConvocatorias::whereHas('detalleConvocatoria', function ($query) use($id){
            $query->where('convocatoria_id', $id);
        })
        ->with('detalleConvocatoria.curso.programa',
        'detalleConvocatoria.curso.programa',
        'detalleConvocatoria.cat',
        'usuario.detail',
        'evaluacion')
        ->get();
        //dd($AplicacionesAspirante);
        return view('convocatorias.report.three', compact('AplicacionesAspirante'));    
    }
}
