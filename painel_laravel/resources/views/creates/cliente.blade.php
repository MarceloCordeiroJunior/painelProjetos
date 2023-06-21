@extends('layouts.struture')
@section('content')
<form action="{{route('cliente_store')}}" method="post">
@csrf
<h1>Cadastro de Cliente</h1>
<h2>{{$empresa}}</h2>
<input type="hidden" name="id_empresa" value="{{$idempresa}}">
<h5><a href="">Para alterar a empresa, clique aqui.</a></h5>
<fieldset>
    <legend>Dados Pessoais</legend>
    <p>Nome do Cliente</p>
    <input type="text" name="nome" value="{{old('nome')}}">
    <p>CPF</p>
    <input type="text" name="cpf" value="{{old('cpf')}}">
    <p>Cargo</p>
    <input type="text" name="cargo" value="{{old('cargo')}}">

</fieldset>
<fieldset>
    <legend>Contato</legend>
    <p>Telefone</p>
    <input type="text" name="telefone" value="{{old('telefone')}}">
    <p>Telefone Secundario</p>
    <input type="text" name="tel2" value="{{old('tel2')}}">
    <p>Email Principal</p>
    <input type="email" name="email_princ" value="{{old('email_princ')}}">
    <p>Email Secundario</p>
    <input type="email" name="email_sec" value="{{old('email_sec')}}">
</fieldset><br>
<button>Cadastrar</button>
</form>
@endsection
