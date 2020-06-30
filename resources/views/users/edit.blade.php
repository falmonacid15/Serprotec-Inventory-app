@extends('layout')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Editar usuario</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                        <li class="breadcrumb-item active">Edicion de usuario</li>
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
                        <form method="POST" action="{{route('users.update',$user)}}">
                            @csrf
                            @method('PUT')
                            @include('partials.errors')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Nombre</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}" placeholder="Ingrese nombre">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}" placeholder="Ingrese email">
                                </div>
                                <div class="form-group">
                                    <label for="rut">Rut</label>
                                    <input type="text" class="form-control" name="rut" value="{{$user->rut}}" placeholder="Ingrese rut" id="rut">
                                </div>
                                <div class="form-group">
                                    <label for="role">Rol</label>
                                    <select name="role" id="role" class="form-control">
                                        <option value="">Seleccione</option>
                                        <option value="Administrador" {{ ($user->role == 'Administrador') ? 'selected' : ''}}>Administrador</option>
                                        <option value="Técnico" {{ ($user->role == 'Técnico') ? 'selected' : ''}}>Técnico</option>
                                        <option value="Secretaría" {{ ($user->role == 'Secretaría') ? 'selected' : ''}}>Secretaría</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="password">Contraseña (Opcional)</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Ingrese contraseña">
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
