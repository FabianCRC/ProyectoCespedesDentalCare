@extends('layouts.app')

@section('content')
<style>/*Login*/
.main-head{
  height: 150px;
  background: #FFF;
 
}

.sidenav {
  height: 100%;
  background-color: #000;
  overflow-x: hidden;
  padding-top: 20px;
}


.main {
  padding: 0px 10px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
}

@media screen and (max-width: 450px) {
  .login-form{
      margin-top: 10%;
  }

  .register-form{
      margin-top: 10%;
  }
}

@media screen and (min-width: 768px){
  .main{
      margin-left: 40%; 
  }

  .sidenav{
      width: 40%;
      position: fixed;
      z-index: 1;
      top: 56px;
      left: 0;
  }

  .login-form{
      margin-top: 80%;
  }

  .register-form{
      margin-top: 20%;
  }
}


.login-main-text{
  margin-top: 20%;
  padding: 60px;
  color: #fff;
}

.login-main-text h2{
  font-weight: 300;
}

.btn-black{
  background-color: #000 !important;
  color: #fff;
}
/*Fin Login*/
</style>

<div class="sidenav">
         <div class="login-main-text">
            <h2>Céspedes Dental Care<br> Inicio de Sesión</h2>
            <p >Inicie sesión desde aquí para acceder.</p>
            <a  style="color: #ffffff" href="{{ url('/') }}">Volver a la página web</a>
         </div>
      </div>
      <div class="main">
         <div class="col-md-6 col-sm-12">
            <div class="login-form">
             <form method="POST" action="{{ route('login') }}">
                            @csrf
                  <div class="form-group">
                     <label>Correo Electronico</label>
                      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                  </div>
                  <div class="form-group">
                     <label>Contraseña</label>
                      <input id="password" type="password"
                       class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                  </div>
                  <button type="submit" class="btn btn-black">{{ __('Iniciar Sesión') }}</button>                           
                  <br /><br/>
                  <a class="text-center"  href="{{ Route('RestablecerContrasena.index') }}">¿Olvidaste la contraseña?</a>

                            
               </form>
            </div>
         </div>
      </div>


@endsection
