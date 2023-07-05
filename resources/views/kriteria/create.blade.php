@extends('layouts.app')

@section('pageTitle')
    Kriteria
@endsection

@section('content')
<div class="container">
    <h1>Tambah Kriteria</h1>
    <form action="{{ route('kriteria.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama') }}" required>
        </div>
        <div class="form-group">
            <label for="bobot">Bobot</label>
            <input type="number" name="bobot" id="bobot" class="form-control" value="{{ old('bobot') }}" step="0.01" min="0" required>
        </div>
        <div class="form-group">
            <label for="tipe">Tipe</label>
            <select name="tipe" id="tipe" class="form-control" required>
                <option value="benefit" {{ old('tipe') == 'benefit' ? 'selected' : '' }}>Benefit</option>
                <option value="cost" {{ old('tipe') == 'cost' ? 'selected' : '' }}>Cost</option>
            </select>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('kriteria.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
