<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Pesanan - Laundry App</title>

    <link
        rel="stylesheet"
        href="{{ asset('css/services.css') }}"
    >

    <style>

        .edit-container {
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

        .edit-card {
            background: white;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.07);
        }

        .edit-header {
            margin-bottom: 25px;
            padding-bottom: 20px;
            border-bottom: 1px solid #eceff1;
        }

        .edit-header h1 {
            margin: 0 0 8px;
            color: #263238;
        }

        .edit-header p {
            margin: 0;
            color: #90a4ae;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            color: #455a64;
            font-weight: 600;
        }

        .form-control {
            width: 100%;
            box-sizing: border-box;
            padding: 12px 14px;
            border: 1px solid #d0d7de;
            border-radius: 9px;
            font-size: 15px;
            outline: none;
        }

        .form-control:focus {
            border-color: #1976d2;
        }

        textarea.form-control {
            min-height: 120px;
            resize: vertical;
        }

        .error-message {
            margin-bottom: 20px;
            padding: 14px 18px;
            border-radius: 10px;
            background: #fee2e2;
            color: #991b1b;
        }

        .error-message ul {
            margin: 0;
            padding-left: 20px;
        }

        .info-box {
            margin-bottom: 25px;
            padding: 18px;
            background: #f8fafc;
            border-radius: 12px;
        }

        .info-box p {
            margin: 6px 0;
            color: #546e7a;
        }

        .button-group {
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
            border: none;
            cursor: pointer;
            font-size: 15px;
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

        @media (max-width: 700px) {

            .navbar {
                flex-direction: column;
                gap: 15px;
                padding: 18px 20px;
            }

            .nav-menu {
                flex-wrap: wrap;
                justify-content: center;
            }

            .button-group {
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

            <a href="{{ route('admin.dashboard') }}">
                Dashboard Admin
            </a>

            <a href="{{ route('services.index') }}">
                Layanan
            </a>

            <a href="{{ route('orders.index') }}">
                Riwayat Pesanan
            </a>

            <span>
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

    <main class="edit-container">

        <a
            href="{{ route('orders.show', $order->id) }}"
            class="btn-back"
        >
            ← Kembali ke Detail Pesanan
        </a>


        <div class="edit-card">


            {{-- HEADER --}}

            <div class="edit-header">

                <h1>
                    ✏️ Edit Pesanan
                </h1>

                <p>
                    Pesanan #{{ $order->id }}
                </p>

            </div>


            {{-- ERROR VALIDASI --}}

            @if ($errors->any())

                <div class="error-message">

                    <strong>
                        Ada kesalahan:
                    </strong>

                    <ul>

                        @foreach ($errors->all() as $error)

                            <li>
                                {{ $error }}
                            </li>

                        @endforeach

                    </ul>

                </div>

            @endif


            {{-- INFORMASI PELANGGAN --}}

            <div class="info-box">

                <p>
                    <strong>Pelanggan:</strong>
                    {{ $order->user->name }}
                </p>

                <p>
                    <strong>Pesanan:</strong>
                    #{{ $order->id }}
                </p>

                <p>
                    <strong>Status:</strong>
                    {{ $order->status }}
                </p>

            </div>


            {{-- FORM EDIT --}}

            <form
                action="{{ route('orders.update', $order->id) }}"
                method="POST"
            >

                @csrf

                @method('PUT')


                {{-- LAYANAN --}}

                <div class="form-group">

                    <label
                        for="service_id"
                        class="form-label"
                    >
                        Layanan
                    </label>

                    <select
                        name="service_id"
                        id="service_id"
                        class="form-control"
                        required
                    >

                        @foreach ($services as $service)

                            <option
                                value="{{ $service->id }}"
                                {{ $order->service_id == $service->id ? 'selected' : '' }}
                            >
                                {{ $service->name }}
                                - Rp {{ number_format($service->price, 0, ',', '.') }} / kg
                            </option>

                        @endforeach

                    </select>

                </div>


                {{-- BERAT --}}

                <div class="form-group">

                    <label
                        for="weight"
                        class="form-label"
                    >
                        Berat Laundry (kg)
                    </label>

                    <input
                        type="number"
                        name="weight"
                        id="weight"
                        class="form-control"
                        value="{{ old('weight', $order->weight) }}"
                        min="0.1"
                        step="0.1"
                        required
                    >

                </div>


                {{-- CATATAN --}}

                <div class="form-group">

                    <label
                        for="notes"
                        class="form-label"
                    >
                        Catatan
                    </label>

                    <textarea
                        name="notes"
                        id="notes"
                        class="form-control"
                        placeholder="Masukkan catatan pesanan..."
                    >{{ old('notes', $order->notes) }}</textarea>

                </div>


                {{-- TOMBOL --}}

                <div class="button-group">

                    <a
                        href="{{ route('orders.show', $order->id) }}"
                        class="btn btn-secondary"
                    >
                        Batal
                    </a>

                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        💾 Simpan Perubahan
                    </button>

                </div>


            </form>


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