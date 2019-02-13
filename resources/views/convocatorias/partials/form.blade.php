<div class="form-group">
	<div class="row">
		<div class="col-md-12">
			{{ Form::label('descripcion', 'Descripcion') }}
			{{ Form::textarea('descripcion', null, ['class' => 'form-control', 'id' => 'descripcion']) }}
		</div>
	</div>
</div>
<div class="form-group">
	<div class="row">
		<div class="col-md-6">
			{{ Form::label('fecha_inicio', 'Fecha de inicio') }}
			{{ Form::date('fecha_inicio', null, ['class' => 'form-control', 'id' => 'fecha_inicio']) }}
		</div>
	
		<div class="col-md-6">
			{{ Form::label('fecha_finalizacion', 'Fecha de finalizacion') }}
			{{ Form::date('fecha_finalizacion', null, ['class' => 'form-control', 'id' => 'fecha_finalizacion']) }}
		</div>
	</div>
	<div class="row">
		<div class="col-md-2">
			{{ Form::label('activa', 'Activa')}}
			{{ Form::select('activa', [1=>'Si', 0=>'Terminada'], null,['class' => 'form-control', 'id' => 'activa']) }}
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
