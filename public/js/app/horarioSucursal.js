
$(document).on('click','.checkSucursal', function() 
{
    var check = $(this).attr('id');
    switch (check) 
    { 
        case 'LunesSucursal': 
            if( $(this).is(':checked') ){
            // Hacer algo si el checkbox ha sido seleccionado
                $("#spamlunesSucursal").css("display", "block");
                $("#abrelunesSucursal1").prop( "disabled", false );
                $("#cierralunesSucursal1").prop( "disabled", false );
                aumentaDiasSucursal();
            } else {
            // Hacer algo si el checkbox ha sido deseleccionado
                $("#spamlunesSucursal").css("display", "none");
                $("#spamlunesmenosSucursal").css("display", "none");
                $("#abrelunesSucursal1").prop( "disabled", true );
                $("#cierralunesSucursal1").prop( "disabled", true );
                $("#abrelunesSucursal2").css("display", "none");
                $("#cierralunesSucursal2").css("display", "none");
                reduceDiasSucursal();
            }
            break;
        case 'MartesSucursal': 
            if( $(this).is(':checked') ){
            // Hacer algo si el checkbox ha sido seleccionado
                $("#spammartesSucursal").css("display", "block");
                $("#abremartesSucursal1").prop( "disabled", false );
                $("#cierramartesSucursal1").prop( "disabled", false );
                aumentaDiasSucursal();
            } else {
            // Hacer algo si el checkbox ha sido deseleccionado
                $("#spammartesSucursal").css("display", "none");
                $("#spammartesmenosSucursal").css("display", "none");
                $("#abremartesSucursal1").prop( "disabled", true );
                $("#cierramartesSucursal1").prop( "disabled", true );
                $("#abremartesSucursal2").css("display", "none");
                $("#cierramartesSucursal2").css("display", "none");
                reduceDiasSucursal();
            }
            break;
        case 'MiercolesSucursal': 
            if( $(this).is(':checked') ){
            // Hacer algo si el checkbox ha sido seleccionado
                $("#spammiercolesSucursal").css("display", "block");
                $("#abremiercolesSucursal1").prop( "disabled", false );
                $("#cierramiercolesSucursal1").prop( "disabled", false );
                aumentaDiasSucursal();
            } else {
            // Hacer algo si el checkbox ha sido deseleccionado
                $("#spammiercolesSucursal").css("display", "none");
                $("#spammiercolesmenosSucursal").css("display", "none");
                $("#abremiercolesSucursal1").prop( "disabled", true );
                $("#cierramiercolesSucursal1").prop( "disabled", true );
                $("#abremiercolesSucursal2").css("display", "none");
                $("#cierramiercolesSucursal2").css("display", "none");
                reduceDiasSucursal();
            }
            break;      
        case 'JuevesSucursal': 
            if( $(this).is(':checked') ){
            // Hacer algo si el checkbox ha sido seleccionado
                $("#spamjuevesSucursal").css("display", "block");
                $("#abrejuevesSucursal1").prop( "disabled", false );
                $("#cierrajuevesSucursal1").prop( "disabled", false );
                aumentaDiasSucursal();
            } else {
            // Hacer algo si el checkbox ha sido deseleccionado
                $("#spamjuevesSucursal").css("display", "none");
                $("#spamjuevesmenosSucursal").css("display", "none");
                $("#abrejuevesSucursal1").prop( "disabled", true );
                $("#cierrajuevesSucursal1").prop( "disabled", true );
                $("#abrejuevesSucursal2").css("display", "none");
                $("#cierrajuevesSucursal2").css("display", "none");
                reduceDiasSucursal();
            }
            break;
        case 'ViernesSucursal': 
            if( $(this).is(':checked') ){
            // Hacer algo si el checkbox ha sido seleccionado
                $("#spamviernesSucursal").css("display", "block");
                $("#abreviernesSucursal1").prop( "disabled", false );
                $("#cierraviernesSucursal1").prop( "disabled", false );
                aumentaDiasSucursal();
            } else {
            // Hacer algo si el checkbox ha sido deseleccionado
                $("#spamviernesSucursal").css("display", "none");
                $("#spamviernesmenosSucursal").css("display", "none");
                $("#abreviernesSucursal1").prop( "disabled", true );
                $("#cierraviernesSucursal1").prop( "disabled", true );
                $("#abreviernesSucursal2").css("display", "none");
                $("#cierraviernesSucursal2").css("display", "none");
                reduceDiasSucursal();
            }
            break;
        case 'SabadoSucursal': 
            if( $(this).is(':checked') ){
            // Hacer algo si el checkbox ha sido seleccionado
                $("#spamsabadoSucursal").css("display", "block");
                $("#abresabadoSucursal1").prop( "disabled", false );
                $("#cierrasabadoSucursal1").prop( "disabled", false );
                aumentaDiasSucursal();
            } else {
            // Hacer algo si el checkbox ha sido deseleccionado
                $("#spamsabadoSucursal").css("display", "none");
                $("#spamsabadomenosSucursal").css("display", "none");
                $("#abresabadoSucursal1").prop( "disabled", true );
                $("#cierrasabadoSucursal1").prop( "disabled", true );
                $("#abresabadoSucursal2").css("display", "none");
                $("#cierrasabadoSucursal2").css("display", "none");
                reduceDiasSucursal();
            }
            break;
        case 'DomingoSucursal': 
            if( $(this).is(':checked') ){
            // Hacer algo si el checkbox ha sido seleccionado
                $("#spamdomigoSucursal").css("display", "block");
                $("#abredomingoSucursal1").prop( "disabled", false );
                $("#cierradomingoSucursal1").prop( "disabled", false );
                aumentaDiasSucursal();
            } else {
            // Hacer algo si el checkbox ha sido deseleccionado
                $("#spamdomigoSucursal").css("display", "none");
                $("#spamdomingomenosSucursal").css("display", "none");
                $("#abredomingoSucursal1").prop( "disabled", true );
                $("#cierradomingoSucursal1").prop( "disabled", true );
                $("#abredomingoSucursal2").css("display", "none");
                $("#cierradomingoSucursal2").css("display", "none");
                reduceDiasSucursal();
            }
            break;
        default:
            alert('No hay resultados!!');
    }
    
});

