<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:api');

Route::get('/usuarios', 'UsuariosController@index');
Route::get('/usuarios/{id}', 'UsuariosController@find');

Route::get('/clippings', 'ClippingsController@index');
Route::get('/clippings/{id}', 'ClippingsController@find');

Route::get('/eventos', 'EventosController@index');
Route::get('/eventos/{id}', 'EventosController@find');

Route::get('/departamentos', 'DepartamentosController@index');
Route::get('/departamentos/{id}', 'DepartamentosController@find');

Route::get('/cargos', 'CargosController@index');
Route::get('/cargos/{id}', 'CargosController@find');

Route::get('/vagas', 'VagasController@index');
Route::get('/vagas/{id}', 'VagasController@find');

Route::get('/vaga-tipos', 'VagaTiposController@index');
Route::get('/vaga-tipos/{id}', 'VagaTiposController@find');

//Route::get('/departamentos', 'DepartamentosController@index');
//Route::get('/departamentos/{id}', 'DepartamentosController@find');

//Route::get('/departamentos', 'DepartamentosController@index');
//Route::get('/departamentos/{id}', 'DepartamentosController@find');

//Route::get('/departamentos', 'DepartamentosController@index');
//Route::get('/departamentos/{id}', 'DepartamentosController@find');

//Route::get('/departamentos', 'DepartamentosController@index');
//Route::get('/departamentos/{id}', 'DepartamentosController@find');

//Route::get('/departamentos', 'DepartamentosController@index');
//Route::get('/departamentos/{id}', 'DepartamentosController@find');

//Route::get('/departamentos', 'DepartamentosController@index');
//Route::get('/departamentos/{id}', 'DepartamentosController@find');

//Route::get('/departamentos', 'DepartamentosController@index');
//Route::get('/departamentos/{id}', 'DepartamentosController@find');

//Route::get('/departamentos', 'DepartamentosController@index');
//Route::get('/departamentos/{id}', 'DepartamentosController@find');

//Route::get('/departamentos', 'DepartamentosController@index');
//Route::get('/departamentos/{id}', 'DepartamentosController@find');

//Route::get('/departamentos', 'DepartamentosController@index');
//Route::get('/departamentos/{id}', 'DepartamentosController@find');

//Route::get('/departamentos', 'DepartamentosController@index');
//Route::get('/departamentos/{id}', 'DepartamentosController@find');

//Route::get('/departamentos', 'DepartamentosController@index');
//Route::get('/departamentos/{id}', 'DepartamentosController@find');
