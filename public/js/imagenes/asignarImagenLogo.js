var _URL = window.URL || window.webkitURL;

$("#logo").change(function(e) {
  var file, img;
  
  if ((file = this.files[0])) 
  {
    img = new Image();
    var imgSize = file.size;
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
          return false;
          }
      var canvas = document.createElement('CANVAS'),
      ctx = canvas.getContext('2d'), dataURL;
      canvas.height = this.height;
      canvas.width = this.width;
      ctx.drawImage(this, 0, 0);
      dataURL = canvas.toDataURL(this);    
      $('#img1').val(dataURL);
      $("#imagen_logo").html('<img class="img-thumbnail"  id="Eimage" src='+ dataURL +' style="height: 160px; width: 160px;" > ');
      $('#btn-imagen-icono-logo').hide();
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