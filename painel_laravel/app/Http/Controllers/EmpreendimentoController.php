<?php

namespace App\Http\Controllers;

use App\Models\empreendimento;
use Illuminate\Http\Request;

class EmpreendimentoController extends Controller
{
    public function store(Request $bruto)
    {
        $request = $bruto->validate([
            'nome' =>['bail','required','max:30','unique:App\Models\projeto,nome'],
            'tipo' =>['bail','required','max:30'],
            'estado' =>['bail','required','max:2'],
            'cidade' =>['bail','required','max:30'],
            'endereco' =>['bail','max:40'],
            'projeto'=>['bail','required'],
        ]);
        $data = [
            'nome_empreendimento'=>$request['nome'],
            'tipo_empreen'=>$request['tipo'],
            'estado'=>$request['estado'],
            'cidade'=>$request['cidade'],
            'endereco'=>$request['endereco'],
        ];

        if(null != session('idversao')){
            $data['id_versao']= session('idversao');
        }else{
            return redirect(route('error',['error_desc'=>'Falha ao adicionar empreendimento ao projeto.']));
        }

        empreendimento::create($data);
        session(['nome'=>$request['projeto']]);
        return redirect(route('cad_ok', ['obj'=>'Empreendimento']));
    }
}
