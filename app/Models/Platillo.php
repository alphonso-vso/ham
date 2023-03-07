<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Platillo extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'precio', 'ingredientes', 'id_tiempo_comida'];

    public function tiempoComida()
    {
        return $this->hasOne(\App\Models\TiempoComida::class);
    }
}
