<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Detail Pesanan - Laundry App</title>

    <link
        rel="stylesheet"
        href="{{ asset('css/services.css') }}"
    >

    <style>

        .detail-container {
            max-width: 900px;
            margin: auto;
            padding: 40px 25px;
        }

        .navbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 18px 40px;
            background: white;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.08);
        }

        .nav-menu {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .nav-menu a {
            text-decoration: none;
            color: #333;
            font-weight: 500;
        }

        .nav-menu a:hover {
            color: #1976d2;
        }

        .logout-button {
            border: none;
            background: #ef4444;
            color: white;
            padding: 9px 16px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
        }

        .logout-button:hover {
            background: #dc2626;
        }

        .btn-back {
            display: inline-block;
            margin-bottom: 25px;
            color: #1976d2;
            text-decoration: none;
            font-weight: 600;
        }

        .detail-card {
            background: white;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.07);
        }

        .detail-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            padding-bottom: 25px;
            margin-bottom: 25px;
            border-bottom: 1px solid #eceff1;
        }

        .detail-header h1 {
            margin: 0 0 8px;
            color: #263238;
        }

        .order-id {
            margin: 0;
            color: #90a4ae;
        }

        .status {
            display: inline-block;
            padding: 8px 16px;
            border-radius: 20px;
            background: #fff3cd;
            color: #856404;
            font-weight: bold;
            font-size: 14px;
        }

        .detail-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 18px;
        }

        .detail-item {
            padding: 20px;
            background: #f8fafc;
            border-radius: 14px;
        }

        .detail-item.full {
            grid-column: 1 / -1;
        }

        .detail-label {
            display: block;
            margin-bottom: 8px;
            color: #90a4ae;
            font-size: 13px;
        }

        .detail-value {
            color: #37474f;
            font-size: 17px;
            font-weight: 600;
        }

        .total-box {
            margin-top: 25px;
            padding: 22px;
            border-radius: 15px;
            background: #e3f2fd;

            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .total-label {
            color: #455a64;
            font-weight: 600;
        }

        .total-price {
            color: #1565c0;
            font-size: 24px;
            font-weight: bold;
        }

        .action-buttons {
            display: flex;
            gap: 12px;
            margin-top: 25px;
        }

        .btn {
            display: inline-block;
            padding: 11px 18px;
            border-radius: 9px;
            text-decoration: none;
            font-weight: 600;
        }

        .btn-primary {
            background: #1976d2;
            color: white;
        }

        .btn-secondary {
            background: #eceff1;
            color: #455a64;
        }

        .btn-edit {
            background: #f59e0b;
            color: white;
        }

        .btn-edit:hover {
            background: #d97706;
        }

        .btn-primary:hover {
            background: #1565c0;
        }

        .btn-secondary:hover {
            background: #cfd8dc;
        }

        @media (max-width: 650px) {

            .navbar {
                flex-direction: column;
                gap: 15px;
                padding: 18px 20px;
            }

            .nav-menu {
                flex-wrap: wrap;
                justify-content: center;
            }

            .detail-header {
                align-items: flex-start;
                flex-direction: column;
            }

            .detail-grid {
                grid-template-columns: 1fr;
            }

            .detail-item.full {
                grid-column: auto;
            }

            .total-box {
                flex-direction: column;
                align-items: flex-start;
                gap: 8px;
            }

            .action-buttons {
                flex-direction: column;
            }

        }

    </style>

</head>


<body>

<div class="home-container">


    {{-- =========================
         NAVBAR
         ========================= --}}

    <nav class="navbar">

        <div class="logo">
            🧺 Laundry App
        </div>

        <div class="nav-menu">

            {{-- Dashboard sesuai role --}}

            @if (Auth::user()->role === 'admin')

                <a href="{{ route('admin.dashboard') }}">
                    Dashboard Admin
                </a>

            @else

                <a href="{{ route('user.dashboard') }}">
                    Dashboard
                </a>

            @endif


            {{-- Layanan --}}

            <a href="{{ route('services.index') }}">
                Layanan
            </a>


            {{-- Riwayat --}}

            <a href="{{ route('orders.index') }}">
                Riwayat Pesanan
            </a>


            {{-- Nama --}}

            <span>
                Halo, {{ Auth::user()->name }}
            </span>


            {{-- Logout --}}

            <form
                action="{{ route('logout') }}"
                method="POST"
                style="margin: 0;"
            >

                @csrf

                <button
                    type="submit"
                    class="logout-button"
                >
                    Logout
                </button>

            </form>

        </div>

    </nav>



    {{-- =========================
         DETAIL PESANAN
         ========================= --}}

    <main class="detail-container">


        {{-- Kembali ke riwayat --}}

        <a
            href="{{ route('orders.index') }}"
            class="btn-back"
        >
            ← Kembali ke Riwayat Pesanan
        </a>


        <div class="detail-card">


            {{-- HEADER --}}

            <div class="detail-header">

                <div>

                    <h1>
                        📦 Detail Pesanan
                    </h1>

                    <p class="order-id">
                        Pesanan #{{ $order->id }}
                    </p>

                </div>


                <span class="status">
                    {{ $order->status }}
                </span>

            </div>



            {{-- INFORMASI PESANAN --}}

            <div class="detail-grid">


                {{-- KHUSUS ADMIN: PELANGGAN --}}

                @if (Auth::user()->role === 'admin')

                    <div class="detail-item">

                        <span class="detail-label">
                            Pelanggan
                        </span>

                        <div class="detail-value">
                            {{ $order->user->name }}
                        </div>

                    </div>

                @endif


                {{-- LAYANAN --}}

                <div class="detail-item">

                    <span class="detail-label">
                        Layanan
                    </span>

                    <div class="detail-value">
                        {{ $order->service->name }}
                    </div>

                </div>


                {{-- HARGA PER KG --}}

                <div class="detail-item">

                    <span class="detail-label">
                        Harga Layanan
                    </span>

                    <div class="detail-value">
                        Rp {{ number_format($order->service->price, 0, ',', '.') }} / kg
                    </div>

                </div>


                {{-- BERAT --}}

                <div class="detail-item">

                    <span class="detail-label">
                        Berat Laundry
                    </span>

                    <div class="detail-value">
                        {{ $order->weight }} kg
                    </div>

                </div>


                {{-- TANGGAL --}}

                <div class="detail-item">

                    <span class="detail-label">
                        Tanggal Pesanan
                    </span>

                    <div class="detail-value">
                        {{ $order->created_at->format('d/m/Y H:i') }}
                    </div>

                </div>


                {{-- CATATAN --}}

                <div class="detail-item full">

                    <span class="detail-label">
                        Catatan
                    </span>

                    <div class="detail-value">

                        @if ($order->notes)

                            {{ $order->notes }}

                        @else

                            Tidak ada catatan.

                        @endif

                    </div>

                </div>

            </div>



            {{-- TOTAL --}}

            <div class="total-box">

                <span class="total-label">
                    Total Pembayaran
                </span>

                <span class="total-price">
                    Rp {{ number_format($order->total_price, 0, ',', '.') }}
                </span>

            </div>



            {{-- TOMBOL --}}

            <div class="action-buttons">


                {{-- Kembali ke riwayat --}}

                <a
                    href="{{ route('orders.index') }}"
                    class="btn btn-secondary"
                >
                    ← Riwayat Pesanan
                </a>


                {{-- Edit khusus admin --}}

                @if (Auth::user()->role === 'admin')

                    <a
                        href="{{ route('orders.edit', $order->id) }}"
                        class="btn btn-edit"
                    >
                        ✏️ Edit Pesanan
                    </a>

                @else

                    {{-- Pesan lagi untuk user --}}

                    <a
                        href="{{ route('orders.create') }}"
                        class="btn btn-primary"
                    >
                        + Pesan Lagi
                    </a>

                @endif


            </div>


        </div>

    </main>



    {{-- FOOTER --}}

    <footer>

        <p>
            © {{ date('Y') }} Laundry App
        </p>

    </footer>


</div>

</body>

</html>