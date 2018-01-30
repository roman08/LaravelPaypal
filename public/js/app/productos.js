var _URL = window.URL || window.webkitURL;
/*************************
imagen nuevo producto
**************************/
$("#producto").change(function(e) {
  var file, img;
  
  if ((file = this.files[0])) 
  {
    img = new Image();
    var imgSize = file.size;
    console.log(file.type);
    
    img.onload = function() 
    {
      if(file.type != 'image/jpeg')
    {
        alertify.alert("El formato de archivo no es valido. Por favor seleccione una imagen en foramto jpeg. <br>Visite la siguiente página para convertir su imagen a formato (jpeg). <br><a target='_blank' href='http://convert-my-image.com/ImageConverter_Es'>Ir al convertidor de imagén</a>");
        return false;
    }
           if(imgSize >512000)
      {
          alertify.alert("El peso de su imagen es mayor al permitido. Seleccione una menor 512 kb.");
          }
      var canvas = document.createElement('CANVAS'),
      ctx = canvas.getContext('2d'), dataURL;
      canvas.height = this.height;
      canvas.width = this.width;
      ctx.drawImage(this, 0, 0);
      dataURL = canvas.toDataURL(this);    
      $('#img_promicion').val(dataURL);
      $("#imagen_producto").html('<img class="img-thumbnail"  id="Eimage" src='+ dataURL +' style="height: 640px; width: 640px;" >');
      $("#imagen_producto").show();
      $('#btn-imagen-icono-producto').hide();
      $('#data').css("display","block");
      $('#i').removeClass( "fa-5x" ).addClass( "fa-3x" );
    };
    img.onerror = function() 
    {
        alertify.alert("Tipo de archivo no valido. Porfavor seleccione una imagen.");
    };
    img.src = _URL.createObjectURL(file);
  }
});
//modal editar promocion
/******************************
imagen edit
********************************/
$("#productoEdit").change(function(e) {
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
        $('#btn-imagen-producto-edit').hide();
        $("#imagen_producto_edit").html('<img class="img-thumbnail"  id="Eimage" src="'+ dataURL +'" style="height: 310px; width: 680px;" >');


        $('#data').css("display","block");
        $('#i').removeClass( "fa-5x" ).addClass( "fa-3x" );
    };
    img.onerror = function() 
    {
        alertify.alert("Tipo de archivo no valido. Porfavor seleccione una imagen.");
    };
    img.src = _URL.createObjectURL(file);
  }
});
/*******************
abrimos el modal de nuevo producto
***********************/
$(document).ready(function(){
    $('.productos').click(function(){
        var numero = $(this).attr('data-numero');
        limpiaModalProducto();
        $('#modal-body-producto').css("display", "block");
        $('#noProducto').val(numero);
        $('#myModalProducto').modal('show');
        //myModalPromoion
    });
});


/*******************
abrimos el imagen de nuevo producto
***********************/
$(document).ready(function(){
    $('.btn-imagen-producto').click(function(){
        $('#producto').click();
    });

});

/*******************
abrimos el imagen de nuevo producto
***********************/
$(document).ready(function(){
    $('.btn-imagen-producto-edit').click(function(){
       
        $('#productoEdit').click();
    });

});

/*******************
abrimos el modal de editar
***********************/

$('.editProducto').on('click',function(e){
    e.preventDefault();
    var id = $(this).attr('href');
            $.ajax({
            url: '/web/app/producto/edit/',
            type: 'GET',
           data: {id:id},
            beforeSend: function(){
                    $(".loader").fadeIn(2000);
                    },
            success: function (data){
                            $(".loader").fadeOut(2000);
                            $('#modal-body-editProducto').css("display", "block");
                            $('#myModalEditProducto').modal('show');

                            console.log(data);
                            $('#nombre_producto_edit').val(data['nombre']);
                            $('#descripcion_producto_edit').val(data['descripcion']);

                            $('#urlImagen').val(data['url']);
                            $('#ImageneditP').val(data['imagen']);
                            $('#idprodcutoedit').val(id);
                            if(data['url'])
                           {       $('#btn-imagen-icono-producto-tdit').hide();
                                  $("#imagen_producto_edit").html('<img class="img-thumbnail"  id="Eimage" src="'+ data['url'] +'" style="height: 310px; width: 680px;" >');

                           }
                              }
        })


           
});
/**********
comfirmación eliinar producto
**********/
$('.deleteProducto').on('click',function(e)
{
  e.preventDefault();
  var hrf = $(this).attr('href');
  alertify.confirm('¿Seguro desea eliminar el producto?', function(eve)
  {
    if(eve)
    {
      window.location = hrf ;
    }
  });
});

$(document).on('click','.img',function(e)
{
     e.preventDefault();
    var ee = $(this).attr('src');
    $('#pprincipal').attr('src',ee);
});

function limpiaModalProducto()
{
  
  $('#nombre_producto').val("");
  $('#descripcion_producto').val("");
  $('#descripcion').val("");
  $('.btn-imagen-producto').show();
  $("#imagen_producto").hide();

  console.log('llega lipiar');
}