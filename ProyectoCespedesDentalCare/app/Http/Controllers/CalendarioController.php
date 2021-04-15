<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use Illuminate\Http\Request;

class CalendarioController extends Controller
{
    
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       // 
      
        $odontologos = \DB::table('users')
       ->where('idRol', '2')
       ->orderBy('name', 'Desc')
       ->get();
       $pacientes = \DB::table('pacientes')
       ->get();
        return view('calendario')->with('odontologos',$odontologos)
         ->with('pacientes',$pacientes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function show($id) 
    {       
        $data =\ DB::select("select CONCAT('Dentista: ',b.name,' ',b.apellido,', Paciente: ',c.nombre_Paciente ,', descripcion de la cita: ',a.descripcion_Cita)  as title,
        DATE_FORMAT(a.inicio_Cita,'%Y-%m-%d %H:%i:%s') as start,
        DATE_FORMAT(a.final_Cita,'%Y-%m-%d %H:%i:%s') as end 
        from citas a, users b, pacientes c where a.id_Paciente=c.id_Paciente and a.id_Usuario=b.id");
        // $data['citas']=Cita::all();
       // return $citas;
       return json_encode($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function edit(Cita $cita)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cita $cita)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cita $cita)
    {
        //
    }
}
