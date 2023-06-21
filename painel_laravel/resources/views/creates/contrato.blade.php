@extends('layouts.struture')
@section('content')

<form action="{{route('contrato_store')}}" method="post">
    @csrf
    <h1>{{$nome}}</h1>
    <h2>Adicionar informações de Contrato</h2>
    <fieldset>
        <legend>Alert!</legend>
        Por favor, certifique-se de possuir todas as informações necessárias <u>atualizadas</u>,<br>
        em caso de alteração das informações consideradas "sensiveis", uma nova versão<br> do Projeto
        será criada, para melhor proteção e backup dos dados.
    </fieldset>

    <fieldset>
        <legend>Dados do Contrato</legend>
        <h3>{{$nomeempresa}}</h3>
        <input type="hidden" name="idv" value="{{session('idv')}}">
        <p>Numero de Contrato</p>
        <input type="text" name="num_contrato">
        <p>Contratante</p>
        <select name="contratante">
            <option value="">Selecione</option>
            @foreach ($clientes as $cliente)
                <option value="{{$cliente['id']}}">{{$cliente['nome']}}</option>
            @endforeach
        </select>
        <p>Gestor:</p>
        <select name="gestor">
            <option value="">Selecione</option>
            @foreach ($clientes as $cliente)
                <option value="{{$cliente['id']}}">{{$cliente['nome']}}</option>
            @endforeach
        </select>
    </fieldset>
    <fieldset>
        <legend>Prazo</legend>
        <input type="radio" id="opt1" name="forma_prazo" value="false">
        <label for="opt1">Prazo Pré Definido</label>
        <input type="radio" id="opt2" name="forma_prazo" value="true">
        <label for="opt2">Prazo Após Emissão da O.S.</label>
        <p>Prazo do Contrato</p>
        <input type="date" name="prz_contrato">
        <p>Prazo do Contrato</p>
        <input type="text" value="{{old('prz_contrato_os')}}" name="prz_contrato_os">
    </fieldset>
    <fieldset>
        <legend>Dados Adicionais</legend>
        <button><a href="{{route('empreendimento_create',['nome'=>$nome])}}">Adicionar Empreendimentos</a></button>
        <button><a href="{{route('cliente_create',['empresa'=>$nomeempresa])}}">Adicionar Clientes a Empresa</a></button>
        <button><a href="{{route('funcionario_create')}}">Adicionar Funcionários ao Sistema</a></button>
    </fieldset>
    <button>Salvar</button>

</form>

@endsection
