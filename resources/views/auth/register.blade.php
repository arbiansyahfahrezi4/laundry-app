<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Daftar - Laundry App</title>

    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>

<body>

    <div class="auth-container">

        <div class="auth-card">

            <div class="auth-header">
                <div class="auth-logo">
                    🧺
                </div>

                <h1>Buat Akun</h1>

                <p>
                    Daftar untuk mulai menggunakan Laundry App
                </p>
            </div>


            @if ($errors->any())
                <div class="alert-error">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            <form action="{{ route('register') }}" method="POST">

                @csrf

                <div class="form-group">

                    <label for="name">
                        Nama
                    </label>

                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old('name') }}"
                        placeholder="Masukkan nama"
                        required
                    >

                </div>


                <div class="form-group">

                    <label for="email">
                        Email
                    </label>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="Masukkan email"
                        required
                    >

                </div>


                <div class="form-group">

                    <label for="password">
                        Password
                    </label>

                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Minimal 6 karakter"
                        required
                    >

                </div>


                <div class="form-group">

                    <label for="password_confirmation">
                        Konfirmasi Password
                    </label>

                    <input
                        type="password"
                        id="password_confirmation"
                        name="password_confirmation"
                        placeholder="Masukkan ulang password"
                        required
                    >

                </div>


                <button type="submit" class="btn-auth">
                    Daftar
                </button>

            </form>


            <div class="auth-footer">

                <p>
                    Sudah punya akun?
                    <a href="{{ route('login') }}">
                        Login
                    </a>
                </p>

                <a href="{{ url('/') }}" class="back-home">
                    ← Kembali ke Beranda
                </a>

            </div>

        </div>

    </div>

</body>

</html>