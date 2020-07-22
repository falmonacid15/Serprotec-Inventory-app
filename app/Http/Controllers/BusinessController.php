<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Business;
use App\Customer;

class BusinessController extends Controller
{

    public function index(Request $request)
    {
        $businesses = Business::with('customer')
            ->where('name', 'LIKE', '%'.$request->get('search').'%')
            ->paginate(4)
            ->appends($request->all());

        return view('businesses.index', compact('businesses'));
    }


    public function create()
    {
        $customers = Customer::select('id', 'name', 'surname')->get();
        return view('businesses.create', compact('customers'));
    }


    public function store(Request $request)
    {
        // Validacion de datos
        $this->validate($request, [
            'name' => 'required|string|max:100',
            'address' => 'required|string|max:100',
            'phone' => 'required|string|max:12',
            'social_reason' => 'required|string',
            'customer_id' => 'required'
        ]);

        // Insertando datos a la tabla user
        //dd($request->all());
        $business = new Business();
        $business->name = $request->get('name');
        $business->address = $request->get('address');
        $business->phone = $request->get('phone');
        $business->social_reason = $request->get('social_reason');
        $business->customer_id = $request->get('customer_id');
        $business->save();

        return redirect()->route('businesses.index')->with('success','Registro exitoso');
    }


    public function show($id)
    {
        $business = Business::with('customer', 'equipments')->find($id);

        return view('businesses.show', compact ('business'));
    }


    public function edit($id)
    {
        $customers = Customer::select('id', 'name', 'surname')->get();
        $business = Business::with('customer')->find($id);

        return view('businesses.edit', compact ('business', 'customers'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:100',
            'address' => 'required|string|max:100',
            'phone' => 'required|string|max:12',
            'social_reason' => 'required|string',
            'customer_id' => 'required'
        ]);

        $business = Business::find($id);
        $business->name = $request->get('name');
        $business->address = $request->get('address');
        $business->phone = $request->get('phone');
        $business->social_reason = $request->get('social_reason');
        $business->customer_id = $request->get('customer_id');

        $business->save();

        return redirect()->route('businesses.index')->with('success','Edicion exitosa');
    }


    public function destroy($id)
    {
        $business = Business::find($id);
        if($business->equipments->count() || $business->workOrders->count()){
            return redirect()->route('businesses.index')->with('delete-error','Empresa presente en orden de trabajo/equipo');
        }
        $business->delete();

        return redirect()->route('businesses.index')->with('success','Empresa eliminada exitosamente');
    }
}
