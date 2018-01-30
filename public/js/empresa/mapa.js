var map;
var geocoder;

function initialize(elemento,direccion) 
{
  geocoder = new google.maps.Geocoder();
  //busca la direccion
  var map = new google.maps.Map(document.getElementById(elemento), 
  {
     zoom: 16,
     scrollwheel: true,
     mapTypeId: google.maps.MapTypeId.ROADMAP
  });
  
  google.maps.event.addListener(map, 'click', function(event) 
  {
    placeMarker(event.latLng);
  });

  /**para mostrar la direccion */
  geocoder.geocode({'address': direccion}, function(results, status) 
  {
    if (status === 'OK') 
    {
      var resultados = results[0].geometry.location,
      resultados_lat = resultados.lat(),
      resultados_long = resultados.lng();
      $('#lat').val(resultados_lat);
      $('#lng').val(resultados_long);
      $('#latm').html('<b>Latitud: </b>'+resultados_lat);
      $('#lonm').html('<b>  Longitud: </b>'+resultados_long);
      map.setCenter(results[0].geometry.location);
      alertify.alert('Ubique en el mapa el punto más cercano a su comercio.');
      /*var marker = new google.maps.Marker(
      {
        map: map,
        position: results[0].geometry.location
      });*/
    } else {
        var mensajeError = "";
        if (status === "ZERO_RESULTS") {
          mensajeError = "No hubo resultados para la dirección ingresada.";
        } else if (status === "OVER_QUERY_LIMIT" || status === "REQUEST_DENIED" || status === "UNKNOWN_ERROR") {
          mensajeError = "Error general del mapa.";
        } else if (status === "INVALID_REQUEST") {
          mensajeError = "Error de la web. Contacte con Name Agency.";
        }
        alertify.alert(mensajeError);
      }
    });
  
    var marker;
    function placeMarker(location) 
    {
      if(marker)
      { //on vérifie si le marqueur existe
        marker.setMap(map);
        marker.setPosition(location); //on change sa position
        var markerLatLng = marker.getPosition();
        $('#lat').val(markerLatLng.lat());
        $('#lng').val(markerLatLng.lng());
        $('#latm').html('<b>Latitud: </b>'+markerLatLng.lat());
        $('#lonm').html('<b>  Longitud: </b>'+markerLatLng.lng());
      }else{
        marker = new google.maps.Marker({ //on créé le marqueur
          position: location, 
          map: map
        });
      }
    }
}

function initialize2(elemento,direccion) 
{
  geocoder = new google.maps.Geocoder();
  //busca la direccion
  var map = new google.maps.Map(document.getElementById(elemento), 
  {
    zoom: 16,
    scrollwheel: true,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  });

  google.maps.event.addListener(map, 'click', function(event) 
  {
    placeMarker(event.latLng);
  });

  /**para mostrar la direccion */
  geocoder.geocode({'address': direccion}, function(results, status) {
  if (status === 'OK') 
  {
    var resultados = results[0].geometry.location,
    resultados_lat = resultados.lat(),
    resultados_long = resultados.lng();
    $('#idlat').val(resultados_lat);
    $('#idlng').val(resultados_long);
    $('#idlatm').html('<b>Latitud: </b>'+resultados_lat);
    $('#idlonm').html('<b>  Longitud: </b>'+resultados_long);
    map.setCenter(results[0].geometry.location);
    alertify.alert('Ubique en el mapa el punto más cercano a su comercio.');
    /*var marker = new google.maps.Marker({
      map: map,
      position: results[0].geometry.location
    });*/
  } else {
      var mensajeError = "";
        if (status === "ZERO_RESULTS") {
          mensajeError = "No hubo resultados para la dirección ingresada.";
        } else if (status === "OVER_QUERY_LIMIT" || status === "REQUEST_DENIED" || status === "UNKNOWN_ERROR") {
          mensajeError = "Error general del mapa.";
        } else if (status === "INVALID_REQUEST") {
          mensajeError = "Error de la web. Contacte con Name Agency.";
        }
        alertify.alert(mensajeError);
      }
    });
  
    var marker;
    function placeMarker(location) 
    {
      if(marker)
      { //on vérifie si le marqueur existe
        marker.setMap(map);
        marker.setPosition(location); //on change sa position
        var markerLatLng = marker.getPosition();
        $('#idlat').val(markerLatLng.lat());
        $('#idlng').val(markerLatLng.lng());
        $('#idlatm').html('<b>Latitud: </b>'+markerLatLng.lat());
        $('#idlonm').html('<b>  Longitud: </b>'+markerLatLng.lng());
      }else{
          marker = new google.maps.Marker({ //on créé le marqueur
            position: location, 
            map: map
          });
        }
    }
}

