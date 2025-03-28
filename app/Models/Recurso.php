<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recurso extends Model
{
    use HasFactory;

    protected $table = 'recursos';
    protected $primaryKey = 'id_recurso';

    protected $fillable = [
        'nombre_recurso',
        'tipo_recurso', // 1 para información, 0 para ejercicios/videos
        'descripcion_recurso',
        'enlace_recurso'
    ];
}
