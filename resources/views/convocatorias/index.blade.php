@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Convocatorias
                    @can('convocatorias.create')
                    <a href="{{ route('convocatorias.create') }}" 
                    class="btn btn-sm btn-success float-right">
                        Crear
                    </a>
                    @endcan
                </div>

                <div class="card-body">
                    @include('alerts.info')
                    <table class="table table-striped table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>id</th>
                                <th>Año</th>
                                <th>Descripción</th>
                                <th>Fecha de Inicio</th>
                                <th>Fecha de Finalización</th>
                                <th>Estado</th>
                                <th colspan="4">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($convocatorias as $convocatoria)
                            <tr>
                                <td>{{ $convocatoria->id }}</td>
                                <td>{{ date('Y',strtotime($convocatoria->fecha_inicio)) }}</td>
                                <td>{{ $convocatoria->descripcion }}</td>
                                <td>{{ $convocatoria->fecha_inicio }}</td>
                                <td>{{ $convocatoria->fecha_finalizacion }}</td>
                                <td>{{ $convocatoria->activa ? 'Activa' : 'Terminada'  }}</td>

                                @can('convocatorias.show')
                                <td width="10px">
                                    <a href="{{ route('convocatorias.show', $convocatoria->id) }}" 
                                    class="btn btn-sm btn btn-secondary">
                                        Ver
                                    </a>
                                </td>
                                @endcan

                                @if($convocatoria->activa)
                                    @can('convocatorias.edit')
                                    <td width="10px">
                                        <a href="{{ route('convocatorias.edit', $convocatoria->id) }}" 
                                        class="btn btn-sm btn btn-primary">
                                            Editar
                                        </a>
                                    </td>
                                    @endcan

                                    @can('detalleConvocatorias.index')
                                    <td width="10px">
                                        <a href="{{ route('detalleConvocatorias.index', $convocatoria->id) }}" 
                                        class="btn btn-sm btn btn-info">
                                            Detalle
                                        </a>
                                    </td>
                                    @endcan

                                    @can('convocatorias.destroy')
                                    <td width="10px">
                                        {!! Form::open(['route' => ['convocatorias.destroy', $convocatoria->id], 
                                        'method' => 'DELETE']) !!}
                                            <button class="btn btn-sm btn-danger">
                                                Eliminar
                                            </button>
                                        {!! Form::close() !!}
                                    </td>
                                    @endcan
                                @else
                                    <td width="10px"></td>
                                    @can('detalleConvocatorias.index')
                                    <td width="10px">
                                        <a href="{{ route('detalleConvocatorias.index', $convocatoria->id) }}" 
                                        class="btn btn-sm btn btn-info">
                                            Detalle
                                        </a>
                                    </td>
                                    @endcan
                                    <td width="10px"></td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $convocatorias->render() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection