<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CitaTerapia extends Model
{
    use HasFactory;

    protected $table = 'citas_terapia';
    protected $primaryKey = 'id_cita';

    protected $fillable = [
        'id_usuario',
        'id_terapeuta',
        'fecha_cita',
        'duracion',
        'notas',
        'estado'
    ];

    protected $casts = [
        'fecha_cita' => 'datetime',
        'estado' => 'boolean'
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }

    public function terapeuta()
    {
        return $this->belongsTo(Terapeuta::class, 'id_terapeuta');
    }
}