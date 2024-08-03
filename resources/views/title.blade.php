<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body>
    @include('header2')

    @yield('content')
    <div class="container p-4" style="min-height: 100vh">
        <div class="w-100 d-flex justify-content-center align-items-center flex-column gap-4" style="min-height: 50vh">
            <h3 class="fw-semibold">Check Out the Newest Toys!</h3>
            <div class="w-50">
                <form action="/search" class="d-flex justify-content-center align-items-center gap-4" method="GET">
                    <input type="text" class="form-control" placeholder="Search for a toy ..." name="search" value="{{ $search ?? '' }}">
                    <button type="submit" class="btn btn-outline-dark">Search</button>
                </form>
                @if(empty($toys))
                    <p style="text-align: center; font-weight:bold; color:brown;">No results found.</p>
                @endif
            </div>
        </div>
        <h3 class="mb-4">Recommendation</h3>
        <div class="d-flex justify-content-around align-items-center flex-wrap gap-4 my-5">
            @foreach ($toys as $toy)
                <div class="card" style="width: 18rem;">
                    <img src="{{ $toy->image ? asset('storage/' . $toy->image) : 'https://placehold.co/300/purple/white?text=Toys' }}" class="card-img-top" alt="Toy Image">
                    <div class="card-body">
                        <span class="badge text-bg-primary">{{ $toy->category->name }}</span>
                        <h5 class="card-title">{{ $toy->name }}</h5>
                        <p class="card-text">{{ Str::limit($toy->description, 150, '...') }}</p>
                        <p class="fw-bold">Price: Rp{{ number_format($toy->price, 0, ',', '.') }}</p>
                        <p class="text-semibold text-danger">Stock: {{ $toy->stock }}</p>
                        <div class="d-flex w-100 justify-content-around align-items-center">
                            <a class="link-dark link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover"
                                href="{{ route('toy.detail', $toy) }}">
                                Detail
                            </a>
                            <a href="#" class="btn btn-dark" onclick="document.getElementById('add-to-cart-{{ $toy->id }}').submit();">Buy</a>
                            <form id="add-to-cart-{{ $toy->id }}" action="{{ route('cart.add', $toy) }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @extends('partial.footer')

</body>
</html>
