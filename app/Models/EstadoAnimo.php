<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoAnimo extends Model
{
    public function tipoEstadoAnimo()
{
    return $this->belongsTo(TipoEstadoAnimo::class, 'id_tipo_estado_animo', 'id_tipo_estado_animo');
}
    use HasFactory;
    protected $table = 'estadoanimo';
    protected $primaryKey = 'id_estado'; 
    protected $fillable=['id_estado','id_usuario','id_tipo_estado_animo','fecha_registro'];
    public $timestamps = false;
}
