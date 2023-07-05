<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    public function index()
    {
        // $kriteria = Kriteria::all(); // Mengambil data dari model Kriteria 
        $kriteria = Kriteria::orderBy('tipe', 'asc')->get();
        return view('kriteria.index')->with('kriteria', $kriteria); // Mengirimkan nilai $kriteria ke view
    }

    public function create()
    {
        return view('kriteria.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|unique:kriteria,nama'
        ]);

        Kriteria::create($request->all());
        return redirect()->route('kriteria.index')->with('success', 'Kriteria berhasil ditambahkan.');
    }

    public function show(Kriteria $kriteria)
    {
        // Perbaikan: Menggunakan $kriteria->id untuk mencari data sub kriteria
        $subKriteria = Kriteria::find($kriteria->id);
        if ($subKriteria) { // Perbaikan: Menggunakan $subKriteria untuk validasi
            return view('kriteria.show', compact('kriteria'));
        } else {
            // Jika data sub kriteria tidak ditemukan, bisa diarahkan ke halaman lain atau ditampilkan pesan error
            return redirect()->back()->with('error', 'Data sub kriteria tidak ditemukan');
        }
    }

    public function edit(Kriteria $kriteria)
    {
        return view('kriteria.edit', compact('kriteria'));
    }

    public function update(Request $request, Kriteria $kriteria)
    {
        $request->validate([
            'nama' => 'required|unique:kriteria,nama,' . $kriteria->id
        ]);

        $kriteria->update($request->all());
        return redirect()->route('kriteria.index')->with('success', 'Kriteria berhasil diperbarui.');
    }

    public function destroy(Kriteria $kriteria)
    {
        // Menghapus Kriteria berarti menghapus Sub Kriterianya juga
        $kriteria->subKriteria()->delete();
        $kriteria->delete();

        return redirect()->route('kriteria.index')->with('success', 'Kriteria dan Subkriteria yang terkait berhasil dihapus.');
    }
}
