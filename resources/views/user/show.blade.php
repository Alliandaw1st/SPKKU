@extends('layouts.app')

@section('content')
    <h1>Detail Pengguna</h1>
    <table class="table">
        <tr>
            <th>ID</th>
            <td>{{ $user->id }}</td>
        </tr>
        <tr>
            <th>Nama</th>
            <td>{{ $user->name }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $user->email }}</td>
        </tr>
        <tr>
            <th>Role</th>
            <td>{{ $user->is_admin ? 'Operator' : 'Decision Maker' }}</td>
        </tr>
    </table>
    <a href="{{ route('user.index') }}" class="btn btn-primary m-2 float-end">Kembali</a>
@endsection
