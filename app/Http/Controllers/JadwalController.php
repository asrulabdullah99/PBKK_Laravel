<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Kelas;
use App\Models\Jadwal;
use App\Models\Matakuliah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $jadwal = DB::table('jadwal')
            ->join('kelas', 'kelas.id', '=', 'jadwal.id_kelas')
            ->join('matakuliah','matakuliah.id','=','jadwal.id_matkul')
            ->join('dosen','dosen.user_id','=','jadwal.id_dosen')
            ->select('kelas.nama_kelas','jadwal.hari','jadwal.waktu','dosen.nama_dosen','matakuliah.nama_matakuliah','jadwal.id')
            ->get();

            return view('levelAdmin.jadwal.index',compact('jadwal'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $matakuliah = Matakuliah::all();
        $kelas = Kelas::all();
        $dosen = Dosen::all();
        return view('levelAdmin.jadwal.create', compact('matakuliah','kelas','dosen'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         //validate form
        //dd($request->all());
        // $request->validate([
        //     'nim'               => 'required|min:9|unique:dosen,nidn',
        //     'nama_mahasiswa'    => 'required|min:5',
        //     'jenis_kelamin'     => 'required',
        //     'alamat_mhs'        => 'required'

        // ]);

        Jadwal::create([
            'id_matkul'         => $request->id_matkul,
            'id_kelas'          => $request->id_kelas,
            'id_dosen'          => $request->id_dosen, 
            'waktu'             => $request->waktu,
            'hari'              => $request->hari,
        ]);
       
        //redirect to index
        return redirect()->route('admin.jadwal.index')->with(['success' => 'Data Berhasil Disimpan!']);
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
        $jadwal = Jadwal::findOrFail($id);
        $matakuliah = Matakuliah::all();
        $kelas = Kelas::all();
        $dosen = Dosen::all();

        return view('levelAdmin.jadwal.edit', compact('jadwal','matakuliah','kelas','dosen'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $request->validate([
        //     'nim'               => 'required|min:9|unique:dosen,nidn',
        //     'nama_mahasiswa'    => 'required|min:5',
        //     'jenis_kelamin'     => 'required',
        //     'alamat_mhs'        => 'required'

        // ]);

        $jadwal = Jadwal::findOrFail($id);
        $jadwal->update([
          'id_matkul'               => $request->id_matkul,
            'id_kelas'              => $request->id_kelas,
            'id_dosen'              => $request->id_dosen, 
            'waktu'                 => $request->waktu,
            'hari'                  => $request->hari,
        ]);
       
        //redirect to index
        return redirect()->route('admin.jadwal.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $jadwal->delete();
       return redirect()->route('admin.jadwal.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
