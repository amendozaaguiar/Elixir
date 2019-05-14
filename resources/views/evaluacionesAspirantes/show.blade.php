@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <strong>
                        Evaluacion aspirante:
                    </strong>
                    {{ $evaluacionAspirante->aplicante->usuario->detail->tipoDocumento->abreviacion }}
                    {{ $evaluacionAspirante->aplicante->usuario->detail->numero_documento }} 
                    {{ $evaluacionAspirante->aplicante->usuario->detail->primer_nombre }}
                    {{ $evaluacionAspirante->aplicante->usuario->detail->segundo_nombre }}
                    {{ $evaluacionAspirante->aplicante->usuario->detail->primer_apellido }}
                    {{ $evaluacionAspirante->aplicante->usuario->detail->segundo_apellido }}
                    @include('layouts.volver')
                </div>

                <div class="card-body">                                        
                    <p><strong>Codigo Evaluacion:</strong>   {{ $evaluacionAspirante->id }}</p>
                    <p><strong>Puntuaciones</strong></p>
                    <p><strong>Pregrado:</strong>   {{ $evaluacionAspirante->pregrado }}</p>
                    <p><strong>Magister o Esp. Medica:</strong>   {{ $evaluacionAspirante->magister_esp_medica }}</p>
                    <p><strong>Doctorado:</strong>   {{ $evaluacionAspirante->doctorado }}</p>
                    <p><strong>Seminarios o cursos:</strong>   {{ $evaluacionAspirante->seminarios_cursos }}</p>
                    <p><strong>Experiencia en docencia universitaria:</strong>   {{ $evaluacionAspirante->experiencia_docencia_universitaria }}</p>
                    <p><strong>Produccion intelectual:</strong>   {{ $evaluacionAspirante->produccion_intelectual }}</p>
                    <p><strong>Experiencia profesional:</strong>   {{ $evaluacionAspirante->experiencia_profesional }}</p>
                    <p><strong>Total hoja de vida:</strong>   {{ $evaluacionAspirante->total_hoja_vida }}</p>
                    <p><strong>Ensayo:</strong>   {{ $evaluacionAspirante->ensayo }}</p>
                    <p><strong>Prueba de conocimiento:</strong>   {{ $evaluacionAspirante->prueba_conocimiento }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection