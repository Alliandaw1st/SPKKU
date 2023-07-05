<?php

namespace App\Http\Controllers;

use App\Models\SubKriteria;
use App\Models\Kriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class SubKriteriaController extends Controller
{
    // Menampilkan daftar sub kriteria
    public function index()
    {
        $subKriteria = SubKriteria::all();
        $kriterias = Kriteria::all();
        return view('subkriteria.index', compact('subKriteria', 'kriterias'));
    }

    // Menampilkan form tambah sub kriteria
    public function create()
    {
        $kriterias = Kriteria::all();
        return view('subkriteria.create', compact('kriterias'));
    }

    // Menyimpan data sub kriteria baru
    public function store(Request $request)
    {
        // Validasi data input
        $validator = FacadesValidator::make($request->all(), SubKriteria::$rules, [
            'nilai.required' => 'Field Nilai harus diisi.',
            'nilai.numeric' => 'Field Nilai hanya boleh berisi angka.',
            'nilai.min' => 'Field Nilai harus lebih dari 0.',
        ]);

        // Cek apakah validasi gagal
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Lanjutkan proses penyimpanan data ke database
        // ...
        // Mengubah nilai menjadi angka
        $nilai = (int) str_replace(',', '', $request->input('nilai'));
        
        // Simpan data ke database
        $subKriteria = new SubKriteria([
            'nama' => $request->input('nama'),
            'kriteria_id' => $request->input('kriteria_id'),
            'nilai' => $nilai,
        ]);
        $subKriteria->save();

        // Redirect ke halaman index
        return redirect()->route('subkriteria.index')
            ->with('success', 'Data Sub Kriteria berhasil ditambahkan.');
    }

    // Menampilkan detail sub kriteria
    public function show($id)
    {
        $subKriteria = SubKriteria::find($id);
        if ($subKriteria) {
            return view('subkriteria.show', compact('subKriteria'));
        } else {
            // Jika data sub kriteria tidak ditemukan, bisa diarahkan ke halaman lain atau ditampilkan pesan error
            return redirect()->back()->with('error', 'Data sub kriteria tidak ditemukan');
        }
    }

    // Menampilkan form edit sub kriteria
    public function edit($id)
    {
        $subKriteria = SubKriteria::find($id);
        if ($subKriteria) {
            $kriterias = Kriteria::all(); // Jika Anda membutuhkan data kriteria untuk ditampilkan dalam form edit
            return view('subkriteria.edit', compact('subKriteria', 'kriterias'));
        } else {
            // Jika data sub kriteria tidak ditemukan, bisa diarahkan ke halaman lain atau ditampilkan pesan error
            return redirect()->back()->with('error', 'Data sub kriteria tidak ditemukan');
        }
    }

    // Mengupdate data sub kriteria
    public function update(Request $request, $id)
    {
        $subKriteria = SubKriteria::find($id);
        if ($subKriteria) {
            $subKriteria->nama = $request->input('nama');
            $subKriteria->kriteria_id = $request->input('kriteria_id');
            $subKriteria->nilai = $request->input('nilai');

            // Lakukan validasi jika diperlukan
            $validator = FacadesValidator::make($request->all(), SubKriteria::$rules, [
                'nilai.required' => 'Field Nilai harus diisi.',
                'nilai.numeric' => 'Field Nilai hanya boleh berisi angka.',
                'nilai.min' => 'Field Nilai harus lebih dari 0.',
            ]);
    
            // Cek apakah validasi gagal
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }
            
            $subKriteria->save();
            // return redirect()->route('subkriteria.show', $id)->with('success', 'Data sub kriteria berhasil diupdate');
            return redirect()->route('subkriteria.index')->with('success', 'Data sub kriteria berhasil diupdate');
        } else {
            // Jika data sub kriteria tidak ditemukan, bisa diarahkan ke halaman lain atau ditampilkan pesan error
            return redirect()->back()->with('error', 'Data sub kriteria tidak ditemukan');
        }
    }

    // Menghapus data sub kriteria
    public function destroy($id)
    {
        $subKriteria = SubKriteria::find($id); // Menggunakan model SubKriteria untuk mencari data berdasarkan ID
        if ($subKriteria) { // Memeriksa apakah data ditemukan
            $subKriteria->delete(); // Menghapus data menggunakan metode delete()
            return redirect()->route('subkriteria.index')->with('success', 'Sub Kriteria berhasil dihapus!');
        } else {
            return redirect()->route('subkriteria.index')->with('error', 'Sub Kriteria tidak ditemukan!'); // Menampilkan pesan error jika data tidak ditemukan
        }
    }
    
}
