{{-- INI HEADER YG DIPAKAI --}}
{{-- <nav class="navbar navbar-expand-lg bg-dark p-4 sticky-top top-0" data-bs-theme="dark"> --}}
<nav class="navbar navbar-expand-lg bg-dark p-4 sticky-top top-0" data-bs-theme="dark">

    <div class="container-fluid">
        <a class="navbar-brand" href=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
            {{-- <a class="nav-link active" aria-current="page" href="/">Home</a> --}}
            @if(Auth::user() && Auth::user()->isAdmin())
                <a class="nav-link active" aria-current="page" href="/admindashboard">Home</a>
            @else
                <a class="nav-link active" aria-current="page" href="/">Home</a>
            @endif
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/about">about</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{Route('list')}}">Toys</a>
            </li>
        </ul>
        {{-- <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form> --}}
        <div class="d-flex justify-content-center align-items-center gap-4">
            @if(Auth::user())
            <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet">
                @if(Auth::user()->email != 'admin@gmail.com')
                    <a href="{{ route('cart.show') }}" class="text-light">
                        <i class="bi bi-cart"></i>
                    </a>
                @endif
                <p class="text-light m-0">Hello {{Auth::user()->name}} !</p>
                {{-- <a class="" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a> --}}
                <form action="{{route('logout')}}" method="POST">
                    @csrf
                    <button class="btn btn-outline-light">Logout</a>
                </form>
            @else
                <a href="{{ route('login') }}" class="btn btn-outline-light">Login</a>
                <a href="{{ route('register') }}" class="btn btn-outline-light">Register</a>
            @endif
        </div>
        </div>
    </div>
    </nav>

