<nav class="navbar navbar-expand-lg navbar-body bg-body" aria-label="Fourth navbar example">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <h1>Daftar @yield('pageTitle')</h1>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample04"
            aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-lg-end" id="navbarsExample04">
            <ul class="navbar-nav align-items-center my-auto">
                <li class="nav-item">
                    <a href="{{ route('profile') }}"
                        class="nav-link {{ Request::is('profile') ? 'btn btn-primary text-white' : '' }}" id="mobile-button">Profile
                    </a>
                </li>
                @if (Auth::check() && Auth::user()->is_admin == 1)
                    <!-- Menu untuk Admin -->
                    <li class="nav-item">
                        <a href="{{ route('user.index') }}"
                            class="nav-link {{ Request::is('user*') ? 'btn btn-primary text-white' : '' }}">User
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('alternatif.index') }}"
                            class="nav-link {{ Request::is('alternatif*') ? 'btn btn-primary text-white' : '' }}">Mahasiswa
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('moora.hasil') }}"
                            class="nav-link {{ Request::is('moora*') ? 'btn btn-primary text-white' : '' }}">Perhitungan
                        </a>
                    </li>
                @else
                    <!-- Menu untuk User -->
                    <li class="nav-item">
                        <a href="{{ route('alternatif.index') }}"
                            class="nav-link {{ Request::is('alternatif*') ? 'btn btn-primary text-white' : '' }}">Mahasiswa
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('kriteria.index') }}"
                            class="nav-link {{ Request::is('kriteria*') || Request::is('subkriteria*') ? 'btn btn-primary text-white' : '' }}">Kriteria
                        </a>
                    {{-- </li>
                    <li class="nav-item dropdown">
                        <a href="#"
                            class="nav-link dropdown-toggle {{ Request::is('kriteria*') || Request::is('subkriteria*') ? 'btn btn-primary text-white' : '' }}"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">Parameter
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('kriteria.index') }}">Kriteria</a></li>
                            <li><a class="dropdown-item" href="{{ route('subkriteria.index') }}">Sub Kriteria</a></li>
                        </ul>
                    </li> --}}
                    <li class="nav-item dropdown">
                        <a href=""
                            class="nav-link dropdown-toggle {{ Request::is('moora*') ? 'btn btn-primary text-white' : '' }}"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">Perhitungan
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('moora.index') }}">Detail Perhitungan</a></li>
                            <li><a class="dropdown-item" href="{{ route('moora.hasil') }}">Hasil Perhitungan</a></li>
                            <li>
                                {{-- <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="{{ route('moora.laporan') }}" target="_blank">Cetak
                                    PDF</a></li> --}}
                        </ul>
                    </li>
                    {{-- <li class="nav-item dropdown">
                        <a href=""
                            class="nav-link dropdown-toggle {{ Request::is('moora*') ? 'btn btn-primary text-white' : '' }}"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">Perhitungan
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('moora.index') }}">Detail Perhitungan</a></li>
                            <li><a class="dropdown-item" href="{{ route('moora.hasil') }}">Hasil Perhitungan</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="{{ route('moora.laporan') }}" target="_blank">Cetak
                                    PDF</a></li>
                        </ul>
                    </li> --}}
                @endif
                <li class="nav-item">
                    <a href="/sesi/logout" class="nav-link">
                        <button class="btn btn-danger btn-sm">Logout</button>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
