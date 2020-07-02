@extends('layout')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Ver clientes</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                        <li class="breadcrumb-item active">Vista previa de cliente</li>
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
                            <h3 class="card-title">Informacion</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Nombre</label>
                                    <input disabled type="text" class="form-control" name="name" value="{{$customer->name}}">
                                </div>
                                <div class="form-group">
                                    <label for="surname">Apellido</label>
                                    <input disabled type="text" class="form-control" name="surname" value="{{$customer->surname}}">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input disabled type="email" class="form-control" name="email" value="{{$customer->email}}">
                                </div>
                                <div class="form-group">
                                    <label for="phone">Telefono</label>
                                    <input disabled type="phone" class="form-control" name="phone" value="{{$customer->phone}}">
                                </div>
                                <div class="form-group">
                                    <label for="rut">Rut</label>
                                    <input disabled type="text" class="form-control" name="rut" value="{{$customer->rut}}">
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <a href="{{ route('customers.index') }}" class="btn btn-primary">Volver</a>
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
