@extends('layouts.struture')
@section('content')
<h1>{{$projeto}}</h1>
<h2>Deseja realmente iniciar a contagem de prazo?</h2>
<fieldset>
    <legend>Alert!</legend>
    Você selecionou a opção de <u>iniciar contagem de prazo</u>, e após a confirmação desta página,<br>
    os prazos (de execução, de contrato e de entrega) seram contabilizados normalmente. Caso tenha <br>
    selecionado esta opção por engano, por favor retorne a visualização do projeto pelo botão abaixo.
</fieldset>
<form action="{{route('unlock')}}" method="post">
    @csrf
<input type="hidden" name="projeto" value="{{$projeto}}">
<p>Informe abaixo a data em que deseja considerar como inicio:</p>
<input type="date" name="data" value="{{date('Y-m-d')}}"><br><br>
<button>Ativar Contagem de Prazos</button><br><br>
</form>
<form action="{{route('projeto_show_data')}}">

    @csrf

    <input type="hidden" name="projeton" value="{{$projeto}}">
    <button><a href="{{route('projeto_show_data')}}">Voltar para Visualização do Projeto</a></button> <br><br>
</form>
<button><a href="{{route('projeto_index')}}">Voltar ao inicio</a></button>
@endsection
