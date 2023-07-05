@extends('layouts.app')

@section('pageTitle')
    Sub Kriteria
@endsection

@section('content')
    {{-- @dd($subKriteria) --}}
    <div class="container">
        <a href="{{ route('subkriteria.create') }}" class="btn btn-primary mb-3" id="mobile-button">Tambah Sub Kriteria</a>
        <button type="button" class="btn btn-primary mb-3" id="desktop-button" data-bs-toggle="modal" data-bs-target="#tambahModal">
            Tambah Sub Kriteria
        </button>
        <div class="float-end">
            <a href="{{ route('kriteria.index') }}" class="btn btn-secondary mb-3">Kembali</a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Nama</th>
                    <th class="text-center">Kriteria</th>
                    <th class="text-center">Nilai</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($subKriteria as $item)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->kriteria->nama }}</td>
                        <td class="text-center">{{ $item->nilai }}</td>
                        <td class="text-center">
                            <a href="{{ route('subkriteria.show', $item->id) }}" class="btn btn-sm btn-primary">Detail</a>
                            <a href="{{ route('subkriteria.edit', $item->id) }}" class="btn btn-sm btn-warning" id="mobile-button">Edit</a>
                            <form action="{{ route('subkriteria.destroy', $item->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" id="mobile-button"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus sub kriteria ini?')">Hapus</button>
                            </form>
                            <!-- Button trigger modal Edit-->
                            <button type="button" class="btn btn-sm btn-warning rounded" id="desktop-button" data-bs-toggle="modal"
                                data-bs-target="#editModal{{ $item->id }}">
                                Edit
                            </button>
                            <!-- Button trigger modal Hapus-->
                            <button type="button" class="btn btn-sm btn-danger rounded" id="desktop-button" data-bs-toggle="modal"
                                data-bs-target="#hapusModal{{ $item->id }}">
                                Hapus
                            </button>
                        </td>
                    </tr>

                    <!-- Modal Edit Sub Kriteria-->
                    <div class="modal fade modal-lg" id="editModal{{ $item->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Sub Kriteria
                                        {{ $item->nama }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="{{ route('subkriteria.update', $item->id) }}" method="post">
                                    @csrf
                                    @method('PATCH')
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label>Kriteria:</label>
                                            <select name="kriteria_id" class="form-control" required>
                                                <option value="">Pilih Kriteria</option>
                                                @foreach($kriterias as $kriteria)
                                                    <option value="{{ $kriteria->id }}" {{ $item->kriteria_id == $kriteria->id ? 'selected' : '' }}>{{ $kriteria->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama:</label>
                                            <input type="text" name="nama" value="{{ $item->nama }}" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Nilai:</label>
                                            <input type="number" name="nilai" value="{{ $item->nilai }}" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Kembali</button>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Hapus Sub Kriteria -->
                    <div class="modal fade" id="hapusModal{{ $item->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Hapus Sub Kriteria</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Apakah anda yakin ingin menghapus Sub Kriteria {{ $item->nama }}
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Kembali</button>
                                    <form action="{{ route('subkriteria.destroy', $item->id) }}" method="post"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger rounded" {{-- onclick="return confirm('Apakah Anda yakin ingin menghapus kriteria ini?')" --}}>Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal Tambah Sub Kriteria-->
    <div class="modal fade modal-lg" id="tambahModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Sub Kriteria</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('subkriteria.store') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Kriteria:</label>
                            <select name="kriteria_id" class="form-control" required>
                                <option value="">Pilih Kriteria</option>
                                @foreach ($kriterias as $kriteria)
                                    <option value="{{ $kriteria->id }}" @if (old('kriteria_id') == $kriteria->id) selected @endif>
                                        {{ $kriteria->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Nama:</label>
                            <input type="text" name="nama" value="{{ old('nama') }}" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Nilai:</label>
                            <input type="number" name="nilai" value="{{ old('nilai') }}" class="form-control"
                                required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
