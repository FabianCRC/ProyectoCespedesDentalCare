@extends('layout')
<!--Hereda la navegacion-->
@section('Contenido')
    <div class="card mb-5 shadow-sm border-0 shadow-hover">
        <div class="card-header bg-light border-0 pt-3 pb-0">
            <form action="{{ route('Usuarios.update', $users->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                @csrf
                <div class="text-center mt-3">
                    <img src='{{ asset('storage') . '/' . $users->imagen }}' class="img-fluid rounded-circle avatar"
                        style="height: 200px; width: 200px;" alt="Imagen" />
                    <br />
                    <h2 class="text-center">Informacion de {{ $users->usuario }} </h2>
                    <br />
                </div>
                <div class="form-row">

                    <div class="form-group col-md-6">
                        <div class="form-group">
                            <label for="usuario" class="inputAddress">{{ 'Usuario' }}</label>
                            <input  type="text" class="form-control @error('usuario') is-invalid @enderror" name="usuario"
                                id="usuario" value="{{ $users->usuario }}" required autocomplete="usuario" autofocus>

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
                                id="name" value="{{ $users->name }}" required autocomplete="name" autofocus>

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
                            <input type="text" class="form-control @error('apellido') is-invalid @enderror" name="apellido"
                                id="apellido" value="{{ $users->apellido }}" required autocomplete="apellido" autofocus>
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
                            <input type="text" class="form-control @error('cedula') is-invalid @enderror" name="cedula"
                                id="cedula" value="{{ $users->cedula }}" required autocomplete="cedula" autofocus>

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


                            <input type="file" class="form-control @error('imagen') is-invalid @enderror" name="imagen"
                                id="imagen" value="" autocomplete="imagen" autofocus>

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
                            <input type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono"
                                id="telefono" value="{{ $users->telefono }}" required autocomplete="telefono" autofocus>

                            @error('telefono')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>




                    <div class="form-group col-md-6">
                        <div class="form-group">
                            <label for="email" class="inputAddress">{{ 'Email del usuario' }}</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                id="email" value="{{ $users->email }}" required autocomplete="email" autofocus>

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
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                                id="password" value="{{ $users->password }}" required autocomplete="password" autofocus>

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>



                    <div class="form-group col-md-12">
                        <button type="submit" value="Editar" class="btn btn-secondary btn-block">
                            {{ __('Guardar Cambios') }}
                        </button>

                    </div>
                </div>
            </form>
        </div>
    </div>


@endsection
