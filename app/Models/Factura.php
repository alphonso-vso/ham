<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;

    protected $fillable = ['id_usuario', 'id_platillo', 'id_estado', 'cantidad', 'adicionales'];
}
