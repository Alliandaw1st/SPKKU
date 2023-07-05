@extends('layouts.app')

@section('pageTitle')
    Perhitungan
@endsection

@section('content')
    <hr>
    <div class="d-flex align-items-center justify-content-between">
        <h2 class="m-auto">Detail Perhitungan Metode MOORA</h2>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-outline-dark" id="desktop-button" data-bs-toggle="modal"
            data-bs-target="#exampleModal">
            Rincian&nbsp;
            <i class="fa-solid fa-circle-info"></i>
        </button>
    </div>

    <h5 class="mx-3">Tahap 1: Matriks Keputusan</h5>
    <!-- Menggunakan kelas CSS pada tabel -->
    <table class="my-table">
        <thead>
            <!-- Bagian header tabel -->
            <tr>
                <th>Alternatif</th>
                <!-- Looping untuk menampilkan nama kriteria -->
                @foreach ($kriteria as $k)
                    <th>C{{ $loop->iteration }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            <!-- Looping untuk menampilkan nilai alternatif berdasarkan kriteria -->
            @foreach ($alternatif as $a)
                <tr>
                    <!-- Menampilkan nama alternatif -->
                    <td>A{{ $loop->iteration }}</td>
                    <!-- Looping untuk menampilkan nilai subkriteria alternatif berdasarkan kriteria -->
                    @foreach ($kriteria as $krit)
                        <!-- Mengambil data subkriteria alternatif berdasarkan kriteria saat ini -->
                        @php
                            $subkriteria = $a->alternatifKriteriaSubkriteria->where('kriteria_id', $krit->id)->first();
                        @endphp
                        <td>
                            <!-- Jika subkriteria alternatif tersedia, tampilkan nilai subkriteria, jika tidak, tampilkan "---" -->
                            @if ($subkriteria && $subkriteria->subKriteria)
                                {{ $subkriteria->subKriteria->nilai }}
                            @else
                                ---
                            @endif
                        </td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>

    <h5 class="mx-3">Tahap 2: Matriks Normalisasi</h5>
    <table class="my-table">
        <thead>
            <tr>
                <th>Alternatif</th>
                @foreach ($kriteria as $k)
                    <th>C{{ $loop->iteration }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            <!-- Mulai perulangan untuk setiap data -->
            @foreach ($data as $index => $row)
                <tr>
                    <td>A{{ $index + 1 }}</td> <!-- Menampilkan nomor urut alternatif -->
                    <!-- Mulai perulangan untuk setiap nilai normalisasi pada setiap kriteria -->
                    @foreach ($row as $nilai)
                        <td>{{ $nilai }}</td> <!-- Menampilkan nilai normalisasi -->
                    @endforeach
                </tr>
            @endforeach
            <!-- Selesai perulangan -->
        </tbody>
    </table>

    <h5 class="mx-3">Tahap 3: Matriks Normalisasi Terbobot</h5>
    <table class="my-table">
        <thead>
            <tr>
                <th>Alternatif</th>
                @foreach ($kriteria as $k)
                    <th>C{{ $loop->iteration }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($alternatif as $index => $a)
                <tr>
                    <td>A{{ $index + 1 }}</td> <!-- Menampilkan label alternatif dengan nomor urut -->
                    @foreach ($normalisasiTerbobot[$index] as $nilai)
                        <td>{{ $nilai }}</td> <!-- Menampilkan nilai normalisasi terbobot untuk setiap kriteria -->
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>

    <h5 class="mx-3">Tahap 4: Menghitung Nilai Yi (Maks-Min)</h5>
    <table class="my-table">
        <thead>
            <tr>
                <th>Alternatif</th>
                <th>Maks</th>
                <th>Min</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($alternatif as $index => $a)
                <tr>
                    <td>A{{ $index + 1 }}</td>
                    <td>{{ number_format($hasilYi[$index]['maks'], 6) }}</td>
                    <td>{{ number_format($hasilYi[$index]['min'], 6) }}</td>
                    <td>{{ number_format($hasilYi[$index]['jumlah'], 6) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h5 class="mx-3">Tahap 5: Perangkingan Nilai Yi</h5>
    <table class="my-table table-hover">
        <thead style="border: 1px; background-color: lightgray;">
            <tr>
                <th class="text-center align-middle">Peringkat</th>
                <th class="text-center align-middle">Alternatif</th>
                <th class="text-center align-middle">Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($alternatifRanking as $index => $item)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td class="text-center">A{{ $index + 1 }}</td>
                    <td class="text-center">{{ number_format($item['jumlah'], 6) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Modal -->
    <div class="modal fade modal-lg" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Rincian</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h2 class="text-center">Rincian Tambahan</h2>
                    <hr>
                    <!-- Tahap 1.1: Menghitung Kuadrat Matriks -->
                    <h5 class="mx-3">Tahap 1.1: Menghitung Kuadrat Matriks</h5>
                    <table class="my-table">
                        <thead>
                            <tr>
                                <th>Alternatif</th>
                                @foreach ($kriteria as $k)
                                    <th>C{{ $loop->iteration }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rincian['matriksKuadrat'] as $key => $row)
                                <tr>
                                    <td>A{{ $key + 1 }}</td>
                                    @foreach ($row as $value)
                                        <td>{{ $value }}</td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Tahap 1.2: Menghitung Jumlah Kuadrat Matriks -->
                    <h5 class="mx-3">Tahap 1.2: Menghitung Jumlah Kuadrat Matriks</h5>
                    <table class="my-table">
                        <thead>
                            <tr>
                                <th>Alternatif</th>
                                @foreach ($kriteria as $k)
                                    <th>C{{ $loop->iteration }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Jumlah</td>
                                @foreach ($rincian['jumlahKuadrat'] as $value)
                                    <td>{{ $value }}</td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>

                    <!-- Tahap 1.3: Menghitung Jumlah Akar Kuadrat Matriks -->
                    <h5 class="mx-3">Tahap 1.3: Menghitung Jumlah Akar Kuadrat Matriks</h5>
                    <table class="my-table">
                        <thead>
                            <tr>
                                <th>Alternatif</th>
                                @foreach ($kriteria as $k)
                                    <th>C{{ $loop->iteration }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Jumlah</td>
                                @foreach ($rincian['jumlahAkarKuadrat'] as $value)
                                    <td>{{ number_format($value, 4) }}</td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>

                    <!-- Tabel Bobot pada masing-masing Kriteria -->
                    <h5 class="mx-3">Tabel Bobot pada masing masing Kriteria </h5>
                    <table class="my-table">
                        <thead>
                            <tr>
                                <th>Alternatif</th>
                                @foreach ($kriteria as $k)
                                    <th>C{{ $loop->iteration }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Nilai asli</td>
                                @foreach ($kriteria as $krit)
                                    <td>{{ number_format($krit->bobot, 2) }}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <td>Jumlah (bobot=1)</td>
                                @foreach ($kriteria as $krit)
                                    <td>{{ number_format($tabelBobot[$krit->id], 2) }}</td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>

                    <!-- Tabel Tipe Kriteria pada Setiap Kriteria -->
                    <h5 class="mx-3">Tabel Tipe Kriteria pada Setiap Kriteria</h5>
                    <table class="my-table">
                        <thead>
                            <tr>
                                <th>Alternatif</th>
                                @foreach ($kriteria as $k)
                                    <th>C{{ $loop->iteration }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Tipe Kriteria</td>
                                @foreach ($kriteria as $krit)
                                    <td>{{ $tabelTipeKriteria[$krit->id] }}</td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
