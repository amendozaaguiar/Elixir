@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Log de auditoria
                </div>

                <div class="card-body">
                    <table class="table table-striped table-hover table-sm">
                        <thead class="thead-dark">
                            <tr>
                                <th>Id</th>
                                <th>Fecha</th>                                
                                <th>Usuario</th>
                                <th>Evento</th>
                                <th>Url</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($audits as $audit)
                            <tr>
                                <td>{{ $audit->id }}</td>
                                <td>{{ $audit->user->email }}</td>
                                <td>{{ $audit->created_at }}</td>
                                <td>{{ $audit->event }}</td>
                                <td>{{ $audit->url }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $audits->render() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection