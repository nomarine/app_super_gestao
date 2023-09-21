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

Route::middleware('autenticacao:padrao,visitante,p3,p4')
    ->prefix('app')
    ->group(function() {
        Route::get('home', 'HomeController@index')->name('app.home');
        Route::get('sair', 'LoginController@sair')->name('app.sair');
        Route::get('produto', 'ProdutoController@index')->name('app.produto');
        Route::get('cliente', 'ClienteController@index')->name('app.cliente');

        Route::get('fornecedor', 'FornecedorController@index')->name('app.fornecedor');
        Route::post('fornecedor/consultar', 'FornecedorController@consultar')->name('app.fornecedor.consultar');
        Route::get('fornecedor/cadastrar', 'FornecedorController@cadastrar')->name('app.fornecedor.cadastrar');
});

Route::get('teste/{p1}/{p2}', 'TesteController@teste')->name('site.teste');

Route::fallback(function() {
    echo "Essa página não existe.<a href='" . route('site.index') . "'>Clique aqui</a> para retornar à página inicial.";
});