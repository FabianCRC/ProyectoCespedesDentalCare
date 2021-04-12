<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class citas_pagina extends Model
{
    protected $fillable = ['id','nombre','numero','fecha','descripcion','tipoPaciente'];
    use HasFactory;
}
