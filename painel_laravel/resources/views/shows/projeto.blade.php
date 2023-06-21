@extends('layouts.struture')
@section('content')
    <h1>{{session('src_nome') ?? 'Projeto não Informado'}}</h1>
    <h3>{{session('src_numero') ?? 'N/I'}}</h3>
    @if (session('src_przexec') == null or session('src_przentrega') == null or session('src_przcontrato') == null)
    <br><br><form action="{{route('iniciar')}}" method="get">
        @csrf
        <input type="hidden" name="projeto" value="{{session('src_nome')}}">
        <button>Atualizar início</button>
    </form><br><br>
    @endif
    <br><br>
    <fieldset>
        <legend>Detalhes</legend>
        <h3>{{session('src_desc') ?? 'Este projeto não apresenta descrição.'}}</h3>
        <h3>Numero de Venda: {{session('src_nvenda') ?? 'N/I'}} - {{session('src_tpvenda') ?? 'Tipo de Venda não informado'}}</h3>
        <h3>Prazo de execução:
        @if (session('src_przexec')== null)
        {{session('src_przexec_os') ?? 'Não Consta'}} dias após início</h3>
        @else
        {{session('src_przexec') ?? 'Não Consta'}}</h3>
        @endif
        <h3>Prazo de entrega:
        @if (session('src_przentrega') == null)
        {{session('src_przentrega_os') ?? 'Não consta'}} dias após inicio</h3>
        @else
        {{session('src_przentrega') ?? 'Não consta'}}</h3>
        @endif
        <p>{{session('src_cidade') ?? 'Cidade não informada'}} - {{session('src_estado') ?? 'Estado não informado'}}</p>
        <p>{{session('src_endereco') ?? 'Sem informações sobre o endereço.'}}</p>
    </fieldset><br>
    <fieldset>
        <legend>Contrato</legend>
        @if (session('is_contrato') == '1')
        <h3>Numero do contrato: {{session('src_contratonum') ?? 'N/I'}}</h3>

        @if (session('src_przcontrato')== null)
        <h3>Prazo: {{session('src_przcontrato_os')  . ' dias após início' ?? 'Não Consta'}}</h3>
        @else
        <h3>Prazo: {{session('src_przcontrato') ?? 'Não Consta'}}</h3>
        @endif

        <h4>Gestor: <a href="{{route('cliente_show_data',['type'=>'gestor'])}}">
            {{session('src_gestor') ?? 'Não Informado'}}</a></h4>
        <h4>Contratante: <a href="{{session('src_icontratante')}}">
            {{session('src_contratante') ?? 'Não Informado'}}</a></h4>
        <button><a href="{{route('contrato_show_data')}}">Detalhes</a></button>
        @else
        <h3>Desculpe, não há dados sobre o contrato deste projeto.</h3>
        <button><a href="{{route('contrato_create',['nome' => session('src_nome') ?? null ])}}">
            Adicionar Contrato</a></button>
        @endif
        <h4>Empreendimentos relacionados: {{session('src_empreendimentos') ?? 'N/I'}}</h4>
        <hr>
        @if (session('src_empreendimentos')> 0)
            @foreach (session('src_arrempre') as $empreendimento)
            <h4>{{$empreendimento['nome_empreendimento']}}</h4>
            <h5>{{$empreendimento['tipo_empreen']}} -
                {{$empreendimento['cidade']}}/{{$empreendimento['estado']}}</h5>
                <hr>
            @endforeach
        @else
            <h3>Não há empreendimentos relacionados com o projeto.</h3>
        @endif
            <button><a href="{{route('empreendimento_create',['nome'=>session('src_nome')])}}"
                >Cadastrar Empreendimento</a></button>
    </fieldset><br>
    <fieldset>
        <legend>Andamento</legend>
        @if (session('is_andamento') == '1')
        <h3>Andamento geral: {{session('src_andamento') ?? '??,??'}}%</h3>
        <h4>Tarefas concluidas: {{session('src_tconcl') ?? '?'}}</h4>
        <h4>Tarefas em andamento: {{session('src_tand') ?? '?'}}</h4>
        <h4>Tarefas em atraso: {{session('src_tatr') ?? '?'}}</h4>
        <a href="{{route('prazo_show_data',['projeto'=>session('src_nome')])}}">Visualizar Tarefas</a></button>
        @else
        <h3>Desculpe, não há dados suficientes sobre o projeto.</h3>
        <button><a href="{{route('prazo_create',['projeto'=>session('src_nome')])}}">Iniciar Cadastro de Tarefas</a></button>
        @endif
    </fieldset><br>
    <fieldset>
        <legend>Empresa Contratante</legend>
        <h3>{{session('src_empresanome') ?? 'Empresa não Informada'}}</h3>
        <h4>{{session('src_area') ?? 'Empresa não conta com descrição'}}</h4>
        <button><a href="{{route('empresa_show_data')}}">Visualizar Empresa</a></button>
        </form>
    </fieldset><br>
    <fieldset>
        <legend>Versionamento</legend>
        <h5>V{{session('src_nversao') ?? '0.0'}} - {{session('src_validador') ?? 'null'}}
         - {{session('src_detalhes') ?? 'null'}} - {{session('src_date') ?? 'dd/mm/aaaa'}}
        @if (session('src_nversao') >1)
        <a href="">Visualizar versões anteriores</a>
        @endif
        </h5>
    </fieldset>
@endsection
