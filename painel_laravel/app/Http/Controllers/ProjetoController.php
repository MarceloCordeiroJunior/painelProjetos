<?php

namespace App\Http\Controllers;

use App\Models\empresa;
use Illuminate\Http\Request;
use App\Models\projeto;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ProjetoController extends Controller
{

    public function index(){
        // Retrieving database data
        $projetos = Projeto::select('nome','numero_projeto')->get();

        // Sorting data in array
        $data = array();$count=0;
        foreach($projetos as $projeto){
            $data[$count]['data'] = $projeto->numero_projeto . " - " . $projeto->nome;
            dd($projeto);
            $data[$count]['value'] = $projeto->id;$count++;
        }
        // calling view
        return view('v2.projetos.index',['data'=>$data]);
    }

    public function create(){
        $empresa = empresa::get('nome');
        if(isset($empresa[0])){
            foreach($empresa as $value){
                $empresas[$value->nome] = $value->nome;
            }
        }else{
            $empresas['void'] = "";
        }

        // $bancoestados= DB::connection('helper_location')
        // ->select('select * from helper_location.estados');
        // $estados=[];
        // foreach($bancoestados as $value){
        //     $estados[$value->Id]['valor'] = $value->Uf;
        //     $estados[$value->Id]['info'] = $value->Uf;
        // }

        $estados[1]['valor'] = "fjdshfkjs";
        $estados[1]['info'] = "ksdhfkjsdhfkj";

        // $bancomunicipios= DB::connection('helper_location')
        // ->select("select * from helper_location.municipios where `Uf` = 'SP'");
        // $municipios=[];
        // foreach($bancomunicipios as $value){
        //     $municipios[$value->Codigo]['valor'] = $value->Codigo;
        //     $municipios[$value->Codigo]['info'] = $value->Nome;
        // }
        $municipios[1]['valor'] = "fjdshfkjs";
        $municipios[1]['info'] = "ksdhfkjsdhfkj";
        return view('creates.projeto',
        ['empresas'=>$empresas,'estados'=>$estados,'municipios'=>$municipios]);
    }

    public function store(Request $bruto){

        $request = $bruto->validate([
            'nome'=>['bail','required','max:50','unique:App\Models\projeto,nome'],
            'numero'=>['bail','required','numeric','digits_between:1,5','unique:App\Models\projeto,numero'],
            'desc'=>['bail','required','max:200'],
            'empresa'=>['bail','exists:App\Models\empresa,nome'],
            'estado'=>['bail','required'],
            'cidade'=>['bail','required'],
            'endereco'=>['bail','max:30'],
            'tp_venda'=>['bail','required','max:15'],
            'num_ped_venda'=>['bail','required','max:7'],
            'forma_prazo'=>['bail','required'],
            'prz_exec'=>['bail','exclude_if:forma_prazo,true','required_unless:forma_prazo,true'],
            'prz_entrega'=>['bail','exclude_if:forma_prazo,true','required_unless:forma_prazo,true'],
            'prz_exec_os'=>['bail','exclude_if:forma_prazo,false','numeric','required_unless:forma_prazo,false'],
            'prz_entrega_os'=>['bail','exclude_if:forma_prazo,false','numeric','required_unless:forma_prazo,false'],

        ]);

        $empresa = empresa::where('nome',$request['empresa'])->get();

        if(isset($empresa[0])){
            $idempresa = $empresa[0]->id;
        }else{
            return redirect(route('error',['error_desc'=>'Empresa não cadastrada']));
        }

        $data = [
            'nome'=>$request['nome'],
            'numero'=>$request['numero'],
            'desc'=>$request['desc'],
            'id_empresa'=>$idempresa,
            'estado'=>$request['estado'],
            'cidade'=>$request['cidade'],
            'endereco'=>$request['endereco'],
            'tp_venda'=>$request['tp_venda'],
            'num_ped_venda'=>$request['num_ped_venda'],
        ];

        if($request['forma_prazo']== 'false'){
        $data['prz_exec']=$request['prz_exec'];
        $data['prz_entrega']=$request['prz_entrega'];}

        if($request['forma_prazo']== 'true'){
        $data['prz_exec_os']=$request['prz_exec_os'];
        $data['prz_entrega_os']=$request['prz_entrega_os'];}


        Projeto::create($data);

        $idprojeto = Projeto::where('nome',$request['nome'])->max('id');

        session()->flash('idprojeto',$idprojeto);
        session(['nome_proj'=>$request['nome']]);
        return redirect(route('versao_store'));

    }
}
