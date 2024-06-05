<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kelas;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mahasiswa = Mahasiswa::latest()->paginate(10);
        return view('mahasiswa.index',compact('mahasiswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = User::where('level','mahasiswa')->get();
        $kelas = Kelas::all();
        return view('mahasiswa.create', compact('user','kelas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate form
        //dd($request->all());
        $request->validate([
            'nim'               => 'required|min:9|unique:dosen,nidn',
            'nama_mahasiswa'    => 'required|min:5',
            'jenis_kelamin'     => 'required',
            'alamat_mhs'        => 'required'

        ]);

        Mahasiswa::create([
            'user_id'          => $request->user_id,
            'nim'              => $request->nim,
            'nama_mahasiswa'   => $request->nama_mahasiswa, 
            'jenis_kelamin'    => $request->jenis_kelamin,
            'alamat_mhs'       => $request->alamat_mhs,
            'id_kelas'         => $request->id_kelas,
        ]);
       
        //redirect to index
        return redirect()->route('mahasiswa.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
