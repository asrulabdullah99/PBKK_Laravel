<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\View\View;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function index(): View
    {
       $dosen = Dosen::latest()->paginate(10);
       return view('dosen.index',compact('dosen'));
    }
    
}
