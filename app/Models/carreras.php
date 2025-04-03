<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class carreras extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_carrera'; 
    protected $fillable=['id_carrera','nombre_carrera'];
}
