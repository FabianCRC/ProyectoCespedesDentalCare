<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pacientes_enfermedades extends Model
{
    protected $fillable = ['id_Paciente','id_Enfermedad'];
    use HasFactory;
}
