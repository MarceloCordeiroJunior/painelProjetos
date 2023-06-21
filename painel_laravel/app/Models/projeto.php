<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class projeto extends Model
{
    use HasFactory;


    protected $fillable = [
        'nome','numero','id_empresa','cidade','estado','endereco','num_ped_venda',
        'tp_venda','prz_entrega','prz_exec','prz_entrega_os','prz_exec_os','desc',
    ];
}
