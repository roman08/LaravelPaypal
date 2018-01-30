
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
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            {{ session('error') }}
                        </div>
                    @endif
                    <form class="form-horizontal" method="POST" action="{{ route('reset.pass') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Correo</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" id='btnEnvioPass' class="btn btn-success">
                                    Enviar enlace para cambiar contraseña
                                </button>
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

    $(document).on('click','#btnEnvioPass',function()
    {
     
        $(".loader").fadeIn(2000);
    });
</script>
</body>
</html>