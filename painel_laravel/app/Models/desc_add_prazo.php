<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class desc_add_prazo extends Model
{
    use HasFactory;


    protected $fillable=[
        'id_versao','adicional','desc','id_func','prazo'
    ];

}
