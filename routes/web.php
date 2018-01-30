<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::resource('/','IndexController');




Route::group(['prefix' => 'rolesProhibido'], function () {
    Voyager::routes();

    
});




Route::name('reset.pass')->post('/app/reset/pass','UsuariosController@resetPass');
Route::name('reset.form')->get('/app/reset/form/{mail}','UsuariosController@forView');
Route::name('reset.save')->post('/app/reset/save','UsuariosController@savePass');
Route::group(['middleware' => ['web','auth']], function (){

    Route::group(['prefix' => 'web'], function () {

        // Paypal
        // Enviamos nuestro pedido a PayPal
        Route::get('payment', array(
            'as' => 'payment',
            'uses' => 'PaypalController@postPayment',
        ));
        // Después de realizar el pago Paypal redirecciona a esta ruta
        Route::get('payment/status', array(
            'as' => 'payment.status',
            'uses' => 'PaypalController@getPaymentStatus',
        ));
        
        /**
         * Ruta para consulta ajax de los municipios
         */
        Route::name('compra.remember')->get('/app/compra/remenber','CompraController@remenber');
        Route::get('/usuario/municipios({id?}','UsuariosController@obtieneMuncipios');
        Route::get('/usuario/municipos/{id?}', 'UsuariosController@obtieneMuncipios');
        Route::get('/consulta/sucategoria/{id?}', 'UsuariosController@obtieneSubcategoria');
        Route::name('categoria.save')->post('/guarda/categoria','UsuariosController@guardaCategoria');
        Route::name('categoria.destroy')->get('/app/categoria/destroy/{id}','PanelAppController@destroy');
        Route::name('horario.save')->post('/app/guarda/horario','PanelAppController@guardaHorario');
        Route::name('horario.sucursal.save')->post('/app/guarda/horario/sucursal','PanelAppController@guardaHorarioSucursal');
        Route::name('app.entidad')->post('/panel/app/entidad', 'PanelAppController@guardaEntidad');
        Route::name('app.entidad')->post('/panel/app/entidad', 'PanelAppController@guardaEntidad');
        Route::get('/app/consulta/entidad/','SucursalController@show');
        Route::get('/app/consulta/horario/sucursal/','SucursalController@buscaHorario');
        Route::name('sucursal.destroy')->get('/app/sucursal/destroy{id}','SucursalController@destroy');
        Route::name('promocion.create')->post('/app/promocion/create','PanelAppController@categoriaCreate');
        Route::name('promocion.edit')->get('/app/promocion/edit/','PanelAppController@buscarPromocion');
        Route::name('promocion.delete')->get('/app/promocion/delete/{id}','PanelAppController@eliminarPromocion');
        Route::name('promocion.update')->post('/app/promocion/update/','PanelAppController@UpdatePromocion');
        Route::name('logout.manual')->get('/logout/exit', '\App\Http\Controllers\Auth\LoginController@logout');

        //Rutas para productos
        Route::name('producto.create')->post('/app/producto/create','PanelAppController@productoCreate');
        Route::name('producto.delete')->get('/app/producto/delete/{id}','PanelAppController@productoDelete');
        Route::name('producto.edit')->get('/app/producto/edit/','PanelAppController@buscaPrododucto');
        Route::name('producto.update')->post('/app/producto/update','PanelAppController@productoUpdate');
        Route::get('/app/empresa/verifica/correo', 'PanelAppController@verificaCorreo');
        Route::get('/appverifica/empresa','PanelAppController@verificaEmpresa');
        Route::get('/app/publica/empresa','PanelAppController@publicaEmpresa');
        //Rutas Vista de soporte
        Route::name('inicio.soporte')->get('/app/inicio/soporte','HomeChocomerciosController@inicioSoporte');
        /**
         * Rutas para las vistas de los planes
         */
        Route::resource('plan/basico','PlanBasicoController');
        Route::resource('plan/plus','PlanPlusController');
        Route::resource('plan/premium','PlanPremiumController');
        Route::resource('home/chocomercios','HomeChocomerciosController');
        Route::resource('panel/empresas', 'PanelEmpresasController');
        Route::resource('panel/app','PanelAppController');
        Route::resource('panel/sucursales','SucursalController');


        /**
         * Ruta para consulta ajax de los municipios
         */
        Route::name('tarjeta.save')->post('/usuario/tarjetas/', 'UsuariosController@guardaTarjeta');
        Route::name('tarjeta.delete')->get('/usuario/tarjetas/delete/{id}', 'UsuariosController@destroy');
        Route::get('/usuario/plan/', 'EmpresasController@obtienePlan');
        Route::name('tarjeta.edit')->get('/usuario/tarjeta/edit/{id}','UsuariosController@show');
        Route::name('tarjeta.update')->post('/usuario/tarjeta/update','UsuariosController@edit');
        Route::get('/usuario/valida/correo/','UsuariosController@validaMailUser');
        /**
         * Rutas para compras
         */
        Route::resource('/compra','CompraController');
        Route::resource('/productos','ProductosController');

        Route::post('/obtiene/municipios/{id}', 'UsuariosController@obtieneMuncipios');
        Route::resource('usuario', 'UsuariosController');
        Route::resource('empresa','EmpresasController');
        
    
    });
});



Auth::routes();
/**
 * RUTA 
 */
Route::get('/users/confirmation/{token}', 'Auth\RegisterController@confirmation')->name('confirmation');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/login/unico', 'Auth\LoginController@showLoginFormUnico')->name('login.unico');