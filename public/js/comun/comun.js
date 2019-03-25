/**CONSULTAR CURSOS DEPENDIENDO DEL PROGRAMA*/
function getCursos(){
    var programa_id = $('#programa_id').val();
    if(programa_id) {
        $.ajax({
            url: "/cursos/todos/programa/"+programa_id,
            type:'get',
            dataType:"json",
            beforeSend: function(){
                
            },
            success:function(data) {
                $('#curso_id').empty();
                $.each(data, function(key, value){
                    $('#curso_id').append('<option value="'+ key +'">' + value + '</option>');
                });
            },
            complete: function(){
                    
            }
        });
    } else {
        $('#curso_id').empty();
    }
}

/*CONSULTAR MUNICIPIOS DEPENDIENDO*/
function getMunicipios(){
    var departamento_id = $('#departamento_id').val();
    if(departamento_id) {
        $.ajax({
            url: "/municipios/todos/departamento/"+departamento_id,
            type:'get',
            dataType:"json",
            beforeSend: function(){
                
            },
            success:function(data) {
                $('#municipio_id').empty();
                $.each(data, function(key, value){
                    $('#municipio_id').append('<option value="'+ key +'">' + value + '</option>');
                });
            },
            complete: function(){
                    
            }
        });
    } else {
        $('#municipio_id').empty();
    }
}

/**MODAL PARA APLICACION A CONVOCATORIRAS*/
$('#AplicarConvocatoriaModal').on('show.bs.modal', function (event) {
  button = $(event.relatedTarget);
  recipient = button.data('convocatoria');

  modal = $(this);
  modal.find('.modal-body #detalleConvocatoria_id').val(recipient);
  modal.find('.modal-body #detalleConvocatoria_id_show').val(recipient);
})

/**MODAL PARA Pre-Seleccion de aspirantes*/
$('#preSeleccionModal').on('show.bs.modal', function (event) {      
    button = $(event.relatedTarget);
    recipient = button.data('aplicacion');    
    modal = $(this);
    modal.find('.modal-body #id').val(recipient);
})