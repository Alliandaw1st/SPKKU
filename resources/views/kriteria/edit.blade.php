@extends('layouts.app')

@section('pageTitle')
    Kriteria
@endsection

@section('content')
<div class="container">
    <h1>Edit Kriteria</h1>
    <form action="{{ route('kriteria.update', $kriteria->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group mt-3 mb-2">
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control" value="{{ $kriteria->nama }}" required>
        </div>
        <div class="form-group mb-2">
            <label for="bobot">Bobot</label>
            <input type="number" name="bobot" id="bobot" class="form-control" value="{{ $kriteria->bobot }}" step="0.01" min="0" required>
        </div>
        <div class="form-group mb-3">
            <label for="tipe">Tipe</label>
            <select name="tipe" id="tipe" class="form-control" required>
                <option value="benefit" @if($kriteria->tipe == 'benefit') selected @endif>Benefit</option>
                <option value="cost" @if($kriteria->tipe == 'cost') selected @endif>Cost</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('kriteria.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
