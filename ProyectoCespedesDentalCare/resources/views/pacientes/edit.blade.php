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
                                    readonly=»readonly>
                                @error('idP')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputAddress">Numero celular</label>
                            <input type="text" class="form-control" name="numeroP"
                                value="{{ $paciente->numero_Paciente }}" minlength="8" maxlength="20" required
                                pattern="[0-9]+" title="Números. Tamaño mínimo: 8. Tamaño máximo: 20">
                            @error('numeroP')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <div class="form-group">
                                <label for="inputAddress">Nombre completo</label>
                                <input type="text" class="form-control" name="nombreP"
                                    value="{{ $paciente->nombre_Paciente }}" required required>
                                @error('nombreP')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Email</label>
                            <input type="email" class="form-control" name="correoP"
                                value="{{ $paciente->correo_Paciente }}">
                            @error('correoP')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Datos importantantes</label>
                            <input type="text" class="form-control" name="datosP" value="{{ $paciente->datos_Paciente }}"
                                required>
                            @error('datosP')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-12 col-lg-6">
                            <label for="title">Seleccione un dentista</label>
                            <select class="form-control" required name="dentistaP" id="dentistaP">
                                @if (!$odontologos->isEmpty())
                                    @foreach ($odontologos as $odontologo)
                                        @if ($paciente->dentista_Paciente == $odontologo->id)
                                            <option value="{{ $odontologo->id }}" selected>{{ $odontologo->name }}
                                            </option>
                                        @else
                                            <option value="{{ $odontologo->id }}">{{ $odontologo->name }}</option>

                                        @endif
                                    @endforeach
                                @else
                                    <option disabled="true">No hay registros</option>
                                @endif
                            </select>
                            @error('dentistaP')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Fecha de Nacimiento</label>
                            <input type="date" class="form-control datepicker entrada" name="fechanaciP"
                                value="{{ $paciente->fecha_Nacimiento }}">
                            @error('fechanaciP')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Fecha de ingreso</label>
                            <input type="date" class="form-control datepicker entrada" name="fechaingrP"
                                value="{{ $paciente->fecha_Ingreso }}">
                            @error('fechaingrP')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputAddress">Observaciones</label>
                            <textarea class="form-control" name="observacionesP"
                                required>{{ $paciente->observaciones_Paciente }}</textarea>
                            @error('observacionesP')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Foto de paciente</label>
                            <input type="file" class="form-control " name="img" accept="image/*"
                                value="{{ $paciente->imagen_Paciente }}">
                            @error('img')
                                <br>
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <button type="submit" class="btn btn-secondary btn-block">Guardar Cambios</button>
                        </div>
                </form>
            @endforeach
        </div>
    </div>

@endsection
