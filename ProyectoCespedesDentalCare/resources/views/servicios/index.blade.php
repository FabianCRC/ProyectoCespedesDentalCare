@extends('layout')
<!--Hereda la navegacion-->
@section('Contenido')
    <div class="form-group text-center">
        <h1>Lista de Servicios</h1>
    </div>
    
    <div class="form-group ml-3">
        <a class="btn btn-secondary " href="{{ route('Servicios.create') }}">
            Agregar Servicio
        </a>
    </div>


    <div class="container-fluid row">
        <div class="col-lg-12">
            <table class="table table-striped table-inverse" id="servicios">
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
                                    <a
                                        href="{{ route('Servicios.edit', $servicio->id_Servicio) }}">
                                        <i style="color:gray" class="far fa-edit fa-lg fa-2x ml-5 "></i>
                                    </a>
                                    <form action="{{ route('Servicios.destroy', $servicio->id_Servicio) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button  type="submit" title="delete"   onclick="return confirm('¿Desea borrar este servicio?');">
                                            <i style="color: red" class="far fa-trash-alt fa-2x"></i>
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
