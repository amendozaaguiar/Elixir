@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Detalle {{ $convocatoria->descripcion }}
                    @can('detalleConvocatorias.create')                    
                    <a href="{{ route('detalleConvocatorias.create', $convocatoria->id) }}" class="btn btn-sm btn-success float-right">
                        Crear
                    </a>
                    @endcan
                </div>

                <div class="card-body">
                    @include('alerts.info')
                    @include('alerts.errors')
                    <table class="table table-striped table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>id</th>
                                <th>Convocatoria</th>
                                <th>Cat</th>
                                <th>Programa</th>
                                <th>Curso</th>
                                <th>Perfil</th>
                                <th>Requisitos</th>
                                <th colspan="5">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($detalleConvocatorias as $detalleConvocatoria)
                            <tr>
                                <td>{{ $detalleConvocatoria->id }}</td>
                                <td>{{ $detalleConvocatoria->convocatoria->descripcion }}</td>
                                <td>{{ $detalleConvocatoria->cat->nombre }}</td>
                                <td>{{ $detalleConvocatoria->programa->nombre }}</td>
                                <td>{{ $detalleConvocatoria->curso->nombre }}</td>
                                <td>{{ $detalleConvocatoria->perfil }}</td>
                                <td>{{ $detalleConvocatoria->requisitos }}</td>

                                @can('detalleConvocatorias.show')
                                <td width="10px">
                                    <a href="{{ route('detalleConvocatorias.show', $detalleConvocatoria->id ) }}" 
                                    class="btn btn-sm btn btn-secondary">
                                        Ver
                                    </a>
                                </td>
                                @endcan

                                @if($detalleConvocatoria->convocatoria->activa)
                                    @can('detalleConvocatorias.edit')
                                    <td width="10px">
                                        <a href="{{ route('detalleConvocatorias.edit', $detalleConvocatoria->id) }}" 
                                        class="btn btn-sm btn btn-primary">
                                            Editar
                                        </a>
                                    </td>
                                    @endcan

                                    @can('aplicantesConvocatorias.create')
                                    <td width="10px">
                                        <a class="btn btn-sm btn btn-info" href="#" data-toggle="modal" data-target="#AplicarConvocatoriaModal" data-convocatoria="{{ $detalleConvocatoria->id }}">
                                            Aplicar
                                        </a>
                                    </td>
                                    @endcan

                                    @can('detalleConvocatorias.destroy')
                                    <td width="10px">
                                        {!! Form::open(['route' => ['detalleConvocatorias.destroy', $detalleConvocatoria->id], 
                                        'method' => 'DELETE']) !!}
                                            <button class="btn btn-sm btn-danger">
                                                Eliminar
                                            </button>
                                        {!! Form::close() !!}
                                    </td>
                                    @endcan
                                @else
                                    <td></td>
                                @endif
                                    <td></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $detalleConvocatorias->render() }}
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal para aplicar a convocatorias -->
<div class="modal fade" id="AplicarConvocatoriaModal" tabindex="-1" role="dialog" aria-labelledby="AplicarConvocatoriaModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="AplicarConvocatoriaModalLabel">Aplicar a convocatoria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {{ Form::open(['route' => 'aplicantesConvocatorias.store', 'enctype'=>'multipart/form-data']) }}
        {{ Form::hidden('detalleConvocatoria_id', null, ['id' => 'detalleConvocatoria_id']) }}
        {{ Form::hidden('user_id', auth()->user()->id, ['id' => 'user_id']) }}  
        {{ Form::hidden('detalleConvocatoria_id_show', null, ['class' => 'form-control', 'id' => 'detalleConvocatoria_id_show', 'disabled' => 'true']) }}
        <div class="form-group">
            <div class="row">
                <div class="col-md-12">
                    {{ Form::label('hoja_vida', 'Anexar Hoja de Vida')}}
                    <div class="">
                    {{ Form::file('hoja_vida',['class' => '', 'id' => 'hoja_vida']) }}
                    </div>
                </div>
            </div>
        </div>      
        
      </div>
      <div class="modal-footer">
        {{ Form::submit('Enviar Hoja de Vida', ['class' => 'btn btn-sm btn-success']) }}
        {{ Form::button('Cancelar', ['class' => 'btn btn-sm btn-danger', 'data-dismiss' => 'modal']) }}        
        {{ Form::close() }}
      </div>
    </div>
  </div>
</div>


@endsection









