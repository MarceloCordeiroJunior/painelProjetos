<?php

namespace App\Http\Controllers;

use App\Models\ativo;
use Illuminate\Http\Request;

class AtivoController extends Controller
{
    public function store(Request $bruto)
    {
        $request = $bruto->validate([
            'idc'=>['required','numeric'],
            'ativo'=>['required','max:50'],
            'central_custo'=>['required','max:50'],
        ]);

        $data = [
            'id_contrato' => $request['idc'],
            'ativo' => $request['ativo'],
            'central_custo' => $request['central_custo'],
        ];

        ativo::create($data);

        return redirect(route('cad_ok',['obj'=>'Ativo']));
    }
}
