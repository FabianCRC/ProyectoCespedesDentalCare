<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Cespedes Dental Care</title>
    <link href="static/css/styles.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <link rel="stylesheet" href="<?php echo URL::asset('static/css/styles.css'); ?>">
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous">
    </script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });

    </script>
    @yield('head')
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!--Titulo del Sitio-->
        <a class="navbar-brand" href="">Cespedes Dental Care</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i
                class="fas fa-bars"></i></button>

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">

        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="{{ route('Perfil.index') }}">Mi Perfil</a>
                    <div class="dropdown-divider"></div>

                    <!--Aqui va el logout-->

                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                        {{ __('Cerrar Sesión') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>


                </div>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Menu</div>
                        <a class="nav-link" href="{{ route('Calendario.index') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                            Inicio
                        </a>
                        <a class="nav-link" href="{{ route('Citas.index') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-calendar-week"></i></div>
                            Citas
                        </a>
                        @if (Auth::user()->idRol == 1)
                            <a class="nav-link" href="{{ route('CitasPagina.index') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-calendar-week"></i></div>
                                Citas en línea 
                            </a>
                        @endif
                        <a class="nav-link" href="{{ route('Pacientes.index') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-address-book"></i></div>
                            Pacientes
                        </a>
                        <a class="nav-link" href="{{ route('Servicios.index') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-list-alt"></i></div>
                            Servicios
                        </a>
                        @if (Auth::user()->idRol == 1)
                            <a class="nav-link" href="{{ route('Usuarios.index') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-address-card"></i></div>
                                Usuarios
                            </a>
                        @endif
                        @if (Auth::user()->idRol == 1)
                            <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseLayouts"
                                aria-expanded="true" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><svg class="svg-inline--fa fa-columns fa-w-16"
                                        aria-hidden="true" focusable="false" data-prefix="fas" data-icon="columns"
                                        role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                        data-fa-i2svg="">
                                        <path fill="currentColor"
                                            d="M464 32H48C21.49 32 0 53.49 0 80v352c0 26.51 21.49 48 48 48h416c26.51 0 48-21.49 48-48V80c0-26.51-21.49-48-48-48zM224 416H64V160h160v256zm224 0H288V160h160v256z">
                                        </path>
                                    </svg><!-- <i class="fas fa-columns"></i> Font Awesome fontawesome.com -->
                                </div>
                                Auditoria
                                <div class="sb-sidenav-collapse-arrow"><svg class="svg-inline--fa fa-angle-down fa-w-10"
                                        aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-down"
                                        role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"
                                        data-fa-i2svg="">
                                        <path fill="currentColor"
                                            d="M143 352.3L7 216.3c-9.4-9.4-9.4-24.6 0-33.9l22.6-22.6c9.4-9.4 24.6-9.4 33.9 0l96.4 96.4 96.4-96.4c9.4-9.4 24.6-9.4 33.9 0l22.6 22.6c9.4 9.4 9.4 24.6 0 33.9l-136 136c-9.2 9.4-24.4 9.4-33.8 0z">
                                        </path>
                                    </svg><!-- <i class="fas fa-angle-down"></i> Font Awesome fontawesome.com -->
                                </div>
                            </a>
                            <div class="collapse show" id="collapseLayouts" aria-labelledby="headingOne"
                                data-parent="#sidenavAccordion" style="">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{ route('AuditoriaCitas.index') }}">Citas</a>
                                    <a class="nav-link" href="{{ route('AuditoriaPacientes.index') }}">Pacientes</a>
                                    <a class="nav-link" href="{{ route('AuditoriaUsuarios.index') }}">Usuarios</a>
                                </nav>
                            </div>
                        @endif


                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logeado como:</div>
                    {{ Auth::user()->usuario }}
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container mt-5">
                    <!--Aqui va el Contenido-->
                    @yield('Contenido')


                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Cespedes Dental Care Digital</div>
                        <div>
                            <a href="#"></a>
                            &middot;
                            <a href="#"></a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="static/js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="static/assets/demo/chart-area-demo.js"></script>
    <script src="static/assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/datatables-demo.js"></script>


    <script src="<?php echo URL::asset('static/assets/demo/chart-area-demo.js'); ?>">
    </script>
    <script src="<?php echo URL::asset('static/assets/demo/chart-bar-demo.js'); ?>">
    </script>
    <script src="<?php echo URL::asset('assets/demo/datatables-demo.js'); ?>"></script>
    <script>
        $('#citas').DataTable();
        $('#pacientes').DataTable();
        $('#servicios').DataTable();
        $('#usuarios').DataTable();
        $('#audicitas').DataTable();

    </script>
</body>

</html>
