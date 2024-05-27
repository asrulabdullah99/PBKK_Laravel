<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Dosen;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class DosenController extends Controller
{
    public function index(): View
    {
       $dosen = Dosen::latest()->paginate(10);
       return view('dosen.index',compact('dosen'));
    }

    public function create(): View
    {
        $user = User::all();
        return view('dosen.create', compact('user'));
    }

    public function store(Request $request): RedirectResponse
    {
       
        //validate form
        $request->validate([
            'nidn'          => 'required|min:10|unique:dosen,nidn',
            'nama_dosen'    => 'required|min:5',
            'jenis_kelamin' => 'required'
        ]);

        Dosen::create([
            'user_id'          => $request->user_id,
            'nidn'             => $request->nidn,
            'nama_dosen'       => $request->nama_dosen, 
            'jenis_kelamin'    => $request->jenis_kelamin,
        ]);
        //redirect to index
        return redirect()->route('dosen.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    
}
