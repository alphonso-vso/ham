<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TiempoComida extends Model
{
    use HasFactory;
 
    protected $fillable = ['nombre'];

    public function adicional()
    {
        return $this->belongsTo(\App\Models\Adicional::class);
    }
}
