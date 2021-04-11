@extends('layout')
@section('Contenido')
    <div class="container">
        <div class="container">
            <div class="form-group text-center">
                <h1>Auditoria de citas</h1>
            </div>
            <div class="col-xl-15 col-lg-12">
                <table class="table table-responsive-xl table-striped table-inverse" id="citas">
                    <thead>
                        <tr>
                            <th scope="col"><small class="font-weight-bold">#</small></th>
                            <th scope="col"><small class="font-weight-bold">Fecha</small></th>
                            <th scope="col"><small class="font-weight-bold">Accion</small></th>
                            <th scope="col"><small class="font-weight-bold">ID Paciente</small></th>
                            <th scope="col"><small class="font-weight-bold">ID Odontologo</small></th>
                            <th scope="col"><small class="font-weight-bold">Inicio Cita</small></th>
                            <th scope="col"><small class="font-weight-bold">Fin Cita</small></th>
                            <th scope="col"><small class="font-weight-bold">Monto</small></th>
                            <th scope="col"><small class="font-weight-bold">Abono</small></th>
                            <th scope="col"><small class="font-weight-bold">Saldo</small></th>
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
                                        @if ($registro->id_Usuario_nuevo == $registro->id_Usuario_viejo)
                                            No hubo cambio
                                        @else
                                            {{ $registro->id_Usuario_nuevo }} ->{{ $registro->id_Usuario_viejo }}
                                        @endif
                                    </span></td>
                                <td><span class="d-block">
                                        @if ($registro->inicio_Cita_nuevo == $registro->inicio_Cita_viejo)
                                            No hubo cambio
                                        @else
                                            <?php
                                            $date = new DateTime($registro->inicio_Cita_nuevo);
                                            echo $date->format('d/m/Y H:i');
                                            ?> -> <?php
                                            $date = new DateTime($registro->inicio_Cita_viejo);
                                            echo $date->format('d/m/Y H:i');
                                            ?>
                                        @endif
                                    </span></td>
                                <td><span class="d-block">
                                        @if ($registro->final_Cita_nuevo == $registro->final_Cita_viejo)
                                            No hubo cambio
                                        @else
                                        <?php
                                        $date = new DateTime($registro->final_Cita_nuevo);
                                        echo $date->format('d/m/Y H:i');
                                        ?> -> <?php
                                        $date = new DateTime($registro->final_Cita_viejo);
                                        echo $date->format('d/m/Y H:i');
                                        ?>
                                        @endif
                                    </span></td>
                                <td><span class="d-block">
                                        @if ($registro->monto_nuevo == $registro->monto_viejo)
                                            No hubo cambio
                                        @else
                                            {{ $registro->monto_nuevo }} ->{{ $registro->monto_viejo }}
                                        @endif
                                    </span></td>
                                <td><span class="d-block">
                                        @if ($registro->abono_nuevo == $registro->abono_viejo)
                                            No hubo cambio
                                        @else
                                            {{ $registro->abono_nuevo }} ->{{ $registro->abono_viejo }}
                                        @endif
                                    </span></td>
                                <td><span class="d-block">
                                <td><span class="d-block">
                                        @if ($registro->saldo_nuevo == $registro->saldo_viejo)
                                            No hubo cambio
                                        @else
                                            {{ $registro->saldo_nuevo }} ->{{ $registro->saldo_viejo }}
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
