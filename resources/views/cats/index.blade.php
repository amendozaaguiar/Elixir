@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    CAT
                    @can('cats.create')
                    <a href="{{ route('cats.create') }}" class="btn btn-sm btn-primary float-right">
                        Crear
                    </a>
                    @endcan
                </div>

                <div class="card-body">
                    @include('alerts.info')
                    @include('alerts.errors')
                    <table class="table table-striped table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>id</th>
                                <th>CAT</th>
                                <th>Direccion</th>
                                <th>Email</th>
                                <th>Departamento</th>
                                <th>Municipio</th>
                                <th>Activo</th>
                                <th colspan="3">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cats as $cat)
                            <tr>
                                <td>{{ $cat->id }}</td>
                                <td>{{ $cat->nombre }}</td>
                                <td>{{ $cat->direccion }}</td>
                                <td>{{ $cat->email }}</td>
                                <td>{{ $cat->departamento->nombre }}</td>
                                <td>{{ $cat->municipio->nombre }}</td>
                                <td>{{ $cat->activo ? 'Activo' : 'Inactivo'  }}</td>

                                @can('cats.show')
                                <td width="10px">
                                    <a href="{{ route('cats.show', $cat->id) }}" 
                                    class="btn btn-sm btn btn-primary">
                                        ver
                                    </a>
                                </td>
                                @endcan
                                
                                @can('cats.edit')
                                    <td width="10px">
                                        <a href="{{ route('cats.edit', $cat->id) }}" 
                                        class="btn btn-sm btn btn-success">
                                            editar
                                        </a>
                                    </td>
                                @endcan
                                @can('cats.destroy')
                                    <td width="10px">
                                        {!! Form::open(['route' => ['cats.destroy', $cat->id], 
                                        'method' => 'DELETE']) !!}
                                            <button class="btn btn-sm btn-danger">
                                                Eliminar
                                            </button>
                                        {!! Form::close() !!}
                                    </td>
                                @endcan                                    
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $cats->render() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection