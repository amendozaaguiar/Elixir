<table class="table table-striped table-hover">
    <thead class="thead-dark">
        <tr>
            <th>id</th>
            <th>Año</th>
            <th>Descripcion</th>
            <th>Fecha de Inicio</th>
            <th>Fecha de Finalizacion</th>
            <th>Estado</th>
            <th>Ver más</th>
        </tr>
    </thead>
    <tbody>
        @foreach($convocatorias as $convocatoria)
        <tr>
            <td>{{ $convocatoria->id }}</td>
            <td>{{ date('Y',strtotime($convocatoria->fecha_inicio)) }}</td>
            <td>{{ $convocatoria->descripcion }}</td>
            <td>{{ $convocatoria->fecha_inicio }}</td>
            <td>{{ $convocatoria->fecha_finalizacion }}</td>
            <td>{{ $convocatoria->activa ? 'Activa' : 'Terminada'  }}</td>
            @if(auth::user())
                @if($convocatoria->activa)
                <td>
                    <a href="#" data-toggle="modal" data-target="#AplicarConvocatoriaModal" data-convocatoria="{{ $convocatoria->id }}">
                    Ver más
                    </a>
                </td>
                @else
                <td></td>
                @endif
            @else
                @if($convocatoria->activa)
                <td>
                    <a href="{{route('login')}}">Ver más</a>
                </td>
                @else
                <td></td>
                @endif
            @endif
        </tr>
        @endforeach
    </tbody>
</table>


<!-- Modal para aplicar a convocatorias -->
<div class="modal fade" id="AplicarConvocatoriaModal" tabindex="-1" role="dialog" aria-labelledby="AplicarConvocatoriaModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="AplicarConvocatoriaModalLabel">Aplicar a convocatoria.</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {{ Form::open(['route' => 'aplicantesConvocatorias.store']) }}
        {{ Form::hidden('convocatoria_id', null, ['id' => 'convocatoria_id']) }}
        {{ Form::hidden('user_id', null, ['id' => 'user_id']) }}

        <div class="form-group">
            <div class="row">
                <div class="col-md-12">
                {{ Form::label('convocatoria_id_show', 'Convocatoria N°')}}
                {{ Form::text('convocatoria_id_show', null, ['class' => 'form-control', 'id' => 'convocatoria_id_show', 'disabled' => 'true']) }}
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-12">
                    {{ Form::label('hoja_vida', 'Anexar Hoja de Vida')}}
                    <div class="custom-file">
                    {{ Form::label('hoja_vida', 'Buscar archivo...', ['class' => 'custom-file-label'])}}
                    {{ Form::file('hoja_vida',['class' => 'custom-file-input', 'id' => 'hoja_vida']) }}
                    </div>
                </div>
            </div>
        </div>      
        
      </div>
      <div class="modal-footer">
        {{ Form::button('Cerrar', ['class' => 'btn btn-sm btn-secondary', 'data-dismiss' => 'modal']) }}
        {{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
        {{ Form::close() }}
      </div>
    </div>
  </div>
</div>