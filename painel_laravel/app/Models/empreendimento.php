<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class empreendimento extends Model
{
    use HasFactory;


    protected $fillable=[
        'id_versao','nome_empreendimento','tipo_empreen','cidade','estado','endereco',
    ];

}
