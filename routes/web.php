<?php

use App\Http\Controllers\PrincipalController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\LogAcessoMiddleware;

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

Route::get('/', 'PrincipalController@principal')->name('site.index');

Route::get('sobre-nos', 'SobreNosController@sobreNos')->name('site.sobrenos');

Route::get('contato', 'ContatoController@contato')->name('site.contato');
Route::get('contato_registro', 'ContatoController@registro')->name('site.contato_registro');
Route::post('contato', 'ContatoController@salvar')->name('site.contato');

Route::get('login/{erro?}', 'LoginController@index')->name('site.login');
Route::post('login', 'LoginController@autenticar')->name('site.login');

Route::middleware('autenticacao:padrao,')
    ->prefix('app')
    ->group(function() {
        Route::get('fornecedor', 'FornecedorController@index')->name('app.fornecedor');
        Route::get('produtos', function() { return 'Produtos'; })->name('app.produtos');
        Route::get('clientes', function() { return 'Clientes'; })->name('app.clientes');
});

Route::get('teste/{p1}/{p2}', 'TesteController@teste')->name('site.teste');

Route::fallback(function() {
    echo "Essa página não existe.<a href='" . route('site.index') . "'>Clique aqui</a> para retornar à página inicial.";
});