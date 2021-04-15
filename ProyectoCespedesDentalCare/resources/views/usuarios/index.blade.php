@extends('layout')
<!--Hereda la navegacion-->
@section('Contenido')
    <div class="container">
        <div class="form-group text-center">
            <h1>Lista de Usuarios</h1>
        </div>

        <div class="form-group ml-3">
            <a class="btn btn-secondary " href="{{ route('Usuarios.create') }}">
                Agregar Usuario
            </a>
        </div>
        <div class="col-12">
            @if ($errors->has('msj'))
                <div class="form-group">
                    <p style="color:red;"> {{ $errors->first('msj') }}</p>
                </div>
            @endif
        </div>
        <div class="col-xl-15 col-lg-12">

            <table class="table table-responsive-xl table-striped table-inverse datatable" id="usuarios">

                <thead>
                    <tr>
                        <th scope="col"><small class="font-weight-bold">#</small></th>
                        <th scope="col"><small class="font-weight-bold">Imagen</small></th>
                        <th scope="col"><small class="font-weight-bold">Usuario</small></th>
                        <th scope="col"><small class="font-weight-bold">Nombre</small></th>
                        <th scope="col"><small class="font-weight-bold">Apellido</small></th>
                        <th scope="col"><small class="font-weight-bold">Cedula</small></th>
                        <th scope="col"><small class="font-weight-bold">Rol</small></th>
                        <th scope="col"><small class="font-weight-bold">Telefono</small></th>
                        <th scope="col"><small class="font-weight-bold">Email</small></th>
                        <th scope="col"><small class="font-weight-bold">Editar</small></th>
                        <th scope="col"><small class="font-weight-bold">Eliminar</small></th>


                    </tr>
                </thead>

                <tbody>
                    @foreach ($registros as $registro)
                        <tr class="shadow-sm">
                            <td class="d-block"><span class="d-block">{{ $loop->iteration }}</span></td>
                            <td><img src="{{ asset('storage') . '/' . $registro->imagen }}"
                                    class="img-fluid rounded-circle avatar" alt="Imagen" style="height: 80px;width: 80px" />
                            </td>
                            <td><span class="d-block">{{ $registro->usuario }}</span></td>
                            <td><span class="d-block">{{ $registro->name }}</span></td>
                            <td><span class="d-block">{{ $registro->apellido }}</span></td>
                            <td><span class="d-block">{{ $registro->cedula }}</span></td>
                            <td><span class="d-block">
                                    @foreach ($roles as $rol)
                                        @if ($rol->id_Rol == $registro->idRol)
                                            {{ $rol->nombre_Rol }}
                                        @endif
                                    @endforeach
                                </span></td>
                            <td><span class="d-block">{{ $registro->telefono }}</span></td>
                            <td><span class="d-block">{{ $registro->email }}</span></td>
                            <td>
                                <a href="{{ route('Usuarios.edit', $registro->id) }}" title="show">
                                    <i style="color:gray" class="far fa-edit fa-lg fa-2x "></i>
                                </a>
                            </td>
                            <td>
                                <form method="post" action="{{ route('Usuarios.destroy', $registro->id) }}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button style="background: transparent; border: none" type="submit"
                                        onclick="return confirm('¿Desea borrar este usuario?');"><i style="color: red"
                                            class="far fa-trash-alt fa-2x"></i></button>

                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>


@endsection
