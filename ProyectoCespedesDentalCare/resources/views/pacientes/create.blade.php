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
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <div class="form-group">
                            <label for="inputAddress">Numero de cedula</label>
                            <input type="text" class="form-control" name="idP   " readonly=»readonly required>
                            @if ($errors->any())
                                @if ($errors->has('idP'))
                                    <div class="alert alert-danger mt-1" role="alert">
                                        {{ $errors->first('idP') }}
                                    </div>
                                @endif
                            @endif
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputAddress">Numero celular</label>
                        <input type="text" class="form-control" name="numeroP" required>
                        @if ($errors->any())
                            @if ($errors->has('numeroP'))
                                <div class="alert alert-danger mt-1" role="alert">
                                    {{ $errors->first('numeroP') }}
                                </div>
                            @endif
                        @endif
                    </div>
                    <div class="form-group col-md-6">
                        <div class="form-group">
                            <label for="inputAddress">Nombre completo</label>
                            <input type="text" class="form-control" name="nombreP" required>
                            @if ($errors->any())
                                @if ($errors->has('nombreP'))
                                    <div class="alert alert-danger mt-1" role="alert">
                                        {{ $errors->first('nombreP') }}
                                    </div>
                                @endif
                            @endif
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Email</label>
                        <input type="email" class="form-control" name="correoP" required>
                        @if ($errors->any())
                            @if ($errors->has('correoP'))
                                <div class="alert alert-danger mt-1" role="alert">
                                    {{ $errors->first('correoP') }}
                                </div>
                            @endif
                        @endif
                    </div>


                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Datos importantantes</label>
                        <input type="text" class="form-control" name="datosP" required>
                        @if ($errors->any())
                            @if ($errors->has('datosP'))
                                <div class="alert alert-danger mt-1" role="alert">
                                    {{ $errors->first('datosP') }}
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
                                <div class="alert alert-danger mt-1" role="alert">
                                    {{ $errors->first('dentistaP') }}
                                </div>
                            @endif
                        @endif
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Fecha de Nacimiento</label>
                        <input type="date" required class="form-control datepicker entrada" name="fechanaciP"
                            min="1900-01-01" max="<?php
                            $hoy = date('Y-m-d');
                            echo $hoy;
                            ?>">
                        @if ($errors->any())
                            @if ($errors->has('fechanaciP'))
                                <div class="alert alert-danger mt-1" role="alert">
                                    {{ $errors->first('fechanaciP') }}
                                </div>
                            @endif
                        @endif
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Fecha de ingreso</label>
                        <input type="date" required class="form-control datepicker entrada" name="fechaingrP"
                            min="1900-01-01" max="<?php
                            $hoy = date('Y-m-d');
                            echo $hoy;
                            ?>">
                        @if ($errors->any())
                            @if ($errors->has('fechaingrP'))
                                <div class="alert alert-danger mt-1" role="alert">
                                    {{ $errors->first('fechaingrP') }}
                                </div>
                            @endif
                        @endif
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputAddress">Observaciones</label>
                        <textarea class="form-control" name="observacionesP" required></textarea>
                        @if ($errors->any())
                            @if ($errors->has('observacionesP'))
                                <div class="alert alert-danger mt-1" role="alert">
                                    {{ $errors->first('observacionesP') }}
                                </div>
                            @endif
                        @endif
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Foto de paciente</label>
                        <input type="file" class="form-control " name="img" accept="image/*">
                        @if ($errors->any())
                            @if ($errors->has('img'))
                                <div class="alert alert-danger mt-1" role="alert">
                                    {{ $errors->first('img') }}
                                </div>
                            @endif
                        @endif
                    </div>
                    <div class="form-group col-md-12">
                        <button type="submit" class="btn btn-secondary btn-block">Guardar Cambios</button>
                    </div>
            </form>
        </div>
    </div>

@endsection
