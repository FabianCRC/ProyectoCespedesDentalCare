@extends('layout')
<!--Hereda la navegacion-->
@section('Contenido')
<div class="card mb-5 shadow-sm border-0 shadow-hover">
    <div class="card-header bg-light border-0 pt-3 pb-0">
        <form action="{{ route('Pacientes.store') }}" method="POST">
            @csrf
            <div class="text-center mt-3">
                <br />
                <h2 class="text-center">Registrar un nuevo paciente</h2>
                <br />
            </div>
            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

            <div class="form-row">

                <div class="form-group col-md-6">
                    <div class="form-group">
                        <label for="inputAddress">Nombre completo</label>
                        <input type="text" class="form-control" value="{{ old('nombreP') }}" name="nombreP" required>
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
                    <input type="email" class="form-control" value="{{ old('correo_Paciente') }}" name="correo_Paciente" required>
                    @if ($errors->any())
                    @if ($errors->has('correo_Paciente'))
                    <div class="form-group">
                        <p style="color:red;"> {{ $errors->first('correo_Paciente') }}</p>
                    </div>
                    @endif
                    @endif
                </div>
                <div class="form-group col-md-6">
                    <div class="form-group">
                        <label for="inputAddress">Numero de cedula</label>
                        <input type="text" class="form-control" value="{{ old('id_Paciente') }}" name="id_Paciente" required>
                        @if ($errors->any())
                        @if ($errors->has('id_Paciente'))
                        <div class="form-group">
                            <p style="color:red;"> {{ $errors->first('id_Paciente') }}</p>
                        </div>
                        @endif
                        @endif
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputAddress">Numero celular</label>
                    <input type="text" class="form-control" value="{{ old('numeroP') }}" name="numeroP" required>
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
                        <label for="inputPassword4">Enfermedades</label>

                        <select name="enfermedadesP" value="{{ old('enfermedadesP') }}" class="form-control" required>
                            <option selected>Seleccione una opción
                            </option>
                            @foreach ($enfermedades as $enfermedad)
                            <option value="{{ $enfermedad->id_Enfermedad }}">
                                {{ $enfermedad->nombre_Enfermedad }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Alergias</label>
                    <select name="alergiasP" value="{{ old('alergiasP') }}" class="form-control" required>
                        <option selected>Seleccione una opción</option>
                        @foreach ($alergias as $alergia)
                        <option value="{{ $alergia->id_Alergia }}">
                            {{ $alergia->nombre_Alergia }}
                        </option>
                        @endforeach
                    </select>

                </div>
                <div class="form-group col-md-12 col-lg-6">
                    <label for="title">Seleccione un dentista</label>
                    <select class="form-control" value="{{ old('dentistaP') }}" required name="dentistaP" id="dentistaP">
                        @if (!$odontologos->isEmpty())
                        @foreach ($odontologos as $odontologo)
                        <option value="{{ $odontologo->id }}">{{ $odontologo->name }}</option>
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
                    <input type="date" value="{{ old('fechanaciP') }}" required class="form-control datepicker entrada" name="fechanaciP" min="1900-01-01" max="<?php
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
                    <input type="date" value="{{ old('fechaingrP') }}" required class="form-control datepicker entrada" name="fechaingrP" min="1900-01-01" max="<?php
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
                    <label for="img">Foto de paciente</label>
                    <input type="file" class="form-control " name="img" accept="image/*">

                    @if ($errors->any())
                    @if ($errors->has('img'))
                    <div class="form-group">
                        <p style="color:red;"> {{ $errors->first('img') }}</p>
                    </div>
                    @endif
                    @endif
                </div>
                <div class="form-group col-md-6">
                    <label for="inputAddress">Observaciones</label>
                    <textarea class="form-control" value="{{ old('observacionesP') }}" name="observacionesP" required>{{ old('observacionesP') }}</textarea>
                    @if ($errors->any())
                    @if ($errors->has('observacionesP'))
                    <div class="form-group">
                        <p style="color:red;"> {{ $errors->first('observacionesP') }}</p>
                    </div>
                    @endif
                    @endif
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Datos importantantes</label>
                    <textarea type="text" class="form-control" value="" name="datosP" required>{{ old('datosP') }}</textarea>
                    @if ($errors->any())
                    @if ($errors->has('datosP'))
                    <div class="form-group">
                        <p style="color:red;"> {{ $errors->first('datosP') }}</p>
                    </div>
                    @endif
                    @endif
                </div>
                <div class="form-group col-md-12">
                    <button type="submit" class="btn btn-secondary btn-block">Crear Paciente</button>
                </div>
        </form>
    </div>
</div>

@endsection