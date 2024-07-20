<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    {{-- icon --}}
    <link rel="icon" href="{{ asset('img/logo.jpg') }}">

    {{-- Bootstrap link --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    {{-- Default Reset CSS --}}
    <link rel="stylesheet" href="{{ asset('css/base.css') }}">

    {{-- Custom CSS Link --}}
    @yield('style')
</head>


<body>
    @include('header2')

    @yield('content')
    <div class="row" style="min-height: 100vh">
        <div class="col-4 d-flex justify-content-center align-items-center flex-column border-1 border-end border-dark">
            <div style="max-width: 350px; max-height: 350px">
                <img class="w-100 h-100" style="display:block;" src="{{ $toy->image ? asset('storage/' . $toy->image) : 'https://placehold.co/300/purple/white?text=Toys' }}"
                alt="toy-image">
            </div>
        </div>
        <div class="col-5 d-flex justify-content-center align-items-start flex-column ps-5">
            <h1 class="mb-3" style="color: purple;">Toy Detail</h1>
            <div class="mb-3" style="margin-top:40px;">
                <h3>Name</h3>
                <p>
                    {{ $toy->name }}
                </p>
            </div>
            <div class="mb-3">
                <h3>Category</h3>
                <p>
                    {{ $toy->category?->name }}
                </p>
            </div>
            <div class="mb-3">
                <h3>Description</h3>
                <p>
                    {{ $toy->description }}
                </p>
            </div>
            <div class="mb-3">
                <h3>Stock</h3>
                <p>
                    {{ $toy->stock }}
                </p>
            </div>
            <div class="mb-3">
                <h3>Price</h3>
                <p>
                    Rp. {{ number_format($toy->price, 0, ',', '.') }}
                </p>
        </div>
    </div>
    @include('partial.footer')
</body>
</html>
