<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class KelasController extends Controller
{
    public function index(): View
    {
       $dataKelas = Kelas::latest()->paginate(10);
       return view('kelas.index',compact('dataKelas'));
    }

    public function create(): View
    {
        return view('kelas.create');
    }

    public function store(Request $request): RedirectResponse
    {
       
        //validate form
        $request->validate([
            'nama_kelas'      => 'required|min:2|unique:kelas,nama_kelas'
        ]);

        Kelas::create([
            'nama_kelas'        => $request->nama_kelas,
        ]);
        //redirect to index
        return redirect()->route('kelas.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit(string $id): View
    {
        $dataKelas = Kelas::findOrFail($id);
        return view('kelas.edit', compact('dataKelas'));
    }

    public function show(string $id): View
    {
        $kelas = Kelas::findOrFail($id);

        return view('kelas.show', compact('kelas'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $request->validate([
            'nama_kelas'      => 'required|min:2'
        ]);

        $dataKelas = Kelas::findOrFail($id);
        $dataKelas->update([
             'nama_kelas'  => $request->nama_kelas
            ]);

        return redirect()->route('kelas.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id): RedirectResponse
    {
        $kelas = Kelas::findOrFail($id);
        $kelas->delete();
        return redirect()->route('kelas.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
