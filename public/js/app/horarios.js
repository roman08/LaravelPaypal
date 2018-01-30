$('body').ready(function()
{
   var opcionElegida = $('#opcionElegida').val();

   //alert(opcionElegida);
   //alertify.alert(opcionElegida);
 //  alertify.success("Has pulsado <strong>"                             + alertify.labels.ok                              + "</strong>");
   switch (opcionElegida) 
   { 
        case '2': 
        // Hacer algo si el checkbox ha sido seleccionado
            $("#diasHorario").css("display", "block");
            break;
        case '3': 
            $("#horarioQuebrado").css("display", "block");
            break;
        default:
            console.log('No hay resultados!!');
    }
});
$(document).on('click','.check', function() 
{
    
    var check = $(this).attr('id');
    switch (check) 
    { 
        case 'LunesH': 
            if( $(this).is(':checked') ){
            // Hacer algo si el checkbox ha sido seleccionado
                $("#spamlunes").css("display", "block");
                $("#abrelunes1").prop( "disabled", false );
                $("#cierralunes1").prop( "disabled", false );
                aumentaDias();
            } else {
            // Hacer algo si el checkbox ha sido deseleccionado
                $("#spamlunes").css("display", "none");
                $("#spamlunesmenos").css("display", "none");
                $("#abrelunes1").prop( "disabled", true );
                $("#cierralunes1").prop( "disabled", true );
                $("#abrelunes2").css("display", "none");
                $("#cierralunes2").css("display", "none");
                reduceDias();
            }
            break;
        case 'MartesH': 
            if( $(this).is(':checked') ){
            // Hacer algo si el checkbox ha sido seleccionado
                $("#spammartes").css("display", "block");
                $("#abremartes1").prop( "disabled", false );
                $("#cierramartes1").prop( "disabled", false );
                aumentaDias();
            } else {
            // Hacer algo si el checkbox ha sido deseleccionado
                $("#spammartes").css("display", "none");
                $("#spammartesmenos").css("display", "none");
                $("#abremartes1").prop( "disabled", true );
                $("#cierramartes1").prop( "disabled", true );
                $("#abremartes2").css("display", "none");
                $("#cierramartes2").css("display", "none");
                reduceDias();
            }
            break;
        case 'MiercolesH': 
            if( $(this).is(':checked') ){
            // Hacer algo si el checkbox ha sido seleccionado
                $("#spammiercoles").css("display", "block");
                $("#abremiercoles1").prop( "disabled", false );
                $("#cierramiercoles1").prop( "disabled", false );
                aumentaDias();
            } else {
            // Hacer algo si el checkbox ha sido deseleccionado
                $("#spammiercoles").css("display", "none");
                $("#spammiercolesmenos").css("display", "none");
                $("#abremiercoles1").prop( "disabled", true );
                $("#cierramiercoles1").prop( "disabled", true );
                $("#abremiercoles2").css("display", "none");
                $("#cierramiercoles2").css("display", "none");
                reduceDias();
            }
            break;      
        case 'JuevesH': 
            if( $(this).is(':checked') ){
            // Hacer algo si el checkbox ha sido seleccionado
                $("#spamjueves").css("display", "block");
                $("#abrejueves1").prop( "disabled", false );
                $("#cierrajueves1").prop( "disabled", false );
                aumentaDias();
            } else {
            // Hacer algo si el checkbox ha sido deseleccionado
                $("#spamjueves").css("display", "none");
                $("#spamjuevesmenos").css("display", "none");
                $("#abrejueves1").prop( "disabled", true );
                $("#cierrajueves1").prop( "disabled", true );
                $("#abrejueves2").css("display", "none");
                $("#cierrajueves2").css("display", "none");
                reduceDias();
            }
            break;
        case 'ViernesH': 
            if( $(this).is(':checked') ){
            // Hacer algo si el checkbox ha sido seleccionado
                $("#spamviernes").css("display", "block");
                $("#abreviernes1").prop( "disabled", false );
                $("#cierraviernes1").prop( "disabled", false );
                aumentaDias();
            } else {
            // Hacer algo si el checkbox ha sido deseleccionado
                $("#spamviernes").css("display", "none");
                $("#spamviernesmenos").css("display", "none");
                $("#abreviernes1").prop( "disabled", true );
                $("#cierraviernes1").prop( "disabled", true );
                $("#abreviernes2").css("display", "none");
                $("#cierraviernes2").css("display", "none");
                reduceDias();
            }
            break;
        case 'SabadoH': 
            if( $(this).is(':checked') ){
            // Hacer algo si el checkbox ha sido seleccionado
                $("#spamsabado").css("display", "block");
                $("#abresabado1").prop( "disabled", false );
                $("#cierrasabado1").prop( "disabled", false );
                aumentaDias();
            } else {
            // Hacer algo si el checkbox ha sido deseleccionado
                $("#spamsabado").css("display", "none");
                $("#spamsabadomenos").css("display", "none");
                $("#abresabado1").prop( "disabled", true );
                $("#cierrasabado1").prop( "disabled", true );
                $("#abresabado2").css("display", "none");
                $("#cierrasabado2").css("display", "none");
                reduceDias();
            }
            break;
        case 'DomingoH': 
            if( $(this).is(':checked') ){
            // Hacer algo si el checkbox ha sido seleccionado
                $("#spamdomigo").css("display", "block");
                $("#abredomingo1").prop( "disabled", false );
                $("#cierradomingo1").prop( "disabled", false );
                aumentaDias();
            } else {
            // Hacer algo si el checkbox ha sido deseleccionado
                $("#spamdomingo").css("display", "none");
                $("#spamdomingomenos").css("display", "none");
                $("#abredomingo1").prop( "disabled", true );
                $("#cierradomingo1").prop( "disabled", true );
                $("#abredomingo2").css("display", "none");
                $("#cierradomingo2").css("display", "none");
                reduceDias();
            }
            break;
        default:
            alert('No hay resultados!!');
    }
    
});
function aumentaDias(){
    var diasCheckTotal = $('#diasSeleccionados').val();
    $('#diasSeleccionados').val(diasCheckTotal+1);
}
function reduceDias()
{
     var diasCheckTotal = $('#diasSeleccionados').val();
     var total = diasCheckTotal-1;
     if(total == 0)
     {
        var total = null;
     }

     $('#diasSeleccionados').val(total);
}
$(document).on('click','#personalizado',function () 
{
    $("#diasHorario").css("display", "none");
    $("#horarioQuebrado").css("display", "none");
});

$(document).on('click','#dias',function () 
{
    $("#diasHorario").css("display", "block");
    $("#horarioQuebrado").css("display", "none");
});

$(document).on('click','#semana',function () 
{
   //bloqueamos todos los campos ya que selecciono el metodo 24/7

    $("#diasHorario").css("display", "none");
    $("#horarioQuebrado").css("display", "block");
});

$(document).on('click','.sapm',function (e) {
    e.preventDefault();
    var id = $(this).attr('id');
    $('.etiqueta').css("display", "block")
    $("#"+id).css("display", "none");
    //alert(id);
    switch (id)
    { 
        case 'spamlunes':
            $("#abrelunes2").css("display", "block");
            $("#cierralunes2").css("display", "block");
            $("#spamlunesmenos").css("display", "block");
            $("#quebradolunes").val(1);
            break;
        case 'spammartes': 
            $("#abremartes2").css("display", "block");
            $("#cierramartes2").css("display", "block");
            $("#spammartesmenos").css("display", "block");
            $("#quebradomartes").val(1);
            break;
        case 'spammiercoles': 
            $("#abremiercoles2").css("display", "block");
            $("#cierramiercoles2").css("display", "block");
            $("#spammiercolesmenos").css("display", "block");
            $("#quebradomiercoles").val(1);
            break;      
        case 'spamjueves': 
            $("#abrejueves2").css("display", "block");
            $("#cierrajueves2").css("display", "block");
            $("#spamjuevesmenos").css("display", "block");
            $("#quebradojueves").val(1);
            break;
        case 'spamviernes': 
            $("#abreviernes2").css("display", "block");
            $("#cierraviernes2").css("display", "block");
            $("#spamviernesmenos").css("display", "block");
            $("#quebradoviernes").val(1);
            break;
        case 'spamsabado': 
            $("#abresabado2").css("display", "block");
            $("#cierrasabado2").css("display", "block");
            $("#spamsabadomenos").css("display", "block");
            $("#quebradosabado").val(1);
            break;
        case 'spamdomigo': 
            $("#abredomingo2").css("display", "block");
            $("#cierradomingo2").css("display", "block");
            $("#spamdomigomenos").css("display", "block");
            $("#quebradodomingo").val(1);
            break;
        case 'spamlunesmenos': 
            $("#abrelunes2").css("display", "none");
            $("#cierralunes2").css("display", "none");
            $("#spamlunes").css("display", "block");
            $("#quebradolunes").val(0);
            
            break;
        case 'spammartesmenos': 
            $("#abremartes2").css("display", "none");
            $("#cierramartes2").css("display", "none");
            $("#spammartes").css("display", "block");
            $("#quebradomartes").val(0);
            break;
        case 'spammiercolesmenos': 
            $("#abremiercoles2").css("display", "none");
            $("#cierramiercoles2").css("display", "none");
            $("#spammiercoles").css("display", "block");
            $("#quebradomiercoles").val(0);
            break;      
        case 'spamjuevesmenos': 
            $("#abrejueves2").css("display", "none");
            $("#cierrajueves2").css("display", "none");
            $("#spamjueves").css("display", "block");
            $("#quebradojueves").val(0);
            break;
        case 'spamviernesmenos': 
            $("#abreviernes2").css("display", "none");
            $("#cierraviernes2").css("display", "none");
            $("#spamviernes").css("display", "block");
            $("#quebradoviernes").val(0);
            break;
        case 'spamsabadomenos': 
            $("#abresabado2").css("display", "none");
            $("#cierrasabado2").css("display", "none");
            $("#spamsabado").css("display", "block");
            $("#quebradosabado").val(0);
            break;
        case 'spamdomigomenos': 
            $("#abredomingo2").css("display", "none");
            $("#cierradomingo2").css("display", "none");
            $("#spamdomigo").css("display", "block");
            $("#quebradodomingo").val(0);
            break;
        default:
            alert('No hay resultados!!');
    }
});

