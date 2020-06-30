<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Equipment;
use App\EquipmentType;
use App\Business;

class EquipmentController extends Controller
{
    // este metodo te lame los webos
    public function index(Request $request)
    {
        $equipments = Equipment::with('equipmentType', 'business')
            ->where('brand', 'LIKE', '%'.$request->get('search').'%')
            ->paginate(4)
            ->appends($request->all());

        return view('equipments.index', compact('equipments'));
    }


    public function create()
    {
        $equipmentTypes = EquipmentType::select('id', 'name')->get();
        $businesses = Business::select('id', 'name')->get();
        return view('equipments.create', compact('equipmentTypes', 'businesses'));
    }


    public function store(Request $request)
    {
        // Validacion de datos
        $this->validate($request, [
            'brand' => 'required|string|max:100',
            'model' => 'required|string|max:100',
            'equipment_type_id' => 'required',
            'business_id' => 'required',

        ]);

        // Insertando datos a la tabla user
        //dd($request->all());
        $equipment = new Equipment();
        $equipment->brand = $request->get('brand');
        $equipment->model = $request->get('model');
        $equipment->equipment_type_id = $request->get('equipment_type_id');
        $equipment->business_id = $request->get('business_id');
        $equipment->save();

        return redirect()->route('equipments.index')->with('success','Registro exitoso');
    }


    public function show($id)
    {
        $equipment= Equipment::with('equipmentType', 'business')->find($id);

        return view('equipments.show', compact ('equipment'));
    }


    public function edit($id)
    {
        $equipmentType = EquipmentType::select('id', 'name')->get();
        $business = Business::select('id', 'name')->get();
        $equipment = Equipment::with('equipmentType', 'business')->find($id);

        return view('equipments.edit', compact ('equipmentType', 'business', 'equipment'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'brand' => 'required|string|max:100',
            'model' => 'required|string|max:100',
            'equipment_type_id' => 'required',
            'business_id' => 'required',
        ]);

        $equipment = Business::find($id);
        $equipment->brand = $request->get('brand');
        $equipment->model = $request->get('model');
        $equipment->equipment_type_id = $request->get('equipment_type_id');
        $equipment->business_id = $request->get('business_id');
        $equipment->save();

        return redirect()->route('equipments.index')->with('success','Registro exitoso');
    }


    public function destroy($id)
    {
        $equipment = Equipment::find($id);
        $equipment->delete();

        return redirect()->route('equipments.index')->with('success','Equipo eliminado exitosamente');
    }
}
