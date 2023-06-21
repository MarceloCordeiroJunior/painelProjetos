@extends('layouts.struture')

@section('content')
    <div>
        <form action="{{ route('projeto_store')}}" method="post">
            @csrf
            <h1>Cadastramento de Projeto</h1>
            <p>Crie um Nome para Identificação do Projeto</p>
            <input type="text" name="nome" value="{{old('nome')}}">
            <p>Informe o Numero do Projeto</p>
            <input type="text" name="numero" value="{{old('numero')}}">
            <p>Descrição</p>
            <input type="text" name="desc" value="{{old('desc')}}">
            <fieldset>
            <legend>Empresa Contratante</legend>
                <p>Por favor selecione a empresa referente a este projeto:</p>
                <select name="empresa" id="empresa">
                    <option value="null">Selecione</option>
                    @foreach ($empresas as $item)
                    <option value="{{$item}}">{{$item}}</option>
                    @endforeach
                </select><br>
                <a href="{{route('empresa_create')}}">Clique aqui para adicionar nova empresa.</a>
                <h3>Informe a Localização Principal referente a este projeto:</h3>
                <p>Estado</p>
                <select name="estado" id="">
                    <option value="null">-</option>
                    @foreach ($estados as $item)
                        <option value="{{$item['valor']}}">{{$item['info']}}</option>
                    @endforeach
                </select>
                <p>Cidade</p>
                <select name="cidade" id="">
                    <option value="null">Selecione a Cidade</option>
                    @foreach ($municipios as $item)
                    <option value="{{$item['valor']}}">{{$item['info']}}</option>
                @endforeach
                </select>
                <p>Endereço</p><input type="text" name="endereco" value="{{old('endereco')}}">
            </fieldset>
            <fieldset>
                <legend>Venda</legend>
                <p>Informe o tipo de venda:</p>
                <input type="text" name="tp_venda" value="{{old('tp_venda')}}">
                <p>Numero de Pedido de Venda</p>
                <input type="text" name="num_ped_venda" value="{{old('num_ped_venda')}}">
            </fieldset>
            <fieldset>
                <legend>Prazos</legend>
                <input type="radio" id="opt1" name="forma_prazo" value="false">
                <label for="opt1">Prazo Pré Definido</label>
                <input type="radio" id="opt2" name="forma_prazo" value="true">
                <label for="opt2">Prazo Após Emissão da O.S.</label>
                <p>Prazo de Execução</p>
                <input type="date" name="prz_exec" value="{{old('prz_exec')}}">
                <p>Prazo de Entrega</p>
                <input type="date" name="prz_entrega" value="{{old('prz_entrega')}}">
                <p>Prazo de Execução Pós O.S.</p>
                <input type="text" name="prz_exec_os" value="{{old('prz_exec_os')}}"> dias.
                <p>Prazo de Entrega Pós O.S.</p>
                <input type="text" name="prz_entrega_os" value="{{old('prz_entrega_os')}}"> dias.
            </fieldset>

            <button>Adicionar</button>
        </form>
    </div>
@endsection
