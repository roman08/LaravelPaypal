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
   
   <!-- El contenido del cuerpo del home -->
   
    <!--  -->
    <!--  -->
    <!--  -->
    <!--  -->
    <!-- 
 container -->

        <div class="container">    
          @if($status = Session::get('status'))
            <div class="alert alert-info">
              {{ $status }}
            </div>
          @endif
        <div id="loginbox" style="margin-top:50px; " class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-success" >
                    <div class="panel-heading">
                        <div class="panel-title">Entrar a CHOCOMERCIOS</div>
                        <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a></div>
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
                      <form  method="POST" action="{{ route('login') }}">
                      {{ csrf_field() }}              
                            <div style="margin-bottom: 25px" class="input-group">
                                          <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                          <input id="lusername" type="email" class="form-control" name="email" value="" placeholder="Correo">                                       
                                    </div>
                                          @if ($errors->has('email'))
                                            <span class="help-block">
                                               <h6>{{ $errors->first('email') }}</h6>
                                            </span>
                                          @endif 
                                
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                                        <input id="password" type="password" class="form-control" name="password" placeholder="Contraseña">
                                    </div>
                                        @if ($errors->has('password'))
                                           <span class="help-block">
                                               <h6>{{ $errors->first('password') }}</h6>
                                           </span>
                                       @endif

                                
                            <div class="input-group">
                                      <div class="checkbox">
                                        <label>
                                          <input id="login-remember" type="checkbox" name="remember" value="1"> Recordarme
                                        </label>
                                      </div>
                                    </div>


                                <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->

                                    <div class="col-sm-12 controls">
                                      <input id="btn-login" class="btn btn-success"  type="submit" value="Ingresar..." />

                                    </div>
                                </div>
                            </form>     



                        </div>                     
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