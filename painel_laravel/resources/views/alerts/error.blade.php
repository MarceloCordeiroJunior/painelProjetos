@extends('layouts.struture')
@section('content')
<h1>Desculpe algo deu errado.</h1>
<h1>:(</h1>
<h3>Descrição do Erro:</h3>
<h4>{{$error_desc}}</h4></h4>
<p>Por favor repita a operação novamente.</p>
<h5>Caso precise de ajuda contate o administrador do sistema.</h5>
<button><a href="{{route('projeto_index')}}">Voltar ao inicio</a></button>
@endsection
