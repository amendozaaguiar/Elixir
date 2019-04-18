@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Evaluacion de pre-seleccionados
                </div>

                <div class="card-body">
                    @include('alerts.info')
                    @include('alerts.errors') 
                    <table class="table table-striped table-hover table-sm">
                        <thead class="thead-dark">
                            <tr>
                                <th>Programa</th>
                                <th>Curso</th>
                                <th>Documento</th>
                                <th>Nombre</th>
                                <th colspan="2">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($evaluacionesAspirantes as $evaluacionAspirante)
                            <tr>
                                <td>
                                    {{ $evaluacionAspirante->aplicante->detalleConvocatoria->curso->programa->nombre }}
                                </td>
                                <td>
                                    {{ $evaluacionAspirante->aplicante->detalleConvocatoria->curso->nombre }}
                                </td>
                                <td>
                                    {{ $evaluacionAspirante->aplicante->usuario->detail->tipoDocumento->abreviacion }}
                                    {{ $evaluacionAspirante->aplicante->usuario->detail->numero_documento }}
                                </td>
                                <td> 
                                    {{ $evaluacionAspirante->aplicante->usuario->detail->primer_nombre }}
                                    {{ $evaluacionAspirante->aplicante->usuario->detail->segundo_nombre }}
                                    {{ $evaluacionAspirante->aplicante->usuario->detail->primer_apellido }}
                                    {{ $evaluacionAspirante->aplicante->usuario->detail->segundo_apellido }}
                                </td>

                                @can('evaluacionesAspirantes.show')
                                    <td width="10px">
                                        <a href="{{ route('evaluacionesAspirantes.show', $evaluacionAspirante->id ) }}" 
                                        class="btn btn-sm btn btn-primary">
                                            Ver
                                        </a>
                                    </td>
                                @endcan
                                @can('evaluacionesAspirantes.edit')
                                    <td width="10px">
                                        <a href="{{ route('evaluacionesAspirantes.edit', [$evaluacionAspirante->id , $evaluacionAspirante->aplicante->detalleConvocatoria->convocatoria_id] ) }}" 
                                        class="btn btn-sm btn btn-success">
                                            Evaluar
                                        </a>
                                    </td>
                                @endcan                                    
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection