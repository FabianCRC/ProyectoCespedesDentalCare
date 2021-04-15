<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
  /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

     //Estos son los campos de la tabla usuario que son asignables de forma masiva
    protected $fillable = [
        'usuario',
        'name',
        'email',
        'password',
        'apellido',
        'cedula',
        'telefono',
        'imagen',
        'idRol',
        'passwordrespaldo',
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
