@extends('layouts.struture')
@section('content')

<h2>{{session('projeto')->nome}} - Contrato Referente</h2>
<h3>Numero de Referencia: {{session('contrato')->num_contrato}}</h3>

@if (null !== session('przcontrato'))
    <p>Prazo: {{session('przcontrato') ?? 'prazo não encontrado.'}}</p>
@else
<p>Prazo: {{session('przcontrato_os') . ' dias após O.S.'?? 'prazo não encontrado.'}}</p>
@endif
<form action="{{route('projeto_show_data')}}" method="get">
    @csrf
    <input type="hidden" name="projeton" value="{{session('projeto')->nome}}">
    <button>Projeto</button>
</form>

<fieldset>
    <legend>Empresa Referente</legend>

<h3>{{session('empresa')->nome}}</h3>
<hr>
<h4>Contratante: {{session('contratante')->nome}}</h4>
<p>{{session('contratante')->cargo}}</p>
<hr>
<h4>Gestor: {{session('gestor')->nome}}</h4>
<p>{{session('gestor')->cargo}}</p>

</fieldset>
<fieldset>
    <legend>Ativos</legend>
@if (session('arrayatv') != null)
    @foreach (session('arrayatv') as $ativo)
        <h3>{{$ativo['ativo']}}</h3>
        <h4>{{$ativo['central_custo']}}</h4>
        <hr>
    @endforeach
@else
    <h3>Desculpe, não temos ativos registrados a este contrato.</h3>
@endif
<h4><a href="{{route('ativo_create',['ncontrato'=>session('contrato')->num_contrato])}}">Adicionar Ativos ao contrato?</a></h4>
<h5>É necessário permissão hierárquica para editar os ativos.</h5>
</fieldset>

@endsection
