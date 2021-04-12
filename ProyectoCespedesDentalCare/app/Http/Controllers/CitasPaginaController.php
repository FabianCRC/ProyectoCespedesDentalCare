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
        citas_pagina::create($request->all());
        
        $mensaje = "Tu cita fue agendada. ¡Pronto te contactaremos para confirmarla!";
        return redirect()->route('Index')->with('agendada', 'Tu cita fue agendada. ¡Pronto te contactaremos para confirmarla!');
      
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
