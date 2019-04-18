<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Modelos
use App\Cat;
use App\Programas;
use App\Cursos;
use App\Convocatorias;
use App\DetalleConvocatorias;

//Request
use App\Http\Requests\DetalleConvocatoriaRequest;

class DetalleConvocatoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {    
        //Convocatoria
        $convocatoria = Convocatorias::find($id);

        $detalleConvocatorias = DetalleConvocatorias::with('convocatoria','cat','programa','curso')
            ->where('convocatoria_id', '=', $convocatoria->id)
            ->paginate(10);

        return view('detalleConvocatorias.index', compact('convocatoria','detalleConvocatorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $convocatoria_id = $id;
        
        //CAT
        $cat = Cat::where('activo', 1)->get()->pluck('nombre', 'id');
        
        //Programas
        $programas = Programas::where('activo', 1)->get();
        $programa_id = $programas->first()->id;
        $programas= $programas->pluck('nombre', 'id');

        //Cursos
        $cursos = Cursos::where(['activo' => 1,'programa_id' => $programa_id])->get();
        $cursos = $cursos->pluck('nombre', 'id');
        

        return view('detalleConvocatorias.create',compact('convocatoria_id','cat','programas','cursos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DetalleConvocatoriaRequest $request)
    {
        
        $convocatoria_id = $request->convocatoria_id;
        
        $detalleConvocatoria = DetalleConvocatorias::create([
            'convocatoria_id' => $request->convocatoria_id,
            'cat_id' => $request->cat_id,
            'programa_id' => $request->programa_id,
            'curso_id' => $request->curso_id,
            'perfil' => $request->perfil,
            'requisitos' => $request->requisitos,
        ]);

        return redirect()->route('detalleConvocatorias.index',compact('convocatoria_id'))->with('info','Se ha creado correctame el detalle de la convocatoria');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detalleConvocatoria = DetalleConvocatorias::with('convocatoria','cat','programa','curso')
            ->find($id);
        return view('detalleConvocatorias.show', compact('detalleConvocatoria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $detalleConvocatoria = DetalleConvocatorias::find($id);
        $convocatoria_id = $detalleConvocatoria->convocatoria_id;

        $cat = Cat::where('activo', 1)->get()->pluck('nombre', 'id');
        $programas = Programas::where('activo', 1)->get();
        $programa_id = $programas->first()->id;
        $programas= $programas->pluck('nombre', 'id');
        $cursos = Cursos::where(['activo' => 1,'programa_id' => $programa_id])->get()->pluck('nombre', 'id');

        return view('detalleConvocatorias.edit',compact('detalleConvocatoria','convocatoria_id','cat','programas','cursos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DetalleConvocatoriaRequest $request, $id)
    {
        $detalleConvocatoria = DetalleConvocatorias::find($id);
            $detalleConvocatoria->cat_id = $request->cat_id;
            $detalleConvocatoria->curso_id = $request->curso_id;
            $detalleConvocatoria->programa_id = $request->programa_id;
            $detalleConvocatoria->perfil = $request->perfil;
            $detalleConvocatoria->requisitos = $request->requisitos;
        $detalleConvocatoria->save();

        $convocatoria_id = $detalleConvocatoria->convocatoria_id;

        return redirect()->route('detalleConvocatorias.index',compact('convocatoria_id'))->with('info','Se ha actualizado correctame los datos del detalle de la convocatoria');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $detalleConvocatoria = DetalleConvocatorias::find($id);
        $detalleConvocatoria->delete();
        return back()->with('info','Se ha eliminado correctame el detalle de la convocatoria');
    }
}
