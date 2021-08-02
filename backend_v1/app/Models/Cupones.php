<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cupones extends Model
{
    use HasFactory;

    public function getProveedor()
    {
        return $this->hasOne(Proveedores::class, 'id', 'proveedor');
    }

}
