@extends('layouts.app')

@section('pageTitle')
    Perhitungan
@endsection

@section('content')
    <hr>
    <div class="d-flex align-items-center justify-content-between">
        <h2 class="m-auto">Hasil Perhitungan Metode MOORA</h2>
        <a href="{{ route('moora.laporan') }}" target="_blank" class="btn btn-outline-secondary btn-lg">
            Cetak&nbsp;
            <i class="fa-solid fa-file-pdf"></i>
        </a>
    </div>

    <div class="container border p-2 my-3">
        <table class="my-table">
            <thead style="border: 1px; background-color: lightgray;">
                <tr>
                    <th class="align-middle">Peringkat</th>
                    <th class="align-middle">Kode</th>
                    <th class="align-middle">Mahasiswa</th>
                    <th class="align-middle">Nilai</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($alternatifRanking as $index => $item)
                    <tr>
                        <td>
                            {{ $loop->iteration }}
                        </td>
                        <td>
                            A{{ $index + 1 }}
                        </td>
                        <td>
                            {{ $item['alternatif']->nama }}
                        </td>
                        <td>
                            {{ number_format($item['jumlah'], 6) }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>        
    </div>
@endsection
