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
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputAddress">Numero celular</label>
                            <input type="text" class="form-control" name="numeroP"
                                value="{{ $paciente->numero_Paciente }}" minlength="8" maxlength="20" required
                                pattern="[0-9]+" title="Números. Tamaño mínimo: 8. Tamaño máximo: 20">
                        </div>
                        <div class="form-group col-md-6">
                            <div class="form-group">
                                <label for="inputAddress">Nombre completo</label>
                                <input type="text" class="form-control" name="nombreP"
                                    value="{{ $paciente->nombre_Paciente }}" required required>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Email</label>
                            <input type="email" class="form-control" name="correoP"
                                value="{{ $paciente->correo_Paciente }}">
                        </div>


                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Datos importantantes</label>
                            <input type="text" class="form-control" name="datosP" value="{{ $paciente->datos_Paciente }}"
                                required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Dentista</label>
                            <input type="text" class="form-control" name="dentistaP"
                                value="{{ $paciente->dentista_Paciente }}" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Fecha de Nacimiento</label>
                            <input type="date" class="form-control datepicker entrada" name="fechanaciP"
                                value="{{ $paciente->fecha_Nacimiento }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Fecha de ingreso</label>
                            <input type="date" class="form-control datepicker entrada" name="fechaingrP"
                                value="{{ $paciente->fecha_Ingreso }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputAddress">Observaciones</label>
                            <textarea class="form-control" name="observacionesP"
                                required>{{ $paciente->observaciones_Paciente }}</textarea>
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
                            <button type="submit" class="btn btn-secondary btn-block">Editar</button>
                        </div>
                </form>
            @endforeach
        </div>
    </div>

@endsection