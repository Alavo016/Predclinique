<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InfirmierDashboardController extends Controller
{
    public function index(){
        return view('infirmier.dashboard');
    }
}
