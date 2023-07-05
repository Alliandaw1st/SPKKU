@extends('layouts.app')

@section('pageTitle')
    Kriteria
@endsection

@section('content')
    <div class="container">
        <a href="{{ route('kriteria.create') }}" class="btn btn-primary mb-3" id="mobile-button">Tambah Kriteria</a>
        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal"  id="desktop-button" data-bs-target="#tambahModal">
            Tambah Kriteria
        </button>
        <div class="float-end">
            <a href="{{ route('subkriteria.index') }}" class="btn btn-info text-white mb-3">Sub Kriteria</a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th class="text-center">Kode</th>
                    <th class="text-center">Nama</th>
                    <th class="text-center">Bobot</th>
                    <th class="text-center">Tipe</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kriteria as $item)
                    <tr>
                        <td class="text-center">C{{ $loop->iteration }}</td>
                        <td>{{ $item->nama }}</td>
                        <td class="text-center">{{ $item->bobot }}</td>
                        <td class="text-center">{{ $item->tipe }}</td>
                        <td class="text-center">
                            <a href="{{ route('kriteria.show', $item->id) }}" class="btn btn-sm btn-primary rounded">Detail</a>
                            <a href="{{ route('kriteria.edit', $item->id) }}" class="btn btn-sm btn-warning" id="mobile-button">Edit</a>
                            <form action="{{ route('kriteria.destroy', $item->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" id="mobile-button"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus kriteria ini beserta semua subkriterianya?')">Hapus</button>
                            </form>
                            <!-- Button trigger modal Edit-->
                            <button type="button" class="btn btn-sm btn-warning rounded"  id="desktop-button" data-bs-toggle="modal"
                                data-bs-target="#editModal{{ $item->id }}">
                                Edit
                            </button>
                            <!-- Button trigger modal Hapus-->
                            <button type="button" class="btn btn-sm btn-danger rounded"  id="desktop-button" data-bs-toggle="modal"
                                data-bs-target="#hapusModal{{ $item->id }}">
                                Hapus
                            </button>
                        </td>
                    </tr>

                    <!-- Modal Edit Kriteria-->
                    <div class="modal fade modal-lg" id="editModal{{ $item->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Kriteria
                                        {{ $item->nama }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="{{ route('kriteria.update', $item->id) }}" method="post">
                                    @csrf
                                    @method('PATCH')
                                    <div class="modal-body">
                                        <div class="form-group mb-2">
                                            <label for="nama">Nama</label>
                                            <input type="text" name="nama" id="nama" class="form-control" value="{{ $item->nama }}" required>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="bobot">Bobot</label>
                                            <input type="number" name="bobot" id="bobot" class="form-control" value="{{ $item->bobot }}" step="0.01" min="0" required>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="tipe">Tipe</label>
                                            <select name="tipe" id="tipe" class="form-control" required>
                                                <option value="benefit" @if($item->tipe == 'benefit') selected @endif>Benefit</option>
                                                <option value="cost" @if($item->tipe == 'cost') selected @endif>Cost</option>
                                            </select>
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
                    <!-- Modal Hapus Kriteria -->
                    <div class="modal fade" id="hapusModal{{ $item->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Hapus Kriteria</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Apakah anda yakin ingin menghapus Kriteria {{ $item->nama }} beserta dengan Semua Sub Kriteria terkait?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Kembali</button>
                                    <form action="{{ route('kriteria.destroy', $item->id) }}" method="post"
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

    <!-- Modal Tambah Kriteria-->
    <div class="modal fade modal-lg" id="tambahModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Kriteria</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('kriteria.store') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control"
                                value="{{ old('nama') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="bobot">Bobot</label>
                            <input type="number" name="bobot" id="bobot" class="form-control"
                                value="{{ old('bobot') }}" step="0.01" min="0" required>
                        </div>
                        <div class="form-group">
                            <label for="tipe">Tipe</label>
                            <select name="tipe" id="tipe" class="form-control" required>
                                <option value="benefit" {{ old('tipe') == 'benefit' ? 'selected' : '' }}>Benefit</option>
                                <option value="cost" {{ old('tipe') == 'cost' ? 'selected' : '' }}>Cost</option>
                            </select>
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
