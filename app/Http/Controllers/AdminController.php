<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $userQuantity = User::count();


        return view('index', compact('userQuantity'));
    }
}
