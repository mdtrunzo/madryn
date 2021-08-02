<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emisiones extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'apellido',
        'mail',
        'ip',
        'metadata',
        'rela_cupon','data'
    ];

}
