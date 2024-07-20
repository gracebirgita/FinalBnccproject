<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Toy;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // Decrease item quantity in the cart
    public function decrease($id)
    {
        $cart = session()->get('cart');

        if (isset($cart[$id])) {
            $cart[$id]['quantity']--;

            if ($cart[$id]['quantity'] <= 0) {
                unset($cart[$id]);
            }

            session()->put('cart', $cart);
        }

        return redirect()->route('cart.show')->with('success', 'Toy quantity updated successfully!');
    }

    // Remove item from the cart
    public function remove($id)
    {
        $cart = session()->get('cart');

        if (isset($cart[$id])) {
            unset($cart[$id]);

            session()->put('cart', $cart);
        }

        return redirect()->route('cart.show')->with('success', 'Toy removed from cart successfully!');
    }

    // Add item to the cart
    public function addToCart(Toy $toy)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$toy->id])) {
            $cart[$toy->id]['quantity']++;
        } else {
            $cart[$toy->id] = [
                "name" => $toy->name,
                "quantity" => 1,
                "price" => $toy->price,
                "stock" => $toy->stock,
                "image" => $toy->image
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Toy added to cart successfully!');
    }

    // Show cart items
    public function showCart()
    {
        $cart = session()->get('cart', []);
        return view('cart', compact('cart'));
    }

    // Remove item from the cart (by request)
    public function removeFromCart(Request $request, $id)
    {
        $cart = session()->get('cart');

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.show')->with('success', 'Toy removed from cart!');
    }

    // Decrease item quantity in the cart (by request)
    public function decreaseQuantity(Request $request, $id)
    {
        $cart = session()->get('cart');

        if (isset($cart[$id]) && $cart[$id]['quantity'] > 1) {
            $cart[$id]['quantity']--;
        } else {
            unset($cart[$id]);
        }

        session()->put('cart', $cart);
        return redirect()->route('cart.show')->with('success', 'Toy quantity decreased!');
    }

    // Checkout and create order

    public function checkout()
    {
    $cart = session()->get('cart', []);
    $totalQuantity = 0;
    $totalPrice = 0;

    foreach ($cart as $item) {
        $totalQuantity += $item['quantity'];
        $totalPrice += $item['quantity'] * $item['price'];
    }

    $order = Order::create([
        'user_id' => Auth::id(),
        'total_quantity' => $totalQuantity,
        'total_price' => $totalPrice
    ]);

    foreach ($cart as $id => $details) {
        OrderItem::create([
            'order_id' => $order->id,
            'toy_id' => $id,
            'quantity' => $details['quantity'],
            'price' => $details['price']
        ]);

        // Reduce stock
        $toy = Toy::find($id);
        $toy->stock -= $details['quantity'];
        $toy->save();
    }

    session()->forget('cart');
    return view('invoice', compact('order', 'totalQuantity', 'totalPrice'));
    }

    // Generate invoice for the order
    public function invoice(Order $order)
    {
        $totalQuantity = $order->orderItems->sum('quantity');
        $totalPrice = $order->orderItems->sum(function($item) {
            return $item->quantity * $item->price;
        });
    
        return view('invoice', compact('order', 'totalQuantity', 'totalPrice'));
    }
    
}
