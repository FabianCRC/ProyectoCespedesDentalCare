<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cita;

class CitaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $citas = Cita::latest()->paginate(5);
         $odontologos = \DB::table('users')
        ->where('idRol', '2')
        ->orderBy('name', 'Desc')
        ->get();
        $pacientes = \DB::table('pacientes')
        ->get();
         //return $citas;
         return view('citas.index', compact('citas'))->with('i', (request()->input('page', 1) - 1) * 5)->with('odontologos',$odontologos)
         ->with('pacientes',$pacientes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //1 es administradior
        //2 es odontologo
        //3 es secretaria
        $odontologos = \DB::table('users')
        ->where('idRol', '2')
        ->orderBy('name', 'Desc')
        ->get();
        $pacientes = \DB::table('pacientes')
        ->orderBy('nombre_Paciente', 'Desc')
        ->get();
      
        return view('citas.create')->with('odontologos',$odontologos)->with('pacientes',$pacientes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
              
        $request->validate([
            'paciente' => 'required',
            'descripcion_Cita' => 'required|min:3',
            'inicio' => 'required',
            'final' => 'required',
            'dentista' => 'required',
            'descripcion_Cita' => 'required|min:4'
        ]);

        Cita::create([
            'id_Paciente' => request('paciente'),
            'descripcion_Cita' => request('tipo'),
            'inicio_Cita' => request('inicio'),
            'final_cita' => request('final'),
            'id_Usuario' => request('dentista'),
            'descripcion_Cita' => request('descripcion_Cita')
            ]);

            return redirect()->route('Citas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Servicios=\DB::delete('delete from citas where id_Cita = ?',[$id]);

        return view('citas.index');
    }
}
