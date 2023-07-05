@extends('layouts.app')

@section('pageTitle')
    Alternatif
@endsection

@section('content')
    <div class="container">
        <h1>Tambah Alternatif</h1>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    {{-- <div class="card-header">Tambah Alternatif</div> --}}
                    <div class="card-body">
                        <form action="{{ route('alternatif.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="nama">Nama Alternatif</label>
                                <input type="text" name="nama" id="nama" class="form-control"
                                    value="{{ old('nama') }}">
                            </div>
                            <div class="form-group">
                                <label for="nilai">Nilai</label>
                                <div id="nilai-container">
                                    <div class="row">
                                        @foreach ($kriteria as $k)
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="nilai-{{ $k->id }}">{{ $k->nama }}</label>
                                                    <select class="form-control" name="nilai[{{ $k->id }}][]"
                                                        id="nilai-{{ $k->id }}">
                                                        <option value="">---</option>
                                                        <!-- Menambahkan opsi nilai default "---" -->
                                                        @php
                                                            $subKriteria = \App\Models\SubKriteria::where('kriteria_id', $k->id)->get();
                                                        @endphp
                                                        @foreach ($subKriteria as $sk)
                                                            <option value="{{ $sk->id }}">{{ $sk->nama }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div> <br>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('alternatif.index') }}" class="btn btn-secondary">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
