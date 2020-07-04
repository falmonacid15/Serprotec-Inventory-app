<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\WorkOrder;
use App\Commune;
use App\Equipment;
use App\User;
use App\Action;
use Carbon\Carbon;


class WorkOrderController extends Controller
{

    public function index(Request $request)
    {
        $workOrders = WorkOrder::with('equipment', 'commune', 'user')
            ->where('ticket_number', 'LIKE', '%'.$request->get('search').'%')
            ->paginate(4)
            ->appends($request->all());

        return view('work_orders.index', compact('workOrders'));
    }


    public function create()
    {
        $equipments = Equipment::select('id', 'brand', 'model')->get();
        $communes = Commune::select('id', 'name')->get();
        $users = User::where('role', 'Técnico')->select('id', 'name')->get();
        $actions = Action::select('id', 'name')->get();
        return view('work_orders.create', compact('equipments', 'communes', 'users', 'actions'));
    }


    public function store(Request $request)
    {
        //dd($request->all());
        $this->validate($request, [
            'equipment_id' => 'required',
            'commune_id' => 'required',
            'user_id' => 'required',
            'service_tag' => 'required|max:255',
            'diagnostic' => 'required|max:255',
            'observation' => 'required|max:255',
            'actions' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);
        // clase carbon da formato a fecha para que la bdd la acepte
        $start_date = Carbon::createFromFormat('d/m/Y', $request->get('start_date'))->format('Y-m-d');
        $end_date = Carbon::createFromFormat('d/m/Y', $request->get('end_date'))->format('Y-m-d');

        $workOrder = new WorkOrder();
        $workOrder->equipment_id = $request->get('equipment_id');
        $workOrder->commune_id = $request->get('commune_id');
        $workOrder->user_id = $request->get('user_id');
        $workOrder->service_tag = $request->get('service_tag');
        $workOrder->diagnostic = $request->get('diagnostic');
        $workOrder->observation = $request->get('observation');
        $workOrder->start_time = $request->get('start_time');
        $workOrder->end_time = $request->get('end_time');
        $workOrder->start_date = $start_date;
        $workOrder->end_date = $end_date;
        $workOrder->ticket_number = time();
        $workOrder->save();

        // hace relacion n:n y la guarda con metodo sync
        $workOrder->actions()->sync($request->get('actions'));

        return redirect()->route('work-orders.index')->with('success','Registro exitoso');
    }


    public function show($id)
    {
        $workOrder= WorkOrder::with('equipment', 'commune', 'user', 'actions')->find($id);

        return view('work_orders.show', compact ('workOrder'));
    }


    public function edit($id)
    {
        $workOrders = WorkOrder::with('equipments', 'communes', 'users')->find($id);
        $equipments = Equipment::select('id', 'name')->get();
        $communes = Commune::select('id', 'name')->get();
        $users = User::select('id', 'name')->get();
        return view('work_orders.create', compact('equipments', 'communes', 'users', 'workOrders'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'diagnostic' => 'required|string',
            'observation' => 'required|string',
            'start_time' => 'required',
            'end_time' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'ticket_number' => 'required',
            'service_tag' => 'required',
            'equipment_id' => 'required',
            'commune_id' => 'required',
            'user_id' => 'required',

        ]);

        //dd($request->all());
        $workOrder = WorkOrder::find($id);
        $workOrder->diagnostic = $request->get('diagnostic');
        $workOrder->observation = $request->get('observation');
        $workOrder->start_time = $request->get('start_time');
        $workOrder->end_time = $request->get('end_time');
        $workOrder->start_date = $request->get('start_date');
        $workOrder->end_date = $request->get('end_date');
        $workOrder->ticket_number = $request->get('ticket_number');
        $workOrder->service_tag = $request->get('service_tag');
        $workOrder->equipment_id = $request->get('equipment_id');
        $workOrder->commune_id = $request->get('commune_id');
        $workOrder->user_id = $request->get('user_id');

        $workOrder->save();

        return redirect()->route('work-orders.index')->with('success','Registro exitoso');
    }


    public function destroy($id)
    {
        $workOrder = WorkOrder::find($id);
        $workOrder->delete();

        return redirect()->route('work-orders.index')->with('success','Orden de trabajo eliminada exitosamente');
    }
}
