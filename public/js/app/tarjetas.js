$(document).ready(function () 
{
  $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) 
  {
    var id = $(e.target).attr("id");
    var title = $(e.target).attr("href"); // activated tab
    title = title.replace('#', '');
    $.cookie('activeAccordionGroup', id);
    $.cookie('activeAccordionGrouptitle', title);
  });
  $(document).on('click','.EmpresaApp',function(){
        $.removeCookie('activeAccordionGroup');
        $.removeCookie('activeAccordionGrouptitle');
  });
  $('a[data-toggle="tab"]').on('hidden.bs.tab', function (e) 
  {
    var id = $(e.target).attr("href");
    var title = $(e.target).attr("data-name-unico");
  });
     
  var last = $.cookie('activeAccordionGroup');
  var titleid = $.cookie('activeAccordionGrouptitle');

  if (last != undefined) 
  {
    var id = '#'+last;
    var idpanel = '#'+titleid;
    $(idpanel).addClass("active in");
    $(id).parent().addClass("active");
    $(id).attr("aria-expanded",true);
  }else{
    $('.li').addClass("active");
    $('#profile').addClass("active in");
    $('#profile').attr("aria-expanded",true);
  }
});




$(document).on('click','#nuevaSucursal',function(){
    $('#modal-body1').css("display", "block");
    $('#myModal').modal('show');
});



/********************
abre modal y muestra la informacion para editar la sucursal
*******************/
$('.edit').on('click',function(e){
    e.preventDefault();
    var id = $(this).attr('href');

            $.ajax({
            url: '/web/app/consulta/entidad/',
            type: 'GET',
           data: {id:id},
            beforeSend: function(){
                     $(".loader").fadeIn(2000);

                    },
            success: function (data){
                           $(".loader").fadeOut(2000);
                           console.log(data);
                            $('#idsucursal').val(data['idsucursal']);
                            $('#idnombre').val(data['sucursal']);
                            $('#idtelefono').val(data['telefono']);
                            var check = data['entrega'];
                            if(check == 1){
                                $('#identrega').prop("checked", true);
                            }
                            $('#idcalle').val(data['calle']);
                            $('#idnumero').val(data['numero']);
                            $('#idinterior').val(data['interior']);
                            $('#idcolonia').val(data['colonia']);
                            $('#idcp').val(data['codigo_postal']);
                            $('#idlat').val(data['latitud']);
                            $('#idlng').val(data['longitud']);
                            //$('#idmunicipiotexto').val(data.secciones[5]);

                            $("#idmunicipio option[value='"+data['idmunicipio'] +"']").prop('selected', true);
                            $('#modal-body').css("display", "block");
                             $('#myModal2').modal('show');
                           
                          // $('#tab:last').append('<tr><td align="center">#</td><td align="center">'+data.numero_tarjeta+'</td><td align="center">'+data.banco+'</td><td align="center">'+data.titular+'</td><td align="center">'+data.tipo+'</td><td align="center">'+data.mes+'</td><td align="center">'+data.anio+'</td><td align="center">'+data.cp+'</td><td align="center"></td></tr>');
                    }
        })
});




/**********
comfirmación eliinar producto
**********/
$('.deleteSucursal').on('click',function(e)
{
  e.preventDefault();
  var hrf = $(this).attr('href');
  alertify.confirm('¿Seguro desea eliminar la sucursal?', function(eve)
  {
    if(eve)
    {
      window.location = hrf ;
    }
  });
});



