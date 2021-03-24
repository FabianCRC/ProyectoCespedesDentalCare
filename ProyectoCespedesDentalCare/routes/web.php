<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

//Ruta de raiz que envia al login
//El middleware('auth') lo que hace es redireccionar al login si no se encuentra autenticada la sesion


Route::view('/','Index')->name('Index');

Route::view('/agendarCita','agendarCita')->name('AgendarCita')->middleware('auth');

Route::view('/layout','layout')->name('Layout')->middleware('auth');

Route::view('/servicios','servicios')->name('Servicios')->middleware('auth');


Route::view('/calendario','calendario')->name('calendario')->middleware('auth');

Route::view('/login','auth.login')->name('login')->middleware('auth');


//Ruta post para el logout
Route::post('/','App\Http\Controllers\Auth\LoginController@logout')->name('logout');


//Rutas de auth para el inicio de sesion y registro de nuevos usuarios, en los controladores esta el de registro de usuarios
Auth::routes();

//Rutas de los pacientes
Route::resource('/Pacientes', 'App\Http\Controllers\PacienteController')->middleware('auth');


Route::resource('/Servicios', 'App\Http\Controllers\ServicioController')->middleware('auth');

Route::resource('/Usuarios','\App\Http\Controllers\UsersController')->middleware('auth');

Route::resource('/Citas','\App\Http\Controllers\CitaController')->middleware('auth');

Route::resource('/Perfil','\App\Http\Controllers\PerfilController')->middleware('auth');



