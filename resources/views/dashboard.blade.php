{{-- @extends('index')


@section('title', "dashboard")

@section('content')

@php
    if (!Session::get('email')) {
        header('Location: /login');
        exit;
    }
@endphp
{{-- <div class="w-50 center border rounder px-3 py-3 mx-auto">
    <h1>Dashboard</h1>
    <p>Welcome, {{ Session::get('email') }}</p>
    <a href="/login" class="btn btn-danger">Logout</a> --}}

{{-- @endsection  --}}


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('tittle')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    {{-- @extends('partial.header') --}}
    @include('header2')

    <div class="container p-4" style="min-height: 100vh">
        @yield('content')
        <div class="w-100 d-flex justify-content-center align-items-center flex-column gap-4" style="min-height: 50vh">
            <h3 class="fw-semibold">Check Out the Newest Toys!</h3>
            <div class="w-50">
                {{-- search --}}
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
        {{-- <button class="btn btn-primary rounded-pill px-3" type="button" onclick="window.location.href='/login'">Login</button>
        <button class="btn btn-secondary rounded-pill px-3" type="button">Register</button>
        <button class="btn btn-success rounded-pill px-3" type="button">Success</button>
        <button class="btn btn-danger rounded-pill px-3" type="button">Danger</button>
        <button class="btn btn-warning rounded-pill px-3" type="button">Warning</button>
        <button class="btn btn-info rounded-pill px-3" type="button">Info</button>
        <button class="btn btn-light rounded-pill px-3" type="button">Light</button>
        <button class="btn btn-dark rounded-pill px-3" type="button">Dark</button>
        <button class="btn btn-link rounded-pill px-3" type="button">Link</button> --}}
    </div>

    {{-- @yield('content')
    <div class="container p-5 d-flex justify-content-center align-item-star flex-colums">
        <button class="btn btn-primary rounded-pill px-3" type="button" onclick="window.location.href='/login'">Login</button>
        <button class="btn btn-secondary rounded-pill px-3" type="button">Register</button>
        <button class="btn btn-success rounded-pill px-3" type="button">Success</button>
        <button class="btn btn-danger rounded-pill px-3" type="button">Danger</button>
        <button class="btn btn-warning rounded-pill px-3" type="button">Warning</button>
        <button class="btn btn-info rounded-pill px-3" type="button">Info</button>
        <button class="btn btn-light rounded-pill px-3" type="button">Light</button>
        <button class="btn btn-dark rounded-pill px-3" type="button">Dark</button>
        <button class="btn btn-link rounded-pill px-3" type="button">Link</button>
    </div> --}}

    @extends('partial.footer')

    @yield('script')

</body>
</html>
