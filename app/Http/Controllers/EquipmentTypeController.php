<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EquipmentType;

class EquipmentTypeController extends Controller
{

    public function index(Request $request)
    {
        $equipment_types = EquipmentType::where('name', 'LIKE', '%'.$request->get('search').'%')->paginate(4)->appends($request->all());
        return view('equipment_types.index', compact('equipment_types'));
    }


    public function create()
    {
        return view('equipment_types.create');
    }


    public function store(Request $request)
    {
        // Validacion de datos
        $this->validate($request, [
            'name' => 'required|string|max:100',
        ]);

        // Insertando datos a la tabla user
        //dd($request->all());
        $equipment_type = new EquipmentType();
        $equipment_type->name = $request->get('name');
        $equipment_type->save();

        return redirect()->route('equipment_types.index')->with('success','Registro exitoso');
    }


    public function show($id)
    {
        $equipment_type = EquipmentType::find($id);

        return view('equipment_types.show', compact ('equipment_type'));
    }


    public function edit($id)
    {
        $equipment_type = EquipmentType::find($id);

        return view('equipment_types.edit', compact ('equipment_type'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:100',
        ]);

        $equipment_type = EquipmentType::find($id);
        $equipment_type->name = $request->get('name');

        $equipment_type->save();

        return redirect()->route('equipment_types.index')->with('success','Edicion exitosa');
    }


    public function destroy($id)
    {
        $equipment_type = EquipmentType::find($id);
        $equipment_type->delete();

        return redirect()->route('equipment_types.index')->with('success','Tipo de equipo eliminado exitosamente');
    }
}
