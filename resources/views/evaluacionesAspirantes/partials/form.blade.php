<!--Calificacion Hoja de vida-->
<div class="form-group">
	<h6>Calificacion Hoja de Vida</h6>
	<div class="form-row">
		<div class="col-md-10">
			{{ Form::label('pregrado', 'Titulo pregado') }}
		</div>
		<div class="col-md-2">                    
			{{ Form::input('number','pregrado', null, ['class' => 'form-control', 'id' => 'pregrado', 'readonly' => 'true']) }}
		</div>
	</div>

	<div class="form-row">
		<div class="col-md-10">
			{{ Form::label('especialista', 'Titulo especialista') }}
		</div>
		<div class="col-md-2">                      
			{{ Form::input('number','especialista', null, ['class' => 'form-control', 'id' => 'especialista', 'readonly' => 'true'] ) }}
		</div>
	</div>

	<div class="form-row">
		<div class="col-md-10">
			{{ Form::label('magister_esp_medica', 'Titulo magister o especialización medica') }}
		</div>
		<div class="col-md-2">                     
			{{ Form::input('number','magister_esp_medica', null, ['class' => 'form-control', 'id' => 'magister_esp_medica', 'readonly' => 'true'] ) }}
		</div>
	</div>

	<div class="form-row">
		<div class="col-md-10">
			{{ Form::label('doctorado', 'Titulo de doctorado')}}
		</div>
		<div class="col-md-2">   
			{{ Form::input('number','doctorado', null, ['class' => 'form-control', 'id' => 'doctorado', 'readonly' => 'true'] ) }}
		</div>
	</div>

	<div class="form-row"> 
		<div class="col-md-10">
			{{ Form::label('seminarios_cursos', 'Seminario Docencia Distancia UniTolima y Cursos en el área de pedagogía')}}
		</div>
		<div class="col-md-2"> 
			{{ Form::input('number','seminarios_cursos', null, ['class' => 'form-control', 'id' => 'seminarios_cursos', 'readonly' => 'true'] ) }}
		</div>
	</div>

	<div class="form-row">
		<div class="col-md-10">
			{{ Form::label('experiencia_docencia_universitaria', 'Experiencia en docencia universitaria')}}
		</div>
		<div class="col-md-2"> 
			{{ Form::input('number','experiencia_docencia_universitaria', null, ['class' => 'form-control', 'id' => 'experiencia_docencia_universitaria', 'readonly' => 'true'] ) }}
		</div>                
	</div>

	<div class="form-row">
		<div class="col-md-10">        
			{{ Form::label('produccion_intelectual', 'Produccion intelectual') }}
		</div>
		<div class="col-md-2"> 
			{{ Form::input('number','produccion_intelectual', null, ['class' => 'form-control', 'id' => 'produccion_intelectual', 'readonly' => 'true'] ) }}
		</div>
	</div>

	<div class="form-row">            
		<div class="col-md-10">   
			{{ Form::label('experiencia_profesional', 'Experiencia profesional') }}
		</div>
		<div class="col-md-2">
			{{ Form::input('number','experiencia_profesional', null, ['class' => 'form-control', 'id' => 'experiencia_profesional', 'readonly' => 'true'] ) }}
		</div>
	</div>
	<div class="form-row">  
		<div class="col-md-10">   
			{{ Form::label('total_hoja_vida', 'Total') }}
		</div>
		<div class="col-md-2">
			{{ Form::input('number','total_hoja_vida', null, ['class' => 'form-control border-success', 'id' => 'total_hoja_vida', 'readonly' => 'true'] ) }}
		</div>
	</div>
</div>
<hr>
<div class="form-group">
	<h6>Calificacion Entrevista</h6>
	<div class="form-row">
		<div class="col-md-10">
			{{ Form::label('ensayo', 'Ensayo') }}
		</div>
		<div class="col-md-2">                    
			{{ Form::input('number','ensayo', null, ['class' => 'form-control', 'id' => 'ensayo']) }}
		</div>
	</div>

	<div class="form-row">
		<div class="col-md-10">
			{{ Form::label('prueba_conocimiento', 'Prueba de conocimiento') }}
		</div>
		<div class="col-md-2">                    
			{{ Form::input('number','prueba_conocimiento', null, ['class' => 'form-control', 'id' => 'prueba_conocimiento']) }}
		</div>
	</div>

	<div class="form-row">
		<div class="col-md-10">
			{{ Form::label('jurado_1', 'Jurado N° 1') }}
		</div>
		<div class="col-md-2">                    
			{{ Form::input('number','jurado_1', null, ['class' => 'form-control', 'id' => 'jurado_1', 'onblur' => 'calcularTotaEntrevista()']) }}
		</div>
	</div>
	<div class="form-row">
		<div class="col-md-10">
			{{ Form::label('jurado_2', 'Jurado N° 2') }}
		</div>
		<div class="col-md-2">                    
			{{ Form::input('number','jurado_2', null, ['class' => 'form-control', 'id' => 'jurado_2', 'onblur' => 'calcularTotaEntrevista()']) }}
		</div>
	</div>
	<div class="form-row">
		<div class="col-md-10">
			{{ Form::label('jurado_3', 'Jurado N° 3') }}
		</div>
		<div class="col-md-2">                    
			{{ Form::input('number','jurado_3', null, ['class' => 'form-control', 'id' => 'jurado_3', 'onblur' => 'calcularTotaEntrevista()']) }}
		</div>
	</div>
	<div class="form-row">
		<div class="col-md-10">
			{{ Form::label('total_entrevista', 'Total entrevista') }}
		</div>
		<div class="col-md-2">                    
			{{ Form::input('number','total_entrevista', null, ['class' => 'form-control border-success', 'id' => 'total_entrevista', 'readOnly' => 'true' ]) }}
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
