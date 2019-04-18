@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div id="accordion">
                @foreach($Convocatoria as $Convocatoria)
                <div class="card">
                    <div class="card-header">
                        <b>
                            Aspirantes a {{$Convocatoria->descripcion}}
                            [Fech Inc: {{$Convocatoria->fecha_finalizacion}} - Fech Fin: {{$Convocatoria->fecha_finalizacion}}]
                            @include('layouts.volver')
                        </b>
                    </div>

                    <div class="card-body">
                        @include('alerts.info')
                        @include('alerts.errors')                         
                        @foreach($Convocatoria->detalleConvocatoria as $detalle)
                        <a data-toggle="collapse" data-target="#collapse{{$detalle->id}}" aria-expanded="true" aria-controls="collapse{{$detalle->id}}">
                            <div class="list-group-item" onMouseOver="this.style.cursor='pointer'" id="heading{{$detalle->id}}">
                                <div class="row">
                                    <div class="col-md-2">
                                        <b>CAT:</b> {{$detalle->cat->nombre}}
                                    </div>
                                    <div class="col-md-2">
                                        <b>Programa:</b> {{$detalle->programa->nombre}}
                                    </div>
                                    <div class="col-md-2">
                                        <b>Curso:</b> {{$detalle->curso->nombre}}
                                    </div>
                                    <div class="col-md-6">
                                        <span class="float-right">
                                            <b>Numero de aspirantes:</b>
                                            <span class="badge badge-info badge-pill">
                                                {{count($detalle->aplicantes)}}
                                            </span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <br>
                        <div id="collapse{{$detalle->id}}" class="collapse" aria-labelledby="heading{{$detalle->id}}" data-parent="#accordion">
                            <table class="table table-sm table-hover text-center">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>
                                            Documento
                                        </th>
                                        <th>
                                            Nombre
                                        </th>
                                        <th>
                                            Correo
                                        </th>
                                        @can('aplicantesConvocatorias.show.hv')  
                                        <th>
                                            Hoja de vida
                                        </th>
                                        @endcan
                                        @can('aplicantesConvocatorias.edit.preselected') 
                                        <th>
                                            Pre-Selección
                                        </th>
                                        @endcan
                                    </tr>
                                </thead>                                                                        
                                <tbody class="text-left">
                                    @foreach($detalle->aplicantes as $aplicante)
                                    <tr>
                                        <td>
                                            {{$aplicante->usuario->detail->tipoDocumento->abreviacion}}
                                            {{$aplicante->usuario->detail->numero_documento}}
                                        </td>
                                        <td>
                                            {{$aplicante->usuario->detail->primer_nombre}}
                                            {{$aplicante->usuario->detail->segundo_nombre}}
                                            {{$aplicante->usuario->detail->primer_apellido}}
                                            {{$aplicante->usuario->detail->segundo_apellido}}
                                        </td>
                                        <td>
                                            {{$aplicante->usuario->email}}
                                        </td>
                                        @can('aplicantesConvocatorias.show.hv')   
                                        <td class="text-center">
                                            <a class="btn btn-sm btn-primary" href="{{ asset('storage/'.$aplicante->hoja_vida) }}" target="_blank">
                                                <i class="fas fa-eye"></i> Ver
                                            </a>
                                        </td>
                                        @endcan
                                        @can('aplicantesConvocatorias.edit.preselected')                                                
                                        <td class="text-center">
                                            @if($aplicante->pre_seleccionado == '1')
                                            <a class="btn btn-sm btn-success" href="#" data-toggle="modal" data-target="#preSeleccionModal" 
                                            data-aspirante="{{$aplicante->aspirante_id}}" 
                                            data-aplicacion="{{$aplicante->id}}">
                                            <i class="fas fa-check-circle"></i> Pre-seleccionar
                                        </a>
                                        @elseif($aplicante->pre_seleccionado == '0')
                                        <a class="btn btn-sm btn-danger" href="#" data-toggle="modal" data-target="#preSeleccionModal" 
                                        data-aspirante="{{$aplicante->aspirante_id}}" 
                                        data-aplicacion="{{$aplicante->id}}">
                                        <i class="fas fa-check-circle"></i> Pre-seleccionar
                                    </a>
                                    @else
                                    <a class="btn btn-sm btn-primary" href="#" data-toggle="modal" data-target="#preSeleccionModal" 
                                    data-aspirante="{{$aplicante->aspirante_id}}" 
                                    data-aplicacion="{{$aplicante->id}}">
                                    <i class="fas fa-check-circle"></i> Pre-seleccionar
                                </a>
                                @endif
                            </td>
                            @else
                            <td></td>
                            @endcan
                        </tr>
                        @endforeach
                    </tbody>
                </table>  
            </div>
            @endforeach
        </div>
    </div>
    @endforeach
