<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Kriteria;

class PerhitunganController extends Controller
{
    private function getData()
    {
        // Menggunakan pengurutan berdasarkan nama
        $alternatif = Alternatif::orderBy('nama', 'asc')->get();
        // Ambil data alternatif beserta nilai subkriteria dari masing-masing kriteria
        $alternatif->load('alternatifKriteriaSubkriteria.kriteria');
        // $kriteria = Kriteria::all(); // Mengambil data kriteria
        $kriteria = Kriteria::orderBy('tipe', 'asc')->get();

        $jumlahKuadrat = []; // Array untuk menyimpan nilai akar kuadrat dari masing-masing kriteria

        // Menghitung jumlah kuadrat untuk setiap kriteria untuk tahapan ke-2
        foreach ($kriteria as $krit) {
            $jumlah = 0;
            foreach ($alternatif as $a) {
                $subkriteria = $a->alternatifKriteriaSubkriteria->where('kriteria_id', $krit->id)->first();
                if ($subkriteria && $subkriteria->subKriteria) {
                    $jumlah += pow($subkriteria->subKriteria->nilai, 2);
                }
            }
            $jumlahKuadrat[$krit->id] = sqrt($jumlah);
        }

        $data = [];

        foreach ($alternatif as $a) {
            $row = [];
            foreach ($kriteria as $krit) {
                $subkriteria = $a->alternatifKriteriaSubkriteria->where('kriteria_id', $krit->id)->first();
                if ($subkriteria && $subkriteria->subKriteria) {
                    $normalisasi = number_format($subkriteria->subKriteria->nilai / $jumlahKuadrat[$krit->id], 6);
                    $row[] = $normalisasi;
                } else {
                    $row[] = '---';
                }
            }
            $data[] = $row;
        }
    
        $tabelBobot = [];
        $tabelTipeKriteria = [];
    
        $totalBobot = 0; // Variabel untuk menghitung total bobot
    
        foreach ($kriteria as $krit) {
            $tabelBobot[$krit->id] = $krit->bobot;
            $tabelTipeKriteria[$krit->id] = $krit->tipe;
    
            $totalBobot += $krit->bobot; // Menjumlahkan bobot pada setiap iterasi
        }
    
        // Menghitung proporsi bobot agar total menjadi 1
        foreach ($tabelBobot as &$bobot) {
            $bobot = $bobot / $totalBobot;
        }
    
        return compact('alternatif', 'kriteria', 'jumlahKuadrat', 'data', 'tabelBobot', 'tabelTipeKriteria');
    }    

    private function rincian($alternatif, $kriteria)
    {
        $rincian = [];

        // Tahap 1.1: Menghitung Kuadrat Matriks
        $rincian['matriksKuadrat'] = [];
        foreach ($alternatif as $key => $a) {
            $row = [];
            foreach ($kriteria as $krit) {
                $subkriteria = $a->alternatifKriteriaSubkriteria->where('kriteria_id', $krit->id)->first();
                if ($subkriteria && $subkriteria->subKriteria) {
                    $nilaiKuadrat = pow($subkriteria->subKriteria->nilai, 2);
                    $row[] = $nilaiKuadrat;
                } else {
                    $row[] = '---';
                }
            }
            $rincian['matriksKuadrat'][] = $row;
        }

        // Tahap 1.2: Menghitung Jumlah Kuadrat Matriks
        $rincian['jumlahKuadrat'] = [];
        foreach ($kriteria as $krit) {
            $jumlah = 0;
            foreach ($alternatif as $a) {
                $subkriteria = $a->alternatifKriteriaSubkriteria->where('kriteria_id', $krit->id)->first();
                if ($subkriteria && $subkriteria->subKriteria) {
                    $jumlah += pow($subkriteria->subKriteria->nilai, 2);
                }
            }
            $rincian['jumlahKuadrat'][] = $jumlah;
        }

        // Tahap 1.3: Menghitung Jumlah Akar Kuadrat Matriks
        $rincian['jumlahAkarKuadrat'] = [];
        foreach ($kriteria as $krit) {
            $jumlah = 0;
            foreach ($alternatif as $a) {
                $subkriteria = $a->alternatifKriteriaSubkriteria->where('kriteria_id', $krit->id)->first();
                if ($subkriteria && $subkriteria->subKriteria) {
                    $jumlah += pow($subkriteria->subKriteria->nilai, 2);
                }
            }
            $akarKuadrat = sqrt($jumlah);
            $rincian['jumlahAkarKuadrat'][] = $akarKuadrat;
        }

        return $rincian;
    }

    private function calculateNormalisasiTerbobot($alternatif, $kriteria, $jumlahKuadrat, $tabelBobot)
    {
        $data = [];
    
        foreach ($alternatif as $a) {
            $rowData = [];
    
            foreach ($kriteria as $krit) {
                $subkriteria = $a->alternatifKriteriaSubkriteria->where('kriteria_id', $krit->id)->first();
    
                if ($subkriteria && $subkriteria->subKriteria) {
                    $bobot = $tabelBobot[$krit->id]; // Menggunakan bobot yang sudah dibagi
                    $nilaiNormalisasiTerbobot = ($subkriteria->subKriteria->nilai / $jumlahKuadrat[$krit->id]) * $bobot;
                    $rowData[] = number_format($nilaiNormalisasiTerbobot, 6);
                } else {
                    $rowData[] = '---';
                }                
            }
    
            $data[] = $rowData;
        }
    
        return $data;
    }    
    
    private function calculateYi($alternatif, $kriteria, $jumlahKuadrat, $tabelBobot)
    {
        $hasilYi = [];
    
        foreach ($alternatif as $a) {
            $maks = 0;
            $min = 0;
    
            foreach ($kriteria as $krit) {
                $subkriteria = $a->alternatifKriteriaSubkriteria->where('kriteria_id', $krit->id)->first();
                $bobot = $tabelBobot[$krit->id]; // Menggunakan bobot yang sudah dibagi
                $nilai = $subkriteria && $subkriteria->subKriteria ? ($subkriteria->subKriteria->nilai / $jumlahKuadrat[$krit->id]) * $bobot : 0;
    
                if ($krit->tipe == 'benefit') {
                    $maks += $nilai;
                } elseif ($krit->tipe == 'cost') {
                    $min += $nilai;
                }
            }
    
            $hasilYi[] = [
                'maks' => $maks,
                'min' => $min,
                'jumlah' => $maks - $min,
            ];
        }
    
        return $hasilYi;
    }
    
    private function calculateRanking($alternatif, $kriteria, $jumlahKuadrat, $tabelBobot)
    {
        $alternatifRanking = $alternatif->map(function ($a) use ($kriteria, $jumlahKuadrat, $tabelBobot) {
            $maks = 0;
            $min = 0;
    
            foreach ($kriteria as $krit) {
                $subkriteria = $a->alternatifKriteriaSubkriteria->where('kriteria_id', $krit->id)->first();
                $bobot = $tabelBobot[$krit->id]; // Menggunakan bobot yang sudah dibagi
                $nilai = $subkriteria && $subkriteria->subKriteria ? ($subkriteria->subKriteria->nilai / $jumlahKuadrat[$krit->id]) * $bobot : 0;
                // $nilai = $subkriteria && $subkriteria->subKriteria ? ($subkriteria->subKriteria->nilai / $jumlahKuadrat[$krit->id]) * $krit->bobot : 0; Ini untuk mengambil nilai bobot jika dijumlahkan != 1
    
                if ($krit->tipe == 'benefit') {
                    $maks += $nilai;
                } elseif ($krit->tipe == 'cost') {
                    $min += $nilai;
                }
            }
    
            return [
                'alternatif' => $a,
                'jumlah' => $maks - $min
            ];
        });
    
        $alternatifRanking = $alternatifRanking->sortByDesc('jumlah');
    
        return $alternatifRanking;
    }    

    public function index()
    {
        $data = $this->getData();
        $data['rincian'] = $this->rincian($data['alternatif'], $data['kriteria'], $data['jumlahKuadrat']);
    
        $data['normalisasiTerbobot'] = $this->calculateNormalisasiTerbobot($data['alternatif'], $data['kriteria'], $data['jumlahKuadrat'], $data['tabelBobot']);
        $data['hasilYi'] = $this->calculateYi($data['alternatif'], $data['kriteria'], $data['jumlahKuadrat'], $data['tabelBobot']);
        $data['alternatifRanking'] = $this->calculateRanking($data['alternatif'], $data['kriteria'], $data['jumlahKuadrat'], $data['tabelBobot']);
    
        return view('moora.index', $data);
    }

    public function hasil()
    {
        $data = $this->getData();
        $data['alternatifRanking'] = $this->calculateRanking($data['alternatif'], $data['kriteria'], $data['jumlahKuadrat'], $data['tabelBobot']);

        return view('moora.hasil', $data);
    }

    public function laporan()
    {
        $data = $this->getData();
        $data['alternatifRanking'] = $this->calculateRanking($data['alternatif'], $data['kriteria'], $data['jumlahKuadrat'], $data['tabelBobot']);

        return view('moora.cetak-laporan',  $data);
    }
}
