@extends('layouts.struture')
@section('content')

<h1>Cadastramento de {{$obj}} foi finalizado com Sucesso!!</h1>

@if ($obj == 'Empresa')
<h3>Veja o que é possivel fazer agora:</h3>
<fieldset>
<button><a href="{{route('cliente_create',['empresa' => session('empresa')?? 'null'])}}">Adicionar Clientes relacionados a esta empresa?</a></button><br><br>
<button><a href="">Criar Setores</a></button><br><br>
<button><a href="">Adicionar Filiais</a></button><br><br>
<button><a href="">Adicionar Empresa a um grupo</a></button><br><br>
<button><a href="">Adicionar sub-empresas</a></button>
</fieldset>
@endif

@if ($obj == 'Projeto')
<h3>Veja o que é possivel fazer agora:</h3>
<fieldset>
    <button><a href="{{route('projeto_show_data')}}">Visualizar Projeto</a></button><br><br>
    <button><a href="{{route('contrato_create',['nome'=>session('nome_proj')])}}">Cadastrar contrato referente</a></button><br><br>
    <button><a href="">Adicionar Tarefas e Prazos ao projeto</a></button><br><br>
</fieldset>
@endif

@if ($obj == 'Colaborador')
<h3>Veja o que é possivel fazer agora:</h3>
<fieldset>
    <button><a href="">Visualizar Colaboradores</a></button><br><br>
    <button><a href="">Adicionar documentos a pasta de documentos</a></button><br><br>
    <button><a href="">Visualizar Tarefas e Prazos</a></button><br><br>
</fieldset>
@endif


@if ($obj == 'Cliente')
<h3>Veja o que é possivel fazer agora:</h3>
<fieldset>
    <form action="{{route('empresa_show_data')}}" method="get">
    @csrf
    <input type="hidden" name="iempresa" value="{{session('empresa')}}">
    <button>Retornar para o Perfil da Empresa</button>
    </form>
    <br><br>
    <button><a href="{{route('cliente_show_data')}}">Visualizar Perfil do Cliente</a></button><br><br>
    <button><a href="{{route('empresa_index')}}">Pesquisar por Empresas</a></button><br><br>
    <button><a href="{{route('projeto_index')}}">Pesquisar por Projetos</a></button><br><br>
</fieldset>
@endif

@if ($obj == 'Empreendimento')
<h3>Veja o que é possivel fazer agora:</h3>
<fieldset>
    <button><a href="{{route('empreendimento_create',['nome'=>session('nome')])}}"
        >Cadastrar novo Empreendimento</a></button><br><br>
        <form action="{{route('projeto_show_data')}}" method="get">
            @csrf
            <input type="hidden" name="projeton" value="{{session('nome')}}">
            <button>Retornar ao Projeto</button><br><br>
        </form>
    </fieldset>
@endif

@if ($obj == 'Contrato')
    <h3>Veja o que é possivel fazer agora:</h3>
    <fieldset>
        <button><a href="{{route('contrato_show_data')}}">Visualizar Contrato</a></button><br><br>
        <button><a href="{{route('projeto_show_data')}}">Visualizar Projeto</a></button><br><br>
        <button>Tarefas e Prazos</button><br><br>
    </fieldset>
@endif

@if($obj == 'Ativo')
    <h3>Veja o que é possivel fazer agora:</h3>
    <fieldset>
        <button><a href="{{route('contrato_show_data')}}">Visualizar Contrato</a></button><br><br>
    </fieldset>
@endif

<button><a href="{{route('projeto_index')}}">Voltar ao inicio</a></button>
@endsection
