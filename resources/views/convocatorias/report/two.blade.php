@extends('layouts.app')

@section('content')
    <table class="table table-striped table-hover table-sm table-bordered">
        <thead>
            <tr>
                <th colspan="100%">
                    LISADO PRESELECCIONADOS DESPUES DE RECLAMACIONES
                </th>
            </tr>
            <tr>
                <th>No.</th>
                <th>CAT</th>
                <th>PROGRAMA</th>
                <th>CURSO</th>
                <th>ASPIRANTE</th>
                <th>PRESEL.</th>
                <th>OBSERVACION</th>
                <th>HV</th>
                <th>TEMAS</th>
                <th>LUGAR</th>
                <th>FECHA Y HORA</th>
            </tr>
        </thead>
        <tbody>
            @foreach($AplicacionesAspirante as $Aplicante)
            <tr>
                <td>{{ $Aplicante->id }}</td>
                <td>{{ $Aplicante->detalleConvocatoria->cat->nombre }}</td>
                <td>{{ $Aplicante->detalleConvocatoria->curso->programa->nombre }} </td>
                <td>{{ $Aplicante->detalleConvocatoria->curso->nombre }} </td>
                <td>
                    {{ $Aplicante->usuario->detail->primer_apellido }} 
                    {{ $Aplicante->usuario->detail->segundo_apellido }}
                    {{ $Aplicante->usuario->detail->primer_nombre }}
                    {{ $Aplicante->usuario->detail->segundo_nombre }}  
                </td>
                <td>{{ $Aplicante->pre_seleccionado ? 'Si' : 'No'}}</td>
                <td>{{ $Aplicante->observaciones }}</td>
                <td>{{ !empty($Aplicante->evaluacion->total_hoja_vida)? $Aplicante->evaluacion->total_hoja_vida : '' }}</td>
                <td>{{ $Aplicante->temas_presentacion }}</td>
                <td>{{ $Aplicante->lugar_presentacion }}</td>
                <td>{{ $Aplicante->fecha_hora_presentacion }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection