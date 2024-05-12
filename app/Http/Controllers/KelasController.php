<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\View\View;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index(): View
    {
       $dataKelas = Kelas::latest()->paginate(10);
       return view('kelas.index',compact('dataKelas'));
    }
}
