<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlatilloDia extends Model
{
    use HasFactory;

    protected $fillable = ['id_platillo', 'id_dia'];
}
