@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Cursos
                    @can('cursos.create')
                    <a href="{{ route('cursos.create') }}" class="btn btn-sm btn-primary float-right">
                        Crear
                    </a>
                    @endcan
                </div>

                <div class="card-body">
                    @include('alerts.info')
                    @include('alerts.errors') 
                    <table class="table table-striped table-hover table-sm">
                        <thead class="thead-dark">
                            <tr>
                                <th>Id</th>
                                <th>Programa</th>
                                <th>Nombre</th>
                                <th>Perfil</th>
                                <th>Estado</th>
                                <th colspan="3">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cursos as $curso)
                            <tr>
                                <td>{{ $curso->id }}</td>
                                <td>{{ $curso->programa->nombre }}</td>
                                <td>{{ $curso->nombre }}</td>
                                <td>{{ $curso->perfil }}</td>
                                <td>{{ $curso->activo ? 'Activo' : 'Inactivo'  }}</td>

                                @can('cursos.show')
                                <td width="10px">
                                    <a href="{{ route('cursos.show', $curso->id) }}" 
                                    class="btn btn-sm btn btn-primary">
                                        Ver
                                    </a>
                                </td>
                                @endcan
                                
                                @can('cursos.edit')
                                    <td width="10px">
                                        <a href="{{ route('cursos.edit', $curso->id) }}" 
                                        class="btn btn-sm btn btn-success">
                                            Editar
                                        </a>
                                    </td>
                                @endcan                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $cursos->render() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection