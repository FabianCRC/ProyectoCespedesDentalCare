@extends('layout')
<!--Hereda la navegacion-->
@section('Contenido')
    <div class="card mb-5 shadow-sm border-0 shadow-hover">
        <div class="card-header bg-light border-0 pt-3 pb-0">
            <form action="{{ route('Usuarios.update', $users->id) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                {{ csrf_field() }}
                @csrf
                <div class="text-center mt-3">
                    <img src='{{ asset('storage') . '/' . $users->imagen }}' class="img-fluid rounded-circle avatar"
                        style="height: 200px; width: 200px;" alt="Imagen" />
                    <br />
                    <h2 class="text-center">Informacion de:{{ $users->usuario }} </h2>
                    <br />
                </div>
                <div class="form-row">

                    <div class="form-group col-md-6">
                        <div class="form-group">
                            <label for="usuario" class="inputAddress">{{ 'Usuario' }}</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="usuario"
                                id="usuario" value="{{ $users->usuario }}">

                            @error('usuario')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group col-md-6">
                        <div class="form-group">
                            <label for="name" class="inputAddress">{{ 'Nombre del usuario' }}</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                id="name" value="{{ $users->name }}">

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group col-md-6">
                        <div class="form-group">
                            <label for="apellido" class="inputAddress">{{ 'Apellido del usuario' }}</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="apellido"
                                id="apellido" value="{{ $users->apellido }}">

                            @error('apellido')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group col-md-6">
                        <div class="form-group">
                            <label for="cedula" class="inputAddress">{{ 'Cedula del usuario' }}</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="cedula"
                                id="cedula" value="{{ $users->cedula }}">

                            @error('cedula')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group col-md-6">
                        <div class="form-group">
                            <label for="imagen" class="inputAddress">{{ 'imagen del usuario' }}</label>

                           
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
                        <div class="form-group">
                            <label for="telefono" class="inputAddress">{{ 'Telefono del usuario' }}</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="telefono"
                                id="telefono" value="{{ $users->telefono }}">

                            @error('telefono')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group col-md-6">
                        <div class="form-group">
                            <label for="idRol" class="inputAddress">{{ 'Rol del usuario' }}</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="idRol"
                                id="idRol" value="{{ $users->idRol }}">

                            @error('idRol')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group col-md-6">
                        <div class="form-group">
                            <label for="email" class="inputAddress">{{ 'Email del usuario' }}</label>
                            <input type="email" class="form-control @error('name') is-invalid @enderror" name="email"
                                id="email" value="{{ $users->email }}">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group col-md-6">
                        <div class="form-group">
                            <label for="password" class="inputAddress">{{ 'Contraseña del usuario' }}</label>
                            <input type="password" class="form-control @error('name') is-invalid @enderror" name="password"
                                id="password" value="{{ $users->password }}">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>



                    <div class="form-group col-md-12">
                        <button type="submit" value="Editar" class="btn btn-secondary btn-block">
                            {{ __('Editar') }}
                        </button>

                    </div>
                </div>
            </form>
        </div>
    </div>


@endsection
