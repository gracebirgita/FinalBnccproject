<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>

    {{-- boothstrap link --}}
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
            {{-- <div class="d-flex justify-content-center align-items-center flex-column gap-4 h-100 border-end border-1 border-dark">
                <h1>Register</h1>
                <h1>PAGE</h1>
            </div> --}}
        </div>
        <div class="col-8">
            <div class="h-100 d-flex justify-content-center align-items-start flex-column">
                <div class="my-4">
                    <h2>Welcome to Toys Store!</h2>
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
                <form action="{{ route('register')}}" class="w-75" method="POST">
                    {{-- method post dlm form --}}
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="name" required oninvalid="this.setCustomValidity('Please fill your name')" oninput="setCustomValidity('')">
                        <label for="floatingInput">Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email" required oninvalid="this.setCustomValidity('Please fill your email with a valid email address including an @')" oninput="setCustomValidity('')">
                        <label for="floatingInput">Email address</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password" required oninvalid="this.setCustomValidity('Please fill your password')" oninput="setCustomValidity('')">
                        <label for="floatingPassword">Password</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="floatingConfirmPassword" placeholder="Password" name="password_confirmation" required oninvalid="this.setCustomValidity('rewrite your password to confirm')" oninput="setCustomValidity('')">
                        <label for="floatingConfirmPassword">Confirm Password</label>
                    </div>
                    {{-- @if($errors->has('password'))
                        <div class="text-danger">{{ $errors->first('password') }}</div>
                    @endif --}}
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" name="confirm" required oninvalid="this.setCustomValidity('Please agree to the privacy and policy to continue')" oninput="setCustomValidity('')">
                        <label class="form-check-label" for="flexCheckDefault">
                        I agree with <a class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover" href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" target="_blank">
                            privacy and policy
                        </a>
                        </label>
                    </div>
                    <div class="mb-3">
                        <b>Already have an account? <span><a class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover" href="{{ route('login') }}">Login</a> here</span></b>
                    </div>
                    <button class="btn btn-outline-dark">Register</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
