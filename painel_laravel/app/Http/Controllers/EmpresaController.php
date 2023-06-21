<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\empresa;
use App\Models\estado;
use Illuminate\Support\Facades\DB;

class EmpresaController extends Controller
{
    public function create(){

        // $bancoestados= DB::connection('helper_location')
        // ->select('select * from helper_location.estados');
        // $estados=[];
        // foreach($bancoestados as $value){
        //     $estados[$value->Id]['valor'] = $value->Uf;
        //     $estados[$value->Id]['info'] = $value->Uf;
        // }
        $estados[1]["valor"] = "AA";
        $estados[1]["info"] = "testeeee";

        session()->flash('estados', $estados);

        // $bancomunicipios= DB::connection('helper_location')
        // ->select("select * from helper_location.municipios where `Uf` = 'SP'");
        // $municipios=[];
        // foreach($bancomunicipios as $value){
        //     $municipios[$value->Codigo]['valor'] = $value->Codigo;
        //     $municipios[$value->Codigo]['info'] = $value->Nome;
        // }

        $municipios[1]["valor"] = "1";
        $municipios[1]["info"] = "testeeee";

        session()->flash('municipios', $municipios);
        return view('creates.empresa');
    }
    public function store(Request $bruto)
    {

        $request = $bruto->validate([
            'nome'=>['required','max:40','unique:App\Models\empresa,nome'],
            'area'=>['required','alpha_num','max:40'],
            'cnpj'=>['required','unique:App\Models\empresa,cnpj'],
            'estado'=>['required','alpha'],
            'cidade'=>['required','alpha_num','numeric'],
            'endereco'=>['max:50'],
            'n_contato'=>['required',],
            'email_princ'=>['required','email:rfc,dns','max:50'],
            'email_sec'=>['max:20'],
        ]);

        $data = [
            'nome'=>$request['nome'],
            'area'=>$request['area'],
            'cnpj'=>$request['cnpj'],
            'estado'=>$request['estado'],
            'cidade'=>$request['cidade'],
            'endereco'=>$request['endereco'],
            'n_contato'=> $request['n_contato'],
            'email_princ'=>$request['email_princ'],
            'email_sec'=>$request['email_sec'],
            ];

            Empresa::create($data);

            $nome = Empresa::where('nome',$request['nome'])->value('nome');
            session()->flash('empresa',$nome);

            return redirect(route('cad_ok',['obj' => 'Empresa']));

    }

    public function show(Request $request)
    {
        dd($request);
    }

}
