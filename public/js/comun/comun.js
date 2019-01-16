function getCursos(){
    var id_programa = $('#id_programa').val();
    if(id_programa) {
        $.ajax({
            url: "/cursos/todos/programa/"+id_programa,
            type:'get',
            dataType:"json",
            beforeSend: function(){
                
            },
            success:function(data) {
                $('#id_curso').empty();
                $.each(data, function(key, value){
                    $('#id_curso').append('<option value="'+ key +'">' + value + '</option>');
                });
            },
            complete: function(){
                    
            }
        });
    } else {
        $('#id_curso').empty();
    }
}