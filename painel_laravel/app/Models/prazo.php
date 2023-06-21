<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class prazo extends Model
{
    use HasFactory;


    protected $fillable=[
        'id_versao','id_macro','id_micro','id_func','prazo','is_concl',
    ];
}
