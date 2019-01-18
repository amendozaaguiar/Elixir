@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Programa</div>

                <div class="card-body">                                        
                    <p><strong>Codigo:</strong>   {{ $programa->id }}</p>
                    <p><strong>Nombre:</strong>   {{ $programa->nombre }}</p>
                    <p><strong>Activo:</strong>   {{  $programa->activo ? 'Activo' : 'Inactivo' }}</p>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection