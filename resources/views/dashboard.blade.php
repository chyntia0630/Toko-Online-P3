<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Toko Online</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f1f5f9;
            color: #1e293b;
        }

        header {
            background: #2563eb;
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

        .logout-button {
            background: white;
            color: #2563eb;
            border: none;
            padding: 10px 16px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
        }

        main {
            max-width: 1100px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .welcome {
            background: white;
            padding: 30px;
            border-radius: 14px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
        }

        .welcome h1 {
            color: #2563eb;
            margin-top: 0;
        }

        .info {
            margin-top: 25px;
            padding: 20px;
            background: #dbeafe;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <header>
        <h2>Toko Online</h2>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="logout-button" type="submit">
                Logout
            </button>
        </form>
    </header>

    <main>
        <section class="welcome">
            <h1>Selamat Datang di Toko Online!</h1>

            <p>
                Halo, {{ auth()->user()->name }}!
                Kamu berhasil masuk ke akunmu.
            </p>

            <div class="info">
                <h3>Dashboard Pengguna</h3>
                <p>
                    Di sini kamu nantinya bisa melihat produk,
                    memasukkan barang ke keranjang, dan melakukan
                    pemesanan.
                </p>
            </div>
        </section>
    </main>
</body>
</html>
