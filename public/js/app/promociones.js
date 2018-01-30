var _URL = window.URL || window.webkitURL;

$("#promocion").change(function(e) {
  var file, img;
  
  if ((file = this.files[0])) 
  {
    img = new Image();
    var imgSize = file.size;
    console.log(file.type);
    if(file.type != 'image/jpeg')
    {
        alertify.alert("El formato de archivo no es valido. Por favor seleccione una imagen en foramto jpeg. <br>Visite la siguiente página para convertir su imagen a formato (jpeg). <br><a target='_blank' href='http://convert-my-image.com/ImageConverter_Es'>Ir al convertidor de imagén</a>");
        return false;
    }
    if(imgSize >512000)
      {
          alertify.alert("El peso de su imagen es mayor al permitido. Seleccione una menor 512 kb.");
          return false;
      }
    img.onload = function() 
    {
      
      
      var canvas = document.createElement('CANVAS'),
      ctx = canvas.getContext('2d'), dataURL;
      canvas.height = this.height;
      canvas.width = this.width;
      ctx.drawImage(this, 0, 0);
      dataURL = canvas.toDataURL(this);    
      $('#img_promicion').val(dataURL);
      $("#imagen_promocion").html('<img class="img-thumbnail"  id="Eimage" src='+ dataURL +' style="height: 310px; width: 680px;" >');
      $("#imagen_promocion").show();
      $('#btn-imagen-icono').hide();
      $('#data').css("display","block");
      $('#i').removeClass( "fa-5x" ).addClass( "fa-3x" );
    };

    img.src = _URL.createObjectURL(file);
  }
});
//modal editar promocion
$("#promocionEdit").change(function(e) {
  var file, img;
  
  if ((file = this.files[0])) 
  {
    img = new Image();
    var imgSize = file.size;
    console.log(file.type);
    if(file.type != 'image/jpeg')
    {
        alertify.alert("El formato de archivo no es valido. Por favor seleccione una imagen en foramto jpeg. <br>Visite la siguiente página para convertir su imagen a formato (jpeg). <br><a target='_blank' href='http://convert-my-image.com/ImageConverter_Es'>Ir al convertidor de imagén</a>");
        return false;
    }
     if(imgSize >512000)
      {
          alertify.alert("El peso de su imagen es mayor al permitido. Seleccione una menor 512 kb.");
          return false;
          }
    img.onload = function() 
    {
      
      
        var canvas = document.createElement('CANVAS'),
        ctx = canvas.getContext('2d'), dataURL;
        canvas.height = this.height;
        canvas.width = this.width;
        ctx.drawImage(this, 0, 0);
        dataURL = canvas.toDataURL(this);    
        $('#btn-imagen-icono-edit').hide();
        $("#imagen_promocion_edit").html();
        $("#imagen_promocion_edit").html('<img class="img-thumbnail"  id="Eimage" src='+ dataURL +' style="height: 310px; width: 680px;" >');

        $('#data').css("display","block");
        $('#i').removeClass( "fa-5x" ).addClass( "fa-3x" );
    };

    img.src = _URL.createObjectURL(file);
  }
});
//recuṕerar imagen
$(document).ready(function(){
    $('.promocion').click(function(){
        var numero = $(this).attr('data-numero');
       // alert(numero);
        limpiaModalPromocion();
        $('#modal-body-promociones').css("display", "block");
        $('#noPromocion').val(numero);
        $('#myModalPromoion').modal('show');
        //myModalPromoion
    });
});

$('#fecha_inicio').mask('99/99/9999',{placeholder:"DD-MM-AAAA"});
$('#fecha_fin').mask('99/99/9999',{placeholder:"DD-MM-AAAA"});
//recuṕerar imagen
$(document).ready(function(){
    $('.btn-imagen-promocion').click(function(){
        $('#promocion').click();
    });

});

$(document).on('click','.algo',function(e){
     e.preventDefault();
    var ee = $(this).attr('src');
    $('#vprincipal').attr('src',ee);
})

$(document).ready(function(){
    $('.btn-imagen-promocion-edit').click(function(){
        $('#promocionEdit').click();
    });

});

