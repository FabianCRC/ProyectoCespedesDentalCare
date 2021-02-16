@extends('layout')
<!--Hereda la navegacion-->
@section('Contenido')
    <div class="form-group text-center">
        <a class="btn btn-secondary " href="{{ route('Servicios.create') }}">
            Registrar Servicio
        </a>
    </div>
    <div class="form-group text-center">
        <h1>Lista de Servicios</h1>
    </div>

    <div class="container-fluid row">
        <div class="col-lg-12">
            <table class="table table-striped table-inverse">
                <thead class="thead-inverse">
                    <tr>
                        <th>Nombre del Servicio</th>
                        <th>Descripcion</th>
                        <th>Valor</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($servicios as $servicio)

                        @csrf
                        <tr>
                            <td>{{ $servicio->nombre_Servicio }}</td>
                            <td>{{ $servicio->descripcion_Servicio }}</td>
                            <td>{{ $servicio->precio_Servicio }}</td>
                            <td>
                                <div class="row">
                                    <a class="btn btn-secondary "
                                        href="{{ route('Servicios.edit', $servicio->id_Servicio) }}">
                                        Editar
                                    </a>
                                    <form action="{{ route('Servicios.destroy', $servicio->id_Servicio) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit" title="delete">
                                            Eliminar
                                        </button>
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
