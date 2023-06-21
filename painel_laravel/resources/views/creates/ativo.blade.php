@extends('layouts.struture')
@section('content')

<h2>Adicionar Ativos</h2>

<h3>{{$proj ?? 'Projeto não Informado'}}</h3>
<h3>{{$empresa ?? ' Empresa não consta'}} - Nº Ctt.: {{$ncontrato ?? 'N/I'}}</h3>

<form action="{{route('ativo_store')}}" method="post">
@csrf

    <input type="hidden" name="idc" value="{{$idc ?? null }}">
    <p>Informe o Ativo:</p>
    <input type="text" name="ativo">

    <p>Informe a Central de Custos:</p>
    <input type="text" name="central_custo">

    <button>Adicionar</button>

</form>
@endsection
