<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Layanan - Laundry</title>

    <link rel="stylesheet" href="{{ asset('css/services.css') }}">
</head>

<body>

<div class="container">

    <header class="page-header">
        <h1>Edit Layanan</h1>
        <p>Ubah nama dan harga layanan laundry</p>
    </header>

    <div class="form-card">

        <form
            action="{{ route('services.update', $service->id) }}"
            method="POST"
        >

            @csrf
            @method('PUT')

            <div class="form-group">

                <label for="name">
                    Nama Layanan
                </label>

                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name', $service->name) }}"
                    required
                >

                @error('name')
                    <small class="error">
                        {{ $message }}
                    </small>
                @enderror

            </div>


            <div class="form-group">

                <label for="price">
                    Harga Layanan
                </label>

                <div class="price-input">

                    <span>Rp</span>

                    <input
                        type="number"
                        id="price"
                        name="price"
                        value="{{ old('price', $service->price) }}"
                        min="0"
                        required
                    >

                </div>

                @error('price')
                    <small class="error">
                        {{ $message }}
                    </small>
                @enderror

            </div>


            <div class="form-actions">

                <a
                    href="{{ route('services.index') }}"
                    class="btn-back"
                >
                    Kembali
                </a>

                <button
                    type="submit"
                    class="btn-save"
                >
                    Simpan Perubahan
                </button>

            </div>

        </form>

    </div>

</div>

</body>

</html>