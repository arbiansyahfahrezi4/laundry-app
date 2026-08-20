<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Dashboard Admin
     */
    public function dashboard()
    {
        // Pastikan hanya admin yang bisa masuk
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            abort(403);
        }

        $totalUsers = User::where('role', 'user')->count();

        $totalServices = Service::count();

        $totalOrders = Order::count();

        $pendingOrders = Order::where('status', 'Menunggu')->count();

        $processingOrders = Order::where('status', 'Diproses')->count();

        $completedOrders = Order::where('status', 'Selesai')->count();

        $latestOrders = Order::with(['user', 'service'])
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalUsers',
            'totalServices',
            'totalOrders',
            'pendingOrders',
            'processingOrders',
            'completedOrders',
            'latestOrders'
        ));
    }


    /**
     * Laporan Transaksi Admin
     */
    public function laporan(Request $request)
    {
        // Pastikan hanya admin yang bisa masuk
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            abort(403);
        }

        $query = Order::with(['user', 'service'])
            ->latest();

        // Filter berdasarkan status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Filter tanggal mulai
        if ($request->filled('tanggal_mulai')) {
            $query->whereDate(
                'created_at',
                '>=',
                $request->tanggal_mulai
            );
        }

        // Filter tanggal akhir
        if ($request->filled('tanggal_akhir')) {
            $query->whereDate(
                'created_at',
                '<=',
                $request->tanggal_akhir
            );
        }

        // Ambil transaksi sesuai filter
        $orders = $query->get();

        // Statistik berdasarkan hasil filter
        $totalTransactions = $orders->count();

        $totalRevenue = $orders->sum('total_price');

        $pendingOrders = $orders
            ->where('status', 'Menunggu')
            ->count();

        $processingOrders = $orders
            ->where('status', 'Diproses')
            ->count();

        $completedOrders = $orders
            ->where('status', 'Selesai')
            ->count();

        return view('admin.laporan', compact(
            'orders',
            'totalTransactions',
            'totalRevenue',
            'pendingOrders',
            'processingOrders',
            'completedOrders'
        ));
    }
}