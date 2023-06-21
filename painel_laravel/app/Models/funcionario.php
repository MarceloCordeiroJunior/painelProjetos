<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class funcionario extends Model
{
    use HasFactory;


    protected $fillable=[
        'nome','cpf','telefone','tel2','email_princ','email_sec','cargo'
    ];

}
