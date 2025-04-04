<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CitaTerapia extends Model
{
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
    
    public $timestamps = false;
    
    // Relación con terapeuta
    public function terapeuta()
    {
        return $this->belongsTo(Terapeuta::class, 'id_terapeuta');
    }
    
    // Relación con usuario
    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }
}