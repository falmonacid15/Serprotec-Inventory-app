<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WorkOrder;
use App\Commune;
use App\Equipment;
use App\User;


class WorkOrderController extends Controller
{

    public function index(Request $request)
    {
        $workOders = WorkOrder::with('equipment', 'commune', 'user')
            ->where('brand', 'LIKE', '%'.$request->get('search').'%')
            ->paginate(4)
            ->appends($request->all());

        return view('work_orders.index', compact('workOders'));
    }


    public function create()
    {
        $equipments = Equipment::select('id', 'name')->get();
        $communes = Commune::select('id', 'name')->get();
        $users = User::select('id', 'name')->get();
        return view('work_orders.create', compact('equipments', 'communes', 'users'));
    }


    public function store(Request $request)
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
        $workOrder = new WorkOrder();
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
    }


    public function show($id)
    {
        $workOrder= WorkOrder::with('equipment', 'commune', 'user')->find($id);

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

        return redirect()->route('work_orders.index')->with('success','Registro exitoso');
    }


    public function destroy($id)
    {
        $workOrder = WorkOrder::find($id);
        $workOrder->delete();

        return redirect()->route('work_orders.index')->with('success','Orden de trabajo eliminada exitosamente');
    }
}
