@extends('layout')
<!--Hereda la navegacion-->
@section('Contenido')
    <div class="col-lg-12">
        <div class="card mb-5 shadow-sm border-0 shadow-hover">
            <div class="card-header bg-light border-0 pt-3 pb-0">
                <br>
                <h1 style="text-align: center">Registrar Servicio</h1>
                <br>
                <form action="{{ route('Servicios.store') }}" method="post">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <div class="form-group">
                                <label for="inputAddress">Nombre de servicio</label>
                                <input type="text" class="form-control" autocomplete="off" name="nombre_Servicio"
                                    placeholder="Calza...">
                                @if ($errors->any())
                                    @if ($errors->has('nombre_Servicio'))
                                        <div class="form-group">
                                            <p style="color:red;"> {{ $errors->first('nombre_Servicio') }}</p>
                                        </div>
                                    @endif
                                @endif
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <div class="form-group">
                                <label for="inputAddress">Precio</label>
                                <input type="text" class="form-control" name="precio_Servicio" autocomplete="off"
                                    placeholder="35.000">
                                @if ($errors->any())
                                    @if ($errors->has('precio_Servicio'))
                                        <div  class="form-group">
                                            <p style="color:red;"> {{ $errors->first('precio_Servicio') }}</p>
                                        </div>
                                    @endif
                                @endif
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="inputAddress">Descripción</label>
                            <textarea type="text" class="form-control" name="descripcion_Servicio" autocomplete="off"
                                placeholder="Descripción..."></textarea>
                            @if ($errors->any())
                                @if ($errors->has('descripcion_Servicio'))
                                    <div  class="form-group">
                                        <p style="color:red;"> {{ $errors->first('descripcion_Servicio') }}</p>
                                    </div>
                                @endif
                            @endif
                        </div>
                    </div>
                    <div class="text-center">
                        <button style="text-align: " type="submit" class="btn btn-secondary btn-block">Registrar</button>
                    </div>
                </form>
                <br>

            </div>
        </div>
    </div>
@endsection
