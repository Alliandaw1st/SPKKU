@extends('layouts.app')

@section('pageTitle')
    Alternatif
@endsection

@section('content')
    <div class="container">
        <h1>Detail Alternatif</h1>
        <table class="tables ">
            <tr>
                <th>Nama</th>
                <td>: {{ $alternatif->nama }}</td>
            </tr>
        </table>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nilai">Nilai:</label>
                            <div id="nilai-container">
                                <div class="row">
                                    @foreach ($kriteria as $k)
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="nilai-{{ $k->id }}">{{ $k->nama }}</label>
                                                <select class="form-control" name="nilai[{{ $k->id }}][]" id="nilai-{{ $k->id }}" disabled>
                                                    <option value="">---</option>
                                                    <!-- Menambahkan opsi nilai default "---" -->
                                                    @php
                                                        $subKriteria = \App\Models\SubKriteria::where('kriteria_id', $k->id)->get();
                                                    @endphp
                                                    @foreach ($subKriteria as $sk)
                                                        <option value="{{ $sk->id }}"
                                                            @if ($alternatif->alternatifKriteriaSubkriteria->where('kriteria_id', $k->id)->pluck('sub_kriteria_id')->contains($sk->id)) selected @endif>
                                                            {{ $sk->nama }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div> <br>
                    </div>
                </div>
            </div>
        </div>
        <div class="float-end mt-3">
            <a href="{{ route('alternatif.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
@endsection
