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
       $datos['registros']=users::all();
       return view('usuarios/index',$datos);
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
               //Consulta las ALERGIAS registradas en la base de datos
               $roles = \DB::table('roles')
               ->select('roles.*')
               ->orderBy('id_Rol','DESC')
               ->get();
       return view('usuarios/createUser')->with('roles',$roles);
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
            'usuario' => ['required', 'string','min:6', 'max:255', 'unique:users'],
            'name' => ['required', 'string', 'max:255','min:3'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'apellido' => ['required', 'string','min:3'],
            'cedula' => ['required', 'string','min:8'],
            'telefono' => ['required', 'string','min:8'],
            'imagen' => ['required'],
            'idRol' => ['required', 'string'],

            ]);
         
            $request->request->add(['password'=> Hash::make($request->input('password'))
            ]);
 
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
    $request->validate([
        'usuario' => ['required','min:6', 'string', 'max:255','unique:users,usuario,' .$id],
            'name' => ['required', 'string', 'max:255','min:3'],
            'password' => ['required', 'string', 'min:8'],
            'apellido' => ['required', 'string','min:3'],
           'email' => ['required', 'string', 'email', 'max:255','unique:users,email,' .$id],
            'cedula' => ['required', 'string','min:8'],
            'telefono' => ['required', 'string','min:8'],
            ]);

     
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
