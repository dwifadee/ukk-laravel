<?php

namespace App\Http\Controllers;

use App\Models\DetailOrder;
use App\Models\Masakan;
use App\Models\Order;
use App\Models\Meja;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $user = Auth::user();
        // $order = Order::with('user')->where('id_user', $user->id);

        // return response()->json($order, 200);

        $orders = Order::with('detailOrders.masakan', 'transaction')->get();
        return view('order.success', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        // $masakans = Masakan::all();
        // return view('orders.create', compact('masakans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $items = json_decode($request->items, true);
        $request->merge(['items' => $items]);

        if (!is_array($items)) {
            return back()->withErrors(['items' => 'Format data tidak valid.']);
        }

        $validator =  Validator::make($request->all() , [
            'id_order' => 'nullable',
            'nama_pemesan' => 'nullable|string',
            'id_user' => 'nullable|exists:user,id_user',
            'id_meja' => 'nullable|exists:meja,id_meja',
            'items' => 'required|array',
            'items.*.id_masakan' => 'required|exists:masakans,id_masakan',
            'items.*.quantity' => 'required|integer|min:1',
        ]);

        $totalHarga = 0;
        foreach ($request->items as $item) {
            $masakan = Masakan::find($item['id_masakan']);
            if (!$masakan) {
                dd("Masakan ID {$item['id_masakan']} tidak ditemukan");
            }
            $totalHarga += $masakan->harga * $item['quantity'];
        }

        try {
        DB::transaction(function () use ($request, $totalHarga) {
            $order = Order::create([
                'id_order' => $request->id_order,
                'nama_pemesan' => $request->nama_pemesan,
                'id_user' => $request->id_user,
                'id_meja' => $request->id_meja,
                'total_harga' => $totalHarga,
                'status_pesanan' => 'tertunda',
            ]);

            Transaction::create([
                'id_order' => $request->id_order,
                'metode_pembayaran' => $request->metode_pembayaran,
                'status_pembayaran' => 'tertunda',
                'total_bayar' => $totalHarga,
            ]);

            foreach ($request->items as $item) {
                $masakan = Masakan::find($item['id_masakan']);
                if (!$masakan) {
                    throw new \Exception("Masakan ID {$item['id_masakan']} tidak ditemukan");
                }
                DetailOrder::create([
                    'id_order' => $request->id_order,
                    'id_masakan' => $masakan->id_masakan,
                    'quantity' => $item['quantity'],
                    'harga_satuan' => $masakan->harga,
                    'total_harga' => $masakan->harga * $item['quantity'],
                ]);
            }
        });

        return redirect()->route('order.success')->with('success', 'Pesanan berhasil dibuat!');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function confirmOrder($id)
    {
        $order = Order::findOrFail($id);
        $order->status_pesanan = 'proses';
        $order->save();

        $transaction = $order->transaction;
        if ($transaction) {
            $transaction->status_pembayaran = 'selesai';
            $transaction->save();
        }

        return redirect()->route('waiter')->with('success', 'Order has been confirmed.');
    }

    public function cancelOrder($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('kasir')->with('success', 'Order has been cancelled.');
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
