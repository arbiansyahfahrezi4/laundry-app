<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Layanan - Laundry</title>

    <link rel="stylesheet" href="{{ asset('css/services.css') }}">
</head>

<body>

    <div class="container">

        <div class="form-header">
            <h1>Tambah Layanan</h1>
            <p>Tambahkan layanan baru ke aplikasi laundry</p>
        </div>

        <div class="form-card">

            <form action="{{ route('services.store') }}" method="POST">

                @csrf

                <div class="form-group">
                    <label for="name">Nama Layanan</label>

                    <input
                        type="text"
                        id="name"
                        name="name"
                        placeholder="Contoh: Cuci Kering"
                        value="{{ old('name') }}"
                        required
                    >

                    @error('name')
                        <small class="error">{{ $message }}</small>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="price">Harga Layanan</label>

                    <div class="price-input">
                        <span>Rp</span>

                        <input
                            type="number"
                            id="price"
                            name="price"
                            placeholder="15000"
                            value="{{ old('price') }}"
                            min="0"
                            required
                        >
                    </div>

                    @error('price')
                        <small class="error">{{ $message }}</small>
                    @enderror
                </div>


                <div class="form-actions">

                    <a href="{{ route('services.index') }}" class="btn-back">
                        Kembali
                    </a>

                    <button type="submit" class="btn-save">
                        Simpan Layanan
                    </button>

                </div>

            </form>

        </div>

    </div>

</body>

</html>