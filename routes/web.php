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

