@extends('layout')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Ver empresas</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                        <li class="breadcrumb-item active">Vista previa de empresas</li>
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
                                    <input disabled type="text" class="form-control" name="name" value="{{$business->name}}">
                                </div>
                                <div class="form-group">
                                    <label for="rut">Cliente</label>
                                    <input disabled type="text" class="form-control" name="customer_id" value="{{"{$business->customer->name} {$business->customer->surname}"}}">
                                </div>
                                <div class="form-group">
                                    <label for="address">Direccion</label>
                                    <input disabled type="text" class="form-control" name="address" value="{{$business->address}}">
                                </div>
                                <div class="form-group">
                                    <label for="phone">Telefono</label>
                                    <input disabled type="text" class="form-control" name="phone" value="{{$business->phone}}">
                                </div>
                                <div class="form-group">
                                    <label for="social_reason">Razon social</label>
                                    <input disabled type="text" class="form-control" name="social_reason" value="{{$business->social_reason}}">
                                </div>
                                <table class="table table-bordered table-hover mb-3">
                                    <thead>
                                    <tr>
                                        <th>Equipo</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($business->equipments as $equipment)
                                        <tr>
                                            <td>{{ "{$equipment->brand} / {$equipment->model}" }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <a href="{{ route('businesses.index') }}" class="btn btn-primary">Volver</a>
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
