<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Dashboard Admin - Laundry App</title>

    <link
        rel="stylesheet"
        href="{{ asset('css/services.css') }}"
    >

    <style>

        .admin-navbar {
            width: 100%;
            background: white;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.08);
            padding: 16px 40px;
            box-sizing: border-box;

            display: flex;
            align-items: center;
            justify-content: space-between;

            margin-bottom: 20px;
        }

        .admin-logo {
            font-size: 22px;
            font-weight: bold;
            color: #1677d2;
        }

        .admin-nav-menu {
            display: flex;
            align-items: center;
            gap: 22px;
        }

        .admin-nav-menu a {
            text-decoration: none;
            color: #333;
            font-weight: 500;
        }

        .admin-nav-menu a:hover {
            color: #1677d2;
        }

        .admin-user {
            font-weight: 500;
            color: #333;
        }

        .logout-button {
            border: none;
            background: #ef4444;
            color: white;

            padding: 10px 18px;

            border-radius: 8px;

            cursor: pointer;

            font-weight: bold;

            transition: 0.2s;
        }

        .logout-button:hover {
            background: #dc2626;
        }


        .admin-container {
            max-width: 1200px;
            margin: auto;
            padding: 40px 20px;
        }


        .admin-header {
            margin-bottom: 30px;
        }


        .admin-header h1 {
            margin-bottom: 8px;
        }


        .admin-header p {
            margin: 0;
            opacity: 0.7;
        }


        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 35px;
        }


        .stat-card {
            padding: 25px;
            border-radius: 15px;
            background: white;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
        }


        .stat-icon {
            font-size: 32px;
            margin-bottom: 10px;
        }


        .stat-card h3 {
            margin: 0;
            font-size: 30px;
        }


        .stat-card p {
            margin: 5px 0 0;
            opacity: 0.7;
        }


        .section-card {
            background: white;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            margin-bottom: 30px;
        }


        .section-card h2 {
            margin-top: 0;
        }


        .admin-table {
            width: 100%;
            border-collapse: collapse;
        }


        .admin-table th,
        .admin-table td {
            padding: 14px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }


        .status {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: bold;
        }


        .status-menunggu {
            background: #fff3cd;
        }


        .status-diproses {
            background: #cfe2ff;
        }


        .status-selesai {
            background: #d1e7dd;
        }


        .admin-buttons {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }


        .admin-button {
            display: inline-block;
            padding: 12px 20px;
            border-radius: 10px;
            text-decoration: none;
            background: #222;
            color: white;
        }


        .admin-button:hover {
            opacity: 0.8;
        }


        .empty-message {
            opacity: 0.6;
        }


        @media (max-width: 800px) {

            .admin-navbar {
                padding: 15px 20px;
                flex-direction: column;
                gap: 15px;
            }

            .admin-nav-menu {
                flex-wrap: wrap;
                justify-content: center;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }


            .admin-table {
                font-size: 14px;
            }


            .admin-table th,
            .admin-table td {
                padding: 10px;
            }

        }

    </style>

</head>


<body>


{{-- =========================
     NAVBAR ADMIN
     ========================= --}}

<nav class="admin-navbar">


    {{-- Logo --}}

    <div class="admin-logo">

        🧺 Laundry App

    </div>


    {{-- Menu --}}

    <div class="admin-nav-menu">


        <a href="{{ route('admin.dashboard') }}">
            Dashboard
        </a>


        <a href="{{ route('home') }}">
            Beranda
        </a>


        <a href="{{ route('services.index') }}">
            Layanan
        </a>


        <span class="admin-user">
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



<div class="admin-container">



    {{-- =========================
         HEADER
         ========================= --}}


    <div class="admin-header">


        <h1>
            👋 Dashboard Admin
        </h1>


        <p>
            Selamat datang, {{ Auth::user()->name }}.
            Kelola aplikasi laundry dari sini.
        </p>


    </div>



    {{-- =========================
         STATISTIK
         ========================= --}}


    <div class="stats-grid">



        {{-- Pelanggan --}}


        <div class="stat-card">


            <div class="stat-icon">
                👥
            </div>


            <h3>
                {{ $totalUsers }}
            </h3>


            <p>
                Total Pelanggan
            </p>


        </div>



        {{-- Layanan --}}


        <div class="stat-card">


            <div class="stat-icon">
                🧺
            </div>


            <h3>
                {{ $totalServices }}
            </h3>


            <p>
                Total Layanan
            </p>


        </div>



        {{-- Pesanan --}}


        <div class="stat-card">


            <div class="stat-icon">
                📦
            </div>


            <h3>
                {{ $totalOrders }}
            </h3>


            <p>
                Total Pesanan
            </p>


        </div>



        {{-- Menunggu --}}


        <div class="stat-card">


            <div class="stat-icon">
                ⏳
            </div>


            <h3>
                {{ $pendingOrders }}
            </h3>


            <p>
                Pesanan Menunggu
            </p>


        </div>



        {{-- Diproses --}}


        <div class="stat-card">


            <div class="stat-icon">
                🔄
            </div>


            <h3>
                {{ $processingOrders }}
            </h3>


            <p>
                Pesanan Diproses
            </p>


        </div>



        {{-- Selesai --}}


        <div class="stat-card">


            <div class="stat-icon">
                ✅
            </div>


            <h3>
                {{ $completedOrders }}
            </h3>


            <p>
                Pesanan Selesai
            </p>


        </div>



    </div>



    {{-- =========================
         PESANAN TERBARU
         ========================= --}}


    <div class="section-card">



        <h2>
            📋 Pesanan Terbaru
        </h2>



        @if ($latestOrders->count() > 0)



            <div style="overflow-x: auto;">


                <table class="admin-table">


                    <thead>


                        <tr>


                            <th>
                                ID
                            </th>


                            <th>
                                Pelanggan
                            </th>


                            <th>
                                Layanan
                            </th>


                            <th>
                                Berat
                            </th>


                            <th>
                                Total
                            </th>


                            <th>
                                Status
                            </th>


                        </tr>


                    </thead>



                    <tbody>



                        @foreach ($latestOrders as $order)


                            <tr>


                                <td>
                                    #{{ $order->id }}
                                </td>


                                <td>
                                    {{ $order->user->name }}
                                </td>


                                <td>
                                    {{ $order->service->name }}
                                </td>


                                <td>
                                    {{ $order->weight }} kg
                                </td>


                                <td>
                                    Rp {{ number_format($order->total_price, 0, ',', '.') }}
                                </td>


                                <td>


                                    <span
                                        class="status status-{{ strtolower($order->status) }}"
                                    >
                                        {{ $order->status }}
                                    </span>


                                </td>


                            </tr>


                        @endforeach



                    </tbody>


                </table>


            </div>



        @else


            <p class="empty-message">
                Belum ada pesanan laundry.
            </p>


        @endif



    </div>



    {{-- =========================
         MENU ADMIN
         ========================= --}}


    <div class="section-card">



        <h2>
            ⚙️ Kelola Laundry
        </h2>



        <div class="admin-buttons">



            <a
                href="{{ route('services.index') }}"
                class="admin-button"
            >
                🧺 Kelola Layanan
            </a>



            <a
                href="{{ route('orders.index') }}"
                class="admin-button"
            >
                📦 Lihat Pesanan
            </a>



        </div>



    </div>



</div>



</body>


</html>