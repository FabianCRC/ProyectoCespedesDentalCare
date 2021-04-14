@extends('layout')
<!--Hereda la navegacion-->
@section('Contenido')
    <div class="container">
        <div class="form-group text-center">
            <h1>Lista de Citas Solicitadas en la Pagina Web</h1>
        </div>
 


        <div class="col-xl-15 col-lg-12">

            <table class="table table-responsive-xl table-striped table-inverse datatable" id="citas">

                <thead>
                    <tr>
                        <th scope="col"><small class="font-weight-bold">#</small></th>
                        <th scope="col"><small class="font-weight-bold">Paciente</small></th>
                        <th scope="col"><small class="font-weight-bold">Numero</small></th>
                        <th scope="col"><small class="font-weight-bold">Fecha Cita</small></th>
                        <th scope="col"><small class="font-weight-bold">Descripcion</small></th>
                        <th scope="col"><small class="font-weight-bold">Tipo de Paciente</small></th>
                        <th scope="col"><small class="font-weight-bold">Agendar Cita</small></th>
                        <th scope="col"><small class="font-weight-bold">Eliminar Cita</small></th>



                    </tr>
                </thead>

                <tbody>
                    @foreach ($citas as $cita)
                        <tr class="shadow-sm">
                            <td class="d-block"><span class="d-block">{{ $loop->iteration }}</span></td>
                            <td><span class="d-block">{{ $cita->nombre }}</span></td>
                            <td><span class="d-block">{{ $cita->numero}}</span></td>
                            <td><span class="d-block">
                                    <?php
                                    $date = new DateTime($cita->fecha);
                                    echo $date->format('d/m/Y H:i');
                                    ?></span></td>     
                            <td><span class="d-block">{{ $cita->descripcion }}</span></td>
                            <td><span class="d-block">{{ $cita->tipoPaciente }}</span></td>
                                <td>
                                    <div class="row justify-content-center">

                                        <a href="{{ route('Citas.create') }}" title="show">
                                            <i style="color:gray" class="far fa-edit fa-lg fa-2x "></i>
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <div class="row justify-content-center">

                                        <form method="post" action="{{ route('CitasPagina.destroy', $cita->id) }}">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button  style="background: transparent; border: none" type="submit" onclick="return confirm('¿Desea borrar esta Cita?');"><i
                                                    style="color: red" class="far fa-trash-alt fa-2x"></i></button>

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
