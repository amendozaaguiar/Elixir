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
  var button = $(event.relatedTarget); // Button that triggered the modal
  var recipient = button.data('convocatoria'); // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this);
  modal.find('.modal-body #detalleConvocatoria_id').val(recipient);
  modal.find('.modal-body #detalleConvocatoria_id_show').val(recipient);
})