<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    // Menampilkan semua layanan
    public function index()
    {
        $services = Service::all();

        return view('services.index', compact('services'));
    }

    // Menampilkan form tambah layanan
    public function create()
    {
        return view('services.create');
    }

    // Menyimpan layanan baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
        ]);

        Service::create([
            'name' => $request->name,
            'price' => $request->price,
        ]);

        return redirect()->route('services.index')
            ->with('success', 'Layanan berhasil ditambahkan.');
    }

    // Menampilkan form edit
    public function edit(Service $service)
    {
        return view('services.edit', compact('service'));
    }

    // Mengupdate layanan
    public function update(Request $request, Service $service)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
        ]);

        $service->update([
            'name' => $request->name,
            'price' => $request->price,
        ]);

        return redirect()->route('services.index')
            ->with('success', 'Layanan berhasil diperbarui.');
    }

    // Menghapus layanan
    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()->route('services.index')
            ->with('success', 'Layanan berhasil dihapus.');
    }
}