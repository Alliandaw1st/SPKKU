@extends('layouts.app')

@section('pageTitle')
    Sub Kriteria
@endsection

@section('content')
<div class="container">
    <h1>Edit Sub Kriteria</h1>
    <form action="{{ route('subkriteria.update', $subKriteria->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Kriteria:</label>
            <select name="kriteria_id" class="form-control" required>
                <option value="">Pilih Kriteria</option>
                @foreach($kriterias as $kriteria)
                    <option value="{{ $kriteria->id }}" {{ $subKriteria->kriteria_id == $kriteria->id ? 'selected' : '' }}>{{ $kriteria->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Nama:</label>
            <input type="text" name="nama" value="{{ $subKriteria->nama }}" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Nilai:</label>
            <input type="number" name="nilai" value="{{ $subKriteria->nilai }}" class="form-control" required>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('subkriteria.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>

@endsection
