<?php

namespace App\Http\Controllers;
use App\Models\Order;

use Illuminate\Http\Request;

class KasirController extends Controller
{
    public function index()
    {
        $orders = Order::with('meja')->get();
        return view('pages.kasir.index', compact('orders'));
    }

}
