@extends('layout')
<!--Hereda la navegacion-->
@section('Contenido')
    <div class="container-fluid row">
        <div class="col-xl-7 col-lg-12">
            <table class="table table-striped table-inverse">
                <thead class="thead-inverse">
                    <tr>
                        <th>Nombre del Servicio</th>
                        <th>Descripcion</th>
                        <th>Valor</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td scope="row">Ortodoncia</td>
                        <td>Esta es la descripcion</td>
                        <td>$100</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-xl-5 col-lg-12">
            <div class="card mb-5 shadow-sm border-0 shadow-hover">
                <div class="card-header bg-light border-0 pt-3 pb-0">
                    <br>
                    <h5 style="text-align: center">Registrar Servicio</h5>
                    <br>
                    <form action="" method="post">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <div class="form-group">
                                    <label for="inputAddress">Nombre de servicio</label>
                                    <input type="text" class="form-control" autocomplete="off" name="nombreS"
                                        placeholder="Calza...">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputAddress">Descripción</label>
                                <input type="text" class="form-control" name="descripcionS" autocomplete="off"
                                    placeholder="Descripción...">
                            </div>
                            <div class="form-group col-md-6">
                                <div class="form-group">
                                    <label for="inputAddress">Precio</label>
                                    <input type="text" class="form-control" name="precioS" autocomplete="off"
                                        placeholder="35.000">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Dentista</label>
                                <input type="text" class="form-control" name="dentistaS"
                                    placeholder="Dentista que ingresa el servicio">
                            </div>
                        </div>
                        <div class="text-center">
                            <button style="text-align: " type="submit" class="btn btn-secondary">Registrar</button>
                        </div>
                    </form>
                    <br>

                </div>
            </div>
        </div>
    </div>
@endsection
