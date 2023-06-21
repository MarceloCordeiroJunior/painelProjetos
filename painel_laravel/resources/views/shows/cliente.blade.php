@extends('layouts.struture')
@section('content')

<h1>{{session('src_nome') ?? 'Cliente não informado'}}</h1>
<h3>{{session('src_cargo') ?? 'Cargo Não Consta'}} - {{session('src_empresa') ?? 'Empresa não Informada'}}</h3>
<fieldset>
    <legend>Dados</legend>
    <p>CPF:{{session('src_cpf') ?? 'CPF Não Consta'}}</p>
    <h4>Telefones de Contato:</h4>
    <p>{{session('src_tel') ?? 'Telefone Principal Faltando'}}</p>
    <p>{{session('src_tel2') ?? 'Telefone secundario não cadastrado'}}</p>
    <h4>Emails para Contato:</h4>
    <p>{{session('src_email') ?? 'Email Principal Faltando'}}</p>
    <p>{{session('src_email2') ?? 'Email secundario não cadastrado'}}</p>
</fieldset>
<form action="{{route('empresa_show_data')}}">
@csrf
<input type="hidden" name="empresa" value="{{session('src_empresa')}}">
<button>Visualizar {{session('src_empresa') ?? 'null'}}</button>
</form>
<button><a href="{{route('empresa_index')}}">Voltar ao Inicio</a></button>
@endsection
