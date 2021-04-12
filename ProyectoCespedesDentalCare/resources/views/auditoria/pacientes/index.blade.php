@extends('layout')
@section('Contenido')
    <div class="container">
        <div class="container">
            <div class="form-group text-center">
                <h1>Auditoria de Pacientes</h1>
            </div>
            <div class="col-xl-15 col-lg-12">
                <table class="table table-responsive-xl table-striped table-inverse" id="citas">
                    <thead>
                        <tr>
                            <th scope="col"><small class="font-weight-bold">#</small></th>
                            <th scope="col"><small class="font-weight-bold">Fecha</small></th>
                            <th scope="col"><small class="font-weight-bold">Accion</small></th>
                            <th scope="col"><small class="font-weight-bold">ID Paciente</small></th>
                            <th scope="col"><small class="font-weight-bold">Nombre Paciente</small></th>
                            <th scope="col"><small class="font-weight-bold">Observaciones</small></th>
                            <th scope="col"><small class="font-weight-bold">Datos</small></th>
                            <th scope="col"><small class="font-weight-bold">Imagen</small></th>
                            <th scope="col"><small class="font-weight-bold">Dentista</small></th>
                            <th scope="col"><small class="font-weight-bold">Usuario</small></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($registros as $registro)
                            <tr class="shadow-sm">
                                <td class="d-block"><span class="d-block">{{ $loop->iteration }}</span></td>
                                <td><span class="d-block"> <?php
                                        $date = new DateTime($registro->fecha);
                                        echo $date->format('d/m/Y H:i');
                                        ?></span></td></span></td>
                                <td><span class="d-block"> {{ $registro->accion }}</span></td>
                                <td><span class="d-block">
                                        @if ($registro->id_Paciente_nuevo == $registro->id_Paciente_viejo)
                                            No hubo cambio
                                        @else
                                            {{ $registro->id_Paciente_nuevo }} ->{{ $registro->id_Paciente_viejo }}
                                        @endif
                                    </span></td>
                                <td><span class="d-block">
                                        @if ($registro->nombre_Paciente_nuevo == $registro->nombre_Paciente_viejo)
                                            No hubo cambio
                                        @else
                                            {{ $registro->nombre_Paciente_nuevo }}
                                            ->{{ $registro->nombre_Paciente_viejo }}
                                        @endif
                                    </span></td>
                                <td><span class="d-block">
                                        @if ($registro->observaciones_Paciente_nuevo == $registro->observaciones_Paciente_viejo)
                                            No hubo cambio
                                        @else
                                            {{ $registro->observaciones_Paciente_nuevo }}
                                            ->{{ $registro->observaciones_Paciente_viejo }}
                                        @endif
                                    </span></td>
                                <td><span class="d-block">
                                        @if ($registro->datos_Paciente_nuevo == $registro->datos_Paciente_viejo)
                                            No hubo cambio
                                        @else
                                            {{ $registro->datos_Paciente_nuevo }}
                                            ->{{ $registro->datos_Paciente_viejo }}
                                        @endif
                                    </span></td>
                                <td><span class="d-block">
                                        @if ($registro->imagen_Paciente_nuevo == $registro->imagen_Paciente_viejo)
                                            No hubo cambio
                                        @else
                                            Se ha actualizado la imagen
                                        @endif
                                    </span></td>
                                <td><span class="d-block">
                                        @if ($registro->dentista_Paciente_nuevo == $registro->dentista_Paciente_viejo)
                                            No hubo cambio
                                        @else
                                            {{ $registro->dentista_Paciente_nuevo }}
                                            ->{{ $registro->dentista_Paciente_viejo }}
                                        @endif
                                    </span></td>
                                <td><span class="d-block">
                                        {{ $registro->usuario }}
                                    </span></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endsection
