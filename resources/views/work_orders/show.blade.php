@extends('layout')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Ver orden de trabajo</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                        <li class="breadcrumb-item active">Vista previa de orden de trabajo</li>
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
                                    <label>N° Ticket</label>
                                    <input disabled type="text" class="form-control" value="{{$workOrder->ticket_number}}">
                                </div>
                                <div class="form-group">
                                    <label>Cliente</label>
                                    <input disabled type="text" class="form-control" value="{{ "{$workOrder->business->customer->name} {$workOrder->business->customer->surname}" }}">
                                </div>
                                <div class="form-group">
                                    <label>Empresa</label>
                                    <input disabled type="text" class="form-control" value="{{ $workOrder->business->name }}">
                                </div>
                                <div class="form-group">
                                    <label>Tipo de equipo</label>
                                    <input disabled type="text" class="form-control" value="{{$workOrder->equipment->equipmentType->name}}">
                                </div>
                                <div class="form-group">
                                    <label>Equipo</label>
                                    <input disabled type="text" class="form-control" value="{{ "{$workOrder->equipment->brand} {$workOrder->equipment->model}" }}">
                                </div>
                                <div class="form-group">
                                    <label>Comuna</label>
                                    <input disabled type="text" class="form-control" value="{{$workOrder->commune->name}}">
                                </div>
                                <div class="form-group">
                                    <label>Tecnico</label>
                                    <input disabled type="text" class="form-control" value="{{$workOrder->user->name}}">
                                </div>
                                <div class="form-group">
                                    <label>Service tag</label>
                                    <input disabled type="text" class="form-control" value="{{$workOrder->service_tag}}">
                                </div>
                                <div class="form-group">
                                    <label>Diagnostico</label>
                                    <textarea rows="5" class="form-control" disabled>{{$workOrder->diagnostic}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Observacion</label>
                                    <textarea rows="5" class="form-control" disabled>{{$workOrder->observation}}</textarea>
                                </div>
                                <table class="table table-bordered table-hover mb-3">
                                    <thead>
                                        <tr>
                                            <th>Accion</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($workOrder->actions as $action)
                                            <tr>
                                                <td>{{$action->name}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="form-group">
                                    <label>inicio</label>
                                    <input type="text" class="form-control" disabled value="{{ "{$workOrder->start_date->format('d/m/Y')} {$workOrder->start_time->format('H:m')}" }}">
                                </div>
                                <div class="form-group">
                                    <label>Termino</label>
                                    <input type="text" class="form-control" disabled value="{{ "{$workOrder->end_date->format('d/m/Y')} {$workOrder->end_time->format('H:m')}" }}">
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <a href="{{ route('work-orders.index') }}" class="btn btn-primary">Volver</a>
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
