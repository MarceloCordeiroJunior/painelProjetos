<?php

namespace App\Http\Controllers;

use App\Models\funcionario;
use Illuminate\Http\Request;

class FuncionarioController extends Controller
{
    public function store(Request $bruto)
    {
        $request = $bruto->validate([
            'nome'=>['required','alpha','unique:App\Models\funcionario,nome','max:40'],
            'cpf'=>['required','alpha_dash','unique:App\Models\funcionario,cpf','digits:14'],
            'telefone'=>['required','alpha_dash','digits:14'],
            'tel2'=>[],
            'email_princ'=>['required','email:rfc,dns','max:30'],
            'email_sec'=>['max:20'],
            'cargo'=>[],
        ]);
        $data = [
            'nome'=>$request['nome'],
            'cpf'=>$request['cpf'],
            'telefone'=>$request['telefone'],
            'tel2'=>$request['tel2'],
            'email_princ'=>$request['email_princ'],
            'email_sec'=>$request['email_sec'],
            'cargo'=>$request['cargo'],
        ];

        funcionario::create($data);

        return redirect(route('cad_ok',['obj'=>'Colaborador']));
    }
}
