@extends('v2.frontend.struture')
@section('content')
<fieldset>
    <legend>Geral</legend>
    <button><a href="">Perfil</a></button>
    <button><a href="">Mural de prazos</a></button>
    <button><a href="{{route('funcionario_create')}}">Cadastro de Funcionários</a></button>
    <button><a href="">Configurações</a></button>
</fieldset>
<fieldset>
<legend><h1>Projetos</h1></legend>
<button><a href="{{route('projeto_create')}}">Adicionar novo projeto</a></button>

<form action="{{ route('projeto_show_data') }}" method="get">
    @csrf
        <p>Selecione um projeto:</p>
        <select name="projeto">
            <option value="">Selecione</option>
            @if (isset($data))
                @foreach ($data as $projeto)
                <option value="{{$projeto['value']}}">{{$projeto['info']}}</option>
                @endforeach
            @endif
        </select><br><br><br>
        <input type="submit" value="Pesquisar projeto">
    </form>
</fieldset>
<fieldset>
    <legend>Empresas</legend>
    <button><a href="{{route('empresa_create')}}">Cadastrar Empresa</a></button><br><br>
    <button><a href="{{route('empresa_index')}}">Pesquisar empresas e clientes</a></button>
    <br><br>
</fieldset>

@endsection
