@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Convocatoria</div>

                <div class="card-body">                                        
                    <p><strong>Codigo convocatoria:</strong>   {{ $convocatoria->id }}</p>
                    <p><strong>Programa:</strong>   {{ $convocatoria->programa->nombre }}</p>
                    <p><strong>Curso:</strong>   {{ $convocatoria->curso->nombre }}</p>
                    <p><strong>Perfil:</strong>   {{ $convocatoria->perfil }}</p>
                    <p><strong>Requisitos:</strong>   {{ $convocatoria->requisitos }}</p>
                    <p><strong>Activa:</strong>   {{  $convocatoria->activa ? 'Activa' : 'Terminada' }}</p>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection