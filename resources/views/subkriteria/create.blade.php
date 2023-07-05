@extends('layouts.app')

@section('pageTitle')
    Sub Kriteria
@endsection

@section('content')
<div class="container">
    <h1>Tambah Sub Kriteria</h1>
    <form action="{{ route('subkriteria.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label>Kriteria:</label>
            <select name="kriteria_id" class="form-control" required>
                <option value="">Pilih Kriteria</option>
                @foreach($kriterias as $kriteria)
                    <option value="{{ $kriteria->id }}" @if(old('kriteria_id')==$kriteria->id) selected @endif>{{ $kriteria->nama }}</option>
                @endforeach
            </select>            
        </div>
        <div class="form-group">
            <label>Nama:</label>
            <input type="text" name="nama" value="{{ old('nama') }}" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Nilai:</label>
            <input type="number" name="nilai" value="{{ old('nilai') }}" class="form-control" required>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('subkriteria.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>

@endsection
