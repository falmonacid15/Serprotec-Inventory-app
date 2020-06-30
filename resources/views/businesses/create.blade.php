@extends('layout')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Nueva empresa</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                        <li class="breadcrumb-item active">Creacion de empresa</li>
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
                        <form method="POST" action="{{route('businesses.store')}}">
                            @csrf
                            @include('partials.errors')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Nombre</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Ingrese nombre">
                                </div>
                                <div class="form-group">
                                    <label for="surname">Direccion</label>
                                    <input type="text" class="form-control" id="address" name="address" placeholder="Ingrese direccion">
                                </div>
                                <div class="form-group">
                                    <label for="surname">Telefono</label>
                                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Ingrese telefono">
                                </div>
                                <div class="form-group">
                                    <label for="rut">Razon social</label>
                                    <input type="text" class="form-control" name="social_reason" placeholder="Ingrese razon social">
                                </div>
                                <div class="form-group">
                                    <label for="customer_id">Cliente</label>
                                    <select name="customer_id" id="customer_id" class="form-control">
                                        <option value="" selected>Seleccione</option>
                                        @foreach($customers as $customer)
                                            <option value="{{ $customer->id}}">{{ "{$customer->name} {$customer->surname}" }}</option>
                                        @endforeach
                                    </select>
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
