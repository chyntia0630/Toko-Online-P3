<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name }} - Toko Online</title>

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
            max-width: 1000px;
            margin: 45px auto;
            padding: 0 20px;
        }

        .detail-card {
            display: grid;
            grid-template-columns: 1fr;
            background: white;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(80, 20, 20, 0.08);
        }

        .product-image {
            min-height: 300px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f5e7e7;
            color: #7f1d1d;
            font-size: 90px;
        }

        .product-image img {
            width: 100%;
            height: 100%;
            min-height: 300px;
            object-fit: cover;
        }

        .product-info {
            padding: 30px;
        }

        .product-info h1 {
            color: #7f1d1d;
            margin-top: 0;
        }

        .description {
            color: #78716c;
            line-height: 1.8;
        }

        .price {
            font-size: 28px;
            font-weight: bold;
            color: #991b1b;
        }

        .stock {
            margin-bottom: 25px;
        }

        .button {
            display: inline-block;
            padding: 12px 20px;
            border-radius: 8px;
            background: #7f1d1d;
            color: white;
            text-decoration: none;
            font-weight: bold;
        }

        .button:hover {
            background: #991b1b;
        }

        @media (min-width: 700px) {
            .detail-card {
                grid-template-columns: 1fr 1fr;
            }
        }
        
        .actions {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 12px;
        }

        .actions form {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 8px;
        }

        .actions label {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <header>
        <h2>Toko Online</h2>
        <a href="{{ route('products.index') }}">Kembali ke Katalog</a>
    </header>

    <main class="container">
        <article class="detail-card">
            <div class="product-image">
                @if ($product->image)
                    <img
                        src="{{ asset('storage/' . $product->image) }}"
                        alt="{{ $product->name }}"
                    >
                @else
                    🛍️
                @endif
            </div>

            <div class="product-info">
                <h1>{{ $product->name }}</h1>

                <p class="description">
                    {{ $product->description ?? 'Belum ada deskripsi produk.' }}
                </p>

                <p class="price">
                    Rp {{ number_format($product->price, 0, ',', '.') }}
                </p>

                <p class="stock">
                    Stok tersedia: <strong>{{ $product->stock }}</strong>
                </p>
                
                <div class="actions">
                    <a
                        href="{{ route('products.index') }}"
                        class="button"
                    >
                        Kembali ke Katalog
                    </a>
                    
                    @if ($product->stock > 0) 
                        <form
                            action="{{ route('cart.add', $product) }}"
                            method="POST"
                        >
                        @csrf

                        <label for="quantity">Jumlah:</label>

                        <input
                            type="number"
                            name="quantity"
                            id="quantity"
                            value="1"
                            min="1"
                            max="{{ $product->stock }}"
                            required
                            style="width: 75px; padding: 10px; margin: 8px;"
                        >
                        
                            <button type="submit" class="button">
                                Tambah ke Keranjang
                            </button>
                         </form>
                    @else
                        <p>Stok produk sedang habis.</p>
                    @endif
                </div>
            </div>
        </article>
    </main>
</body>
</html>
