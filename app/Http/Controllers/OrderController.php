<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Meja;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $order = Order::with('user')->where('id_user', $user->id);

        return response()->json($order, 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $validated = $request->validate([
            'tanggal' => 'required|string|max:255',
            'id_user' => 'required|exists:user,id',
            'keterangan' => 'required|string|min:6',
            'status_order' => 'required|string',
            'id_meja' => 'required|string|min:6',
        ]);

        $order = Order::create($validated);

        return response()->json($order, 201);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data yang dikirim
        $validated = $request->validate([
            'id_user' => 'required|exists:user,id_user',
            'no_meja' => 'required|exists|meja,no_meja',
        ]);

        // Membuat order baru berdasarkan data yang diterima
        $order = Order::create([
            'no_meja' => $validated['no_meja'],
            'tanggal' => now(),
            'id_user' => $validated['id_user'],
        ]);

        return redirect()->route('orders.index')->with('success', 'Order berhasil disubmit!');
    }



    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