</div>
</div>
</div>
</div>

<!--MODAL DE PRE-SELECCION-->
<div class="modal fade bd-example-modal-lg" id="preSeleccionModal" tabindex="-1" role="dialog" aria-labelledby="preSeleccionLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="preSeleccionLabel">Pre-Seeleccion</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            {{ Form::open(['route' => 'aplicantesConvocatorias.update.preselected']) }}
            {{ Form::hidden('id', null, ['id' => 'id']) }}
            {{ Form::hidden('usuario_reviso_id', auth()->user()->id, ['id' => 'usuario_reviso_id']) }}

            <!--Calificacion Hoja de vida-->
            <div class="form-group">
                <h6>Calificacion Hoja de Vida</h6>
                <div class="form-row">
                    <div class="col-md-10">
                        {{ Form::label('pregrado', 'Titulo pregado') }}
                    </div>
                    <div class="col-md-2">                    
                        {{ Form::input('number','pregrado', '0.00', ['class' => 'form-control', 'id' => 'pregrado', 'step' => '0.01', 'min' => '0', 'max' => '4', 'onKeyup' => 'numeroDecimal(this)', 'onBlur' => 'calcularTotal()', 'autocomplete' => 'off']) }}
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-10">
                        {{ Form::label('especialista', 'Titulo especialista') }}
                    </div>
                    <div class="col-md-2">                      
                        {{ Form::input('number','especialista', '0.00', ['class' => 'form-control', 'id' => 'especialista', 'step' => '0.01', 'min' => '0', 'max' => '6', 'onKeyup' => 'numeroDecimal(this)', 'onBlur' => 'calcularTotal()', 'autocomplete' => 'off'] ) }}
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-10">
                        {{ Form::label('magister_esp_medica', 'Titulo magister o especialización medica') }}
                    </div>
                    <div class="col-md-2">                     
                        {{ Form::input('number','magister_esp_medica', '0.00', ['class' => 'form-control', 'id' => 'magister_esp_medica', 'step' => '0.01', 'min' => '0', 'max' => '8', 'onKeyup' => 'numeroDecimal(this)', 'onBlur' => 'calcularTotal()', 'autocomplete' => 'off'] ) }}
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-10">
                        {{ Form::label('doctorado', 'Titulo de doctorado')}}
                    </div>
                    <div class="col-md-2">   
                        {{ Form::input('number','doctorado', '0.00', ['class' => 'form-control', 'id' => 'doctorado', 'step' => '0.01', 'min' => '0', 'max' => '12', 'onKeyup' => 'numeroDecimal(this)', 'onBlur' => 'calcularTotal()', 'autocomplete' => 'off'] ) }}
                    </div>
                </div>

                <div class="form-row"> 
                    <div class="col-md-10">
                        {{ Form::label('seminarios_cursos', 'Seminario Docencia Distancia UniTolima y Cursos en el área de pedagogía')}}
                    </div>
                    <div class="col-md-2"> 
                        {{ Form::input('number','seminarios_cursos', '0.00', ['class' => 'form-control', 'id' => 'seminarios_cursos', 'step' => '0.01', 'min' => '0', 'max' => '2', 'onKeyup' => 'numeroDecimal(this)', 'onBlur' => 'calcularTotal()', 'autocomplete' => 'off'] ) }}
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-10">
                        {{ Form::label('experiencia_docencia_universitaria', 'Experiencia en docencia universitaria')}}
                    </div>
                    <div class="col-md-2"> 
                        {{ Form::input('number','experiencia_docencia_universitaria', '0.00', ['class' => 'form-control', 'id' => 'experiencia_docencia_universitaria', 'step' => '0.01', 'min' => '0', 'max' => '10', 'onKeyup' => 'numeroDecimal(this)', 'onBlur' => 'calcularTotal()', 'autocomplete' => 'off'] ) }}
                    </div>                
                </div>

                <div class="form-row">
                    <div class="col-md-10">        
                        {{ Form::label('produccion_intelectual', 'Produccion intelectual') }}
                    </div>
                    <div class="col-md-2"> 
                        {{ Form::input('number','produccion_intelectual', '0.00', ['class' => 'form-control', 'id' => 'produccion_intelectual', 'step' => '0.01', 'min' => '0', 'max' => '6', 'onKeyup' => 'numeroDecimal(this)', 'onBlur' => 'calcularTotal()', 'autocomplete' => 'off'] ) }}
                    </div>
                </div>

                <div class="form-row">            
                    <div class="col-md-10">   
                        {{ Form::label('experiencia_profesional', 'Experiencia profesional') }}
                    </div>
                    <div class="col-md-2">
                        {{ Form::input('number','experiencia_profesional', '0.00', ['class' => 'form-control', 'id' => 'experiencia_profesional', 'step' => '0.01', 'min' => '0', 'max' => '4', 'onKeyup' => 'numeroDecimal(this)', 'onBlur' => 'calcularTotal()', 'autocomplete' => 'off'] ) }}
                    </div>
                </div>
                <div class="form-row">  
                    <div class="col-md-10">   
                        {{ Form::label('total_hoja_vida', 'Total') }}
                    </div>
                    <div class="col-md-2">
                        {{ Form::input('number','total_hoja_vida', '0.00', ['class' => 'form-control border-success', 'id' => 'total_hoja_vida', 'readonly' => 'true', 'min' => '0' ] ) }}
                    </div>
                </div>
            </div>
            <hr>
            <!--Datos de preseleccion-->
            <div class="form-group">
                <h6>Resultados</h6>
                <div class="row">
                    <div class="col-md-6">
                        {{ Form::label('Pre-seleccionar', 'Pre-seleccionar')}}
                        <br>
                        {{ Form::select('pre_seleccionado', array('1' => 'Si', '0' => 'No'), '1',['class' => 'form-control']) }}
                    </div>
                    <div class="col-md-6">
                        {{ Form::label('fecha_hora_presentacion', 'Fecha y hora de presentación') }}
                        <br>
                        {{ Form::input('dateTime-local','fecha_hora_presentacion', null, ['class' => 'form-control', 'id' => 'fecha_hora_presentacion']) }}
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-12">
                        {{ Form::label('observaciones', 'Observaciones')}}
                        {{ Form::textarea('observaciones', null, ['id' => 'observaciones', 'class' => 'form-control', 'rows' => '3']) }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        {{ Form::label('temas_presentacion', 'Temas de presentación')}}
                        {{ Form::textarea('temas_presentacion', null, ['id' => 'temas_presentacion', 'class' => 'form-control', 'rows' => '3']) }}
                    </div>
                    <div class="col-md-6">    
                        {{ Form::label('lugar_presentacion', 'Lugar de presentación')}}
                        {{ Form::textarea('lugar_presentacion', null, ['id' => 'lugar_presentacion', 'class' => 'form-control', 'rows' => '3']) }}
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            {{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-success']) }}
            {{ Form::button('Cancelar', ['class' => 'btn btn-sm btn-danger', 'data-dismiss' => 'modal']) }}        
            {{ Form::close() }}
        </div>
    </div>
</div>
</div>
@endsection