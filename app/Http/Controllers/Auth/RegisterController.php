<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Session;

use random;
use Illuminate\Http\Request;
use Mail;
use DB;
use URL;
use Redirect;
use PDO;

class RegisterController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/web/usuario';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    protected function register(Request $request)
    {

        $input = $request->all();
        $validator = $this->validator($input);

        if ($validator->passes()) {
            $data = $this->create($input)->toArray();

            
            $previo= Session::get('url');

            

            $data['token'] = $this->generarCodigo(12);
            $user = User::find($data['id']);
            $user->token = $data['token'];
            $user->url = $previo['intended'];
            $user->estado = 1;
            $user->save();
            //dd($user->id);
            $mysqli = cxCompra();
       
            //finaliza la compra guardadon los terminos y condiciones
            $call = $mysqli->prepare('CALL sitio_reg_usuario(:id, :mail, :name)');
            
            $call->bindParam(':id',$data['id'], PDO::PARAM_INT);
            $call->bindParam(':mail', $data['email'], PDO::PARAM_STR);
            $call->bindParam(':name', $data['name'], PDO::PARAM_STR);
                        


            $call->execute();

            //$registro = DB::connection('control')->statement('call sitio_reg_usuario(?)',array($user->id));

            $mail = new \PHPMailer\PHPMailer\PHPMailer(true);
            try{



                        $cuerpoCorrep= '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>CHOCOMERCIOS CORREO</title>
    <!-- Designed by https://github.com/kaytcat -->
    <!-- Header image designed by Freepik.com -->

    <style type="text/css">
    /* Take care of image borders and formatting */

    img { max-width: 600px; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic;}
    a img { border: none; }
    table { border-collapse: collapse !important; }
    #outlook a { padding:0; }
    .ReadMsgBody { width: 100%; }
    .ExternalClass {width:100%;}
    .backgroundTable {margin:0 auto; padding:0; width:100%;!important;}
    table td {border-collapse: collapse;}
    .ExternalClass * {line-height: 115%;}


    /* General styling */

    td {
      font-family: Arial, sans-serif;
      color: #5e5e5e;
      font-size: 16px;
      text-align: left;
    }

    body {
      -webkit-font-smoothing:antialiased;
      -webkit-text-size-adjust:none;
      width: 100%;
      height: 100%;
      color: #5e5e5e;
      font-weight: 400;
      font-size: 16px;
    }



    a {
      color: #005000;
      text-decoration: none;
    }


    .body-padding {
      padding: 0 75px;
    }


    .force-full-width {
      width: 100% !important;
    }

    .icons {
      text-align: right;
      padding-right: 30px;
    }

    .logo {
      text-align: left;
      padding-left: 30px;
    }

    .computer-image {
      padding-left: 30px;
    }

    .header-text {
      text-align: left;
      padding-right: 30px;
      padding-left: 20px;
    }

    .header {
      color: #232925;
      font-size: 24px;
    }



    </style>

    <style type="text/css" media="screen">
        @media screen {
          @import url(http://fonts.googleapis.com/css?family=PT+Sans:400,700);
          /* Thanks Outlook 2013! */
          * {
            font-family: "PT Sans", "Helvetica Neue", "Arial", "sans-serif" !important;
          }
        }
    </style>

    <style type="text/css" media="only screen and (max-width: 599px)">
      /* Mobile styles */
      @media only screen and (max-width: 599px) {

        table[class*="w320"] {
          width: 320px !important;
        }

        td[class*="icons"] {
          display: block !important;
          text-align: center !important;
          padding: 0 !important;
        }

        td[class*="logo"] {
          display: block !important;
          text-align: center !important;
          padding: 0 !important;
        }

        td[class*="computer-image"] {
          display: block !important;
          width: 230px !important;
          padding: 0 45px !important;
          border-bottom: 1px solid #e3e3e3 !important;
        }


        td[class*="header-text"] {
          display: block !important;
          text-align: center !important;
          padding: 0 25px!important;
          padding-bottom: 25px !important;
        }

        *[class*="mobile-hide"] {
          display: none !important;
          width: 0 !important;
          height: 0 !important;
          line-height: 0 !important;
          font-size: 0 !important;
        }
        
}

      }
    </style>
  </head>
  <body  offset="0" class="body" style="padding:0; margin:0; display:block; background:#ffffff; -webkit-text-size-adjust:none" bgcolor="#ffffff">
  <table align="center" cellpadding="0" cellspacing="0" width="100%" height="100%">
    <tr>
      <td align="center" valign="top" style="background-color:#ffffff" width="100%">

      <center>
        <table cellspacing="0" cellpadding="0" width="600" class="w320">
          <tr>
            <td align="center" valign="top">

              <table class="force-full-width" cellspacing="0" cellpadding="0" bgcolor="#232925">
                <tr>
                  <td style="background-color:#232925" class="logo">
                                        
                  </td>
                  <td class="icons">
                    <br>
                    <a href="#"><img src="https://www.filepicker.io/api/file/Rw9fFADxSxK1JyEuQanm" alt="facebook"></a>
                    <a href="#"><img src="https://www.filepicker.io/api/file/WzHKffHYQKe7xpO35hSw" alt="twitter"></a>
                    <a href="#"><img src="https://www.filepicker.io/api/file/doa3fyePR0Kdnu55nlNo" alt="google+"></a>
                    <a href="#"><img src="https://www.filepicker.io/api/file/dresyXUMRjalUp3zvwXC" alt="instagram"></a>
                  </td>
                </tr>
              </table>

              <table cellspacing="0" cellpadding="0" class="force-full-width" bgcolor="#232925">
                <tr>
                  <td class="computer-image">
                    <br>
                    <br class="mobile-hide" />
                    <img style="display:block;" width="120" height="120" src="http://18.221.83.97/images/Logo.png" alt="hello">
                  </td>
                  <td style="color: #ffffff;" class="header-text">
                    <br>
                    <br>
                    <span style="font-size: 24px;">CHOCOMERCIOS</span><br><br>
                    Confirmación de Registro
                    <br>
                    
                      <br>
                  </td>
                </tr>
              </table>


              <table class="force-full-width" cellspacing="0" cellpadding="30" bgcolor="#ebebeb">
                <tr>
                  <td>
                    <table cellspacing="0" cellpadding="0" class="force-full-width">
                      <tr>
                        <td style="text-align: justify;">
                          <span class="header">Estimado Cliente</span><br><br>
                            Te damos la más cordial bienvenida al sitio CHOCOMERCIOS, donde podrás realizar tus compras de espacios publicitarios para que tu empresa aparezca  en la aplicación móvil CHOCOMERCIOS, una vez realizada tu compra te permitirá administrar todo el contenido de información básica, identidad, horarios, sucursales, productos y promociones que desees publicar.
                          <br>
                        </td> 
                        
                      </tr>
                      <tr>
                        <td>
                          <br>
                          Para continuar, es necesario finalizar tu registro 
                        </td>
                      </tr>
                      <tr>
                        <td>
                            <br><br>
                             <a style="background-color:#005000;color:#ffffff;display:inline-block;font-family:Helvetcia, sans-serif;font-size:16px;font-weight:light;line-height:40px;text-align:center;text-decoration:none;width:150px;-webkit-text-size-adjust:none;" href="'.route('confirmation',$data['token']).'">Confirma tu Registro</a>
                        </td>
                      </tr>
                    </table>
                    
                    <table cellspacing="0" cellpadding="0" class="force-full-width">
                      <tr>
                        <td style="text-align: justify;">
                          <br><br>
                          <b>Nota Informativa: </b> 
                            Ésta confirmación se podrá realizar en un periodo máximo de 15 días. En caso de que no confirmes tendrás que registrarte nuevamente, debido a que tu cuenta sería dada de baja.
                            <br><br>
                            Saludos cordiales.
                            <br>
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
              
              <table class="force-full-width" cellspacing="0" cellpadding="20" bgcolor="#005000">
                <tr>
                  <td  style="background-color:#005000; color:#ffffff; font-size: 14px; text-align: center;">
                    © 2017 Todos los Derechos Reservados
                  </td>
                </tr>
              </table>


            </td>
          </tr>
        </table>

      </center>
      </td>
    </tr>
  </table>
  </body>
</html>';


                        $mail->SMTPSecure="tls";
                        $mail->SMTPAutoTLS = false; //Si no se cuenta con certificado valido
                        $mail->Host='mail.prosim.com.mx';
                        $mail->Port='587';
                        $mail->Username='notificaciones@prosim.com.mx'; // SMTP account username
                        $mail->Password='Prosim@2017';
                        $mail->SMTPKeepAlive = true;
                        $mail->Mailer = 'smtp';
                        $mail->IsSMTP(); // telling the class to use SMTP
                        $mail->SMTPAuth=true;                  //enable SMTP authentication
                        $mail->CharSet='utf-8';
                        $mail->SMTPDebug=0; //Habilitar depuracion: 2,3,4

            		    //Deshabilitar la validacion de certificados (NO RECOMENDADO)
            		    $mail->SMTPOptions=array(
            					'ssl'=>array(
            						'verify_peer'=>false,
            						'verify_peer_name'=>false,
            						'allow_self_signed'=>true
            						)
            					);

                        $mail->From = 'notificaciones@prosim.com.mx';
                        $mail->FromName = 'Notificaciones CHOCOMERCIOS';
                        $mail->addAddress($data['email']);               // Destinatario
    		           // $mail->addCC('cruz.dominguez@prosim.com.mx');    // Con copia para
                        $mail->isHTML(true);                                  // Set email format to HTML
                        $mail->Subject = 'Correo de verificación de cuenta CHOCOMERCIOS';
                        $mail->Body    = $cuerpoCorrep;
                        
                        $mail->send();
                     
            }catch(phpmailerException $e){
                        dd($e);
                     }catch(Exception $e){
                        dd($e);
                     } /*
            Mail::send('mails.confirmation', $data, function($message) use($data){
                $message->to($data['email']);
                $message->subject('Correo de confirmación');
            });*/
            return redirect(route('login'))->with('status','Se ha enviado un correo de confirmación a '.$data['email'].', por favor revise su correo electrónico!!');
        }
       // dd($validator->errors()->all());
        return redirect(route('login'))->with('status', $validator->validate());
    }
    /**
     * función confirma la cuenta de correo del usuario registrado
     * @param  [type] $token [description]
     * @return [type]        [description]
     */
    public function confirmation($token)
    { 

       /* $session = '';
        $previo= Session::get('url');

        $local= Session::get('local');
        (isset($previo['intended']))? $session = $previo['intended'] : $session = $local; */
        
        $user = User::where('token',$token)->first();

        if (!is_null($user)) {
            $user->confirmed = 1;
            $user->token = '';
            $user->save();
            return redirect(route('login'))->with('status','Tu cuenta ha sido activada correctamente!!');
            //return Redirect::to($session)->with('status','Tu cuenta ha sido activada correctamente!!');
        }
       
         return redirect(route('login'))->with('status','Algo salio mal, contacte a soporte!!');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
     //Funcion que genera el codigo //
         function generarCodigo($longitud) {
          $key = '';
          $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
          $max = strlen($pattern)-1;
          for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
          return $key;
     }
}
