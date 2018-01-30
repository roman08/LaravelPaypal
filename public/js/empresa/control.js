//funcion para compra carrito
$(document).on('change', '#meses', function(){
        //url = $(this).attr('href');
       // var host = $(location).attr('hostname');
        var meses = $(this).val();
        var costo = $('#precio').val();
        var total = (meses * costo);
        total_t = number_format(total);
        $('#deuda').text('$'+total_t+'.00');
         console.log('total'+(meses*costo));
     
});

function number_format(amount, decimals) {

    amount += ''; // por si pasan un numero en vez de un string
    amount = parseFloat(amount.replace(/[^0-9\.]/g, '')); // elimino cualquier cosa que no sea numero o punto

    decimals = decimals || 0; // por si la variable no fue fue pasada

    // si no es un numero o es igual a cero retorno el mismo cero
    if (isNaN(amount) || amount === 0) 
        return parseFloat(0).toFixed(decimals);

    // si es mayor o menor que cero retorno el valor formateado como numero
    amount = '' + amount.toFixed(decimals);

    var amount_parts = amount.split('.'),
        regexp = /(\d+)(\d{3})/;

    while (regexp.test(amount_parts[0]))
        amount_parts[0] = amount_parts[0].replace(regexp, '$1' + ',' + '$2');

    return amount_parts.join('.');
}

//funcion para compra carrito
$(document).on('change', '#plan', function(){
        
        var id = $(this).val();
        var logo = '';
        var total = '';
        var meses = $('#meses').val();

         console.log('option'+meses);
     //   id= $(this).data('id');
        //variables
        

        $.ajax({
            url: '/web/usuario/plan/',
            type: 'GET',
            data: {id: id},
            beforeSend: function(){

                    },
            success: function (data){
                           $('#unitario').text('$'+data.precio+'.00');
                           $('#precio').val(data.precio);

                        if(data.tipoplan == 'Plan Básico'){
                            logo =  '/img/planes/basico/basico.png';
                        }
                        if (data.tipoplan == 'Plan Plus'){
                             logo =  '/img/planes/plus/plus.png';
                            
                        }
                        if(data.tipoplan == 'Plan Premium'){
                             logo =  '/img/planes/premium/premium.png';
                        }

                        $("#logo").attr("src",logo);

                        if (meses) {
                            total = (meses * data.precio);
                            $('#deuda').text('$'+total+'.00');

                        }
                        
                    }
        })
});


$('#mail').on('focusout',function(){
        var correo = $(this).val();
        console.log(correo);
        $.ajax({
            url: '/web/app/empresa/verifica/correo/',
            type: 'GET',
           data: {correo:correo},
            beforeSend: function(){
                    console.log('cargando...');
                    },
            success: function (data){
                           console.log(data);
                           if(data == 0)
                           {
                             console.log('valido');
                           }else
                           {
                            alertify.alert("El correo: "+ correo +", ya se encuentra registrado, por favor ingrese otro correo.");
                            $('#mail').val('');
                           }
                    }
        })
});