@extends('layouts.struture')
@section('content')
<form action="{{route('funcionario_store')}}" method="post">
@csrf
<h1>Cadastro de Colaboradores</h1>
<fieldset>
    <legend>Dados Pessoais</legend>
    <p>Nome</p>
    <input type="text" name="nome" value="{{old('nome')}}">
    <p>CPF</p>
    <input type="text" name="cpf" value="{{old('cpf')}}">
    <p>Cargo</p>
    <select name="cargo">
        <option value="">Selecione</option>
        <option value="intentariante">Inventariante</option>
        <option value="auxiliar_inventario">Auxiliar de Inventario</option>
        <option value="direcao">Direção</option>
        <option value=""></option>
    </select><br>
    <button><a href="">Pasta de Documentos Pessoais</a></button>
</fieldset>
<fieldset>
    <legend>Contato</legend>
    <p>Telefone Principal</p>
    <input type="text" name="telefone" value="{{old('telefone')}}">
    <p>Telefone Secundário</p>
    <input type="text" name="tel2" value="{{old('tel2')}}">
    <p>Email Principal</p>
    <input type="text" name="email_princ" value="{{old('email_princ')}}">
    <p>Email Secundário</p>
    <input type="text" name="email_sec" value="{{old('email_sec')}}">
</fieldset>
<button>Cadastrar</button>
</form>
@endsection
