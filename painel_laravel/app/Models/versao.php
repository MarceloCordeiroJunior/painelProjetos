<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class versao extends Model
{
    use HasFactory;


    protected $fillable = [
        'id_proj','id_validador','detalhes',
    ];
}
