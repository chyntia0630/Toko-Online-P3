<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pesanan - Toko Online</title>

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
        }

        header h2 {
            margin: 0;
        }

        header a {
            color: white;
            text-decoration: none;
            font-weight: bold;
        }

        main {
            max-width: 850px;
            margin: 35px auto;
            padding: 0 20px;
        }

        .card {
            background: white;
            padding: 25px;
            margin-bottom: 20px;
            border-radius: 14px;
            box-shadow: 0 5px 20px rgba(80, 20, 20, 0.07);
        }

        h1, .price {
            color: #7f1d1d;
        }

        .item {
            display: flex;
            justify-content: space-between;
            gap: 15px;
            padding: 15px 0;
            border-bottom: 1px solid #eee;
        }

        .muted {
            color: #78716c;
            margin-top: 7px;
        }

        .price {
            font-weight: bold;
            white-space: nowrap;
        }

        .status {
            display: inline-block;
            padding: 7px 12px;
            border-radius: 20px;
            background: #fef3c7;
            color: #92400e;
            font-weight: bold;
        }

        .button {
            display: inline-block;
            padding: 12px 18px;
            border-radius: 8px;
            background: #7f1d1d;
            color: white;
            text-decoration: none;
            font-weight: bold;
        }

        @media (max-width: 500px) {
            .item {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <header>
        <h2>Toko Online</h2>
        <a href="{{ route('products.index') }}">Katalog Produk</a>
    </header>

    <main>
        <h1>Detail Pesanan</h1>

        <section class="card">
            <p>Nomor Pesanan: <strong>#{{ $order->id }}</strong></p>

            <p>
                Status:
                <span class="status">
                    {{ ucfirst($order->status) }}
                </span>
            </p>

            <p class="muted">
                Tanggal:
                {{ $order->created_at->format('d-m-Y H:i') }}
            </p>
        </section>

        <section class="card">
            <h2>Produk yang Dipesan</h2>

            @foreach ($order->items as $item)
                <div class="item">
                    <div>
                        <strong>
                            {{ $item->product->name ?? 'Produk tidak tersedia' }}
                        </strong>

                        <div class="muted">
                            {{ $item->quantity }} barang ×
                            Rp {{ number_format($item->price, 0, ',', '.') }}
                        </div>
                    </div>

                    <div class="price">
                        Rp {{ number_format($item->quantity * $item->price, 0, ',', '.') }}
                    </div>
                </div>
            @endforeach

            <div class="item">
                <strong>Total Pembayaran</strong>

                <strong class="price">
                    Rp {{ number_format($order->total, 0, ',', '.') }}
                </strong>
            </div>
        </section>

        <a href="{{ route('products.index') }}" class="button">
            Kembali Belanja
        </a>
    </main>
</body>
</html>
