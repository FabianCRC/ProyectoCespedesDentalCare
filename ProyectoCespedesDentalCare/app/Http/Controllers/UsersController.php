<?php

namespace App\Http\Controllers;

use App\Models\users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{ /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
       $datos['registros']=users::paginate(10);
       return view('usuarios/index',$datos);
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
       return view('usuarios/createUser');
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $request->request->add(['password'=> Hash::make($request->input('password'))
        ]);
     $request->validate([
         'name' => 'required',
         'apellido' => 'required',
         'cedula' => 'required',
         'imagen' => 'required',
         'telefono' => 'required',
         'idRol' => 'required',
         'email' => 'required',
         'password' => 'required',]);
         
     
 
        //$datosUsuario=request()->all();
        $datosUsuario=request()->except('_token');
 
        if($request->hasFile('imagen')){
 
            $datosUsuario['imagen']=$request->file('imagen')->store('uploads','public');
        }
 
        users::insert($datosUsuario);
       // return response()->json($datosUsuario);
        //return $datosUsuario;
 $request->password = bcrypt($request->password);
        return redirect('Usuarios');
    }
 

   /**
    * Display the specified resource.
    *
    * @param  \App\Models\users  $users
    * @return \Illuminate\Http\Response
    */
   public function show(users $users)
   {
       //
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\users  $users
    * @return \Illuminate\Http\Response
    */
   public function edit($id)
   {
       $users= users::findOrFail($id);

       return view('usuarios.editUser',compact('users'));
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\users  $users
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, $id)
   {
    $request->request->add(['password'=> Hash::make($request->input('password'))
    ]);
       $datosUsuario=request()->except(['_token','_method']);


       if($request->hasFile('imagen')){
           
           $users= users::findOrFail($id);

           Storage::delete('public/'.$users->imagen);
           $datosUsuario['imagen']=$request->file('imagen')->store('uploads','public');
       }


       users::where('id','=',$id)->update($datosUsuario);

       $users= users::findOrFail($id);
       return redirect('/Usuarios');
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\users  $users
    * @return \Illuminate\Http\Response
    */
   public function destroy($id)
   {
       users::destroy($id);

       return redirect('Usuarios');
   }
}
