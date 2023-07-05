<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('image/Logo-Untan-Universitas-Tanjungpura.png') }}" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>
    <div class="containers">
        <div class="text-center">
            <img src="{{ asset('image/Logo-Untan-Universitas-Tanjungpura.png') }}" alt="SPK KIP Kuliah" width="320"
                height="auto">
            <h1 class="text-white my-2 display-3" style="text-shadow: 1px 1px 1px #816300;">SPK KIP KULIAH UNTAN</h1>
            <div class="line mt-3"></div>
        </div>
        <div class="container-login center border my-4 p-4">
            <h1 class="text-center mb-4">Login</h1>
            <form action="/sesi/login" method="POST">
                @csrf
                <div class="row justify-content-center mb-2">
                    <div class="col-md-10 col-12">
                        <input type="text" value="{{ Session::get('email') }}" name="identifier"
                            class="form-control text-center rounded-pill" placeholder="Enter email / name">
                    </div>
                </div>
                <div class="row justify-content-center mb-4">
                    <div class="col-md-10 col-12">
                        <input type="password" name="password" class="form-control text-center rounded-pill"
                            placeholder="Password">
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-6 col-8">
                        <button type="submit" name="submit"
                            class="btn btn-dark rounded-pill form-control">Login</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @include('sweetalert::alert')

</body>

</html>
