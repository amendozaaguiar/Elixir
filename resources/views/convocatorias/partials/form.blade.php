<div class="form-group">
	<div class="row">
		<div class="col-md-12">
			{{ Form::label('cat_id', 'CAT')}}
			{{ Form::select('cat_id', $cat, null,  ['class' => 'form-control', 'id' => 'cat_id']) }}
		</div>
	</div>
</div>

<div class="form-group">
	<div class="row">
		<div class="col-md-6">
			{{ Form::label('programa_id', 'Programa')}}
			{{ Form::select('programa_id', $programas, null,  ['class' => 'form-control', 'id' => 'programa_id', 'onChange' => 'getCursos()']) }}
		</div>
		<div class="col-md-6">
			{{ Form::label('curso_id', 'Cursos')}}
			{{ Form::select('curso_id', $cursos , null,['class' => 'form-control', 'id' => 'curso_id']) }}
		</div>
	</div>
</div>
<div class="form-group">
	<div class="row">
		<div class="col-md-12">
			{{ Form::label('perfil', 'Perfil') }}
			{{ Form::textarea('perfil', null, ['class' => 'form-control']) }}
		</div>
	</div>
</div>
<div class="form-group">
	<div class="row">
		<div class="col-md-12">
			{{ Form::label('requisitos', 'Requisitos') }}
			{{ Form::textarea('requisitos', null, ['class' => 'form-control']) }}
		</div>
	</div>
</div>
<div class="form-group">
	<div class="row">
		<div class="col-md-6">
			{{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
		</div>
	</div>
</div>
