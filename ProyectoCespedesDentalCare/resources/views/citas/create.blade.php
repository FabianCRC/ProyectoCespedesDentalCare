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
                        <div class="form-group col-md-12 col-lg-5">
                            <label for="from">Inicio Cita</label>
                            <div class='input-group date' id='from'>
                                <input type='date' id="from" name="inicio" class="form-control" required />
                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                            </div>
                        </div>
                        <div class="form-group col-md-12 col-lg-5">
                            <label for="from">Fin Cita</label>
                            <div class='input-group date' id='to'>
                                <input type='date' id="to" name="final" class="form-control"  required/>
                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                            </div>
                        </div>
                        <div class="form-group col-md-12 col-lg-2">
                            <label for="tipo">Tipo de cita</label>
                            <select class="form-control" name="tipo" id="tipo">
                                <option value="General">Cita General</option>
                                <option value="Ortodoncia">Cita Ortodoncia</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-12 col-lg-6">
                            <label for="title">Seleccione un Paciente</label>
                            <select class="form-control"  name="paciente" id="paciente"  required>  
                                @if(!$pacientes->isEmpty())
                                @foreach($pacientes as $paciente)
                                <option value="{{$paciente->id_Paciente}}" >{{$paciente->id_Paciente}} - {{$paciente->nombre_Paciente}}</option>
                                @endforeach
                                @else
                                <option disabled="true">No hay registros</option>
                                @endif
                            </select>
                        </div>
                        <div class="form-group col-md-12 col-lg-6">
                            <label for="title">Seleccione un dentista</label>
                            <select class="form-control" name="dentista" id="dentista" required>
                                <option disabled="true">Seleccione un dentista</option>
                                @if(!$pacientes->isEmpty())
                                @foreach($odontologos as $odontologo)
                                <option  value="{{$odontologo->id}}" >{{$odontologo->name}}</option>
                                @endforeach
                                @else
                                <option disabled="true">No hay registros</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-12">
                            <label for="body">Procedimiento</label>
                            <textarea id="body" name="descripcion_Cita" required class="form-control" rows="3" required></textarea>
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
