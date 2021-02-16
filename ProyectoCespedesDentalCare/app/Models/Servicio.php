<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_Servicio';
    protected $fillable = ['id_Servicio','nombre_Servicio','descripcion_Servicio','precio_Servicio'];
  
}
