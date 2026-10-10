<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()
                ->route('cart.index')
                ->with('error', 'Keranjang belanja masih kosong.');
        }

        $total = collect($cart)->sum(
            fn ($item) => $item['price'] * $item['quantity']
        );

        return view('checkout.index', compact('cart', 'total'));
    }

    public function store(Request $request)
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()
                ->route('cart.index')
                ->with('error', 'Keranjang belanja masih kosong.');
        }

        $order = DB::transaction(function () use ($cart) {
            $total = 0;
            $products = [];

            foreach ($cart as $productId => $item) {
                $product = Product::whereKey($productId)
                    ->lockForUpdate()
                    ->first();

                if (!$product) {
                    throw ValidationException::withMessages([
                        'cart' => 'Salah satu produk sudah tidak tersedia.',
                    ]);
                }

                $quantity = (int) $item['quantity'];

                if ($quantity < 1 || $quantity > $product->stock) {
                    throw ValidationException::withMessages([
                        'cart' => "Stok {$product->name} tidak mencukupi.",
                    ]);
                }

                $products[] = [
                    'product' => $product,
                    'quantity' => $quantity,
                    'price' => $product->price,
                ];

                $total += $product->price * $quantity;
            }

            $order = Order::create([
                'user_id' => auth()->id(),
                'total' => $total,
                'status' => 'pending',
            ]);

            foreach ($products as $item) {
                $order->items()->create([
                    'product_id' => $item['product']->id,
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                ]);

                $item['product']->decrement(
                    'stock',
                    $item['quantity']
                );
            }

            return $order;
        });

        $request->session()->forget('cart');

        return redirect()
            ->route('orders.show', $order)
            ->with('success', 'Pesanan berhasil dibuat!');
    }
}