$(document).on('change','.selecthora', function(e){
    e.preventDefault();
    var elemento = $(this).attr('id');
    var optionselecionada = $(this).val();

    //alertify.alert('Alert Message!');
   // alert(elemento);
    switch(elemento)
        {
            //casos para el lunes
            case 'cierralunes1':
                var apertura = $('#abrelunes1').val();
                if(optionselecionada <= apertura)
                {

                    alertify.alert("La hora de cierre tiene que ser mayor a la hora de apertura.");
                     $("option:selected", this).attr("selected", false);
                }
            break;

            case 'abrelunes2':
                var apertura = $('#abrelunes1').val();
                var cierre= $('#cierralunes1').val();
                var mensaje = '';
                if(optionselecionada <= apertura)
                {
                    mensaje += 'La hora de apertura de la tarde debe ser mayor a la apertura de la mañana.';
                }
                 if(optionselecionada <= cierre)
                {
                    mensaje += '<br>La hora de apertura de la tarde  tiene que ser mayor a la del cierre de la mañana.';
                }
                if(mensaje)
                {
                    alertify.alert(mensaje);
                    $("option:selected", this).attr("selected", false);

                }
            break;

            case 'cierralunes2':
                var apertura = $('#abrelunes1').val();
                var cierre= $('#cierralunes1').val();
                var apertura2= $('#abrelunes2').val();
                var mensaje = '';
                if(optionselecionada <= apertura)
                {
                    mensaje += 'La hora de cierre de la tardes debe ser mayor a la apertura de la mañana.';
                }
                if(optionselecionada <= cierre)
                {
                    mensaje += '<br>La hora de cierre de la tardes debe ser mayor al cierre de la mañana.';
                }
                 if(optionselecionada <= apertura2)
                {
                    mensaje += '<br>La hora de cierre de la tardes de debe ser mayor a la apertura de la tarde.';
                }
                if(mensaje)
                {
                    alertify.alert(mensaje);
                    $("option:selected", this).attr("selected", false);

                }
            break;

            //casos para el martes
            case 'cierramartes1':
                var apertura = $('#abremartes1').val();
                if(optionselecionada <= apertura)
                {

                    alertify.alert("El horario de cierre debe ser mayor al horario de apertura.");
                     $("option:selected", this).attr("selected", false);
                }
            break;

            case 'abremartes2':
                var apertura = $('#abremartes1').val();
                var cierre= $('#cierramartes1').val();
                var mensaje = '';
                if(optionselecionada <= apertura)
                {
                    mensaje += 'La hora de apertura vespertina debe ser mayor a la apertura mantutina.';
                }
                 if(optionselecionada <= cierre)
                {
                    mensaje += '<br>La hora de apertura de la tarde debe ser mayor al cierre matutino.';
                }
                if(mensaje)
                {
                    alertify.alert(mensaje);
                    $("option:selected", this).attr("selected", false);

                }
            break;

            case 'cierramartes2':
                var apertura = $('#abremartes1').val();
                var cierre= $('#cierramartes1').val();
                var apertura2= $('#abremartes2').val();
                var mensaje = '';
                if(optionselecionada <= apertura)
                {
                    mensaje += 'La hora de cierre vespertino debe ser mayor a la apertura matutina.';
                }
                if(optionselecionada <= cierre)
                {
                    mensaje += '<br>La hora de cierre vespertino debe ser mayor al cierre matutino.';
                }
                 if(optionselecionada <= apertura2)
                {
                    mensaje += '<br>La hora de cierre vespertino de debe ser mayor a la apertura vespertina.';
                }
                if(mensaje)
                {
                    alertify.alert(mensaje);
                    $("option:selected", this).attr("selected", false);

                }
            break;

            //casos para el miercoles
            case 'cierramiercoles1':
                var apertura = $('#abremiercoles1').val();
                if(optionselecionada <= apertura)
                {

                    alertify.alert("El horario de cierre debe ser mayor al horario de apertura.");
                     $("option:selected", this).attr("selected", false);
                }
            break;

            case 'abremiercoles2':
                var apertura = $('#abremiercoles1').val();
                var cierre= $('#cierramiercoles1').val();
                var mensaje = '';
                if(optionselecionada <= apertura)
                {
                    mensaje += 'La hora de apertura vespertina debe ser mayor a la apertura mantutina.';
                }
                 if(optionselecionada <= cierre)
                {
                    mensaje += '<br>La hora de apertura de la tarde debe ser mayor al cierre matutino.';
                }
                if(mensaje)
                {
                    alertify.alert(mensaje);
                    $("option:selected", this).attr("selected", false);

                }
            break;

            case 'cierramiercoles2':
                var apertura = $('#abremiercoles1').val();
                var cierre= $('#cierramiercoles1').val();
                var apertura2= $('#abremiercoles2').val();
                var mensaje = '';
                if(optionselecionada <= apertura)
                {
                    mensaje += 'La hora de cierre vespertino debe ser mayor a la apertura matutina.';
                }
                if(optionselecionada <= cierre)
                {
                    mensaje += '<br>La hora de cierre vespertino debe ser mayor al cierre matutino.';
                }
                 if(optionselecionada <= apertura2)
                {
                    mensaje += '<br>La hora de cierre vespertino de debe ser mayor a la apertura vespertina.';
                }
                if(mensaje)
                {
                    alertify.alert(mensaje);
                    $("option:selected", this).attr("selected", false);

                }
            break;

             //casos para el jueves
            case 'cierrajueves1':
                var apertura = $('#abrejueves1').val();
                if(optionselecionada <= apertura)
                {

                    alertify.alert("El horario de cierre debe ser mayor al horario de apertura.");
                     $("option:selected", this).attr("selected", false);
                }
            break;

            case 'abrejueves2':
                var apertura = $('#abrejueves1').val();
                var cierre= $('#cierrajueves1').val();
                var mensaje = '';
                if(optionselecionada <= apertura)
                {
                    mensaje += 'La hora de apertura vespertina debe ser mayor a la apertura mantutina.';
                }
                 if(optionselecionada <= cierre)
                {
                    mensaje += '<br>La hora de apertura de la tarde debe ser mayor al cierre matutino.';
                }
                if(mensaje)
                {
                    alertify.alert(mensaje);
                    $("option:selected", this).attr("selected", false);

                }
            break;

            case 'cierrajueves2':
                var apertura = $('#abrejueves1').val();
                var cierre= $('#cierrajueves1').val();
                var apertura2= $('#abrejueves2').val();
                var mensaje = '';
                if(optionselecionada <= apertura)
                {
                    mensaje += 'La hora de cierre vespertino debe ser mayor a la apertura matutina.';
                }
                if(optionselecionada <= cierre)
                {
                    mensaje += '<br>La hora de cierre vespertino debe ser mayor al cierre matutino.';
                }
                 if(optionselecionada <= apertura2)
                {
                    mensaje += '<br>La hora de cierre vespertino de debe ser mayor a la apertura vespertina.';
                }
                if(mensaje)
                {
                    alertify.alert(mensaje);
                    $("option:selected", this).attr("selected", false);

                }
            break;

            //casos para el viernes
            case 'cierraviernes1':
                var apertura = $('#abreviernes1').val();
                if(optionselecionada <= apertura)
                {

                    alertify.alert("El horario de cierre debe ser mayor al horario de apertura.");
                     $("option:selected", this).attr("selected", false);
                }
            break;

            case 'abreviernes2':
                var apertura = $('#abreviernes1').val();
                var cierre= $('#cierraviernes1').val();
                var mensaje = '';
                if(optionselecionada <= apertura)
                {
                    mensaje += 'La hora de apertura vespertina debe ser mayor a la apertura mantutina.';
                }
                 if(optionselecionada <= cierre)
                {
                    mensaje += '<br>La hora de apertura de la tarde debe ser mayor al cierre matutino.';
                }
                if(mensaje)
                {
                    alertify.alert(mensaje);
                    $("option:selected", this).attr("selected", false);

                }
            break;

            case 'cierraviernes2':
                var apertura = $('#abreviernes1').val();
                var cierre= $('#cierraviernes1').val();
                var apertura2= $('#abreviernes2').val();
                var mensaje = '';
                if(optionselecionada <= apertura)
                {
                    mensaje += 'La hora de cierre vespertino debe ser mayor a la apertura matutina.';
                }
                if(optionselecionada <= cierre)
                {
                    mensaje += '<br>La hora de cierre vespertino debe ser mayor al cierre matutino.';
                }
                 if(optionselecionada <= apertura2)
                {
                    mensaje += '<br>La hora de cierre vespertino de debe ser mayor a la apertura vespertina.';
                }
                if(mensaje)
                {
                    alertify.alert(mensaje);
                    $("option:selected", this).attr("selected", false);

                }
            break;

            //casos para el sabado
            case 'cierrasabado1':
                var apertura = $('#abresabado1').val();
                if(optionselecionada <= apertura)
                {

                    alertify.alert("El horario de cierre debe ser mayor al horario de apertura.");
                     $("option:selected", this).attr("selected", false);
                }
            break;

            case 'abresabado2':
                var apertura = $('#abresabado1').val();
                var cierre= $('#cierrasabado1').val();
                var mensaje = '';
                if(optionselecionada <= apertura)
                {
                    mensaje += 'La hora de apertura vespertina debe ser mayor a la apertura mantutina.';
                }
                 if(optionselecionada <= cierre)
                {
                    mensaje += '<br>La hora de apertura de la tarde debe ser mayor al cierre matutino.';
                }
                if(mensaje)
                {
                    alertify.alert(mensaje);
                    $("option:selected", this).attr("selected", false);

                }
            break;

            case 'cierrasabado2':
                var apertura = $('#abresabado1').val();
                var cierre= $('#cierrasabado1').val();
                var apertura2= $('#abresabado2').val();
                var mensaje = '';
                if(optionselecionada <= apertura)
                {
                    mensaje += 'La hora de cierre vespertino debe ser mayor a la apertura matutina.';
                }
                if(optionselecionada <= cierre)
                {
                    mensaje += '<br>La hora de cierre vespertino debe ser mayor al cierre matutino.';
                }
                 if(optionselecionada <= apertura2)
                {
                    mensaje += '<br>La hora de cierre vespertino de debe ser mayor a la apertura vespertina.';
                }
                if(mensaje)
                {
                    alertify.alert(mensaje);
                    $("option:selected", this).attr("selected", false);

                }
            break;

            //casos para el domingo
            case 'cierradomingo1':
                var apertura = $('#abredomingo1').val();
                if(optionselecionada <= apertura)
                {

                    alertify.alert("El horario de cierre debe ser mayor al horario de apertura.");
                     $("option:selected", this).attr("selected", false);
                }
            break;

            case 'abredomingo2':
                var apertura = $('#abredomingo1').val();
                var cierre= $('#cierradomingo1').val();
                var mensaje = '';
                if(optionselecionada <= apertura)
                {
                    mensaje += 'La hora de apertura vespertina debe ser mayor a la apertura mantutina.';
                }
                 if(optionselecionada <= cierre)
                {
                    mensaje += '<br>La hora de apertura de la tarde debe ser mayor al cierre matutino.';
                }
                if(mensaje)
                {
                    alertify.alert(mensaje);
                    $("option:selected", this).attr("selected", false);

                }
            break;

            case 'cierradomingo2':
                var apertura = $('#abredomingo1').val();
                var cierre= $('#cierradomingo1').val();
                var apertura2= $('#abredomingo2').val();
                var mensaje = '';
                if(optionselecionada <= apertura)
                {
                    mensaje += 'La hora de cierre vespertino debe ser mayor a la apertura matutina.';
                }
                if(optionselecionada <= cierre)
                {
                    mensaje += '<br>La hora de cierre vespertino debe ser mayor al cierre matutino.';
                }
                 if(optionselecionada <= apertura2)
                {
                    mensaje += '<br>La hora de cierre vespertino de debe ser mayor a la apertura vespertina.';
                }
                if(mensaje)
                {
                    alertify.alert(mensaje);
                    $("option:selected", this).attr("selected", false);

                }
            break;
            default:
                console.log('sin resultados');
        }
});


$('body').ready(function(){
    if($('#semana').is(':checked'))
    {
        var diasCheck = $('#diasSeleccionados').val();
   
                    $("form[name='frmHorarios']").validate({
            ignore: [],
            rules: {

              diasSeleccionados: {
                required: true,
                
              },
                },
                messages: {
                 
                  diasSeleccionados:
                  {
                    required: "Debe Seleccionar minimo 1 dia para el horario.",
                  },
                  
                },
                errorPlacement: function (error, element) {
                   alertify.alert(error.text());
                },
                highlight: function(element) {
                    $(element).closest('.form-group').addClass('has-error');
                },
                unhighlight: function(element) {
                    $(element).closest('.form-group').removeClass('has-error');
                }
    });
        
    } 





});
