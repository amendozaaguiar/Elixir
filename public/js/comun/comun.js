/**SOLO NUMEROS CON DECIMALES*/
function numeroDecimal(elemento){
    var val = $(elemento).val();        
    if(isNaN(val)){        
         val = val.replace(/[^0-9\,]/g,'');
         if(val.split(',').length>2) 
             val =val.replace(/\,+$/,'');
    }
    $(elemento).val(val);
};


/**CALCULO DEL VALOR PARA LA HOJA DE VIDA*/
function calcularTotalHV(){
    total = parseFloat(0.00);
    total += parseFloat($("#pregrado").val());
    total += parseFloat($("#especialista").val());
    total += parseFloat($("#magister_esp_medica").val());
    total += parseFloat($("#doctorado").val());
    total += parseFloat($("#seminarios_cursos").val());
    total += parseFloat($("#experiencia_docencia_universitaria").val());
    total += parseFloat($("#produccion_intelectual").val());
    total += parseFloat($("#experiencia_profesional").val());
    //total /= 8;
    $("#total_hoja_vida").val(total.toFixed(2));
}

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

    /*
    * EVALUCACION DEL ASPIRANTE
    */    
    aplicacion = button.data('aplicacion');
    $.ajax({
        url: "/evaluacionesAspirantes/aspirante/"+aplicacion,
        type:'get',
        dataType:"json",
        beforeSend: function(){
            
        },
        success:function(data) {
            console.log(data)
            if(!$.isEmptyObject(data))
            {
                modal.find('.modal-body #pregrado').val(data.pregrado);
                modal.find('.modal-body #pregrado').val(data.pregrado)
                modal.find('.modal-body #especialista').val(data.especialista)
                modal.find('.modal-body #magister_esp_medica').val(data.magister_esp_medica)
                modal.find('.modal-body #doctorado').val(data.doctorado)
                modal.find('.modal-body #seminarios_cursos').val(data.seminarios_cursos)
                modal.find('.modal-body #experiencia_docencia_universitaria').val(data.experiencia_docencia_universitaria)
                modal.find('.modal-body #produccion_intelectual').val(data.produccion_intelectual)
                modal.find('.modal-body #experiencia_profesional').val(data.experiencia_profesional)
                modal.find('.modal-body #total_hoja_vida').val(data.total_hoja_vida)
            }
            else
            {
                console.log("No se encontro evalucacion D:")
            }
        },
        complete: function(){
                
        }
    });
})