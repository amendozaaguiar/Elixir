@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Programa
                    @include('layouts.volver')
                </div>

                <div class="card-body">                                        
                    <p><strong>Codigo:</strong>   {{ $programa->id }}</p>
                    <p><strong>Nombre:</strong>   {{ $programa->nombre }}</p>
                    <p><strong>Estado:</strong>   {{ $programa->activo ? 'Activo' : 'Inactivo' }}</p>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection