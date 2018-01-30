<div class="modal fade" id="myModalLogin" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    ×</button>
                <h4 class="modal-title" id="myModalLabel">
                    ¡Inicia sesión en tu cuenta de CHOCOMERCIOS! </h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-8" >
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#Login" data-toggle="tab">Login</a></li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="Login">
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
    </div>
</div>