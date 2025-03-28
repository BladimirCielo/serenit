<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoEstadoAnimo extends Model
{
    use HasFactory;
    protected $table = 'tiposestados';
    protected $primaryKey = 'id_tipo_estado_animo'; 
    protected $fillable=['id_tipo_estado_animo','nombre_tipo','descripcion'];
    public $timestamps = false;
}
