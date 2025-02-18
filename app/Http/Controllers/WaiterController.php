<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class WaiterController extends Controller
{
    public function index()
    {
        // Mengambil semua pesanan yang statusnya 'proses'
        $orders = Order::where('status_pesanan', 'proses')->get();
        return view('pages.waiter.index', compact('orders'));
    }

    public function updateStatus(Order $order)
    {
        $order->status_pesanan = 'selesai';
        $order->save();

        return redirect()->route('waiter')->with('success', 'Pesanan telah selesai');
    }
}
