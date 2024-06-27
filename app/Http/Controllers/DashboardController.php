<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function adminDashboard(){
        return view('adminDashboard');
    }

    public function dosenDashboard(){
        return view('dosenDashboard');
    }

    public function mahasiswaDashboard(){
        return view('mahasiswaDashboard');
    }
}
