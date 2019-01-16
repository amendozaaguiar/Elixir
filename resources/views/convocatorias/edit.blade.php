@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Convocatoria</div>

                <div class="card-body">                    
                    {!! Form::model($convocatoria, ['route' => ['convocatorias.update', $convocatoria->id],
                    'method' => 'PUT']) !!}

                        @include('convocatorias.partials.form')
                        
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection