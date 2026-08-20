<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Layanan Laundry</title>

    <link rel="stylesheet" href="{{ asset('css/services.css') }}">

</head>


<body>


<div class="container">


    {{-- HEADER --}}

    <header class="page-header">

        <h1>
            Layanan Laundry
        </h1>

        <p>
            Daftar layanan laundry dan harga per kilogram
        </p>

    </header>


    {{-- TOMBOL TAMBAH --}}
    {{-- Hanya bisa dilihat oleh admin --}}

    @if (Auth::check() && Auth::user()->role === 'admin')

        <a
            href="{{ route('services.create') }}"
            class="btn-add"
        >
            + Tambah Layanan
        </a>

    @endif


    {{-- TABEL LAYANAN --}}

    <div class="table-wrapper">

        <table>


            <thead>

                <tr>

                    <th>
                        ID
                    </th>

                    <th>
                        Nama Layanan
                    </th>

                    <th>
                        Harga / kg
                    </th>


                    {{-- Kolom aksi hanya admin --}}

                    @if (Auth::check() && Auth::user()->role === 'admin')

                        <th>
                            Aksi
                        </th>

                    @endif

                </tr>

            </thead>


            <tbody>


                @forelse ($services as $service)


                    <tr>


                        {{-- ID --}}

                        <td>
                            {{ $service->id }}
                        </td>


                        {{-- NAMA LAYANAN --}}

                        <td>
                            {{ $service->name }}
                        </td>


                        {{-- HARGA PER KG --}}

                        <td class="price">

                            Rp
                            {{ number_format($service->price, 0, ',', '.') }}

                            / kg

                        </td>


                        {{-- AKSI ADMIN --}}

                        @if (Auth::check() && Auth::user()->role === 'admin')

                            <td>


                                {{-- EDIT --}}

                                <a
                                    href="{{ route('services.edit', $service->id) }}"
                                    class="btn-edit"
                                >
                                    Edit
                                </a>


                                {{-- HAPUS --}}

                                <form
                                    action="{{ route('services.destroy', $service->id) }}"
                                    method="POST"
                                    style="display: inline;"
                                    onsubmit="return confirm('Yakin ingin menghapus layanan ini?')"
                                >

                                    @csrf

                                    @method('DELETE')


                                    <button
                                        type="submit"
                                        class="btn-delete"
                                    >
                                        Hapus
                                    </button>

                                </form>


                            </td>

                        @endif


                    </tr>


                @empty


                    {{-- JIKA BELUM ADA LAYANAN --}}

                    <tr>

                        <td
                            colspan="{{ Auth::check() && Auth::user()->role === 'admin' ? 4 : 3 }}"
                        >

                            Belum ada layanan.

                        </td>

                    </tr>


                @endforelse


            </tbody>


        </table>

    </div>


</div>


</body>

</html>