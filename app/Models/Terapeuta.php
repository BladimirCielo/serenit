<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Terapeuta extends Model
{
    use HasFactory;

    protected $table = 'terapeutas';
    protected $primaryKey = 'id_terapeuta';
    protected $fillable = [
        'nombre_terapeuta', 
        'especialidad',
        'email_terapeuta',
        'celular_terapeuta',
        'disponible',
        'descripcion'
    ];
}