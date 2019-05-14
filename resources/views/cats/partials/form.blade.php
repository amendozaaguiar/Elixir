<div class="form-group">
	<div class="row">
		<div class="col-md-12">
			{{ Form::label('nombre', 'Nombre CAT')}}
			{{ Form::text('nombre', null, ['class' => 'form-control', 'id' => 'nombre']) }}
		</div>
	</div>
</div>
<div class="form-group">
	<div class="row">
		<div class="col-md-12">
			{{ Form::label('direccion', 'Direccion') }}
			{{ Form::text('direccion', null, ['class' => 'form-control', 'id' => 'direccion']) }}
		</div>
	</div>
</div>
<div class="form-group">
	<div class="row">
		<div class="col-md-12">
			{{ Form::label('email', 'Correo electronico') }}
			{{ Form::email('email', null, ['class' => 'form-control', 'id' => 'email']) }}
		</div>
	</div>
</div>
<div class="form-group">
	<div class="row">
		<div class="col-md-6">
			{{ Form::label('departamento_id', 'Departamentos')}}
			{{ Form::select('departamento_id', $departamentos, null,  ['class' => 'form-control', 'id' => 'departamento_id', 'onChange' => 'getMunicipios()']) }}
		</div>
		<div class="col-md-6">
			{{ Form::label('municipio_id', 'Municipios')}}
			{{ Form::select('municipio_id', $municipios, null,['class' => 'form-control', 'id' => 'municipio_id']) }}
		</div>
	</div>
</div>
<div class="form-group">
	<div class="row">
		<div class="col-md-1">
			{{ Form::label('activo', 'Estado')}}
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
