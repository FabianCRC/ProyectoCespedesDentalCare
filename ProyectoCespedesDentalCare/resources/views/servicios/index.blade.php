@extends('layout')
<!--Hereda la navegacion-->
@section('Contenido')
    <div class="form-group text-center">
        <h1>Lista de Servicios</h1>
    </div>
    @if (Auth::user()->idRol == 1 || Auth::user()->idRol == 2)
        <div class="form-group ml-3">
            <a class="btn btn-secondary " href="{{ route('Servicios.create') }}">
                Agregar Servicio
            </a>
        </div>

    @endif
    <div class="container-fluid row">
        <div class="col-lg-12">
            <table class="table table-responsive-xl table-striped table-inverse datatable" id="servicios">
                <thead class="thead-inverse">
                    <tr>
                        <th scope="col"><small class="font-weight-bold">#</small></th>
                        <th>Nombre del Servicio</th>
                        <th>Descripcion</th>
                        <th>Valor</th>
                        @if (Auth::user()->idRol == 1 || Auth::user()->idRol == 2)
                            <th scope="col"><small class="font-weight-bold">Editar</small></th>
                            <th scope="col"><small class="font-weight-bold">Eliminar</small></th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($servicios as $servicio)
                        @csrf
                        <tr>
                            <td class="d-block"><span class="d-block">{{ $loop->iteration }}</span></td>
                            <td>{{ $servicio->nombre_Servicio }}</td>
                            <td>{{ $servicio->descripcion_Servicio }}</td>
                            <td>₡{{ $servicio->precio_Servicio }}</td>

                            @if (Auth::user()->idRol == 1 || Auth::user()->idRol == 2)
                                <td>
                                    <div class="row justify-content-center">
                                        <a onclick="false" href="{{ route('Servicios.edit', $servicio->id_Servicio) }}">
                                            <i style="color:gray" class="far fa-edit fa-lg fa-2x  "></i>
                                        </a>
                                    </div>

                                </td>
                                <td>
                                    <div class="row justify-content-center">

                                        <form action="{{ route('Servicios.destroy', $servicio->id_Servicio) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button style="background: transparent; border: none" type="submit" title="delete"
                                                onclick="return confirm('¿Desea borrar este servicio?');">
                                                <i style="color: red" class="far fa-trash-alt fa-2x"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
