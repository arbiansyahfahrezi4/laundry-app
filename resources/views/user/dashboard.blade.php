<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard User - Laundry App</title>

    <link rel="stylesheet" href="{{ asset('css/services.css') }}">

    <style>

        .dashboard-container {
            max-width: 1200px;
            margin: auto;
            padding: 40px 25px;
        }

        /* WELCOME */

        .welcome-box {
            position: relative;
            overflow: hidden;

            padding: 40px;
            margin-bottom: 30px;

            border-radius: 22px;

            background: linear-gradient(
                120deg,
                #42a5f5,
                #7e57c2,
                #ec407a,
                #26c6da,
                #42a5f5
            );

            background-size: 400% 400%;

            animation: gradientMove 10s ease infinite;

            color: white;

            box-shadow:
                0 12px 30px rgba(0, 0, 0, 0.12);
        }

        @keyframes gradientMove {

            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }

        }

        .welcome-box::before,
        .welcome-box::after {

            content: "";

            position: absolute;

            width: 220px;
            height: 220px;

            border-radius: 50%;

            background: rgba(255, 255, 255, 0.12);

            filter: blur(5px);

            animation: floatingCircle 7s ease-in-out infinite;

        }

        .welcome-box::before {

            top: -100px;
            right: -50px;

        }

        .welcome-box::after {

            bottom: -120px;
            left: -50px;

            animation-delay: 2s;

        }

        @keyframes floatingCircle {

            0% {
                transform: translate(0, 0);
            }

            50% {
                transform: translate(30px, 20px);
            }

            100% {
                transform: translate(0, 0);
            }

        }

        .welcome-content {

            position: relative;

            z-index: 2;

        }

        .welcome-label {

            display: inline-block;

            padding: 7px 13px;

            border-radius: 20px;

            background: rgba(255, 255, 255, 0.18);

            font-size: 12px;

            font-weight: bold;

            letter-spacing: 1px;

        }

        .welcome-box h1 {

            margin: 15px 0 10px;

            font-size: 34px;

            color: white;

        }

        .welcome-box p {

            max-width: 650px;

            margin: 0;

            color: rgba(255, 255, 255, 0.92);

            line-height: 1.7;

        }


        /* STATISTICS */

        .dashboard-grid {

            display: grid;

            grid-template-columns: repeat(4, 1fr);

            gap: 20px;

            margin-bottom: 40px;

        }

        .stat-card {

            background: white;

            padding: 25px;

            border-radius: 16px;

            box-shadow:
                0 5px 20px rgba(0, 0, 0, 0.06);

            transition: 0.25s;

        }

        .stat-card:hover {

            transform: translateY(-5px);

            box-shadow:
                0 10px 25px rgba(0, 0, 0, 0.1);

        }

        .stat-icon {

            font-size: 32px;

            margin-bottom: 12px;

        }

        .stat-card h3 {

            margin: 0 0 8px;

            color: #455a64;

            font-size: 15px;

        }

        .stat-number {

            font-size: 24px;

            font-weight: bold;

            color: #1976d2;

        }


        /* SECTION */

        .dashboard-section {

            margin-bottom: 40px;

        }

        .dashboard-section h2 {

            margin-bottom: 8px;

            color: #263238;

        }

        .dashboard-description {

            margin-bottom: 22px;

            color: #78909c;

        }


        /* MENU CARD */

        .dashboard-cards {

            display: grid;

            grid-template-columns: repeat(3, 1fr);

            gap: 20px;

        }

        .dashboard-card {

            display: block;

            padding: 28px;

            border-radius: 16px;

            background: white;

            text-decoration: none;

            color: inherit;

            box-shadow:
                0 5px 20px rgba(0, 0, 0, 0.06);

            transition: 0.25s;

        }

        .dashboard-card:hover {

            transform: translateY(-5px);

            box-shadow:
                0 10px 25px rgba(0, 0, 0, 0.1);

        }

        .dashboard-card-icon {

            font-size: 40px;

            margin-bottom: 15px;

        }

        .dashboard-card h3 {

            margin-bottom: 8px;

            color: #263238;

        }

        .dashboard-card p {

            margin: 0;

            color: #78909c;

            line-height: 1.6;

        }


        /* STATUS */

        .status-box {

            padding: 10px 25px;

            background: white;

            border-radius: 16px;

            box-shadow:
                0 5px 20px rgba(0, 0, 0, 0.06);

        }

        .status-item {

            display: flex;

            align-items: center;

            gap: 18px;

            padding: 20px 0;

            border-bottom: 1px solid #eceff1;

        }

        .status-item:last-child {

            border-bottom: none;

        }

        .status-icon {

            width: 48px;

            height: 48px;

            display: flex;

            align-items: center;

            justify-content: center;

            border-radius: 12px;

            background: #e3f2fd;

            font-size: 24px;

            flex-shrink: 0;

        }

        .status-item h4 {

            margin: 0 0 5px;

            color: #37474f;

        }

        .status-item p {

            margin: 0;

            color: #90a4ae;

            font-size: 14px;

        }


        /* INFO */

        .info-box {

            padding: 25px;

            border-radius: 16px;

            background: #e3f2fd;

            border-left: 5px solid #1976d2;

        }

        .info-box h3 {

            margin-bottom: 8px;

            color: #1565c0;

        }

        .info-box p {

            margin: 0;

            color: #546e7a;

            line-height: 1.7;

        }


        /* LOGOUT */

        .btn-logout {

            border: none;

            background: #ef5350;

            color: white;

            padding: 9px 16px;

            border-radius: 7px;

            cursor: pointer;

            font-weight: bold;

            transition: 0.2s;

        }

        .btn-logout:hover {

            background: #d32f2f;

            transform: translateY(-1px);

        }


        /* RESPONSIVE */

        @media (max-width: 900px) {

            .dashboard-grid {

                grid-template-columns: repeat(2, 1fr);

            }

            .dashboard-cards {

                grid-template-columns: 1fr;

            }

        }

        @media (max-width: 600px) {

            .dashboard-container {

                padding: 25px 15px;

            }

            .welcome-box {

                padding: 28px;

            }

            .welcome-box h1 {

                font-size: 27px;

            }

            .dashboard-grid {

                grid-template-columns: 1fr;

            }

        }

    </style>

