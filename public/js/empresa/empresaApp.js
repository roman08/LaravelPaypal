$('body').ready(function()
{
 var count2 = $('#count').val();
 count2 = parseInt(count2);
 
 if(count2 >=3)
 {
    $('#addcategoria').attr('disabled', true);
 }
//evita los espacios en blanco
$(document).on('keydown','#palabras',function(e) 
    { 
        if (e.keyCode == 32) 
        { 
           alertify.error('Disculpe no se permiten espacios en blanco.');
            return false; 
        } 
    }
);


    $('#clasificacion').on('change', function(e)
    {
        var id = $(this).val();
        var elemetos = $('.registros');
       
        
        $('#subcategoria').html('');
        $("#subcategoria").append('<option >Seleccione una subcategoria</option>');
        $.ajax({
            url: '/web/consulta/sucategoria',
            type: 'GET',
            data: {id: id},
            beforeSend: function(){
                        console.log('esperando respuesta');
                    },
            success: function (data){
                //console.log('aqui');
                            $.each(data, function(i, item) {
                                $("#subcategoria").append('<option value='+item.idsubclasificacion+'>'+item.nombre+'</option>');
                                $.each(elemetos, function(c, dato) {
                                   console.log(dato.id +'---'+item.idsubclasificacion);
                                    if(item.idsubclasificacion == dato.id)
                                    {
                                        $("#subcategoria").find("option[value='"+item.idsubclasificacion+"']").prop("hidden",true);
                                    }
                                    
                                }); 
                            });
                    }
        })
    });
});