/*************************

*************************/
$('.toglePanel').on('click',function(){
    var data = $(this).attr('data-toggle');
    if(data == 'plus')
    {
      alertify.alert('Función disponible para usuarios Plus y Premium');
    }
    if(data == 'premiun'){
      alertify.alert('Función disponible para usuarios Premium');
    }
});
$('.publicarEmpresa').on('click',function(e){

    e.preventDefault();

    var id = $(this).attr('id');

        $.ajax({
            url: '/web/appverifica/empresa',
            type: 'GET',
           data: {id:id},
            beforeSend: function(){
                     $(".loader").fadeIn(3000);

                    },
            success: function (data){
              $(".loader").fadeOut(3000);
                console.log(data);
                           var msg = '<p style="text-align: justify;"><strong>¡Lo sentimos! debes completar tu información para publicar.</strong></p>';
                           if(data == 1)
                           {
                            var estado = 'Publicado';
                            publicaEmpresa(id,estado);
                           }else
                           {
                            var arr = data.split(',');
                            $.each(arr,function(i,item){
                                if(item == "clasificacion"){
                                     msg += '<p style="text-align: left; color:red;">* Clasificación.</p>';
                                }
                                if(item == "identidad"){
                                     msg += '<p style="text-align: left; color:red;">* Identidad.</p>';
                                }
                                if(item == "horarios"){
                                     msg += '<p style="text-align: left; color:red;">* Horario.</p>';
                                }
                                if(item == "sucursal"){
                                     msg += '<p style="text-align: left; color:red;">* Horario en la(s) sucursale(s).';
                                }
                            });
                            alertify.alert(msg);
                           }
                           
                          // clasificacion,identidad,horarios,sucursal
                    }
        })
});

$('.disenarEmpresa').on('click',function(e)
{
  e.preventDefault();
  var id = $(this).attr('id');
  var estado = 'En Diseño';
  alertify.confirm('<p>¿Está Seguro de cambiar su empresa a diseño?</p><p style="text-align: justify;"><strong>Le recordamos que cuando confirme, Su empresa no estará disponible en CHOCOMERCIOS hasta que vuelva a publicar.</strong></p>', function(eve)
  {
    if(eve)
    {
      $.ajax({
      url: '/web/app/publica/empresa',
      type: 'GET',
      data: {id:id, estado:estado},
      beforeSend: function()
      {
        $(".loader").fadeIn(3000);
      },
      success: function (data)
      {
        $(".loader").fadeOut(3000);
        console.log('estado'+data);
        if(data == 1)
        {
                            $('.publicarEmpresa').css( 'pointer-events', '' );
                            $('.disenarEmpresa').css( 'pointer-events', 'none' );
                            $('#estadoEmp').text('En Diseño');
                            $('#logoDiseno').attr('src','/img/Emcabezado/DisenoDesactivado.png');
                            $('#logoPublicado').attr('src','/img/Emcabezado/publicado.png');
                            alertify.alert('Ahora puede editar los datos de su empresa.');
                            DesbloqueoForm();
                            $('#msgModificar').css('visibility', 'hidden');
                       }else{
                        alertify.alert('Lo sentimos ocurrio un error, intente de nuevo');
                      }
                    }
        })
    }
  });






});


$('body').ready(function(){
    var plan = $('#TipoPlan').val();
    var cantidad = $('#countSucursales').val();
    if(plan == 'Plan Plus' && cantidad == 3)
    {
        $('#nuevaSucursal').attr('disabled', true);
    }
});

function publicaEmpresa(id, estado)
{
        //alert(id + 'estado: '+ estado);
          $.ajax({
            url: '/web/app/publica/empresa',
            type: 'GET',
            data: {id:id, estado:estado},
            beforeSend: function(){
                     $(".loader").fadeIn(2000);

                    },
            success: function (data){
                $(".loader").fadeOut(2000);
                      if(data == 1)
                      {
                        $('#estadoEmp').text('Publicado');
                        $('.publicarEmpresa').css( 'pointer-events', 'none' );
                        $('.disenarEmpresa').css( 'pointer-events', '' );
                        $('#logoDiseno').attr('src','/img/Emcabezado/Diseno.png');
                        $('#logoPublicado').attr('src','/img/Emcabezado/publicadodesactivado.png');
                        alertify.alert('Su empresa se ha publicado correctamente.');
                        BloqueoForm();
                        $('#msgModificar').css('visibility', 'visible');
                          // clasificacion,identidad,horarios,sucursal
                      }else{
                        alertify.alert('Lo sentimos ocurrio un error, intente de nuevo');
                      }
                    }
        })
}




