@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Log</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-sm table-responsive table-striped">                        
                        <tbody>
                            @foreach ($audits as $key => $audit)
                            <!--Title-->
                            <thead class="thead-dark">
                                <tr>
                                    <th>Id</th>
                                    <th>Usuario</th>                                    
                                    <th>Evento</th>
                                    <th>Ruta</th>
                                    <th>Ip address</th>
                                    <th>Agente</th>
                                    <th>Más</th>
                                </tr>
                            </thead>
                            <tr>
                                <td> {{ $audit->id }} </td>
                                <td> {{ $audit->user->email }} </td>
                                <td> {{ $audit->event }} </td>
                                <td> {{ $audit->auditable_type }} </td>
                                <td> {{ $audit->ip_address }} </td>
                                <td> {{ $audit->user_agent }} </td>
                                <td><button class="btn btn-info btn-sm" data-toggle="collapse" href="#collapse{{ $audit->id }}" role="button" aria-expanded="false" aria-controls="collapse{{ $audit->id }}">+</button></td>
                            </tr>
                            <tr>
                                <td colspan="11">
                                    <div class="collapse" id="collapse{{ $audit->id }}">
                                      <div class="card">
                                        <div class="card-header">
                                            <b>Antes</b>
                                        </div>
                                        <div class="card-body">
                                            <pre>{{ json_encode($audit->old_values) }}</pre>
                                        </div>
                                      </div>
                                       <div class="card">
                                        <div class="card-header">
                                            <b>Despues</b>
                                        </div>
                                        <div class="card-body">
                                            <pre>{{ json_encode($audit->new_values) }}</pre>
                                        </div>
                                      </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
