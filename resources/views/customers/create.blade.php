@extends('layout')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Nuevo cliente</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                        <li class="breadcrumb-item active">Creacion de cliente</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">Ingrese los datos</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST" action="{{route('customers.store')}}">
                            @csrf
                            @include('partials.errors')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Nombre</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Ingrese nombre">
                                </div>
                                <div class="form-group">
                                    <label for="surname">Apellido</label>
                                    <input type="text" class="form-control" id="surname" name="surname" placeholder="Ingrese apellido">
                                </div>
                                <div class="form-group">
                                    <label for="surname">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Ingrese email">
                                </div>
                                <div class="form-group">
                                    <label for="surname">Telefono</label>
                                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Ingrese apellido">
                                </div>
                                <div class="form-group">
                                    <label for="rut">Rut</label>
                                    <input type="text" class="form-control" name="rut" placeholder="Ingrese rut" id="rut">
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection
