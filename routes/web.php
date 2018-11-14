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
    return view('index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/empresas', 'EmpresasController');

Route::resource('/projetos', 'ProjetosController');
Route::get('/projetos/{id}/mifs', 'ProjetosController@mif');
Route::post('/projetos/mifs', 'ProjetosController@mifUpdate');

Route::resource('/cotacoes', 'CotacoesController');

Route::resource('/users', 'UsersController');

Route::resource('/cargos', 'CargosController');

Route::resource('/apontamentos', 'ApontamentosController');

Route::resource('/taxas', 'TaxasController');
