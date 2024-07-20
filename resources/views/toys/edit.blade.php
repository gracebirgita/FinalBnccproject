{{-- resources/views/toys/edit.blade.php --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Toy</title>

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
    <form action="{{ route('toy.update', $toy) }}" class="w-100" method="POST" enctype="multipart/form-data">
        @csrf
        <!-- @method('PUT') -->
        <div class="row" style="min-height: 100vh">
            <div class="col-4 d-flex justify-content-center align-items-center flex-column border-1 border-end border-dark">
                <div class="mb-3">
                    <label for="formFile" class="form-label">Upload your new toy image!</label>
                    <div style="max-width: 350px; max-height: 350px">
                        <img class="w-100 h-100" style="display:block;"
                            src="{{ $toy->image ? asset('storage/' . $toy->image) : 'https://placehold.co/300/purple/white?text=Toys' }}"
                            alt="toy-image" id="previewImage">
                        <input class="form-control" type="file" name="image" id="imageInput">
                    </div>
                </div>
            </div>
            <div class="col-8 d-flex justify-content-center  flex-column ps-5">
                <h3 class="mb-3">Update Toy</h3>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" name="name"
                        placeholder="name@example.com" value="{{ $toy->name }}">
                    <label for="floatingInput">Name</label>
                </div>
                <div class="mb-3">
                    <select class="form-select" aria-label="Default select example" name="category_id">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ $category->id == $toy->category_id ? 'selected' : '' }}>{{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-floating mb-3">
                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"
                        name="description">{{ $toy->description }}</textarea>
                    <label for="floatingTextarea2">Description</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="number" class="form-control" id="floatingInput" name="stock"
                        placeholder="name@example.com" value="{{ $toy->stock }}">
                    <label for="floatingInput">Stock</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="number" class="form-control" id="floatingInput" placeholder="Price" name="price" step="0.01"
                        value="{{ old('price', $toy->price ?? '') }}">
                    <label for="floatingInput">Price</label>
                </div>
                <div class="form-floating mb-3">
                    <button class="btn btn-outline-dark">Update</button>
                </div>
            </div>
        </div>
    </form>
</body>
</html>
