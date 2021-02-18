@extends('layout')
<!--Hereda la navegacion-->
@section('Contenido')
    <div class="container">
        <div class="form-group ml-3">
            <a class="btn btn-secondary " href="{{ route('Usuarios.create') }}">
                Agregar Usuario
            </a>
        </div>
        <div class="col-xl-15 col-lg-12">

            <table class="table table-responsive table-striped table-inverse" id="usuarios">

                <thead class="thead-light">
                    <tr>
                        <th scope="col"><small class="font-weight-bold">#</small></th>
                        <th scope="col"><small class="font-weight-bold">Imagen</small></th>
                        <th scope="col"><small class="font-weight-bold">Usuario</small></th>
                        <th scope="col"><small class="font-weight-bold">Nombre</small></th>
                        <th scope="col"><small class="font-weight-bold">Apellido</small></th>
                        <th scope="col"><small class="font-weight-bold">Cedula</small></th>
                        <th scope="col"><small class="font-weight-bold">Telefono</small></th>
                        <th scope="col"><small class="font-weight-bold">Email</small></th>
                        <th scope="col"><small class="font-weight-bold">Acciones</small></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($registros as $registro)
                        <tr>
                            <td><span class="d-block">{{ $loop->iteration }}</span></td>
                            <td>
                                <img src="{{ asset('storage') . '/' . $registro->imagen }}" alt="Imagen"
                                    class="img-fluid rounded-circle avatar">
                            </td>
                            <td><span class="d-block">{{ $registro->usuario }}</span></td>
                            <td><span class="d-block">{{ $registro->name }}</span></td>
                            <td><span class="d-block">{{ $registro->apellido }}</span></td>
                            <td><span class="d-block">{{ $registro->cedula }}</span></td>

                            <td><span class="d-block">{{ $registro->telefono }}</span></td>
                            <td><span class="d-block">{{ $registro->email }}</span></td>
                            <td>
                                <div class="row">

                                    <a class="btn btn-secondary" href="{{ route('Usuarios.edit', $registro->id) }}">
                                        Editar
                                    </a>

                                    <form method="post" action="{{ route('Usuarios.destroy', $registro->id) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('¿Desea borrar este usuario?');">Borrar</button>

                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


@endsection
