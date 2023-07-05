@extends('layouts.app')

@section('pageTitle')
    Mahasiswa
@endsection

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    {{-- <div class="card-header">Data Alternatif</div> --}}
                    <div class="card-body">
                        @if ($isAdmin)
                            {{-- Tampilkan tombol jika user adalah admin --}}
                            <a href="{{ route('alternatif.create') }}" class="btn btn-primary mb-3" id="mobile-button">Tambah
                                Mahasiswa</a>
                            <button type="button" class="btn btn-primary mb-3" id="desktop-button" data-bs-toggle="modal"
                                data-bs-target="#tambahModal">
                                Tambah Mahasiswa
                            </button>
                        @endif

                        <div class="table-responsive">
                            <!-- Menambahkan kelas .table-responsive untuk tabel responsif -->
                            <table class="table table-hover"> {{-- table-bordered-striped --}}
                                <thead class="table-light">
                                    <tr>
                                        <th class="text-center align-middle">No</th>
                                        <th class="text-center align-middle">Nama</th>
                                        @foreach ($kriteria as $k)
                                            <th class="text-center align-middle">{{ $k->nama }}</th>
                                        @endforeach
                                        <th class="text-center align-middle">Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($alternatif as $a)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $a->nama }}</td>
                                            @foreach ($kriteria as $krit)
                                                @php
                                                    $subkriteria = $a->alternatifKriteriaSubkriteria->where('kriteria_id', $krit->id)->first();
                                                @endphp
                                                @if ($subkriteria && $subkriteria->subKriteria)
                                                    <td class="text-center">
                                                        {{ $subkriteria->subKriteria->nama }}
                                                    </td>
                                                @else
                                                    <td class="text-center align-middle">
                                                        ---
                                                    </td>
                                                @endif
                                            @endforeach
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Actions">
                                                    <a href="{{ route('alternatif.show', $a->id) }}"
                                                        class="btn btn-sm btn-primary rounded">Detail</a>

                                                    @if ($isAdmin)
                                                        <a href="{{ route('alternatif.edit', $a->id) }}"
                                                            class="btn btn-sm btn-warning rounded mx-1"
                                                            id="mobile-button">Edit</a>
                                                        <!-- Button trigger modal Edit-->
                                                        <button type="button" class="btn btn-sm btn-warning rounded mx-1"
                                                            id="desktop-button" data-bs-toggle="modal"
                                                            data-bs-target="#editModal{{ $a->id }}">
                                                            Edit
                                                        </button>
                                                        <form action="{{ route('alternatif.destroy', $a->id) }}"
                                                            method="post" class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger rounded"
                                                                id="mobile-button"
                                                                onclick="return confirm('Apakah Anda yakin ingin menghapus alternatif ini?')">Hapus</button>
                                                        </form>
                                                        <!-- Button trigger modal Hapus-->
                                                        <button type="button" class="btn btn-sm btn-danger rounded"
                                                            id="desktop-button" data-bs-toggle="modal"
                                                            data-bs-target="#hapusModal{{ $a->id }}">
                                                            Hapus
                                                        </button>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>

                                        <!-- Modal Edit Alternatif-->
                                        <div class="modal fade modal-lg" id="editModal{{ $a->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit Mahasiswa
                                                            {{ $a->nama }}</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <form action="{{ route('alternatif.update', $a->id) }}" method="post">
                                                        @csrf
                                                        @method('PATCH')
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="nama">Nama Mahasiswa</label>
                                                                <input type="text" name="nama" id="nama"
                                                                    class="form-control" value="{{ $a->nama }}"
                                                                    required>
                                                            </div>
                                                            <div class="form-group mt-2">
                                                                <label for="nilai">Nilai Mahasiswa
                                                                    {{ $a->nama }}</label>
                                                                <div id="nilai-container">
                                                                    <div class="row">
                                                                        @foreach ($kriteria as $krit)
                                                                            @php
                                                                                $subkriteria = $a->alternatifKriteriaSubkriteria->where('kriteria_id', $krit->id)->first();
                                                                            @endphp
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        for="nilai-{{ $krit->id }}">{{ $krit->nama }}</label>
                                                                                    <select class="form-control"
                                                                                        name="nilai[{{ $krit->id }}][]"
                                                                                        id="nilai-{{ $krit->id }}">
                                                                                        <option value="">---</option>
                                                                                        <!-- Menambahkan opsi nilai default "---" -->
                                                                                        @php
                                                                                            $subKriteria = \App\Models\SubKriteria::where('kriteria_id', $krit->id)->get();
                                                                                        @endphp
                                                                                        @foreach ($subKriteria as $sk)
                                                                                            <option
                                                                                                value="{{ $sk->id }}"
                                                                                                {{ $subkriteria && $subkriteria->sub_kriteria_id == $sk->id ? 'selected' : '' }}>
                                                                                                {{ $sk->nama }}
                                                                                            </option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        @endforeach
                                                                    </div>
                                                                </div>
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
                                        <!-- Modal Hapus Alternatif -->
                                        <div class="modal fade" id="hapusModal{{ $a->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Hapus Mahasiswa
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Apakah anda yakin ingin menghapus Mahasiswa {{ $a->nama }}
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Kembali</button>
                                                        <form action="{{ route('alternatif.destroy', $a->id) }}"
                                                            method="post" class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger rounded"
                                                                {{-- onclick="return confirm('Apakah Anda yakin ingin menghapus alternatif ini?')" --}}>Hapus
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
                    </div>
                    {{-- <div class="card-footer">
                        test
                    </div> --}}
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah Alternatif-->
    <div class="modal fade modal-lg" id="tambahModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Mahasiswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('alternatif.store') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama">Nama Alternatif</label>
                            <input type="text" name="nama" id="nama" class="form-control"
                                value="{{ old('nama') }}" required>
                        </div>
                        <div class="form-group mt-2">
                            <label for="nilai">Nilai Mahasiswa</label>
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
                                                        <option value="{{ $sk->id }}">
                                                            {{ $sk->nama }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
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
