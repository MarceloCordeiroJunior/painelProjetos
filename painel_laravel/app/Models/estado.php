<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class estado extends Model
{
    use HasFactory;

    protected $connection = 'helper_location';
    protected $table='estados';

    protected $fillable = [
        'Id','CodigoUf','Nome','Uf','Regiao',
    ];

}
