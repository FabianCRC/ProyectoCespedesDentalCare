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
                                <input id="usuario" type="text" class="form-control" name="usuario"
                                    value="{{ old('usuario') }}" required autocomplete="usuario" autofocus>
                                @if ($errors->any())
                                    @if ($errors->has('usuario'))
                                        <div class="alert alert-danger mt-1" role="alert">
                                            {{ $errors->first('usuario') }}
                                        </div>
                                    @endif
                                @endif
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <div class="form-group">
                                <label for="email" class="inputAddress">{{ 'Email del usuario' }}</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required
                                    autocomplete="email" autofocus>

                                @if ($errors->any())
                                    @if ($errors->has('email'))
                                        <div class="alert alert-danger mt-1" role="alert">
                                            {{ $errors->first('email') }}
                                        </div>
                                    @endif
                                @endif
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <div class="form-group"> <label for="name"
                                    class="inputAddress">{{ 'Nombre del usuario' }}</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required
                                    autocomplete="name" autofocus>

                                @if ($errors->any())
                                    @if ($errors->has('name'))
                                        <div class="alert alert-danger mt-1" role="alert">
                                            {{ $errors->first('name') }}
                                        </div>
                                    @endif
                                @endif
                            </div>
                        </div>


                        <div class="form-group col-md-6">
                            <div class="form-group"> <label for="apellido"
                                    class="inputAddress">{{ 'Apellido del usuario' }}</label>
                                <input type="text" class="form-control" name="apellido" id="apellido"
                                    value="{{ old('apellido') }}" required autocomplete="apellido" autofocus>

                                @if ($errors->any())
                                    @if ($errors->has('apellido'))
                                        <div class="alert alert-danger mt-1" role="alert">
                                            {{ $errors->first('apellido') }}
                                        </div>
                                    @endif
                                @endif
                            </div>
                        </div>


                        <div class="form-group col-md-6">
                            <div class="form-group"> <label for="cedula"
                                    class="inputAddress">{{ 'Cedula del usuario' }}</label>
                                <input type="text" class="form-control @error('cedula') is-invalid @enderror" name="cedula"
                                    id="cedula" value="{{ old('cedula') }}" required autocomplete="cedula" autofocus>

                                @if ($errors->any())
                                    @if ($errors->has('cedula'))
                                        <div class="alert alert-danger mt-1" role="alert">
                                            {{ $errors->first('cedula') }}
                                        </div>
                                    @endif
                                @endif
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="form-group"> <label for="telefono"
                                    class="inputAddress">{{ 'Telefono del usuario' }}</label>
                                <input type="text" class="form-control" name="telefono" id="telefono"
                                    value="{{ old('telefono') }}" required autocomplete="telefono" autofocus>

                                @if ($errors->any())
                                    @if ($errors->has('telefono'))
                                        <div class="alert alert-danger mt-1" role="alert">
                                            {{ $errors->first('telefono') }}
                                        </div>
                                    @endif
                                @endif
                            </div>
                        </div>


                        <div class="form-group col-md-6">
                            <div class="form-group"> <label for="imagen"
                                    class="inputAddress">{{ 'Imagen del usuario' }}</label>
                                <input type="file" class="form-control @error('imagen') is-invalid @enderror" name="imagen"
                                    id="imagen" value="{{ old('imagen') }}" required autocomplete="imagen" autofocus>

                                @if ($errors->any())
                                    @if ($errors->has('imagen'))
                                        <div class="alert alert-danger mt-1" role="alert">
                                            {{ $errors->first('imagen') }}
                                        </div>
                                    @endif
                                @endif
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
                            @if ($errors->any())
                                @if ($errors->has('idRol'))
                                    <div class="alert alert-danger mt-1" role="alert">
                                        {{ $errors->first('idRol') }}
                                    </div>
                                @endif
                            @endif

                        </div>

                        <div class="form-group col-md-6">
                            <div class="form-group"> <label for="password"
                                    class="inputAddress">{{ 'Contraseña del usuario' }}</label>
                                <input type="password" class="form-control" name="password" id="password"
                                    value="{{ old('password') }}" required autocomplete="password" autofocus>

                                @if ($errors->any())
                                    @if ($errors->has('password'))
                                        <div class="alert alert-danger mt-1" role="alert">
                                            {{ $errors->first('password') }}
                                        </div>
                                    @endif
                                @endif
                            </div>
                        </div>

                        <div class="form-group col-md-12">
                            <button type="submit" value="Agregar" class="btn btn-secondary btn-block">
                                {{ __('Registrar') }}
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

@endsection
