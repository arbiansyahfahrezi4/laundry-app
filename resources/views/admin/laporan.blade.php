<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Laporan Transaksi - Laundry App</title>

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
        }

        .logout-button:hover {
            background: #dc2626;
        }


        .report-container {
            max-width: 1200px;
            margin: auto;
            padding: 40px 20px;
        }


        .report-header {
            margin-bottom: 30px;
        }

        .report-header h1 {
            margin-bottom: 8px;
        }

        .report-header p {
            margin: 0;
            opacity: 0.7;
        }


        /* =========================
           STATISTIK
           ========================= */

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 18px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: white;
            padding: 22px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.07);
        }

        .stat-icon {
            font-size: 28px;
            margin-bottom: 8px;
        }

        .stat-card h3 {
            margin: 0;
            font-size: 25px;
        }

        .stat-card p {
            margin: 6px 0 0;
            opacity: 0.7;
            font-size: 14px;
        }


        /* =========================
           FILTER
           ========================= */

        .filter-card {
            background: white;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.07);
            margin-bottom: 30px;
        }

        .filter-card h2 {
            margin-top: 0;
            margin-bottom: 20px;
        }

        .filter-form {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr auto auto;
            gap: 15px;
            align-items: end;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-label {
            margin-bottom: 7px;
            font-weight: 600;
            color: #455a64;
            font-size: 14px;
        }

        .form-control {
            width: 100%;
            box-sizing: border-box;
            padding: 11px 12px;
            border: 1px solid #d0d7de;
            border-radius: 8px;
            font-size: 14px;
            background: white;
        }

        .form-control:focus {
            outline: none;
            border-color: #1976d2;
        }

        .btn {
            display: inline-block;
            padding: 11px 18px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            border: none;
            cursor: pointer;
            font-size: 14px;
            text-align: center;
        }

        .btn-primary {
            background: #1976d2;
            color: white;
        }

        .btn-primary:hover {
            background: #1565c0;
        }

        .btn-secondary {
            background: #eceff1;
            color: #455a64;
        }

        .btn-secondary:hover {
            background: #cfd8dc;
        }


        /* =========================
           TABLE
           ========================= */

        .table-card {
            background: white;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.07);
        }

        .table-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            gap: 15px;
        }

        .table-header h2 {
            margin: 0;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        .report-table {
            width: 100%;
            border-collapse: collapse;
        }

        .report-table th,
        .report-table td {
            padding: 13px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }

        .report-table th {
            background: #f5f7fa;
            color: #455a64;
        }

        .report-table td {
            color: #546e7a;
        }

        .report-table tbody tr:hover {
            background: #f8fbff;
        }


        /* =========================
           STATUS
           ========================= */

        .status {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
        }

        .status-menunggu {
            background: #fff3cd;
            color: #856404;
        }

        .status-diproses {
            background: #cfe2ff;
            color: #084298;
        }

        .status-selesai {
            background: #d1e7dd;
            color: #0f5132;
        }


        /* =========================
           TOTAL
           ========================= */

        .report-total {
            margin-top: 20px;
            padding: 18px;
            background: #e3f2fd;
            border-radius: 12px;

            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .report-total-label {
            font-weight: 600;
            color: #455a64;
        }

        .report-total-price {
            font-size: 22px;
            font-weight: bold;
            color: #1565c0;
        }


        /* =========================
           EMPTY
           ========================= */

        .empty-message {
            text-align: center;
            padding: 50px 20px;
            color: #78909c;
        }

        .empty-icon {
            font-size: 50px;
            margin-bottom: 10px;
        }


        footer {
            text-align: center;
            padding: 30px;
            color: #78909c;
        }


        /* =========================
           PRINT
           ========================= */

        @media print {

            .admin-navbar,
            .filter-card,
            .print-button,
            footer {
                display: none !important;
            }

            .report-container {
                max-width: 100%;
                padding: 0;
            }

            .table-card,
            .stat-card {
                box-shadow: none;
            }

            body {
                background: white;
            }

        }


        /* =========================
           MOBILE
           ========================= */

        @media (max-width: 1000px) {

            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .filter-form {
                grid-template-columns: 1fr 1fr;
            }

        }


        @media (max-width: 700px) {

            .admin-navbar {
                flex-direction: column;
                gap: 15px;
                padding: 15px 20px;
            }

            .admin-nav-menu {
                flex-wrap: wrap;
                justify-content: center;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .filter-form {
                grid-template-columns: 1fr;
            }

            .table-header {
                flex-direction: column;
                align-items: flex-start;
            }

        }

    </style>

</head>


<body>


{{-- =========================
     NAVBAR
     ========================= --}}

<nav class="admin-navbar">

    <div class="admin-logo">
        🧺 Laundry App
    </div>

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

        <a href="{{ route('orders.index') }}">
            Pesanan
        </a>

        <a href="{{ route('admin.laporan') }}">
            Laporan
        </a>

        <span class="admin-user">
            Halo, {{ Auth::user()->name }}
        </span>

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
     CONTENT
     ========================= --}}

<main class="report-container">


    {{-- HEADER --}}

    <div class="report-header">

        <h1>
            📊 Laporan Transaksi
        </h1>

        <p>
            Laporan transaksi laundry berdasarkan data pesanan.
        </p>

    </div>



    {{-- =========================
         STATISTIK
         ========================= --}}

    <div class="stats-grid">


        <div class="stat-card">

            <div class="stat-icon">
                📦
            </div>

            <h3>
                {{ $totalTransactions }}
            </h3>

            <p>
                Total Transaksi
            </p>

        </div>


        <div class="stat-card">

            <div class="stat-icon">
                💰
            </div>

            <h3>
                Rp {{ number_format($totalRevenue, 0, ',', '.') }}
            </h3>

            <p>
                Total Pendapatan
            </p>

        </div>


        <div class="stat-card">

            <div class="stat-icon">
                ⏳
            </div>

            <h3>
                {{ $pendingOrders }}
            </h3>

            <p>
                Menunggu
            </p>

        </div>


        <div class="stat-card">

            <div class="stat-icon">
                🔄
            </div>

            <h3>
                {{ $processingOrders }}
            </h3>

            <p>
                Diproses
            </p>

        </div>


        <div class="stat-card">

            <div class="stat-icon">
                ✅
            </div>

            <h3>
                {{ $completedOrders }}
            </h3>

            <p>
                Selesai
            </p>

        </div>


    </div>



    {{-- =========================
         FILTER
         ========================= --}}

    <div class="filter-card">

        <h2>
            🔎 Filter Laporan
        </h2>


        <form
            action="{{ route('admin.laporan') }}"
            method="GET"
            class="filter-form"
        >


            {{-- STATUS --}}

            <div class="form-group">

                <label
                    for="status"
                    class="form-label"
                >
                    Status
                </label>

                <select
                    name="status"
                    id="status"
                    class="form-control"
                >

                    <option value="">
                        Semua Status
                    </option>

                    <option
                        value="Menunggu"
                        {{ request('status') === 'Menunggu' ? 'selected' : '' }}
                    >
                        Menunggu
                    </option>

                    <option
                        value="Diproses"
                        {{ request('status') === 'Diproses' ? 'selected' : '' }}
                    >
                        Diproses
                    </option>

                    <option
                        value="Selesai"
                        {{ request('status') === 'Selesai' ? 'selected' : '' }}
                    >
                        Selesai
                    </option>

                </select>

            </div>


            {{-- TANGGAL MULAI --}}

            <div class="form-group">

                <label
                    for="tanggal_mulai"
                    class="form-label"
                >
                    Tanggal Mulai
                </label>

                <input
                    type="date"
                    name="tanggal_mulai"
                    id="tanggal_mulai"
                    class="form-control"
                    value="{{ request('tanggal_mulai') }}"
                >

            </div>


            {{-- TANGGAL AKHIR --}}

            <div class="form-group">

                <label
                    for="tanggal_akhir"
                    class="form-label"
                >
                    Tanggal Akhir
                </label>

                <input
                    type="date"
                    name="tanggal_akhir"
                    id="tanggal_akhir"
                    class="form-control"
                    value="{{ request('tanggal_akhir') }}"
                >

            </div>


            {{-- FILTER --}}

            <button
                type="submit"
                class="btn btn-primary"
            >
                🔎 Filter
            </button>


            {{-- RESET --}}

            <a
                href="{{ route('admin.laporan') }}"
                class="btn btn-secondary"
            >
                ↻ Reset
            </a>


        </form>

    </div>



    {{-- =========================
         TABEL TRANSAKSI
         ========================= --}}

    <div class="table-card">


        <div class="table-header">

            <h2>
                📋 Data Transaksi
            </h2>


            <button
                type="button"
                onclick="window.print()"
                class="btn btn-primary print-button"
            >
                🖨️ Cetak Laporan
            </button>

        </div>



        @if ($orders->count() > 0)


            <div class="table-wrapper">

                <table class="report-table">

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
                                Harga / kg
                            </th>

                            <th>
                                Total
                            </th>

                            <th>
                                Status
                            </th>

                            <th>
                                Tanggal
                            </th>

                        </tr>

                    </thead>


                    <tbody>


                        @foreach ($orders as $order)

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
                                    Rp {{ number_format($order->service->price, 0, ',', '.') }}
                                </td>

                                <td>
                                    Rp {{ number_format($order->total_price, 0, ',', '.') }}
                                </td>

                                <td>

                                    <span
                                        class="status
                                        @if ($order->status === 'Menunggu')
                                            status-menunggu
                                        @elseif ($order->status === 'Diproses')
                                            status-diproses
                                        @elseif ($order->status === 'Selesai')
                                            status-selesai
                                        @endif
                                        "
                                    >
                                        {{ $order->status }}
                                    </span>

                                </td>

                                <td>
                                    {{ $order->created_at->format('d/m/Y H:i') }}
                                </td>

                            </tr>

                        @endforeach


                    </tbody>

                </table>

            </div>


            {{-- TOTAL --}}

            <div class="report-total">

                <span class="report-total-label">
                    Total Pendapatan dari Data yang Ditampilkan
                </span>

                <span class="report-total-price">
                    Rp {{ number_format($totalRevenue, 0, ',', '.') }}
                </span>

            </div>


        @else


            <div class="empty-message">

                <div class="empty-icon">
                    📦
                </div>

                <h3>
                    Tidak Ada Transaksi
                </h3>

                <p>
                    Tidak ada transaksi yang sesuai dengan filter.
                </p>

            </div>


        @endif


    </div>


</main>



{{-- =========================
     FOOTER
     ========================= --}}

<footer>

    <p>
        © {{ date('Y') }} Laundry App
    </p>

</footer>


</body>

</html>