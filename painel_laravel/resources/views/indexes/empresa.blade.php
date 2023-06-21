@extends('layouts.struture')
@section('content')
<fieldset>
    <legend>Geral</legend>
    <button><a href="">Perfil</a></button>
    <button><a href="">Mural de prazos</a></button>
    <button><a href="{{route('funcionario_create')}}">Cadastro de Funcionários</a></button>
    <button><a href="">Configurações</a></button>
</fieldset>
<fieldset>
<legend><h1>Empresas</h1></legend>
<button><a href="{{route('empresa_create')}}">Adionar nova empresa</a></button>

<form action="{{ route('empresa_show_data') }}" method="get">
    @csrf
        <p>Selecione uma empresa para visualizar e editar</p>
        <select name="empresa">
            <option value="">Selecione</option>
            @foreach ($arraye as $empresa)
            <option value="{{$empresa}}">{{$empresa}}</option>
            @endforeach
        </select><br><br><br>
        <input type="submit" value="Pesquisar empresa">
    </form>
</fieldset>
<fieldset>
    <legend>Projetos</legend>
    <button><a href="{{route('projeto_create')}}">Cadastrar novo projeto</a></button><br><br>
    <button><a href="{{route('projeto_index')}}">Pesquisar por um projeto</a></button>
    <br><br>
</fieldset>

@endsection