</head>


<body>

<div class="home-container">


    {{-- NAVBAR --}}

    <nav class="navbar">

        <div class="logo">
            🧺 Laundry App
        </div>


        <div class="nav-menu">

            <a href="{{ url('/') }}">
                Beranda
            </a>


            <a href="{{ route('services.index') }}">
                Layanan
            </a>


            <span>
                Halo, {{ Auth::user()->name }}
            </span>


            <form
                action="{{ route('logout') }}"
                method="POST"
            >

                @csrf

                <button
                    type="submit"
                    class="btn-logout"
                >
                    Logout
                </button>

            </form>

        </div>

    </nav>



    {{-- MAIN --}}

    <main class="dashboard-container">


        {{-- WELCOME --}}

        <section class="welcome-box">

            <div class="welcome-content">

                <span class="welcome-label">
                    DASHBOARD USER
                </span>


                <h1>
                    Selamat Datang,
                    {{ Auth::user()->name }}! 👋
                </h1>


                <p>
                    Selamat datang di Laundry App.
                    Kelola kebutuhan laundry kamu dengan
                    mudah, cepat, dan praktis dari satu tempat.
                </p>

            </div>

        </section>



        {{-- STATISTICS --}}

        <section class="dashboard-grid">


            {{-- PESANAN AKTIF --}}

            <div class="stat-card">

                <div class="stat-icon">
                    📦
                </div>


                <h3>
                    Pesanan Aktif
                </h3>


                <div class="stat-number">
                    {{ $activeOrders }}
                </div>

            </div>



            {{-- TOTAL LAUNDRY --}}

            <div class="stat-card">

                <div class="stat-icon">
                    🧺
                </div>


                <h3>
                    Total Laundry
                </h3>


                <div class="stat-number">
                    {{ number_format($totalWeight, 1, ',', '.') }} kg
                </div>

            </div>



            {{-- TOTAL TRANSAKSI --}}

            <div class="stat-card">

                <div class="stat-icon">
                    💰
                </div>


                <h3>
                    Total Transaksi
                </h3>


                <div class="stat-number">
                    Rp {{ number_format($totalTransaction, 0, ',', '.') }}
                </div>

            </div>



            {{-- STATUS MEMBER --}}

            <div class="stat-card">

                <div class="stat-icon">
                    ⭐
                </div>


                <h3>
                    Status Member
                </h3>


                <div class="stat-number">
                    Aktif
                </div>

            </div>

        </section>



        {{-- MENU LAUNDRY --}}

        <section class="dashboard-section">

            <h2>
                🧺 Menu Laundry
            </h2>


            <p class="dashboard-description">
                Pilih layanan yang ingin kamu gunakan.
            </p>


            <div class="dashboard-cards">


                {{-- LIHAT LAYANAN --}}

                <a
                    href="{{ route('services.index') }}"
                    class="dashboard-card"
                >

                    <div class="dashboard-card-icon">
                        🧺
                    </div>


                    <h3>
                        Lihat Layanan
                    </h3>


                    <p>
                        Lihat berbagai layanan laundry
                        beserta harga yang tersedia.
                    </p>

                </a>



                {{-- PESAN LAUNDRY --}}

                <a
                    href="{{ route('orders.create') }}"
                    class="dashboard-card"
                >

                    <div class="dashboard-card-icon">
                        📦
                    </div>


                    <h3>
                        Pesan Laundry
                    </h3>


                    <p>
                        Pesan layanan laundry
                        sesuai kebutuhan kamu.
                    </p>

                </a>



                {{-- RIWAYAT PESANAN --}}

                <a
                    href="{{ route('orders.index') }}"
                    class="dashboard-card"
                >

                    <div class="dashboard-card-icon">
                        📋
                    </div>


                    <h3>
                        Riwayat Pesanan
                    </h3>


                    <p>
                        Lihat semua riwayat pesanan
                        laundry kamu.
                    </p>

                </a>


            </div>

        </section>



        {{-- STATUS LAUNDRY --}}

        <section class="dashboard-section">

            <h2>
                📦 Status Laundry
            </h2>


            <p class="dashboard-description">
                Pantau proses laundry kamu.
            </p>


            <div class="status-box">


                @if ($orders->count() > 0)


                    @foreach ($orders->take(5) as $order)


                        <div class="status-item">

                            <div class="status-icon">

                                @if ($order->status === 'Menunggu')

                                    📦

                                @elseif ($order->status === 'Diproses')

                                    🧼

                                @elseif ($order->status === 'Selesai')

                                    ✅

                                @else

                                    📋

                                @endif

                            </div>


                            <div>

                                <h4>
                                    {{ $order->service->name }}
                                </h4>


                                <p>

                                    {{ $order->weight }} kg

                                    • Rp
                                    {{ number_format($order->total_price, 0, ',', '.') }}

                                    • Status:

                                    <strong>
                                        {{ $order->status }}
                                    </strong>

                                </p>

                            </div>

                        </div>


                    @endforeach


                @else


                    <div class="status-item">

                        <div class="status-icon">
                            📦
                        </div>


                        <div>

                            <h4>
                                Belum Ada Pesanan
                            </h4>


                            <p>
                                Kamu belum memiliki pesanan laundry.
                            </p>

                        </div>

                    </div>


                @endif


            </div>

        </section>



        {{-- INFORMATION --}}

        <section class="info-box">

            <h3>
                💡 Informasi Laundry
            </h3>


            <p>
                Saat ini kamu sudah dapat melihat layanan
                laundry dan melakukan pemesanan.
                Fitur pembayaran dan pelacakan laundry
                akan kita bangun pada tahap berikutnya.
            </p>

        </section>


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