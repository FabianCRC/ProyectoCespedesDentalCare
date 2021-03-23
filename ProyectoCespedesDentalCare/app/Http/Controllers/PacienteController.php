<?php

namespace App\Http\Controllers;


use App\Models\Paciente;
use Illuminate\Http\Request;
use App\Models\pacientes_enfermedades;
use App\Models\pacientes_alergias;
use App\Models\enfermedades;
use App\Models\alergias;
use Illuminate\Support\Facades\Storage;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //Consulta las ENFERMEDADES registradas en la base de datos
        $enfermedades = \DB::table('enfermedades')
        ->select('enfermedades.*')
        ->orderBy('id_Enfermedad','DESC')
        ->get();

        
        //Consulta las ALERGIAS registradas en la base de datos
        $alergias = \DB::table('alergias')
        ->select('alergias.*')
        ->orderBy('id_Alergia','DESC')
        ->get();

        //Consulta los PACIENTES registrados en la base de datos
        $pacientes = \DB::table('pacientes')
                    ->select('pacientes.*')
                    ->orderBy('nombre_Paciente', 'Desc')
                    ->get();
        //Consulta las ALERGIAS DE LOS PACIENTES en la base de datos
        $pacientes_alergias = \DB::table('pacientes_alergias')
        ->select('pacientes_alergias.*')
        ->orderBy('id_Paciente_Alergia', 'Desc')
        ->get();       
        //Consulta las Enfermedades DE LOS PACIENTES en la base de datos
        $pacientes_enfermedades = \DB::table('pacientes_enfermedades')
        ->select('pacientes_enfermedades.*')
        ->orderBy('id_Paciente_Enfermedad', 'Desc')
        ->get();

        $odontologos = \DB::table('users')
        ->where('idRol', '2')
        ->orderBy('name', 'Desc')
        ->get();
        
        


        return view('pacientes.index')->with('alergias',$alergias)->with('enfermedades',$enfermedades)
        ->with('pacientes',$pacientes)->with('pacientes_alergias',$pacientes_alergias)
        ->with('pacientes_enfermedades',$pacientes_enfermedades) ->with('odontologos',$odontologos);
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

        $imagenes = $request->file('img')->store('public/imagenes');

        $url = Storage::url($imagenes);
  
        Paciente::create([
              'id_Paciente' => request('idP'),
              'numero_Paciente' => request('numeroP'),
              'nombre_Paciente' => request('nombreP'),
              'correo_Paciente' => request('correoP'),
              'observaciones_Paciente' => request('observacionesP'),
              'dentista_Paciente' => request('dentistaP'),
              'fecha_Nacimiento' => request('fechanaciP'),
              'fecha_Ingreso' => request('fechaingrP'),
              'datos_Paciente' => request('datosP'),
              'imagen_Paciente' => $url
  
              ]);
  
          pacientes_enfermedades::create([
              'id_Paciente' => request('idP'),
              'id_Enfermedad' => request('enfermedadesP')
          ]);
  
          pacientes_alergias::create([
              'id_Paciente' => request('idP'),
              'id_Alergia' => request('alergiasP')
          ]);


    
  
      return redirect()->route('Pacientes.index');
  
 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id_Paciente='id_Paciente';
        $pacientes = \DB::table('pacientes')
        ->select('*')
        ->where($id_Paciente , $id)
        ->get();
        //Consulta las ENFERMEDADES registradas en la base de datos
        $enfermedades = \DB::table('enfermedades')
        ->select('enfermedades.*')
        ->orderBy('id_Enfermedad','DESC')
        ->get();

        
        //Consulta las ALERGIAS registradas en la base de datos
        $alergias = \DB::table('alergias')
        ->select('alergias.*')
        ->orderBy('id_Alergia','DESC')
        ->get();

        $odontologos = \DB::table('users')
        ->where('idRol', '2')
        ->orderBy('name', 'Desc')
        ->get();


return view('pacientes.show')->with('pacientes',$pacientes)->with('alergias',$alergias)->with('enfermedades',$enfermedades)
->with('odontologos',$odontologos);

       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id_Paciente='id_Paciente';
        $pacientes = \DB::table('pacientes')
        ->select('*')
        ->where($id_Paciente , $id)
        ->get();
        //Consulta las ENFERMEDADES registradas en la base de datos
        $enfermedades = \DB::table('enfermedades')
        ->select('enfermedades.*')
        ->orderBy('id_Enfermedad','DESC')
        ->get();

        
        //Consulta las ALERGIAS registradas en la base de datos
        $alergias = \DB::table('alergias')
        ->select('alergias.*')
        ->orderBy('id_Alergia','DESC')
        ->get();
        $odontologos = \DB::table('users')
        ->where('idRol', '2')
        ->orderBy('name', 'Desc')
        ->get();


return view('pacientes.edit')->with('pacientes',$pacientes)->with('alergias',$alergias)->with('enfermedades',$enfermedades)
->with('odontologos',$odontologos);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update (Request $request, $id)
    {
         $request->validate([
            'idP' => 'required|min:8',
            'numeroP' => 'required|min:8|max:20',
           'nombreP' => 'required|min:3',
            'correoP' => 'required|email',
            'observacionesP' => 'required|min:3',
            'dentistaP' => 'required|numeric',
            'fechanaciP' => 'required|date',
            'fechaingrP' => 'required|date',
            'datosP' => 'required|min:3'
        ]);
       //Actualiza el paciente en la base de datos
       if($request->file('img') != null){
        $request->validate([
            'img' => 'required|image|max:2048',
        ]);
    
        $imagenes = $request->file('img')->store('public/imagenes');

        $url = Storage::url($imagenes);
    $paciente=\DB::update('update pacientes set numero_Paciente = ?,nombre_Paciente = ?,correo_Paciente = ?,observaciones_Paciente = ?,dentista_Paciente = ?,fecha_Nacimiento = ?,fecha_Ingreso = ?,datos_Paciente	= ?,imagen_Paciente = ?,id_Paciente = ?  where  id_Paciente= ?', 
                  [request('numeroP'),request('nombreP'),request('correoP'),request('observacionesP'),request('dentistaP'), request('fechanaciP'),request('fechaingrP'),request('datosP'), $url ,request('idP'),$id]);
            
       }else{

    $paciente=\DB::update('update pacientes set numero_Paciente = ?,nombre_Paciente = ?,correo_Paciente = ?,observaciones_Paciente = ?,dentista_Paciente = ?,fecha_Nacimiento = ?,fecha_Ingreso = ?,datos_Paciente	= ?,id_Paciente = ?  where  id_Paciente= ?', 
                  [request('numeroP'),request('nombreP'),request('correoP'),request('observacionesP'),request('dentistaP'), request('fechanaciP'),request('fechaingrP'),request('datosP') ,request('idP'),$id]);
                  
       }

       return redirect('/Pacientes');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
       //Borra la alergia del paciente de la base de datos
       $pacientes_alergias=\DB::delete('delete from pacientes_alergias where id_Paciente = ?',[$id]);
     
       //Borra la enfermedad del paciente de la base de datos
       $pacientes_enfermedades=\DB::delete('delete from pacientes_enfermedades where id_Paciente = ?',[$id]);

        //Borra el Paciente de la base de datos
        $paciente=\DB::delete('delete from pacientes where id_Paciente = ?',[$id]);

      return redirect()->route('Pacientes.index');



    }
}
