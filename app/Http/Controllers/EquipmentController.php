<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Equipment;
use App\EquipmentType;

class EquipmentController extends Controller
{

    public function index(Request $request)
    {
        $equipments = Equipment::with('equipmentType')
            ->where('brand', 'LIKE', '%'.$request->get('search').'%')
            ->paginate(4)
            ->appends($request->all());

        return view('equipments.index', compact('equipments'));
    }


    public function create()
    {
        $equipmentTypes = EquipmentType::select('id', 'name')->get();
        return view('equipments.create', compact('equipmentTypes'));
    }


    public function store(Request $request)
    {
        // Validacion de datos
        $this->validate($request, [
            'brand' => 'required|string|max:100',
            'model' => 'required|string|max:100',
            'equipment_type_id' => 'required',

        ]);

        // Insertando datos a la tabla user
        //dd($request->all());
        $equipment = new Equipment();
        $equipment->brand = $request->get('brand');
        $equipment->model = $request->get('model');
        $equipment->equipment_type_id = $request->get('equipment_type_id');
        $equipment->save();

        return redirect()->route('equipments.index')->with('success','Registro exitoso');
    }


    public function show($id)
    {
        $equipment= Equipment::with('equipmentType')->find($id);

        return view('equipments.show', compact ('equipment'));
    }


    public function edit($id)
    {
        $equipment = Equipment::with('equipmentType')->find($id);
        $equipmentTypes = EquipmentType::select('id', 'name')->get();

        return view('equipments.edit', compact ('equipmentTypes', 'equipment'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'brand' => 'required|string|max:100',
            'model' => 'required|string|max:100',
            'equipment_type_id' => 'required',
        ]);

        $equipment = Equipment::find($id);
        $equipment->brand = $request->get('brand');
        $equipment->model = $request->get('model');
        $equipment->equipment_type_id = $request->get('equipment_type_id');

        $equipment->save();

        return redirect()->route('equipments.index')->with('success','Registro exitoso');
    }


    public function destroy($id)
    {
        $equipment = Equipment::find($id);

        if($equipment->businesses->count() || $equipment->workOrders->count()){
            return redirect()->route('equipments.index')->with('delete-error','Equipo presente en orden de trabajo/empresa');
        }
        $equipment->delete();

        return redirect()->route('equipments.index')->with('success','Equipo eliminado exitosamente');
    }
}
