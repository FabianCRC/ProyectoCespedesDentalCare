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
                                <label for="usuario"
                                    class="inputAddress">{{ 'Usuario' }}</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="usuario"
                                    id="usuario" value="">

                                @error('usuario')
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
                                    id="name" value="">

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
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="apellido"
                                    id="apellido" value="">

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
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="cedula"
                                    id="cedula" value="">

                                @error('cedula')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <div class="form-group"> <label for="imagen"
                                    class="inputAddress">{{ 'Imagen del usuario' }}</label>
                                <input type="file" class="form-control @error('name') is-invalid @enderror" name="imagen"
                                    id="imagen" value="">

                                @error('imagen')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="form-group"> <label for="telefono"
                                    class="inputAddress">{{ 'Telefono del usuario' }}</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="telefono"
                                    id="telefono" value="">

                                @error('telefono')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="form-group"> <label for="idRol"
                                    class="inputAddress">{{ 'Rol del usuario' }}</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="idRol"
                                    id="idRol" value="">

                                @error('telefono')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="form-group"> <label for="email"
                                    class="inputAddress">{{ 'Email del usuario' }}</label>
                                <input type="email" class="form-control @error('name') is-invalid @enderror" name="email"
                                    id="email" value="">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="form-group"> <label for="password"
                                    class="inputAddress">{{ 'Contraseña del usuario' }}</label>
                                <input type="password" class="form-control @error('name') is-invalid @enderror"
                                    name="password" id="password" value="">

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
