@extends('layouts.struture')
@section('content')
    <style>
        details[disabled] summary,
        details.disabled summary {
            pointer-events: none;
            /* prevents click events */
            user-select: none;
            /* prevents text selection */
        }
    </style>
    <form action="">
        @csrf
        <fieldset>
            <details open disabled>
                <summary tabindex="-1">Tipo de Projeto</summary>
                <p>
                    Para darmos inicio no cadastramento de Tarefas e Prazos por favor informe o tipo
                    de projeto equivalente, no campo abaixo:
                </p>
                <select name="tipo_projeto" id="tipo_projeto" onChange="verif_tp_projeto()">
                    <option value="">Selecione</option>
                    @foreach (session('tp_projetos') as $tp)
                        <option value="{{$tp->id}}">{{$tp->nome}}</option>
                    @endforeach
                </select>
                <button id="alterar" >Alterar</button>
                <p>Não encontrou o que buscava? <a href="">Cadastre um novo tipo de Projeto!</a></p>
            </details>
        </fieldset>

        @foreach (session('fases') as $fase)
            <fieldset>
                <details>
                    <summary>Fase - {{$fase->nome}}</summary>
                    <p>{{$fase->descricao}}</p>
                    <br><hr><br>
                    @foreach (session('etapas') as $etapa)
                        @if ($etapa->fase == $fase->id)
                            <fieldset>
                                <details>
                                    <summary>{{$etapa->nome}}</summary>
                                    <br>
                                    <h4>{{$etapa->descricao}}</h4>
                                    <hr><br>
                                    <p>Por favor, insira uma descrição para a etapa:</p>
                                    <input type="text" name="desc_etapa_n">
                                    <br><br><br>
                                    <fieldset>
                                        <details>
                                            <summary>Atribuição de Atores</summary>
                                            <div id="radios">
                                                <input type="radio" name="func" id="atribuir_func" checked>
                                                <label for="atribuir_func">Atribuir Funcionário Específico</label>
                                                <input type="radio" name="func" id="atribuir_depois">
                                                <label for="atribuir_depois">Atribuir Funcionário Depois</label>
                                                <input type="radio" name="func" id="qualquer">
                                                <label for="qualquer">Qualquer Funcionário dentro do projeto pode acessar</label>
                                            </div>
                                            <p>
                                                Selecione o Funcionário responsavel pela Etapa:
                                                <input type="checkbox" name="all_funcs" id="" checked>
                                                <label for="checkbox">Mostrar todos os funcionarios</label>
                                            </p>
                                            <select name="funcs" id="">
                                                <option value="">Selecione</option>
                                                <option value="" selected>Func X</option>
                                            </select>
                                            <h6>
                                                Funcionário selecionado não incluso no projeto! Mas não se preocupe
                                                ele será adicionado automáticamente.
                                            </h6>
                                            <input type="checkbox" name="func_permission" id="func_permission">
                                            <label for="func_permission">
                                                Permitir ao funcionario em questão, adicionar outros funcionarios
                                                como ajudante de etapa.
                                            </label><br><br>
                                            <button>Adicionar funcionario como ajudante</button><br>
                                        </details>
                                    </fieldset><br>
                                    <fieldset>
                                        <details>
                                            <summary>Prazo</summary>
                                            <br>
                                            <input type="radio" name="inicio" id="start" checked>
                                            <label for="start">Permitir ao funcionário iniciar etapa quando quiser.</label>
                                            <br><br>
                                            <input type="radio" id="pre" name="inicio">
                                            <label for="pre">Data de Inicio Pré-Estabelecida.</label><br><br>
                                            <input type="date" name="data_inicio" disabled><br><br>
                                            <input type="radio" name="inicio" id="apos">
                                            <label for="apos">Início após etapa especifica ser concluida.</label><br><br>
                                            <select name="" id="" disabled>
                                                <option value="">Selecione Etapa</option>
                                            </select>
                                            <br><br>
                                            <hr><br>
                                            <input type="radio" name="final" id="manual">
                                            <label for="manual">Permitir ao funcionário finalizar etapa quando quiser.</label>
                                            <br><br>
                                            <input type="radio" id="limite" name="final">
                                            <label for="limite">Definir data limite de finalização.</label><br><br>
                                            <input type="date" name="data_inicio" disabled><br><br>
                                            <input type="radio" id="dias_final" name="final" checked>
                                            <label for="dias_final">Definir prazo de etapa em número de dias.</label><br><br>
                                            <input type="number" min="1" name="prazo_dias"> Dias.
                                            <br><br>
                                        </details>
                                    </fieldset>
                        @endif
                        <fieldset>
                            <details>
                                <summary>Adição de Etapas</summary>
                                <p>No campo abaixo estão todas as etapas já cadastradas dentro da fase
                                    Burocrático/Financeiro:</p>
                                <select>
                                    <option value="">Selecione</option>
                                </select>
                                <p>Ainda não encontrou? <a href="">Cadastre uma nova etapa!</a></p>
                            </details>
                        </fieldset>
                    @endforeach
                </details>
            </fieldset>
        @endforeach
        <br><br>
        <button>Completar Cadastramento de Etapas e Prazos</button>
        <br><br>
        <script>
            function verif_tp_projeto() {
				var select = document.getElementById('tipo_projeto');
				var id_tpprojeto = select.options[select.selectedIndex].value;
	            console.log(id_tpprojeto);
                switch(id_tpprojeto){
                    @foreach (session('tp_projetos') as $tp)
                    case '{{$tp->id}}':
                        select.disabled = true;
                        console.log('disabilitado');
                    break;
                    @endforeach
                    default:
                        console.log('habilitado');
                }
			}

            function stopDefAction(evt) {
                var select = document.getElementById('tipo_projeto');
                select.disabled = false;
                evt.preventDefault();
                console.log('habilitado via botão');
            }
			verif_tp_projeto();
            document.getElementById('alterar').addEventListener('click', stopDefAction, false);
        </script>
    </form>
@endsection
