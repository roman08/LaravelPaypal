<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Collection as Collection;
use Illuminate\Support\Facades\Crypt;
use DB;
use PDO;
use Response;
use App\Municipio;
use Illuminate\Support\Facades\Auth;


class EmpresasController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id = null)
    {
        $id = Input::get('id');
        $planes = DB::connection('control')->select('call general_obt_planes');
        $planes = Collection::make($planes);
        
        if($id)
        {
            $id = Crypt::decrypt(Input::get('id'));
            $plan = DB::connection('control')->select('call general_obt_id_plan(?)',array($id));
            $plan = Collection::make($plan)->first();
   
        }else{
            $plan = Collection::make($planes)->first();
        }

        //$plan = Collection::make($plan);  
       

         $municipios=Municipio::where('idestado',27)->pluck('nombre','idmunicipio');
        // dd($plan);
      //  $dos = Crypt::decrypt($id);   
      //  dd($dos);
        return view('empresas.index',compact('id','planes','plan','municipios'));
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
        //usamos el metod auth de laravel para obtener los datos de usuarios
        $user = Auth::user();
        $userid = $user->id;

            $idt = DB::connection('control')->select('CALL venta_obt_cliente(?)',array($userid));
            $idtrans = Collection::make($idt)->first();  
            ($idtrans)? $idcliente = $idtrans->idcliente : $idcliente = 0;
          // dd($idtrans);
        //obtenemos los datos del formularios
        $datos = $request->all();
        
        $plan = $datos['plan'];
        $idmunicipio = null;
        $rfc = $datos['rfc'];
        $nombre = $datos['nombre'];
        $razons_social = $datos['razon_social'];
        $domicilio_fiscal = $datos['domicilio_fiscal'];
        $telefono = $datos['telefono'];
        $contacto = $datos['contacto'];
        $email = $datos['mail'];
        $latitud = null;
        $longitud = null;
        $meses = $datos['meses'];
        $precio = $datos['precio'];

        $totalpago = ($meses*$precio);
        //dd($nombre);
        
             
       //creamos la coccion de pdo a la base de datos

            $mysqli = cxCompra();

            $call = $mysqli->prepare('CALL venta_reg_transaccion_compra(:userid,:plan,:cliente,:rfc,:nombre,:razon,:domicilio,:telefono,:contacto,:email,:latitud,:longitud,:mes,:precio,@resultado)');

            $call->bindParam(':userid', $userid, PDO::PARAM_INT);
            $call->bindParam(':plan', $plan, PDO::PARAM_INT);
            $call->bindParam(':cliente', $idcliente, PDO::PARAM_INT);
            $call->bindParam(':rfc', $rfc, PDO::PARAM_STR);
            $call->bindParam(':nombre', $nombre, PDO::PARAM_STR);
            $call->bindParam(':razon', $razons_social, PDO::PARAM_STR);
            $call->bindParam(':domicilio', $domicilio_fiscal, PDO::PARAM_STR);
            $call->bindParam(':telefono', $telefono, PDO::PARAM_STR);
            $call->bindParam(':contacto', $contacto, PDO::PARAM_STR);
            $call->bindParam(':email', $email, PDO::PARAM_STR);
            $call->bindParam(':latitud', $latitud, PDO::PARAM_INT);
            $call->bindParam(':longitud', $longitud, PDO::PARAM_INT);
            $call->bindParam(':mes', $meses, PDO::PARAM_INT);
            $call->bindParam(':precio', $precio, PDO::PARAM_INT);

            $call->execute();
            $select = $mysqli->query('SELECT @resultado');

            $result = $select->fetch(PDO::FETCH_ASSOC);
            $idtransaccion = $result['@resultado'];
    //dd($idtransaccion);
          if($idtransaccion > 0)
          {     
              
                
                    
                return redirect()->action('\App\Http\Controllers\CompraController@index', ['idp' => $plan, 'idt' => $idtransaccion,'totapago' => $totalpago, 'meses' =>$meses, 'nombre' => $nombre]);
           }else{
                Input::flash(); 
                return redirect()->back()->with('error', 'Lo sentimos algo salio mal, contacte al administrador.')->withInput();
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
        $empresafiscal = DB::connection('control')->select('call venta_obt_info_empresas(?)',array($id));
        $empresafiscal = Collection::make($empresafiscal)->first();
//dd($empresafiscal);
        return view('empresas.edit', compact('empresafiscal'));
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
        
        $datos = $request->all();
        $mysqli = cxCompra();

        $call = $mysqli->prepare('CALL venta_edita_empresa(:idempresa,:nombre,:razon,:rfc,:domicilio,:telefono,:email,:contacto,@resultado)');

        $call->bindParam(':idempresa', $id, PDO::PARAM_INT);
        $call->bindParam(':nombre', $datos['nombre'], PDO::PARAM_STR);
        $call->bindParam(':razon',  $datos['razon_social'], PDO::PARAM_STR);
        $call->bindParam(':rfc',  $datos['rfc'], PDO::PARAM_STR);
        $call->bindParam(':domicilio',  $datos['domicilio_fiscal'], PDO::PARAM_STR);
        $call->bindParam(':telefono',  $datos['telefono'], PDO::PARAM_STR);
        $call->bindParam(':email',  $datos['mail'], PDO::PARAM_STR);
        $call->bindParam(':contacto',  $datos['contacto'], PDO::PARAM_STR);
        $call->execute();
        $select = $mysqli->query('SELECT @resultado');

        $result = $select->fetch(PDO::FETCH_ASSOC);
        $resultado = $result['@resultado'];
        //dd($resultado);
        if($resultado > 0)
        {
            return redirect()->back()->with('status', 'Los datos fueron actualizdos correctamente.');
        }else{
            return redirect()->back()->with('error', 'Lo sentimos algo salio mal, contacte al administrador.');
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
        //
    }

    public function obtienePlan()
    {
        $idplan = Input::get('id');
        $plan = DB::connection('control')->select('CALL general_obt_id_plan(?)',array($idplan));
        $plan = Collection::make($plan)->first();   
           return Response::json(         
                    $plan     
                );
    }
}
