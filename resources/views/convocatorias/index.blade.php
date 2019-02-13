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
                    class="btn btn-sm btn-primary float-right">
                        Crear
                    </a>
                    @endcan
                </div>

                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>id</th>
                                <th>Año</th>
                                <th>Descripcion</th>
                                <th>Fecha de Inicio</th>
                                <th>Fecha de Finalizacion</th>
                                <th>Estado</th>
                                <th colspan="3">&nbsp;</th>
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
                                    class="btn btn-sm btn btn-primary">
                                        ver
                                    </a>
                                </td>
                                @endcan
                                @if($convocatoria->activa)
                                    @can('convocatorias.edit')
                                    <td width="10px">
                                        <a href="{{ route('convocatorias.edit', $convocatoria->id) }}" 
                                        class="btn btn-sm btn btn-success">
                                            editar
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