@extends('layouts.app')

@section('pageTitle')
    User
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="table-responsive col-md-12">
                <a href="{{ route('user.create') }}" class="btn btn-primary mb-3" id="mobile-button">Tambah User</a>
                <!-- Button trigger modal Tambah User-->
                <button type="button" class="btn btn-primary mb-3" id="desktop-button" data-bs-toggle="modal"
                    data-bs-target="#tambahModal">
                    Tambah User
                </button>
                {{-- <button type="button" class="btn btn-outline-info mb-3 float-end" id="desktop-button" data-bs-toggle="modal"
                    data-bs-target="#keteranganModal">
                    Keterangan
                </button> --}}

                <table class="table">
                    <thead>
                        <tr>
                            <th class="text-center align-middle">No.</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th class="text-center align-middle">Role</th>
                            <th class="text-center align-middle">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr class="{{ $user->is_admin == 0 ? 'table-info' : '' }}">
                                <td class="text-center align-middle">{{ $loop->iteration }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->is_admin ? 'Operator' : 'Decision Maker' }}</td>
                                <td class="text-center align-middle">
                                    <!-- Show -->
                                    <a href="{{ route('user.show', $user->id) }}" class="btn btn-sm btn-info text-white"
                                        id="mobile-button">Detail</a>
                                    <!-- Button trigger modal Show-->
                                    <button type="button" class="btn btn-sm btn-info text-white rounded"
                                        id="desktop-button" data-bs-toggle="modal"
                                        data-bs-target="#showModal{{ $user->id }}">
                                        Detail
                                    </button>
                                    @if ( !$user->is_admin == 0 )
                                        {{-- <!-- Edit -->
                                        <a href="{{ route('user.edit', $user->id) }}"
                                            class="btn btn-sm btn-warning text-white" id="mobile-button">Edit</a>
                                        <!-- Button trigger modal Edit-->
                                        <button type="button" class="btn btn-sm btn-warning text-white rounded"
                                            id="desktop-button" data-bs-toggle="modal"
                                            data-bs-target="#editModal{{ $user->id }}">
                                            Edit
                                        </button> --}}
                                        @if ($user->id !== auth()->user()->id)
                                        <!-- Hapus -->
                                        <form action="{{ route('user.destroy', $user->id) }}" method="post"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" id="mobile-button"
                                            onclick="return confirm('Are you sure you want to delete this user?')">Hapus</button>
                                        </form>
                                        <!-- Button trigger modal Hapus -->
                                        <button type="button" class="btn btn-sm btn-danger rounded" id="desktop-button"
                                        data-bs-toggle="modal" data-bs-target="#hapusModal{{ $user->id }}">
                                            Hapus
                                        </button>
                                        @endif
                                    @endif
                                </td>
                            </tr>

                            <!-- Modal Detail User-->
                            <div class="modal fade" id="showModal{{ $user->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Detail User
                                                {{ $user->name }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <dl class="row">
                                                <dt class="col-sm-3">ID</dt>
                                                <dd class="col-sm-9">: {{ $user->id }}</dd>
                                                <dt class="col-sm-3">Nama</dt>
                                                <dd class="col-sm-9">: {{ $user->name }}</dd>
                                                <dt class="col-sm-3">Email</dt>
                                                <dd class="col-sm-9">: {{ $user->email }}</dd>
                                                <dt class="col-sm-3">Role</dt>
                                                <dd class="col-sm-9">:
                                                    {{ $user->is_admin ? 'Operator' : 'Decision Maker' }}</dd>
                                            </dl>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Kembali</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal Edit User-->
                            <div class="modal fade modal-lg" id="editModal{{ $user->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit User
                                                {{ $user->name }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('user.update', $user->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="name">Nama</label>
                                                    <input type="text" name="name" id="name" class="form-control"
                                                        value="{{ $user->name }}" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input type="email" name="email" id="email"
                                                        class="form-control" value="{{ $user->email }}" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="password">Password</label>
                                                    <input type="password" name="password" id="password"
                                                        class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    @if ($user->id === Auth::user()->id)
                                                        <div class="mt-2">
                                                            <label for="is_admin">Role : </label>
                                                            <input type="hidden" name="is_admin" value="1">
                                                            {{ $user->is_admin ? 'Operator' : 'Decision Maker' }}
                                                        </div>
                                                    @else
                                                        <label for="is_admin">Role</label>
                                                        <select name="is_admin" id="is_admin" class="form-control"
                                                            required minlength="4">
                                                            <option value="0"
                                                                {{ $user->is_admin == 0 ? 'selected' : '' }}>Decision Maker
                                                            </option>
                                                            <option value="1"
                                                                {{ $user->is_admin == 1 ? 'selected' : '' }}>Operator
                                                            </option>
                                                        </select>
                                                    @endif
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
                            <!-- Modal Hapus User -->
                            <div class="modal fade" id="hapusModal{{ $user->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Hapus User</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Apakah anda yakin ingin menghapus User {{ $user->name }}
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Kembali</button>
                                            <form action="{{ route('user.destroy', $user->id) }}" method="post"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" {{-- onclick="return confirm('Are you sure you want to delete this user?')" --}}>Delete
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
    </div>

    <!-- Modal Tambah User-->
    <div class="modal fade modal-lg" id="tambahModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('user.store') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" name="name" id="name" class="form-control"
                                {{-- value="{{ old('name') }}"  --}} required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control"
                                {{-- value="{{ old('email') }}"  --}} required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control" required
                                minlength="4">
                        </div>
                        <div class="form-group">
                            <label for="is_admin">Role</label>
                            <select name="is_admin" id="is_admin" class="form-control" required>
                                <option value="1">Operator</option>
                                {{-- <option value="0">Decision Maker</option> --}}
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
    <!-- Modal Keterangan-->
    <div class="modal fade" id="keteranganModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Keterangan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('user.store') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <p>
                            Pengguna sistem dengan nama User dan Operator tidak dapat dihapus dan diubah selama pengisian
                            kuesioner berlangsung, kedua akun ini sangat dibutuhkan dan harus dapat diakses oleh semua
                            orang.
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
