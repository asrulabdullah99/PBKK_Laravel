<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(): View
    {
        if (auth()->user()->level != 'admin') {
            abort(404);
        }
        return view('levelAdmin.home');
    }

    public function dosenHome(): View
    {
        if (auth()->user()->level != 'dosen') {
            abort(404);
        }
        return view('levelDosen.dosenHome');
    }
  
    public function mahasiswaHome(): View
    {
        if (auth()->user()->level != 'mahasiswa') {
            abort(404);
        }
        return view('levelMahasiswa.mahasiswaHome');
    }
}
