<?php

namespace App\Http\Controllers;

use App\Models\citas_pagina;
use Illuminate\Http\Request;


class CitasPaginaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $citas = \DB::table('citas_paginas')
        ->get();

        return view('citasPagina.index')->with('citas',$citas);
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

        $request->validate([
            
           'nombre' => 'required|min:3',
           'numero' => 'required|min:8|max:20',
            'fecha' => 'required|date',
            'descripcion' => 'required|min:2',
            'tipoPaciente' => 'required'
        ]);


        
        citas_pagina::create($request->all());
        
  

        return redirect()->route('Index')->with('notice', 'Tu cita fue agendada. ¡Pronto te contactaremos para confirmarla!');
      
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
        $Servicios=\DB::delete('delete from citas_paginas where id = ?',[$id]);
 
        return redirect()->route('CitasPagina.index');
    }
}
