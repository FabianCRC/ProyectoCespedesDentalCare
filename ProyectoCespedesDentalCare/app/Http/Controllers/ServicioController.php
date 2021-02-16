<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use Illuminate\Http\Request;

class ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servicios = Servicio::latest()->paginate(5);
       // return $servicios;
        return view('servicios.index', compact('servicios'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('servicios/create');
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
            'nombre_Servicio' => 'required|min:3',
            'descripcion_Servicio' => 'required|min:3',
            'precio_Servicio' => 'required|numeric'
        ]);

        Servicio::create($request->all());  
        return redirect('Servicios');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function show(Servicio $servicio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id_Servicio='id_Servicio';
        $servicios = \DB::table('servicios')
        ->select('*')
        ->where($id_Servicio , $id)
        ->get();

        return view('servicios.edit')->with('servicios',$servicios);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre_Servicio' => 'required|min:3',
            'descripcion_Servicio' => 'required|min:3',
            'precio_Servicio' => 'required|numeric'
        ]);
       //$servicio->update($request->all());
       $servicio=\DB::update('update servicios set nombre_servicio = ?,descripcion_servicio = ?,precio_servicio = ? where id_servicio=?',
       [request('nombre_Servicio'),request('descripcion_Servicio'),request('precio_Servicio'),$id]);
        return redirect()->route('Servicios.index')
            ->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $users_Servicios=\DB::delete('delete from users_servicios where id_Servicio = ?',[$id]);

        //Borra el Paciente de la base de datos
        $Servicios=\DB::delete('delete from servicios where id_Servicio = ?',[$id]);

        return redirect('Servicios')->with('success', 'Product deleted successfully');
    }
}