$(document).on('click','#personalizadoSucursal',function () 
{
    $('#opcionhorarioSucursaeEdit').val($(this).val());
    $("#diasHorarioSucursal").css("display", "none");
    $("#horarioQuebradoSucursal").css("display", "none");
});

$(document).on('click','#diasSucursal',function () 
{
    $('#opcionhorarioSucursaeEdit').val($(this).val());
    $("#diasHorarioSucursal").css("display", "block");
    $("#horarioQuebradoSucursal").css("display", "none");
});

$(document).on('click','#semanaSucursal',function () 
{
   
    $('#opcionhorarioSucursaeEdit').val($(this).val());
    $("#diasHorarioSucursal").css("display", "none");
    $("#horarioQuebradoSucursal").css("display", "block");
});

$(document).on('click','.sapmSucursal',function (e) 
{
    e.preventDefault();
    var id = $(this).attr('id');
    $("#"+id).css("display", "none");
   //alert(id);
   switch (id) 
   { 
        case 'spamlunesSucursal':
            $("#abrelunesSucursal2").css("display", "block");
            $("#cierralunesSucursal2").css("display", "block");
            $("#spamlunesmenosSucursal").css("display", "block");
            $("#quebradolunesSucursal").val(1);
            break;
        case 'spammartesSucursal': 
            $("#abremartesSucursal2").css("display", "block");
            $("#cierramartesSucursal2").css("display", "block");
            $("#spammartesmenosSucursal").css("display", "block");
            $("#quebradomartesSucursal").val(1);
            break;
        case 'spammiercolesSucursal': 
            $("#abremiercolesSucursal2").css("display", "block");
            $("#cierramiercolesSucursal2").css("display", "block");
            $("#spammiercolesmenosSucursal").css("display", "block");
            $("#quebradomiercolesSucursal").val(1);
            break;      
        case 'spamjuevesSucursal': 
            $("#abrejuevesSucursal2").css("display", "block");
            $("#cierrajuevesSucursal2").css("display", "block");
            $("#spamjuevesmenosSucursal").css("display", "block");
            $("#quebradojuevesSucursal").val(1);
            break;
        case 'spamviernesSucursal': 
            $("#abreviernesSucursal2").css("display", "block");
            $("#cierraviernesSucursal2").css("display", "block");
            $("#spamviernesmenosSucursal").css("display", "block");
            $("#quebradoviernesSucursal").val(1);
            break;
        case 'spamsabadoSucursal': 
            $("#abresabadoSucursal2").css("display", "block");
            $("#cierrasabadoSucursal2").css("display", "block");
            $("#spamsabadomenosSucursal").css("display", "block");
            $("#quebradosabadoSucursal").val(1);
            break;
        case 'spamdomigoSucursal': 
            $("#abredomingoSucursal2").css("display", "block");
            $("#cierradomingoSucursal2").css("display", "block");
            $("#spamdomigomenosSucursal").css("display", "block");
            $("#quebradodomingoSucursal").val(1);
            break;
        case 'spamlunesmenosSucursal': 
            $("#abrelunesSucursal2").css("display", "none");
            $("#cierralunesSucursal2").css("display", "none");
            $("#spamlunesSucursal").css("display", "block");
            $("#quebradolunesSucursal").val(0);
            
            break;
        case 'spammartesmenosSucursal': 
            $("#abremartesSucursal2").css("display", "none");
            $("#cierramartesSucursal2").css("display", "none");
            $("#spammartesSucursal").css("display", "block");
            $("#quebradomartesSucursal").val(0);
            break;
        case 'spammiercolesmenosSucursal': 
            $("#abremiercolesSucursal2").css("display", "none");
            $("#cierramiercolesSucursal2").css("display", "none");
            $("#spammiercolesSucursal").css("display", "block");
            $("#quebradomiercolesSucursal").val(0);
            break;      
        case 'spamjuevesmenosSucursal': 
            $("#abrejuevesSucursal2").css("display", "none");
            $("#cierrajuevesSucursal2").css("display", "none");
            $("#spamjuevesSucursal").css("display", "block");
            $("#quebradojuevesSucursal").val(0);
            break;
        case 'spamviernesmenosSucursal': 
            $("#abreviernesSucursal2").css("display", "none");
            $("#cierraviernesSucursal2").css("display", "none");
            $("#spamviernesSucursal").css("display", "block");
            $("#quebradoviernesSucursal").val(0);
            break;
        case 'spamsabadomenosSucursal': 
            $("#abresabadoSucursal2").css("display", "none");
            $("#cierrasabadoSucursal2").css("display", "none");
            $("#spamsabadoSucursal").css("display", "block");
            $("#quebradosabadoSucursal").val(0);
            break;
        case 'spamdomigomenosSucursal': 
            $("#abredomingoSucursal2").css("display", "none");
            $("#cierradomingoSucursal2").css("display", "none");
            $("#spamdomigoSucursal").css("display", "block");
            $("#quebradodomingoSucursal").val(0);
            break;
        default:
            alert('No hay resultados!!');
    }
});

