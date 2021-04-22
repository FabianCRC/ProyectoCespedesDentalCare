@extends('layout')
<!--Hereda la navegacion-->
@section('Contenido')
    <div class="card mb-5 shadow-sm border-0 shadow-hover">
        <div class="card-header bg-light border-0 pt-3 pb-0">
            @foreach ($pacientes as $paciente)
                <form action="{{ route('Pacientes.update', $paciente->id_Paciente) }}" method="POST"
                    enctype="multipart/form-data">

                    @csrf
                    @method('PATCH')
                    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                    @if ($errors->any())
                        <script>
                            swal({
                                title: "Cuidado",
                                text: "Hay un error en los campos solicitados, por favor verifique los campos.",
                                icon: "warning",
                            });

                        </script>
                    @endif
                    <div class="text-center mt-3">
                        <img src='{{ $paciente->imagen_Paciente }}' class="img-fluid rounded-circle avatar"
                            style="height: 200px; width: 200px;" alt="Imagen" />
                        <br />
                        <h2 class="text-center">Expediente de {{ $paciente->nombre_Paciente }}</h2>
                        <br />
                    </div>
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <div class="form-group">
                                <label for="inputAddress">Numero de cedula</label>
                                <input type="text" class="form-control" name="idP" value="{{ $paciente->id_Paciente }} "
                                    required>
                                @if ($errors->any())
                                    @if ($errors->has('idP'))
                                        <div class="form-group">
                                            <p style="color:red;"> {{ $errors->first('idP') }}</p>
                                        </div>
                                    @endif
                                @endif
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputAddress">Numero celular</label>
                            <input type="text" class="form-control" name="numeroP" required
                                value="{{ $paciente->numero_Paciente }}">
                            @if ($errors->any())
                                @if ($errors->has('numeroP'))
                                    <div class="form-group">
                                        <p style="color:red;"> {{ $errors->first('numeroP') }}</p>
                                    </div>
                                @endif
                            @endif
                        </div>
                        <div class="form-group col-md-6">
                            <div class="form-group">
                                <label for="inputAddress">Nombre completo</label>
                                <input type="text" class="form-control" name="nombreP" required
                                    value="{{ $paciente->nombre_Paciente }}">
                                @if ($errors->any())
                                    @if ($errors->has('nombreP'))
                                        <div class="form-group">
                                            <p style="color:red;"> {{ $errors->first('nombreP') }}</p>
                                        </div>
                                    @endif
                                @endif
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Email</label>
                            <input type="email" class="form-control" name="correoP" required
                                value="{{ $paciente->correo_Paciente }}">
                            @if ($errors->any())
                                @if ($errors->has('correoP'))
                                    <div class="form-group">
                                        <p style="color:red;"> {{ $errors->first('correoP') }}</p>
                                    </div>
                                @endif
                            @endif
                        </div>


                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Datos importantantes</label>
                            <input type="text" class="form-control" name="datosP" value="{{ $paciente->datos_Paciente }}"
                                required>
                            @if ($errors->any())
                                @if ($errors->has('datosP'))
                                    <div class="form-group">
                                        <p style="color:red;"> {{ $errors->first('datosP') }}</p>
                                    </div>
                                @endif
                            @endif
                        </div>
                        <div class="form-group col-md-12 col-lg-6">
                            <label for="title">Seleccione un dentista</label>
                            <select class="form-control" required name="dentistaP" id="dentistaP">
                                @if (!$odontologos->isEmpty())
                                    @foreach ($odontologos as $odontologo)
                                        @if ($paciente->dentista_Paciente == $odontologo->id)
                                            <option value="{{ $odontologo->id }}" selected>{{ $odontologo->id }} -
                                                {{ $odontologo->name }} {{ $odontologo->apellido }}
                                            </option>
                                        @else
                                            <option value="{{ $odontologo->id }}">{{ $odontologo->name }}</option>

                                        @endif
                                    @endforeach
                                @else
                                    <option disabled="true">No hay registros</option>
                                @endif
                            </select>
                            @if ($errors->any())
                                @if ($errors->has('dentistaP'))
                                    <div class="form-group">
                                        <p style="color:red;"> {{ $errors->first('dentistaP') }}</p>
                                    </div>
                                @endif
                            @endif
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Fecha de Nacimiento</label>
                            <input type="date" required class="form-control datepicker entrada" name="fechanaciP"
                                value="{{ $paciente->fecha_Nacimiento }}" max="<?php
                                    $hoy = date('Y-m-d');
                                    echo $hoy;
                                    ?>">
                            @if ($errors->any())
                                @if ($errors->has('fechanaciP'))
                                    <div class="form-group">
                                        <p style="color:red;"> {{ $errors->first('fechanaciP') }}</p>
                                    </div>
                                @endif
                            @endif
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Fecha de ingreso</label>
                            <input type="date" required class="form-control datepicker entrada" name="fechaingrP"
                                value="{{ $paciente->fecha_Ingreso }}" max="<?php
                                    $hoy = date('Y-m-d');
                                    echo $hoy;
                                    ?>">
                            @if ($errors->any())
                                @if ($errors->has('fechaingrP'))
                                    <div class="form-group">
                                        <p style="color:red;"> {{ $errors->first('fechaingrP') }}</p>
                                    </div>
                                @endif
                            @endif
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputAddress">Observaciones</label>
                            <textarea class="form-control" name="observacionesP"
                                required>{{ $paciente->observaciones_Paciente }}</textarea>
                            @if ($errors->any())
                                @if ($errors->has('observacionesP'))
                                    <div class="form-group">
                                        <p style="color:red;"> {{ $errors->first('observacionesP') }}</p>
                                    </div>
                                @endif
                            @endif
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Foto de paciente</label>
                            <input type="file" class="form-control " name="img" accept="image/*"
                                value="{{ $paciente->imagen_Paciente }}">
                            @if ($errors->any())
                                @if ($errors->has('img'))
                                    <div class="form-group">
                                        <p style="color:red;"> {{ $errors->first('img') }}</p>
                                    </div>
                                @endif
                            @endif
                        </div>
                        <div class="form-group col-md-12">
                            <button type="submit" onclick="return confirm('¿Desea modificar el paciente?');"
                                class="btn btn-secondary btn-block">Guardar Cambios</button>
                        </div>
                </form>
            @endforeach
        </div>
    </div>

@endsection
