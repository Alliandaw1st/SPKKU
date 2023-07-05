@extends('layouts.app')

@section('pageTitle')
    Profile
@endsection

@section('content')
    <div>
        <h5>Ubah Profil</h5>
        <form action="{{ route('user.updateProfile', ['user' => Auth::user()->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div>
                <label for="name" class="form-label">Nama</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ Auth::user()->name }}"
                    required>
            </div>
            <div>
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}"
                    required>
            </div>
            <br>
            <hr>
            <div>
                <label for="current_password" class="form-label">Password saat ini</label>
                <input type="password" class="form-control" id="current_password" name="current_password">
            </div>
            <div>
                <label for="new_password" class="form-label">Password baru</label>
                <input type="password" class="form-control" id="new_password" name="new_password">
            </div>
            <div>
                <label for="confirm_password" class="form-label">Konfirmasi Password baru</label>
                <input type="password" class="form-control" id="confirm_password" name="new_password_confirmation">
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('profile') }}" class="btn btn-secondary">Kembali
            </a>
        </form>
    </div>
@endsection