$('.editPromocion').on('click',function(e){
    e.preventDefault();
    var id = $(this).attr('href');
            $.ajax({
            url: '/web/app/promocion/edit/',
            type: 'GET',
           data: {id:id},
            beforeSend: function(){
                     $(".loader").fadeIn(2000);
                    },
            success: function (data){
                           $(".loader").fadeOut(2000);
                           console.log(data);
                            $('#noPromocionEdit').val(id);
                            $('#fechaInicio').val(data['vig_inicio']);
                            $('#fechaFin').val(data['vig_fin']);
                            $('#descripcionEdit').val(data['descripcion']);
                            $('#imagenRespaldo').val(data['imagen']);
                            $('#urlRespaldo').val(data['url']);
                            $("#subcategoriaPromocionesEdit option[value='"+data['idsubcategoria'] +"']").prop('selected', true);
                            $('#modal-body-editPromocion').css("display", "block");
                            $('#myModalEditPromocion').modal('show');
                           if(data['url'])
                           {       $('#btn-imagen-icono-edit').hide();
                                  $("#imagen_promocion_edit").html('<img class="img-thumbnail"  id="Eimage" src="'+ data['url'] +'" style="height: 310px; width: 680px;" >');

                           }
                          // $('#tab:last').append('<tr><td align="center">#</td><td align="center">'+data.numero_tarjeta+'</td><td align="center">'+data.banco+'</td><td align="center">'+data.titular+'</td><td align="center">'+data.tipo+'</td><td align="center">'+data.mes+'</td><td align="center">'+data.anio+'</td><td align="center">'+data.cp+'</td><td align="center"></td></tr>');
                    }
        })


           
});
/**********************
fechas modal crear promocion
********************/
$(function () 
  {
    $.datepicker.setDefaults($.datepicker.regional["es"]);
    $('#fecha_inicio').datepicker({ minDate: 0 });
    $('#fecha_fin').datepicker({ minDate: 1 });
  });



  $('#fecha_inicio').on('change',function(){
   
    $("#fecha_fin").prop( "disabled", false );
  });

   $('#fecha_fin').on('change',function(e){

    var padre = $('#fecha_inicio').val();
    var date = $(this).val();
    if ($.datepicker.parseDate('dd/mm/yy', date) < $.datepicker.parseDate('dd/mm/yy', padre)) {

               alertify.alert("La fecha de Expiración no puede ser manor a la de inicio");

       $(this).val('');

    }
});

/**********************
fechas modal editar promocion
********************/

$(function () 
  {
    $.datepicker.setDefaults($.datepicker.regional["es"]);
    $('#fechaInicio').datepicker({ minDate: 0 });
    $('#fechaFin').datepicker({ minDate: 1 });
  });



  $('#fechaInicio').on('change',function(){
    var fecha = $(this).val();

    $("#fechaFin").val('');
  });

   $('#fechaFin').on('change',function(e){

    var padre = $('#fechaInicio').val();
    var date = $(this).val();
    if ($.datepicker.parseDate('dd/mm/yy', date) < $.datepicker.parseDate('dd/mm/yy', padre)) {

               alertify.alert("La fecha de Expiración no puede ser manor a la de inicio");

       $(this).val('');

    }
});

/**********
comfirmación eliinar producto
**********/
$('.deletePro').on('click',function(e)
{
  e.preventDefault();
  var hrf = $(this).attr('href');
  alertify.confirm('¿Seguro desea eliminar la promoción?', function(eve)
  {
    if(eve)
    {
      window.location = hrf ;
    }
  });
});





function limpiaModalPromocion()
{
  
  $('#fecha_inicio').val("");
  $('#fecha_fin').val("");
  $('#descripcion').val("");
  $('#btn-imagen-icono').show();
  $("#imagen_promocion").hide();
}

/******************
elimina  clasificacion
*******************/
$(document).on('click','.deleteClass',function(e)
{
  e.preventDefault();
  var hrf = $(this).attr('href');
  alertify.confirm('¿Seguro desea eliminar la clasificación?', function(eve)
  {
    if(eve)
    {
      window.location = hrf ;
    }
  });
});