<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda - Toko Online</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        :root {
            --maroon: #7f1d1d;
            --maroon-dark: #5b1010;
            --cream: #faf3f2;
            --soft-pink: #f4e5e4;
            --white: #ffffff;
            --text: #292524;
            --muted: #78716c;
            --border: #eee5e3;
        }

        body {
            font-family: Arial, sans-serif;
            background: var(--cream);
            color: var(--text);
            line-height: 1.6;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        .navbar {
            background: var(--maroon-dark);
            color: var(--white);
            padding: 18px 7%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }

        .brand {
            font-size: 25px;
            font-weight: 800;
            letter-spacing: -0.5px;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 24px;
            flex-wrap: wrap;
        }

        .nav-links a {
            font-size: 14px;
            font-weight: 600;
        }

        .nav-links a:hover {
            color: #f5c9c5;
        }

        .logout-form {
            display: inline;
        }

        .logout-button {
            background: var(--white);
            color: var(--maroon);
            border: none;
            border-radius: 8px;
            padding: 10px 16px;
            font-weight: 700;
            cursor: pointer;
        }

        .container {
            width: 86%;
            max-width: 1250px;
            margin: 32px auto 60px;
        }

        .hero {
            display: grid;
            grid-template-columns: 1.25fr 0.75fr;
            align-items: center;
            gap: 24px;
            padding: 48px;
            border-radius: 22px;
            background: var(--white);
            box-shadow: 0 8px 30px rgba(91, 16, 16, 0.05);
            overflow: hidden;
        }

        .eyebrow {
            display: inline-block;
            color: var(--maroon);
            background: var(--soft-pink);
            border-radius: 30px;
            padding: 6px 13px;
            font-size: 12px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 16px;
        }

        .hero h1 {
            font-size: clamp(30px, 4vw, 46px);
            line-height: 1.2;
            letter-spacing: -1.5px;
            margin-bottom: 16px;
        }

        .hero h1 span {
            color: var(--maroon);
        }

        .hero p {
            color: var(--muted);
            max-width: 520px;
            margin-bottom: 26px;
        }

        .button {
            display: inline-block;
            background: var(--maroon);
            color: var(--white);
            padding: 12px 20px;
            border: none;
            border-radius: 9px;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
            transition: background 0.2s, transform 0.2s;
        }

        .button:hover {
            background: var(--maroon-dark);
            transform: translateY(-2px);
        }

        .hero-art {
            background: var(--soft-pink);
            min-height: 250px;
            border-radius: 18px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 24px;
        }

        .hero-icon {
            font-size: 90px;
            line-height: 1.2;
            margin-bottom: 12px;
        }

        .hero-art strong {
            color: var(--maroon);
            font-size: 20px;
        }

        .hero-art span {
            color: var(--muted);
            font-size: 13px;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px;
            margin: 26px 0 42px;
        }

        .stat-card {
            background: var(--white);
            padding: 23px;
            border-radius: 15px;
            border: 1px solid var(--border);
        }

        .stat-top {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 10px;
        }

        .stat-icon {
            width: 44px;
            height: 44px;
            display: grid;
            place-items: center;
            background: var(--soft-pink);
            border-radius: 12px;
            font-size: 21px;
        }

        .stat-label {
            color: var(--muted);
            font-size: 13px;
        }

        .stat-number {
            color: var(--maroon);
            font-size: 27px;
            font-weight: 800;
        }

        .section-heading {
            display: flex;
            justify-content: space-between;
            align-items: end;
            gap: 15px;
            margin-bottom: 20px;
        }

        .section-heading h2 {
            font-size: 25px;
            letter-spacing: -0.5px;
        }

        .section-heading p {
            color: var(--muted);
            font-size: 14px;
        }

        .text-link {
            color: var(--maroon);
            font-weight: 700;
            font-size: 14px;
            white-space: nowrap;
        }

        .categories {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 16px;
            margin-bottom: 42px;
        }

        .category-card {
            background: var(--white);
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 23px 12px;
            text-align: center;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .category-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 22px rgba(91, 16, 16, 0.07);
        }

        .category-icon {
            font-size: 32px;
            display: block;
            margin-bottom: 8px;
        }

        .category-card strong {
            font-size: 14px;
        }

        .products {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 20px;
        }

        .product-card {
            background: var(--white);
            border: 1px solid var(--border);
            border-radius: 16px;
            overflow: hidden;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .product-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 25px rgba(91, 16, 16, 0.08);
        }

        .product-image {
            height: 190px;
            background: var(--soft-pink);
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }

        .product-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .product-placeholder {
            font-size: 55px;
        }

        .product-info {
            padding: 18px;
        }

        .product-info h3 {
            font-size: 16px;
            margin-bottom: 7px;
        }

        .product-description {
            color: var(--muted);
            font-size: 13px;
            min-height: 42px;
            margin-bottom: 12px;
        }

        .product-price {
            color: var(--maroon);
            font-size: 19px;
            font-weight: 800;
            margin-bottom: 5px;
        }

        .product-stock {
            color: var(--muted);
            font-size: 12px;
            margin-bottom: 14px;
        }

        .product-info .button {
            display: block;
            text-align: center;
        }

        .empty-products {
            background: var(--white);
            border-radius: 15px;
            padding: 30px;
            color: var(--muted);
            text-align: center;
            grid-column: 1 / -1;
        }

        .footer {
            text-align: center;
            padding: 25px;
            color: var(--muted);
            font-size: 13px;
            border-top: 1px solid var(--border);
        }

        @media (max-width: 950px) {
            .container {
                width: 92%;
            }

            .hero {
                padding: 30px;
            }

            .products {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .categories {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 600px) {
            .navbar {
                padding: 16px 5%;
                align-items: flex-start;
                flex-direction: column;
            }

            .nav-links {
                gap: 15px;
            }

            .container {
                margin-top: 20px;
            }

            .hero {
                grid-template-columns: 1fr;
                padding: 24px;
            }

            .hero-art {
                min-height: 180px;
            }

            .hero-icon {
                font-size: 60px;
            }

            .stats {
                grid-template-columns: 1fr;
                gap: 12px;
            }

            .section-heading h2 {
                font-size: 21px;
            }

            .products {
                gap: 12px;
            }

            .product-image {
                height: 140px;
            }

            .product-info {
                padding: 12px;
            }

            .product-info h3 {
                font-size: 14px;
            }

            .product-description {
                font-size: 12px;
            }

            .product-price {
                font-size: 16px;
            }
        }
    </style>
</head>
<body>

    <header class="navbar">
        <a href="{{ route('dashboard') }}" class="brand">Toko Online.</a>

        <nav class="nav-links">
            <a href="{{ route('dashboard') }}">Beranda</a>
            <a href="{{ route('products.index') }}">Katalog</a>
            <a href="{{ route('cart.index') }}">
                Keranjang ({{ $cartCount }})
            </a>
            <a href="{{ route('orders.index') }}">Pesanan</a>

            <form action="{{ route('logout') }}" method="POST"
                  class="logout-form">
                @csrf
                <button type="submit" class="logout-button">
                    Logout
                </button>
            </form>
        </nav>
    </header>

    <main class="container">

        <section class="hero">
            <div>
                <span class="eyebrow">Selamat datang di toko kami</span>

                <h1>
                    Halo, {{ auth()->user()->name }}!<br>
                    Temukan gaya <span>favoritmu.</span>
                </h1>

                <p>
                    Pilih produk yang sesuai dengan kebutuhanmu.
                    Temukan koleksi pilihan dan nikmati pengalaman
                    belanja yang praktis dalam satu tempat.
                </p>

                <a href="{{ route('products.index') }}" class="button">
                    Mulai Belanja &rarr;
                </a>
            </div>

            <div class="hero-art">
                <div class="hero-icon">🛍️</div>
                <strong>Simple. Stylish. Yours.</strong>
                <span>Temukan pilihan terbaik untukmu.</span>
            </div>
        </section>

        <section class="stats">
            <div class="stat-card">
                <div class="stat-top">
                    <div class="stat-icon">📦</div>
                    <div>
                        <div class="stat-label">Produk tersedia</div>
                        <div class="stat-number">{{ $productCount }}</div>
                    </div>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-top">
                    <div class="stat-icon">🛒</div>
                    <div>
                        <div class="stat-label">Total barang di keranjang</div>
                        <div class="stat-number">{{ $cartCount }}</div>
                    </div>
                </div>
                <a href="{{ route('cart.index') }}" class="text-link">
                    Buka keranjang &rarr;
                </a>
            </div>

            <div class="stat-card">
                <div class="stat-top">
                    <div class="stat-icon">🧾</div>
                    <div>
                        <div class="stat-label">Pesanan saya</div>
                        <div class="stat-number">{{ $orderCount }}</div>
                    </div>
                </div>
                <a href="{{ route('orders.index') }}" class="text-link">
                    Lihat pesanan &rarr;
                </a>
            </div>
        </section>

        <section>
            <div class="section-heading">
                <div>
                    <h2>Jelajahi Kategori</h2>
                    <p>Pilih kategori untuk mulai menemukan produk.</p>
                </div>
            </div>

            <div class="categories">
                <a href="{{ route('products.index') }}" class="category-card">
                    <span class="category-icon">👕</span>
                    <strong>Pakaian</strong>
                </a>

                <a href="{{ route('products.index') }}" class="category-card">
                    <span class="category-icon">👖</span>
                    <strong>Celana</strong>
                </a>

                <a href="{{ route('products.index') }}" class="category-card">
                    <span class="category-icon">👟</span>
                    <strong>Sepatu</strong>
                </a>

                <a href="{{ route('products.index') }}" class="category-card">
                    <span class="category-icon">🎒</span>
                    <strong>Aksesori</strong>
                </a>
            </div>
        </section>

        <section>
            <div class="section-heading">
                <div>
                    <h2>Produk Pilihan</h2>
                    <p>Beberapa produk yang tersedia di toko kami.</p>
                </div>

                <a href="{{ route('products.index') }}" class="text-link">
                    Lihat semua &rarr;
                </a>
            </div>

            <div class="products">
                @forelse ($products as $product)
                    <article class="product-card">
                        <div class="product-image">
                            @if ($product->image)
                                <img
                                    src="{{ asset('storage/' . $product->image) }}"
                                    alt="{{ $product->name }}"
                                >
                            @else
                                <span class="product-placeholder">🛍️</span>
                            @endif
                        </div>

                        <div class="product-info">
                            <h3>{{ $product->name }}</h3>

                            <p class="product-description">
                                {{ \Illuminate\Support\Str::limit(
                                    $product->description ?? 'Produk pilihan untukmu.',
                                    65
                                ) }}
                            </p>

                            <div class="product-price">
                                Rp {{ number_format($product->price, 0, ',', '.') }}
                            </div>

                            <div class="product-stock">
                                Stok tersedia: {{ $product->stock }}
                            </div>

                            <a
                                href="{{ route('products.show', $product) }}"
                                class="button"
                            >
                                Lihat Produk
                            </a>
                        </div>
                    </article>
                @empty
                    <div class="empty-products">
                        <p>Belum ada produk yang tersedia saat ini.</p>
                        <a href="{{ route('products.index') }}" class="text-link">
                            Buka katalog produk
                        </a>
                    </div>
                @endforelse
            </div>
        </section>

    </main>

    <footer class="footer">
        &copy; {{ date('Y') }} Toko Online. Belanja mudah, pilihan tepat.
    </footer>

</body>
</html>