$(document).on('change','.selectSucursal', function(e)
{
    e.preventDefault();
    var elemento = $(this).attr('id');
    var optionselecionada = $(this).val();

    //alertify.alert('Alert Message!');
   // alert(elemento);
    switch(elemento)
        {
            //casos para el lunes
            case 'cierralunesSucursal1':
                var apertura = $('#abrelunesSucursal1').val();
                if(optionselecionada <= apertura)
                {

                    alertify.alert("El horario de cierre debe ser mayor al horario de apertura.");
                     $("option:selected", this).attr("selected", false);
                }
            break;

            case 'abrelunesSucursal2':
                var apertura = $('#abrelunesSucursal1').val();
                var cierre= $('#cierralunesSucursal1').val();
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

            case 'cierralunesSucursal2':
                var apertura = $('#abrelunesSucursal1').val();
                var cierre= $('#cierralunesSucursal1').val();
                var apertura2= $('#abrelunesSucursal2').val();
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

            //casos para el martes
            case 'cierramartesSucursal1':
                var apertura = $('#abremartesSucursal1').val();
                if(optionselecionada <= apertura)
                {

                    alertify.alert("El horario de cierre debe ser mayor al horario de apertura.");
                     $("option:selected", this).attr("selected", false);
                }
            break;

            case 'abremartesSucursal2':
                var apertura = $('#abremartesSucursal1').val();
                var cierre= $('#cierramartesSucursal1').val();
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

            case 'cierramartesSucursal2':
                var apertura = $('#abremartesSucursal1').val();
                var cierre= $('#cierramartesSucursal1').val();
                var apertura2= $('#abremartesSucursal2').val();
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
            case 'cierramiercolesSucursal1':
                var apertura = $('#abremiercolesSucursal1').val();
                if(optionselecionada <= apertura)
                {

                    alertify.alert("El horario de cierre debe ser mayor al horario de apertura.");
                     $("option:selected", this).attr("selected", false);
                }
            break;

            case 'abremiercolesSucursal2':
                var apertura = $('#abremiercolesSucursal1').val();
                var cierre= $('#cierramiercolesSucursal1').val();
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

            case 'cierramiercolesSucursal2':
                var apertura = $('#abremiercolesSucursal1').val();
                var cierre= $('#cierramiercolesSucursal1').val();
                var apertura2= $('#abremiercolesSucursal2').val();
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
            case 'cierrajuevesSucursal1':
                var apertura = $('#abrejuevesSucursal1').val();
                if(optionselecionada <= apertura)
                {

                    alertify.alert("El horario de cierre debe ser mayor al horario de apertura.");
                     $("option:selected", this).attr("selected", false);
                }
            break;

            case 'abrejuevesSucursal2':
                var apertura = $('#abrejuevesSucursal1').val();
                var cierre= $('#cierrajuevesSucursal1').val();
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

            case 'cierrajuevesSucursal2':
                var apertura = $('#abrejuevesSucursal1').val();
                var cierre= $('#cierrajuevesSucursal1').val();
                var apertura2= $('#abrejuevesSucursal2').val();
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
            case 'cierraviernesSucursal1':
                var apertura = $('#abreviernesSucursal1').val();
                if(optionselecionada <= apertura)
                {

                    alertify.alert("El horario de cierre debe ser mayor al horario de apertura.");
                     $("option:selected", this).attr("selected", false);
                }
            break;

            case 'abreviernesSucursal2':
                var apertura = $('#abreviernesSucursal1').val();
                var cierre= $('#cierraviernesSucursal1').val();
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

            case 'cierraviernesSucursal2':
                var apertura = $('#abreviernesSucursal1').val();
                var cierre= $('#cierraviernesSucursal1').val();
                var apertura2= $('#abreviernesSucursal2').val();
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
            case 'cierrasabadoSucursal1':
                var apertura = $('#abresabadoSucursal1').val();
                if(optionselecionada <= apertura)
                {

                    alertify.alert("El horario de cierre debe ser mayor al horario de apertura.");
                     $("option:selected", this).attr("selected", false);
                }
            break;

            case 'abresabadoSucursal2':
                var apertura = $('#abresabadoSucursal1').val();
                var cierre= $('#cierrasabadoSucursal1').val();
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

            case 'cierrasabadoSucursal2':
                var apertura = $('#abresabadoSucursal1').val();
                var cierre= $('#cierrasabadoSucursal1').val();
                var apertura2= $('#abresabadoSucursal2').val();
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
            case 'cierradomingoSucursal1':
                var apertura = $('#abredomingoSucursal1').val();
                if(optionselecionada <= apertura)
                {

                    alertify.alert("El horario de cierre debe ser mayor al horario de apertura.");
                     $("option:selected", this).attr("selected", false);
                }
            break;

            case 'abredomingoSucursal2':
                var apertura = $('#abredomingoSucursal1').val();
                var cierre= $('#cierradomingoSucursal1').val();
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

            case 'cierradomingoSucursal2':
                var apertura = $('#abredomingoSucursal1').val();
                var cierre= $('#cierradomingoSucursal1').val();
                var apertura2= $('#abredomingoSucursal2').val();
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

/**
*Funcion para buscar el horario de la sucursal
*@return modal vista horarios
**/


$(document).on('click','.Horario',function(e){
    e.preventDefault();
    //$('#modal-bodyH').css("display", "block");
    var idsucursal = $(this).attr('id');
    $('#idsucursalhorario').val(idsucursal);
    //$('#myModalH').modal('show');

            $.ajax({
            url: '/web/app/consulta/horario/sucursal/',
            type: 'GET',
           data: {id:idsucursal},
            beforeSend: function(){
                    console.log('cargando...');
                    },
            success: function (data){
                //console.log(data);
                            resetFormulario();
                            $('#opcionhorarioSucursaeEdit').val(data['opcion']);

                           console.log(data);
                            if(data['opcion'] == 0)
                            {
                                $('#modal-bodyH').css("display", "block");
                                $('#myModalH').modal('show');
                            }
                            if(data['opcion'] == 1)
                            {
                                $('#modal-bodyH').css("display", "block");
                                $('#myModalH').modal('show');
                                $('#personalizadoSucursal').prop("checked", true);

                            }

                            if(data['opcion'] == 2)
                            {
                                $('#modal-bodyH').css("display", "block");
                                $('#myModalH').modal('show');
                                $('#diasSucursal').prop("checked", true);

                                $('#diasHorarioSucursal').css("display", "block");
                                if(data.horario[0]['opcion'] == 2)
                                {
                                    $('#LunesS').prop("checked", true);
                                }
                                if(data.horario[1]['opcion'] == 2)
                                {
                                    $('#MartesS').prop("checked", true);
                                }
                                if(data.horario[2]['opcion'] == 2)
                                {
                                    $('#MiercolesS').prop("checked", true);
                                }
                                if(data.horario[3]['opcion'] == 2)
                                {
                                    $('#JuevesS').prop("checked", true);
                                }
                                if(data.horario[4]['opcion'] == 2)
                                {
                                    $('#ViernesS').prop("checked", true);
                                }
                                if(data.horario[5]['opcion'] == 2)
                                {
                                    $('#SabadoS').prop("checked", true);
                                }
                                if(data.horario[6]['opcion'] == 2)
                                {
                                    $('#DomingoS').prop("checked", true);
                                }
                            }

                            if(data['opcion'] == 3)
                            {
                                $('#horarioSucursaeEdit').val(data['totalDiasChek']);
                                $('#modal-bodyH').css("display", "block");
                                $('#myModalH').modal('show');
                                $('#semanaSucursal').prop("checked", true);
                                //validacion para el lunes
                                if(data.horario[0]['opcion'] == 3)
                                {
                                    $('#quebradolunesSucursal').val(1);
                                    $('#LunesSucursal').prop("checked", true);
                                    $("#abrelunesSucursal1 option[value='"+data.horario[0]['turno_inicio'] +"']").prop('selected', true);
                                    $('#abrelunesSucursal1').prop("disabled", false);

                                    $("#cierralunesSucursal1 option[value='"+data.horario[0]['turno_fin'] +"']").prop('selected', true);
                                    $('#cierralunesSucursal1').prop("disabled", false);
                                    if(data.horario[0]['turno_inicio_1'] != null)
                                    {
                                        $("#abrelunesSucursal2 option[value='"+data.horario[0]['turno_inicio_1'] +"']").prop('selected', true);
                                        $('#abrelunesSucursal2').css('display','block');
                                        $('#spamlunesmenosSucursal').css('display','block');
                                    }else
                                    {
                                        $('#spamlunesSucursal').css('display','block');
                                    }
                                    
                                    if(data.horario[0]['turno_fin_1'])
                                    {
                                        $("#cierralunesSucursal2 option[value='"+data.horario[0]['turno_fin_1'] +"']").prop('selected', true);
                                        $('#cierralunesSucursal2').css('display','block');
                                    }
                                }

                                //validacion para el martes
                                if(data.horario[1]['opcion'] == 3)
                                {
                                    $('#quebradomartesSucursal').val(1);
                                    $('#MartesSucursal').prop("checked", true);
                                    $("#abremartesSucursal1 option[value='"+data.horario[1]['turno_inicio'] +"']").prop('selected', true);
                                    $('#abremartesSucursal1').prop("disabled", false);

                                    $("#cierramartesSucursal1 option[value='"+data.horario[1]['turno_fin'] +"']").prop('selected', true);
                                    $('#cierramartesSucursal1').prop("disabled", false);
                                    if(data.horario[1]['turno_inicio_1'] != null)
                                    {
                                        $("#abremartesSucursal2 option[value='"+data.horario[1]['turno_inicio_1'] +"']").prop('selected', true);
                                        $('#abremartesSucursal2').css('display','block');
                                        $('#spammartesmenosSucursal').css('display','block');
                                    }else
                                    {
                                        $('#spammartesSucursal').css('display','block');
                                    }
                                    
                                    if(data.horario[1]['turno_fin_1'])
                                    {
                                        $("#cierramartesSucursal2 option[value='"+data.horario[1]['turno_fin_1'] +"']").prop('selected', true);
                                        $('#cierramartesSucursal2').css('display','block');
                                    }
                                }

                                //validacion para el miercoles
                                if(data.horario[2]['opcion'] == 3)
                                {
                                    $('#quebradomiercolesSucursal').val(1);

                                    $('#MiercolesSucursal').prop("checked", true);

                                    $("#abremiercolesSucursal1 option[value='"+data.horario[2]['turno_inicio'] +"']").prop('selected', true);
                                    $('#abremiercolesSucursal1').prop("disabled", false);

                                    $("#cierramiercolesSucursal1 option[value='"+data.horario[2]['turno_fin'] +"']").prop('selected', true);
                                    $('#cierramiercolesSucursal1').prop("disabled", false);
                                    if(data.horario[2]['turno_inicio_1'] != null)
                                    {
                                        $("#abremiercolesSucursal2 option[value='"+data.horario[2]['turno_inicio_1'] +"']").prop('selected', true);
                                        $('#abremiercolesSucursal2').css('display','block');
                                        $('#spammiercolesmenosSucursal').css('display','block');
                                    }else
                                    {
                                        $('#spammiercolesSucursal').css('display','block');
                                    }
                                    
                                    if(data.horario[2]['turno_fin_1'])
                                    {
                                        $("#cierramiercolesSucursal2 option[value='"+data.horario[2]['turno_fin_1'] +"']").prop('selected', true);
                                        $('#cierramiercolesSucursal2').css('display','block');
                                    }
                                }

                                //validacion para el jueves
                                if(data.horario[3]['opcion'] == 3)
                                {
                                    $('#quebradojuevesSucursal').val(1);

                                    $('#JuevesSucursal').prop("checked", true);
                                    
                                    $("#abrejuevesSucursal1 option[value='"+data.horario[3]['turno_inicio'] +"']").prop('selected', true);
                                    $('#abrejuevesSucursal1').prop("disabled", false);

                                    $("#cierrajuevesSucursal1 option[value='"+data.horario[3]['turno_fin'] +"']").prop('selected', true);
                                    $('#cierrajuevesSucursal1').prop("disabled", false);
                                    if(data.horario[3]['turno_inicio_1'] != null)
                                    {
                                        $("#abrejuevesSucursal2 option[value='"+data.horario[3]['turno_inicio_1'] +"']").prop('selected', true);
                                        $('#abrejuevesSucursal2').css('display','block');
                                        $('#spamjuevesmenosSucursal').css('display','block');
                                    }else
                                    {
                                        $('#spamjuevesSucursal').css('display','block');
                                    }
                                    
                                    if(data.horario[3]['turno_fin_1'])
                                    {
                                        $("#cierrajuevesSucursal2 option[value='"+data.horario[3]['turno_fin_1'] +"']").prop('selected', true);
                                        $('#cierrajuevesSucursal2').css('display','block');
                                    }
                                }

                                //validacion para el viernes
                                if(data.horario[4]['opcion'] == 3)
                                {
                                    $('#quebradoviernesSucursal').val(1);

                                    $('#ViernesSucursal').prop("checked", true);
                                    
                                    $("#abreviernesSucursal1 option[value='"+data.horario[4]['turno_inicio'] +"']").prop('selected', true);
                                    $('#abreviernesSucursal1').prop("disabled", false);

                                    $("#cierraviernesSucursal1 option[value='"+data.horario[4]['turno_fin'] +"']").prop('selected', true);
                                    $('#cierraviernesSucursal1').prop("disabled", false);
                                    if(data.horario[4]['turno_inicio_1'] != null)
                                    {
                                        $("#abreviernesSucursal2 option[value='"+data.horario[4]['turno_inicio_1'] +"']").prop('selected', true);
                                        $('#abreviernesSucursal2').css('display','block');
                                        $('#spamviernesmenosSucursal').css('display','block');
                                    }else
                                    {
                                        $('#spamviernesSucursal').css('display','block');
                                    }
                                    
                                    if(data.horario[4]['turno_fin_1'])
                                    {
                                        $("#cierraviernesSucursal2 option[value='"+data.horario[4]['turno_fin_1'] +"']").prop('selected', true);
                                        $('#cierraviernesSucursal2').css('display','block');
                                    }
                                }

                                //validacion para el sabado
                                if(data.horario[5]['opcion'] == 3)
                                {
                                    $('#quebradosabadoSucursal').val(1);

                                    $('#SabadoSucursal').prop("checked", true);
                                    
                                    $("#abresabadoSucursal1 option[value='"+data.horario[5]['turno_inicio'] +"']").prop('selected', true);
                                    $('#abresabadoSucursal1').prop("disabled", false);

                                    $("#cierrasabadoSucursal1 option[value='"+data.horario[5]['turno_fin'] +"']").prop('selected', true);
                                    $('#cierrasabadoSucursal1').prop("disabled", false);
                                    if(data.horario[5]['turno_inicio_1'] != null)
                                    {
                                        $("#abresabadoSucursal2 option[value='"+data.horario[5]['turno_inicio_1'] +"']").prop('selected', true);
                                        $('#abresabadoSucursal2').css('display','block');
                                        $('#spamsabadomenosSucursal').css('display','block');
                                    }else
                                    {
                                        $('#spamsabadoSucursal').css('display','block');
                                    }
                                    
                                    if(data.horario[5]['turno_fin_1'])
                                    {
                                        $("#cierrasabadoSucursal2 option[value='"+data.horario[5]['turno_fin_1'] +"']").prop('selected', true);
                                        $('#cierrasabadoSucursal2').css('display','block');
                                    }
                                }

                                //validacion para el domingo
                                if(data.horario[6]['opcion'] == 3)
                                {
                                    $('#quebradodomingoSucursal').val(1);

                                    $('#DomingoSucursal').prop("checked", true);
                                    
                                    $("#abredomingoSucursal1 option[value='"+data.horario[6]['turno_inicio'] +"']").prop('selected', true);
                                    $('#abredomingoSucursal1').prop("disabled", false);

                                    $("#cierradomingoSucursal1 option[value='"+data.horario[6]['turno_fin'] +"']").prop('selected', true);
                                    $('#cierradomingoSucursal1').prop("disabled", false);
                                    if(data.horario[6]['turno_inicio_1'] != null)
                                    {
                                        $("#abredomingoSucursal2 option[value='"+data.horario[6]['turno_inicio_1'] +"']").prop('selected', true);
                                        $('#abredomingoSucursal2').css('display','block');
                                        $('#spamdomigomenosSucursal').css('display','block');
                                    }else
                                    {
                                        $('#spamdomigoSucursal').css('display','block');
                                    }
                                    
                                    if(data.horario[6]['turno_fin_1'])
                                    {
                                        $("#cierradomingoSucursal2 option[value='"+data.horario[6]['turno_fin_1'] +"']").prop('selected', true);
                                        $('#cierradomingoSucursal2').css('display','block');
                                    }
                                } 
                                $('#horarioQuebradoSucursal').css("display", "block");
                                
                            }
                    }
        })

});


function resetFormulario()
{

    $('#horarioSucursaeEdit').val(null);
    //$('#opcionhorarioSucursaeEdit').val(null);

    $('#abrelunesSucursal2').css('display','none');
    $('#spamlunesmenosSucursal').css('display','none');
    $('#spamlunesSucursal').css('display','none');
    $('#cierralunesSucursal2').css('display','none');

    $('#abremartesSucursal2').css('display','none');
    $('#spammartesmenosSucursal').css('display','none');
    $('#spammartesSucursal').css('display','none');
    $('#cierramartesSucursal2').css('display','none');
                                    
    $('#abremiercolesSucursal2').css('display','none');
    $('#spammiercolesmenosSucursal').css('display','none');
    $('#spammiercolesSucursal').css('display','none');
    $('#cierramiercolesSucursal2').css('display','none');

    $('#abrejuevesSucursal2').css('display','none');
    $('#spamjuevesmenosSucursal').css('display','none');
    $('#spamjuevesSucursal').css('display','none');
    $('#cierrajuevesSucursal2').css('display','none');

    $('#abreviernesSucursal2').css('display','none');
    $('#spamviernesmenosSucursal').css('display','none');
    $('#spamviernesSucursal').css('display','none');
    $('#cierraviernesSucursal2').css('display','none');

    $('#abresabadoSucursal2').css('display','none');
    $('#spamsabadomenosSucursal').css('display','none');
    $('#spamsabadoSucursal').css('display','none');
    $('#cierrasabadoSucursal2').css('display','none');

    $('#abredomingoSucursal2').css('display','none');
    $('#spamdomigomenosSucursal').css('display','none');
    $('#spamdomigoSucursal').css('display','none');
    $('#cierradomingoSucursal2').css('display','none');

    $('#quebradodomingoSucursal').val(0);
    $('#DomingoSucursal').prop("checked", false);

    $('#quebradosabadoSucursal').val(0);
    $('#SabadoSucursal').prop("checked", false);

    $('#quebradoviernesSucursal').val(0);
    $('#ViernesSucursal').prop("checked", false);

    $('#quebradojuevesSucursal').val(0);
    $('#JuevesSucursal').prop("checked", false);

    $('#quebradomiercolesSucursal').val(0);
    $('#MiercolesSucursal').prop("checked", false);

    $('#quebradomartesSucursal').val(0);
    $('#MartesSucursal').prop("checked", false);

    $('#quebradolunesSucursal').val(0);
    $('#LunesSucursal').prop("checked", false);


    $('#diasHorarioSucursal').css("display", "none");
    $('#horarioQuebradoSucursal').css("display", "none");

    $('#personalizadoSucursal').prop("checked", false);
    $('#diasSucursal').prop("checked", false);
    $('#semanaSucursal').prop("checked", false);

    $('#LunesS').prop("checked", false);
    $('#MartesS').prop("checked", false);
    $('#MiercolesS').prop("checked", false);
    $('#JuevesS').prop("checked", false);
    $('#ViernesS').prop("checked", false);
    $('#SabadoS').prop("checked", false);
    $('#DomingoS').prop("checked", false);





    $("#abrelunesSucursal1 option[value='00:00']").prop('selected', true);
    $("#cierralunesSucursal1 option[value='00:00']").prop('selected', true);

    $("#abrelunesSucursal2 option[value='00:00']").prop('selected', true);

    $("#cierralunesSucursal2 option[value='00:00']").prop('selected', true);


    $("#abremartesSucursal1 option[value='00:00']").prop('selected', true);
    $("#cierramartesSucursal1 option[value='00:00']").prop('selected', true);

    $("#abremartesSucursal2 option[value='00:00']").prop('selected', true);
    $("#cierramartesSucursal2 option[value='00:00']").prop('selected', true);


    $("#abremiercolesSucursal1 option[value='00:00']").prop('selected', true);

    $("#cierramiercolesSucursal1 option[value='00:00']").prop('selected', true);

    $("#abremiercolesSucursal2 option[value='00:00']").prop('selected', true);

    $("#cierramiercolesSucursal2 option[value='00:00']").prop('selected', true);

    $("#abrejuevesSucursal1 option[value='00:00']").prop('selected', true);

    $("#cierrajuevesSucursal1 option[value='00:00']").prop('selected', true);

    $("#abrejuevesSucursal2 option[value='00:00']").prop('selected', true);

    $("#cierrajuevesSucursal2 option[value='00:00']").prop('selected', true);

    $("#abreviernesSucursal1 option[value='00:00']").prop('selected', true);

    $("#cierraviernesSucursal1 option[value='00:00']").prop('selected', true);

    $("#abreviernesSucursal2 option[value='00:00']").prop('selected', true);

    $("#cierraviernesSucursal2 option[value='00:00']").prop('selected', true);

    $("#abresabadoSucursal1 option[value='00:00']").prop('selected', true);

    $("#cierrasabadoSucursal1 option[value='00:00']").prop('selected', true);

    $("#abresabadoSucursal2 option[value='00:00']").prop('selected', true);

    $("#cierrasabadoSucursal2 option[value='00:00']").prop('selected', true);

    $("#abredomingoSucursal1 option[value='00:00']").prop('selected', true);

    $("#cierradomingoSucursal1 option[value='00:00']").prop('selected', true);

    $("#abredomingoSucursal2 option[value='00:00']").prop('selected', true);                                      
    $("#cierradomingoSucursal2 option[value='00:00']").prop('selected', true);

    ///////////////////////////////////////////////////////////////////

    $("#abrelunesSucursal1 ").prop( "disabled", true );
    $("#cierralunesSucursal1 ").prop( "disabled", true );




    $("#abremartesSucursal1 ").prop( "disabled", true );
    $("#cierramartesSucursal1 ").prop( "disabled", true );




    $("#abremiercolesSucursal1 ").prop( "disabled", true );

    $("#cierramiercolesSucursal1 ").prop( "disabled", true );


    $("#abrejuevesSucursal1 ").prop( "disabled", true );

    $("#cierrajuevesSucursal1 ").prop( "disabled", true );



    $("#abreviernesSucursal1 ").prop( "disabled", true );

    $("#cierraviernesSucursal1 ").prop( "disabled", true );


    $("#abresabadoSucursal1 ").prop( "disabled", true );

    $("#cierrasabadoSucursal1 ").prop( "disabled", true );



    $("#abredomingoSucursal1 ").prop( "disabled", true );

    $("#cierradomingoSucursal1 ").prop( "disabled", true );

};




function aumentaDiasSucursal(){
    var diasCheckTotalSucursal = $('#horarioSucursaeEdit').val();
    if(!diasCheckTotalSucursal)
    {
        diasCheckTotalSucursal = 0;
    }
    totald = parseInt(diasCheckTotalSucursal)+1;
    $('#horarioSucursaeEdit').val(totald);
};
function reduceDiasSucursal()
{
     var diasCheckTotal = $('#horarioSucursaeEdit').val();
     var total = parseInt(diasCheckTotal)-1;
     if(total == 0)
     {
        var total = null;
     }

    $('#horarioSucursaeEdit').val(total);
};





 $(document).on('click','#btnHorarioSucursalG',function(e)
{
    var dias = $('#horarioSucursaeEdit').val();
        var opcion = $('#opcionhorarioSucursaeEdit').val();
        if(!dias && opcion == 3)
        {    
            alertify.alert('Debe seleccionar almenos un dia para el horario');
            return false;
        }

        /*******
        *******/
          var count  = 0;
          if($('#diasSucursal').is(':checked'))
          {    
                if(!$('#LunesS').is(':checked') && !$('#MartesS').is(':checked') && !$('#MiercolesS').is(':checked')  && !$('#JuevesS').is(':checked')  && !$('#ViernesS').is(':checked')  && !$('#SabadoS').is(':checked')  && !$('#DomingoS').is(':checked'))
                {
                  count++;
                }

                if(count > 0)
                { 
                    e.preventDefault();
                    alertify.alert('Debe seleccionar mínimo un dia');
                    return false;
                }
          }
    var resul  = $("#frmEditHorarioSucusarl").valid();
    if(resul)
    {
        $(".loader").fadeIn(2000);
    }

    
});

