<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Menampilkan daftar pesanan.
     *
     * Admin  : melihat semua pesanan pelanggan.
     * User   : hanya melihat pesanannya sendiri.
     */
    public function index()
    {
        if (Auth::user()->role === 'admin') {

            $orders = Order::with(['service', 'user'])
                ->latest()
                ->get();

        } else {

            $orders = Order::with('service')
                ->where('user_id', Auth::id())
                ->latest()
                ->get();
        }

        return view('orders.riwayat', compact('orders'));
    }


    /**
     * Menampilkan form pemesanan.
     */
    public function create()
    {
        $services = Service::all();

        return view('orders.create', compact('services'));
    }


    /**
     * Menyimpan pesanan baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',

            'weight' => 'required|numeric|min:0.1',

            'laundry_date' => 'required|date|after_or_equal:today',

            'notes' => 'nullable|string',
        ], [
            'laundry_date.required' => 'Tanggal laundry wajib dipilih.',
            'laundry_date.date' => 'Tanggal laundry tidak valid.',
            'laundry_date.after_or_equal' => 'Tanggal laundry tidak boleh sebelum hari ini.',
        ]);

        $service = Service::findOrFail(
            $request->service_id
        );

        $totalPrice =
            $service->price * $request->weight;

        Order::create([
            'user_id' => Auth::id(),

            'service_id' => $service->id,

            'weight' => $request->weight,

            'laundry_date' => $request->laundry_date,

            'total_price' => $totalPrice,

            'notes' => $request->notes,

            'status' => 'Menunggu',
        ]);

        return redirect()
            ->route('user.dashboard')
            ->with(
                'success',
                'Pesanan laundry berhasil dibuat.'
            );
    }


    /**
     * Menampilkan detail pesanan.
     */
    public function show(Order $order)
    {
        if (Auth::user()->role !== 'admin') {

            abort_if(
                $order->user_id !== Auth::id(),
                403
            );
        }

        $order->load([
            'service',
            'user'
        ]);

        return view(
            'orders.detail',
            compact('order')
        );
    }


    /**
     * Mengubah status pesanan.
     * Khusus admin.
     */
    public function updateStatus(
        Request $request,
        Order $order
    ) {
        abort_if(
            Auth::user()->role !== 'admin',
            403
        );

        $request->validate([
            'status' =>
                'required|in:Menunggu,Diproses,Selesai',
        ]);

        $order->update([
            'status' => $request->status,
        ]);

        return back()->with(
            'success',
            'Status pesanan berhasil diperbarui.'
        );
    }


    /**
     * Menampilkan form edit pesanan.
     * Khusus admin.
     */
    public function edit(Order $order)
    {
        abort_if(
            Auth::user()->role !== 'admin',
            403
        );

        $services = Service::all();

        $order->load([
            'service',
            'user'
        ]);

        return view(
            'orders.edit',
            compact(
                'order',
                'services'
            )
        );
    }


    /**
     * Memperbarui pesanan.
     * Khusus admin.
     */
    public function update(
        Request $request,
        Order $order
    ) {
        abort_if(
            Auth::user()->role !== 'admin',
            403
        );

        $request->validate([
            'service_id' =>
                'required|exists:services,id',

            'weight' =>
                'required|numeric|min:0.1',

            'laundry_date' =>
                'required|date',

            'notes' =>
                'nullable|string',
        ], [
            'laundry_date.required' =>
                'Tanggal laundry wajib dipilih.',

            'laundry_date.date' =>
                'Tanggal laundry tidak valid.',
        ]);

        $service = Service::findOrFail(
            $request->service_id
        );

        $totalPrice =
            $service->price * $request->weight;

        $order->update([
            'service_id' =>
                $service->id,

            'weight' =>
                $request->weight,

            'laundry_date' =>
                $request->laundry_date,

            'total_price' =>
                $totalPrice,

            'notes' =>
                $request->notes,
        ]);

        return redirect()
            ->route(
                'orders.show',
                $order->id
            )
            ->with(
                'success',
                'Pesanan berhasil diperbarui.'
            );
    }


    /**
     * Menghapus pesanan.
     * Khusus admin.
     */
    public function destroy(Order $order)
    {
        abort_if(
            Auth::user()->role !== 'admin',
            403
        );

        $order->delete();

        return redirect()
            ->route('orders.index')
            ->with(
                'success',
                'Pesanan berhasil dihapus.'
            );
    }
}