@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Convocatoria</div>

                <div class="card-body">                                        
                    <p><strong>Codigo CAT:</strong>   {{ $cat->id }}</p>
                    <p><strong>Nombre:</strong>   {{ $cat->nombre }}</p>
                    <p><strong>Direccion:</strong>   {{ $cat->direccion }}</p>
                    <p><strong>Email:</strong>   {{ $cat->email }}</p>
                    <p><strong>Departamento:</strong>   {{ $cat->departamento->nombre }}</p>
                    <p><strong>Municipio:</strong>   {{ $cat->municipio->nombre }}</p>
                    <p><strong>Activo:</strong>   {{  $cat->activo ? 'Activo' : 'Inactivo' }}</p>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection