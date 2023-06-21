 <fieldset>
            <details>
                <summary>Fase - Burocrático/Financeiro</summary>
                <p>
                    Nos campos abaixo, voce encontra todas as etapas Burocrático/Financeiras aplicáveis
                    ao tipo de Projeto selecionado, clique sobre elas para adicionar, ou ignore-as para mante-las
                    fora do projeto atual.
                </p>

                <fieldset>
                    <details>
                        <summary>etapa_aplicavel_1 V</summary>
                    </details>
                </fieldset>

                <fieldset>
                    <details>
                        <summary>etapa_aplicavel_2 V</summary>
                    </details>
                </fieldset>

                <fieldset>
                    <details>
                        <summary>etapa_aplicavel_3 V</summary>
                    </details>
                </fieldset>

                <p>[...]</p>
                <fieldset>
                    <details>
                        <summary>etapa_aplicavel_n ^</summary>
                        <br>
                        <hr><br>
                        <p>Por favor, insira uma descrição para a etapa:</p>
                        <input type="text" name="desc_etapa_n">
                        <br><br><br>
                        <fieldset>
                            <details>
                                <summary>Funcionário Atribuido</summary>
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
                        <br>
                        <fieldset>
                            <details>
                                <summary>Adição de Etapas</summary>
                                <p>No campo abaixo estão todas as etapas já cadastradas dentro da fase
                                    Burocrático/Financeiro:</p>
                                <select>
                                    <option value="">Selecione</option>
                                </select>
                                <p>Ainda não encontrou? <a href="">Cadastre uma nova etapa!</a></p>

                                <!--
                                    Futuramente criar opção de gerar como planilha a hierarquia dentro do banco de dados de etapas relacionadas
                                    aos projetos em questão e de fases equivalentes.
                                    [função reservada apenas as pessoas com "cargo" de administrados do sistema, assim como as funções de
                                    adição de etapas e projetos]
                                    -->

                            </details>
                        </fieldset>
                    </details>
                </fieldset>
            </details>
        </fieldset>


        <fieldset>
            <details disabled>
                <summary tabindex="-1">Fase - Planejamento</summary>
                <p>[...]</p>
            </details>
        </fieldset>


        <fieldset>
            <details disabled>
                <summary tabindex="-1">Fase - Solicitações</summary>
                <p>[...]</p>
            </details>
        </fieldset>


        <fieldset>
            <details disabled>
                <summary tabindex="-1">Fase - Execução</summary>
                <p>[...]</p>
            </details>
        </fieldset>
