<?php

use Illuminate\Support\Facades\Route;


Auth::routes([
    'register' => false
]);

Route::prefix('admin')->middleware('auth')->group(function (){
    Route::get('/','AdminController@index')->name('home');
    Route::resource('users', 'UserController')->middleware('role:Administrador');
    Route::resource('customers', 'CustomerController');
    Route::resource('businesses', 'BusinessController');
    Route::resource('equipment_types', 'EquipmentTypeController');
    Route::resource('equipments', 'EquipmentController');
    Route::resource('actions', 'ActionController');
    Route::resource('work_orders', 'WorkOrderController');
});

