<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $table = 'evento';
    protected $primaryKey = 'id_evento'; 
    protected $fillable=['id_evento','id_usuario','titulo','descripcion','fecha'];
    public $timestamps = false;
}
