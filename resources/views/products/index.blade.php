<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Produk - Toko Online</title>

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
            gap: 16px;
            flex-wrap: wrap;
        }

        header h2 {
            margin: 0;
        }

        nav {
            display: flex;
            gap: 18px;
            align-items: center;
        }

        nav a {
            color: white;
            text-decoration: none;
            font-weight: bold;
        }

        nav a:hover {
            color: #fecaca;
        }

        .container {
            max-width: 1200px;
            margin: 35px auto;
            padding: 0 20px;
        }

        .intro {
            margin-bottom: 28px;
        }

        .intro h1 {
            color: #7f1d1d;
            margin-bottom: 8px;
        }

        .intro p {
            color: #78716c;
            line-height: 1.6;
        }

        .product-grid {
            display: grid;
            grid-template-columns: repeat(1, minmax(0, 1fr));
            gap: 22px;
        }

        .product-card {
            background: white;
            border-radius: 14px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(80, 20, 20, 0.07);
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(80, 20, 20, 0.12);
        }

        .product-image {
            height: 190px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f5e7e7;
            color: #7f1d1d;
            font-size: 48px;
        }

        .product-info {
            padding: 18px;
        }

        .product-info h3 {
            margin: 0 0 10px;
            font-size: 18px;
        }

        .description {
            color: #78716c;
            font-size: 14px;
            line-height: 1.5;
            min-height: 42px;
        }

        .price {
            color: #991b1b;
            font-size: 20px;
            font-weight: bold;
            margin: 16px 0 8px;
        }

        .stock {
            color: #57534e;
            font-size: 13px;
            margin-bottom: 16px;
        }

        .detail-button {
            display: block;
            text-align: center;
            background: #7f1d1d;
            color: white;
            text-decoration: none;
            padding: 11px;
            border-radius: 8px;
            font-weight: bold;
        }

        .detail-button:hover {
            background: #991b1b;
        }

        .empty {
            background: white;
            padding: 30px;
            border-radius: 12px;
            text-align: center;
            color: #78716c;
        }

        @media (min-width: 600px) {
            .product-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (min-width: 900px) {
            .product-grid {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }
        }

        @media (min-width: 1150px) {
            .product-grid {
                grid-template-columns: repeat(4, minmax(0, 1fr));
            }
        }
    </style>
</head>
<body>
    <header>
        <h2>Toko Online</h2>

        <nav>
            <a href="{{ route('dashboard') }}">Dashboard</a>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" style="padding: 9px 14px; border: none; border-radius: 7px; cursor: pointer;">
                    Logout
                </button>
            </form>
        </nav>
    </header>

    <main class="container">
        <section class="intro">
            <h1>Katalog Produk</h1>
            <p>Temukan produk pilihan yang sesuai dengan kebutuhanmu.</p>
        </section>

        @if ($products->isEmpty())
            <div class="empty">
                Belum ada produk yang tersedia.
            </div>
        @else
            <div class="product-grid">
                @foreach ($products as $product)
                    <article class="product-card">
                        <div class="product-image">
                            @if ($product->image)
                                <img
                                    src="{{ asset('storage/' . $product->image) }}"
                                    alt="{{ $product->name }}"
                                    style="width: 100%; height: 100%; object-fit: cover;"
                                >
                            @else
                                🛍️
                            @endif
                        </div>

                        <div class="product-info">
                            <h3>{{ $product->name }}</h3>

                            <p class="description">
                                {{ $product->description ?? 'Produk pilihan untukmu.' }}
                            </p>

                            <p class="price">
                                Rp {{ number_format($product->price, 0, ',', '.') }}
                            </p>

                            <p class="stock">
                                Stok tersedia: {{ $product->stock }}
                            </p>

                            <a 
                            href="{{ route('products.show', $product->id) }}" 
                            class="detail-button"
                            >
                                Lihat Produk
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>
        @endif
    </main>
</body>
</html>
