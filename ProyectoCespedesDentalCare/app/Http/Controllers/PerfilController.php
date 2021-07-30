<?php

namespace App\Http\Controllers;

use App\Models\users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Rules\IsValidPassword;
use Illuminate\Support\Facades\Crypt;


class PerfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('perfil.index');
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
    public function edit(users $users)
    {
        //
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
 
         return redirect('/calendario');
    }
 

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\users  $users
     * @return \Illuminate\Http\Response
     */
    public function destroy(users $users)
    {
        //
    }
}
