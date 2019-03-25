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
                                            <th>
                                                Hoja de vida
                                            </th>
                                            <th>
                                                Pre-Selección
                                            </th>
                                            <th>
                                                Evaluar
                                            </th>
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
                                            <td class="text-center">
                                                <a class="btn btn-sm btn-primary" href="{{ asset('storage/'.$aplicante->hoja_vida) }}" target="_blank">
                                                    <i class="fas fa-eye"></i> Ver
                                                </a>
                                            </td>
                                            @can('aplicantesConvocatorias.edit.preselected')                                                
                                                <td class="text-center">
                                                    @if($aplicante->pre_seleccionado == 1)
                                                        <a class="btn btn-sm btn-success" href="#" data-toggle="modal" data-target="#preSeleccionModal" 
                                                            data-aspirante="{{$aplicante->aspirante_id}}" 
                                                            data-aplicacion="{{$aplicante->id}}">
                                                            <i class="fas fa-check-circle"></i> Pre-seleccionar
                                                        </a>
                                                    @elseif($aplicante->pre_seleccionado == 0)
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
                                            @can('aplicantesConvocatorias.edit.evaluate')
                                                <td class="text-center">
                                                    <a class="btn btn-sm btn-primary" href="#">
                                                        <i class="fas fa-clipboard-check"></i> Evaluar
                                                    </a>
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
        <div class="form-group">
            {{ Form::label('Pre-seleccionar', 'Pre-seleccionar')}}
            {{ Form::select('pre_seleccionado', array('1' => 'Si', '0' => 'No'))}}
        </div>
        <div class="form-group">            
            {{ Form::label('fecha_hora_presentacion', 'Fecha y hora de presentación') }}
            {{ Form::input('dateTime-local','fecha_hora_presentacion', null, ['id' => 'fecha_hora_presentacion']) }}
        </div>
        <div class="form-group">
            {{ Form::label('observaciones', 'Observaciones')}}
            <br>
            {{ Form::textarea('observaciones', null, ['id' => 'observaciones','class' => 'form-control']) }}
        </div>
         <div class="form-group">
            {{ Form::label('temas_presentacion', 'Temas de presentación')}}
            <br>
            {{ Form::textarea('temas_presentacion', null, ['id' => 'temas_presentacion','class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('lugar_presentacion', 'Lugar de presentación')}}
            <br>
            {{ Form::textarea('lugar_presentacion', null, ['id' => 'lugar_presentacion','class' => 'form-control']) }}
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