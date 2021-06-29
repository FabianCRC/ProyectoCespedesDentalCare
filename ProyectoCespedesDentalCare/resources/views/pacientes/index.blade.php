@extends('layout')
<!--Hereda la navegacion-->
@section('Contenido')
    <div class="container-fluid">
        <div class="form-group text-center">
            <h1>Lista de Pacientes</h1>
        </div>
        @if (Auth::user()->idRol == 1 || Auth::user()->idRol == 2 || Auth::user()->idRol == 4)
            <div class="row">
                <!-- Agregar Paciente -->
                <a data-toggle="modal" data-target="#exampleModal"><span class="btn btn-secondary ml-3">Agregar Paciente
                    </span></a>

                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Agregar Paciente</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">
                                <div class="card mb-5 shadow-sm border-0 shadow-hover">
                                    <div class="card-header bg-light border-0 pt-3 pb-0">
                                        <form action="{{ route('Pacientes.store') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <div class="form-group">
                                                        <label for="inputAddress">Numero de cedula</label>
                                                        <input type="text" class="form-control" name="idP"
                                                            placeholder="305390002" minlength="7" maxlength="20" required
                                                            pattern="[0-9]+"
                                                            title="Números. Tamaño mínimo: 7. Tamaño máximo: 20">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputAddress">Numero celular</label>
                                                    <input type="text" class="form-control" name="numeroP"
                                                        placeholder="61857405" minlength="8" maxlength="20" required
                                                        pattern="[0-9]+"
                                                        title="Números. Tamaño mínimo: 8. Tamaño máximo: 20">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <div class="form-group">
                                                        <label for="inputAddress">Nombre completo</label>
                                                        <input type="text" class="form-control" name="nombreP"
                                                            placeholder="Nombre y Apellidos">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4">Email</label>
                                                    <input type="email" class="form-control" name="correoP"
                                                        placeholder="Email">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <div class="form-group">
                                                        <label for="inputPassword4">Enfermedades</label>

                                                        <select name="enfermedadesP" class="form-control" required>
                                                            <option value="" selected>Seleccione una opción
                                                            </option>
                                                            @foreach ($enfermedades as $enfermedad)
                                                                <option value="{{ $enfermedad->id_Enfermedad }}">
                                                                    {{ $enfermedad->nombre_Enfermedad }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4">Alergias</label>
                                                    <select name="alergiasP" class="form-control" required>
                                                        <option value="" selected>Seleccione una opción</option>
                                                        @foreach ($alergias as $alergia)
                                                            <option value="{{ $alergia->id_Alergia }}">
                                                                {{ $alergia->nombre_Alergia }}</option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4">Observaciones</label>
                                                    <input type="text" class="form-control" name="observacionesP"
                                                        placeholder="Observaciones sobre el paciente" required>
                                                </div>
                                                <div class="form-group col-md-12 col-lg-6">
                                                    <label for="title">Seleccione un Dentista</label>
                                                    <select class="form-control" name="dentistaP" id="dentistaP" required>
                                                        <option selected>Seleccione un dentista</option>
                                                        @if ($odontologos == null)
                                                            <option disabled="true">Seleccione un Dentista</option>
                                                        @else
                                                            @foreach ($odontologos as $odontologo)
                                                                <option value="{{ $odontologo->id }}">
                                                                    {{ $odontologo->id }}
                                                                    - {{ $odontologo->name }}
                                                                    {{ $odontologo->apellido }}
                                                                </option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4">Fecha de Nacimiento</label>
                                                    <input type="date" class="form-control datepicker entrada"
                                                        name="fechanaciP" required min="1900-01-01" max="<?php
                                                            $hoy = date('Y-m-d');
                                                            echo $hoy;
                                                            ?>">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4">Fecha de ingreso</label>
                                                    <input type="date" class="form-control datepicker entrada"
                                                        name="fechaingrP" required max="<?php
                                                            $hoy = date('Y-m-d');
                                                            echo $hoy;
                                                            ?>">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label for="inputAddress">Datos importantes</label>
                                                    <input type="text" class="form-control" name="datosP"
                                                        placeholder="Tipo de tratamiento..." required>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Foto de paciente</label>
                                                    <input type="file" class="form-control" name="img" accept="image/*"
                                                        required />
                                                    @error('img')
                                                        <br>
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>

                                                <div class="form-group col-6 ">
                                                    <button type="submit"
                                                        class="btn btn-secondary btn-block">Registrar</button>
                                                </div>
                                                <div class="form-group col-6 ">
                                                    <button type="submit" class="btn btn-danger btn-block"
                                                        data-dismiss="modal">Cerrar</button>
                                                </div>
                                            </div>
                                        </form>
                                        <br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Fin Agregar Paciente -->

        @endif
        <br />

        <!--Tabla que muestra los pacientes-->
        <div class="col-xl-15 col-lg-12">

            <div class="col-12">
                <table class=" table table-responsive-xl table-striped table-inverse datatable" id="pacientes">
                    <thead>
                        <tr>
                            <th scope="col"><small class="font-weight-bold">#</small></th>
                            <th scope="col"><small class="font-weight-bold">Paciente</small></th>
                            <th scope="col"><small class="font-weight-bold">Contacto</small></th>
                            <th scope="col"><small class="font-weight-bold">Numero</small></th>
                            <th scope="col"><small class="font-weight-bold">Cedula</small></th>
                            <th scope="col"><small class="font-weight-bold">Observaciones</small></th>
                            <th scope="col"><small class="font-weight-bold">Datos</small></th>
                            <th scope="col"><small class="font-weight-bold">Fecha Nacimiento</small></th>
                            <th scope="col"><small class="font-weight-bold">Fecha Ingreso</small></th>
                            <th scope="col"><small class="font-weight-bold">Enfermedades</small></th>
                            <th scope="col"><small class="font-weight-bold">Alergias</small></th>
                            <th scope="col"><small class="font-weight-bold">Ver expediente<small></th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($pacientes as $paciente)

                            <tr class="shadow-sm">
                                <td class="d-block"><span class="d-block">{{ $loop->iteration }}</span></td>
                                <td><img src='{{ $paciente->imagen_Paciente }}' class="img-fluid rounded-circle avatar"
                                        alt="Imagen" style="height: 80px;width: 80px" /></td>
                                <td><span class="d-block">{{ $paciente->nombre_Paciente }}</span><small
                                        class="text-muted">{{ $paciente->correo_Paciente }}</small>
                                </td>
                                <td><span class="d-block">{{ $paciente->numero_Paciente }}</span>
                                </td>
                                <td><span class="d-block">{{ $paciente->id_Paciente }}</span></td>
                                <td><span class="d-block">{{ $paciente->observaciones_Paciente }}</span></td>
                                <td><span class="d-block">{{ $paciente->datos_Paciente }}</span>
                                </td>
                                <td><span class="d-block">{{ $paciente->fecha_Nacimiento }}</span></td>
                                <td><span class="d-block">{{ $paciente->fecha_Ingreso }}</span></td>

                                @foreach ($pacientes_enfermedades as $pacienteE)
                                    @if ($paciente->id_Paciente == $pacienteE->id_Paciente)
                                        @foreach ($enfermedades as $enfermedad)
                                            @if ($enfermedad->id_Enfermedad == $pacienteE->id_Enfermedad)
                                                <td><span class="d-block">{{ $enfermedad->nombre_Enfermedad }}</span>
                                                </td>
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach

                                @foreach ($pacientes_alergias as $pacienteA)
                                    @if ($paciente->id_Paciente == $pacienteA->id_Paciente)
                                        @foreach ($alergias as $alergia)
                                            @if ($alergia->id_Alergia == $pacienteA->id_Alergia)
                                                <td><span class="d-block">{{ $alergia->nombre_Alergia }}</span>
                                                </td>
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach
                                <td> <a href="{{ route('Pacientes.show', $paciente->id_Paciente) }}"><span><i
                                                style="color: gray" class="far fa-clipboard  fa-2x ml-3"></i> </span></a>
                                </td>
                                </form>

                            </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