/***************
valida correo informacion basica
*************/

$('#mailApp').on('keyup',function(){
        var email = $(this).val();
         if(!email )
        {
          alert('hello');
            $('#spMailApp').css('display','none');
            return false;
        }
        var val = ValidateEmail(email);


        if(val)
        {
            $('#btnFormBasicApp').prop('disabled',false);
            $('#spMailApp').css('display','none');
         //console.log(ValidateEmail(email));
        }else{
            console.log('no valido');
            $('#btnFormBasicApp').prop('disabled',true);
            $('#spMailApp').css('display','block');
        }
});
/***************
valida correo informacion basica al hacer click en el boton
*************/
 $('#btnFormBasicApp').on('click',function(e){
   
    var email = $("#mailApp").val();
    var valf = ValidateEmail(email);
    if(!valf)
    {   
        alertify.alert('Ingrese un correo valido');
        e.preventDefault();
    }
 })
/*****************
validacion formato del correo
********************/
function ValidateEmail(email) {
        var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
        return expr.test(email);
    };

/**************************
Bloque las funciones si esta el publicado
***************************/
$('body').ready(function(){
  var estado = $('#estadoEmpre').val();

  if(estado == 'Publicado')
  {
    alertify.alert('Le recordamos que su estado es publicado para modificaciones debe seleccionar la opción en Diseño');
    BloqueoForm();
    $('#msgModificar').css('visibility', 'visible');
  }else{
    DesbloqueoForm();
    $('#msgModificar').css('visibility', 'hidden');
  }
})
/***************************
Bloqueo de funciones para empresa publicada
****************************/
function BloqueoForm()
{
  //información basica bloqueada
  $('#frmInfoBasica').find('input, textarea, button, select').prop('disabled',true);
  $('#frmInfoBasica').find('a').css( 'pointer-events', 'none' );

  //Clasificación
  $('#frmClasificacion').find('input, textarea, button, select').prop('disabled', true);
  $('#tbClasificacion').find('a').css('pointer-events','none');

  //Identidad 
  $('#frmIdentidad').find('button').prop('disabled',true);
  $('#frmIdentidad').find('a').css( 'pointer-events', 'none' );

  //Horarios 
  $('#frmHorarios').find('input, textarea, button, select,radio,checkbox').prop('disabled',true);
  $('#frmHorarios').find('a').css( 'pointer-events', 'none' );

  //Sucursales  
  $('#frmEditSucursal').find('input, textarea, button, select').prop('disabled',true);
  $('#btnEditSucursal').prop('disabled',true);
  $('#nuevaSucursal').prop('disabled',true);

  $('#frmEditSucursal').find('a').css( 'pointer-events', 'none' );
  $('#tbSucursales').find('a').css( 'pointer-events', 'none' );
  $('.edit').css( 'pointer-events', '' );

  //Promociones
  $('.editPromocion').css( 'pointer-events', 'none' );
  $('.deletePro').css( 'pointer-events', 'none' );
  $('.promocion').css( 'pointer-events', 'none' );

  //productos

  $('.editProducto').css( 'pointer-events', 'none' );
  $('.deleteProducto').css( 'pointer-events', 'none' );
  $('.productos').css( 'pointer-events', 'none' );
}


