@extends('layouts.struture')
@section('content')

<form action="{{route('empresa_store')}}" method="post">
    @csrf
    <h1>Cadastro de Empresa</h1>
    <p>Nome da Empresa:</p>
    <input type="text" name="nome" value="{{old('nome')}}">
    <p>CNPJ:</p>
    <input type="text" name="cnpj" value="{{old('cnpj')}}">
    <p>Area de atuação:</p>
    <select name="area">
        <option value="0">Setor Eletrico no Geral</option>
        <option value="1">Geração de Energia - Geral</option>
        <option value="11">Geração de Energia - Hidrelétrica</option>
        <option value="12">Geração de Energia - Termelétrica</option>
        <option value="13">Geração de Energia - Eólica</option>
        <option value="14">Geração de Energia - Nuclear</option>
        <option value="15">Geração de Energia - Outros</option>
        <option value="2">Distribuição de Energia - Geral</option>
        <option value="21">Distribuição de Energia - Subestação</option>
        <option value="22">Distribuição de Energia - Linha de Distribuição</option>
        <option value="3">Transmissão de Energia - Geral</option>
        <option value="31">Transmissão de Energia - Subestação</option>
        <option value="32">Transmissão de Energia - Linha de Transmissão</option>
        <option value="4">Outros</option>
        <option value="41">Construtora</option>
        <option value="42">Mineradora</option>
        <option value="43">Setor Jurídico</option>
    </select>
    <fieldset>
        <legend>Localização</legend>
        <p>Estado:</p>
        <select name="estado">
            <option value="null">-</option>
            @foreach (session('estados') as $estado)
            <option value="{{$estado['valor']}}">{{$estado['info']}}</option>
            @endforeach
        </select>
        <p>Cidade:</p>
        <select name="cidade">
            <option value="null">selecione</option>
            @foreach (session('municipios') as $municipio)
            <option value="{{$municipio['valor']}}">{{$municipio['info']}}</option>
            @endforeach
        </select>
        <p>Endereço:</p>
        <input type="text" name="endereco" value="{{old('endereco')}}">
    </fieldset>
    <fieldset>
        <legend>Contato</legend>
        <p>Numero para Contato</p>
        <input type="text" name="n_contato" value="{{old('n_contato')}}">
        <p>Email Principal:</p>
        <input type="email" name="email_princ" value="{{old('email_princ')}}">
        <p>Email Secundario:</p>
        <input type="email" name="email_sec" value="{{old('email_sec')}}"">
    </fieldset>
    <button>Salvar</button>

</form>

@endsection
