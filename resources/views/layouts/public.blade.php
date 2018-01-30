<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PRUEBAS - CHOCOMERCIOS</title>
    <link rel="shortcut icon" href="/images/Logo.png" />
    
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery-ui.css') }}" rel="stylesheet">
    <link href="{{ asset('css/forms/base.css') }}" rel="stylesheet">
    <link href="{{ asset('css/datatables.css') }}" rel="stylesheet">
    <link href="{{ asset('css/menu/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/banner.css') }}" rel="stylesheet">
    <link href="{{ asset('css/normalize.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/imagehover.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery.dynatable.css') }}" rel="stylesheet">
    <link href="{{ asset('css/alerts/alertify.core.css') }}" rel="stylesheet">
    <link href="{{ asset('css/alerts/alertify.default.css') }}" rel="stylesheet">

    @yield('styles')
<!--
 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyChSMgepK3n0DU4_zbgdEIKBKhkcUUwa58"
  type="text/javascript"></script>
    =======================================================
        Theme Name: Mentor
        Theme URL: https://bootstrapmade.com/mentor-free-education-bootstrap-theme/
        Author: BootstrapMade.com
        Author URL: https://bootstrapmade.com
    ======================================================= -->
  </head>
  <body>
    <div class="loader"></div>
    <!--Navigation bar-->
    <header>
        <nav class="navbar navbar-default navbar-fixed-top">
          <img src="/img/bannerPrincipal.png" class="img-responsive" alt="">
          <div class="container">
            @yield('menu')
          </div>
        </nav>
         @yield('banner')
    </header>
    <!-- carousel deñl home -->
   
   <!-- El contenido del cuerpo del home -->
   
    @yield('content')
    
    @include('_modalLogin')

    <p class="pm-staff-profile-title"></p>
    <!--Footer-->
    <footer id="footer" class="footer">
      <div class="container text-center">
    
    
     
      <ul class="social-links">
        <li><a href=" https://twitter.com/chocomercios/"><i class="fa fa-twitter fa-fw"></i></a></li>
        <li><a href="https://www.facebook.com/Chocomercios-759306461117743/"><i class="fa fa-facebook fa-fw"></i></a></li>
        <li><a href=" https://www.instagram.com/chocomercios/"><i class="fa fa fa-instagram fa-fw"></i></a></li>
        <li><a href="http://www.prosim.com.mx/" target="_blank"><i class="fa fa fa-internet-explorer fa-fw"></i></a></li>


      </ul>
        ©2017 PROSIM, TODOS LOS DERECHOS RESERVADOS.
        <div class="credits">
            <!-- 
                All the links in the footer should remain intact. 
                You can delete the links only if you purchased the pro version.
                Licensing information: https://bootstrapmade.com/license/
                Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Mentor
            -->
          
        </div>
      </div>
    </footer>
    <!--/ Footer
    <script src="{{ asset('js/modernizr-custom.js') }}"></script>-->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/datapicker-es.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.js') }}"></script>
    <script src="{{ asset('js/jquery.validate.min.js') }}"></script>
            <script src="{{ asset('js/jquery.mask.js') }}"></script>

    <script src="{{ asset('js/validaciones.js') }}"></script>
    <script src="{{ asset('js/jquery.cookie.js') }}"></script>
    <script src="{{ asset('js/moment.min.js') }}"></script>   
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.flexisel.js') }}"></script>
    <script src="{{ asset('js/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="{{ asset('js/estados.js') }}"></script>
    <script src="{{ asset('js/login/index.js') }}"></script>
    <script src="{{ asset('js/personas/tarjetas.js') }}"></script>
    <script src="{{ asset('js/jquery.dynatable.js') }}"></script>
    <script src="{{ asset('js/empresa/control.js') }}"></script>
    
      <script src="{{ asset('js/app/tarjetas.js') }}"></script>

    <script src="{{ asset('js/alerts/alertify.min.js') }}"></script>
    <script src="{{ asset('js/validacionNumero.js') }}"></script>
<script type="text/javascript">
  $('#modalLogin').on('click',function(e){
    $('#myModalLogin').modal('show');
  })


 $(window).on('load',function () {
  $(".loader").fadeOut(3000);
});
</script>
    <script>
        
        $(document).ready(function () {
            $('#tab').dynatable({});
        });
    </script>

@if(Session::has('mensaje'))
    <script >
   
        alertify.alert('{{Session::get('mensaje')}}');
      
    </script>
      
  @endif
@if(Session::has('status'))
    <script >

        alertify.success('{{Session::get('status')}}');

      
    </script>
      
  @endif
  @if(Session::has('error'))
      <script >
       
          alertify.error('{{Session::get('error')}}')
        
      </script>
  
   @endif
      @yield('javascript')
  </body>
</html>