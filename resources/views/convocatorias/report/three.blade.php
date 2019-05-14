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
                <th>HV</th>
                <th>ENSAYO</th>
                <th>PRUE. CONOCIMIENTO</th>
                <th>TOTAL</th>
                <th>RESULTADO</th>
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
                <td>{{ !empty($Aplicante->evaluacion->total_hoja_vida)? $Aplicante->evaluacion->total_hoja_vida : '' }}</td>
                <td>{{ !empty($Aplicante->evaluacion->ensayo)? $Aplicante->evaluacion->ensayo : '' }}</td>
                <td>{{ !empty($Aplicante->evaluacion->prueba_conocimiento)? $Aplicante->evaluacion->prueba_conocimiento : '' }}</td>
                <td>{{ (!empty($Aplicante->evaluacion->total_hoja_vida) && !empty($Aplicante->evaluacion->ensayo)  && !empty($Aplicante->evaluacion->prueba_conocimiento) ) ? $Aplicante->evaluacion->total_hoja_vida + $Aplicante->evaluacion->ensayo + $Aplicante->evaluacion->prueba_conocimiento : '' }}</td>
                <td>{{ ((!empty($Aplicante->evaluacion->total_hoja_vida) && !empty($Aplicante->evaluacion->ensayo)  && !empty($Aplicante->evaluacion->prueba_conocimiento) ) && (($Aplicante->evaluacion->total_hoja_vida + $Aplicante->evaluacion->ensayo + $Aplicante->evaluacion->prueba_conocimiento) > 60)) ? 'ELEGIBLE' : 'NO ELEGIBLE
' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection