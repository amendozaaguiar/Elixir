<div class="form-group">
	<div class="row">
		<div class="col-md-12">
			{{ Form::label('programa_id', 'Programa')}}
			{{ Form::select('programa_id', $programas, null,  ['class' => 'form-control', 'id' => 'programa_id']) }}
		</div>
	</div>
</div>
<div class="form-group">
	<div class="row">
		<div class="col-md-12">
			{{ Form::label('nombre', 'Nombre del curso')}}
			{{ Form::text('nombre', null, ['class' => 'form-control', 'id' => 'nombre']) }}
		</div>
	</div>
</div>
<div class="form-group">
	<div class="row">
		<div class="col-md-1">
			{{ Form::label('activo', 'Activo')}}
			{{ Form::select('activo', [1=>'Si', 0=>'No'], null,['class' => 'form-control', 'id' => 'activo']) }}
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
