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

Route::get('/Painel/{obj}/Adicionado','App\Http\Controllers\Redirects@cad_ok')
->name('cad_ok');//pagina de sucesso de cadastro

Route::get('/Painel/Error/{error_desc}', 'App\Http\Controllers\Redirects@error')
->name('error');//pagina de erro

Route::get('/Painel/Prazos/Liberar/','App\Http\Controllers\Redirects@iniciar')
->name('iniciar');

Route::post('/Painel/Interno/Liberar/','App\Http\Controllers\Redirects@unlock')
->name('unlock');

###############################################################################################

###projeto

Route::get('/Painel/Projetos','App\Http\Controllers\ProjetoController@index')
->name('projeto_index');

Route::get('/Painel/Projetos/Adicionar','App\Http\Controllers\ProjetoController@create')
->name('projeto_create'); //view create projeto - create

Route::post('/Painel/Projetos/Store','App\Http\Controllers\ProjetoController@store')
->name('projeto_store'); //save projeto - store

Route::get('/Painel/Projeto','App\Http\Controllers\Redirects@show_projeto')
->name('projeto_show_data'); //exibição projeto - buscando dados - show1

Route::view('/Painel/Visualisar/Projeto','shows.projeto')
->name('projeto_show'); //carrega exibição do projeto - show2

###############################################################################################

###versao

Route::get('/Painel/Interno/VersaoStore','App\Http\Controllers\VersaoController@store')
->name('versao_store'); //cria versão do projeto - store

###############################################################################################

###empresa

Route::get('/Painel/Pesquisar/Empresa','App\Http\Controllers\Redirects@index_empresa')
->name('empresa_index');//pagina para busca da empresa - index

Route::get('/Painel/Adicionar/Empresa','App\Http\Controllers\EmpresaController@create')
->name('empresa_create'); //view create empresa - create

Route::post('/Painel/Interno/EmpresaStore','App\Http\Controllers\EmpresaController@store')
->name('empresa_store'); //save empresa - store

Route::get('/Painel/Interno/EmpresaData','App\Http\Controllers\Redirects@show_empresa')
->name('empresa_show_data'); //exibição empresa - buscando dados - show1

Route::view('/Painel/Visualisar/Empresa','shows.empresa')
->name('empresa_show'); //carrega exibição da empresa - show2

###############################################################################################

### contrato

Route::get('/Painel/Adicionar/Contrato/{nome}','App\Http\Controllers\Redirects@create_contrato')
->name('contrato_create'); //view create contrato - create

Route::post('/Painel/Interno/ContratoStore','App\Http\Controllers\ContratoController@store')
->name('contrato_store'); //save contrato - store

Route::get('/Painel/Interno/ContratoData','App\Http\Controllers\Redirects@show_contrato')
->name('contrato_show_data');   //exibição contrato - busca dados - show1

Route::view('Painel/Visualizar/Contrato','shows.contrato',)
->name('contrato_show');

###############################################################################################

### funcionario

Route::view('/Painel/Adicionar/Funcionario','creates.funcionario')
->name('funcionario_create'); //view create funcionario - create

Route::post('/Painel/Interno/FuncionarioStore','App\Http\Controllers\FuncionarioController@store')
->name('funcionario_store'); //save fucionario - store

###############################################################################################

### cliente

Route::get('/Painel/Adicionar/Cliente/{empresa?}','App\Http\Controllers\Redirects@create_cliente')
->name('cliente_create'); //view create cliente - create

Route::post('/Painel/Interno/ClienteStore','App\Http\Controllers\ClienteController@store')
->name('cliente_store'); //save cliente - store

Route::get('/Painel/Interno/ClienteData/{type?}','App\Http\Controllers\Redirects@show_cliente')
->name('cliente_show_data'); //data cliente - show

Route::view('/Painel/Visualizar/Cliente', 'shows.cliente')
->name('cliente_show'); //view cliente - show

###############################################################################################

### empreendimento

Route::get('/Painel/Adicionar/Empreendimento/{nome}',
'App\Http\Controllers\Redirects@create_empreendimento')
->name('empreendimento_create'); //view create empreendimento - create

Route::post('/Painel/Interno/EmpreendimentoStore',
'App\Http\Controllers\EmpreendimentoController@store')
->name('empreendimento_store'); //save empreendimento - store

###############################################################################################

### ativo

Route::get('/Painel/Adicionar/Ativo/{ncontrato}',
'App\Http\Controllers\Redirects@create_ativo')
->name('ativo_create'); //view create ativo - create

Route::post('/Painel/Interno/AtivoStore',
'App\Http\Controllers\AtivoController@store')
->name('ativo_store'); //save ativo - store

###############################################################################################

###prazos

Route::get('/Painel/Adicionar/TarefasPrazos/{projeto}',
'App\Http\Controllers\Redirects@create_prazo')
->name('prazo_create');  //view create prazo - prazo

Route::post('/Painel/Interno/´PrazoStore','App\Http\Controllers\PrazoController@store')
->name('prazo_store'); //save prazo - store

Route::get('/Painel/Interno/prazoData/{projeto}','App\Http\Controllers\Redirects@show_prazo')
->name('prazo_show_data'); //data prazo - show

Route::view('/Painel/Visualizar/Prazo', 'shows.prazo')
->name('prazo_show'); //view prazo - show

###############################################################################################
