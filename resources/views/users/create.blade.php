@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Usuarios
                    @include('layouts.volver')
                </div>
                @include('alerts.errors')
                @include('alerts.info')
                <div class="card-body">                    
                    {{ Form::open(['route' => 'users.store']) }}

                        @include('users.partials.form')
                        
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection