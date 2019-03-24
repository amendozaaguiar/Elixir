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
                                            Hoja de Vida
                                        </th>
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
@endsection