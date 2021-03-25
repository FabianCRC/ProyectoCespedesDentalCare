@extends('layout')
<!--Hereda la navegacion-->
@section('Contenido')
    <div class="card mb-5 shadow-sm border-0 shadow-hover">
        <div class="card-header bg-light border-0 pt-3 pb-0">
            <form action="{{ route('Usuarios.update', $users->id) }}" method="post" enctype="multipart/form-data">
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
                            <input type="text" class="form-control @error('usuario') is-invalid @enderror" name="usuario"
                                id="usuario" value="{{ $users->usuario }}" required autocomplete="usuario" autofocus>

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
                            <label for="name" class="inputAddress">{{ 'Nombre del usuario' }}</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                id="name" value="{{ $users->name }}" required autocomplete="name" autofocus>

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
                        <div class="form-group">
                            <label for="apellido" class="inputAddress">{{ 'Apellido del usuario' }}</label>
                            <input type="text" class="form-control @error('apellido') is-invalid @enderror" name="apellido"
                                id="apellido" value="{{ $users->apellido }}" required autocomplete="apellido" autofocus>
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
                        <div class="form-group">
                            <label for="cedula" class="inputAddress">{{ 'Cedula del usuario' }}</label>
                            <input type="text" class="form-control @error('cedula') is-invalid @enderror" name="cedula"
                                id="cedula" value="{{ $users->cedula }}" required autocomplete="cedula" autofocus>
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
                        <div class="form-group">
                            <label for="imagen" class="inputAddress">{{ 'Imagen del usuario' }}</label>
                            <input type="file" class="form-control @error('imagen') is-invalid @enderror" name="imagen"
                                id="imagen" value="" autocomplete="imagen" autofocus>

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
                        <div class="form-group">
                            <label for="telefono" class="inputAddress">{{ 'Telefono del usuario' }}</label>
                            <input type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono"
                                id="telefono" value="{{ $users->telefono }}" required autocomplete="telefono" autofocus>

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
                        <div class="form-group">
                            <label for="email" class="inputAddress">{{ 'Email del usuario' }}</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                id="email" value="{{ $users->email }}" required autocomplete="email" autofocus>

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
                        <div class="form-group">
                            <label for="password" class="inputAddress">{{ 'Contraseña del usuario' }}</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                name="password" id="password" value="{{ $users->password }}" required
                                autocomplete="password" autofocus>
                                <input type="password"
                                name="passwordO" id="passwordO" value="{{ $users->password }}" hidden
                               >

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
                        <button type="submit" value="Editar" onclick="return confirm('¿Desea modificar el usuario?');" class="btn btn-secondary btn-block">
                            {{ __('Guardar Cambios') }}
                        </button>

                    </div>
                </div>
            </form>
        </div>
    </div>


@endsection
