<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Almacenamiento
use Illuminate\Support\Facades\Storage;

//modelos
use App\Convocatorias;
use App\AplicantesConvocatorias;

//Request
use App\Http\Requests\AplicantesConvocatoriaRequest;

class AplicantesConvocatoriaController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AplicantesConvocatoriaRequest $request)
    {
        //Guardo la Hoja de vida y ela URL en ela variable $path
        $AplicacionesAspirante = AplicantesConvocatorias::where(['detalle_Convocatoria_id'=>$request->detalleConvocatoria_id,'aspirante_id'=>$request->user_id])->count();

        //Si el usuario ya aplico a la convocatoria, no se permite y se retorna al formulario con un mensaje
        if($AplicacionesAspirante>=1) {
            return back()->with('danger_warning', 'Ya has aplicado a esta convocatoria, no puede volver a aplicar.');;
        }else{
            $path = Storage::disk('public')->put('hojas_vida', $request->file('hoja_vida'));

            $AplicanteConvocatoria = new AplicantesConvocatorias;
                $AplicanteConvocatoria->detalle_convocatoria_id = $request->detalleConvocatoria_id;
                $AplicanteConvocatoria->aspirante_id = $request->user_id;  
                $AplicanteConvocatoria->hoja_vida = $path;  
            $AplicanteConvocatoria->save();

            //Retorno a la convocatoria
            $convocatorias = Convocatorias::paginate(10);

            return redirect()->route('home')->with('info', 'Aplicacion a convocatoria exitosa');
        }
        
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updatePreSelected(Request $request)
    {
        //dd($request->fecha_hora_presentacion);
        $AplicanteConvocatoria = AplicantesConvocatorias::find($request->id);
            $AplicanteConvocatoria->pre_seleccionado = $request->pre_seleccionado;
            $AplicanteConvocatoria->observaciones = $request->observaciones;
            $AplicanteConvocatoria->temas_presentacion = $request->temas_presentacion;
            $AplicanteConvocatoria->lugar_presentacion = $request->lugar_presentacion;
            $AplicanteConvocatoria->fecha_hora_presentacion = $request->fecha_hora_presentacion;
            $AplicanteConvocatoria->usuario_reviso_id = $request->usuario_reviso_id;
        $AplicanteConvocatoria->save();

        return back()->with('info', 'Se ha actualizado los datos de forma correcta');
    }



}
