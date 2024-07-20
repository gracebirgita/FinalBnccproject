{{--
@extends('index')

@section('title', "login")



@section('content')
<div class="w-50 center border rounder px-3 py-3 mx-auto">
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <h1>Login</h1>
    {{-- <form action="/login" method="post"> --}}
        {{-- @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" value="{{ Session::get('email') }}" name="email">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" name="remember">
            <label class="form-check-label" for="flexCheckDefault">
            Remember Me
            </label>
        </div>
        <div class="mb-3">
            <p>Don't have an account yet? <span><a class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover" href="{{ route('register') }}">Register</a> here</span></p>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </div>
@endsection
 --}}

 <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    {{-- bootstrap link --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    {{-- custom style --}}
    <link rel="stylesheet" href="{{ asset('css/base.css') }}">
</head>

<body>
    <div class="row" style="min-height: 100vh">
        <div class="col-4">
            <div class="d-flex justify-content-center align-items-center flex-column gap-4 h-100 border-end border-1 border-dark">
                <h1>LOGIN</h1>
                <h1>PAGE</h1>
            </div>
        </div>
        <div class="col-8">
            <div class="h-100 d-flex justify-content-center align-items-start flex-column">
                <div class="my-4">
                    <h2>Hi 👋</h2>
                    <h5>Welcome Back</h5>
                </div>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email" required oninvalid="this.setCustomValidity('Please fill your email with a valid email address including an @')" oninput="setCustomValidity('')">
                        <label for="floatingInput">Email address</label>
                    </div>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    {{-- <div class="form-floating mb-3">
                        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>


                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="name@example.com">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div> --}}
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password" required oninvalid="this.setCustomValidity('please fill your password')" oninput="setCustomValidity('')">
                        <label for="floatingPassword">Password</label>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" name="remember">
                        <label class="form-check-label" for="flexCheckDefault">
                        Remember Me
                        </label>
                    </div>
                    <div class="mb-3">
                        <p>Don't have an account yet? <span><a class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover" href="{{ route('register') }}">Register</a> here</span></p>
                    </div>
                    <button class="btn btn-outline-dark">Login</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>

