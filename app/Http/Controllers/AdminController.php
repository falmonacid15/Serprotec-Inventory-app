<?php

namespace App\Http\Controllers;

use App\Business;
use App\Customer;
use App\User;
use App\WorkOrder;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $userQuantity = User::count();
        $customerQuantity = Customer::count();
        $businessQuantity = Business::count();
        $workOrderQuantity = WorkOrder::count();

        return view('index', compact('userQuantity', 'customerQuantity', 'businessQuantity', 'workOrderQuantity'));
    }
}
