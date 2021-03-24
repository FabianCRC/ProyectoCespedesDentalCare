@extends('layout')

@section('Contenido')


    <div class="container">
        <div class="card-header bg-light border-0 pt-3 pb-0">
            <div class="text-center mt-3">
                <h2 class="text-center" id="myModalLabel">Agregar una nueva cita</h2>
            </div>
            <div class="modal-body ">
                <form action="{{ route('Citas.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-12 col-lg-6">
                            <div class="col-12">
                                <label for="from">Inicio Cita</label>
                                <div class='input-group date' id='from'>
                                    <input value="{{ old('inicio') }}" type="datetime-local" id="from" name="inicio" class="form-control"
                                    min="<?php $hoy=date("Y-m-d")."T".date("h:m"); echo $hoy;?>" max="2080-12-31"/>
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                                </div>
                            </div>
                            <div class="col-12">
                                @if ($errors->any())
                                    @if ($errors->has('inicio'))
                                        <div class="alert alert-danger" role="alert">
                                            {{ $errors->first('inicio') }}
                                        </div>
                                    @endif
                                @endif
                            </div>
                        </div>
                        <div class="form-group col-md-12 col-lg-6">
                            <div class="col-12">
                                <label for="from">Fin Cita</label>
                                <div class='input-group date' id='to'>
                                    <input value="{{ old('final') }}" type="datetime-local" id="to" name="final" class="form-control"
                                    min="<?php $hoy=date("Y-m-d")."T".date("h:m"); echo $hoy;?>" max="2080-12-31" />
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>

                                </div>
                            </div>
                            <div class="col-12">
                                @if ($errors->any())
                                    @if ($errors->has('final'))
                                        <div class="alert alert-danger" role="alert">
                                            {{ $errors->first('final') }}
                                        </div>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-12 col-lg-6">
                            <div class="col-12">
                                <label for="title">Seleccione un Paciente</label>
                                <select  class="form-control" name="paciente" id="paciente">
                                    <option selected disabled="true">Seleccione un paciente</option>
                                    @if (!$pacientes->isEmpty())
                                        @foreach ($pacientes as $paciente)
                                            <option value="{{ $paciente->id_Paciente }}">{{ $paciente->id_Paciente }} -
                                                {{ $paciente->nombre_Paciente }}</option>
                                        @endforeach
                                    @else
                                        <option disabled="true">No hay registros</option>
                                    @endif
                                </select>
                            </div>
                            <div class="col-12">
                                @if ($errors->any())
                                    @if ($errors->has('paciente'))
                                        <div class="alert alert-danger" role="alert">
                                            {{ $errors->first('paciente') }}
                                        </div>
                                    @endif
                                @endif
                            </div>
                        </div>
                        <div class="form-group col-md-12 col-lg-6">
                            <div class="col-12">
                                <label for="title">Seleccione un dentista</label>
                                <select class="form-control" name="dentista" id="dentista">
                                    <option disabled="true" selected>Seleccione un dentista</option>
                                    @if (!$pacientes->isEmpty())
                                        @foreach ($odontologos as $odontologo)
                                            <option value="{{ $odontologo->id }}">{{ $odontologo->name }}  {{ $odontologo->apellido }}</option>
                                        @endforeach
                                    @else
                                        <option disabled="true">No hay registros</option>
                                    @endif
                                </select>
                            </div>
                            <div class="col-12">
                                @if ($errors->any())
                                    @if ($errors->has('dentista'))
                                        <div class="alert alert-danger" role="alert">
                                            {{ $errors->first('dentista') }}
                                        </div>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-12">
                            <label for="body">Procedimiento</label>
                            <textarea id="body" name="descripcion_Cita" class="form-control" rows="3">{{ old('descripcion_Cita') }}</textarea>
                            @if ($errors->any())
                                @if ($errors->has('descripcion_Cita'))
                                    <div class="alert alert-danger mt-1" role="alert">
                                        {{ $errors->first('descripcion_Cita') }}
                                    </div>
                                @endif
                            @endif
                        </div>
                    </div>
                    <br>
                    <div class="text-center">
                        <button type="submit" class="btn btn-secondary text-center  btn-block"></i>
                            Agendar Cita</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
