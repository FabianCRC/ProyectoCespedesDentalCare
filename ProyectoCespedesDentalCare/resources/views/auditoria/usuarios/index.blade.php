@extends('layout')
@section('Contenido')
    <div class="container">
        <div class="form-group text-center">
            <h1>Auditoria de usuarios</h1>
        </div>
        <div class="col-xl-15 col-lg-12">
            <table class="table table-responsive-xl table-striped table-inverse datatable" id="">
                <thead>
                    <tr>
                        <th scope="col"><small class="font-weight-bold">#</small></th>
                        <th scope="col"><small class="font-weight-bold">Fecha</small></th>
                        <th scope="col"><small class="font-weight-bold">Accion</small></th>
                        <th scope="col"><small class="font-weight-bold">ID Usuario</small></th>
                        <th scope="col"><small class="font-weight-bold">Nombre Usuario</small></th>
                        <th scope="col"><small class="font-weight-bold">Cedula</small></th>
                        <th scope="col"><small class="font-weight-bold">Imagen</small></th>
                        <th scope="col"><small class="font-weight-bold">Email</small></th>
                        <th scope="col"><small class="font-weight-bold">Rol</small></th>
                        <th scope="col"><small class="font-weight-bold">Contraseña</small></th>
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
                                    @if ($registro->id_nuevo == $registro->id_viejo)
                                        No hubo cambio
                                    @else
                                        {{ $registro->id_viejo }} ->{{ $registro->id_nuevo }}
                                    @endif
                                </span></td>
                            <td><span class="d-block">
                                    @if ($registro->usuario_nuevo == $registro->usuario_viejo)
                                        No hubo cambio
                                    @else
                                        {{ $registro->usuario_viejo }} ->{{ $registro->usuario_nuevo }}
                                    @endif
                                </span></td>
                            <td><span class="d-block">
                                    @if ($registro->cedula_nuevo == $registro->cedula_viejo)
                                        No hubo cambio
                                    @else
                                        {{ $registro->cedula_viejo }} ->{{ $registro->cedula_nuevo }}
                                    @endif
                                </span></td>
                            <td><span class="d-block">
                                    @if ($registro->imagen_nuevo == $registro->imagen_viejo)
                                        No hubo cambio
                                    @else
                                        Se actualizó la imagen
                                    @endif
                                </span></td>

                            <td><span class="d-block">
                                    @if ($registro->email_nuevo == $registro->email_viejo)
                                        No hubo cambio
                                    @else
                                        {{ $registro->email_viejo }} ->{{ $registro->email_nuevo }}
                                    @endif
                                </span></td>
                            <td><span class="d-block">
                                    @if ($registro->idRol_nuevo == $registro->idRol_viejo)
                                        No hubo cambio
                                    @else
                                     
                                        @foreach ($roles as $rol)
                                            @if ($rol->id_Rol == $registro->idRol_viejo)
                                                {{ $rol->nombre_Rol }} ->
                                            @endif
                                        @endforeach
                                        @foreach ($roles as $rol)
                                        @if ($rol->id_Rol == $registro->idRol_nuevo)
                                            {{ $rol->nombre_Rol }}
                                        @endif
                                    @endforeach

                                    @endif
                                </span></td>
                            <td><span class="d-block">
                                    @if ($registro->password_nuevo == $registro->password_viejo)
                                        No hubo cambio
                                    @else
                                        Se actualizó la contraseña
                                    @endif
                                </span></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
