<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Action;

class ActionController extends Controller
{

    public function index(Request $request)
    {
        $actions = Action::where('name', 'LIKE', '%'.$request->get('search').'%')->paginate(4)->appends($request->all());
        return view('actions.index', compact('actions'));
    }


    public function create()
    {
        return view('actions.create');
    }


    public function store(Request $request)
    {
        // Validacion de datos
        $this->validate($request, [
            'name' => 'required|string|max:100',
        ]);

        // Insertando datos a la tabla user
        //dd($request->all());
        $action= new Action();
        $action->name = $request->get('name');
        $action->save();

        return redirect()->route('actions.index')->with('success','Registro exitoso');
    }


    public function show($id)
    {
        $action = Action::find($id);

        return view('actions.show', compact ('action'));
    }


    public function edit($id)
    {
        $action = Action::find($id);

        return view('actions.edit', compact ('action'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:100',
        ]);

        $action= Action::find($id);
        $action->name = $request->get('name');

        $action->save();

        return redirect()->route('actions.index')->with('success','Edicion exitosa');
    }


    public function destroy($id)
    {
        $action = Action::find($id);

        if($action->workOrders->count()){
            return redirect()->route('actions.index')->with('delete-error','Accion presente en una orden de trabajo');
        }
        $action->delete();

        return redirect()->route('actions.index')->with('success','Accion eliminado exitosamente');
    }
}
