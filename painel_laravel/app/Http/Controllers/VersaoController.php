<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\versao;

class VersaoController extends Controller
{

    public function store(){
        $value = session()->get('idprojeto');

        $data = [
            'id_proj' => $value, 'detalhes' => 'nenhum', 'id_validador'=> '1'
        ];

        Versao::create($data);

        $idversao = Versao::where('id_proj',$value)->max('id');
        session(['versi'=>$idversao]);
        return redirect(route('cad_ok',['obj'=>'Projeto']));

    }

}
