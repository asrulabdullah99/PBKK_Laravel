<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DosenJadwalController extends Controller
{
    public function index()
    {
        $id = auth()->user()->id;
         $jadwal = DB::table('jadwal')
            ->join('kelas', 'kelas.id', '=', 'jadwal.id_kelas')
            ->join('matakuliah','matakuliah.id','=','jadwal.id_matkul')
            ->join('dosen','dosen.user_id','=','jadwal.id_dosen')
            ->join('users','users.id','=','dosen.user_id')
            ->select('kelas.nama_kelas','jadwal.hari','jadwal.waktu','dosen.nama_dosen','matakuliah.nama_matakuliah','jadwal.id','users.id')
            ->where('users.id','=', $id)
            ->get();

            return view('levelDosen.jadwal.index',compact('jadwal'));
    }

    public function show($id)
    {
        $id = auth()->user()->id;
         $jadwal = DB::table('jadwal')
            ->join('kelas', 'kelas.id', '=', 'jadwal.id_kelas')
            ->join('matakuliah','matakuliah.id','=','jadwal.id_matkul')
            ->join('dosen','dosen.user_id','=','jadwal.id_dosen')
            ->join('users','users.id','=','dosen.user_id')
            ->join('mahasiswa','mahasiswa.id_kelas','=','kelas.id')
            ->select('mahasiswa.nim','mahasiswa.nama_mahasiswa','jadwal.id','users.id')
            ->where('users.id','=', $id)
            ->get();

            return view('levelDosen.jadwal.index',compact('jadwal'));
    }


}
