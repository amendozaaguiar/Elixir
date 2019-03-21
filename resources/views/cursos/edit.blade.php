@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Cursos
                    @include('layouts.volver')
                </div>

                <div class="card-body">                    
                    {!! Form::model($curso, ['route' => ['cursos.update', $curso->id],
                    'method' => 'PUT']) !!}

                        @include('cursos.partials.form')
                        
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection