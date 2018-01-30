
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
    <title>CHOCOMERCIOS - PROSIM</title>
    <link rel="shortcut icon" href="/images/Logo.png" />
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans|Candal|Alegreya+Sans">
 
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/alerts/alertify.core.css') }}" rel="stylesheet">
    <link href="{{ asset('css/alerts/alertify.default.css') }}" rel="stylesheet">
</head>
<body>
    <div class="loader"></div>
      <!--Navigation bar-->
    <nav class="navbar navbar-default navbar-fixed-top">
      <img src="/img/bannerPrincipal.png" class="img-responsive" alt="">
      <div class="container">
       @include('menus.menuLogin')
      </div>
    </nav>
   
    <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-success">
                <div class="panel-heading">Restablecer la contraseña</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                             <form class="form-horizontal" method="POST" action="{{ route('reset.save') }}" id="loginForm" name="loginForm">
                                {{csrf_field() }}                            
                                <!-- Input para el nombre de usuario -->
                   
                                  
                                <div class="form-group">
                                    <label for="email" class="col-md-3 control-label">Correo</label>
                                    <div class="col-md-9">
                                        <input type="email" id="email" class="form-control" name="email1" placeholder="Correo" value="{{$mail}}" readonly>
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <h6>{{ $errors->first('email') }}</h6>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                    

                                <div class="form-group">
                                    <label for="password" class="col-md-3 control-label">Contraseña</label>
                                    <div class="col-md-9">
                                        <input type="password"  class="form-control" name="password" id="password" placeholder="Contraseña" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" >
                                        <span class="">
                                            <h5 style="color: red;">Debe contener 8 o más caracteres, un número, una letra mayúscula.</h5>
                                        </span>
                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <h6>{{ $errors->first('password') }}</h6>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                 <div class="form-group">
                                    <label for="password" class="col-md-3 control-label">Confirmar Contraseña</label>
                                    <div class="col-md-9">
                                        <input type="password" class="form-control" name="confirmpassword" id="confirmpassword" placeholder="Confirmar contraseña">
                                        <span id="nota" style="display: none;">
                                                <h6 style="color: red;">Las contrase no son iguales</h6>
                                            </span>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <!-- Button -->                                        
                                    <div class="col-md-offset-3 col-md-9">
                                        <button disabled id="btn-signupRest" type="submit" class="btn btn-info"><i class="icon-hand-right"></i> &nbsp Guardar</button>
                                         
                                    </div>
                                </div>
                                

                                
                                
                            </form>
                </div>
            </div>
        </div>
    </div>
</div>

  <script src="{{ asset('js/jquery.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>


    <script src="{{ asset('js/jquery-ui.js') }}"></script>
    <script src="{{ asset('js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/validaciones.js') }}"></script>

    <script src="{{ asset('js/alerts/alertify.min.js') }}"></script>
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
<script type="text/javascript">


 $(window).on('load',function () {
  $(".loader").fadeOut(2000);
});
</script>
</body>
</html>