@extends('layout')
<!--Hereda la navegacion-->
@section('Contenido')
    <div class="col-lg-12">
        <div class="card mb-5 shadow-sm border-0 shadow-hover">
            <div class="card-header bg-light border-0 pt-3 pb-0">
                <br>
                <h1 style="text-align: center">Registrar Usuario</h1>
                <br>
                <form action="{{ route('Usuarios.store') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @csrf

                    <div class="form-row">


                        <div class="form-group col-md-6">
                            <div class="form-group">
                                <label for="usuario" class="inputAddress">{{ __('Usuario') }}</label>
                                <input id="usuario" type="text" class="form-control @error('usuario') is-invalid @enderror"
                                    name="usuario" value="{{ old('usuario') }}" required autocomplete="usuario" autofocus>
                                @error('usuario')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <div class="form-group"> <label for="email"
                                    class="inputAddress">{{ 'Email del usuario' }}</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                    id="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <div class="form-group"> <label for="name"
                                    class="inputAddress">{{ 'Nombre del usuario' }}</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                    id="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group col-md-6">
                            <div class="form-group"> <label for="apellido"
                                    class="inputAddress">{{ 'Apellido del usuario' }}</label>
                                <input type="text" class="form-control @error('apellido') is-invalid @enderror"
                                    name="apellido" id="apellido" value="{{ old('apellido') }}" required
                                    autocomplete="apellido" autofocus>

                                @error('apellido')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group col-md-6">
                            <div class="form-group"> <label for="cedula"
                                    class="inputAddress">{{ 'Cedula del usuario' }}</label>
                                <input type="text" class="form-control @error('cedula') is-invalid @enderror" name="cedula"
                                    id="cedula" value="{{ old('cedula') }}" required autocomplete="cedula" autofocus>

                                @error('cedula')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="form-group"> <label for="telefono"
                                    class="inputAddress">{{ 'Telefono del usuario' }}</label>
                                <input type="text" class="form-control @error('telefono') is-invalid @enderror"
                                    name="telefono" id="telefono" value="{{ old('telefono') }}" required
                                    autocomplete="telefono" autofocus>

                                @error('telefono')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group col-md-6">
                            <div class="form-group"> <label for="imagen"
                                    class="inputAddress">{{ 'Imagen del usuario' }}</label>
                                <input type="file" class="form-control @error('imagen') is-invalid @enderror" name="imagen"
                                    id="imagen" value="{{ old('imagen') }}" required autocomplete="imagen" autofocus>

                                @error('imagen')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
         
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Rol</label>
                            <select name="idRol" class="form-control" required {{ old('idRol') }}>
                                <option value="" disabled selected>Seleccione una opción</option>
                                @foreach ($roles as $rol)
                                    <option value="{{ $rol->id_Rol }}">
                                        {{ $rol->nombre_Rol }}</option>
                                @endforeach
                            </select>

                        </div>
                      
                        <div class="form-group col-md-6">
                            <div class="form-group"> <label for="password"
                                    class="inputAddress">{{ 'Contraseña del usuario' }}</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    name="password" id="password" value="{{ old('password') }}" required
                                    autocomplete="password" autofocus>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group col-md-12">
                            <button type="submit" value="Agregar" class="btn btn-secondary btn-block">
                                {{ __('Registrar') }}
                            </button>
                            < </div>
                        </div>
                </form>

            </div>
        </div>
    </div>

@endsection
