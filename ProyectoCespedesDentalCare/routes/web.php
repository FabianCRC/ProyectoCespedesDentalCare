<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/','index')->name('Inicio');

Route::view('/login','login')->name('Login');

Route::view('/agendarCita','agendarCita')->name('AgendarCita');

Route::view('/registro','registro')->name('Registro');

Route::view('/layout','layout')->name('Layout');

Route::view('/citas','citas')->name('Citas');

Route::view('/pacientes','pacientes')->name('Pacientes');

Route::view('/servicios','servicios')->name('Servicios');

Route::view('/prueba','prueba')->name('Prueba');

Route::view('/miPerfil','miPerfil')->name('MiPerfil');
