<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cliente extends Model
{
    use HasFactory;


    protected $fillable=[
        'nome','telefone','tel2','cpf','email_princ','email_sec','cargo','id_empresa'
    ];

}
