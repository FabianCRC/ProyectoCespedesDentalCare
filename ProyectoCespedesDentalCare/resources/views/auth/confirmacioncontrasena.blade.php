@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Se ha enviado') }}</div>

                    <div class="card-body">
                        <div>
                            En caso de que el email indicado este registrado como usuario en el sistema,
                            se le ha enviado un correo con las credenciales para el inicio de sesión, por favor vuelva a
                            iniciar sesión.
                        </div>
                        <br/>
                        <div class="form-group row mb-0">
                   
                            <div class="col-md-6 offset-md-4">
                                <a href="{{ route('login') }}" class="btn btn-secondary">
                                    {{ __('Volver al login') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
