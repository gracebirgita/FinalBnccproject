{{-- @php
    $email = Session::get('email');
    if ($email == null) {
        header('Location: /login');
        exit;
    }
    if($email != 'admin@gmail.com'){
        header('Location: /dashboard');
        exit;
    }
    // if (!Session::get('email')) {
    //     return redirect('/login')->with('error', 'You must be logged in to access this page.');
    // }
@endphp --}}
{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
    <body>
        <p>Admin Page</p>
    </body>

</html> --}}

{{-- INI DASHBOARD ADMIN --}}


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

    <div class="container p-4" style="min-height: 100vh">
        @yield('content')

        <div class="d-flex justify-content-crnter align-items-start flex-column gap-4">
            <a class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover"
                href="{{ route('toy.create') }}">
                + Add Toy
            </a>

            <div class="dropdown">
                <button class="btn btn-outline-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                    Categories
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li><a class="dropdown-item" href="{{ route('admin.home') }}">All Categories</a></li>
                    @foreach ($categories as $category)
                        <li><a class="dropdown-item" href="{{ route('admin.filter', $category) }}">{{ $category->name }}</a></li>
                    @endforeach
                </ul>
            </div>
            <h3>Toy List</h3>
            <table class="table table-hover table-striped text-center">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Category</th>
                        <th scope="col">Stock</th>
                        <th scope="col">Price</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($toys as $index => $toy)
                    <tr style="vertical-align: middle">
                        <th scope="row">{{ $index + 1 }}</th>
                        <td>
                            <img src="{{ $toy->image ? asset('storage/' . $toy->image) : 'https://placehold.co/100/purple/white?text=Toys' }}" 
                                 alt="{{ $toy->name }}" style="max-width: 100px; max-height: 100px;">
                        </td>
                        <td>
                            <a class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover" href="{{ route('toy.detail', $toy) }}">
                                {{ $toy->name }}
                            </a>
                        </td>
                        <td>{{ $toy->category->name }}</td>
                        <td>{{ $toy->stock }}</td>
                        <td>{{ $toy->price }}</td>
                        <td>
                            <div class="d-flex justify-content-center align-items-center gap-4">
                                <a class="btn btn-outline-primary" href="{{ route('toy.edit', $toy) }}">
                                    <i class="bi bi-pen"></i>
                                </a>
                                <form action="{{ route('toy.delete', $toy)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-outline-danger">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- @extends('partial.footer') --}}
    {{-- @yield('script') --}}
</body>
</html>
