@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Convocatoria</div>

                <div class="card-body">                                        
                    <p><strong>Codigo convocatoria:</strong>   {{ $convocatoria->id }}</p>
                    <p><strong>Año:</strong>   {{  date('Y',strtotime($convocatoria->fecha_inicio)) }}</p
                    <p><strong>Descripcion:</strong>   {{ $convocatoria->descripcion }}</p>
                    <p><strong>Fecha de inicio:</strong>   {{ $convocatoria->fecha_inicio }}</p>
                    <p><strong>Fecha de finalizacion:</strong>   {{ $convocatoria->fecha_finalizacion }}</p>
                    <p><strong>Activa:</strong>   {{  $convocatoria->activa ? 'Activa' : 'Terminada' }}</p>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection