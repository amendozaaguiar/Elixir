@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Detalle de la convocatoria
                    @can('detalleConvocatorias.create')
                    <a href="{{ route('detalleConvocatorias.create', $convocatoria_id) }}" 
                    class="btn btn-sm btn-success float-right">
                        Crear
                    </a>
                    @endcan
                </div>

                <div class="card-body">
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
                                <th colspan="3">&nbsp;</th>
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
                                    <td width="10px"></td>
                                    <td width="10px"></td>
                                @endif
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
@endsection