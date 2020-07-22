<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\customer;

class CustomerController extends Controller
{

    public function index(Request $request)
    {
        $customers = Customer::where('name', 'LIKE', '%'.$request->get('search').'%')->paginate(4)->appends($request->all());
        return view('customers.index', compact('customers'));
    }


    public function create()
    {
        return view('customers.create');
    }


    public function store(Request $request)
    {
        // Validacion de datos
        $this->validate($request, [
            'name' => 'required|string|max:100',
            'surname' => 'required|string|max:100',
            'email' => 'required|email|unique:customers,email',
            'phone' => 'required|string|max:12',
            'rut' => 'required|string|unique:customers,rut|max:12',
        ]);

        // Insertando datos a la tabla user
        //dd($request->all());
        $customer = new Customer();
        $customer->name = $request->get('name');
        $customer->surname = $request->get('surname');
        $customer->email = $request->get('email');
        $customer->phone = $request->get('phone');
        $customer->rut = $request->get('rut');
        $customer->save();

        return redirect()->route('customers.index')->with('success','Registro exitoso');
    }


    public function show($id)
    {
        $customer = Customer::find($id);

        return view('customers.show', compact ('customer'));
    }


    public function edit($id)
    {
        $customer = Customer::find($id);

        return view('customers.edit', compact ('customer'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:100',
            'surname' => 'required|string|max:100',
            'email' => 'required|email|unique:customers,email,' . $id,
            'phone' => 'required|string|max:12',
            'rut' => 'required|string|max:12|unique:customers,rut,' . $id,
        ]);

        $customer = Customer::find($id);
        $customer->name = $request->get('name');
        $customer->surname = $request->get('surname');
        $customer->email = $request->get('email');
        $customer->phone = $request->get('phone');
        $customer->rut = $request->get('rut');

        $customer->save();

        return redirect()->route('customers.index')->with('success','Edicion exitosa');
    }


    public function destroy($id)
    {
        $customer = Customer::find($id);
        if($customer->businesses->count()){
            return redirect()->route('customers.index')->with('delete-error','Cliente presente en una empresa');
        }
        $customer->delete();

        return redirect()->route('customers.index')->with('success','Cliente eliminado exitosamente');
    }
}
