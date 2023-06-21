<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ativo extends Model
{
    use HasFactory;


    protected $fillable=[
        'ativo','central_custo','id_contrato',
    ];
}
