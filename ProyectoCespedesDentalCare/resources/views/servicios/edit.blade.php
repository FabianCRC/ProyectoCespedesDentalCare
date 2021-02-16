@extends('layout')
<!--Hereda la navegacion-->
@section('Contenido')
    <div class="col-lg-12">
        <div class="card mb-5 shadow-sm border-0 shadow-hover">
            <div class="card-header bg-light border-0 pt-3 pb-0">
                <br>
                <h1 style="text-align: center">Editar Servicio</h1>
                <br>
                @foreach ($servicios as $servicio)
                    <form action="{{ route('Servicios.update', $servicio->id_Servicio) }}" method="post">
                        @csrf
                        @method('PATCH')
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <div class="form-group">
                                    <label for="inputAddress">Nombre de servicio</label>
                                    <input type="text" class="form-control" autocomplete="off" name="nombre_Servicio"
                                        placeholder="Calza..." value="{{ $servicio->nombre_Servicio }}">
                                    @error('nombre_Servicio')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        
                            <div class="form-group col-md-6">
                                <div class="form-group">
                                    <label for="inputAddress">Precio</label>
                                    <input type="text" class="form-control" name="precio_Servicio" autocomplete="off"
                                        placeholder="35.000" value="{{ $servicio->precio_Servicio }}">
                                    @error('precio_Servicio')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="inputAddress">Descripción</label>
                                <textarea type="text" class="form-control" name="descripcion_Servicio" autocomplete="off"
                                    placeholder="Descripción..." value="{{ $servicio->descripcion_Servicio }}"></textarea>
                                @error('descripcion_Servicio')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="text-center">
                            <button style="text-align: " type="submit" class="btn btn-secondary btn-block">Guardar
                                Cambios</button>
                        </div>
                    </form>
                @endforeach

                <br>

            </div>
        </div>
    </div>

@endsection
