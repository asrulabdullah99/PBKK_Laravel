<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $jadwal = DB::table('mahasiswa')
            ->join('kelas', 'kelas.id', '=', 'mahasiswa.id_kelas')
            ->join('jadwal', 'jadwal.id_kelas', '=', 'kelas.id')
            ->join('matakuliah','matakuliah.id','=','jadwal.id_matkul')
            ->join('dosen','dosen.user_id','=','jadwal.id_dosen')
            ->select('mahasiswa.nama_mahasiswa', 'jadwal.hari','jadwal.waktu','dosen.nama_dosen','matakuliah.nama_matakuliah')
            ->get();

            return view('jadwal.index',compact('jadwal'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
