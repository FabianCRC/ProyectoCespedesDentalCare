<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $fillable = ['id_Paciente','numero_Paciente','nombre_Paciente','correo_Paciente','observaciones_Paciente','dentista_Paciente','fecha_Nacimiento','fecha_Ingreso','datos_Paciente','imagen_Paciente'];
    protected $primaryKey = 'id_Paciente';
    use HasFactory;
}
