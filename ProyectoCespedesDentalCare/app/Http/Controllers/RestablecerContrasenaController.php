<?php

namespace App\Http\Controllers;

use App\Exceptions\Handler;
use Illuminate\Http\Request;
use App\Mail\OlvidoContrasenaMailable;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Crypt;

class RestablecerContrasenaController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.olvidocontrasena');
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
        $sql = \DB::table('users')
        ->select('*')
        ->where('email', request('email'))
        ->get();
       
        foreach($sql as $a){
            $email= $a->email;
            $usuario= $a->usuario;
            $password= $a->passwordrespaldo;
        }
      if(!empty($email)){
        try{
          $pass=Crypt::decryptString($password);
          $correo=new OlvidoContrasenaMailable($email,$usuario,$pass);
          Mail::to($email)->send($correo);
        }catch(exception  $e){
        return "1";
        }
       
      }
        return view('auth.confirmacioncontrasena');
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
    public function update (Request $request, $id)
    {
  // 
 }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
//
    }

}
