<?php

use Illuminate\Support\Facades\Route;

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
###############################################################################################

###interno
Route::get('/', function () {return redirect(route('projeto_index'));}); //redirect homepage

Route::get('/GerenciadorPRJ/{obj}/Adicionado','App\Http\Controllers\Redirects@cad_ok')
->name('cad_ok');//pagina de sucesso de cadastro

Route::get('/GerenciadorPRJ/Error/{error_desc}', 'App\Http\Controllers\Redirects@error')
->name('error');//pagina de erro

Route::get('/GerenciadorPRJ/Prazos/Liberar/','App\Http\Controllers\Redirects@iniciar')
->name('iniciar');

Route::post('/GerenciadorPRJ/Interno/Liberar/','App\Http\Controllers\Redirects@unlock')
->name('unlock');

###############################################################################################

###projeto

Route::get('/GerenciadorPRJ/Pesquisar/Projeto','App\Http\Controllers\ProjetoController@index')
->name('projeto_index');

Route::get('/GerenciadorPRJ/Adicionar/Projeto','App\Http\Controllers\ProjetoController@create')
->name('projeto_create'); //view create projeto - create

Route::post('/GerenciadorPRJ/Interno/ProjetoStore','App\Http\Controllers\ProjetoController@store')
->name('projeto_store'); //save projeto - store

Route::get('/GerenciadorPRJ/Interno/ProjetoData','App\Http\Controllers\Redirects@show_projeto')
->name('projeto_show_data'); //exibição projeto - buscando dados - show1

Route::view('/GerenciadorPRJ/Visualisar/Projeto','shows.projeto')
->name('projeto_show'); //carrega exibição do projeto - show2

###############################################################################################

###versao

Route::get('/GerenciadorPRJ/Interno/VersaoStore','App\Http\Controllers\VersaoController@store')
->name('versao_store'); //cria versão do projeto - store

###############################################################################################

###empresa

Route::get('/GerenciadorPRJ/Pesquisar/Empresa','App\Http\Controllers\Redirects@index_empresa')
->name('empresa_index');//pagina para busca da empresa - index

Route::get('/GerenciadorPRJ/Adicionar/Empresa','App\Http\Controllers\EmpresaController@create')
->name('empresa_create'); //view create empresa - create

Route::post('/GerenciadorPRJ/Interno/EmpresaStore','App\Http\Controllers\EmpresaController@store')
->name('empresa_store'); //save empresa - store

Route::get('/GerenciadorPRJ/Interno/EmpresaData','App\Http\Controllers\Redirects@show_empresa')
->name('empresa_show_data'); //exibição empresa - buscando dados - show1

Route::view('/GerenciadorPRJ/Visualisar/Empresa','shows.empresa')
->name('empresa_show'); //carrega exibição da empresa - show2

###############################################################################################

### contrato

Route::get('/GerenciadorPRJ/Adicionar/Contrato/{nome}','App\Http\Controllers\Redirects@create_contrato')
->name('contrato_create'); //view create contrato - create

Route::post('/GerenciadorPRJ/Interno/ContratoStore','App\Http\Controllers\ContratoController@store')
->name('contrato_store'); //save contrato - store

Route::get('/GerenciadorPRJ/Interno/ContratoData','App\Http\Controllers\Redirects@show_contrato')
->name('contrato_show_data');   //exibição contrato - busca dados - show1

Route::view('GerenciadorPRJ/Visualizar/Contrato','shows.contrato',)
->name('contrato_show');

###############################################################################################

### funcionario

Route::view('/GerenciadorPRJ/Adicionar/Funcionario','creates.funcionario')
->name('funcionario_create'); //view create funcionario - create

Route::post('/GerenciadorPRJ/Interno/FuncionarioStore','App\Http\Controllers\FuncionarioController@store')
->name('funcionario_store'); //save fucionario - store

###############################################################################################

### cliente

Route::get('/GerenciadorPRJ/Adicionar/Cliente/{empresa?}','App\Http\Controllers\Redirects@create_cliente')
->name('cliente_create'); //view create cliente - create

Route::post('/GerenciadorPRJ/Interno/ClienteStore','App\Http\Controllers\ClienteController@store')
->name('cliente_store'); //save cliente - store

Route::get('/GerenciadorPRJ/Interno/ClienteData/{type?}','App\Http\Controllers\Redirects@show_cliente')
->name('cliente_show_data'); //data cliente - show

Route::view('/GerenciadorPRJ/Visualizar/Cliente', 'shows.cliente')
->name('cliente_show'); //view cliente - show

###############################################################################################

### empreendimento

Route::get('/GerenciadorPRJ/Adicionar/Empreendimento/{nome}',
'App\Http\Controllers\Redirects@create_empreendimento')
->name('empreendimento_create'); //view create empreendimento - create

Route::post('/GerenciadorPRJ/Interno/EmpreendimentoStore',
'App\Http\Controllers\EmpreendimentoController@store')
->name('empreendimento_store'); //save empreendimento - store

###############################################################################################

### ativo

Route::get('/GerenciadorPRJ/Adicionar/Ativo/{ncontrato}',
'App\Http\Controllers\Redirects@create_ativo')
->name('ativo_create'); //view create ativo - create

Route::post('/GerenciadorPRJ/Interno/AtivoStore',
'App\Http\Controllers\AtivoController@store')
->name('ativo_store'); //save ativo - store

###############################################################################################

###prazos

Route::get('/GerenciadorPRJ/Adicionar/TarefasPrazos/{projeto}',
'App\Http\Controllers\Redirects@create_prazo')
->name('prazo_create');  //view create prazo - prazo

Route::post('/GerenciadorPRJ/Interno/´PrazoStore','App\Http\Controllers\PrazoController@store')
->name('prazo_store'); //save prazo - store

Route::get('/GerenciadorPRJ/Interno/prazoData/{projeto}','App\Http\Controllers\Redirects@show_prazo')
->name('prazo_show_data'); //data prazo - show

Route::view('/GerenciadorPRJ/Visualizar/Prazo', 'shows.prazo')
->name('prazo_show'); //view prazo - show

###############################################################################################