/***************************
Desbloqueo de funciones para empresa en diseño
****************************/
function DesbloqueoForm()
{
  //información basica bloqueada
  $('#frmInfoBasica').find('input, textarea, button, select').prop('disabled',false);
  $('#frmInfoBasica').find('a').css( 'pointer-events', '' );

  //Clasificación
  $('#frmClasificacion').find('input, textarea, button, select').prop('disabled', false);
  $('#tbClasificacion').find('a').css('pointer-events','');

  //Identidad 
  $('#frmIdentidad').find('button').prop('disabled',false);
  $('#frmIdentidad').find('a').css( 'pointer-events', '' );

  //Horarios 
  $('#frmHorarios').find('input, textarea, button, select,radio,checkbox').prop('disabled',false);
  $('#frmHorarios').find('a').css( 'pointer-events', '' );

  //Sucursales  
  $('#frmEditSucursal').find('input, textarea, button, select').prop('disabled',false);
  $('#btnEditSucursal').prop('disabled',false);
  $('#nuevaSucursal').prop('disabled',false);

  $('#frmEditSucursal').find('a').css( 'pointer-events', '' );
  $('#tbSucursales').find('a').css( 'pointer-events', '' );
  $('.edit').css( 'pointer-events', '' );

  //Promociones
  $('.editPromocion').css( 'pointer-events', '' );
  $('.deletePro').css( 'pointer-events', '' );
  $('.promocion').css( 'pointer-events', '' );

  //productos

  $('.editProducto').css( 'pointer-events', '' );
  $('.deleteProducto').css( 'pointer-events', '' );
  $('.productos').css( 'pointer-events', '' );
}

/************
muestra loader en formulario informacion basica
************/
$('#btnFormBasicApp').on('click',function() 
{
  var resul  = $("#frmInfoBasica").valid();
  if(resul)
  {
    $(".loader").fadeIn(2000);
  }
});

/******************


/************
muestra loader en formulario de clasificacion
************/
$('#guardarClass').on('click',function() 
{
  $(".loader").fadeIn(2000);
});

/************
muestra loader en formulario horarios
************/
$('#btnHorarios').on('click',function(e) 
{
  var count  = 0;
  if($('#dias').is(':checked'))
  {    
        if(!$('#Lunes').is(':checked') && !$('#Martes').is(':checked') && !$('#Miercoles').is(':checked')  && !$('#Jueves').is(':checked')  && !$('#Viernes').is(':checked')  && !$('#Sabado').is(':checked')  && !$('#Domingo').is(':checked'))
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

 /****
 horariro quebrado
 ***/
 if($('#semana').is(':checked'))
      {    
        if(!$('#LunesH').is(':checked') && !$('#MartesH').is(':checked') && !$('#MiercolesH').is(':checked') && !$('#JuevesH').is(':checked') && !$('#ViernesH').is(':checked') && !$('#SabadoH').is(':checked') && !$('#DomingoH').is(':checked'))
        {
          count++;
        }

        if(count > 0)
        {count = 0;
            e.preventDefault();
            alertify.alert('Debe seleccionar mínimo un dia del horario quebrado');
            return false;
        }


      }
  var resul  = $("#frmHorarios").valid();
  if(resul)
  {
    $(".loader").fadeIn(2000);
  }

 
});




/************
muestra loader en formulario SUCURSALES
************/
$('#btnSucursal').on('click',function() 
{
  var resul  = $("#frmNuevaSucursal").valid();
  if(resul)
  {
    $(".loader").fadeIn(2000);
  }
});



/************
muestra loader en formulario horario promocion
************/
$('#btnPromo').on('click',function() 
{
  var resul  = $("#frmPromo").valid();
  if(resul)
  {
    $(".loader").fadeIn(2000);
  }
});

$('#btnPromoEdit').on('click',function() 
{
 
    $(".loader").fadeIn(2000);
  
});

/************
muestra loader en formulario producto
************/
$('#btnProducto').on('click',function() 
{
  var resul  = $("#frmProduct").valid();
  if(resul)
  {
    $(".loader").fadeIn(2000);
  }
});

$('#btnProductoEdit').on('click',function() 
{
  var resul  = $("#frmProductoEdit").valid();
  if(resul)
  {
    $(".loader").fadeIn(2000);
  }
});