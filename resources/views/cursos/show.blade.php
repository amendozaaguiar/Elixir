@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Cursos
                    @include('layouts.volver')
                </div>

                <div class="card-body">                                        
                    <p><strong>Codigo:</strong>   {{ $curso->id }}</p>
                    <p><strong>Nombre del programa:</strong>   {{ $curso->programa->nombre }}</p>
                    <p><strong>Nombre:</strong>   {{ $curso->nombre }}</p>
                    <p><strong>Perfil:</strong>   {{ $curso->perfil }}</p>
                    <p><strong>Activo:</strong>   {{ $curso->activo ? 'Activo' : 'Inactivo' }}</p>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection