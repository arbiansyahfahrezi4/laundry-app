<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Riwayat Pesanan - Laundry App</title>

    <link
        rel="stylesheet"
        href="{{ asset('css/services.css') }}"
    >

    <style>

        .orders-container {
            max-width: 1100px;
            margin: auto;
            padding: 40px 25px;
        }


        /* =========================
           NAVBAR
           ========================= */

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


        /* =========================
           CONTENT
           ========================= */

        .page-title {
            margin-bottom: 30px;
        }


        .page-title h1 {
            margin-bottom: 8px;
        }


        .page-title p {
            color: #78909c;
        }


        .btn-back {
            display: inline-block;
            margin-bottom: 20px;
            color: #1976d2;
            text-decoration: none;
            font-weight: 500;
        }


        .btn-back:hover {
            text-decoration: underline;
        }


        /* =========================
           SUCCESS MESSAGE
           ========================= */

        .success-message {
            background: #d1e7dd;
            color: #0f5132;
            padding: 14px 18px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-weight: 500;
        }


        /* =========================
           TABLE
           ========================= */

        .orders-table-wrapper {
            background: white;
            border-radius: 16px;
            padding: 20px;
            overflow-x: auto;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.06);
        }


        table {
            width: 100%;
            border-collapse: collapse;
        }


        th {
            text-align: left;
            padding: 15px;
            background: #f5f7fa;
            color: #455a64;
        }


        td {
            padding: 15px;
            border-bottom: 1px solid #eceff1;
            color: #546e7a;
        }


        tbody tr {
            transition: 0.2s;
        }


        tbody tr:hover {
            background: #f8fbff;
        }


        .order-link {
            color: #1976d2;
            font-weight: bold;
            text-decoration: none;
        }


        .order-link:hover {
            text-decoration: underline;
        }


        /* =========================
           STATUS
           ========================= */

        .status {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 20px;
            background: #fff3cd;
            color: #856404;
            font-size: 13px;
            font-weight: bold;
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
           STATUS SELECT ADMIN
           ========================= */

        .status-select {
            padding: 8px 12px;
            border-radius: 8px;
            border: 1px solid #d0d7de;
            background: white;
            color: #333;
            font-weight: 500;
            cursor: pointer;
            outline: none;
        }


        .status-select:focus {
            border-color: #1976d2;
        }


        /* =========================
           ACTION
           ========================= */

        .action-edit,
        .action-delete {
            display: inline-block;
            padding: 7px 10px;
            border-radius: 7px;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
            margin-right: 5px;
        }


        .action-edit {
            background: #e3f2fd;
            color: #1565c0;
        }


        .action-edit:hover {
            background: #bbdefb;
        }


        .action-delete {
            border: none;
            background: #fee2e2;
            color: #b91c1c;
            cursor: pointer;
        }


        .action-delete:hover {
            background: #fecaca;
        }


        /* =========================
           EMPTY
           ========================= */

        .empty {
            text-align: center;
            padding: 50px 20px;
            color: #78909c;
        }


        .btn-order {
            display: inline-block;
            margin-top: 15px;
            padding: 10px 18px;
            border-radius: 8px;
            background: #1976d2;
            color: white;
            text-decoration: none;
        }


        /* =========================
           FOOTER
           ========================= */

        footer {
            text-align: center;
            padding: 30px;
            color: #78909c;
        }


        /* =========================
           MOBILE
           ========================= */

        @media (max-width: 800px) {

            .navbar {
                flex-direction: column;
                gap: 15px;
                padding: 18px 20px;
            }


            .nav-menu {
                flex-wrap: wrap;
                justify-content: center;
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


            {{-- Nama user --}}

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
         CONTENT
         ========================= --}}

    <main class="orders-container">


        {{-- Tombol kembali sesuai role --}}

        @if (Auth::user()->role === 'admin')

            <a
                href="{{ route('admin.dashboard') }}"
                class="btn-back"
            >
                ← Kembali ke Dashboard Admin
            </a>

        @else

            <a
                href="{{ route('user.dashboard') }}"
                class="btn-back"
            >
                ← Kembali ke Dashboard
            </a>

        @endif



        <div class="page-title">


            <h1>
                📋 Riwayat Pesanan
            </h1>


            <p>

                @if (Auth::user()->role === 'admin')

                    Lihat dan kelola pesanan laundry pelanggan.

                @else

                    Semua pesanan laundry yang pernah kamu buat.

                @endif

            </p>


        </div>



        {{-- =========================
             PESAN BERHASIL
             ========================= --}}

        @if (session('success'))

            <div class="success-message">

                ✅ {{ session('success') }}

            </div>

        @endif



        {{-- =========================
             DATA PESANAN
             ========================= --}}

        @if ($orders->count() > 0)


            <div class="orders-table-wrapper">


                <table>


                    <thead>

                        <tr>

                            <th>
                                ID
                            </th>


                            @if (Auth::user()->role === 'admin')

                                <th>
                                    Pelanggan
                                </th>

                            @endif


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


                            <th>
                                Tanggal
                            </th>


                            {{-- Aksi khusus admin --}}

                            @if (Auth::user()->role === 'admin')

                                <th>
                                    Aksi
                                </th>

                            @endif

                        </tr>

                    </thead>


                    <tbody>


                        @foreach ($orders as $order)


                            <tr>


                                {{-- ID --}}

                                <td>

                                    <a
                                        href="{{ route('orders.show', $order->id) }}"
                                        class="order-link"
                                    >
                                        #{{ $order->id }}
                                    </a>

                                </td>


                                {{-- Pelanggan khusus admin --}}

                                @if (Auth::user()->role === 'admin')

                                    <td>
                                        {{ $order->user->name }}
                                    </td>

                                @endif


                                {{-- Layanan --}}

                                <td>
                                    {{ $order->service->name }}
                                </td>


                                {{-- Berat --}}

                                <td>
                                    {{ $order->weight }} kg
                                </td>


                                {{-- Total --}}

                                <td>
                                    Rp {{ number_format($order->total_price, 0, ',', '.') }}
                                </td>


                                {{-- =========================
                                     STATUS
                                     ========================= --}}

                                <td>


                                    @if (Auth::user()->role === 'admin')


                                        {{-- ADMIN BISA UBAH STATUS --}}

                                        <form
                                            action="{{ route('orders.updateStatus', $order->id) }}"
                                            method="POST"
                                        >

                                            @csrf

                                            @method('PUT')


                                            <select
                                                name="status"
                                                class="status-select"
                                                onchange="this.form.submit()"
                                            >


                                                <option
                                                    value="Menunggu"
                                                    {{ $order->status === 'Menunggu' ? 'selected' : '' }}
                                                >
                                                    Menunggu
                                                </option>


                                                <option
                                                    value="Diproses"
                                                    {{ $order->status === 'Diproses' ? 'selected' : '' }}
                                                >
                                                    Diproses
                                                </option>


                                                <option
                                                    value="Selesai"
                                                    {{ $order->status === 'Selesai' ? 'selected' : '' }}
                                                >
                                                    Selesai
                                                </option>


                                            </select>


                                        </form>


                                    @else


                                        {{-- USER HANYA MELIHAT STATUS --}}

                                        <span
                                            class="status
                                            @if ($order->status === 'Diproses')
                                                status-diproses
                                            @elseif ($order->status === 'Selesai')
                                                status-selesai
                                            @endif
                                            "
                                        >
                                            {{ $order->status }}
                                        </span>


                                    @endif


                                </td>


                                {{-- Tanggal --}}

                                <td>
                                    {{ $order->created_at->format('d/m/Y H:i') }}
                                </td>


                                {{-- =========================
                                     AKSI ADMIN
                                     ========================= --}}

                                @if (Auth::user()->role === 'admin')

                                    <td>


                                        {{-- EDIT --}}

                                        <a
                                            href="{{ route('orders.edit', $order->id) }}"
                                            class="action-edit"
                                        >
                                            ✏️ Edit
                                        </a>


                                        {{-- HAPUS --}}

                                        <form
                                            action="{{ route('orders.destroy', $order->id) }}"
                                            method="POST"
                                            style="display: inline;"
                                            onsubmit="return confirm('Yakin ingin menghapus pesanan #{{ $order->id }}?');"
                                        >

                                            @csrf

                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="action-delete"
                                            >
                                                🗑️ Hapus
                                            </button>

                                        </form>


                                    </td>

                                @endif


                            </tr>


                        @endforeach


                    </tbody>


                </table>


            </div>


        @else


            <div class="orders-table-wrapper">


                <div class="empty">


                    <div style="font-size: 50px;">
                        📦
                    </div>


                    <h3>
                        Belum Ada Pesanan
                    </h3>


                    <p>


                        @if (Auth::user()->role === 'admin')

                            Belum ada pelanggan yang membuat pesanan.

                        @else

                            Kamu belum memiliki riwayat pesanan laundry.

                        @endif


                    </p>


                    {{-- Tombol pesan hanya untuk user --}}

                    @if (Auth::user()->role !== 'admin')


                        <a
                            href="{{ route('orders.create') }}"
                            class="btn-order"
                        >
                            + Pesan Laundry
                        </a>


                    @endif


                </div>


            </div>


        @endif


    </main>



    {{-- =========================
         FOOTER
         ========================= --}}

    <footer>

        <p>
            © {{ date('Y') }} Laundry App
        </p>

    </footer>


</div>


</body>

</html>