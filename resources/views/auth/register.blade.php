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

        <div id="signupbox" style=" margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="panel-title">Registro en CHOCOMERCIOS</div>
                        </div>  
                        <div class="panel-body" >
                             <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                                {{csrf_field() }}                            
                                <!-- Input para el nombre de usuario -->
                                <div class="form-group">
                                    <label for="firstname" class="col-md-3 control-label">Nombre</label>
                                    <div class="col-md-9">
                                        <input type="text" id="username" class="form-control" name="name" placeholder="Nombre">
                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                                <h6>{{ $errors->first('name') }}</h6>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                  
                                <div class="form-group">
                                    <label for="email" class="col-md-3 control-label">Correo</label>
                                    <div class="col-md-9">
                                        <input type="email" id="email" class="form-control" name="email" placeholder="Correo">
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
                                        <input type="password" id="password" class="form-control" name="password" placeholder="Contraseña" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
                                        <span class="help-block">
                                            <h6>Debe contener 8 o más caracteres, un número, una letra mayúscula.</h6>
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
                                        <input type="password" id="password-confirm" class="form-control" name="password_confirmation" placeholder="Confirmar contraseña">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <!-- Button -->                                        
                                    <div class="col-md-offset-3 col-md-9">
                                        <button id="btn-signup" type="submit" class="btn btn-info"><i class="icon-hand-right"></i> &nbsp Registrarme</button>
                                         
                                    </div>
                                </div>
                                
                                <div  class="form-group">
                                    <div class="col-md-12 control" style="margin-top:10px">
                                        <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                            Ya tienes una cuenta ! 
                                        <a href="/login" >
                                            Ingresa a CHOCOMERCIOS!
                                        </a>
                                        </div>
                                    </div>
                                </div>  
                                
                                
                                
                            </form>
                         </div>
                    </div>

               
               
                
         </div> 
    </div>
    <!--Footer-->
    <!--/ Footer-->
    

<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>

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
    $(window).on('load',function () 
    {
        $(".loader").fadeOut(2000);
    });
</script>

</body>
</html>