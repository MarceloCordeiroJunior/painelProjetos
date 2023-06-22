<?php

namespace App\Http\Controllers;

use App\Models\ativo;
use App\Models\cliente;
use App\Models\contrato;
use App\Models\empreendimento;
use App\Models\projeto;
use App\Models\empresa;
use App\Models\prazo;
use App\Models\versao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Redirects extends Controller
{
    public function index_projeto(){

        $bruto_projetos = Projeto::select('nome','numero_projeto')->get();
        $arrayp = [];$n=0;
        foreach($bruto_projetos as $projetos){
            $arrayp[$n]['info']=$projetos->numero . " - " . $projetos->nome;
            $arrayp[$n]['value']=$projetos->numero;
            $n++;
        }


        return view('indexes.projeto',['arrayp'=>$arrayp]);
    }

    public function index_empresa(){
        $bruto_empresas = empresa::select('nome')->get();
        $arraye = [];
        foreach($bruto_empresas as $empresas){
            $arraye[$empresas->nome]=$empresas->nome;
        }

        return view('indexes.empresa',['arraye'=>$arraye]);
    }


    public function show_projeto(Request $request){

        //verificação das formas de acesso ao projeto
        if($request->projeto == null){
            if($request->projeton !=null){
                $idprojeto = projeto::where('nome',$request->projeton)->max('id');
                $idversao = versao::where('id_proj',$idprojeto)->max('id');
            }elseif(null != session('versi')){
                $idversao = session('versi');
                session()->forget('versi');
                $idprojeto = versao::where('id',$idversao)->value('id_proj');
            }else{
                return redirect(route('error',['error_desc'=>'Falha na consulta de projeto.']));
            }
        }else{
        $num_projeto = $request->projeto;
        $idprojeto = projeto::where('numero',$num_projeto)->max('id');
        $idversao = versao::where('id_proj',$idprojeto)->max('id');
        }
        //preset var
        session(['is_contrato'=>0]);
        session(['is_andamento'=>0]);

        //search data
        $projeto = projeto::find($idprojeto);
        $versao = versao::find($idversao);
        $empresa = empresa::find($projeto->id_empresa);
        $contrato = contrato::where('id_versao',$idversao)->get();
        $prazo = prazo::where('id_versao',$idversao)->get();

        //process

        if(isset($contrato[0])){
            session(['is_contrato'=>1]);
            session(['src_contratonum'=>$contrato[0]->num_contrato]);
            session(['src_gestor'=> cliente::where('id',$contrato[0]->id_gestor)->value('nome')]);
            session(['src_contratante'=> cliente::where('id',$contrato[0]->id_contratante)->value('nome')]);
            if($contrato[0]->prz_contrato != null){
                $prz_contrato = date('d/m/Y', strtotime($contrato[0]->prz_contrato));
                session(['src_przcontrato'=>$prz_contrato]);
                session()->forget('src_przcontrato_os');
            }else{
                $prz_contrato = $contrato[0]->prz_contrato_os;
                session(['src_przcontrato_os'=>$prz_contrato]);
                session()->forget('src_przcontrato');
            }
        }

        if(isset($prazo[0])){
            session(['is_andamento'=>1]);
            $total = count($prazo);
            $concls=0; $atrs= 0; $andamento=0;
            foreach($prazo as $value){
                if($value->is_concl == 1){$concls++;}else{
                    if(strtotime($value->prazo) > strtotime(date('Y-m-d'))){
                        $atrs++;}else{$andamento++;}}
                    }
            $andamento_geral = $total - ($total / 100 * $concls);
            session(['src_andamento'=>$andamento_geral]);
            session(['src_tconcl'=>$concls]);
            session(['src_tand'=>$andamento]);
            session(['src_tatr'=>$atrs]);
        }

        $empreendimentoscount = empreendimento::where('id_versao',$versao->id)->count();
        if($empreendimentoscount > 0){
            $empreendimentos = empreendimento::where('id_versao',$versao->id)
            ->get()->toArray();
            foreach($empreendimentos as $empreendimento){
                $empre_cidade= DB::connection('helper_location')
                ->select("select `Nome` from helper_location.municipios where `Codigo` = '".
                $empreendimento['cidade']."'");
                $empre_cidade = $empre_cidade[0]->Nome;
                $empreendimento['cidade']=$empre_cidade;
                $empre_array[$empreendimento['nome_empreendimento']]=$empreendimento;
            }
            session(['src_arrempre'=>$empre_array]);
        }

        session(['src_empreendimentos'=>$empreendimentoscount]);
        $nprojversao= versao::where('id_proj',$projeto->id)->count();

        //process/padronização para saida

        #data
        if($projeto->prz_exec != null){
            $prz_exec = date('d/m/Y', strtotime($projeto->prz_exec));
        }else{
            $prz_exec=$projeto->prz_exec;
        }
        if($projeto->prz_entrega != null){
            $prz_entrega = date('d/m/Y', strtotime($projeto->prz_entrega));
        }else{
            $prz_entrega=$projeto->prz_entrega;
        }

        #localização

        // $projeto_cidade= DB::connection('helper_location')
        // ->select("select `Nome` from helper_location.municipios where `Codigo` = '".
        // $projeto->cidade."'");
        // $projeto_cidade = $projeto_cidade[0]->Nome;

        $projeto_cidade = "Cidade de teste";

        #type-empresa
        // $empresa_area= DB::connection('helper_types')
        // ->select("select `nome` from helper_types.empresas where `codigo` = '".
        // $empresa->area."'");
        // $empresa_area = $empresa_area[0]->nome;
        $empresa_area = "Empresa";

        //saida projeto
        session(['src_nome' =>$projeto->nome]);
        session(['src_numero'=>$projeto->numero]);
        session(['src_desc'=>$projeto->desc]);
        session(['src_nvenda'=>$projeto->num_ped_venda]);
        session(['src_tpvenda'=>$projeto->tp_venda]);
        session(['src_przexec'=>$prz_exec]);
        session(['src_przentrega'=>$prz_entrega]);
        session(['src_przexec_os'=>$projeto->prz_exec_os]);
        session(['src_przentrega_os'=>$projeto->prz_entrega_os]);
        session(['src_cidade'=>$projeto_cidade]);
        session(['src_estado'=>$projeto->estado]);
        session(['src_endereco'=>$projeto->endereco]);
        //saida empresa
        session(['empresa'=>$empresa->nome]);
        session(['src_empresanome'=>$empresa->nome]);
        session(['src_area'=>$empresa_area]);
        //saida versao
        session(['idversao'=>$idversao]);
        session(['src_nversao'=>$nprojversao]);
        session(['src_validador'=>$versao->id_validador]);
        session(['src_detalhes'=>$versao->detalhes]);
        session(['src_date'=>$versao->updated_at]);
        return redirect(route('projeto_show'));

    }

    public function show_empresa(Request $request){

           if($request->empresa == null){
            if($request->iempresa != null){
                $ISempresa = $request->iempresa;
                $empresa = empresa::where('id',$ISempresa)->get();
            }
            elseif(null != session('empresa')){
                $Sempresa = session('empresa');
                session()->forget('empresa');
                $empresa = empresa::where('nome',$Sempresa)->get();
            }else{
            return redirect(route('error',['error_desc' => 'Falha na consulta por empresa.']));
            }
        }else{
            $empresa = empresa::where('nome',$request->empresa)->get();
        }
        $empresa = $empresa[0];
        session(['src_nome'=>$empresa->nome]);
        session(['src_cnpj'=>$empresa->cnpj]);
        session(['src_estado'=>$empresa->estado]);
        session(['src_endereco'=>$empresa->endereco]);
        session(['src_ncontato'=>$empresa->n_contato]);
        session(['src_emailprinc'=>$empresa->email_princ]);
        session(['src_emailsec'=>$empresa->email_sec]);

        $projetos = projeto::where('id_empresa',$empresa->id)->get();
        if(isset($projetos[0])){
                foreach($projetos as $projeto){
                    $arrayproj[$projeto->nome]['nome']= $projeto->nome;
                    $arrayproj[$projeto->nome]['numero']= $projeto->numero;
                }
                session(['src_arrayproj'=>$arrayproj]);
        }

        $clientes = cliente::where('id_empresa',$empresa->id)->get();
        $arrayclie = [];
        if(isset($clientes[0])){
            foreach($clientes as $cliente){
                $arrayclie[$cliente->nome]['nome']= $cliente->nome;
                $arrayclie[$cliente->nome]['cargo']= $cliente->cargo;
            }
           session(['src_arrayclie'=>$arrayclie]);
        }

        #localização

        // $empresa_cidade= DB::connection('helper_location')
        // ->select("select `Nome` from helper_location.municipios where `Codigo` = '".
        // $empresa->cidade."'");
        // $empresa_cidade = $empresa_cidade[0]->Nome;
        // session(['src_cidade'=>$empresa_cidade]);
        session(['src_cidade'=>"Cidade teste"]);

        #type-empresa
        // $empresa_area= DB::connection('helper_types')
        // ->select("select `nome` from helper_types.empresas where `codigo` = '".
        // $empresa->area."'");
        // $empresa_area = $empresa_area[0]->nome;
        // session(['src_area'=>$empresa_area]);
        session(['src_area'=>"AREA ATUAÇÃO"]);

        return redirect(route('empresa_show'));
    }

    public function show_contrato(){
        if(null != session('idversao')){
            $idversao = session('idversao');
        }else{
            return redirect(route('error',['error_desc'=>'Problema ao retornar contrato armazenado
            no banco de dados, contate responsavel pelo banco de dados.']));
        }
        $contrato = contrato::where('id_versao',$idversao)->get();
        $contrato = $contrato[0];
        $gestor = cliente::find($contrato->id_gestor);
        $contratante = cliente::find($contrato->id_contratante);
        $projeto = versao::find($idversao)->value('id_proj');
        $projeto= projeto::find($projeto);
        $empresa = empresa::find($projeto->id_empresa);
        $ativos = ativo::where('id_contrato',$contrato->id)->get();

        if($contrato->prz_contrato != null){
            $prz_contrato = date('d/m/Y', strtotime($contrato[0]->prz_contrato));
            session(['przcontrato'=>$prz_contrato]);
            session()->forget('przcontrato_os');
        }else{
            $prz_contrato = $contrato->prz_contrato_os;
            session(['przcontrato_os'=>$prz_contrato]);
            session()->forget('przcontrato');
        }

        if(isset($ativos[0])){
            $arrayatv =[];
            foreach($ativos as $ativo){
                $arrayatv[$ativo->id]['ativo']=$ativo->ativo;
                $arrayatv[$ativo->id]['central_custo']=$ativo->central_custo;
            }
            session(['arrayatv'=>$arrayatv]);
        }else{
            session()->forget('arrayatv');
        }

        session(['empresa'=>$empresa]);
        session(['contrato'=>$contrato]);
        session(['gestor'=>$gestor]);
        session(['contratante'=>$contratante]);
        session(['projeto'=>$projeto]);
        return redirect(route('contrato_show'));

    }

    public function show_cliente(Request $request , String $type=null)
    {
        if(isset($type)){
            if($type== 'gestor'){
                $cliente = session('src_gestor');
            }
            if($type=='contratante'){
                $cliente = session('src_contratante');
            }
            $empresa = session('src_empresanome');
        }elseif(isset($request->cliente)){
            $cliente = $request->cliente;
        $empresa = $request->empresa;
        }elseif(null !== session('src_cliente')){
            $cliente = session('src_cliente');
            $empresa = session('empresa');
            $empresa = empresa::find($empresa)->value('nome');
        }else{
            return redirect(route('error',['error_desc'=>'Problema ao exibir perfil do cliente.']));
        }


        $cliente= Cliente::where('nome',$cliente)->get();
        if($cliente[0] == null or isset($cliente[1])){
            return redirect(route('error',['error_desc'=>'Erro! Perfil do Cliente não consta no banco de dados. :(']));
        }else{$cliente = $cliente[0];}

        session(['src_nome' => $cliente->nome]);
        session(['src_cargo' => $cliente->cargo]);
        session(['src_empresa' => $empresa]);
        session(['src_cpf' => $cliente->cpf]);
        session(['src_tel' => $cliente->telefone]);
        session(['src_tel2' => $cliente->tel2]);
        session(['src_email' => $cliente->email_princ]);
        session(['src_email2' => $cliente->email_sec]);
        return redirect(route('cliente_show',['empresa'=>$empresa]));


    }

    public function create_prazo(String $projeto){
        $idprojeto = projeto::where('nome',$projeto)->max('id');
        $idversao = versao::where('id_proj',$idprojeto)->max('id');
        session(['idv'=>$idversao]);

        $fases= DB::connection('etapas')
        ->select("select * from etapas.fases ");

        $etapas = DB::connection('etapas')
            ->select("select * from etapas.etapas ");

        $tp_projetos = DB::connection('etapas')
        ->select("select * from etapas.tipo_projetos");
        session(['tp_projetos'=>$tp_projetos]);
        session(['etapas'=>$etapas]);
        session(['fases'=>$fases]);

        return view('creates.prazo',['projeto'=>$projeto,]);
    }

    public function show_prazo(String $projeto)
    {
        $projeto = projeto::where('nome',$projeto)->get();
        $projeto = $projeto[0];

        dd($projeto);
        //return redirect(route('prazo_show'));
    }

    public function create_contrato(String $nome)
    {
        $idprojeto = projeto::where('nome',$nome)->max('id');
        $idversao = versao::where('id_proj',$idprojeto)->max('id');
        $idempresa = projeto::find($idprojeto)->value('id_empresa');
        $nomeempresa = empresa::find($idempresa)->value('nome');
        $clientes = cliente::where('id_empresa',$idempresa)->get()->toArray();
        session(['idv'=>$idversao]);
        return view('creates.contrato',['nome'=>$nome,'nomeempresa' => $nomeempresa,'clientes'=>$clientes]);
    }

    public function create_cliente(String $empresa){
        if($empresa == null  or $empresa == "null"){
            return redirect(route('error',['error_desc'=>'Ação bloqueada por motivo de segurança, selecione empresa corretamente.']));
        }
        $idempresa = empresa::where('nome', $empresa)->max('id');
        return view('creates.cliente',['empresa'=>$empresa,'idempresa'=>$idempresa]);
    }


    public function create_empreendimento(String $nome){

        $bancoestados= DB::connection('helper_location')
        ->select('select * from helper_location.estados');
        $estados=[];
        foreach($bancoestados as $value){
            $estados[$value->Id]['valor'] = $value->Uf;
            $estados[$value->Id]['info'] = $value->Uf;
        }
        session()->flash('estados', $estados);

        $bancomunicipios= DB::connection('helper_location')
        ->select("select * from helper_location.municipios where `Uf` = 'SP'");
        $municipios=[];
        foreach($bancomunicipios as $value){
            $municipios[$value->Codigo]['valor'] = $value->Codigo;
            $municipios[$value->Codigo]['info'] = $value->Nome;
        }
        session()->flash('municipios', $municipios);
        $idprojeto= projeto::where('nome',$nome)->max('id');
        $idversao = versao::where('id_proj',$idprojeto)->max('id');
        session(['idversao'=>$idversao]);
        return view('creates.empreendimento',['nome'=>$nome]);
    }

    public function create_ativo($ncontrato=null)
    {
        if($ncontrato == null){
            return redirect(route('error',['desc_error'=>'Não foi possivel abrir o cadastro de ativos, verifique numero de contrato.']));
        }else{
            $idcontrato = contrato::where('num_contrato',$ncontrato)->value('id');
            return view('creates.ativo',['idc'=>$idcontrato]);
        }
    }



    public function iniciar(Request $request){
        $idprojeto= projeto::where('nome',$request->projeto)->max('id');
        $projeto= projeto::find($idprojeto);
        if($projeto->prz_entrega == null or $projeto->prz_exec == null){
            $idversao = versao::where('id_proj',$idprojeto)->max('id');
            if(null != contrato::where('idversao',$idversao)){
                return view('alerts.iniciar',['projeto'=>$request->projeto]);
            }else{
                return redirect(route('error',['error_desc'=>'Não há contrato cadastrado para este projeto,
                por favor informe os dados do contrato antes de dar inicio na emissão de O.S.']));
            }
        }else{
            return redirect(route('error',['error_desc'=>'Não foi possivel iniciar a contagem de prazos, devido
            inconsistencias no cadastro do projeto.']));
        }

    }

    public function unlock(Request $request){
        $idprojeto = projeto::where('nome',$request->projeto)->max('id');
        $idversao = versao::where('id_proj',$idprojeto)->max('id');
        $contrato = contrato::where('id_versao',$idversao)->get();
        $contrato = $contrato[0];
        $projeto = projeto::find($idprojeto);
        $data = $request->data;

        if($projeto->prz_entrega == null and $projeto->prz_entrega_os != null){
            $entregaos = $projeto->prz_entrega_os;
            $resultado = date('Y-m-d', strtotime("+{$entregaos} days",strtotime($data)));
            $projeto->update(['prz_entrega'=>$resultado]);
        }
        if($projeto->prz_exec == null and $projeto->prz_exec_os != null){
            $execos = $projeto->prz_exec_os;
            $resultado = date('Y-m-d', strtotime("+{$execos} days",strtotime($data)));
            $projeto->update(['prz_exec'=>$resultado]);
        }
        if($contrato->prz_contrato == null and $contrato->prz_contrato_os != null){
            $contros = $contrato->prz_contrato_os;
            $resultado = date('Y-m-d', strtotime("+{$contros} days",strtotime($data)));
            $contrato->update(['prz_contrato'=>$resultado]);
        }
        if($contrato->prz_contrato != null and
        $projeto->prz_entrega != null and
        $projeto->prz_exec != null){
            return redirect(route('cad_ok',['obj'=>'Ordem Social']));
        }else{
            $projeto = $projeto->getOriginal();
            $contrato = $contrato->getOriginal();
            return redirect(route('error',['error_desc'=>'Existe algum problema no armazenamento, por
            favor informe o responsavel pelo sistema imediatamente.']));
        }


    }


    public function cad_ok(String $obj){return view('alerts.cad_ok',['obj' => $obj]);}
    public function error(String $error_desc){return view('alerts.error',['error_desc'=>$error_desc]);}
}
