<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Matakuliah;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class MatakuliahController extends Controller
{
    public function index(): View
    {
       $dataMatakuliah = Matakuliah::latest()->paginate(10);
       return view('levelAdmin.matakuliah.index',compact('dataMatakuliah'));
    }

    public function create(): View
    {
        return view('levelAdmin.matakuliah.create');
    }

    public function store(Request $request): RedirectResponse
    {
       
        //validate form
        $request->validate([
            'nama_matakuliah'      => 'required|min:2|unique:matakuliah,nama_matakuliah'
        ]);

        Matakuliah::create([
            'nama_matakuliah'        => $request->nama_matakuliah,
        ]);
        //redirect to index
        return redirect()->route('admin.matakuliah.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit(string $id): View
    {
        $dataMatakuliah = Matakuliah::findOrFail($id);
        return view('levelAdmin.matakuliah.edit', compact('dataMatakuliah'));
    }

    public function show(string $id): View
    {
        $matakuliah = Matakuliah::findOrFail($id);

        return view('levelAdmin.matakuliah.show', compact('matakuliah'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $request->validate([
            'nama_matakuliah'      => 'required|min:2'
        ]);

        $dataMatakuliah = Matakuliah::findOrFail($id);
        $dataMatakuliah->update([
             'nama_matakuliah'  => $request->nama_matakuliah
            ]);

        return redirect()->route('admin.matakuliah.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id): RedirectResponse
    {
        $matakuliah = Matakuliah::findOrFail($id);
        $matakuliah->delete();
        return redirect()->route('admin.matakuliah.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
