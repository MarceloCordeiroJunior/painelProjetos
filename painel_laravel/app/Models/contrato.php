<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contrato extends Model
{
    use HasFactory;


    protected $fillable=[
        'id_versao','id_contratante','id_gestor','prz_contrato','prz_contrato_os','num_contrato'
    ];

}
