<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pesanan - Toko Online</title>

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
            max-width: 1000px;
            margin: 35px auto;
            padding: 0 20px;
        }

        h1 {
            color: #7f1d1d;
        }

        .subtitle {
            color: #78716c;
            margin-bottom: 25px;
        }

        .card {
            background: white;
            padding: 24px;
            border-radius: 14px;
            margin-bottom: 18px;
            box-shadow: 0 5px 20px rgba(80, 20, 20, 0.07);
        }

        .order-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
            padding-bottom: 15px;
            border-bottom: 1px solid #eee;
        }

        .order-number {
            font-size: 18px;
            font-weight: bold;
        }

        .muted {
            color: #78716c;
            margin-top: 8px;
        }

        .status {
            display: inline-block;
            background: #fef3c7;
            color: #92400e;
            padding: 7px 12px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: bold;
        }

        .summary {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-top: 18px;
        }

        .total {
            color: #991b1b;
            font-size: 21px;
            font-weight: bold;
        }

        .button {
            display: inline-block;
            padding: 11px 16px;
            background: #7f1d1d;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
        }

        .button:hover {
            background: #991b1b;
        }

        .empty {
            text-align: center;
            padding: 45px 20px;
        }

        .empty p {
            color: #78716c;
            line-height: 1.6;
        }

        @media (max-width: 550px) {
            .summary {
                align-items: flex-start;
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <header>
        <h2>Toko Online</h2>
        <a href="{{ route('products.index') }}">Kembali Belanja</a>
    </header>

    <main>
        <h1>Riwayat Pesanan</h1>
        <p class="subtitle">
            Lihat semua pesanan yang pernah kamu buat.
        </p>

        @forelse ($orders as $order)
            <section class="card">
                <div class="order-header">
                    <div>
                        <div class="order-number">
                            Pesanan #{{ $order->id }}
                        </div>

                        <div class="muted">
                            {{ $order->created_at->format('d-m-Y H:i') }}
                        </div>
                    </div>

                    <span class="status">
                        {{ ucfirst($order->status) }}
                    </span>
                </div>

                <div class="summary">
                    <div>
                        <div class="muted">Total Pembayaran</div>

                        <div class="total">
                            Rp {{ number_format($order->total, 0, ',', '.') }}
                        </div>
                    </div>

                    <a
                        href="{{ route('orders.show', $order) }}"
                        class="button"
                    >
                        Lihat Detail
                    </a>
                </div>
            </section>
        @empty
            <section class="card empty">
                <h2>Belum Ada Pesanan</h2>
                <p>
                    Kamu belum memiliki riwayat pesanan.
                    Yuk, pilih produk favoritmu!
                </p>

                <a href="{{ route('products.index') }}" class="button">
                    Mulai Belanja
                </a>
            </section>
        @endforelse
    </main>
</body>
</html>
