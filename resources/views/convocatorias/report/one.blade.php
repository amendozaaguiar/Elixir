@extends('layouts.app')

@section('content')
    <table class="table table-striped table-hover table-sm table-bordered">
        <thead>
            <tr>
                <th colspan="100%">
                    PERFILES CONVOCATORIA [ {{ $convocatoria->descripcion }} ]
                </th>
            </tr>
            <tr>
                <th>No.</th>
                <th>CAT</th>
                <th>PROGRAMA</th>
                <th>CURSO</th>
                <th>PERFIL PROFESIONAL</th>
                <th>REQUISITOS OBLIGATORIOS</th>
            </tr>
        </thead>
        <tbody>
        @foreach($detalleConvocatoria as $detalle)
            <tr>
                <td>{{ $detalle->id }}</td>
                <td>{{ $detalle->cat->nombre }}</td>
                <td>{{ $detalle->curso->programa->nombre }}</td>
                <td>{{ $detalle->curso->nombre }}</td>                                    
                <td>{{ $detalle->perfil }}</td>
                <td>{{ $detalle->requisitos }}</td>                                
            </tr>
        @endforeach                            
        </tbody>
    </table>
@endsection