<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class usuarios extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_usuario'; 
    protected $fillable=['id_usuario','nombre','apellido_pat','apellido_mat','email','username','contrasenia','created_at','updated_at','id_carrera'];
}
