@extends('layouts.app')

@section('pageTitle')
    Profile
@endsection

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8 border rounded">
                <div class="py-4">
                    {{-- <h1>Profile</h1> --}}

                    <div>
                        <h3>Welcome, {{ $user->name }}</h3>
                        <p>Email: {{ $user->email }}</p>
                        <p>Role: {{ $user->is_admin ? 'Operator' : 'Decision Maker' }}</p>

                        <button type="button" class="btn btn-info text-white" id="desktop-button" data-bs-toggle="modal"
                            data-bs-target="#changeProfilModal">
                            Edit Profile
                        </button>
                        <a href="{{ route('user.editProfile') }}" class="btn btn-info text-white" id="mobile-button">Edit Profile</a>
                        {{-- <a href="{{ url()->previous() }}" class="btn btn-primary float-end">Kembali</a> --}}
                        <a href="{{ route('alternatif.index') }}" class="btn btn-primary float-end">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="changeProfilModal" tabindex="-1" aria-labelledby="changePasswordModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="changePasswordModalLabel">Ganti Kata Sandi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('user.updateProfile', ['user' => Auth::user()->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ Auth::user()->name }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="{{ Auth::user()->email }}" required>
                        </div>
                        <br><hr>
                        <div class="mb-3">
                            <label for="current_password" class="form-label">Password sekarang</label>
                            <input type="password" class="form-control" id="current_password" name="current_password">
                        </div>
                        <div class="mb-3">
                            <label for="new_password" class="form-label">Password baru</label>
                            <input type="password" class="form-control" id="new_password" name="new_password">
                        </div>
                        <div class="mb-3">
                            <label for="confirm_password" class="form-label">Konfirmasi Password baru</label>
                            <input type="password" class="form-control" id="confirm_password"
                                name="new_password_confirmation">
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
@endsection
