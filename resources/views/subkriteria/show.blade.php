@extends('layouts.app')

@section('pageTitle')
    Detail Sub Kriteria
@endsection

@section('content')
    <div class="container mt-5">
        <h1>Detail Sub Kriteria</h1>
        <table class="tables ">
            <tr>
                <th>Nama Kriteria :</th>
                <td>{{ $subKriteria->kriteria->nama }}</td>
            </tr>
            <tr>
                <th>Nama Sub Kriteria :</th>
                <td>{{ $subKriteria->nama }}</td>
            </tr>
            <tr>
                <th>Nilai :</th>
                <td>{{ $subKriteria->nilai }}</td>
            </tr>
        </table>

        <hr>

        <div class="container mt-3">
            <h3>Kriteria {{ $subKriteria->kriteria->nama }}</h3>
            <table class="tables">
                <thead>
                    <tr>
                        <th>Nama Sub Kriteria</th>
                        <th>Nilai</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($subKriteria->kriteria->subKriteria->sortBy('nilai') as $item)
                        {{-- untuk tidak menampilkan subkriteria idnya = @foreach ($subKriteria->kriteria->subKriteria()->where('id', '!=', $subKriteria->id)->orderBy('nilai', 'asc')->get() as $item) [dan class pada trnya hilangin] --}}
                        <tr class="{{ $item->id === $subKriteria->id ? 'text-info' : '' }}">
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->nilai }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <br>
            <a href="{{ route('subkriteria.index') }}" class="btn btn-primary float-end">Kembali</a>
        </div>
    </div>
@endsection
