@extends('layout')
<!--Hereda la navegacion-->
@section('Contenido')
    <div class="container">
        <div class="form-group text-center">
            <h1>Lista de Citas</h1>
        </div>
        <div class="form-group ml-3">
            <a class="btn btn-secondary " href="{{ route('Citas.create') }}">
                Agregar Cita
            </a>
        </div>
        <div class="col-xl-15 col-lg-12">

            <table class="table table-responsive table-striped table-inverse" id="citas">

                <thead>
                    <tr>
                        <th scope="col"><small class="font-weight-bold">#</small></th>
                        <th scope="col"><small class="font-weight-bold">Id Paciente</small></th>
                        <th scope="col"><small class="font-weight-bold">Paciente</small></th>
                        <th scope="col"><small class="font-weight-bold">Descripcion Cita</small></th>
                        <th scope="col"><small class="font-weight-bold">Inicio Cita</small></th>
                        <th scope="col"><small class="font-weight-bold">Fin Cita</small></th>
                        <th scope="col"><small class="font-weight-bold">Agendado por</small></th>
                        <th scope="col"><small class="font-weight-bold">Monto</small></th>
                        <th scope="col"><small class="font-weight-bold">Abono</small></th>
                        <th scope="col"><small class="font-weight-bold">Saldo</small></th>


                    </tr>
                </thead>

                <tbody>
                    @foreach ($citas as $cita)
                        <tr class="shadow-sm">
                            <td class="d-block"><span class="d-block">{{ $loop->iteration }}</span></td>
                            <td><span class="d-block">{{ $cita->id_Paciente }}</span></td>
                            <td><span class="d-block">
                                    @foreach ($pacientes as $paciente)
                                        @if ($cita->id_Paciente == $paciente->id_Paciente)
                                            {{ $paciente->nombre_Paciente }}
                                        @endif
                                    @endforeach
                                </span></td>
                            <td><span class="d-block">{{ $cita->descripcion_Cita }}</span></td>
                            <td><span class="d-block">{{ $cita->inicio_Cita }}</span></td>
                            <td><span class="d-block">{{ $cita->final_Cita }}</span></td>
                            <td><span class="d-block">
                                    @foreach ($odontologos as $odontologo)
                                        @if ($cita->id_Usuario == $odontologo->id)
                                            {{ $odontologo->name }} {{ $odontologo->apellido }}
                                        @endif
                                    @endforeach
                                </span></td>
                            <td><span class="d-block">{{ $cita->monto }}</span></td>
                            <td><span class="d-block">{{ $cita->abono }}</span></td>
                            <td><span class="d-block">{{ $cita->saldo }}</span></td>
                            <td>
                                <a href="{{ route('Citas.edit', $cita->id_Cita) }}" title="show">
                                    <i style="color:gray" class="far fa-edit fa-lg fa-2x "></i>
                                </a>
                            </td>
                            <td>
                                <form method="post" action="{{ route('Citas.destroy', $cita->id_Cita) }}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" onclick="return confirm('¿Desea borrar esta Cita?');"><i
                                            style="color: red" class="far fa-trash-alt fa-2x"></i></button>

                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>


@endsection
