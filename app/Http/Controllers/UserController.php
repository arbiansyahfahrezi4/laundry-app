<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function dashboard()
    {
        $orders = Order::with('service')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        $activeOrders = $orders
            ->whereNotIn('status', ['Selesai', 'Dibatalkan'])
            ->count();

        $totalWeight = $orders->sum('weight');

        $totalTransaction = $orders->sum('total_price');

        $latestOrder = $orders->first();

        return view('user.dashboard', [
            'orders' => $orders,
            'activeOrders' => $activeOrders,
            'totalWeight' => $totalWeight,
            'totalTransaction' => $totalTransaction,
            'latestOrder' => $latestOrder,
        ]);
    }
}