function initializePrincipal(elemento,direccion) 
{
  geocoder = new google.maps.Geocoder();
  //busca la direccion
  var map = new google.maps.Map(document.getElementById(elemento), 
  {
    zoom: 16,
    scrollwheel: true,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  });
  
  google.maps.event.addListener(map, 'click', function(event) 
  {
    placeMarker(event.latLng);
  });

  /**para mostrar la direccion */
  geocoder.geocode({'address': direccion}, function(results, status) 
  {
    if (status === 'OK') 
    {
      var resultados = results[0].geometry.location,
      resultados_lat = resultados.lat(),
      resultados_long = resultados.lng();
      $('#plat').val(resultados_lat);
      $('#plng').val(resultados_long);
      $('#platm').html('<b>Latitud: </b>'+resultados_lat);
      $('#plonm').html('<b>  Longitud: </b>'+resultados_long);
      map.setCenter(results[0].geometry.location);
      alertify.alert('Ubique en el mapa el punto más cercano a su comercio.');
      /*var marker = new google.maps.Marker({
        map: map,
        position: results[0].geometry.location
      });*/
    } else {
        var mensajeError = "";
        if (status === "ZERO_RESULTS") {
          mensajeError = "No hubo resultados para la dirección ingresada.";
        } else if (status === "OVER_QUERY_LIMIT" || status === "REQUEST_DENIED" || status === "UNKNOWN_ERROR") {
          mensajeError = "Error general del mapa.";
        } else if (status === "INVALID_REQUEST") {
          mensajeError = "Error de la web. Contacte con Name Agency.";
        }
        alertify.alert(mensajeError);
      }
  });
  
  var marker;
  function placeMarker(location) 
  {
    if(marker)
    { //on vérifie si le marqueur existe
      marker.setMap(map);
      marker.setPosition(location); //on change sa position
      var markerLatLng = marker.getPosition();
      $('#plat').val(markerLatLng.lat());
      $('#plng').val(markerLatLng.lng());
      $('#platm').html('<b>Latitud: </b>'+markerLatLng.lat());
      $('#plonm').html('<b>  Longitud: </b>'+markerLatLng.lng());
    }else{
        marker = new google.maps.Marker({ //on créé le marqueur
          position: location, 
          map: map
        });
      }
  }


}
 
//inicIA MAPA
$.getScript("https://maps.googleapis.com/maps/api/js?key=AIzaSyChSMgepK3n0DU4_zbgdEIKBKhkcUUwa58", function() {
    $("#buscar").click(function() {
      console.log('hola modal');
        var numero = $('#numero').val();
          var calle = $("#calle").val();
          var colonia = $("#colonia").val(); 
          var cp = $("#cp").val(); 
          var municipioOption = $("#idmunicipio").val();
          var municipio = $("#idmunicipio option:selected").html(); 
          var count = 0;
          var direccion = "";
          if(calle == "")
          {
            count = count +1;
          }
          if(colonia == "")
          {
            count = count +1;
          }
          if(cp == "")
          {
            count = count +1;
          }
          if(municipioOption =="")
          {
            count = count +1;
          }
      if (count == 0) 
      {
        direccion = calle+' '+numero+' '+colonia+' '+cp+' '+municipio+' '+'Tab.';
        console.log(direccion);
            $("#municipio").val(municipio);
          initialize("map_canvas", direccion); 
      }else{
        alertify.alert('Debes agregar los datos de la dirección para poder ubicarla en el mapa.');
        return false;
      }
    });

    $("#buscarPrincipal").click(function() {
      console.log('hola modal pricipal');
          var numero = $('#pnumero').val();
          var calle = $("#pcalle").val();
          var colonia = $("#pcolonia").val(); 
          var cp = $("#pcp").val(); 
          var municipioOption = $("#idmunicipiop").val();
          var municipio = $("#idmunicipiop option:selected").html();
          console.log('numero: '+numero+' calle: '+calle+' colonia: '+colonia+' cp: '+cp+' municipioOption: '+municipioOption);
          var count = 0;
          var direccion = "";
         
          if(calle == "")
          {
            count = count +1;
          }
          
          if(colonia == "")
          {
            count = count +1;
          }
          if(cp == "")
          {
            count = count +1;
          }
          if(municipioOption =="")
          {
            count = count +1;
          }
      if (count == 0) 
      {
        direccion = calle+' '+numero+' '+colonia+' '+cp+' '+municipio+' '+'Tab.';
            $("#municipiop").val(municipio);
          initializePrincipal("map_canvas3", direccion); 
      }else{
        alertify.alert('Debes agregar los datos de la dirección para poder ubicarla en el mapa.');
        return false;
      }
    });

        $("#buscars").click(function() {
      var numero = $("#idnumero").val();
          var calle = $("#idcalle").val();
          var colonia = $("#idcolonia").val(); 
          var cp = $("#idcp").val(); 
          var municipioOption = $("#idmunicipio").val();
          var municipio = $("#idmunicipio option:selected").html();
          var count = 0;
          var direccion = "";
          if(calle == "")
          {
            count = count +1;
          }
          if(colonia == "")
          {
            count = count +1;
          }
          if(cp == "")
          {
            count = count +1;
          }
          if(municipioOption =="")
          {
            count = count +1;
          }
      if (count == 0) 
      {
        direccion = calle+' '+numero+' '+colonia+' '+cp+' '+municipio+' '+'Tab.';
            $("#idmunicipio").val(municipio);
          initialize2("map_canvas2", direccion); 
      }else{
        alertify.alert('Debes agregar los datos de la dirección para poder ubicarla en el mapa.');
        return false;
      }
    });
  });