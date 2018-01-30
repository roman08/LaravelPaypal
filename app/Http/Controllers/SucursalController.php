<?php

namespace App\Http\Controllers;

use Illuminate\Support\Collection as Collection;

use Illuminate\Http\Request;
use App\Municipio;
use PDO;
use DB;
use Illuminate\Support\Facades\Input;
use Response;

use Illuminate\Support\Facades\Auth;

class SucursalController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
      
        $userCliente = $user->idcliente;
        $empresafiscal = DB::connection('control')->select('call venta_obt_empresas(?)',array($userCliente));
        $empresafiscal = Collection::make($empresafiscal)->first();
        $idempresa = $empresafiscal->idempresa;
        $municipios=Municipio::where('idestado',27)->pluck('nombre','idmunicipio');
        $sucursal = null;
        return view('sucursales.index', compact('municipios','idempresa','sucursal'));
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
        //dd($request->all());
        $datos = $request->all();
        $mysqli = cxCompra();

         $entrega = 0;
        if(isset($datos['entrega']) && $datos['entrega'] == 'on')
        {
            $entrega = 1;
        }
           
        //finaliza la compra guardadon los terminos y condiciones
        $call = $mysqli->prepare('CALL panel_reg_sucursal(:empresa, :municipio, :nombre, :calle, :numero, :interior, :colonia, :cp, :telefono, :entrega, :lat, :log, @result)');

        $call->bindParam(':empresa', $datos['idempresa'], PDO::PARAM_INT);
        $call->bindParam(':municipio',  $datos['idmunicipio'], PDO::PARAM_INT);
        $call->bindParam(':nombre',  $datos['nombreS'], PDO::PARAM_INT);
        
        $call->bindParam(':calle',  $datos['calle'], PDO::PARAM_STR);
        $call->bindParam(':numero',  $datos['numero'], PDO::PARAM_STR);
        $call->bindParam(':interior',  $datos['interior'], PDO::PARAM_STR);
        $call->bindParam(':colonia',  $datos['colonia'], PDO::PARAM_STR);
        $call->bindParam(':cp',  $datos['cp'], PDO::PARAM_STR);


        $call->bindParam(':telefono',  $datos['telefono'], PDO::PARAM_INT);
        $call->bindParam(':entrega',  $entrega, PDO::PARAM_INT);
        $call->bindParam(':lat',  $datos['lat'], PDO::PARAM_INT);
        $call->bindParam(':log',  $datos['lng'], PDO::PARAM_STR);

        $call->execute();
        $select = $mysqli->query('SELECT @result');
        $result = $select->fetch(PDO::FETCH_ASSOC);
        $resultado     = $result['@result'];
        //dd($resultado);

          if($resultado == 1)
            {

                return redirect()->back()->with('status', 'La sucursal se guardo  correctamente.');
              
            }else{
                return redirect()->back()->with('error', 'Algo salio mal no se pudo guardar la sucursal. Contacte al administrador.');
            }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $id = Input::get('id');
        
        $sucursal = DB::connection('control')->select('call panel_info_sucursal(?)',array($id));
        $sucursal = Collection::make($sucursal)->first();
        $secciones = explode(",", $sucursal->direccion);
         $municipios=Municipio::where('idestado',27)->pluck('nombre','idmunicipio');
         $sucursal->secciones = $secciones;
         //dd($sucursal);
         return Response::json($sucursal);
        return view('sucursales.edit',compact('sucursal','municipios','secciones'));
            
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        dd($id);
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

         $entrega = 0;
        if(isset($datos['lat']) && $datos['entrega'] == 'on')
        {
            $entrega = 1;
        }
         //dd($entrega);  
        //finaliza la compra guardadon los terminos y condiciones
        $call = $mysqli->prepare('CALL panel_edita_sucursal(:sucursal, :municipio, :nombre, :calle, :numero, :interior, :colonia, :cp, :telefono, :entrega, :lat, :log, @result)');

        $call->bindParam(':sucursal', $datos['idsucursal'] , PDO::PARAM_INT);
        $call->bindParam(':municipio',  $datos['idmunicipio'], PDO::PARAM_INT);
        $call->bindParam(':nombre',  $datos['nombre'], PDO::PARAM_INT);
        
        $call->bindParam(':calle',  $datos['calle'], PDO::PARAM_STR);
        $call->bindParam(':numero',  $datos['numero'], PDO::PARAM_STR);
        $call->bindParam(':interior',  $datos['interior'], PDO::PARAM_STR);
        $call->bindParam(':colonia',  $datos['colonia'], PDO::PARAM_STR);
        $call->bindParam(':cp',  $datos['cp'], PDO::PARAM_STR);

        $call->bindParam(':telefono',  $datos['telefono'], PDO::PARAM_INT);
        $call->bindParam(':entrega',  $entrega, PDO::PARAM_INT);
        $call->bindParam(':lat',  $datos['lat'], PDO::PARAM_INT);
        $call->bindParam(':log',  $datos['lng'], PDO::PARAM_STR);

        $call->execute();
        $select = $mysqli->query('SELECT @result');
        $result = $select->fetch(PDO::FETCH_ASSOC);
        $resultado     = $result['@result'];
        //dd($resultado);
        if($resultado == 1)
            {

                return redirect()->back()->with('status', 'La sucursal se guardo  correctamente.');
              
            }else{
                return redirect()->back()->with('error', 'Algo salio mal no se pudo guardar la sucursal. Contacte al administrador.');
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
        //dd('destroy'.$id);
        $mysqli = cxCompra();
        $call = $mysqli->prepare('CALL panel_elimina_sucursal(:sucursal, @result)');
        $call->bindParam(':sucursal', $id , PDO::PARAM_INT);

        $call->execute();
        $select = $mysqli->query('SELECT @result');
        $result = $select->fetch(PDO::FETCH_ASSOC);
        $resultado     = $result['@result'];
        //dd($resultado);
        if($resultado == 1)
            {

                return redirect()->back()->with('status', 'La sucursal se borro  correctamente.');
              
            }else{
                return redirect()->back()->with('error', 'Algo salio mal no se pudo borrar la sucursal. Contacte al administrador.');
            }
    }

    public function buscaHorario()
    {   
        $sucursal = Input::get('id');
        //$id = ;
        $idempresa = 0;
        $opcion = 0;
        $horariosC = DB::connection('control')->select('CALL panel_obt_horario(?,?)',array($idempresa,$sucursal));
        $horarios = Collection::make($horariosC);

       
        $horarios = null;
        $totalDiasChek = 0;
        $lunes = null;
        $martes = null;
        $miercoles = null;
        $jueves = null;
        $viernes = null;
        $sabado = null;
        $domingo = null;
        
        if($horariosC)
        {
            $lunes = $horariosC[0];
            $martes = $horariosC[1];
            $miercoles = $horariosC[2];
            $jueves = $horariosC[3];
            $viernes = $horariosC[4];
            $sabado = $horariosC[5];
            $domingo = $horariosC[6];
            $horarios = Collection::make($horariosC);
            foreach ($horarios as $key)
            {
                if($key->opcion > 0)
                {
                    $opcion = $key->opcion;
                    $totalDiasChek++;
                }
            }
        }



        return Response::json([
            'totalDiasChek' => $totalDiasChek,
            'msg' => 'hola',
            'horario' => $horariosC,
            'opcion' => $opcion,
            'lunes' => $lunes,
            'martes' => $martes,
            'miercoles' => $miercoles,
            'jueves' => $jueves,
            'viernes' => $viernes,
            'sabado' => $sabado,
            'domingo' => $domingo,
        ]);
    }
}
