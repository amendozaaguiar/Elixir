<div class="form-group">
	<div class="row">
		<div class="col-md-6">
			{{ Form::label('tipo_documento_id', 'Tipo de Documento')}}
			{{ Form::select('detail[tipo_documento_id]', $documentos, null,  ['class' => 'form-control', 'id' => 'tipo_documento_id']) }}
		</div>
		<div class="col-md-6">
			{{ Form::label('numero_documento', 'Numero de Documento')}}
			{{ Form::text('detail[numero_documento]', null, ['class' => 'form-control', 'id' => 'numero_documento']) }}
		</div>
	</div>
</div>
<div class="form-group">
	<div class="row">
		<div class="col-md-6">
			{{ Form::label('primer_nombre', 'Primer Nombre')}}
			{{ Form::text('detail[primer_nombre]', null, ['class' => 'form-control', 'id' => 'primer_nombre']) }}
		</div>

		<div class="col-md-6">
			{{ Form::label('segundo_nombre', 'Segundo Nombre')}}
			{{ Form::text('detail[segundo_nombre]', null, ['class' => 'form-control', 'id' => 'segundo_nombre']) }}
		</div>
	</div>

	<div class="row">
		<div class="col-md-6">
			{{ Form::label('primer_apellido', 'Primer Apellido')}}
			{{ Form::text('detail[primer_apellido]', null, ['class' => 'form-control', 'id' => 'primer_apellido']) }}
		</div>

		<div class="col-md-6">
			{{ Form::label('segundo_apellido', 'Segundo Apellido')}}
			{{ Form::text('detail[segundo_apellido]', null, ['class' => 'form-control', 'id' => 'segundo_apellido']) }}
		</div>
	</div>
</div>

<div class="form-group">
	<div class="row">
		<div class="col-md-6">
				{{ Form::label('password', 'Contraseña')}}
				{{ Form::password('password', ['class' => 'form-control', 'id' => 'password']) }}
			</div>
		<div class="col-md-6">
			{{ Form::label('password-confirm', 'Confirmar contraseña') }}
			{{ Form::password('password-confirm', ['class' => 'form-control', 'id' => 'password-confirm']) }}
		</div>
	</div>
</div>
<div class="form-group">
	<div class="row">
		<div class="col-md-6">
			{{ Form::label('email', 'Correo Electronico')}}
			{{ Form::email('email', null, ['class' => 'form-control', 'id' => 'email']) }}
			</div>
		<div class="col-md-6">
			{{ Form::label('name', '&nbsp')}}
			{{ Form::text('name', (!Auth::check()) ? 'default' : 'internal', ['class' => 'form-control', 'id' => 'name']) }}
		</div>
	</div>
</div>
@unless(!Auth::check())
<hr>
<h3>Lista de roles</h3>
<div class="form-group">
	<ul class="list-unstyled">
		@foreach($roles as $role)
	    <li>
	        <label>
	        {{ Form::checkbox('roles[]', $role->id, null) }}
	        {{ $role->name }}	<em>({{ $role->description }})</em>
	        </label>
	    </li>
	    @endforeach
    </ul>
</div>
@endunless
<div class="form-group">
	<div class="row">
		<div class="col-md-6">
			{{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
		</div>
	</div>
</div>