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
    // public function create(Request $request)
    // {
    //     $validated = $request->validate([
    //         'tanggal' => 'required|string|max:255',
    //         'id_user' => 'required|exists:user,id',
    //         'keterangan' => 'required|string|min:6',
    //         'status_order' => 'required|string',
    //         'id_meja' => 'required|string|min:6',
    //     ]);

    //     $order = Order::create($validated);

    //     return response()->json($order, 201);
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data yang dikirim
        // $validated = $request->validate([
        //     'id_user' => 'required|exists:users,id',
        //     'no_meja' => 'required|exists:meja,no_meja',
        // ]);
        // Ambil ID Meja dari nomor meja
        // $meja = Meja::where('no_meja', $validated['no_meja'])->first();
        // if (!$meja) {
        //     return redirect()->back()->withErrors(['no_meja' => 'Meja tidak ditemukan']);
        // }
        //  Simpan data ke orders
        // $order = Order::create([
        //     'id_user' => $validated['id_user'],
        //     'id_meja' => $meja->id_meja,
        //     'tanggal' => now(),
        // ]);    
        // return redirect()->route('orders.index')->with('success', 'Order berhasil disubmit!');

            $request->validate([
                'id_order' => 'required|unique:orders,id_order',
                'id_meja' => 'required|exists:meja,id_meja',
                'id_user' => 'required|exists:user,id_user',
            ]);

            Order::create($request->all());

            return redirect()->route('orders.index')->with('success', 'Pesanan berhasil dibuat!');
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
