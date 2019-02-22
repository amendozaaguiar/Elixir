<table class="table table-striped table-hover">
    <thead class="thead-dark">
        <tr>
            <th>id</th>
            <th>Año</th>
            <th>Descripción</th>
            <th>Fecha de Inicio</th>
            <th>Fecha de Finalizacion</th>
            <th>Estado</th>
            <th>Ver más</th>
        </tr>
    </thead>
    <tbody>
        @foreach($convocatorias as $convocatoria)
        <tr>
            <td>{{ $convocatoria->id }}</td>
            <td>{{ date('Y',strtotime($convocatoria->fecha_inicio)) }}</td>
            <td>{{ $convocatoria->descripcion }}</td>
            <td>{{ $convocatoria->fecha_inicio }}</td>
            <td>{{ $convocatoria->fecha_finalizacion }}</td>
            <td>{{ $convocatoria->activa ? 'Activa' : 'Terminada'  }}</td>
            @if(auth::user())
                @if($convocatoria->activa)
                <td>
                    <a class="btn btn-sm btn btn-info" href="{{ route('detalleConvocatorias.index', $convocatoria->id) }}" >
                    Ver detalle
                    </a>
                </td>
                @else
                <td></td>
                @endif
            @else
                @if($convocatoria->activa)
                <td>
                    <a class="btn btn-sm btn btn-info" href="{{route('login')}}">Ver detalle</a>
                </td>
                @else
                <td></td>
                @endif
            @endif
        </tr>
        @endforeach
    </tbody>
</table>