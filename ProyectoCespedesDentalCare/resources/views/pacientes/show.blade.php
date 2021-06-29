@extends('layout')
<!--Hereda la navegacion-->
@section('Contenido')
    <div class="card mb-5 shadow-sm border-0 shadow-hover">
        <div class="card-header bg-light border-0 pt-3 pb-0">
            @foreach ($pacientes as $paciente)
                <form action="{{ route('Pacientes.destroy', $paciente->id_Paciente) }}" method="POST">
                    <div class="text-center mt-3">
                        <img src='{{ $paciente->imagen_Paciente }}' class="img-fluid rounded-circle avatar"
                            style="height: 200px; width: 200px;" alt="Imagen" />
                        <br />
                        <h2 class="text-center">Expediente de {{ $paciente->nombre_Paciente }}</h2>
                        <br />
                    </div>
                    <div class="col-12">
                        @if ($errors->has('msj'))
                            <div class="form-group">
                                <p style="color:red;"> {{ $errors->first('msj') }}</p>
                            </div>
                        @endif
                    </div>
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <div class="form-group">
                                <label for="inputAddress">Numero de cedula</label>
                                <input disabled="true" type="text" class="form-control" name="idP"
                                    value="{{ $paciente->id_Paciente }} " readonly=»readonly>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputAddress">Numero celular</label>
                            <input disabled="true" type="text" class="form-control" name="numeroP"
                                value="{{ $paciente->numero_Paciente }}" minlength="8" maxlength="20" required
                                pattern="[0-9]+" title="Números. Tamaño mínimo: 8. Tamaño máximo: 20">
                        </div>
                        <div class="form-group col-md-6">
                            <div class="form-group">
                                <label for="inputAddress">Nombre completo</label>
                                <input disabled="true" type="text" class="form-control" name="nombreP"
                                    value="{{ $paciente->nombre_Paciente }}" required required>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Email</label>
                            <input disabled="true" type="email" class="form-control" name="correoP"
                                value="{{ $paciente->correo_Paciente }}">
                        </div>


                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Datos importantantes</label>
                            <input disabled="true" type="text" class="form-control" name="datosP"
                                value="{{ $paciente->datos_Paciente }}" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Dentista</label>
                            @foreach ($odontologos as $odontologo)
                                @if ($odontologo->id == $paciente->dentista_Paciente)
                                    <input disabled="true" type="text" class="form-control" name="dentistaP"
                                        value="{{ $odontologo->id . ' - ' . $odontologo->name }}" required>
                                @endif
                            @endforeach
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Fecha de Nacimiento</label>
                            <input disabled="true" type="date" class="form-control datepicker entrada" name="fechanaciP"
                                value="{{ $paciente->fecha_Nacimiento }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Fecha de ingreso</label>
                            <input disabled="true" type="date" class="form-control datepicker entrada" name="fechaingrP"
                                value="{{ $paciente->fecha_Ingreso }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputAddress">Observaciones</label>
                            <textarea disabled="true" class="form-control" name="observacionesP"
                                required>{{ $paciente->observaciones_Paciente }}</textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Foto de paciente</label>
                            <input disabled="true" type="file" class="form-control " name="img" accept="image/*"
                                value="{{ $paciente->imagen_Paciente }}">
                            @error('img')
                                <br>
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        @if (Auth::user()->idRol == 1 || Auth::user()->idRol == 2 || Auth::user()->idRol == 4)
                            <div class="form-group col-6 btn-md">
                                <a class="btn btn-secondary btn-block"
                                    href="{{ route('Pacientes.edit', $paciente->id_Paciente) }}">
                                    Editar
                                </a>
                            </div>
                            <div class="form-group col-6 btn-md">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-block" type="submit" title="delete"
                                    onclick="return confirm('¿Desea borrar este Paciente?');">
                                    Eliminar
                                </button>
                            </div>
                        @endif
                </form>
            @endforeach
        </div>
    </div>
@endsection
