$(document).ready(function () 
    {
        $("body").on('keydown','.numerico',function (event) 
            {
              
                if (event.shiftKey) 
                    {
                        event.preventDefault();
                    }
                if (event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 109 || event.keyCode == 9) 
                    {
                    }
                else 
                    {
                        if (event.keyCode < 95) 
                            {
                                if (event.keyCode < 48 || event.keyCode > 57) 
                                    {
                                        event.preventDefault();
                                    }
                            }
                        else 
                            {
                                if (event.keyCode < 96 || event.keyCode > 105) 
                                    {
                                        event.preventDefault();
                                    }
                            }
                    }
            });
});

jQuery(function($){
    $("#numero_tarjeta").mask("9999-9999-9999-9999",{placeholder:"0000-0000-0000-0000"});
    $(".cpp").mask("99999",{placeholder:"00000"});

    //$('#telefono').mask('9999999999',{placeholder:"__________"});
    $("#codigo_postal").mask("99999",{placeholder:"00000"});
      //email mask
  
});



$('#mails').on('keyup',function(){
        var email = $(this).val();
        var val = ValidateEmail(email);

        if(val)
        {console.log('valido');
            $('#btnDatosC').prop('disabled',false);
            $('#tagValido').css('display','none');
         //console.log(ValidateEmail(email));
        }else{
            console.log('no valido');
            $('#btnDatosC').prop('disabled',true);
            $('#tagValido').css('display','block');
        }
});

 $('#btnDatosC').on('click',function(e){
   
    var email = $('#mails').val();
    var valf = ValidateEmail(email);
    if(!valf)
    {   
        alertify.alert('Ingrese un correo valido');
        e.preventDefault();
    }
 })

function ValidateEmail(email) {
        var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
        return expr.test(email);
    };




    $('#mailEmp').on('keyup',function(){
        var email = $(this).val();
        //console.log('wmaasa='+email);
        var val = ValidateEmail(email);
        if(!email )
        {
            $('#tagValidoEmp').css('display','none');
        }
        if(val)
        {
            $('#btnEmpCompra').prop('disabled',false);
            $('#tagValidoEmp').css('display','none');
         //console.log(ValidateEmail(email));
        }else{
            console.log('no valido');
            $('#btnEmpCompra').prop('disabled',true);
            $('#tagValidoEmp').css('display','block');
        }
});

 $('#btnEmpCompra').on('click',function(e){
   
    var email = $('#mailEmp').val();
    var valf = ValidateEmail(email);
    if(!valf)
    {   
        alertify.alert('Ingrese un correo valido');
        e.preventDefault();
    }
 })


 /*******************
 valida correo no repetido en info cliente
 **********************/

 $('#mails').on('keyup',function(){
         var email = $(this).val();
         console.log('asasdad '+email);
        if(email == '' )
        {
            $('#tagValido').css('display','none');
        }
        $.ajax({
            url: '/web/usuario/valida/correo/',
            type: 'GET',
           data: {email:email},
            beforeSend: function(){
                    //console.log('cargando...');
                    },
            success: function (data){
                           if(data == 0)
                           {
                            // console.log('valido');
                           }else
                           {
                            alertify.alert("El correo: "+ email +", ya se encuentra registrado, por favor ingrese otro correo.");
                            $('#mails').val('');
                           }
                    }
        })
});