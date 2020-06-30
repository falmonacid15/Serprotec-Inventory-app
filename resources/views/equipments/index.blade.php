@extends('layout')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Listado de equipos</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                        <li class="breadcrumb-item active">Gestion de equipos</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <a class="btn btn-primary mb-3" href="{{route('equipments.create')}}">Crear equipo</a>
            <div class="row">
                <div class="col-12">
                    @include('partials.success')
                    <div class="card">
                        <div class="card-header">
                            <div class="card-tools">
                                <form action="{{ route('equipments.index') }}">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <input type="text" name="search" class="form-control float-right" placeholder="busqueda">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table">
                                <thead class="table table-bordered table-dark">
                                <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">Marca</th>
                                    <th scope="col">Modelo</th>
                                    <th scope="col">Tipo</th>
                                    <th scope="col">Empresa</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($equipments as $equipment)
                                    <tr>
                                        <td>{{$equipment->id}}</td>
                                        <td>{{$equipment->brand}}</td>
                                        <td>{{$equipment->model}}</td>
                                        <td>{{ "{$equipment->equipmentType->name}" }}</td>
                                        <td>{{ "{$equipment->business->name}" }}</td>
                                        <td>
                                            <a href="{{route('equipments.show', $equipment->id)}}" class="btn btn-primary">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{route('equipments.edit', $equipment->id)}}" class="btn btn-info">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <form method="POST" action="{{route('equipments.destroy',$equipment->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $equipments->links() }}
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection
