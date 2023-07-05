@extends('layouts.app')

@section('pageTitle')
    Kriteria
@endsection

@section('content')
    <div class="container mt-5">
        <h1>Detail Kriteria</h1>
        <table class="tables ">
            <tr>
                <th>Nama</th>
                <td>: {{ $kriteria->nama }}</td>
            </tr>
            <tr>
                <th>Tipe</th>
                <td>: {{ $kriteria->tipe }}</td>
            </tr>
        </table>

        <hr>
        
        <div class="container mt-4">
            <h2>Sub Kriteria</h2>
            @if ($kriteria->subKriteria->count() > 0)
                <!-- Menggunakan kelas "tables" untuk mengatur tampilan tabel pada css (bukan js datatable) -->
                <table class="tables table-bordered">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            // Menggunakan metode sortBy() untuk melakukan sorting berdasarkan nilai terendah
                            $sortedSubKriteria = $kriteria->subKriteria->sortBy('nilai'); //sortByDesc('nilai');
                        @endphp
                        @foreach ($sortedSubKriteria as $subKriteria)
                            <tr>
                                <td>{{ $subKriteria->nama }}</td>
                                <td>{{ $subKriteria->nilai }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>(belum ada subkriteria yang dimasukkan)</p>
            @endif
        </div>

        <a href="{{ route('kriteria.index') }}" class="btn btn-primary float-end mt-2">Kembali</a>
    </div>
@endsection
