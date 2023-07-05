<header>
    <div class="container position-relative">
        <div class="brand">
            <a href="{{ route('alternatif.index') }}">
                <img src="{{ asset('image/Logo-Untan-Universitas-Tanjungpura.png') }}" alt="">
            </a>
            {{-- <a href="https://www.freepik.com/free-vector/glowing-rays-background-orange-color_9106112.htm#query=orange%20background&position=1&from_view=search&track=ais">Image by starline</a> on Freepik --}}
            <div class="brand-title">
                <a href="{{ route('alternatif.index') }}" class="text-decoration-none">
                    <h1>SPK KIP Kuliah UNTAN</h1>
                </a>
                <h3>@yield('pageTitle')</h3>
            </div>
        </div>
        <div class="position-absolute top-0 end-0 mt-3 mx-5">
            <div class="profile">
                <a href="{{ route('profile') }}" class="btn btn-link btn-outline-light text-decoration-none"
                    id="desktop-button">
                    <em>
                        @if (Auth::user()->is_admin == 1)
                            Operator
                        @else
                            Decision Maker
                        @endif
                        , {{ Auth::user()->name }}
                        <i class="fa-solid fa-user-large"></i>
                    </em>
                </a>
            </div>
        </div>
    </div>
</header>
