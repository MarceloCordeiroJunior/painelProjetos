<?php

namespace App\Http\Controllers;

use App\Models\cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function store(Request $bruto)
    {

        $request = $bruto->validate([
            'id_empresa'=>['required','alpha_num','exists:App\Models\empresa,id'],
            'nome'=>['required','max:40','unique:App\Models\cliente,nome'],
            'cpf'=>['required','unique:App\Models\projeto,numero'],
            'telefone'=>['required'],
            'tel2'=>[],
            'email_princ'=>['required','max:50','email:rfc,dns'],
            'email_sec'=>['max:50'],
            'cargo'=>['max:25',],
        ]);

        $data = [
            'id_empresa'=>$request['id_empresa'],
            'nome'=>$request['nome'],
            'cpf'=>$request['cpf'],
            'telefone'=>$request['telefone'],
            'tel2'=>$request['tel2'],
            'email_princ'=>$request['email_princ'],
            'email_sec'=>$request['email_sec'],
            'cargo'=>$request['cargo'],
        ];

        Cliente::create($data);
        session(['empresa'=>$request['id_empresa']]);
        session(['src_cliente'=>$request['nome']]);
        return redirect(route('cad_ok',['obj'=>'Cliente']));
    }


}
