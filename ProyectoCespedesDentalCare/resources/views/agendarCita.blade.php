@extends('layout')

@section('Contenido')


    <div class="container">
        <div class="card-header bg-light border-0 pt-3 pb-0">
            <div class="text-center mt-3">
                <h2 class="text-center" id="myModalLabel">Agregar una nueva cita</h2>
            </div>
            <div class="modal-body ">
                <form action="" method="post">
                    <div class="row">
                        <div class="form-group col-md-12 col-lg-5">
                            <label for="from">Inicio Cita</label>
                            <div class='input-group date' id='from'>
                                <input type='text' id="from" name="from" class="form-control" readonly />
                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                            </div>
                        </div>
                        <div class="form-group col-md-12 col-lg-5">
                            <label for="from">Fin Cita</label>
                            <div class='input-group date' id='to'>
                                <input type='text' id="to" name="to" class="form-control" readonly />
                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                            </div>
                        </div>
                        <div class="form-group col-md-12 col-lg-2">
                            <label for="tipo">Tipo de cita</label>
                            <select class="form-control" name="class" id="tipo">
                                <option value="event-info">Cita General</option>
                                <option value="event-success">Cita Ortodoncia</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-12 col-lg-6">
                            <label for="title">Paciente</label>
                            <input type="text" required autocomplete="off" name="title" class="form-control" id="title"
                                placeholder="Introduce un título" />
                        </div>
                        <div class="form-group col-md-12 col-lg-6">
                            <label for="title">Dentista</label>
                            <input type="text" required autocomplete="off" name="dentistas" class="form-control"
                                id="dentistas" placeholder="Introduce un título" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-12">
                            <label for="body">Procedimiento</label>
                            <textarea id="body" name="event" required class="form-control" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="title">Monto</label>
                            <input type="text" required autocomplete="off" name="monto" class="form-control" id="abono"
                                placeholder="Introduce un título" />
                        </div>
                        <div class="form-group col-6">
                            <label for="title">Abono</label>
                            <input type="text" required autocomplete="off" name="abono" class="form-control" id="abono"
                                placeholder="Introduce un título" />
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
