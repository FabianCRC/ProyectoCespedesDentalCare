<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pacientes_alergias extends Model
{
    protected $fillable = ['id_Paciente','id_Alergia'];
    use HasFactory;
}
