<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Laundry App</title>

    <link
        rel="stylesheet"
        href="{{ asset('css/services.css') }}"
    >

    <style>

        /* =========================
           LOGOUT BUTTON
           ========================= */

        .logout-form {
            display: inline;
            margin: 0;
            padding: 0;
        }

        .logout-button {
            border: none;
            background: none;
            font: inherit;
            cursor: pointer;
            color: inherit;
            padding: 0;
        }

        .logout-button:hover {
            opacity: 0.7;
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


            {{-- Beranda --}}

            <a href="{{ url('/') }}">
                Beranda
            </a>


            {{-- Layanan --}}

            <a href="{{ route('services.index') }}">
                Layanan
            </a>


            {{-- =========================
                 SUDAH LOGIN
                 ========================= --}}

            @auth

                @if (Auth::user()->role === 'admin')

                    {{-- Dashboard Admin --}}

                    <a href="{{ route('admin.dashboard') }}">
                        Dashboard Admin
                    </a>

                @else

                    {{-- Dashboard User --}}

                    <a href="{{ route('user.dashboard') }}">
                        Dashboard
                    </a>

                @endif


                {{-- Logout --}}

                <form
                    action="{{ route('logout') }}"
                    method="POST"
                    class="logout-form"
                >

                    @csrf

                    <button
                        type="submit"
                        class="logout-button"
                    >
                        Logout
                    </button>

                </form>


            @else

                {{-- =========================
                     BELUM LOGIN
                     ========================= --}}

                <a href="{{ route('login') }}">
                    Login
                </a>


                <a href="{{ route('register') }}">
                    Daftar
                </a>

            @endauth


        </div>

    </nav>



    {{-- =========================
         HERO
         ========================= --}}

    <section class="hero">


        <div class="hero-content">


            <span class="hero-label">
                LAUNDRY MANAGEMENT SYSTEM
            </span>


            <h1>

                Laundry Bersih,
                <br>
                Wangi & Terpercaya

            </h1>


            <p>

                Nikmati layanan laundry yang mudah,
                cepat, dan terorganisir.
                Pesan laundry tanpa ribet dan pantau
                status cucian kamu dengan mudah.

            </p>


            <div class="hero-buttons">


                @auth

                    @if (Auth::user()->role === 'admin')

                        <a
                            href="{{ route('admin.dashboard') }}"
                            class="btn-home-primary"
                        >
                            Dashboard Admin
                        </a>

                    @else

                        <a
                            href="{{ route('user.dashboard') }}"
                            class="btn-home-primary"
                        >
                            Dashboard Saya
                        </a>

                    @endif


                    <a
                        href="{{ route('services.index') }}"
                        class="btn-home-secondary"
                    >
                        Lihat Layanan
                    </a>


                @else

                    <a
                        href="{{ route('register') }}"
                        class="btn-home-primary"
                    >
                        Daftar Sekarang
                    </a>


                    <a
                        href="{{ route('services.index') }}"
                        class="btn-home-secondary"
                    >
                        Lihat Layanan
                    </a>

                @endauth


            </div>


        </div>


        <div class="hero-icon">
            🧺
        </div>


    </section>



    {{-- =========================
         KEUNGGULAN
         ========================= --}}

    <section class="menu-section">


        <h2>
            Kenapa Memilih Kami?
        </h2>


        <p class="section-description">

            Kami membantu membuat proses laundry
            menjadi lebih mudah.

        </p>


        <div class="menu-grid">


            <div class="menu-card">

                <div class="menu-icon">
                    ✨
                </div>

                <div>

                    <h3>
                        Bersih
                    </h3>

                    <p>
                        Pakaian dicuci dengan proses yang terjaga.
                    </p>

                </div>

            </div>


            <div class="menu-card">

                <div class="menu-icon">
                    🌸
                </div>

                <div>

                    <h3>
                        Wangi
                    </h3>

                    <p>
                        Pakaian bersih dengan aroma yang menyegarkan.
                    </p>

                </div>

            </div>


            <div class="menu-card">

                <div class="menu-icon">
                    ⚡
                </div>

                <div>

                    <h3>
                        Tepat Waktu
                    </h3>

                    <p>
                        Status laundry dapat dipantau dengan mudah.
                    </p>

                </div>

            </div>


            <div class="menu-card">

                <div class="menu-icon">
                    📱
                </div>

                <div>

                    <h3>
                        Mudah
                    </h3>

                    <p>
                        Kelola pesanan laundry dalam satu aplikasi.
                    </p>

                </div>

            </div>


        </div>

    </section>



    {{-- =========================
         LAYANAN
         ========================= --}}

    <section class="menu-section">


        <h2>
            Layanan Laundry
        </h2>


        <p class="section-description">

            Pilih layanan yang sesuai dengan kebutuhanmu.

        </p>


        <div class="menu-grid">


            <a
                href="{{ route('services.index') }}"
                class="menu-card"
            >

                <div class="menu-icon">
                    🧺
                </div>

                <div>

                    <h3>
                        Semua Layanan
                    </h3>

                    <p>
                        Lihat daftar layanan dan harga laundry.
                    </p>

                </div>

            </a>


            <div class="menu-card disabled">

                <div class="menu-icon">
                    👕
                </div>

                <div>

                    <h3>
                        Cuci & Setrika
                    </h3>

                    <p>
                        Tersedia melalui menu layanan.
                    </p>

                </div>

            </div>


            <div class="menu-card disabled">

                <div class="menu-icon">
                    ⚡
                </div>

                <div>

                    <h3>
                        Express
                    </h3>

                    <p>
                        Layanan cepat akan segera tersedia.
                    </p>

                </div>

            </div>


            <div class="menu-card disabled">

                <div class="menu-icon">
                    👔
                </div>

                <div>

                    <h3>
                        Setrika
                    </h3>

                    <p>
                        Kelola layanan melalui daftar layanan.
                    </p>

                </div>

            </div>


        </div>

    </section>



    {{-- =========================
         CTA
         ========================= --}}

    <section class="hero">


        <div class="hero-content">


            <span class="hero-label">

                @auth
                    SELAMAT DATANG KEMBALI
                @else
                    MULAI SEKARANG
                @endauth

            </span>


            <h1>

                @auth

                    Senang Melihatmu Kembali!

                @else

                    Siap Laundry Hari Ini?

                @endauth

            </h1>


            <p>

                @auth

                    Kelola pesanan laundry kamu
                    dengan mudah melalui dashboard.

                @else

                    Buat akun dan mulai pesan layanan
                    laundry dengan mudah.

                @endauth

            </p>


            <div class="hero-buttons">


                @auth

                    @if (Auth::user()->role === 'admin')

                        <a
                            href="{{ route('admin.dashboard') }}"
                            class="btn-home-primary"
                        >
                            Dashboard Admin
                        </a>

                    @else

                        <a
                            href="{{ route('user.dashboard') }}"
                            class="btn-home-primary"
                        >
                            Dashboard Saya
                        </a>

                    @endif


                    <a
                        href="{{ route('services.index') }}"
                        class="btn-home-secondary"
                    >
                        Lihat Layanan
                    </a>


                @else

                    <a
                        href="{{ route('register') }}"
                        class="btn-home-primary"
                    >
                        Daftar Sekarang
                    </a>


                    <a
                        href="{{ route('services.index') }}"
                        class="btn-home-secondary"
                    >
                        Lihat Layanan
                    </a>

                @endauth


            </div>


        </div>


        <div class="hero-icon">

            @auth

                @if (Auth::user()->role === 'admin')
                    👨‍💼
                @else
                    🧺
                @endif

            @else

                👕
                
            @endauth

        </div>


    </section>



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