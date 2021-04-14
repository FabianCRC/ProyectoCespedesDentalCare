<?php

namespace App\Http\Controllers;

use App\Models\users;
use App\Rules\IsValidPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;

use App\Mail\ActualizacionDatosMailable;
use App\Mail\RegistroNuevoUsuarioMailable;
use Illuminate\Support\Facades\Mail;

class UsersController extends Controller
{ /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
       $datos['registros']=users::all();
       $roles = \DB::table('roles')
       ->select('roles.*')
       ->orderBy('id_Rol','DESC')
       ->get();
       return view('usuarios/index',$datos)->with('roles',$roles);
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
       return view('usuarios/create')->with('roles',$roles);
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
            'email' => ['required', 'email', 'max:255', 'unique:users'],
            'password' => ['required',new isValidPassword(),],
            'apellido' => ['required', 'string','min:3'],
            'cedula' => ['required', 'string','min:8'],
            'telefono' => ['required', 'string','min:8'],
            'imagen' => ['required'],
            'idRol' => ['required', 'string'],
            ]);
            $passSinEncriptar=$request->input('password');
            $pass=$request->input('password');
            $request->request->add(['passwordrespaldo'=> Crypt::encryptString($pass)
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

 $correo=new RegistroNuevoUsuarioMailable(request('usuario'),request('email'),$passSinEncriptar);
 Mail::to(request('email'))->send($correo);

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
       $roles = \DB::table('roles')
       ->select('roles.*')
       ->orderBy('id_Rol','DESC')
       ->get();
       return view('usuarios.edit',compact('users'))->with('roles',$roles);
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
            'password' => ['required',new isValidPassword(),],
            'idRol' => ['required', 'string'],
            'apellido' => ['required', 'string','min:3'],
           'email' => ['required', 'string', 'email', 'max:255','unique:users,email,' .$id],
            'cedula' => ['required', 'string','min:8'],
            'telefono' => ['required', 'string','min:8'],
            ]);

     
            if(request('password') != request('passwordO')){
                $pass=$request->input('password');
                $request->request->add(['passwordrespaldo'=> Crypt::encryptString($pass)
                ]);
                $request->request->add(['password'=> Hash::make($request->input('password'))
                ]);
             }

       $datosUsuario=request()->except(['_token','_method','passwordO']);

       
       if($request->hasFile('imagen')){
           
           $users= users::findOrFail($id);

           Storage::delete('public/'.$users->imagen);
           $datosUsuario['imagen']=$request->file('imagen')->store('uploads','public');
       }


       users::where('id','=',$id)->update($datosUsuario);

       $users= users::findOrFail($id);

       $pass=Crypt::decryptString(request('passwordrespaldo'));
       $correo=new ActualizacionDatosMailable(request('usuario'),request('email'),$pass);
       Mail::to(request('email'))->send($correo);

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
    $citaOdontologo=\DB::select('select count(*) as num from citas a, users b 
    where a.id_Usuario=b.id and b.id = ?',[$id] );
    foreach ($citaOdontologo as $c) {
        $c= $c->num;
    } 
    if($c>0){
        return redirect()->back()->WithInput()->withErrors(['msj'=> 'Este odontologo no se puede eliminar ya que cuenta con citas agendadas,
        elimine primero las citas del odontologo y posteriormente vuelva a eliminarlo' ]);
    }
       users::destroy($id);

       return redirect('Usuarios');
   }
}
