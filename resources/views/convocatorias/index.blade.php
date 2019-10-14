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
                    @include('alerts.errors') 
                    <table class="table table-striped table-hover table-sm">
                        <thead class="thead-dark">
                            <tr>
                                <th>id</th>
                                <th>Año</th>
                                <th>Descripción</th>
                                <th>Fecha de Inicio</th>
                                <th>Fecha de Finalización</th>
                                <th>Estado</th>
                                <th colspan="6">&nbsp;</th>
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
                                        Pre-seleccionar
                                    </a>
                                </td>
                                @endcan

                                 @can('evaluacionesAplicantes.show')
                                <td width="10px">
                                    <a href="{{ route('evaluacionesAspirantes.index', $convocatoria->id) }}" 
                                    class="btn btn-sm btn btn-dark">
                                        Evaluar
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

                                @can('convocatorias.report')
                                <td width="10px">
                                    <a href="#" class="nav-item dropdown">
                                        <a id="navbarDropdown" class="dropdown-toggle btn-sm btn  btn btn-warning" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            Reportes 
                                            <span class="caret"></span>
                                        </a>
                                    
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('convocatorias.report.one', $convocatoria->id) }}"
                                                target="_blank">
                                                Perfiles Convocatoria
                                            </a>
                                            <a class="dropdown-item" href="{{ route('convocatorias.report.two', $convocatoria->id) }}"
                                                target="_blank">
                                                Listado de pre-seleccionados
                                            </a>
                                            <a class="dropdown-item" href="{{ route('convocatorias.report.three', $convocatoria->id) }}"
                                                target="_blank">
                                                Resultados finales
                                            </a>
                                        </div>
                                        
                                    </a>
                                </td>
                                @endcan
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