@extends('layout')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Editar orden de trabajo</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                        <li class="breadcrumb-item active">Edicion de ordenes de trabajo</li>
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
                        <form method="POST" action="{{route('work-orders.update',$workOrder)}}">
                            @csrf
                            @method('PUT')
                            @include('partials.errors')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="ticket_number">N° Ticket</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="ticket_number"
                                        name="ticket_number"
                                        value="{{$workOrder->ticket_number}}"
                                        disabled
                                    >
                                </div>
                                <div class="form-group">
                                    <label for="equipment_id">Equipo</label>
                                    <select name="equipment_id" id="equipment_id" class="form-control">
                                        <option value="">Seleccione</option>
                                        @foreach($equipments as $equipment)
                                            <option
                                                value="{{ $equipment->id}}"
                                                {{ ($workOrder->equipment_id == $equipment->id) ? 'selected' : ''}}
                                            >
                                                {{ "{$equipment->brand} {$equipment->model}" }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="commune_id">Comuna</label>
                                    <select name="commune_id" id="commune_id" class="form-control">
                                        <option value="">Seleccione</option>
                                        @foreach($communes as $commune)
                                            <option
                                                value="{{ $commune->id}}"
                                                {{ ($workOrder->commune_id == $commune->id) ? 'selected' : ''}}
                                            >
                                                {{ "{$commune->name}" }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="user_id">Tecnico</label>
                                    <select name="user_id" id="user_id" class="form-control">
                                        <option value="">Seleccione</option>
                                        @foreach($users as $user)
                                            <option
                                                value="{{ $user->id}}"
                                                {{ ($workOrder->user_id == $user->id) ? 'selected' : ''}}
                                            >
                                                {{ "{$user->name}" }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="service_tag">Service Tag</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="service_tag"
                                        name="service_tag"
                                        value="{{$workOrder->service_tag}}"
                                        placeholder="Ingrese service tag"
                                    >
                                </div>
                                <div class="form-group">
                                    <label for="diagnostic">Diagnostico</label>
                                    <textarea class="form-control" name="diagnostic" id="diagnostic" rows="5" placeholder="Ingrese Diagnostico">{{ $workOrder->diagnostic}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="observation">Observacion</label>
                                    <textarea class="form-control" name="observation" id="observation" rows="5" placeholder="Ingrese observacion">{{ $workOrder->observation}}</textarea>
                                </div>
                                <div class="form-group">
                                    <p>Acciones</p>
                                    @foreach($actions as $action)
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="actions{{$action->id}}" name="actions[]" {{ ($workOrder->actions()->where('action_id', $action->id)->exists()) ? 'checked' : ''}} value="{{ $action->id }}">
                                                <label for="actions{{$action->id}}">{{ $action->name }}</label>
                                            </div>
                                    @endforeach
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="start_date">Fecha inicio</label>
                                            <input type="text" class="form-control" id="start_date" name="start_date" placeholder="Ingrese fecha inicio" value="{{$workOrder->start_date->format('d/m/Y')}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="start_time">Hora inicio</label>
                                            <input type="text" class="form-control" id="start_time" name="start_time" placeholder="Ingrese hora inicio" value="{{$workOrder->start_time->format('H:m')}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="end_date">Fecha termino</label>
                                            <input type="text" class="form-control" id="end_date" name="end_date" placeholder="Ingrese fecha termino" value="{{$workOrder->end_date->format('d/m/Y')}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="end_time">Hora termino</label>
                                            <input type="text" class="form-control" id="end_time" name="end_time" placeholder="Ingrese hora termino" value="{{$workOrder->end_time->format('H:m')}}">
                                        </div>
                                    </div>
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

@section('scripts')
    <script>
        $(function () {
            $('#start_date').datepicker({
                uiLibrary: 'bootstrap4',
                format: 'dd/mm/yyyy'
            });
            $('#end_date').datepicker({
                uiLibrary: 'bootstrap4',
                format: 'dd/mm/yyyy'
            });
            $('#start_time').timepicker({
                uiLibrary: 'bootstrap4'
            });
            $('#end_time').timepicker({
                uiLibrary: 'bootstrap4'
            });
        });
    </script>
@endsection
