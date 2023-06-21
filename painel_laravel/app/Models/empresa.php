<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class empresa extends Model
{
    use HasFactory;


    protected $fillable=[
        'nome','area','cnpj','n_contato','estado','cidade','endereco','telefone','email_princ','email_sec',
    ];

}
