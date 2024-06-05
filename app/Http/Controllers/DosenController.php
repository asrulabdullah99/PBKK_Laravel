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
        $user = User::where('level','dosen')->get();
        return view('dosen.create', compact('user'));
    }

    public function store(Request $request): RedirectResponse
    {
        //dd($request->all());
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

    public function show(string $id): View
    {
        // $pengguna = User::findOrFail($id);

        // return view('user.show', compact('pengguna'));
    }

    public function edit(string $nidn): View
    {
        $dosen = Dosen::findOrFail($nidn);
        $user = User::where('level','dosen')->get();

        return view('dosen.edit', compact('dosen','user'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'nama_dosen'    => 'required|min:5',
            'jenis_kelamin' => 'required'
        ]);
        $dosen = Dosen::findOrFail($id);
        $dosen->update([
            'user_id'          => $request->user_id,
            'nama_dosen'       => $request->nama_dosen, 
            'jenis_kelamin'    => $request->jenis_kelamin,
        ]);
         return redirect()->route('dosen.index')->with(['success' => 'Data Berhasil Diubah!']);
    }


     public function destroy($nidn): RedirectResponse
    {
         $dosen = Dosen::findOrFail($nidn);
         $dosen->delete();
        return redirect()->route('dosen.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    
}
