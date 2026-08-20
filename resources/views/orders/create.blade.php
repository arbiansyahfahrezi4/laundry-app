<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Pesan Laundry - Laundry App</title>

    <link rel="stylesheet" href="{{ asset('css/services.css') }}">

    <style>
        .order-container {
            max-width: 850px;
            margin: 0 auto;
            padding: 45px 25px;
        }

        .order-header {
            margin-bottom: 30px;
        }

        .order-header h1 {
            margin: 10px 0;
            color: #263238;
        }

        .order-header p {
            color: #78909c;
        }

        .order-card {
            background: white;
            padding: 35px;
            border-radius: 20px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.07);
        }

        .form-group {
            margin-bottom: 24px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #37474f;
        }

        .form-group select,
        .form-group input,
        .form-group textarea {
            width: 100%;
            box-sizing: border-box;
            padding: 13px 15px;
            border: 1px solid #cfd8dc;
            border-radius: 10px;
            font-size: 15px;
            outline: none;
            transition: 0.2s;
        }

        .form-group select:focus,
        .form-group input:focus,
        .form-group textarea:focus {
            border-color: #42a5f5;
            box-shadow: 0 0 0 3px rgba(66, 165, 245, 0.12);
        }

        .form-group textarea {
            min-height: 120px;
            resize: vertical;
        }

        .price-info {
            background: #e3f2fd;
            padding: 18px;
            border-radius: 12px;
            margin-bottom: 25px;
            color: #1565c0;
        }

        .price-info strong {
            display: block;
            font-size: 20px;
            margin-top: 5px;
        }

        .error-box {
            background: #ffebee;
            color: #c62828;
            padding: 15px 20px;
            border-radius: 10px;
            margin-bottom: 25px;
        }

        .error-box ul {
            margin: 0;
            padding-left: 20px;
        }

        .order-actions {
            display: flex;
            gap: 12px;
            margin-top: 30px;
        }

        .btn-order {
            border: none;
            padding: 13px 22px;
            border-radius: 10px;
            background: #1976d2;
            color: white;
            font-weight: bold;
            cursor: pointer;
            font-size: 15px;
        }

        .btn-order:hover {
            background: #1565c0;
        }

        .btn-cancel {
            display: inline-flex;
            align-items: center;
            padding: 13px 22px;
            border-radius: 10px;
            background: #eceff1;
            color: #455a64;
            text-decoration: none;
            font-weight: bold;
        }

        .btn-cancel:hover {
            background: #cfd8dc;
        }

        .date-info {
            margin-top: 7px;
            font-size: 13px;
            color: #78909c;
        }

        @media (max-width: 600px) {
            .order-container {
                padding: 30px 15px;
            }

            .order-card {
                padding: 25px 20px;
            }

            .order-actions {
                flex-direction: column;
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

            <a href="{{ url('/user') }}">
                Dashboard
            </a>

            <a href="{{ route('services.index') }}">
                Layanan
            </a>

            <span>
                Halo, {{ Auth::user()->name }}
            </span>

        </div>

    </nav>


    <main class="order-container">

        <div class="order-header">

            <span class="hero-label">
                PEMESANAN LAUNDRY
            </span>

            <h1>
                🧺 Pesan Laundry
            </h1>

            <p>
                Pilih layanan, tentukan tanggal laundry, dan masukkan berat laundry kamu.
            </p>

        </div>


        <div class="order-card">

            {{-- ERROR VALIDASI --}}
            @if ($errors->any())

                <div class="error-box">

                    <strong>
                        Ada yang perlu diperbaiki:
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


            <form
                action="{{ route('orders.store') }}"
                method="POST"
            >

                @csrf


                {{-- LAYANAN --}}
                <div class="form-group">

                    <label for="service_id">
                        Pilih Layanan
                    </label>

                    <select
                        name="service_id"
                        id="service_id"
                        required
                    >

                        <option value="">
                            -- Pilih layanan --
                        </option>

                        @foreach ($services as $service)

                            <option
                                value="{{ $service->id }}"
                                data-price="{{ $service->price }}"
                                {{ old('service_id') == $service->id ? 'selected' : '' }}
                            >
                                {{ $service->name }}
                                - Rp {{ number_format($service->price, 0, ',', '.') }}/kg
                            </option>

                        @endforeach

                    </select>

                </div>


                {{-- BERAT --}}
                <div class="form-group">

                    <label for="weight">
                        Berat Laundry (kg)
                    </label>

                    <input
                        type="number"
                        name="weight"
                        id="weight"
                        step="0.1"
                        min="0.1"
                        value="{{ old('weight') }}"
                        placeholder="Contoh: 3.5"
                        required
                    >

                </div>


                {{-- TANGGAL LAUNDRY --}}
                <div class="form-group">

                    <label for="laundry_date">
                        Tanggal Laundry
                    </label>

                    <input
                        type="date"
                        name="laundry_date"
                        id="laundry_date"
                        value="{{ old('laundry_date') }}"
                        min="{{ date('Y-m-d') }}"
                        required
                    >

                    <div class="date-info">
                        Pilih tanggal saat laundry akan diproses.
                    </div>

                </div>


                {{-- PERKIRAAN HARGA --}}
                <div class="price-info">

                    Perkiraan Total Harga

                    <strong id="total-price">
                        Rp 0
                    </strong>

                </div>


                {{-- CATATAN --}}
                <div class="form-group">

                    <label for="notes">
                        Catatan
                    </label>

                    <textarea
                        name="notes"
                        id="notes"
                        placeholder="Contoh: Pisahkan pakaian putih..."
                    >{{ old('notes') }}</textarea>

                </div>


                {{-- BUTTON --}}
                <div class="order-actions">

                    <a
                        href="{{ url('/user') }}"
                        class="btn-cancel"
                    >
                        Batal
                    </a>

                    <button
                        type="submit"
                        class="btn-order"
                    >
                        🧺 Pesan Laundry
                    </button>

                </div>

            </form>

        </div>

    </main>


    <footer>

        <p>
            © {{ date('Y') }} Laundry App
        </p>

    </footer>

</div>


<script>

    const serviceSelect =
        document.getElementById('service_id');

    const weightInput =
        document.getElementById('weight');

    const totalPrice =
        document.getElementById('total-price');


    function calculateTotal() {

        const selectedOption =
            serviceSelect.options[
                serviceSelect.selectedIndex
            ];

        const price =
            parseFloat(
                selectedOption.dataset.price
            ) || 0;

        const weight =
            parseFloat(weightInput.value) || 0;

        const total =
            price * weight;

        totalPrice.textContent =
            'Rp ' +
            total.toLocaleString('id-ID');

    }


    serviceSelect.addEventListener(
        'change',
        calculateTotal
    );


    weightInput.addEventListener(
        'input',
        calculateTotal
    );


    calculateTotal();

</script>

</body>

</html>