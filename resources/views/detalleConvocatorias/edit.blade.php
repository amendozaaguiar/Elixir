@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Detalle convocatoria
                    @include('layouts.volver')
                </div>

                <div class="card-body">                    
                    {!! Form::model($detalleConvocatoria, ['route' => ['detalleConvocatorias.update', $detalleConvocatoria->id],
                    'method' => 'PUT']) !!}

                        @include('detalleConvocatorias.partials.form')
                        
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection