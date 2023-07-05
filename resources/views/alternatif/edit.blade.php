@extends('layouts.app')

@section('pageTitle')
    Alternatif
@endsection

@section('content')
    <div class="container">
        <h1>Edit Alternatif</h1>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    {{-- <div class="card-header">Edit Alternatif</div> --}}
                    <div class="card-body">
                        <form action="{{ route('alternatif.update', $alternatif->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <!-- Menambahkan method PUT untuk mengirim request sebagai update -->
                            <div class="form-group">
                                <label for="nama">Nama Alternatif</label>
                                <input type="text" name="nama" id="nama" class="form-control" value="{{ $alternatif->nama }}" required>
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
                            <div class="float-end">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{ route('alternatif.index') }}" class="btn btn-secondary ">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
