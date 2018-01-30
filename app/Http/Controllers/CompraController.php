<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Collection as Collection;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;

use DB;
use PDO;
use Response;
use App\Municipio;
use App\User;
use Illuminate\Support\Facades\Auth;
class CompraController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $idt = Input::get('idt');
        $idplan = Input::get('idp');
        $meses = Input::get('meses');
        $totapago = Input::get('totapago');
        $empresa = Input::get('nombre');


        $user = Auth::user();
        $user->estado = 2;
        $user->url = $idt.','.$idplan.','.$meses.','.$totapago.','.$empresa;
        $user->save();
        //dd($user);
        //Session::put('local',Request::url());

        $plan = DB::connection('control')->select('CALL general_obt_id_plan(?)',array($idplan));
        $plan = Collection::make($plan)->first();   

        $idempresa = DB::connection('control')->select('call venta_obt_empresa_id(?)',array($idt));
        $idempresa = Collection::make($idempresa)->first();
        $idempresa = $idempresa->idempresa;

        return view('compras.index',compact('plan','idt','totapago','meses', 'empresa', 'idempresa'));
    }
    /** 
    *
    *
    *
    *
    */
        public function remenber()
    {
       
       $user = Auth::user();
       /*
       *0=> idt
       *1=> idplan
       *2=>meses
       *3=>totapago
       *4=>empresa
       */
       $porciones = explode(",", $user->url);
        $idt = $porciones[0];
        $idplan = $porciones[1];
        $meses = $porciones[2];
        $totapago = $porciones[3];
        $empresa = $porciones[4];


        $plan = DB::connection('control')->select('CALL general_obt_id_plan(?)',array($idplan));
        $plan = Collection::make($plan)->first();   

        $idempresa = DB::connection('control')->select('call venta_obt_empresa_id(?)',array($idt));
        $idempresa = Collection::make($idempresa)->first();
        $idempresa = $idempresa->idempresa;

        return view('compras.index',compact('plan','idt','totapago','meses', 'empresa', 'idempresa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $datos = $request->all();
        //dd($datos);
        $detallesCompra = DB::connection('control')->select('call venta_obt_ctrl_info_pago(?)',array($datos['idtrans']));
        $detallesCompra = Collection::make($detallesCompra)->first();
        //dd( $detallesCompra);
        if($datos['pago'] =='paypal')
        {
            $tipoPlanC = 'Plan_'.$detallesCompra->tipoplan;
            $meses = $detallesCompra->meses;
            $costo = 100;
            return redirect()->route('payment', array('plan' => $tipoPlanC, 'meses' =>$meses, 'costo' => $costo));  
            //dd('paypal');
        }
        $meses = 'meses';
        if($detallesCompra->meses == 1)
        {
          $meses = 'mes';
        }
        //dd($detallesCompra->meses);
        $termino = false;
        if($datos['termino'] == 'on')
        {
            $termino = true;
        }
        $privacidad = false;
        if($datos['privacidad'] == 'on')
        {
            $privacidad = true;
        }
         
        
        $mysqli =cxCompra();
         
        //finaliza la compra guardadon los terminos y condiciones
        $call = $mysqli->prepare('CALL venta_reg_finaliza_compra(:transaccion, :termino, :privacidad, :pago, @result)');

        $call->bindParam(':transaccion', $datos['idtrans'], PDO::PARAM_INT);
        $call->bindParam(':termino', $termino, PDO::PARAM_INT);
        $call->bindParam(':privacidad', $privacidad, PDO::PARAM_INT);
        $call->bindParam(':pago', $datos['pago'], PDO::PARAM_STR);

        $call->execute();
        $select = $mysqli->query('SELECT @result');
        $result = $select->fetch(PDO::FETCH_ASSOC);
        $resultado     = $result['@result'];

//dd($resultado);
    /*      $fecha = null;
        $emisor = 0;
        $autorizacion = null;
        $comprobante = null;
        $observacion = null;
//dd($datos['idtrans']);
        //simulamos el pago directo
      $transferir = $mysqli->prepare('CALL venta_transferir_transaccion(:transaccion,:fecha, :emisor, :autorizacion, :comprobante, :observacion,  @result)');
        $transferir->bindParam(':transaccion',  $datos['idtrans'], PDO::PARAM_INT);
        $transferir->bindParam(':fecha', $fecha, PDO::PARAM_STR);
        $transferir->bindParam(':emisor', $emisor, PDO::PARAM_INT);
        $transferir->bindParam(':comprobante', $comprobante, PDO::PARAM_STR);
        $transferir->bindParam(':autorizacion', $autorizacion, PDO::PARAM_STR);
        $transferir->bindParam(':observacion', $observacion, PDO::PARAM_STR);



        $transferir->execute();
        $select = $mysqli->query('SELECT @result');
        $result = $select->fetch(PDO::FETCH_ASSOC);
        $resultado_t = $result['@result'];
*/
        $user = Auth::user();
        $iduser = $user->id;

        $cliente = DB::connection('control')->select('call venta_obt_cliente(?)',array($iduser));
        $cliente = Collection::make($cliente)->first();
        
        $usuario = User::find($iduser);
        //$usuario->idcliente = $cliente->idcliente;
        $usuario->url = "";
        $usuario->estado = 0;
        $usuario->save();
          //dd($usuario->email);
        /*****************************************
        ENVIO CORREO COMPRA 
        *****************************************/

         $mail = new \PHPMailer\PHPMailer\PHPMailer(true);
            try{
                        $cuerpoCorreo = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                        <html xmlns="http://www.w3.org/1999/xhtml">
                          <head>
                            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
                            <meta name="viewport" content="width=device-width, initial-scale=1" />
                            <title>CHOCOMERCIOS</title>
                          

                            <style type="text/css">
                          
                            img { max-width: 600px; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic;}
                            a img { border: none; }
                            table { border-collapse: collapse !important; }
                            #outlook a { padding:0; }
                            .ReadMsgBody { width: 100%; }
                            .ExternalClass {width:100%;}
                            .backgroundTable {margin:0 auto; padding:0; width:100%;!important;}
                            table td {border-collapse: collapse;}
                            .ExternalClass * {line-height: 115%;}

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
                                            Confirmación de Compra
                                            <br>
                                            <br>
                                              <div>
                                              </div>
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
                                                    CHOCOMERCIOS agradece su preferencia, le confirmamos que su solicitud de compra está en proceso, para finalizar debe seguir las siguientes instrucciones:
                                                  <br>
                                                </td>                 
                                              </tr>
                                              <tr>
                                                <td style="text-align: justify;">
                                                    <br><br>
                                                    <span class="header">Detalle de la Compra</span><br><br>
                                                    <b>'.$detallesCompra->empresa.'</b>
                                                    <br><b></b>Plan '.$detallesCompra->tipoplan.' por '.$detallesCompra->meses.' '.$meses.' . 
                                                    <br><b>Total a pagar: </b>$'.number_format($detallesCompra->cantidad).'.00 M/N.
                                                  <br>
                                                </td>
                                              </tr>
                                              <tr>
                                                 <td>
                                                    <br />
                                                      1.- Para completar su compra realice el depósito en la siguiente cuenta:
                                                      <br />
                                                  </td>
                                              </tr>
                                              <tr>
                                                  <td>
                                                     <br />
                                                    <table style="border: solid;">
                                                      <tr>
                                                        <td style="border: solid;">Banco: </td>
                                                        <td style="border: solid;">BANAMEX</td>
                                                      </tr>
                                                      <tr>
                                                        <td style="border: solid;">Nombre: </td>
                                                        <td style="border: solid;">Proyectos y Servicios Informáticos de México S. de R.L. de C.V.</td>
                                                      </tr>
                                                      <tr>
                                                        <td style="border: solid;">Cuenta: </td>
                                                        <td style="border: solid;">8105334495</td>
                                                      </tr>
                                                      <tr>
                                                        <td style="border: solid;">Clabe: </td>
                                                        <td style="border: solid;">002790701250674660</td>
                                                      </tr>
                                                    </table>

                                                </td>
                                              </tr>
                                              <tr>
                                                  <td style="text-align: justify;">
                                                    <br />
                                                     2.- Cuando realice el depósito debe enviar un correo a ventas@prosim.com.mx con el comprobante de pago y esperar la confirmación de la aprobación del pago.
                                                  </td>
                                              </tr>
                                            </table>          
                                            <table cellspacing="0" cellpadding="0" class="force-full-width">
                                              <tr>
                                                <td style="text-align: justify;">
                                                  <br><br>
                                                  <b>Nota Informativa: </b> 
                                                    Lo ideal es realizar su pago en un periodo máximo de 48 horas. En caso contrario puede comunicarse con nosotros al teléfono (993) 3525615, donde con gusto le atenderemos.
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
                        $mail->addAddress($usuario->email);               // Destinatario
                        //$mail->addCC('cruz.dominguez@prosim.com.mx');    // Con copia para
                        $mail->isHTML(true);                                  // Set email format to HTML
                        $mail->Subject = 'Detalles de la compra en CHOCOMERCIOS';
                        $mail->Body    = $cuerpoCorreo;
                        
                        $mail->send();
                     
            }catch(phpmailerException $e){
                        dd($e);
                     }catch(Exception $e){
                        dd($e);
                     } 
         if($resultado > 0)
        {
            return redirect(route('chocomercios.index'))->with('mensaje', 'Le enviamos un correo con la información para terminar su compra.');
        }else{
            return redirect(route('chocomercios.index'))->with('error', 'Algo salio mal no se pudo realizar la compra. Contacte al administrador.');
        }
       

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
