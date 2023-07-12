<!DOCTYPE html>
<html lang="en">
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SPK</title>
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
    <link rel="icon" href="{{ asset('image/Logo-Untan-Universitas-Tanjungpura.png') }}" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
    <!-- Masukkan kode untuk header, navbar, atau elemen lain yang diperlukan untuk tampilan Anda -->
    @if (!Request::is('moora/laporan'))
        @include('layouts.komponen.header')
    @endif

    <div class="container">
        @if (Auth::check())
            @if (Request::is('kriteria', 'subkriteria', 'alternatif', 'moora*', 'user') && !Request::is('moora/laporan'))
                @include('layouts.komponen.navbar')
            @endif
        @endif
        {{-- @include('layouts/komponen/pesan') --}}
        @yield('content')
        <!-- Menampilkan konten yang akan ditempatkan di dalam yield -->
    </div>

    <script src="//code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <!-- Script untuk mengaktifkan DataTables -->
    <script>
        $(document).ready(function() {
            $('.table').DataTable();
        });
    </script>
    <!-- Script untuk navbar-md -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>

    @include('sweetalert::alert')

</body>

</html>
