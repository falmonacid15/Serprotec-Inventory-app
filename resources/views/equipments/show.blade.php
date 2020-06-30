@extends('layout')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Ver equipos</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                        <li class="breadcrumb-item active">Vista previa de equipos</li>
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
                                    <label for="brand">Marca</label>
                                    <input disabled type="text" class="form-control" name="brand" value="{{$equipment->brand}}">
                                </div>
                                <div class="form-group">
                                    <label for="model">Modelo</label>
                                    <input disabled type="text" class="form-control" name="model" value="{{$equipment->model}}">
                                </div>
                                <div class="form-group">
                                    <label for="business_id">Empresa</label>
                                    <input disabled type="text" class="form-control" name="business_id" value="{{"{$equipment->business->name}"}}">
                                </div>
                                <div class="form-group">
                                    <label for="equipment_type_id">Cliente</label>
                                    <input disabled type="text" class="form-control" name="equipment_type_id" value="{{"{$equipment->equipmentType->name}"}}">
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <a href="{{ route('equipments.index') }}" class="btn btn-primary">Volver</a>
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
