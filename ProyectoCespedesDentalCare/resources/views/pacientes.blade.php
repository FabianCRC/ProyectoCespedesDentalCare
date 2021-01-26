@extends('layout')
<!--Hereda la navegacion-->
@section('Contenido')
    <div class="container-fluid">
        <div class="row">
            <!--Tabla que muestra los pacientes-->
            <div class="col-xl-7 col-lg-12">
                <div class="">
                    <table class=" table table-responsive table-striped table-inverse">
                        <thead>
                            <tr>

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
                                <th scope="col"><small class="font-weight-bold">Dentista</small></th>
                                <th scope="col"><small class="font-weight-bold">Acciones<small></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="shadow-sm">
                                <td><img src='' class="img-fluid rounded-circle avatar" alt="Imagen" /></td>
                                <td><span class="d-block">Nombre Paciente</span><small
                                        class="text-muted">ejemplo@gmail.com</small>
                                </td>
                                <td><span class="d-block">8888 8888</span>
                                </td>
                                <td><span class="d-block">1-1111-1111</span></td>
                                <td><span class="d-block">Observaciones</span></td>
                                <td><span class="d-block">Datos</span>
                                </td>
                                <td><span class="d-block">22/22/2222</span></td>
                                <td><span class="d-block">22/22/2222</span></td>
                                <td><span class="d-block">Enfermedades</span></td>
                                <td><span class="d-block">Alergias</span>
                                </td>
                                <td><span class="d-block">Dentista</span>
                                </td>
                                <td> <a href=""><span class="btn btn-secondary">Editar </span></a></td>
                                <td> <a href=""><span class="btn btn-danger">Eliminar</span></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!--Formulario-->

            <div class="col-xl-5 col-lg-12">
                <div class="card mb-5 shadow-sm border-0 shadow-hover">
                    <div class="card-header bg-light border-0 pt-3 pb-0">
                        <br>
                        <h5 style="text-align: center">Registrar paciente</h5>
                        <br>

                        <form action="php/ingresarP.php" method="post" enctype="multipart/form-data">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <div class="form-group">
                                        <label for="inputAddress">Numero de cedula</label>
                                        <input type="text" class="form-control" name="idP" placeholder="305390002">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputAddress">Numero celular</label>
                                    <input type="text" class="form-control" name="numeroP" placeholder="61857405">
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="form-group">
                                        <label for="inputAddress">Nombre completo</label>
                                        <input type="text" class="form-control" name="nombreP"
                                            placeholder="Nombre y Apellidos">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Email</label>
                                    <input type="email" class="form-control" name="correoP" placeholder="Email">
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="form-group">
                                        <label for="inputPassword4">Enfermedades</label>
                                        <input type="text" class="form-control" name="enfermedadesP"
                                            placeholder="Diabetes,Presion alta...">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Alergias</label>
                                    <input type="text" class="form-control" name="alergiasP"
                                        placeholder="Alergia a algun medicamento">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Observaciones</label>
                                    <input type="text" class="form-control" name="observacionesP"
                                        placeholder="Observaciones sobre el paciente">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Dentista</label>
                                    <input type="text" class="form-control" name="dentistaP"
                                        placeholder="Dentista del pasiciente  ">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Fecha de Nacimiento</label>
                                    <input type="text" class="form-control datepicker entrada" name="fechanaciP"
                                        placeholder="23/5/2002">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Fecha de ingreso</label>
                                    <input type="text" class="form-control datepicker entrada" placeholder="26/7/2020"
                                        name="fechaingrP">
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress">Datos importantes</label>
                                    <input type="text" class="form-control" name="datosP"
                                        placeholder="Tipo de tratamiento...">
                                    <label>Foto de paciente</label>
                                    <input type="file" class="form-control" name="img" />
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-secondary">Registrar</button>
                                </div>
                            </div>
                        </form>
                        <br>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
