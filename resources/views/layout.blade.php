<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Serprotec - Panel de administracion</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{ route('home') }}" class="brand-link">
            <img src="{{ asset('images/logopuro.png') }}" alt="serprotec" class="img-rounded" width="230"
                 style="opacity: .8">
            <span class="brand-text font-weight-light"></span>
        </a>
        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{ asset('images/userlogo.png') }}" class="img-circle elevation-3" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">{{ auth()->user()->name }}</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item">
                        <a href="{{ route('home') }}" class="nav-link">
                            <i class="nav-icon fas fa-home"></i>
                            <p>Inicio</p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link active">
                            <i class="nav-icon fas fa-tools"></i>
                            <p>
                                Administracion
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @if(auth()->user()->role == 'Administrador')
                                <li class="nav-item">
                                    <a href="{{route ('users.index')}}" class="nav-link">
                                        <i class="nav-icon fas fa-users-cog"></i>
                                        <p>Gestion de usuarios</p>
                                    </a>
                                </li>
                            @endif
                            <li class="nav-item">
                                <a href="{{route ('customers.index')}}" class="nav-link">
                                    <i class="nav-icon fas fa-users"></i>
                                    <p>Gestion de clientes</p>
                                </a>
                            </li>
                                <li class="nav-item">
                                    <a href="{{route ('businesses.index')}}" class="nav-link">
                                        <i class="nav-icon fas fa-building"></i>
                                        <p>Gestion de empresas</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('equipments.index') }}" class="nav-link">
                                        <i class="nav-icon fas fa-desktop"></i>
                                        <p>Gestion de equipos</p>
                                    </a>
                                </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link active">
                            <i class="nav-icon fas fa-toolbox"></i>
                            <p>
                                Soporte
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route ('users.index')}}" class="nav-link">
                                    <i class="nav-icon fas fa-paste"></i>
                                    <p>Gestion de ordenes</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link active">
                            <i class="nav-icon fas fa-align-justify"></i>
                            <p>
                                Mantenedores
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('equipment_types.index') }}" class="nav-link">
                                    <i class="nav-icon fas fa-desktop"></i>
                                    <p>tipos de equipo</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-tasks"></i>
                                    <p>Acciones OT</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link">
                            <i class="nav-icon fas fa-reply"></i>
                            <p>
                                Cerrar sesion
                            </p>
                        </a>
                        <form action="{{ route('logout') }}" id="logout-form" method="POST" style="display: none;">
                            @csrf

                        </form>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @yield('content')
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
        <div>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
            @endif
        </div>

    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="float-right d-none d-sm-inline">
            Sistema
        </div>
        <!-- Default to the left -->
        <strong>&copy; {{\Carbon\Carbon::now()->year}} Serprotec.</strong> Todos los derechos Reservados.
    </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
<script src="{{ asset('js/rut.js') }}"></script>

<script>
    $(function () {
        $('#rut').Rut({
            format_on: 'keyup'
        });
    });
</script>
</body>
</html>
