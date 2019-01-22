<table class="table table-striped table-hover">
    <thead class="thead-dark">
        <tr>
            <th>id</th>
            <th>CAT</th>
            <th>Programa</th>
            <th>Curso</th>
            <th>Perfil</th>
            <th>Requisitos</th>
            <th>Activa</th>
            <th>Aplicar</th>
        </tr>
    </thead>
    <tbody>
        @foreach($convocatorias as $convocatoria)
        <tr>
            <td>{{ $convocatoria->id }}</td>
            <td>{{ $convocatoria->cat->nombre }}</td>
            <td>{{ $convocatoria->programa->nombre }}</td>
            <td>{{ $convocatoria->curso->nombre }}</td>
            <td>{{ $convocatoria->perfil }}</td>
            <td>{{ $convocatoria->requisitos }}</td>
            <td>{{ $convocatoria->activa ? 'Activa' : 'Terminada'  }}</td>
            <td><a href="login">Aplicar</a></td>
        </tr>
        @endforeach
    </tbody>
</table>