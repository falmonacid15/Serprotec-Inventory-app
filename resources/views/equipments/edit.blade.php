@extends('layout')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Editar equipo</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                        <li class="breadcrumb-item active">Edicion de equipo</li>
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
                        <form method="POST" action="{{route('equipments.update',$equipment)}}">
                            @csrf
                            @method('PUT')
                            @include('partials.errors')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="brand">Marca</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="brand"
                                        name="brand"
                                        value="{{$equipment->brand}}"
                                        placeholder="Ingrese marca"
                                    >
                                </div>
                                <div class="form-group">
                                    <label for="model">Modelo</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="model"
                                        name="model"
                                        value="{{$equipment->model}}"
                                        placeholder="Ingrese modelo"
                                    >
                                </div>
                                <div class="form-group">
                                    <label for="equipment_type_id">tipo</label>
                                    <select name="equipment_type_id" id="equipment_type_id" class="form-control">
                                        <option value="">Seleccione</option>
                                        @foreach($equipments as $equipment)
                                            <option
                                                value="{{ $equipment->id}}"
                                                {{ ($equipment->equipment_type_id == $equipmentType->id) ? 'selected' : ''}}
                                            >
                                                {{ "{$equipmentType->name}" }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="business_id">empresa</label>
                                    <select name="business_id" id="business_id" class="form-control">
                                        <option value="">Seleccione</option>
                                        @foreach($equipments as $equipment)
                                            <option
                                                value="{{ $equipment->id}}"
                                                {{ ($equipment->business_id == $business->id) ? 'selected' : ''}}
                                            >
                                                {{ "{$business->name}" }}
                                            </option>
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
