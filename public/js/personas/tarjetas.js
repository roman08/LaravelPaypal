/*//funcion para compra carrito
$(document).on('click', '#tdatos', function(e){
        e.preventDefault();
        //url = $(this).attr('href');
       // var host = $(location).attr('hostname');
         console.log('cp: '+$('#cpp').val());
     //   id= $(this).data('id');
        //variables
        var tarjeta = $('#numero_tarjeta').val();
        var banco = $('#banco').val();
        var titular = $('#titular').val();
        var tipo = $('#tipo').val();
        var mes = $('#mes').val();
        var anio = $('#anio').val();
        var cp = $('#cpp').val();
        var id = $('#id').val();

        $.ajax({
            url: '/web/usuario/tarjetas/',
            type: 'GET',
            data: {tarjeta: tarjeta, banco: banco, titular: titular, tipo: tipo, mes: mes, anio: anio, cp: cp, id: id},
            beforeSend: function(){

                    },
            success: function (data){
                           
                           console.log(data)
                           $('#tab:last').append('<tr><td align="center">#</td><td align="center">'+data.numero_tarjeta+'</td><td align="center">'+data.banco+'</td><td align="center">'+data.titular+'</td><td align="center">'+data.tipo+'</td><td align="center">'+data.mes+'</td><td align="center">'+data.anio+'</td><td align="center">'+data.cp+'</td><td align="center"></td></tr>');
                    }
        })
});
*/

