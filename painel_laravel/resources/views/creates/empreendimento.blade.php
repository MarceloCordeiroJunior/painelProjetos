@extends('layouts.struture')
@section('content')
<form action="{{route('empreendimento_store')}}" method="post">
    @csrf
    <h2>{{$nome}}</h2>

    <h2>Adicionar Empreendimentos ao Projeto.</h2>
    <fieldset>
        <legend>Alert!</legend>
        <p>São considerados "empreendimentos" do projeto, todos os tipos de instalações <br>
        pertencentes a ele que seja conveniente declarar individualmente, tais como <br>
        Subestações e Bays de Subestações relacionados ao Projeto em questão.</p>
    </fieldset>
    <input type="hidden" name="projeto" value="{{$nome}}">
    <p>Nome do Empreendimento:</p>
    <input type="text" name="nome" value="{{old('nome')}}">

    <p>Tipo de Empreendimento:</p>
    <input type="text" name="tipo"value="{{old('tipo')}}">

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
    <br><br>
    <button>Cadastrar</button>
</form>
@endsection
