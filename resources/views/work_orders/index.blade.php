@extends('layout')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Listado de ordenes de trabajo</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                        <li class="breadcrumb-item active">Gestion de ordenes de trabajo</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <a class="btn btn-primary mb-3" href="{{route('work-orders.create')}}">Crear orden de trabajo</a>
            <div class="row">
                <div class="col-12">
                    @include('partials.success')
                    <div class="card">
                        <div class="card-header">
                            <div class="card-tools">
                                <form action="{{ route('work-orders.index') }}">
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
                                    <th scope="col">#</th>
                                    <th scope="col">N° de ticket</th>
                                    <th scope="col">Service tag</th>
                                    <th scope="col">Tecnico</th>
                                    <th scope="col">Empresa</th>
                                    <th scope="col">Equipo</th>
                                    <th scope="col">Comuna</th>
                                    <th scope="col">Inicio</th>
                                    <th scope="col">Termino</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($workOrders as $workOrder)
                                    <tr>
                                        <td>{{$workOrder->id}}</td>
                                        <td>{{$workOrder->ticket_number}}</td>
                                        <td>{{$workOrder->service_tag}}</td>
                                        <td>{{"{$workOrder->user->name} {$workOrder->user->surname}"}}</td>
                                        <td>{{ $workOrder->business->name }}</td>
                                        <td>{{"{$workOrder->equipment->brand} / {$workOrder->equipment->model} / {$workOrder->equipment->equipmentType->name}"}}</td>
                                        <td>{{$workOrder->commune->name}}</td>
                                        <td>{{ "{$workOrder->start_date->format('d/m/Y')} {$workOrder->start_time->format('H:m')}" }}</td>
                                        <td>{{ "{$workOrder->end_date->format('d/m/Y')} {$workOrder->end_time->format('H:m')}" }}</td>
                                        <td>
                                            <a href="{{route('work-orders.show', $workOrder->id)}}" class="btn btn-primary">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{route('work-orders.edit', $workOrder->id)}}" class="btn btn-info">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <form method="POST" action="{{route('work-orders.destroy',$workOrder->id) }}">
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
                            {{ $workOrders->links() }}
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection
