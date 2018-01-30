$('body').ready(function()
{

    $('#ptarjetas').on('click', function(e)
    {
        $('#button').hide();
    });

    
    $('#pfiscales').on('click', function(e)
    {
        $('#button').show();
    });

    
    $('#pdatos').on('click', function(e)
    {
        $('#button').show();
    });


	$('#estado_id').on('change', function(e)
	{
		id = $(this).val();
		$('#municipio_id').html('');
        $.ajax({
            url: '/web/usuario/municipos',
            type: 'GET',
            data: {id: id},
            beforeSend: function(){

                    },
            success: function (data){
            	//console.log('aqui');
							//console.log(data.datos);
							$.each(data, function(i, item) {
							   // console.log(item.idmunicipio+'--'+item.nombre);
							    $("#municipio_id").append('<option value='+item.idmunicipio+'>'+item.nombre+'</option>');
							});   
														//$('#municipios').html(data.datos);

                    }
		})
    });
});