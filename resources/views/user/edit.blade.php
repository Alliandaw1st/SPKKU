@extends('layouts.app')

@section('content')
    <h1>Edit Pengguna</h1>
    <form action="{{ route('user.update', $user->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" name="name" id="name" class="form-control"
                value="{{ $user->name }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control"
                value="{{ $user->email }}" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password"
                class="form-control">
        </div>
        <div class="form-group mb-3">
            @if ($user->id === Auth::user()->id)
                <div class="mt-2">
                    <label for="is_admin">Admin</label>
                    <input type="hidden" name="is_admin" value="1">
                    {{ $user->is_admin ? 'Ya' : 'Tidak' }}
                </div>
            @else
                <label for="is_admin">Role</label>
                <select name="is_admin" id="is_admin" class="form-control"
                    required minlength="4">
                    <option value="0"
                        {{ $user->is_admin == 0 ? 'selected' : '' }}>Decision Maker</option>
                    <option value="1"
                        {{ $user->is_admin == 1 ? 'selected' : '' }}>Operator</option>
                </select>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('user.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
@endsection