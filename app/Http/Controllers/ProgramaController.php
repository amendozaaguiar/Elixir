<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Programas;

//Request
use App\Http\Requests\ProgramaRequest;

class ProgramaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programas = Programas::paginate(10);
        return view('programas.index', compact('programas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('programas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProgramaRequest $request)
    {
        $programa = Programas::create([
            'nombre' => $request->nombre,
            'activo' => $request->activo,
        ]);

        return redirect()->route('programas.index')->with('info', 'Se ha creado correctamente el programa');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $programa = Programas::find($id);
        return view('programas.show',compact('programa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $programa = Programas::find($id);
        return view('programas.edit',compact('programa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProgramaRequest $request, $id)
    {
        $programa = Programas::find($id);
            $programa->nombre = $request->nombre;
            $programa->activo = $request->activo;
        $programa->save();

        return redirect()->route('programas.index')->with('info', 'Se ha actualizado correctamente los datos del programa');
    }
}
