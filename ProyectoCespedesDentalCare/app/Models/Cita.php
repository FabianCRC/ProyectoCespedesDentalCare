<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    protected $fillable = ['id_Paciente','descripcion_Cita','inicio_Cita','final_cita','id_Usuario','descripcion_Cita'];
    use HasFactory;
}
