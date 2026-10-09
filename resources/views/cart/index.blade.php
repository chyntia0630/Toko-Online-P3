<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja - Toko Online</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #faf4f4;
            color: #292524;
        }

        header {
            background: #5b1010;
            color: white;
            padding: 20px 7%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
        }

        header h2 {
            margin: 0;
        }

        header a {
            color: white;
            text-decoration: none;
            font-weight: bold;
        }

        .container {
            max-width: 1000px;
            margin: 35px auto;
            padding: 0 20px;
        }

        .card {
            background: white;
            padding: 25px;
            border-radius: 14px;
            box-shadow: 0 5px 20px rgba(80, 20, 20, 0.07);
            margin-bottom: 20px;
        }

        h1 {
            color: #7f1d1d;
        }

        .message {
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 15px;
        }

        .success {
            background: #dcfce7;
            color: #166534;
        }

        .error {
            background: #fee2e2;
            color: #991b1b;
        }

        .cart-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            padding: 18px 0;
            border-bottom: 1px solid #eee;
        }

        .item-name {
            font-weight: bold;
            margin-bottom: 8px;
        }

        .item-detail {
            color: #78716c;
            font-size: 14px;
            line-height: 1.6;
        }

        .subtotal {
            font-weight: bold;
            color: #991b1b;
            white-space: nowrap;
        }

        button,
        .button {
            display: inline-block;
            padding: 10px 15px;
            border: none;
            border-radius: 7px;
            background: #7f1d1d;
            color: white;
            text-decoration: none;
            cursor: pointer;
            font-weight: bold;
        }

        button:hover,
        .button:hover {
            background: #991b1b;
        }

        .remove-button {
            background: #dc2626;
            margin-top: 8px;
        }

        .remove-button:hover {
            background: #b91c1c;
        }

        .summary {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
            margin-top: 25px;
        }

        .total {
            font-size: 22px;
            font-weight: bold;
            color: #991b1b;
        }

        .actions {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            margin-top: 20px;
        }

        .empty {
            text-align: center;
            padding: 35px 10px;
            color: #78716c;
        }

        @media (max-width: 500px) {
            .cart-item {
                align-items: flex-start;
                flex-direction: column;
            }

            .summary {
                align-items: flex-start;
                flex-direction: column;
            }
        }

        .quantity-control{
             display: flex;
             align-items: center;
             gap: 14px;
             margin-top: 10px;
        }

        .quantity-control form {
            margin: 0;
        }

        .quantity-control span{
            font-weight: bold;
            min-width: 20px;
            text-align: center;
        }

        .quantity-button{
            width: 34px;
            height: 34px;
            padding: 0;
            border: none;
            border-radius: 7px;
            background: #7f1d1d;
            color: white;
            font-size: 20px;
            cursor: pointer;
        }

        .quantity-button:hover:not(:disabled){
            background: #991b1b;
        }

        .quantity-button:disabled{
            background: #d6baba;
            cursor: not-allowed;
        }
    </style>
</head>
<body>
    <header>
        <h2>Toko Online</h2>
        <a href="{{ route('products.index') }}">Kembali Belanja</a>
    </header>

    <main class="container">
        <h1>Keranjang Belanja</h1>

        @if (session('success'))
            <div class="message success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="message error">
                {{ session('error') }}
            </div>
        @endif

        @if (count($cart) === 0)
            <section class="card empty">
                <h2>Keranjang masih kosong 🛒</h2>
                <p>Yuk, pilih produk yang ingin kamu beli!</p>

                <a href="{{ route('products.index') }}" class="button">
                    Mulai Belanja
                </a>
            </section>
        @else
            <section class="card">
                @php
                    $total = 0;
                @endphp

                @foreach ($cart as $id => $item)
                    @php
                        $subtotal = $item['price'] * $item['quantity'];
                        $total += $subtotal;
                    @endphp

                    <div class="cart-item">
                        <div>
                            <div class="item-name">
                                {{ $item['name'] }}
                            </div>

                            <div class="item-detail">
                                Harga: Rp {{ number_format($item['price'], 0, ',', '.') }}
                            </div>

                            <div class="quantity-control">
                                <form
                                    action="{{ route('cart.update', $id) }}"
                                method="POST"
                                >
                                    @csrf
                                    @method('PATCH')

                                    <input
                                        type="hidden"
                                        name="quantity"
                                        value="{{ $item['quantity'] - 1 }}"
                                        min="1"
                                    >

                                    <button
                                        type="submit"
                                        {{ $item['quantity'] <= 1 ? 'disabled' : '' }}
                                    >
                                        -
                                    </button>
                                </form>
                                <span>{{ $item['quantity'] }}</span>

                                 <form
                                    action="{{ route('cart.update', $id) }}"
                                    method="POST"
                                >
                                    @csrf
                                    @method('PATCH')

                                    <input
                                        type="hidden"
                                        name="quantity"
                                        value="{{ $item['quantity'] + 1 }}"
                                        min="1"
                                    >

                                    <button type="submit">
                                        +
                                    </button>
                                </form>
                            </div>

                            <form
                                action="{{ route('cart.remove', $id) }}"
                                method="POST"
                            >
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="remove-button">
                                    Hapus
                                </button>
                            </form>
                        </div>

                        <div class="subtotal">
                            Rp {{ number_format($subtotal, 0, ',', '.') }}
                        </div>
                    </div>
                @endforeach

                <div class="summary">
                    <span>Total Belanja</span>

                    <span class="total">
                        Rp {{ number_format($total, 0, ',', '.') }}
                    </span>
                </div>

                <div class="actions">
                    <a href="{{ route('products.index') }}" class="button">
                        Tambah Produk
                    </a>

                    <form action="{{ route('cart.clear') }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            onclick="return confirm('Kosongkan seluruh keranjang?')"
                        >
                            Kosongkan Keranjang
                        </button>
                    </form>
                </div>
            </section>
        @endif
    </main>
</body>
</html>
