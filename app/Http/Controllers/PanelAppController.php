<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Collection as Collection;
use Illuminate\Support\Facades\Session;
use Image;
use Illuminate\Support\Facades\Auth;

use Response;
use DB;
use PDO;
use App\Municipio;



class PanelAppController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*
            Crypt::encryptString(
            Crypt::encryptString(
            Crypt::encryptString(
            Crypt::encryptString(

        */
    
       // $this->eliminaUser(156);
        //dd('borra usurario');
          //  dd(public_path().'/img/Encabezado.png');
        $user = Auth::user();
      
        $userCliente = $user->idcliente;
        //recibomos el id cliente $idcliente = Crypt::decryptString(Input::get('id'));
        $idcliente = Input::get('id');
        //recibomos el id emoresa fiscal
        $idempresa = Input::get('empresa');

        //recibomos el id plan
        $idplan = Input::get('plan');
        $plan = DB::connection('control')->select('call general_obt_id_plan(?)',array($idplan));
        $plan = Collection::make($plan)->first();
        //dd($plan);
        //recibomos el id municipio
        $idmun = Input::get('mun');
        //recibomos el nombre de la empresa
        $nombre = Input::get('nombre'); 
        //Obtenemos la empresa fiscal
        $empresafiscal = DB::connection('control')->select('call venta_obt_info_empresas(?)',array($idempresa));
        $empresafiscal = Collection::make($empresafiscal)->first();
        $fechaTermino = $empresafiscal->fecha_vig_termino;
        $fechaTermino = str_replace('/', '-', $fechaTermino);
        $fechaTermino = $this->fechaCastellano( $fechaTermino);
        //obtenemos las promociones
        $promociones = null;
        $pro1 = null;
        $pro2 = null;
        $pro3 = null;
        $pro4 = null;
        $pro5 = null;
        $consultaPromociones = DB::connection('control')->select('call panel_obt_promociones(?)', array($idempresa));
        if($consultaPromociones)
        {
            $promociones = Collection::make($consultaPromociones);
            foreach ($promociones as $p) {
                if($p->numpromocion == 1)
                {
                    $pro1 = $p;
                }
                if($p->numpromocion == 2)
                {
                    $pro2 = $p;
                }
                if($p->numpromocion == 3)
                {
                    $pro3 = $p;
                }
                if($p->numpromocion == 4)
                {
                    $pro4 = $p;
                }
                if($p->numpromocion == 5)
                {
                    $pro5 = $p;
                }
            }
        }
        //Obtenemos los prodctos panel_obt_productos
        $productos = null;
        $prod1 = null;
        $prod2 = null;
        $prod3 = null;
        $prod4 = null;
        $prod5 = null;
        $prod6 = null;
        $prod7 = null;
        $prod8 = null;
        $prod9 = null;
        $prod10 = null;

        $consultaProductos = DB::connection('control')->select('call panel_obt_productos(?)', array($idempresa));
        if($consultaProductos)
        {
            $productos = Collection::make($consultaProductos);
            foreach ($productos as $p) {
                if($p->numproducto == 1)
                {
                    $prod1 = $p;
                }
                if($p->numproducto == 2)
                {
                    $prod2 = $p;
                }
                if($p->numproducto == 3)
                {
                    $prod3 = $p;
                }
                if($p->numproducto == 4)
                {
                    $prod4 = $p;
                }
                if($p->numproducto == 5)
                {
                    $prod5 = $p;
                }
                if($p->numproducto == 6)
                {
                    $prod6 = $p;
                }
                if($p->numproducto == 7)
                {
                    $prod7 = $p;
                }
                if($p->numproducto == 8)
                {
                    $prod8 = $p;
                }
                if($p->numproducto == 9)
                {
                    $prod9 = $p;
                }
                if($p->numproducto == 10)
                {
                    $prod10 = $p;
                }
            }
        }//dd($consultaProductos);
        /*****************************************
        fin productos
        *****************************************/
        $subcategorias = null;
        $consultasubcategorias = DB::connection('control')->select('call panel_obt_empresa_clasificacion(?)',array($idempresa));
        if($consultasubcategorias)
        {
            $subcategorias = Collection::make($consultasubcategorias);
        }
       //dd($subcategorias);
        $sucursales = null;
        
        $consultaSucursales = DB::connection('control')->select('CALL panel_obt_sucursales(?)',array($idempresa));
        if($consultaSucursales)
        {
            $sucursales = Collection::make($consultaSucursales);
        }
       // dd($sucursales);
        //buscamos la empresa app
        $empresaApp = null;
        $empresa = DB::connection('control')->select('CALL panel_obt_empresa(?)',array($idempresa));
        if($empresa)
        {   
            $empresaApp = Collection::make($empresa)->first(); 
             //$secciones = explode(",", $empresaApp->direccion);
           // dd($secciones);
        }
       //dd($empresaApp);
        //obtenemos las categorias para el select
        $categoria = DB::connection('control')->select('CALL panel_obt_categoria');
        //obtenemos horarios
        $contadorDiasChek = 0;
        $sucursal = null;
        $horarios = null;
        $opcion = null;
        $lunes = null;
        $martes = null;
        $miercoles = null;
        $jueves = null;
        $viernes = null;
        $sabado = null;
        $domingo = null;
        $horariosC = DB::connection('control')->select('CALL panel_obt_horario(?,?)',array($idempresa,$sucursal));
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
                    $contadorDiasChek++;

                }
            }
        }
        //dd($contadorDiasChek);
        //Obtenemos las categorias gurdadas
        $categoriasG = DB::connection('control')->select('CALL panel_obt_empresa_clasificacion(?)',array($idempresa)); 
        $entidad = null;
        if($empresaApp)
        {
            $entidad = DB::connection('control')->select('CALL panel_obt_empresa_entidad(?)',array($empresaApp->idempresa));
            $entidad = Collection::make($entidad)->first();
        }
       //dd($entidad);
        $municipios=Municipio::where('idestado',27)->pluck('nombre','idmunicipio');

        $horarios = array(
            '00:00' => '00:00',
            '00:30' => '00:30',
            '01:00' => '01:00',
            '01:30' => '01:30',
            '02:00' => '02:00',
            '02:30' => '02:30',
            '03:00' => '03:00',
            '03:30' => '03:30',
            '04:00' => '04:00',
            '04:30' => '04:30',
            '05:00' => '05:00',
            '05:30' => '05:30',
            '06:00' => '06:00',
            '06:30' => '06:30',
            '07:00' => '07:00',
            '07:30' => '07:30',
            '08:00' => '08:00',
            '08:30' => '08:30',
            '09:00' => '09:00',
            '09:30' => '09:30',
            '10:00' => '10:00',
            '10:30' => '10:30',
            '11:00' => '11:00',
            '11:30' => '11:30',
            '12:00' => '12:00',
            '12:30' => '12:30',
            '13:00' => '13:00',
            '13:30' => '13:30',
            '14:00' => '14:00',
            '14:30' => '14:30',
            '15:00' => '15:00',
            '15:30' => '15:30',
            '16:00' => '16:00',
            '16:30' => '16:30',
            '17:00' => '17:00',
            '17:30' => '17:30',
            '18:00' => '18:00',
            '18:30' => '18:30',
            '19:00' => '19:00',
            '19:30' => '19:30',
            '20:00' => '20:00',
            '20:30' => '20:30',
            '21:00' => '21:00',
            '21:30' => '21:30',
            '22:00' => '22:00',
            '22:30' => '22:30',
            '23:00' => '23:00',
            '23:30' => '23:30',
            '23:59' => '23:59',
        );
        //dd($plan);
        return view('panelApp.index',
            compact('idcliente','idempresa', 'idplan', 'idmun','nombre','empresaApp','categoria','subcategoria','categoriasG','entidad','empresafiscal','municipios','secciones','horarios','opcion','lunes','martes','miercoles','jueves','viernes','sabado','domingo','sucursales','subcategorias','pro1','pro2','pro3','pro4','pro5','prod1','prod2','prod3','prod4','prod5','prod6','prod7','prod8','prod9','prod10','plan','contadorDiasChek', 'fechaTermino'));
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

        $mysqli = cxPanel();

        $datos = $request->all();
        $sustituye = array("\r\n", "\n\r", "\n", "\r");
        $descripcion = str_replace($sustituye, "\n", $datos['descripcion']);  
        //dd($datos);
/*        $interior ="" ;

        if(isset($datos['interior']))
        {
            $interior = ''.$datos['interior'].',';
        }
        
        $direccion = $datos['calle'].','.$datos['numero'].','.$interior.''.$datos['colonia'].','.$datos['cp'].','.$datos['municipiop'].',Tab.';*/
        //dd($datos);
        $entrega = 0;
        if(isset($datos['entrega']) && $datos['entrega'] == 'on')
        {
            $entrega = 1;
        }
           
        if(isset($datos['idempreApp']) && $datos['idempreApp'] != null)
        {
           // dd($direccion);
            $update = $mysqli->prepare('CALL panel_edita_empresa_app(:empresa, :desc,:desccort,:calle, :numero, :interior, :colonia, :cp,:municipio, :tel, :mail, :entrega, :sitio, :palabras, :lat, :lng, @result)');

            $update->bindParam(':empresa', $datos['idempreApp'], PDO::PARAM_INT);
            
            $update->bindParam(':desc', $descripcion, PDO::PARAM_STR);
            $update->bindParam(':desccort', $datos['desc_corta'], PDO::PARAM_STR);
            
            $update->bindParam(':calle', $datos['calle'], PDO::PARAM_STR);
            $update->bindParam(':numero', $datos['numero'], PDO::PARAM_STR);
            $update->bindParam(':interior', $datos['interior'], PDO::PARAM_STR);
            $update->bindParam(':colonia', $datos['colonia'], PDO::PARAM_STR);
            $update->bindParam(':cp', $datos['cp'], PDO::PARAM_INT);

            $update->bindParam(':municipio', $datos['idmunicipio'], PDO::PARAM_INT);
            $update->bindParam(':tel', $datos['telefono'], PDO::PARAM_STR);
            $update->bindParam(':mail', $datos['correo'], PDO::PARAM_STR);
            $update->bindParam(':entrega', $entrega, PDO::PARAM_INT);
            $update->bindParam(':sitio', $datos['pagina'], PDO::PARAM_STR);
            $update->bindParam(':palabras', $datos['palabras'], PDO::PARAM_STR);
            $update->bindParam(':lat', $datos['lat'], PDO::PARAM_INT);
            $update->bindParam(':lng', $datos['lng'], PDO::PARAM_INT);


            $update->execute();
            $select = $mysqli->query('SELECT @result');
            $result = $select->fetch(PDO::FETCH_ASSOC);
            $resultado = $result['@result'];
          //dd($resultado);
            if($resultado == 1)
            {

                return redirect()->back()->with('status', 'Sus datos se actualizaron correctamente');
                //eturn redirect::back();
                //return redirect(route('chomercios.index'))->with('status', 'Su actualizo correctamente.');
            }else{
                Input::flash();
                return redirect()->back()->with('error', 'Sus datos no se actualizaron correctamente.')->withInput();
            }
           

        }else{
   
            //finaliza la compra guardadon los terminos y condiciones
            $call = $mysqli->prepare('CALL panel_registra_empresa_app(:empresa,:plan, :municipio, :nombre, :desc,:desccort,:calle, :numero, :interior, :colonia, :cp, :tel, :mail, :entrega, :sitio, :palabras, :lat, :lng, :estado, @result)');
     
           // dd($entrega);
            $estado = 'En Diseño';
            $call->bindParam(':empresa', $datos['idempresa'], PDO::PARAM_INT);
            $call->bindParam(':plan', $datos['idplan'], PDO::PARAM_INT);
            $call->bindParam(':municipio', $datos['idmunicipio'], PDO::PARAM_INT);
            $call->bindParam(':nombre', $datos['nombre'], PDO::PARAM_STR);
            $call->bindParam(':desc', $descripcion, PDO::PARAM_STR);
            $call->bindParam(':desccort', $datos['desc_corta'], PDO::PARAM_STR);
            
            $call->bindParam(':calle',  $datos['calle'], PDO::PARAM_STR);
            $call->bindParam(':numero',  $datos['numero'], PDO::PARAM_STR);
            $call->bindParam(':interior',  $datos['interior'], PDO::PARAM_STR);
            $call->bindParam(':colonia',  $datos['colonia'], PDO::PARAM_STR);
            $call->bindParam(':cp',  $datos['cp'], PDO::PARAM_INT);
           
            $call->bindParam(':tel', $datos['telefono'], PDO::PARAM_STR);
            $call->bindParam(':mail', $datos['correo'], PDO::PARAM_STR);
            $call->bindParam(':entrega', $entrega, PDO::PARAM_INT);
            $call->bindParam(':sitio', $datos['pagina'], PDO::PARAM_STR);
            $call->bindParam(':palabras', $datos['palabras'], PDO::PARAM_STR);
            $call->bindParam(':lat', $datos['lat'], PDO::PARAM_INT);
            $call->bindParam(':lng', $datos['lng'], PDO::PARAM_INT);
            $call->bindParam(':estado',$estado , PDO::PARAM_STR);


            $call->execute();
            $select = $mysqli->query('SELECT @result');
            $result = $select->fetch(PDO::FETCH_ASSOC);
            $resultado = $result['@result'];
             if($resultado > 0)
            {

                return redirect()->back()->with('status', 'Sus datos se guardaron correctamente');
                //eturn redirect::back();
                //return redirect(route('empresas.index'))->with('status', 'Sus datos se guardaron correctamente.');
            }else{
                Input::flash();
                return redirect()->back()->with('error', 'Sus datos no se guardaron correctamente.')->withInput();
            }
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
       
        
        $mysqli = cxPanel();
   
        //finaliza la compra guardadon los terminos y condiciones
        $call = $mysqli->prepare('CALL panel_elimina_clasificacion(:id, @result)');
        
        $call->bindParam(':id', $id, PDO::PARAM_INT);
        


        $call->execute();
        $select = $mysqli->query('SELECT @result');
        $result = $select->fetch(PDO::FETCH_ASSOC);
        $resultado = $result['@result'];

        if($resultado > 0)
        {
            return redirect()->back()->with('status', 'La categoria se elimino correctamente.');
        }
    }

    public function guardaEntidad(Request $request)
    {
        $nombre_usuario = getenv('DIR_USER');
        $grupo = getenv('DIR_GROUP');
        $datos = $request->all();
       //dd($datos);
        
        if($datos['identidad'])
        {
            $empresa = DB::connection('control')->select('CALL panel_obt_empresa(?)',array($datos['idempresa']));
            $empresa = Collection::make($empresa)->first();
            $entidad = DB::connection('control')->select('CALL panel_obt_empresa_entidad(?)',array($empresa->idempresa));
            $entidad = Collection::make($entidad)->first();
            //dd($entidad);
        }
        //dd($entidad);
        //obtenemos los objetos de imagen
        /*************************
        registro identidad
        **************************/
        //declaramos el folder principal
        $carpetaPrincipal = public_path() . "/ImagenesApp/empresas/".$datos['idempresaApp']."";
        //verificamos si existe si no lo creamos
        if (!file_exists($carpetaPrincipal)) 
        {
            $oldmask = umask(0); 
            mkdir($carpetaPrincipal, 0775, true);
            umask($oldmask);
            //usuario
            //chown($carpetaPrincipal,$nombre_usuario );
            //grupo
            //chgrp($carpetaPrincipal, $grupo);

        }
        $folderProductos = public_path() . "/ImagenesApp/empresas/".$datos['idempresaApp']."/identidad/";
        if (!file_exists($folderProductos)) 
        {
            $oldmask = umask(0); 
            mkdir($folderProductos, 0775, true);
            umask($oldmask);
            //usuario
            //chown($carpetaPrincipal,$nombre_usuario );
            //grupo
            //chgrp($carpetaPrincipal, $grupo);
        }
        //dd($datos['promocion']);
        if(isset($datos['logo']))
            {
                $logo = $datos['logo'];
                if(isset($entidad))
                {

                     $imagenLogoBorrar = public_path() . "/ImagenesApp/empresas/".$datos['idempresaApp']."/identidad/".$entidad->imagen_logo;
                    
                    if (file_exists($imagenLogoBorrar)) 
                    {

                     unlink($imagenLogoBorrar); 
                    }
                }
                $nameLogo = $logo->getClientOriginalName();
                Image::make($logo->getRealPath())->resize(160, 160)->save($folderProductos.$nameLogo,60);
                 $url_logo = "/ImagenesApp/empresas/".$datos['idempresaApp']."/identidad/".$nameLogo;
                

            }else{
                $url_logo = $datos['identidad_ur_logo'];
                $nameLogo = $datos['identidad_logo'];
            }
        if(isset($datos['portada']))
            {
                $logo = $datos['portada'];
                 if(isset($entidad))
                {
                     $imagenPortadaBorrar = public_path() . "/ImagenesApp/empresas/".$datos['idempresaApp']."/identidad/".$entidad->imagen_portada;
                     if (file_exists($imagenPortadaBorrar))
                     {
                        unlink($imagenPortadaBorrar); 
                     }
                }      
                $namePortada = $logo->getClientOriginalName();
                Image::make($logo->getRealPath())->resize(680, 310)->save($folderProductos.$namePortada,60);
                 $url_portada = "/ImagenesApp/empresas/".$datos['idempresaApp']."/identidad/".$namePortada;
                                  
            }else{
                $url_portada = $datos['identidad_url_portada'];
                $namePortada = $datos['identidad_portada'];
        }
          //$url_portada = "/ImagenesApp/empresas/".$datos['idempresaApp']."/productos/".$nameLogo;
      //dd($url_logo .'--//--'.$url_portada);



        /*****************************
        fin
        *****************************/

        $mysqli = cxPanel();
        if($datos['identidad'] > 0)
        {//panel_edita_empresa_entidad
            //dd("hello");
            $call = $mysqli->prepare('CALL panel_edita_empresa_entidad(:empresa,:logo, :portada, :urlLogo, :urlPortada, @result)');
        
            $call->bindParam(':empresa', $datos['identidad'], PDO::PARAM_INT);
            $call->bindParam(':logo', $nameLogo, PDO::PARAM_STR);
            $call->bindParam(':portada', $namePortada, PDO::PARAM_STR);
            $call->bindParam(':urlLogo', $url_logo, PDO::PARAM_STR);
            $call->bindParam(':urlPortada', $url_portada, PDO::PARAM_STR);

            $msg = 'Sus imagenes se actualizaron correctamente.';
        }else
        {
            $call = $mysqli->prepare('CALL panel_reg_empresa_identidad(:empresa,:logo, :portada, :urlLogo, :urlPortada, @result)');
        
            $call->bindParam(':empresa', $datos['idempresa'], PDO::PARAM_INT);
            $call->bindParam(':logo', $nameLogo, PDO::PARAM_STR);
            $call->bindParam(':portada', $namePortada, PDO::PARAM_STR);
            $call->bindParam(':urlLogo', $url_logo, PDO::PARAM_STR);
            $call->bindParam(':urlPortada', $url_portada, PDO::PARAM_STR);

            $msg = 'Sus imagenes se guardaron correctamente.';
        }
        //finaliza la compra guardadon los terminos y condiciones
        /*    $call = $mysqli->prepare('CALL panel_reg_empresa_identidad(:empresa,:logo, :portada, @result)');
        
        $call->bindParam(':empresa', $datos['idempresa'], PDO::PARAM_INT);
        $call->bindParam(':logo', $nameLogo, PDO::PARAM_STR);
        $call->bindParam(':portada', $namePortada, PDO::PARAM_STR);*/
        


        $call->execute();
        $select = $mysqli->query('SELECT @result');
        $result = $select->fetch(PDO::FETCH_ASSOC);
        $resultado = $result['@result'];
        if($resultado > 0)
        {
            //return redirect(route('empresas.index'))->with('status', $msg);
            return redirect()->back()->with('status', $msg);
        }else{
            return redirect()->back()->with('error', 'Ocurrio un error en el proceso de guardado.');
        }
      
    }

    public function guardaHorario(Request $request)
    {
        
        $datos = $request->all();
        $mysqli = cxCompra();
        $call = $mysqli->prepare('CALL panel_reg_empresa_horario(:opcion, :empresa, :sucursal, :dias, :horas, :initurno1, :finturno1, :initurno2, :finturno2, @result)');
        $dias = null;
        $horas = 0;
        //dd($datos);
        if($datos['opcion'] == 3)
        {
            $array = array();
            //reibimos los dias
            $dias = $datos['dias'];

            //los recorremos para obtener sus horarios
            foreach ($dias as $key => $value) 
            {
                switch ($value) 
                {
                    case 1:

                        $valor1 = [
                            'dia' => $value,
                            'abre1' => $datos['abrelunes1'],
                            'cierra1' => $datos['cierralunes1']
                            
                        ];
                        $total = $valor1;

                        if($datos['quebradolunes'] ==1 )
                        {
                            // dd('enrra quebrado');
                            $valor2 = [
                            'abre2' => $datos['abrelunes2'],
                            'cierra2' => $datos['cierralunes2']
                            ];
                            $total = array_collapse([$valor1,$valor2]);
                        }else{
                             $valor2 = [
                            'abre2' => null,
                            'cierra2' =>null
                            ];
                            $total = array_collapse([$valor1,$valor2]);
                        }
                        $array[] = $total;
                        break;
                    case 2:
                        $valor1 = [
                            'dia' => $value,
                            'abre1' => $datos['abremartes1'],
                            'cierra1' => $datos['cierramartes1'],
                        ];
                        $total = $valor1;
                        if($datos['quebradomartes'] ==1 )
                        {
                            // dd('enrra quebrado');
                            $valor2 = [
                            'abre2' => $datos['abremartes2'],
                            'cierra2' => $datos['cierramartes2']
                            ];
                            $total = array_collapse([$valor1,$valor2]);
                        }else
                        {
                            $valor2 = [
                            'abr2' => null,
                            'cierra2' => null
                            ];
                            $total = array_collapse([$valor1,$valor2]);
                        }
                        $array[] = $total;
                        break;
                    case 3:
                        $valor1 = [
                            'dia' => $value,
                            'abre1' => $datos['abremiercoles1'],
                            'cierra1' => $datos['cierramiercoles1'],
                        ];
                        $total = $valor1;
                        if($datos['quebradomiercoles'] ==1 )
                        {
                            // dd('enrra quebrado');
                            $valor2 = [
                            'abre2' => $datos['abremiercoles2'],
                            'cierra2' => $datos['cierramiercoles2']
                            ];
                            $total = array_collapse([$valor1,$valor2]);
                        }else
                        {
                            $valor2 = [
                            'abre' => null,
                            'cierra2' => null
                            ];
                            $total = array_collapse([$valor1,$valor2]);
                        }
                        $array[] = $total;
                        break;
                    case 4:
                        $valor1 = [
                            'dia' => $value,
                            'abre1' => $datos['abrejueves1'],
                            'cierra1' => $datos['cierrajueves1'],
                        ];
                        $total = $valor1;
                        if($datos['quebradojueves'] ==1 )
                        {
                            // dd('enrra quebrado');
                            $valor2 = [
                            'abre2' => $datos['abrejueves2'],
                            'cierra2' => $datos['cierrajueves2']
                            ];
                            $total = array_collapse([$valor1,$valor2]);
                        }else{
                             $valor2 = [
                            'abre2' => null,
                            'cierra2' => null
                            ];
                            $total = array_collapse([$valor1,$valor2]);
                        }
                        $array[] = $total;
                        break;
                    case 5:
                        $valor1 = [
                            'dia' => $value,
                            'abre1' => $datos['abreviernes1'],
                            'cierra1' => $datos['cierraviernes1'],
                        ];
                        $total = $valor1;
                        if($datos['quebradoviernes'] ==1 )
                        {
                            // dd('enrra quebrado');
                            $valor2 = [
                            'abre2' => $datos['abreviernes2'],
                            'cierra2' => $datos['cierraviernes2']
                            ];
                            $total = array_collapse([$valor1,$valor2]);
                        }else
                        {
                            $valor2 = [
                            'abre2' => null,
                            'cierra' => null
                            ];
                            $total = array_collapse([$valor1,$valor2]);
                        }
                        $array[] = $total;
                        break;
                    case 6:
                        $valor1 = [
                            'dia' => $value,
                            'abre1' => $datos['abresabado1'],
                            'cierra1' => $datos['cierrasabado1'],
                        ];
                        $total = $valor1;
                        if($datos['quebradosabado'] ==1 )
                        {
                            // dd('enrra quebrado');
                            $valor2 = [
                            'abre2' => $datos['abresabado2'],
                            'cierra2' => $datos['cierrasabado2']
                            ];
                            $total = array_collapse([$valor1,$valor2]);
                        }else
                        {
                            $valor2 = [
                            'abre2' => null,
                            'cierra2' => null
                            ];
                            $total = array_collapse([$valor1,$valor2]);
                        }
                        $array[] = $total;
                        break;
                    case 7:
                        $valor1 = [
                            'dia' => $value,
                            'abre1' => $datos['abredomingo1'],
                            'cierra1' => $datos['cierradomingo1'],
                        ];
                        $total = $valor1;
                        if($datos['quebradodomingo'] ==1 )
                        {
                            // dd('enrra quebrado');
                            $valor2 = [
                            'abre2' => $datos['abredomingo2'],
                            'cierra2' => $datos['cierradomingo2']
                            ];
                            $total = array_collapse([$valor1,$valor2]);
                        }else
                        {
                            $valor2 = [
                            'abre2' => null,
                            'cierra2' => null
                            ];
                            $total = array_collapse([$valor1,$valor2]);
                        }
                        $array[] = $total;
                        break;
                    default:
                        echo 'null';
                } 

            }
             $empresaApp = Collection::make($array); 
            foreach ($empresaApp as $key ) 
            {
                //finaliza la compra guardadon los terminos y condiciones
               
                $call->bindParam(':opcion', $datos['opcion'], PDO::PARAM_INT);
                $call->bindParam(':empresa', $datos['idempresa'], PDO::PARAM_INT);
                $call->bindParam(':sucursal', $sucursal, PDO::PARAM_INT);
                $call->bindParam(':dias',  $key['dia'], PDO::PARAM_STR);
                $call->bindParam(':horas', $horas, PDO::PARAM_INT);
                $call->bindParam(':initurno1', $key['abre1'], PDO::PARAM_STR);
                $call->bindParam(':finturno1', $key['cierra1'] , PDO::PARAM_STR);
                $call->bindParam(':initurno2', $key['abre2'], PDO::PARAM_STR);
                $call->bindParam(':finturno2', $key['cierra2'], PDO::PARAM_STR);



                $call->execute();
                $select = $mysqli->query('SELECT @result');
                $result = $select->fetch(PDO::FETCH_ASSOC);
                $resultado     = $result['@result'];
            }
            $diastodos =[
                0 => "1",
                1 => "2",
                2 => "3",
                3 => "4",
                4 => "5",
                5 => "6",
                6 => "7",
            ];
            $diasBorrar = array_diff( $diastodos,$dias);
            $dias = '';
            if (is_array($diasBorrar)) 
                {
                    foreach ($diasBorrar as $key => $value) 
                    {
                        $dias .= $value.',';
                    }
                    $dias = trim($dias, ',');
                }

                $opcion = 4;
                 $sucursal = 0;
                $horas = 0;
            $initurno1 = null;
            $finturno1 = null;
            $initurno2 = null;
            $finturno2 = null;

            //dd($opcion);
                $call = $mysqli->prepare('CALL panel_reg_empresa_horario(:opcion, :empresa, :sucursal, :dias, :horas, :initurno1, :finturno1, :initurno2, :finturno2, @result)');
                $call->bindParam(':opcion', $opcion, PDO::PARAM_INT);
                $call->bindParam(':empresa', $datos['idempresa'], PDO::PARAM_INT);
                $call->bindParam(':sucursal', $sucursal, PDO::PARAM_INT);
                $call->bindParam(':dias', $dias, PDO::PARAM_STR);
                $call->bindParam(':horas', $horas, PDO::PARAM_INT);
                $call->bindParam(':initurno1', $initurno1, PDO::PARAM_STR);
                $call->bindParam(':finturno1', $finturno1 , PDO::PARAM_STR);
                $call->bindParam(':initurno2', $initurno2, PDO::PARAM_STR);
                $call->bindParam(':finturno2', $finturno2, PDO::PARAM_STR);

                            $call->execute();
            $select = $mysqli->query('SELECT @result');
            $result = $select->fetch(PDO::FETCH_ASSOC);
            $resultado     = $result['@result'];
           // dd($resultado);
                //return redirect(route('empresas.index'))->with('status', $msg);
                return redirect()->back()->with('status', 'Los datos del horario se guardaron correctamente.');

        }else
        {
            //dd($datos);
            if(isset($datos['diasTotal']))
            {
                if (is_array($datos['diasTotal'])) 
                {
                    $horas = 1;
                    foreach ($datos['diasTotal'] as $key => $value) 
                    {
                        $dias .= $value.',';
                    }
                    $dias = trim($dias, ',');
                }
            }

             $sucursal = 0;

            $initurno1 = null;
            $finturno1 = null;
            $initurno2 = null;
            $finturno2 = null;


            $call->bindParam(':opcion', $datos['opcion'], PDO::PARAM_INT);
            $call->bindParam(':empresa', $datos['idempresa'], PDO::PARAM_INT);
            $call->bindParam(':sucursal', $sucursal, PDO::PARAM_INT);
            $call->bindParam(':dias', $dias, PDO::PARAM_STR);
            $call->bindParam(':horas', $horas, PDO::PARAM_INT);
            $call->bindParam(':initurno1', $initurno1, PDO::PARAM_STR);
            $call->bindParam(':finturno1', $finturno1 , PDO::PARAM_STR);
            $call->bindParam(':initurno2', $initurno2, PDO::PARAM_STR);
            $call->bindParam(':finturno2', $finturno2, PDO::PARAM_STR);



            $call->execute();
            $select = $mysqli->query('SELECT @result');
            $result = $select->fetch(PDO::FETCH_ASSOC);
            $resultado     = $result['@result'];
            if($resultado > 0)
            {
                //return redirect(route('empresas.index'))->with('status', $msg);
                return redirect()->back()->with('status', 'Los datos del horario se guardaron correctamente.');
            }else{
                return redirect()->back()->with('error', 'Sus datos no se guardaron correctamente.');
            }
        }
    }

    public function guardaHorarioSucursal(Request $request)
    {
        //dd($request->all());
        //obtenemos los datos del formulario y creamos la conexion a la base de datos
        $datos = $request->all();
        $mysqli = cxCompra();
        $call = $mysqli->prepare('CALL panel_reg_empresa_horario(:opconSucursal, :empresa, :sucursal, :dias, :horas, :initurno1, :finturno1, :initurno2, :finturno2, @result)');
        $dias = null;
        $horas = 0;
        $empresa = 0;

        if($datos['opconSucursal'] == 3)
        {
            $array = array();
            //reibimos los dias
            $dias = $datos['diasSucursalQuebrado'];

            //los recorremos para obtener sus horarios
            foreach ($dias as $key => $value) 
            {
                switch ($value) 
                {
                    case 1:

                        $valor1 = [
                            'dia' => $value,
                            'abre1' => $datos['abrelunesSucursal1'],
                            'cierra1' => $datos['cierralunesSucursal1']
                            
                        ];
                        $total = $valor1;

                        if($datos['quebradolunesSucursal'] ==1 )
                        {
                            // dd('enrra quebrado');
                            $valor2 = [
                            'abre2' => $datos['abrelunesSucursal2'],
                            'cierra2' => $datos['cierralunesSucursal2']
                            ];
                            $total = array_collapse([$valor1,$valor2]);
                        }else{
                             $valor2 = [
                            'abre2' => null,
                            'cierra2' =>null
                            ];
                            $total = array_collapse([$valor1,$valor2]);
                        }
                        $array[] = $total;
                        break;
                    case 2:
                        $valor1 = [
                            'dia' => $value,
                            'abre1' => $datos['abremartesSucursal1'],
                            'cierra1' => $datos['cierramartesSucursal1'],
                        ];
                        $total = $valor1;
                        if($datos['quebradomartesSucursal'] ==1 )
                        {
                            // dd('enrra quebrado');
                            $valor2 = [
                            'abre2' => $datos['abremartesSucursal2'],
                            'cierra2' => $datos['cierramartesSucursal2']
                            ];
                            $total = array_collapse([$valor1,$valor2]);
                        }else
                        {
                            $valor2 = [
                            'abr2' => null,
                            'cierra2' => null
                            ];
                            $total = array_collapse([$valor1,$valor2]);
                        }
                        $array[] = $total;
                        break;
                    case 3:
                        $valor1 = [
                            'dia' => $value,
                            'abre1' => $datos['abremiercolesSucursal1'],
                            'cierra1' => $datos['cierramiercolesSucursal1'],
                        ];
                        $total = $valor1;
                        if($datos['quebradomiercolesSucursal'] ==1 )
                        {
                            // dd('enrra quebrado');
                            $valor2 = [
                            'abre2' => $datos['abremiercolesSucursal2'],
                            'cierra2' => $datos['cierramiercolesSucursal2']
                            ];
                            $total = array_collapse([$valor1,$valor2]);
                        }else
                        {
                            $valor2 = [
                            'abre' => null,
                            'cierra2' => null
                            ];
                            $total = array_collapse([$valor1,$valor2]);
                        }
                        $array[] = $total;
                        break;
                    case 4:
                        $valor1 = [
                            'dia' => $value,
                            'abre1' => $datos['abrejuevesSucursal1'],
                            'cierra1' => $datos['cierrajuevesSucursal1'],
                        ];
                        $total = $valor1;
                        if($datos['quebradojuevesSucursal'] ==1 )
                        {
                            // dd('enrra quebrado');
                            $valor2 = [
                            'abre2' => $datos['abrejuevesSucursal2'],
                            'cierra2' => $datos['cierrajuevesSucursal2']
                            ];
                            $total = array_collapse([$valor1,$valor2]);
                        }else{
                             $valor2 = [
                            'abre2' => null,
                            'cierra2' => null
                            ];
                            $total = array_collapse([$valor1,$valor2]);
                        }
                        $array[] = $total;
                        break;
                    case 5:
                        $valor1 = [
                            'dia' => $value,
                            'abre1' => $datos['abreviernesSucursal1'],
                            'cierra1' => $datos['cierraviernesSucursal1'],
                        ];
                        $total = $valor1;
                        if($datos['quebradoviernesSucursal'] ==1 )
                        {
                            // dd('enrra quebrado');
                            $valor2 = [
                            'abre2' => $datos['abreviernesSucursal2'],
                            'cierra2' => $datos['cierraviernesSucursal2']
                            ];
                            $total = array_collapse([$valor1,$valor2]);
                        }else
                        {
                            $valor2 = [
                            'abre2' => null,
                            'cierra' => null
                            ];
                            $total = array_collapse([$valor1,$valor2]);
                        }
                        $array[] = $total;
                        break;
                    case 6:
                        $valor1 = [
                            'dia' => $value,
                            'abre1' => $datos['abresabadoSucursal1'],
                            'cierra1' => $datos['cierrasabadoSucursal1'],
                        ];
                        $total = $valor1;
                        if($datos['quebradosabadoSucursal'] ==1 )
                        {
                            // dd('enrra quebrado');
                            $valor2 = [
                            'abre2' => $datos['abresabadoSucursal2'],
                            'cierra2' => $datos['cierrasabadoSucursal2']
                            ];
                            $total = array_collapse([$valor1,$valor2]);
                        }else
                        {
                            $valor2 = [
                            'abre2' => null,
                            'cierra2' => null
                            ];
                            $total = array_collapse([$valor1,$valor2]);
                        }
                        $array[] = $total;
                        break;
                    case 7:
                        $valor1 = [
                            'dia' => $value,
                            'abre1' => $datos['abredomingoSucursal1'],
                            'cierra1' => $datos['cierradomingoSucursal1'],
                        ];
                        $total = $valor1;
                        if($datos['quebradodomingoSucursal'] ==1 )
                        {
                            // dd('enrra quebrado');
                            $valor2 = [
                            'abre2' => $datos['abredomingoSucursal2'],
                            'cierra2' => $datos['cierradomingoSucursal2']
                            ];
                            $total = array_collapse([$valor1,$valor2]);
                        }else
                        {
                            $valor2 = [
                            'abre2' => null,
                            'cierra2' => null
                            ];
                            $total = array_collapse([$valor1,$valor2]);
                        }
                        $array[] = $total;
                        break;
                    default:
                        echo 'null';
                } 

            }
             $empresaApp = Collection::make($array); 
            foreach ($empresaApp as $key ) 
            {
                //finaliza la compra guardadon los terminos y condiciones
               
                $call->bindParam(':opconSucursal', $datos['opconSucursal'], PDO::PARAM_INT);
                $call->bindParam(':empresa', $empresa, PDO::PARAM_INT);
                $call->bindParam(':sucursal', $datos['idsucursalhorario'], PDO::PARAM_INT);
                $call->bindParam(':dias',  $key['dia'], PDO::PARAM_STR);
                $call->bindParam(':horas', $horas, PDO::PARAM_INT);
                $call->bindParam(':initurno1', $key['abre1'], PDO::PARAM_STR);
                $call->bindParam(':finturno1', $key['cierra1'] , PDO::PARAM_STR);
                $call->bindParam(':initurno2', $key['abre2'], PDO::PARAM_STR);
                $call->bindParam(':finturno2', $key['cierra2'], PDO::PARAM_STR);



                $call->execute();
                $select = $mysqli->query('SELECT @result');
                $result = $select->fetch(PDO::FETCH_ASSOC);
                $resultado     = $result['@result'];
            }
            $diastodos =[
                0 => "1",
                1 => "2",
                2 => "3",
                3 => "4",
                4 => "5",
                5 => "6",
                6 => "7",
            ];
            $diasBorrar = array_diff( $diastodos,$dias);
            $dias = '';
            if (is_array($diasBorrar)) 
                {
                    foreach ($diasBorrar as $key => $value) 
                    {
                        $dias .= $value.',';
                    }
                    $dias = trim($dias, ',');
                }

            $opcion = 4;
            $sucursal = 0;
            $horas = 0;
            $initurno1 = null;
            $finturno1 = null;
            $initurno2 = null;
            $finturno2 = null;
            $empresa = 0;
            $idempresa = 0;
            //dd($opcion);
                $call = $mysqli->prepare('CALL panel_reg_empresa_horario(:opconSucursal, :empresa, :sucursal, :dias, :horas, :initurno1, :finturno1, :initurno2, :finturno2, @result)');
                $call->bindParam(':opconSucursal', $opcion, PDO::PARAM_INT);
                $call->bindParam(':empresa', $empresa, PDO::PARAM_INT);
                $call->bindParam(':sucursal', $datos['idsucursalhorario'], PDO::PARAM_INT);
                $call->bindParam(':dias', $dias, PDO::PARAM_STR);
                $call->bindParam(':horas', $horas, PDO::PARAM_INT);
                $call->bindParam(':initurno1', $initurno1, PDO::PARAM_STR);
                $call->bindParam(':finturno1', $finturno1 , PDO::PARAM_STR);
                $call->bindParam(':initurno2', $initurno2, PDO::PARAM_STR);
                $call->bindParam(':finturno2', $finturno2, PDO::PARAM_STR);

                $call->execute();
            $select = $mysqli->query('SELECT @result');
            $result = $select->fetch(PDO::FETCH_ASSOC);
            $resultado     = $result['@result'];
           // dd($resultado);
                //return redirect(route('empresas.index'))->with('status', $msg);
             
            if($resultado > 0)
            {
                //return redirect(route('empresas.index'))->with('status', $msg);
                return redirect()->back()->with('status', 'Los datos del horario se guardaron correctamente.');
            }else{
                return redirect()->back()->with('error', 'Sus datos no se guardaron correctamente.');
            }

        }else
        {
            //dd($datos);
            if(isset($datos['diasSucursal']))
            {
                if (is_array($datos['diasSucursal'])) 
                {
                    $horas = 1;
                    foreach ($datos['diasSucursal'] as $key => $value) 
                    {
                        $dias .= $value.',';
                    }
                    $dias = trim($dias, ',');
                }
            }

            $empresa = 0;

            $initurno1 = null;
            $finturno1 = null;
            $initurno2 = null;
            $finturno2 = null;
            $idempresa = 0;

            $call->bindParam(':opconSucursal', $datos['opconSucursal'], PDO::PARAM_INT);
            $call->bindParam(':empresa', $empresa, PDO::PARAM_INT);
            $call->bindParam(':sucursal', $datos['idsucursalhorario'], PDO::PARAM_INT);
            $call->bindParam(':dias', $dias, PDO::PARAM_STR);
            $call->bindParam(':horas', $horas, PDO::PARAM_INT);
            $call->bindParam(':initurno1', $initurno1, PDO::PARAM_STR);
            $call->bindParam(':finturno1', $finturno1 , PDO::PARAM_STR);
            $call->bindParam(':initurno2', $initurno2, PDO::PARAM_STR);
            $call->bindParam(':finturno2', $finturno2, PDO::PARAM_STR);



            $call->execute();
            $select = $mysqli->query('SELECT @result');
            $result = $select->fetch(PDO::FETCH_ASSOC);
            $resultado     = $result['@result'];
          
            if($resultado > 0)
            {
                //return redirect(route('empresas.index'))->with('status', $msg);
                return redirect()->back()->with('status', 'Los datos del horario se guardaron correctamente.');
            }else{
                return redirect()->back()->with('error', 'Sus datos no se guardaron correctamente.');
            }
        }
    }

    public function categoriaCreate(Request $request)
    {

      //dd($request->all());
        $datos = $request->all();
        $fechaIncio = $datos['fecha_inicio'];
        $porcionesIncio = explode("/", $fechaIncio);
        $fecha_inicio = $porcionesIncio[2].'-'.$porcionesIncio[1].'-'.$porcionesIncio[0];

        $fechaFin = $datos['fecha_fin'];
        $porcionesIncio = explode("/", $fechaFin);
        $fecha_fin = $porcionesIncio[2].'-'.$porcionesIncio[1].'-'.$porcionesIncio[0];
        
        //$path =  '/tmp/';
        //declaramos el folder principal
        $carpetaPrincipal = public_path() . "/ImagenesApp/empresas/".$datos['idempresaApp']."";
        //verificamos si existe si no lo creamos
        if (!file_exists($carpetaPrincipal)) 
        {

            $oldmask = umask(0); 
            mkdir($carpetaPrincipal, 0775, true);
            umask($oldmask);
            //mkdir($carpetaPrincipal, 755, true);
           
            
        }
        $folderPromociones = public_path() . "/ImagenesApp/empresas/".$datos['idempresaApp']."/promociones/";
        if (!file_exists($folderPromociones)) 
        {
            $oldmask = umask(0); 
            mkdir($folderPromociones, 0775, true);
            umask($oldmask);
        }
        //dd($datos['promocion']);
        if(isset($datos['promocion']))
            {
                $logo = $datos['promocion'];
                $nameLogo = $logo->getClientOriginalName();
                Image::make($logo->getRealPath())->resize(680, 310)->save($folderPromociones.$nameLogo,60);

            }
            $url = "/ImagenesApp/empresas/".$datos['idempresaApp']."/promociones/".$nameLogo;
      
      
        $mysqli = cxPanel();
        $call = $mysqli->prepare('CALL panel_reg_empresa_promociones(:empresa,:numero, :subcategria, :descripcion, :imagen,:url, :inicio, :fin, @result)');
        
        $call->bindParam(':empresa', $datos['idempresa'], PDO::PARAM_INT);
        $call->bindParam(':numero', $datos['noPromocion'], PDO::PARAM_INT);
        $call->bindParam(':subcategria', $datos['subcategoriaPromociones'], PDO::PARAM_INT);
        $call->bindParam(':descripcion', $datos['descripcion'], PDO::PARAM_STR);
        $call->bindParam(':imagen', $nameLogo, PDO::PARAM_STR);
        $call->bindParam(':url', $url, PDO::PARAM_STR);
        $call->bindParam(':inicio', $fecha_inicio, PDO::PARAM_INT);
        $call->bindParam(':fin', $fecha_fin, PDO::PARAM_INT);

        
        $call->execute();
        $select = $mysqli->query('SELECT @result');
        $result = $select->fetch(PDO::FETCH_ASSOC);
        $resultado = $result['@result'];

        if($resultado > 0)
        {
            //return redirect(route('empresas.index'))->with('status', $msg);
            return redirect()->back()->with('status', 'La promoció se guardo correctamente.');
        }else{
            return redirect()->back()->with('error', 'Ocurrio un error en el proceso de guardado.');
        }
    }
   
    public function buscarPromocion($id = null)
    {
        $id = Input::get('id');
        $promocion = DB::connection('control')->select('CALL panel_info_promocion(?)',array($id));
        $promocion = Collection::make($promocion)->first();
        return Response::json($promocion);
        //dd($promocion);
    
    }

   public function eliminarPromocion($id)
   {
        //dd($id);
        $promocion = DB::connection('control')->select('CALL panel_info_promocion(?)',array($id));
        $promocion = Collection::make($promocion)->first();

        $imagenBorrar = public_path() . "/ImagenesApp/empresas/".$promocion->idempresa."/promociones/".$promocion->imagen;
        //unlink($BorrarImagen);
        //dd($imagenBorrar);
        $mysqli = cxPanel();
        $call = $mysqli->prepare('CALL panel_elimina_empresa_promocion(:promocion, @result)');
        
        $call->bindParam(':promocion', $id, PDO::PARAM_INT);


        
        $call->execute();
        $select = $mysqli->query('SELECT @result');
        $result = $select->fetch(PDO::FETCH_ASSOC);
        $resultado = $result['@result'];

        if($resultado > 0)
        {
            unlink($imagenBorrar); 
            //return redirect(route('empresas.index'))->with('status', $msg);
            //alertify()->success('Updated record successfully');
            return redirect()->back()->with('status', 'Se elimino correctamente la promoción.');
        }else{
        //alertify()->error('Updated record successfully');
            return redirect()->back()->with('error', 'Ocurrio un error en el proceso de elimiación.');
        }
    
   }

   public function UpdatePromocion(Request $request)
   {
        $datos = $request->all();
        //dd($datos);
        $fechaIncio = $datos['fecha_inicio'];
        $porcionesIncio = explode("/", $fechaIncio);
        $fecha_inicio = $porcionesIncio[2].'-'.$porcionesIncio[1].'-'.$porcionesIncio[0];

        $fechaFin = $datos['fecha_fin'];
        $porcionesIncio = explode("/", $fechaFin);
        $fecha_fin = $porcionesIncio[2].'-'.$porcionesIncio[1].'-'.$porcionesIncio[0];
        $nameLogo = $datos['imagen'];
        $url = $datos['url'];

         //procesar imagen
        $path =  '/tmp/';
        //declaramos el folder principal
        $carpetaPrincipal = public_path() . "/ImagenesApp/empresas/".$datos['idempresaApp']."";
        $folderPromociones = public_path() . "/ImagenesApp/empresas/".$datos['idempresaApp']."/promociones/";
        //verificamos si existe si no lo creamos
        if (!file_exists($carpetaPrincipal)) 
        {
           
            $oldmask = umask(0); 
            mkdir($carpetaPrincipal, 0775, true);
            umask($oldmask);
            
        }
        $folderPromociones = public_path()."/ImagenesApp/empresas/".$datos['idempresaApp']."/promociones/";
            if (!file_exists($folderPromociones)) 
            {
                $oldmask = umask(0); 
                mkdir($folderPromociones, 0775, true);
                umask($oldmask);
            }
        //dd($datos['promocion']);
        if(isset($datos['promocionEdit']))
            {
                $logo = $datos['promocionEdit'];
                $nameLogo = $logo->getClientOriginalName();
                //dd(isset($datos['promocionEdit']));
                if(isset($datos['promocionEdit']))
                {
                    $BorrarImagen = public_path()."/ImagenesApp/empresas/".$datos['idempresaApp']."/promociones/".$datos['imagen'];
                    if (file_exists($BorrarImagen)) 
                    {
                        //$BorrarImagen = "/ImagenesApp/empresas/".$datos['idempresaApp']."/promociones/".$nameLogo;
                        unlink($BorrarImagen); 
                    }
                }
                Image::make($logo->getRealPath())->resize(680, 310)->save($folderPromociones.$nameLogo);
                $url = "/ImagenesApp/empresas/".$datos['idempresaApp']."/promociones/".$nameLogo;
            }

        $mysqli = cxPanel();
        $call = $mysqli->prepare('CALL panel_edita_empresa_promocion(:promocion, :subcategria, :descripcion, :imagen,:url, :inicio, :fin, @result)');
        
        $call->bindParam(':promocion', $datos['noPromocionEdit'], PDO::PARAM_INT);
        $call->bindParam(':subcategria', $datos['subcategoriaPromociones'], PDO::PARAM_INT);
        $call->bindParam(':descripcion', $datos['descripcion'], PDO::PARAM_STR);
        $call->bindParam(':imagen', $nameLogo, PDO::PARAM_STR);
        $call->bindParam(':url', $url, PDO::PARAM_STR);
        $call->bindParam(':inicio', $fecha_inicio, PDO::PARAM_INT);
        $call->bindParam(':fin', $fecha_fin, PDO::PARAM_INT);

        
        $call->execute();
        $select = $mysqli->query('SELECT @result');
        $result = $select->fetch(PDO::FETCH_ASSOC);
        $resultado = $result['@result'];

        if($resultado > 0)
        {
            //return redirect(route('empresas.index'))->with('status', $msg);
            return redirect()->back()->with('status', 'La promoció se actualizo correctamente.');
        }else{
            return redirect()->back()->with('error', 'Ocurrio un error en el proceso de actualización.');
        }

    
   }

   public function productoCreate(Request $request)
   {
        //dd($request->all());

              //dd($request->all());
        $datos = $request->all();
        
        //declaramos el folder principal
        $carpetaPrincipal = public_path() . "/ImagenesApp/empresas/".$datos['idempresaApp']."";
        //$folderProductos = public_path() . "/ImagenesApp/empresas/".$datos['idempresaApp']."/productos/";
        //verificamos si existe si no lo creamos
        if (!file_exists($carpetaPrincipal)) 
        {
             $oldmask = umask(0); 
            mkdir($carpetaPrincipal, 0775, true);
            umask($oldmask);
        }
        $folderProductos = public_path() . "/ImagenesApp/empresas/".$datos['idempresaApp']."/productos/";
        if (!file_exists($folderProductos)) 
        {
             $oldmask = umask(0); 
            mkdir($folderProductos, 0775, true);
            umask($oldmask);
        }
        //dd($datos['promocion']);
        if(isset($datos['producto']))
            {
                $logo = $datos['producto'];
                $nameLogo = $logo->getClientOriginalName();
                Image::make($logo->getRealPath())->resize(680, 310)->save($folderProductos.$nameLogo,60);

            }
            $url = "/ImagenesApp/empresas/".$datos['idempresaApp']."/productos/".$nameLogo;
      
      
        $mysqli = cxPanel();
        $call = $mysqli->prepare('CALL panel_reg_empresa_producto(:empresa,:numero, :nombre,  :descripcion, :imagen,:url, @result)');
        
        $call->bindParam(':empresa', $datos['idempresa'], PDO::PARAM_INT);
        $call->bindParam(':numero', $datos['noProducto'], PDO::PARAM_INT);
        $call->bindParam(':nombre', $datos['nombre_producto'], PDO::PARAM_STR);
        $call->bindParam(':descripcion', $datos['descripcion_producto'], PDO::PARAM_STR);
        $call->bindParam(':imagen', $nameLogo, PDO::PARAM_STR);
        $call->bindParam(':url', $url, PDO::PARAM_STR);
      
        
        $call->execute();
        $select = $mysqli->query('SELECT @result');
        $result = $select->fetch(PDO::FETCH_ASSOC);
        $resultado = $result['@result'];
        //dd($datos['noProducto']);
        if($resultado > 0)
        {
            //return redirect(route('empresas.index'))->with('status', $msg);
            return redirect()->back()->with('status', 'El producto se guardo correctamente.');
        }else{
            return redirect()->back()->with('error', 'Ocurrio un error en el proceso de guardado.');
        }
   }

   public function productoDelete($id)
   {

        $producto = DB::connection('control')->select('CALL panel_info_producto(?)',array($id));
        $producto = Collection::make($producto)->first();
        $imagenBorrar = public_path() . "/ImagenesApp/empresas/".$producto->idempresa."/productos/".$producto->imagen;
        //dd($imagenBorrar);
        $mysqli = cxPanel();
        $call = $mysqli->prepare('CALL panel_elimina_empresa_producto(:producto, @result)');
        
        $call->bindParam(':producto', $id, PDO::PARAM_INT);


        
        $call->execute();
        $select = $mysqli->query('SELECT @result');
        $result = $select->fetch(PDO::FETCH_ASSOC);
        $resultado = $result['@result'];

        if($resultado > 0)
        {
            if(file_exists($imagenBorrar))
            {
                            unlink($imagenBorrar); 
            }
            //return redirect(route('empresas.index'))->with('status', $msg);
            //alertify()->success('Updated record successfully');
            return redirect()->back()->with('status', 'Se elimino correctamente el producto.');
        }else{
        //alertify()->error('Updated record successfully');
            return redirect()->back()->with('error', 'Ocurrio un error en el proceso de elimiación.');
        }
     
   }

   public function buscaPrododucto()
   {
        $id = Input::get('id');
        $promocion = DB::connection('control')->select('CALL panel_info_producto(?)',array($id));
        $promocion = Collection::make($promocion)->first();

        return Response::json($promocion);
   }

   public function productoUpdate(Request $request)
   {
        //dd($request->all());

         $datos = $request->all();
        
        //declaramos el folder principal
        $carpetaPrincipal = public_path() . "/ImagenesApp/empresas/".$datos['idempresaAppedit']."";
        //$folderProductos = public_path() . "/ImagenesApp/empresas/".$datos['idempresaAppedit']."/productos/";
        //verificamos si existe si no lo creamos
        if (!file_exists($carpetaPrincipal)) 
        {
            mkdir($carpetaPrincipal, 755, true);

        }
        $folderProductos = public_path() . "/ImagenesApp/empresas/".$datos['idempresaAppedit']."/productos/";
        if (!file_exists($folderProductos)) 
        {
            mkdir($folderProductos, 755, true);
        }
        //dd($datos['promocion']);
        $url = null;
        if($datos['urlImagen'])
        {
            $url = $datos['urlImagen'];
        }
        
        if(isset($datos['productoEdit']))
            {
                $logo = $datos['productoEdit'];
                $nameLogo = $logo->getClientOriginalName();

                $imagenBorrar = public_path() ."/ImagenesApp/empresas/".$datos['idempresaAppedit']."/productos/".$datos['ImageneditP'];
                if(isset($datos['productoEdit']))
                {
                    if(isset($imagenBorrar))
                    {
                        unlink($imagenBorrar);
                    }
                }
                Image::make($logo->getRealPath())->resize(680, 310)->save($folderProductos.$nameLogo,60);
                $url = "/ImagenesApp/empresas/".$datos['idempresaAppedit']."/productos/".$nameLogo;
            }
            
      
      
        $mysqli = cxPanel();
        $call = $mysqli->prepare('CALL panel_edita_empresa_producto(:producto, :nombre,  :descripcion, :imagen,:url, @result)');
        
        $call->bindParam(':producto', $datos['idprodcutoedit'], PDO::PARAM_INT);
        $call->bindParam(':nombre', $datos['nombre_producto_edit'], PDO::PARAM_STR);
        $call->bindParam(':descripcion', $datos['descripcion_producto_edit'], PDO::PARAM_STR);
        $call->bindParam(':imagen', $nameLogo, PDO::PARAM_STR);
        $call->bindParam(':url', $url, PDO::PARAM_STR);
      
        
        $call->execute();
        $select = $mysqli->query('SELECT @result');
        $result = $select->fetch(PDO::FETCH_ASSOC);
        $resultado = $result['@result'];
        //dd($datos['noProducto']);
        if($resultado > 0)
        {
            //return redirect(route('empresas.index'))->with('status', $msg);
            return redirect()->back()->with('status', 'El producto se actualizo correctamente.');
        }else{
            return redirect()->back()->with('error', 'Ocurrio un error en el proceso de guardado.');
        }
   }

   public function verificaCorreo()
   {

        $correo = Input::get('correo');

        $mysqli = cxPanel();
        $call = $mysqli->prepare('CALL venta_existe_mail(:correo, @result)');

         $call->bindParam(':correo', $correo, PDO::PARAM_STR);
      
        
        $call->execute();
        $select = $mysqli->query('SELECT @result');
        $result = $select->fetch(PDO::FETCH_ASSOC);
        $respuesta = $result['@result'];
        

        return Response::json($respuesta);

   }

   public function verificaEmpresa()
   {
    
        $empresa = Input::get('id');

        $mysqli = cxPanel();
        $call = $mysqli->prepare('CALL panel_validar_contenido(:empresa, @result)');

         $call->bindParam(':empresa', $empresa, PDO::PARAM_STR);
      
        
        $call->execute();
        $select = $mysqli->query('SELECT @result');
        $result = $select->fetch(PDO::FETCH_ASSOC);
        $respuesta = $result['@result'];
        return Response::json($respuesta);
   }

   public function publicaEmpresa()
   {
        $id = Input::get('id');
        $estado = Input::get('estado');

        $mysqli = cxPanel();
        $call = $mysqli->prepare('CALL panel_publica_contenido(:id, :estado, @result)');

        $call->bindParam(':id', $id, PDO::PARAM_INT);
         $call->bindParam(':estado', $estado, PDO::PARAM_STR);
      
        
        $call->execute();
        $select = $mysqli->query('SELECT @result');
        $result = $select->fetch(PDO::FETCH_ASSOC);
        $respuesta = $result['@result'];
        return Response::json($respuesta);
   }

/*****************
Retorna fecha en letras
***************/

  private function fechaCastellano ($fecha) 
  {
      $fecha = substr($fecha, 0, 10);
      
      $numeroDia = date('d', strtotime($fecha));

      $dia = date('l', strtotime($fecha));

      $mes = date('F', strtotime($fecha));

      $anio = date('Y', strtotime($fecha));

      $dias_ES = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
      $dias_EN = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
      $nombredia = str_replace($dias_EN, $dias_ES, $dia);
      $meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
      $meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
      $nombreMes = str_replace($meses_EN, $meses_ES, $mes);
      return $nombredia." ".$numeroDia." de ".$nombreMes." de ".$anio;
    }
}
