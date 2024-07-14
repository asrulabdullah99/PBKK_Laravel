<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MahasiswaJadwalController extends Controller
{
    public function index()
    {
         $jadwal = DB::table('jadwal')
            ->join('kelas', 'kelas.id', '=', 'jadwal.id_kelas')
            ->join('matakuliah','matakuliah.id','=','jadwal.id_matkul')
            ->join('dosen','dosen.user_id','=','jadwal.id_dosen')
            ->select('kelas.nama_kelas','jadwal.hari','jadwal.waktu','dosen.nama_dosen','matakuliah.nama_matakuliah','jadwal.id')
            ->get();

            return view('levelMahasiswa.jadwal.index',compact('jadwal'));
    }
}
