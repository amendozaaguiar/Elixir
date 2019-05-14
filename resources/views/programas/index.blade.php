@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Programas
                    @can('programas.create')
                    <a href="{{ route('programas.create') }}" class="btn btn-sm btn-primary float-right">
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
                                <th>Nombre</th>
                                <th>Estado</th>
                                <th colspan="3">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($programas as $Programa)
                            <tr>
                                <td>{{ $Programa->id }}</td>
                                <td>{{ $Programa->nombre }}</td>
                                <td>{{ $Programa->activo ? 'Activo' : 'Inactivo'  }}</td>

                                @can('programas.show')
                                <td width="10px">
                                    <a href="{{ route('programas.show', $Programa->id) }}" 
                                    class="btn btn-sm btn btn-primary">
                                        Ver
                                    </a>
                                </td>
                                @endcan
                                
                                @can('programas.edit')
                                    <td width="10px">
                                        <a href="{{ route('programas.edit', $Programa->id) }}" 
                                        class="btn btn-sm btn btn-success">
                                            Editar
                                        </a>
                                    </td>
                                @endcan                              
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $programas->render() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection