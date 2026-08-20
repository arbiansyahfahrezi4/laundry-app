<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - Laundry App</title>

    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>

<body>

<div class="auth-container">

    <div class="auth-card">

        <div class="auth-header">

            <div class="auth-logo">
                🧺
            </div>

            <h1>Login</h1>

            <p>
                Masuk ke akun Laundry App
            </p>

        </div>


        @if ($errors->any())

            <div class="alert-error">

                <ul>

                    @foreach ($errors->all() as $error)

                        <li>
                            {{ $error }}
                        </li>

                    @endforeach

                </ul>

            </div>

        @endif


        <form action="{{ route('login') }}" method="POST">

            @csrf

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
                    placeholder="Masukkan password"
                    required
                >

            </div>


            <button
                type="submit"
                class="btn-auth"
            >
                Login
            </button>

        </form>


        <div class="auth-footer">

            <p>
                Belum punya akun?

                <a href="{{ route('register') }}">
                    Daftar
                </a>
            </p>


            <a
                href="{{ url('/') }}"
                class="back-home"
            >
                ← Kembali ke Beranda
            </a>

        </div>

    </div>

</div>

</body>

</html>