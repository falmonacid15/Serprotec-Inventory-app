<?php

use Illuminate\Support\Facades\Route;


Auth::routes([
    'register' => false
]);

Route::prefix('admin')->middleware('auth')->group(function (){
    Route::get('/','AdminController@index')->name('home');

    // Rutas Users
    Route::get('users', 'UserController@index')->name('users.index')->middleware('role:Administrador');
    Route::get('users/create', 'UserController@create')->name('users.create')->middleware('role:Administrador');
    Route::post('users', 'UserController@store')->name('users.store')->middleware('role:Administrador');
    Route::get('users/{id}', 'UserController@show')->name('users.show')->middleware('role:Administrador');
    Route::get('users/{id}/edit', 'UserController@edit')->name('users.edit')->middleware('role:Administrador');
    Route::put('users/{id}', 'UserController@update')->name('users.update')->middleware('role:Administrador');
    Route::delete('users/{id}', 'UserController@destroy')->name('users.destroy')->middleware('role:Administrador');

    // Rutas Customers
    Route::get('customers', 'CustomerController@index')->name('customers.index')->middleware('role:Administrador,Técnico,Secretaría');
    Route::get('customers/create', 'CustomerController@create')->name('customers.create')->middleware('role:Administrador,Secretaría');
    Route::post('customers', 'CustomerController@store')->name('customers.store')->middleware('role:Administrador,Secretaría');
    Route::get('customers/{id}', 'CustomerController@show')->name('customers.show')->middleware('role:Administrador,Técnico,Secretaría');
    Route::get('customers/{id}/edit', 'CustomerController@edit')->name('customers.edit')->middleware('role:Administrador,Secretaría');
    Route::put('customers/{id}', 'CustomerController@update')->name('customers.update')->middleware('role:Administrador,Secretaría');
    Route::delete('customers/{id}', 'CustomerController@destroy')->name('customers.destroy')->middleware('role:Administrador,Secretaría');

    // Rutas Businesses
    Route::get('businesses', 'BusinessController@index')->name('businesses.index')->middleware('role:Administrador');
    Route::get('businesses/create', 'BusinessController@create')->name('businesses.create')->middleware('role:Administrador');
    Route::post('businesses', 'BusinessController@store')->name('businesses.store')->middleware('role:Administrador');
    Route::get('businesses/{id}', 'BusinessController@show')->name('businesses.show')->middleware('role:Administrador');
    Route::get('businesses/{id}/edit', 'BusinessController@edit')->name('businesses.edit')->middleware('role:Administrador');
    Route::put('businesses/{id}', 'BusinessController@update')->name('businesses.update')->middleware('role:Administrador');
    Route::delete('businesses/{id}', 'BusinessController@destroy')->name('businesses.destroy')->middleware('role:Administrador');

    // Rutas Equipment Types
    Route::get('equipment-types', 'EquipmentTypeController@index')->name('equipment-types.index')->middleware('role:Administrador,Técnico');
    Route::get('equipment-types/create', 'EquipmentTypeController@create')->name('equipment-types.create')->middleware('role:Administrador,Técnico');
    Route::post('equipment-types', 'EquipmentTypeController@store')->name('equipment-types.store')->middleware('role:Administrador,Técnico');
    Route::get('equipment-types/{id}', 'EquipmentTypeController@show')->name('equipment-types.show')->middleware('role:Administrador,Técnico');
    Route::get('equipment-types/{id}/edit', 'EquipmentTypeController@edit')->name('equipment-types.edit')->middleware('role:Administrador,Técnico');
    Route::put('equipment-types/{id}', 'EquipmentTypeController@update')->name('equipment-types.update')->middleware('role:Administrador,Técnico');
    Route::delete('equipment-types/{id}', 'EquipmentTypeController@destroy')->name('equipment-types.destroy')->middleware('role:Administrador,Técnico');

    //Rutas Equipment
    Route::get('equipments', 'EquipmentController@index')->name('equipments.index')->middleware('role:Administrador,Técnico');
    Route::get('equipments/create', 'EquipmentController@create')->name('equipments.create')->middleware('role:Administrador,Técnico');
    Route::post('equipments', 'EquipmentController@store')->name('equipments.store')->middleware('role:Administrador,Técnico');
    Route::get('equipments/{id}', 'EquipmentController@show')->name('equipments.show')->middleware('role:Administrador,Técnico');
    Route::get('equipments/{id}/edit', 'EquipmentController@edit')->name('equipments.edit')->middleware('role:Administrador,Técnico');
    Route::put('equipments/{id}', 'EquipmentController@update')->name('equipments.update')->middleware('role:Administrador,Técnico');
    Route::delete('equipments/{id}', 'EquipmentController@destroy')->name('equipments.destroy')->middleware('role:Administrador,Técnico');

    // Rutas Actions
    Route::get('actions', 'ActionController@index')->name('actions.index')->middleware('role:Administrador,Técnico');
    Route::get('actions/create', 'ActionController@create')->name('actions.create')->middleware('role:Administrador,Técnico');
    Route::post('actions', 'ActionController@store')->name('actions.store')->middleware('role:Administrador,Técnico');
    Route::get('actions/{id}', 'ActionController@show')->name('actions.show')->middleware('role:Administrador,Técnico');
    Route::get('actions/{id}/edit', 'ActionController@edit')->name('actions.edit')->middleware('role:Administrador,Técnico');
    Route::put('actions/{id}', 'ActionController@update')->name('actions.update')->middleware('role:Administrador,Técnico');
    Route::delete('actions/{id}', 'ActionController@destroy')->name('actions.destroy')->middleware('role:Administrador,Técnico');

    // Rutas Work Orders
    Route::get('work-orders', 'WorkOrderController@index')->name('work-orders.index')->middleware('role:Administrador,Técnico,Secretaría');
    Route::get('work-orders/create', 'WorkOrderController@create')->name('work-orders.create')->middleware('role:Administrador,Técnico');
    Route::post('work-orders', 'WorkOrderController@store')->name('work-orders.store')->middleware('role:Administrador,Técnico');
    Route::get('work-orders/{id}', 'WorkOrderController@show')->name('work-orders.show')->middleware('role:Administrador,Técnico,Secretaría');
    Route::get('work-orders/{id}/edit', 'WorkOrderController@edit')->name('work-orders.edit')->middleware('role:Administrador,Técnico');
    Route::put('work-orders/{id}', 'WorkOrderController@update')->name('work-orders.update')->middleware('role:Administrador,Técnico');
    Route::delete('work-orders/{id}', 'WorkOrderController@destroy')->name('work-orders.destroy')->middleware('role:Administrador,Técnico');

});

