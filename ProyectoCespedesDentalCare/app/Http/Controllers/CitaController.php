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
         $citas = Cita::latest()->paginate(1000);
         $odontologos=\DB::select(' select * from `users` where  `idRol` = 2 or `idRol` = 4  order by `name` desc');
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

        $odontologos=\DB::select(' select * from `users` where  `idRol` = 2 or `idRol` = 4  order by `name` desc');


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
       // $cita = \DB::table('citas')
       //  ->where('inicio_Cita', request('inicio'))
       //  ->where('final_cita', request('final'))
       //  ->where('id_Paciente', request('paciente'))
       //  ->where('id_Usuario', request('dentista'))
       //  ->get();
              
      //   return $cita;

        $request->validate([
            'paciente' => 'required',
            'descripcion_Cita' => 'required|min:3',
            'inicio' => 'required|date|after:yesterday',
            'final' => 'required|date|after:yesterday',
            'dentista' => 'required',
            'descripcion_Cita' => 'required|min:4'
        ]);


        $citaPacienteOdontologo=\DB::select('select count(*) as "num" from citas 
        WHERE inicio_Cita <= ? and final_Cita >= ? and id_Usuario = ? and id_Paciente = ?',[request('inicio'),request('final'),request('dentista'),request('paciente')]);

      
        $citaOdontologo=\DB::select('select count(*) as "num" from citas 
        WHERE inicio_Cita <= ? and final_Cita >= ? and id_Usuario = ?',[request('inicio'),request('final'),request('dentista')]);

        $citaPaciente=\DB::select('select count(*) as "num" from citas 
        WHERE inicio_Cita <= ? and final_Cita >= ? and id_Paciente = ?',[request('inicio'),request('final'),request('paciente')]);
     
        $a;$b;$c;
        foreach ($citaPacienteOdontologo as $a) {
           $a= $a->num;
        }
        foreach ($citaOdontologo as  $b) {
            $b=$b->num;
        }
        foreach ($citaPaciente as $c) {
            $c= $c->num;
        }


        if($a>0){
            return redirect()->back()->WithInput()->withErrors(['msj'=> 'Este paciente y odontologo ya tienen una cita agendada en este horario' ]);
        }else if($b>0){
            return redirect()->back()->WithInput()->withErrors(['msj'=> 'Este odontologo ya tienen una cita agendada en este horario' ]);
        }else if($c>0){
            return redirect()->back()->WithInput()->withErrors(['msj'=> 'Este paciente  ya tienen una cita agendada en este horario' ]);
        }
      
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
        $citas  = \DB::table('citas')
        ->select('*')
        ->where('id_Cita' , $id)
        ->get();
        $odontologos = \DB::table('users')
        ->where('idRol', '2')
        ->orderBy('name', 'Desc')
        ->get();
        $pacientes = \DB::table('pacientes')
        ->orderBy('nombre_Paciente', 'Desc')
        ->get();
      
        return view('citas.edit')->with('odontologos',$odontologos)->with('pacientes',$pacientes)->with('citas',$citas);   
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
     
        $request->validate([
            'dentista' => 'required',
            'paciente' => 'required',
            'final' => 'required|date',
            'inicio' => 'required|date',
            'descripcion_Cita' => 'required|min:4',
            'monto' => 'numeric|min:500|max:15000000',
            'abono' => 'numeric|min:100|max:15000000',
        ]);
       //$servicio->update($request->all());
       if(request('monto')-request('abono')<=0){
        $saldo=0;
       }else{
        $saldo=request('monto')-request('abono');
       }
       $servicio=\DB::update('update citas set id_Paciente = ?,id_Usuario = ?,inicio_Cita = ?,final_Cita = ?,descripcion_Cita=?
       ,monto = ?,abono = ?,saldo = ?  where id_Cita=?',
       [request('paciente'),request('dentista'),
       request('inicio'),request('final'),request('descripcion_Cita'),request('monto'),request('abono'),$saldo,$id]);
        return redirect()->route('Citas.index')
            ->with('success', 'Product updated successfully');
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
 
        return redirect()->route('Citas.index');
    }
}
