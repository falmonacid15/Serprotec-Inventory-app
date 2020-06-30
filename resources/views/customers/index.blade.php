@extends('layout')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Listado de clientes</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                        <li class="breadcrumb-item active">Gestion de clientes</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <a class="btn btn-primary mb-3" href="{{route('customers.create')}}">Crear Cliente</a>
            <div class="row">
                <div class="col-12">
                    @include('partials.success')
                    <div class="card">
                        <div class="card-header">
                            <div class="card-tools">
                                <form action="{{ route('customers.index') }}">
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
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Apellido</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Telefono</th>
                                    <th scope="col">Rut</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($customers as $customer)
                                    <tr>
                                        <td>{{$customer->id}}</td>
                                        <td>{{$customer->name}}</td>
                                        <td>{{$customer->surname}}</td>
                                        <td>{{$customer->email}}</td>
                                        <td>{{$customer->phone}}</td>
                                        <td>{{$customer->rut }}</td>
                                        <td>
                                            <a href="{{route('customers.show', $customer->id)}}" class="btn btn-primary">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{route('customers.edit', $customer->id)}}" class="btn btn-info">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <form method="POST" action="{{route('customers.destroy',$customer->id) }}">
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
                            {{ $customers->links() }}
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection
