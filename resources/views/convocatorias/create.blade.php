@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Convocatorias
                    @include('layouts.volver')
                </div>

                <div class="card-body">
                    @include('alerts.info')
                    @include('alerts.errors')                     
                    {{ Form::open(['route' => 'convocatorias.store']) }}

                       @include('convocatorias.partials.form')
                        
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection