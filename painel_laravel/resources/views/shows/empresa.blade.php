@extends('layouts.struture')
@section('content')
    <h1>{{session('src_nome') ?? 'Empresa não Informada'}}</h1>
    <h3>{{session('src_cnpj' ?? 'CNPJ não consta')}}</h3>
    <h4>{{session('src_area' ?? 'Area de atuação não informada')}}</h4>
    <h4>{{session('src_cidade') ?? 'Cidade não Consta'}} - {{session('src_estado') ?? 'Estado não Consta'}}</h4>
    <h4>{{session('src_endereco') ?? 'Sem Endereço'}}</h4>
    <fieldset>
        <legend>Contato</legend>
        <h4>{{session('src_ncontato') ?? 'Numero para contato não informado.'}}</h4>
        <h4>{{session('src_emailprinc') ?? 'Email principal não informado.'}}</h4>
        <p>{{session('src_emailsec') ?? 'Email secundario não informado.'}}</p>
    </fieldset>
    <fieldset>
        <legend>Projetos Relacionados</legend>
        @if (session()->has('src_arrayproj'))
            @foreach (session('src_arrayproj') as $projeto)
                <h2>{{$projeto['numero']}} - {{$projeto['nome']}}</h2>
                <form action="{{route('projeto_show_data')}}" method="get">
                    @csrf
                    <input type="hidden" name="projeto" value="{{$projeto['numero']}}">
                <button>Visualizar Projeto</button>
                </form>
                <hr>
            @endforeach
        @else
            <h2>Não existem projetos cadastrados para esta empresa.</h2>
            <a href="{{route('projeto_create')}}">Cadastrar novo projeto?</a>
        @endif
    </fieldset>
    <fieldset>
        <legend>Clientes Relacionados</legend>
        @if (null !== session('src_arrayclie'))
            @foreach (session('src_arrayclie') as $clie)
            <h2>{{$clie['nome']}}</h2>
            <h3>{{$clie['cargo']}}</h3>
            <form action="{{route('cliente_show_data')}}">
                @csrf
                <input type="hidden" name="cliente" value="{{$clie['nome']}}">
                <input type="hidden" name="empresa" value="{{session('src_nome')}}">
                <button>Visualizar Perfil</button>
            </form>
                <hr>
            @endforeach
        @else
            <h2>Não existem clientes cadastrados para esta empresa.</h2>
        @endif
        <a href="{{route('cliente_create',['empresa' => session('src_nome')])}}">Cadastrar Clientes?</a>
    </fieldset>


@endsection
