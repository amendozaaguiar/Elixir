@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Detalle
                    @include('layouts.volver')
                </div>
                <div class="card-body">                                        
                    <p>
                        <strong>Codigo del detalle:</strong>
                        {{ $detalleConvocatoria->id }}
                    </p>
                    <p>
                        <strong>Convocatoria:</strong>
                        {{  $detalleConvocatoria->convocatoria->descripcion }}
                    </p>
                    <p>
                        <strong>CAT:</strong>
                        {{ $detalleConvocatoria->cat->nombre }}
                    </p>
                    <p>
                        <strong>Programa:</strong>
                        {{ $detalleConvocatoria->programa->nombre }}
                    </p>
                    <p>
                        <strong>Curso:</strong>
                        {{ $detalleConvocatoria->curso->nombre }}
                    </p>
                    
                    <p>
                        <strong>Perfil:</strong>
                        {{ $detalleConvocatoria->perfil }}
                    </p>

                    <p>
                        <strong>Requisitos:</strong>
                        {{ $detalleConvocatoria->requisitos }}
                    </p>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection