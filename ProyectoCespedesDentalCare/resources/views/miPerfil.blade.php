@extends('layout')
<!--Hereda la navegacion-->
@section('Contenido')

    <div>
        <div class="col-lg-12" style=" padding: 79px;">
            <div class="card mb-5 shadow-sm border-0 shadow-hover">
                <div class="card-header bg-light border-0 pt-3 pb-0">
                    <br>
                    <div class="text-center">
                        <h5>Actualizar Perfil</h5>
                    </div>
                    <br>
                    <img style="width: 100px; border-radius: 50%!important;" src='' />
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="form-group col-md-12 col-lg-6">
                                <label for="usuario">Usuario</label>
                                <input type="text" class="form-control" name="usuario" id="usuario" value="{{ Auth::user()->usuario }}">
                            </div>
                            <div class="form-group col-md-12 col-lg-6">
                                <label for="nombre">Email</label>
                                <input type="text" class="form-control" name="email" id="email" value="{{ Auth::user()->email }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12 col-lg-6">
                                <div class="form-group">
                                    <label for="password">Contraseña</label>
                                    <input type="Password" class="form-control" name="password" id="password" value="">
                                </div>
                            </div>
                            <div class="form-group col-md-12 col-lg-6">
                                <label for="telefono">Telefono</label>
                                <input type="text" class="form-control" name="telefono" id="telefono" value="{{ Auth::user()->telefono }}">
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12 col-lg-6">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" name="nombre" id="nombre" value="{{ Auth::user()->name }}">
                            </div>
                            <div class="form-group col-md-12 col-lg-6">
                                <label for="usuario">Apellido</label>
                                <input type="text" class="form-control" name="apellido" id="apellido" value="{{ Auth::user()->apellido }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label>Foto de perfil</label>
                                <input type="file" class="form-control" name="img" value="" />
                            </div>
                        </div>
                        <div class="row mt-3">
                            <button class="btn btn-secondary btn-block" value="">Actualizar Perfil</button>
                        </div>
                        <br>
                    </form>
                </div>
                <br>
            </div>
        </div>
    </div>


@endsection
