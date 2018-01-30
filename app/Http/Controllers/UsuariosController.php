<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Collection as Collection;

use App\User;
use App\Estado;
use App\Municipio;
use App\Fiscal;
use App\Tarjeta;

use Redirect;
use Response;
use Session;
use DB;
use PDO;


class UsuariosController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*
         *obtenemos el usurio logeado
        */
        $user = Auth::user();
        $usuario =  new Collection();
        $iduser = $user->id;

         /**
          * Buscamos si tiene datos de cliente
          */
        $resul = DB::connection('control')->select('call venta_obt_cliente(?)',array($iduser));
        $cliente = Collection::make($resul)->first();
        //dd($cliente);
        $estados = Estado::all();
        $municipios = [];

        if ($cliente) {
            $municipios=Municipio::where('idestado',$cliente->idestado)->pluck('nombre','idmunicipio');
        }

        $tarjetas = DB::connection('control')->select('call venta_obt_tarjetas_cliente(?)',array($iduser));
        $tarjetas = Collection::make($tarjetas);
//dd($resul);
        return view('clientes.index',compact('user', 'estados', 'municipios','iduser','usuario','cliente','tarjetas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        echo "hello post";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd('hello');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $tarjeta = DB::connection('control')->select('call venta_obt_tarjeta_esp(?)',array($id));
        $tarjeta = Collection::make($tarjeta)->first();

        $meses = array(
            '1' => '01',
            '2' => '02',
            '3' => '03',
            '4' => '04',
            '5' => '05',
            '6' => '06',
            '7' => '07',
            '8' => '08',
            '9' => '09',
            '10' => '10',
            '11' => '11',
            '12' => '12',
        );

        $tipos = array(
            'visa' => 'Visa',
            'mastercard' => 'MasterCard',
        );
        //dd($tarjeta);
        return view('clientes.show',compact('tarjeta','meses','tipos','id'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {

            $datos = $request->all();
            $id= $datos['id'];

            $tarjeta = $datos['numero_tarjeta'];
            $banco = $datos['banco'];
            $titular =$datos['titular'];
            $tipo = $datos['tipo'];
            $mes = $datos['mes'];
            $anio = $datos['anio'];
            $cp = $datos['cpp'];
           


            $mysqli = cxCompra();
            //dd($cp);
            $call = $mysqli->prepare('CALL venta_act_tarjeta_cliente(:id, :tarjeta, :banco, :titular, :tipo, :mes, :anio, :cp, @resultado)');

            $call->bindParam(':id', $id, PDO::PARAM_INT);
            $call->bindParam(':tarjeta', $tarjeta, PDO::PARAM_STR);
            $call->bindParam(':banco', $banco, PDO::PARAM_STR);
            $call->bindParam(':titular', $titular, PDO::PARAM_STR);
            $call->bindParam(':tipo', $tipo, PDO::PARAM_STR);
            $call->bindParam(':mes', $mes, PDO::PARAM_INT);
            $call->bindParam(':anio', $anio, PDO::PARAM_INT);
            $call->bindParam(':cp', $cp, PDO::PARAM_INT);

            $call->execute();
            $select = $mysqli->query('SELECT @resultado');
            $result = $select->fetch(PDO::FETCH_ASSOC);
            $idcliente = $result['@resultado'];

            //dd($idcliente);
            if($idcliente >0)
            {

                return redirect(route('usuario.index'))->with('status', 'sus datos se actualizaron correctamente');
              
            }else{
              Input::flash();
              return redirect(route('usuario.index'))->with('error', 'Lo sentimos algo salio mal, contacte al administrador.')->withInput();
            }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //obtenemos todos los datos del formulario

            $datos = $request->all();
//dd($datos);
            $user= $datos['id'];

            $nombre = $datos['nombre'];
            $rfc = $datos['rfc'];
            $dir =$datos['direccion'];
            $postal = $datos['codigo_postal'];
            $mun = $datos['municipio_id'];
            $telefono = $datos['telefono'];
            $correo = $datos['mail'];
            $titulo = $datos['titulo'];
            $idcliente = $datos['idcliente'];

            $mysqli = cxCompra();

            $call = $mysqli->prepare('CALL venta_act_cliente(:idcliente, :mun, :nombre, :dir, :rfc, :postal, :telefono, :correo, :titulo, @resultado)');

            $call->bindParam(':idcliente', $idcliente, PDO::PARAM_INT);
            $call->bindParam(':mun', $mun, PDO::PARAM_INT);
            $call->bindParam(':nombre', $nombre, PDO::PARAM_STR);
            $call->bindParam(':dir', $dir, PDO::PARAM_STR);
            $call->bindParam(':rfc', $rfc, PDO::PARAM_STR);
            $call->bindParam(':postal', $postal, PDO::PARAM_INT); 
            $call->bindParam(':telefono', $telefono, PDO::PARAM_STR);
            $call->bindParam(':correo', $correo, PDO::PARAM_STR);
            $call->bindParam(':titulo', $titulo, PDO::PARAM_STR);
            

            $call->execute();
            $select = $mysqli->query('SELECT @resultado');
            $result = $select->fetch(PDO::FETCH_ASSOC);
            $idcliente = $result['@resultado'];


            if($idcliente == 1)
            {

                return redirect()->back()->with('status', 'sus datos se actualizaron correctamente');
              
            }else{
                Input::flash(); 
                return redirect()->back()->with('error', 'Lo sentimos algo salio mal, contacte al administrador.')->withInput();
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //dd($id);
        //$resul = DB::connection('control')->select('call venta_elimina_tarjeta_cliente(?)',array($id));
        $mysqli = cxCompra();

        $call = $mysqli->prepare('CALL venta_elimina_tarjeta_cliente(:id, @resultado)');
        $call->bindParam(':id', $id, PDO::PARAM_INT);
        
        $call->execute();
        $select = $mysqli->query('SELECT @resultado');
        $result = $select->fetch(PDO::FETCH_ASSOC);
        $resultado = $result['@resultado'];
       // dd($resultado);
        if($resultado > 0)
            {
                return redirect()->back()->with('status', 'El registro fue eliminado correctamente');
              
            }else{
                return redirect()->back()->with('error', 'Lo sentimos algo salio mal, contacte al administrador.');
            }
    }

    /**
     * Obtine ul filtro de municipios segun el estado seleccionado
     * @param  int $id
     * @return  array muncipio ['id', 'nombre']
     */
    
    public function obtieneMuncipios()
    {
        $id = Input::get('id');
        $datos1 = Municipio::where('idestado',$id)->get();

        return Response::json($datos1);

    }

    public function guardaTarjeta(Request $request)
    {
      
        $datos = $request->all();
      /*  $tarjeta = Tarjeta::where('user_id', Input::get('id'))->first();
        if(!$tarjeta)
        {
           $tarjeta = new Tarjeta(); 
        }
*/      $user = Auth::user();
        $iduser = $user->id;
        $numero_tarjeta = $datos['numero_tarjeta'];
        $banco = $datos['banco'];
        $titular = $datos['titular'];
        $tipo = $datos['tipo'];
        $mes = $datos['mes'];
        $anio = $datos['anio'];
        $cp = $datos['cpp'];
      //  $user_id = $datos['id'];

        $mysqli = cxCompra();

        $call = $mysqli->prepare('CALL venta_reg_tarjeta(:user, :tarjeta, :banco, :titular, :tipo, :mes, :anio, :cp, @resultado)');
        $call->bindParam(':user', $iduser, PDO::PARAM_INT);
        $call->bindParam(':tarjeta', $numero_tarjeta, PDO::PARAM_STR);
        $call->bindParam(':banco', $banco, PDO::PARAM_STR);
        $call->bindParam(':titular', $titular, PDO::PARAM_STR);
        $call->bindParam(':tipo', $tipo, PDO::PARAM_STR);
        $call->bindParam(':mes', $mes, PDO::PARAM_INT); 
        $call->bindParam(':anio', $anio, PDO::PARAM_INT);
        $call->bindParam(':cp', $cp, PDO::PARAM_INT);         

        $call->execute();
        $select = $mysqli->query('SELECT @resultado');
        $result = $select->fetch(PDO::FETCH_ASSOC);
        $resultado = $result['@resultado'];
       // dd($resultado);
        if($resultado > 0)
            {

                return redirect()->back()->with('status', ' Sus datos se guardaron correctamente');
              
            }else{
                return redirect()->back()->with('error', 'Lo sentimos algo salio mal, contacte al administrador.');
            }

                    
                //);
    }
     public function obtieneSubcategoria()
    {

        $id = Input::get('id');
       
        $subcategoria = DB::connection('control')->select('CALL panel_obt_subcategoria(?)',array($id)); 
        return Response::json($subcategoria);

    }

    public function guardaCategoria(Request $request)
    {
        $datos = $request->all();
        $subcategoria = $datos['subcategoria'];
        $empresa = $datos['idempresa'];
       
        $mysqli = cxPanel();

        
        $call = $mysqli->prepare('CALL panel_reg_empresa_clasificacion(:empresa,:subcategoria,@resultado)');

            $call->bindParam(':empresa', $empresa, PDO::PARAM_INT);
            $call->bindParam(':subcategoria', $subcategoria, PDO::PARAM_INT);


            $call->execute();
            $select = $mysqli->query('SELECT @resultado');

            $result = $select->fetch(PDO::FETCH_ASSOC);
            $resultado = $result['@resultado'];
             //dd($resultado);
            if($resultado >0)
            {

                return redirect()->back()->with('status', 'sus datos se guardaron correctamente');
              
            }else{
                return redirect()->back()->with('error', 'Lo sentimos algo salio mal, contacte al administrador.');
            }
    }

    public function resetPass(Request $request)
    {
        
        $datos = $request->all();
        $email = $datos['email'];

         $user = User::where('email',$datos['email'])->get()->first();
         if($user)
         {

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
                                                                            <img style="display:block;" width="120" height="120" src="http://18.221.83.97/images/Logo.png" alt="ImagenLogo">
                                                                          </td>
                                                                          <td style="color: #ffffff;" class="header-text">
                                                                            <br>
                                                                            <br>
                                                                            <span style="font-size: 24px;">CHOCOMERCIOS</span><br><br>
                                                                            Recuperación de Contraseña
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
                                                                                  <br>
                                                                                </td> 
                                                                                
                                                                              </tr>
                                                                              <tr>
                                                                                <td style="text-align: justify;">
                                                                                  <br>
                                                                                    Usted ha solicitado el reestablecimiento de su contraseña, para configurar su nueva contraseña, haga clic en el botón, "Recuperar Contraseña"
                                                                                </td>
                                                                              </tr>
                                                                              <tr>
                                                                                <td style="text-align: justify;">
                                                                                    <br><br>
                                                                                     <a style="background-color:#005000;color:#ffffff;display:inline-block;font-family:Helvetcia, sans-serif;font-size:14px;font-weight:light;line-height:40px;text-align:center;text-decoration:none;width:150px;-webkit-text-size-adjust:none;" href="'.route('reset.form',$email).'">Recuperar Contraseña</a>
                                                                                </td>
                                                                              </tr>
                                                                            </table>
                                                                            
                                                                            <table cellspacing="0" cellpadding="0" class="force-full-width">
                                                                              <tr>
                                                                              <td style="text-align: justify;">
                                                                                  <br><br>
                                                                                  
                                                                                    En caso de que usted no haya solicitado el reestablecimiento de su contraseña, ignore este correo e ingrese de manero normal.
                                                                                    <br>
                                                                                </td>
                                                                                </tr>
                                                                                <tr>
                                                                                <td style="text-align: justify;">
                                                                                  <br>
                                                                                  
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
                                    $mail->addAddress($email);               // Destinatario
                                   // $mail->addCC('cruz.dominguez@prosim.com.mx');    // Con copia para
                                    $mail->isHTML(true);                                  // Set email format to HTML
                                    $mail->Subject = 'Solicitud de recuperarción de contraseña CHOCOMERCIOS';
                                    $mail->Body    = $cuerpoCorrep;
                                    
                                    $mail->send();
                                 
                        }catch(phpmailerException $e){
                                    return $e;
                                 }catch(Exception $e){
                                    return $e;
                                 }
                    return redirect(route('index'))->with('status', 'Se envió un correo con el enlace para la recuperación de su contraseña.');
                     //return redirect()->back()->with('status', 'Se envio un correo con le enlace para la recuperarción de su contraseña.');
        }else{
            return redirect()->back()->with('error', 'El correo ingresado no existe en nuestra base de datos.');
         }
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
          $pattern = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
          $max = strlen($pattern)-1;
          for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
          return $key;
     }

     public function forView($mail)
     {
            return view('auth.passwords._formReset',compact('mail'));
     }

     public function savePass(Request $request)
     {
        $datos = $request->all();
        //dd($datos);
        $user = User::where('email',$datos['email1'])->get()->first();
        

        $user->password = bcrypt($datos['password']);
        if($user->save())
        {
            return redirect(route('login.unico'))->with('status', 'Su contraseña ha sido cambiada correctamente.');
        }else{
            return redirect()->back()->with('status', 'Algo salio mal intente de nuevo.');
        }
        
        
     }

     public function validaMailUser()
     {
        $email = Input::get('email');
       
       $mysqli = cxCompra();

        $call = $mysqli->prepare('CALL general_valida_mail_cliente(:email, @resultado)');
        $call->bindParam(':email', $email, PDO::PARAM_INT);


        $call->execute();
        $select = $mysqli->query('SELECT @resultado');
        $result = $select->fetch(PDO::FETCH_ASSOC);
        $resultado = $result['@resultado'];


      
        return Response::json($resultado);

     }

}
 //(SQL: call venta_reg_tarjeta`(12,123456789123,santander,roman,visa,01,17,789456))