<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
<div class="container mt-4">
    <h2>Invoice</h2>
    <p>Order ID: {{ $order->id }}</p>
    <p>User ID: {{ $order->user_id }}</p>
    <p>Total Items Bought: {{ $totalQuantity }}</p>
    <p>Total Price: Rp{{ number_format($totalPrice, 2, ',', '.') }}</p>
    <h4>Order Items:</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order->orderItems as $item)
            <tr>
                <td>{{ $item->toy->name }}</td>
                <td>{{ $item->quantity }}</td>
                <td>Rp{{ number_format($item->toy->price, 2, ',', '.') }}</td>
                <td>Rp{{ number_format($item->quantity * $item->toy->price, 2, ',', '.') }}</td>



            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ url('/') }}" class="btn btn-primary">Back to Menu</a>
</div>
</body>
</html>
