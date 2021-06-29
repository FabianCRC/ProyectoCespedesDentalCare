@extends('layout')
@section('head')


@endsection
@section('Contenido')

    <div class="container">
        <div class="card-header bg-light border-0 pt-3 pb-0">
            <div class="text-center mt-3">
                <h2 class="text-center" id="myModalLabel">Agregar una nueva cita</h2>
            </div>
            <div class="modal-body ">
                <form action="{{ route('Citas.store') }}" method="post">
                    @csrf
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
                    <div class="row">
                        <div class="form-group col-md-12 col-lg-6">
                            <div class="col-12">
                                <label for="from">Inicio Cita</label>
                                <div class='input-group date' id='from'>
                                    <input value="{{ old('inicio') }}" type="datetime-local" id="from" name="inicio"
                                        class="form-control" min="<?php
                                            $hoy = date('Y-m-d') . 'T' . date('h:m');
                                            echo $hoy;
                                            ?>" max="2080-12-31" />
                                </div>
                            </div>
                            <div class="col-12">
                                @if ($errors->any())
                                    @if ($errors->has('inicio'))

                                        <div class="form-group">
                                            <p style="color:red;"> {{ $errors->first('inicio') }}</p>
                                        </div>
                                    @endif
                                @endif
                            </div>
                        </div>
                        <div class="form-group col-md-12 col-lg-6">
                            <div class="col-12">
                                <label for="from">Fin Cita</label>
                                <div class='input-group date' id='to'>
                                    <input value="{{ old('final') }}" type="datetime-local" id="to" name="final"
                                        class="form-control" min="<?php
                                            $hoy = date('Y-m-d') . 'T' . date('h:m');
                                            echo $hoy;
                                            ?>" max="2080-12-31" />

                                </div>
                            </div>
                            <div class="col-12">
                                @if ($errors->any())
                                    @if ($errors->has('final'))

                                        <div class="form-group">
                                            <p style="color:red;"> {{ $errors->first('final') }}</p>
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
                                <select class="selector form-control" data-show-subtext="true" data-live-search="true"
                                    name="paciente" id="paciente">
                                    <option selected disabled="true">Seleccione un paciente</option>
                                    @if (!$pacientes->isEmpty())
                                        @foreach ($pacientes as $paciente)
                                         @if(Auth::user()->id == $paciente->dentista_Paciente)
                                            <option value="{{ $paciente->id_Paciente }}">{{ $paciente->id_Paciente }} -
                                                {{ $paciente->nombre_Paciente }}</option>
                                          @endif
                                        @endforeach
                                    @else
                                        <option disabled="true">No hay registros</option>
                                    @endif
                                </select>
                            </div>
                            <div class="col-12">
                                @if ($errors->any())
                                    @if ($errors->has('paciente'))
                                        <div class="form-group">
                                            <p style="color:red;"> {{ $errors->first('paciente') }}</p>
                                        </div>
                                    @endif
                                @endif
                            </div>
                        </div>
                        <div class="form-group col-md-12 col-lg-6">
                            <div class="col-12">
                                <label for="title">Seleccione un dentista</label>
                                <select class="form-control selector" data-show-subtext="true" data-live-search="true"
                                    name="dentista" id="dentista">
                                    <option selected disabled="true">Seleccione un dentista</option>
                                    @if (!$pacientes->isEmpty())
                                        @foreach ($odontologos as $odontologo)
                                            <option value="{{ $odontologo->id }}">{{ $odontologo->cedula }} -
                                                {{ $odontologo->name }} {{ $odontologo->apellido }}</option>
                                        @endforeach
                                    @else
                                        <option disabled="true">No hay registros</option>
                                    @endif
                                </select>
                            </div>
                            <div class="col-12">
                                @if ($errors->any())
                                    @if ($errors->has('dentista'))

                                        <div class="form-group">
                                            <p style="color:red;"> {{ $errors->first('dentista') }}</p>
                                        </div>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-12">
                            <label for="body">Procedimiento</label>
                            <textarea id="body" name="descripcion_Cita" class="form-control"
                                rows="3">{{ old('descripcion_Cita') }}</textarea>
                            @if ($errors->any())
                                @if ($errors->has('descripcion_Cita'))
                                    <div class="form-group">
                                        <p style="color:red;"> {{ $errors->first('descripcion_Cita') }}</p>
                                    </div>
                                @endif
                            @endif
                        </div>
                    </div>
                    <div class="col-12">
                        @if ($errors->has('msj'))
                            <div class="form-group">
                                <p style="color:red;"> {{ $errors->first('msj') }}</p>
                            </div>
                        @endif
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
    <script>
        $('.selector').select2({
            language: "es"
        });

    </script>
@endsection
