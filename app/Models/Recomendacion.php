<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recomendacion extends Model
{
    use HasFactory;
    protected $table = 'recomendaciones';
    protected $primaryKey = 'id_recomendacion'; 
    protected $fillable=['id_tipo_estado_animo','titulo','descripcion','icono'];
    public $timestamps = false;
}
