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
Route::bind('producto',function($id){
    return App\Models\Producto::where('id',$id)->first();
});

Route::get('/', function () {
    return view('welcome');
});




Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('empresas', 'EmpresaController');

Route::resource('sucursals', 'SucursalController');





Route::resource('personals', 'PersonalController');

Route::resource('categorias', 'CategoriaController');



Route::resource('ivas', 'IvaController');





Route::resource('productos', 'ProductoController');
Route::post('empresa/find/{id}', 'SucursalController@empresas');







Route::resource('plantas', 'PlantaController');

Route::resource('mesas', 'MesaController');

Route::get('reserva','ReservaController@index');
Route::post('planta/find/{id}', 'ReservaController@planta');
Route::get('/reservasm/{id}', 'ReservaController@reserva');

Route::get('/pedido', 'PedidoController@index');
Route::post('categorias/find/{id}', 'PedidoController@categorias');
Route::get('/pedido/detalle', 'PedidoController@show');
Route::get('/pedido/detalle/add/{producto}','PedidoController@add');
Route::get('/pedido/detalle/eliminar/{producto}/{dot}','PedidoController@delete');
Route::get('/pedido/detalle/update/{producto}/{dot}/{cantidad}/{observacion}','PedidoController@update');
Route::get('/pedido/detalle/update/{producto}/{dot}/{cantidad}','PedidoController@sinupdate');
Route::get('/pedido/create','PedidoController@create');
Route::get('/pedido/list','PedidoController@list');
Route::get('/pedido/edit/{id}','PedidoController@edit');

Route::get('/reportes','ReporteController@ventas');


Route::resource('clientes', 'ClienteController');

Route::get('/facturacion', function(){
    $url="https://celcer.sri.gob.ec/comprobantes-electronicos-ws/RecepcionComprobantesOffline?wsdl";
    // try{
    //     $client = new SoapClient($url);
    //     dd($client->__getTypes());
    //     //dd($client->validarComprobante());
    // }catch( SoapFault $fault){
    //     echo '<br>'.$fault;
    // }
    phpinfo();
});
Route::get('/xml','FacturacionController@crearXml');
Route::get('/verificador','FacturacionController@modulo11');
