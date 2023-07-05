<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alternatif;
use App\Models\AlternatifKriteriaSubkriteria;
use App\Models\Kriteria;
use Illuminate\Support\Facades\Auth;

class AlternatifController extends Controller
{
    private function getKriteria()
    {
        return Kriteria::all(); // Mengambil data kriteria
    }

    public function index()
    {
        // Menggunakan pengurutan berdasarkan nama
        $alternatif = Alternatif::orderBy('nama', 'asc')->get();
        // $alternatif = Alternatif::all();
        // Ambil data alternatif beserta nilai subkriteria dari masing-masing kriteria
        $alternatif->load('alternatifKriteriaSubkriteria.kriteria');
        // Alternatif adalah model yang merepresentasikan tabel 'alternatif'
        // alternatifKriteriaSubkriteria adalah relasi one-to-many antara Alternatif dan AlternatifKriteriaSubkriteria
        // kriteria adalah relasi many-to-one antara AlternatifKriteriaSubkriteria dan Kriteria
        $kriteria = $this->getKriteria(); // Mengambil data kriteria

        $isAdmin = Auth::user()->is_admin;
        return view('alternatif.index', compact('alternatif', 'kriteria', 'isAdmin'));
    }

    public function create()
    {
        $kriteria = $this->getKriteria(); // Memanggil fungsi getKriteria()
        return view('alternatif.create', compact('kriteria'));
    }
    
    public function store(Request $request)
    {
        // Validasi inputan
        $request->validate([
            'nama' => 'required', // Nama harus diisi dan harus unik dalam tabel alternatif
            // tambahkan validasi untuk nilai sub-kriteria sesuai kebutuhan
        ]);

        // Simpan data alternatif ke dalam tabel alternatif
        $alternatif = new Alternatif;
        $alternatif->nama = $request->nama;
        $alternatif->save();

        // Simpan data nilai sub-kriteria ke dalam tabel nilai_sub_kriteria
        $kriteria = $this->getKriteria();// Mengambil data kriteria
        foreach ($kriteria as $k) {
            $alternatifKriteriaSubkriteria = new AlternatifKriteriaSubkriteria;
            $alternatifKriteriaSubkriteria->alternatif_id = $alternatif->id;
            $alternatifKriteriaSubkriteria->kriteria_id = $k->id;
            $alternatifKriteriaSubkriteria->sub_kriteria_id = $request->input('nilai.' . $k->id)[0] ?? null; // Ambil nilai sub-kriteria dari form, jika tidak ada set nilai menjadi null
            $alternatifKriteriaSubkriteria->save();
        }

        return redirect()->route('alternatif.index')->with('success', 'Alternatif berhasil ditambahkan!');
    }
    
    public function show(Alternatif $alternatif)
    {
        $kriteria = $this->getKriteria();

        if ($alternatif) { 
            return view('alternatif.show', compact('alternatif', 'kriteria'));
        } else {
            // Jika data alternatif tidak ditemukan, bisa diarahkan ke halaman lain atau ditampilkan pesan error
            return redirect()->back()->with('error', 'Data Alternatif tidak ditemukan');
        }
    }

    public function edit(Alternatif $alternatif)
    {
        $kriteria = $this->getKriteria();// Mengambil data kriteria
        return view('alternatif.edit', compact('alternatif', 'kriteria'));
    }

    public function update(Request $request, Alternatif $alternatif)
    {
        // Validasi inputan
        $request->validate([
            'nama' => 'required', // Nama harus diisi dan harus unik dalam tabel alternatif
            // tambahkan validasi untuk nilai sub-kriteria sesuai kebutuhan
        ]);

        // Update data alternatif ke dalam tabel alternatif
        $alternatif->nama = $request->nama;
        $alternatif->save();

        // Update data nilai sub-kriteria ke dalam tabel nilai_sub_kriteria
        $kriteria = $this->getKriteria();// Mengambil data kriteria
        foreach ($kriteria as $k) {
            $alternatifKriteriaSubkriteria = AlternatifKriteriaSubkriteria::where('alternatif_id', $alternatif->id)
                ->where('kriteria_id', $k->id)
                ->first(); // Mengambil data nilai sub-kriteria yang sudah ada

            if ($request->has('nilai.' . $k->id)) { // Cek apakah inputan ada atau tidak
                if ($alternatifKriteriaSubkriteria) {
                    // Jika nilai sub-kriteria sudah ada, update nilai
                    $alternatifKriteriaSubkriteria->sub_kriteria_id = $request->input('nilai.' . $k->id)[0];
                    $alternatifKriteriaSubkriteria->save();
                } else {
                    // Jika nilai sub-kriteria belum ada, buat data baru
                    $alternatifKriteriaSubkriteria = new AlternatifKriteriaSubkriteria;
                    $alternatifKriteriaSubkriteria->alternatif_id = $alternatif->id;
                    $alternatifKriteriaSubkriteria->kriteria_id = $k->id;
                    $alternatifKriteriaSubkriteria->sub_kriteria_id = $request->input('nilai.' . $k->id)[0] ?? null;
                    $alternatifKriteriaSubkriteria->save();
                }
            } else {
                // Jika inputan tidak ada, hapus data nilai sub-kriteria jika sudah ada
                if ($alternatifKriteriaSubkriteria) {
                    $alternatifKriteriaSubkriteria->delete();
                }
            }
        }

        return redirect()->route('alternatif.index')->with('success', 'Alternatif berhasil diperbarui!');
    }

    public function destroy(Alternatif $alternatif)
    {
        $title = 'Delete User!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        // Hapus data alternatif
        $alternatif->delete();

        return redirect()->route('alternatif.index')->with('success', 'Alternatif berhasil dihapus!');
    }
}
