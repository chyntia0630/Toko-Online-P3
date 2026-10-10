
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Toko Online</title>

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

        .container {
            max-width: 850px;
            margin: 35px auto;
            padding: 0 20px;
        }

        .card {
            background: white;
            border-radius: 14px;
            padding: 25px;
            margin-bottom: 20px;
            box-shadow: 0 5px 20px rgba(80, 20, 20, 0.07);
        }

        h1 {
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

        .price,
        .total {
            color: #991b1b;
            font-weight: bold;
            white-space: nowrap;
        }

        .total {
            font-size: 24px;
        }

        .actions {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 20px;
        }

        .button {
            display: inline-block;
            padding: 12px 18px;
            border: none;
            border-radius: 8px;
            background: #7f1d1d;
            color: white;
            text-decoration: none;
            font-size: 15px;
            font-weight: bold;
            cursor: pointer;
        }

        .button:hover {
            background: #991b1b;
        }

        .secondary {
            background: #e7e5e4;
            color: #292524;
        }

        .secondary:hover {
            background: #d6d3d1;
        }

        .notice {
            background: #fef3c7;
            color: #92400e;
            padding: 14px;
            border-radius: 8px;
            line-height: 1.6;
        }

        .error {
            background: #fee2e2;
            color: #991b1b;
            padding: 14px;
            border-radius: 8px;
            margin-bottom: 15px;
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
        <a href="{{ route('cart.index') }}">Kembali ke Keranjang</a>
    </header>

    <main class="container">
        <h1>Konfirmasi Pesanan</h1>
        <p>Periksa kembali produk dan jumlah sebelum memesan.</p>

        @if ($errors->any())
            <div class="error">
                <strong>Pesanan belum dapat diproses:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <section class="card">
            <h2>Ringkasan Belanja</h2>

            @foreach ($cart as $item)
                <div class="item">
                    <div>
                        <strong>{{ $item['name'] }}</strong>
                        <div class="muted">
                            {{ $item['quantity'] }} barang ×
                            Rp {{ number_format($item['price'], 0, ',', '.') }}
                        </div>
                    </div>

                    <div class="price">
                        Rp {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}
                    </div>
                </div>
            @endforeach

            <div class="item">
                <strong>Total Pembayaran</strong>
                <span class="total">
                    Rp {{ number_format($total, 0, ',', '.') }}
                </span>
            </div>

            <div class="notice">
                Pesanan akan disimpan dengan status <strong>pending</strong>.
                Stok produk akan dikurangi setelah pesanan berhasil dibuat.
            </div>

            <div class="actions">
                <form action="{{ route('checkout.store') }}" method="POST">
                    @csrf

                    <button
                        type="submit"
                        class="button"
                        onclick="return confirm('Yakin ingin membuat pesanan ini?')"
                    >
                        Konfirmasi Pesanan
                    </button>
                </form>

                <a href="{{ route('cart.index') }}" class="button secondary">
                    Ubah Keranjang
                </a>
            </div>
        </section>
    </main>
</body>
</html>
