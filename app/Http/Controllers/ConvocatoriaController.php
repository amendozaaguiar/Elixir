<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Convocatorias;
use App\Cat;
use App\Cursos;
use App\Programas;
class ConvocatoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $convocatorias = Convocatorias::with(['programa','curso'])->paginate();
        return view('convocatorias.index', compact('convocatorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $cat = Cat::where('activo', 1)->get()->pluck('nombre', 'id');
        $programas = Programas::where('activo', 1)->get();
        $programa_id = $programas->first()->id;
        $programas= $programas->pluck('nombre', 'id');
        $cursos = Cursos::where(['activo' => 1,'programa_id' => $programa_id])->get()->pluck('nombre', 'id');

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
        $convocatoria = Convocatorias::create([
            'cat_id' => $request->cat_id,
            'programa_id' => $request->programa_id,
            'curso_id' => $request->curso_id,
            'perfil' => $request->perfil,
            'requisitos' => $request->requisitos,
            'activa' => $request->activa,
        ]);
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
        $convocatoria = Convocatorias::with(['programa','curso'])->find($id);
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
        
        $cat = Cat::where('activo', 1)->get();
        $programas = Programas::where('activo', 1)->get();
        $cursos = Cursos::where(['activo' => 1,'programa_id' => $convocatoria->programa_id])->get();

        $cat = $cat->pluck('nombre', 'id');
        $programas = $programas->pluck('nombre', 'id');
        $cursos = $cursos->pluck('nombre', 'id');
        return view('convocatorias.edit',compact('convocatoria','cat','programas','cursos'));
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
            $convocatoria->cat_id = $request->cat_id;
            $convocatoria->curso_id = $request->curso_id;
            $convocatoria->programa_id = $request->programa_id;
            $convocatoria->perfil = $request->perfil;
            $convocatoria->requisitos = $request->requisitos;
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
