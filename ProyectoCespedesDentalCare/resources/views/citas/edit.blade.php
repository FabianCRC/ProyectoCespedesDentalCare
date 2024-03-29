@extends('layout')

@section('Contenido')

    <div class="container">
        <div class="card-header bg-light border-0 pt-3 pb-0">
            @foreach ($citas as $cita)
                <div class="text-center mt-3">
                    <h2 class="text-center" id="myModalLabel">Editar cita de {{ $cita->id_Paciente }}</h2>
                </div>
                <form action="{{ route('Citas.update', $cita->id_Cita) }}" method="post">
                    @method('PATCH')
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
                                    <input type="datetime-local" id="from" name="inicio" class="form-control"
                                        value="{{ $cita->inicio_Cita }}" required readonly />
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
                                    <input value="{{ $cita->final_Cita }}" type="datetime-local" id="to" name="final"
                                        class="form-control" required readonly />
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
                                <select class="form-control selector" name="paciente" id="paciente" required readonly>
                                    <option disabled="true">Seleccione un paciente</option>
                                    @if (!$pacientes->isEmpty())
                                        @foreach ($pacientes as $paciente)
                                            @if ($cita->id_Paciente == $paciente->id_Paciente){
                                                <option value="{{ $paciente->id_Paciente }}" selected>
                                                    {{ $paciente->id_Paciente }} -
                                                    {{ $paciente->nombre_Paciente }}</option>
                                            }@else{
                                                <option value="{{ $paciente->id_Paciente }}">
                                                    {{ $paciente->id_Paciente }} -
                                                    {{ $paciente->nombre_Paciente }}</option>
                                                }
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
                                <select class="form-control selector" name="dentista" id="dentista" required readonly>
                                    <option disabled="true">Seleccione un dentista</option>
                                    @if (!$odontologos == null)
                                        @foreach ($odontologos as $odontologo)
                                            @if ($cita->id_Usuario == $odontologo->id){
                                                <option value="{{ $odontologo->id }}" selected>
                                                    {{ $odontologo->name }}
                                                    {{ $odontologo->apellido }}
                                                </option>
                                            }@else{
                                                <option value="{{ $odontologo->id }}">{{ $odontologo->name }}
                                                    {{ $odontologo->apellido }}</option>
                                                }
                                            @endif
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
                    <div class="form-group col-12">
                        <div class="form-group col-12">
                            <label for="body">Procedimiento</label>
                            <textarea id="descripcion_Cita" name="descripcion_Cita" required class="form-control"
                                rows="3">{{ $cita->descripcion_Cita }}</textarea>
                        </div>
                        <div class="col-12">
                            @if ($errors->any())
                                @if ($errors->has('descripcion_Cita'))
                                    <div class="form-group">
                                        <p style="color:red;"> {{ $errors->first('descripcion_Cita') }}</p>
                                    </div>

                                @endif
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12 col-lg-6">
                            <div class="col-12">
                                <label for="from">Monto</label>
                                <div class='input-group date' id='from'>
                                    <input type="text" id="from" name="monto" class="form-control"
                                        value="{{ $cita->monto }}" required />
                                </div>
                            </div>
                            <div class="col-12">
                                @if ($errors->any())
                                    @if ($errors->has('monto'))
                                        <div class="form-group">
                                            <p style="color:red;"> {{ $errors->first('monto') }}</p>
                                        </div>

                                    @endif
                                @endif
                            </div>
                        </div>

                        <div class="form-group col-md-12 col-lg-6">
                            <div class="col-12">
                                <label for="from">Abono</label>
                                <div class='input-group date' id='to'>
                                    <input value="{{ $cita->abono }}" type="text" id="to" name="abono"
                                        class="form-control" required />
                                </div>
                            </div>
                            <div class="col-12">
                                @if ($errors->any())
                                    @if ($errors->has('abono'))
                                        <div class="form-group">
                                            <p style="color:red;"> {{ $errors->first('abono') }}</p>
                                        </div>

                                    @endif
                                @endif
                            </div>

                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" onclick="return confirm('¿Desea modificar esta?');"
                            class="btn btn-secondary text-center  btn-block"></i>
                            Modificar Cita</button>
                    </div>
                </form>
            @endforeach
        </div>
    </div>

    <script>
        $('.selector').select2({
            language: "es"
        });

    </script>
@endsection
