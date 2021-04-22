@extends('layout')
<!--Hereda la navegacion-->
@section('Contenido')
    <div class="card mb-5 shadow-sm border-0 shadow-hover">
        <div class="card-header bg-light border-0 pt-3 pb-0">
            <form action="{{ route('Perfil.update', Auth::user()->id) }}" method="post" enctype="multipart/form-data">
                <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                @if ($errors->any())
                    <script>
                        swal({
                            title: "Cuidado",
                            text: "Hay un error en los campos solicitados, por favor verifique los campos.",
                            icon: "warning",
                        });

                    </script>
                @endif
                @method('PATCH')
                @csrf
                <div class="text-center mt-3">
                    <img src='{{ asset('storage') . '/' . Auth::user()->imagen }}' class="img-fluid rounded-circle avatar"
                        style="height: 200px; width: 200px;" alt="Imagen" />
                    <br />
                    <h2 class="text-center">Editar Perfil </h2>
                    <br />
                </div>
                <div class="form-row">

                    <div class="form-group col-md-6">
                        <div class="form-group">
                            <label for="usuario" class="inputAddress">{{ 'Usuario' }}</label>
                            <input type="text" class="form-control @error('usuario') is-invalid @enderror" name="usuario"
                                id="usuario" value="{{ Auth::user()->usuario }}" required autocomplete="usuario"
                                autofocus>

                            @error('usuario')
                                <div class="form-group">
                                    <p style="color:red;"> {{ $message }}</p>
                                </div>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group col-md-6">
                        <div class="form-group">
                            <label for="name" class="inputAddress">{{ 'Nombre del usuario' }}</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                id="name" value="{{ Auth::user()->name }}" required autocomplete="name" autofocus>

                            @error('name')
                                <div class="form-group">
                                    <p style="color:red;"> {{ $message }}</p>
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group col-md-6">
                        <div class="form-group">
                            <label for="apellido" class="inputAddress">{{ 'Apellido del usuario' }}</label>
                            <input type="text" class="form-control @error('apellido') is-invalid @enderror" name="apellido"
                                id="apellido" value="{{ Auth::user()->apellido }}" required autocomplete="apellido"
                                autofocus>
                            @error('apellido')
                                <div class="form-group">
                                    <p style="color:red;"> {{ $message }}</p>
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group col-md-6">
                        <div class="form-group">
                            <label for="cedula" class="inputAddress">{{ 'Cedula del usuario' }}</label>
                            <input type="text" class="form-control @error('cedula') is-invalid @enderror" name="cedula"
                                id="cedula" value="{{ Auth::user()->cedula }}" required autocomplete="cedula" autofocus>

                            @error('cedula')
                                <div class="form-group">
                                    <p style="color:red;"> {{ $message }}</p>
                                </div>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group col-md-6">
                        <div class="form-group">
                            <label for="imagen" class="inputAddress">{{ 'Imagen del usuario' }}</label>


                            <input type="file" class="form-control @error('imagen') is-invalid @enderror" name="imagen"
                                id="imagen" value="" autocomplete="imagen" autofocus>

                            @error('imagen')
                                <div class="form-group">
                                    <p style="color:red;"> {{ $message }}</p>
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group col-md-6">
                        <div class="form-group">
                            <label for="telefono" class="inputAddress">{{ 'Telefono del usuario' }}</label>
                            <input type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono"
                                id="telefono" value="{{ Auth::user()->telefono }}" required autocomplete="telefono"
                                autofocus>

                            @error('telefono')
                                <div class="form-group">
                                    <p style="color:red;"> {{ $message }}</p>
                                </div>
                            @enderror
                        </div>
                    </div>




                    <div class="form-group col-md-6">
                        <div class="form-group">
                            <label for="email" class="inputAddress">{{ 'Email del usuario' }}</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                id="email" value="{{ Auth::user()->email }}" required autocomplete="email" autofocus>

                            @error('email')
                                <div class="form-group">
                                    <p style="color:red;"> {{ $message }}</p>
                                </div>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group col-md-6">
                        <div class="form-group">
                            <label for="password" class="inputAddress">{{ 'Contraseña del usuario' }}</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                name="password" id="password" value="{{ Auth::user()->password }}" required
                                autocomplete="password" autofocus>
                            <input hidden="" type="password" class="form-control @error('password') is-invalid @enderror"
                                name="passwordO" id="passwordO" value="{{ Auth::user()->password }}" required
                                autocomplete="password" autofocus>

                            @error('password')
                                <div class="form-group">
                                    <p style="color:red;"> {{ $message }}</p>
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <button type="submit" value="Editar" onclick="return confirm('¿Desea modificar su perfil?');"
                            class="btn btn-secondary btn-block">
                            {{ __('Guardar Cambios') }}
                        </button>

                    </div>
                </div>
            </form>
        </div>
    </div>


@endsection
