<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        main{
            height: 100vh;
        }

        .card-img-top {
        width: 60%;
        border-radius: 50%;
        margin: 0 auto;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }
        .card {
        padding: 1.5em 0.5em 0.5em;
        text-align: center;
        border-radius: 2em;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
        }
        .card-title {
        font-weight: bold;
        font-size: 1.5em;
        }
        .btn-primary {
        border-radius: 2em;
        padding: 0.5em 1.5em;
        }

    </style>
</head>
<body>
    <main>
        <div class="container d-flex justify-content-center" style="margin-top: 10vh;">
            <div class="card" style="width: 18rem;">
                <img src="{{ asset('haidar.jpeg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Muhammad Haidar Mubarok</h5>
                  <p class="card-text">191011401686</p>
                  <p class="card-text">Teknik Informatika</p>
                  <p class="card-text">Universitas Pamulang</p>
                  <a href="{{ route('home') }}" class="btn btn-primary">Pergi Ke Aplikasi</a>
                </div>
              </div>
        </div>
    </main>
</body>
</html>
