@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Programas</div>

                <div class="card-body">                    
                    {!! Form::model($programa, ['route' => ['programas.update', $programa->id],
                    'method' => 'PUT']) !!}

                        @include('programas.partials.form')
                        
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection