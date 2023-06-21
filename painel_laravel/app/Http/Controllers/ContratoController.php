<?php

namespace App\Http\Controllers;

use App\Models\contrato;
use Illuminate\Http\Request;

class ContratoController extends Controller
{

    public function store(Request $bruto)
    {
        $request = $bruto->validate([
            'idv'=>['bail','required','numeric'],
            'num_contrato'=>['bail','required'],
            'contratante'=>['bail','required','numeric'],
            'gestor'=>['bail','required','numeric'],
            'forma_prazo'=>['bail','required'],
            'prz_contrato'=>['bail','exclude_if:forma_prazo,true','required_unless:forma_prazo,true'],
            'prz_contrato_os'=>['bail','exclude_if:forma_prazo,false','required_unless:forma_prazo,false'],
        ]);

        $data=[
            'id_versao'=>$request['idv'],
            'num_contrato'=>$request['num_contrato'],
            'id_contratante'=>$request['contratante'],
            'id_gestor'=>$request['gestor'],
        ];
        if($request['forma_prazo'] == true){
            $data['prz_contrato_os']=$request['prz_contrato_os'];
        }
        if($request['forma_prazo'] == false){
            $data['prz_contrato']=$request['prz_contrato'];
        }
        contrato::create($data);
        session(['idversao'=>$request['idv']]);
        session(['versi'=>$request['idv']]);
        return redirect(route('cad_ok',['obj'=>'Contrato']));
    }


}
