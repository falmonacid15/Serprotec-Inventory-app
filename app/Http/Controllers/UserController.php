<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;

class UserController extends Controller
{

    public function index(Request $request) // Muestra Listado de todos los usuarios
    {
        $users = User::where('name', 'LIKE', '%'.$request->get('search').'%')->paginate(4)->appends($request->all());

        return view('users.index', compact ('users'));
    }

    public function create() // Mostrara formulario para crear usuarios
    {
        return view('users.create');
    }

    public function store(Request $request) // Guardara los datos del formulario create
    {
        // Validacion de datos
        $this->validate($request, [
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'rut' => 'required|string|unique:users,rut|max:12',
            'role' => 'required|in:Administrador,Técnico,Secretaría',
            'password' => 'required|min:6'
        ]);

        // Insertando datos a la tabla user
        //dd($request->all());
        $user = new User();
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->rut = $request->get('rut');
        $user->role = $request->get('role');
        $user->password = bcrypt($request->get('password'));
        $user->save();

        return redirect()->route('users.index')->with('success','Registro exitoso');
    }

    public function show($id) // Mostrar datos de un usuario concreto
    {
        $user = User::find($id);

        return view('users.show', compact ('user'));
    }

    public function edit($id) // Muestra el formulario para editar un usuario
    {
        $user = User::find($id);

        return view('users.edit', compact ('user'));
    }

    public function update(Request $request, $id) // guarda los datos del formulario edit
    {
        $this->validate($request, [
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email,' . $id,
            'rut' => 'required|string|max:12|unique:users,rut,' . $id,
            'role' => 'required|in:Administrador,Técnico,Secretaría',
            'password' => 'nullable|min:6'
        ]);

        $user = User::find($id);
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->rut = $request->get('rut');
        $user->role = $request->get('role');

        if ($request->get('password')){
            $user->password = bcrypt($request->get('password'));
        }

        $user->save();

        return redirect()->route('users.index')->with('success','Edicion exitosa');
    }

    public function destroy($id) // Borra los datos de un usuario segun su id
    {
        $user = User::find($id);

        if($user->workOrders->count()){
            return redirect()->route('users.index')->with('delete-error','Tecnico presente en una orden de trabajo');
        }
        $user->delete();

        return redirect()->route('users.index')->with('success','Usuario eliminado exitosamente');
    }
}
