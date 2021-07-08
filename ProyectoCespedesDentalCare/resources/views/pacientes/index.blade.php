@extends('layout')
<!--Hereda la navegacion-->
@section('Contenido')
<div class="container">
    <div class="form-group text-center">
        <h1>Lista de Pacientes</h1>
    </div>
    @if (Auth::user()->idRol == 1 || Auth::user()->idRol == 2 || Auth::user()->idRol == 4)
    <div class="form-group ml-3">
        <a class="btn btn-secondary " href="{{ route('Pacientes.create') }}">
            Agregar Paciente
        </a>
    </div>


    @endif
    <br />

    <!--Tabla que muestra los pacientes-->
    <div class="col-lg-12">
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
                @if (Auth::user()->id == $paciente->dentista_Paciente)
                <tr class="shadow-sm">
                    <td class="d-block"><span class="d-block">{{ $loop->iteration }}</span></td>
                    <td><img src='{{ $paciente->imagen_Paciente }}' class="img-fluid rounded-circle avatar" alt="Imagen"
                            style="height: 80px;width: 80px" /></td>
                    <td><span class="d-block">{{ $paciente->nombre_Paciente }}</span><small class="text-muted">{{
                            $paciente->correo_Paciente }}</small>
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
                    <td> <a href="{{ route('Pacientes.show', $paciente->id_Paciente) }}"><span><i style="color: gray"
                                    class="far fa-clipboard  fa-2x ml-3"></i> </span></a>
                    </td>
                    </form>

                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection