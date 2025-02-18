@extends('layout.app')

@section('title', 'Waiter')

@section('breadcrumb', 'Waiter')

@section('content')
<div class="container py-2">
    <div class="row g-3">
        @foreach ($orders as $order)
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-1">
                        <div class="d-flex align-items-center">
                            <div class="bg-secondary text-white rounded p-3 me-2">
                                {{ $order->meja ? $order->meja->no_meja : '-' }}
                            </div>
                            <div>
                                <h6 class="mb-0 text-uppercase">{{ $order->nama_pemesan }}</h6>
                                <small class="text-muted">#{{ $order->id_order }}</small>
                            </div>
                        </div>
                        <span class="badge bg-primary">{{ $order->status_pesanan }}</span>
                    </div>

                    <div class="small text-muted mb-2">
                        {{ \Carbon\Carbon::parse($order->created_at)->translatedFormat('l, d F Y H:i:s') }}
                    </div>

                    <div class="table-responsive" style="max-height: 220px; min-height: 220px;">
                        <table class="table table-sm mh-10" style="width: 100%; table-layout: fixed;">
                            <thead style="display: table; width: 100%; table-layout: fixed;">
                                <tr>
                                    <th>Items</th>
                                    <th class="text-center">Qty</th>
                                    <th class="text-end">Price</th>
                                </tr>
                            </thead>
                            <tbody style="display: block; max-height: 170px; overflow-y: auto; width: 100%; table-layout: fixed;">
                                @foreach ($order->detailorders as $detail)
                                    <tr style="display: table; width: 100%; table-layout: fixed;">
                                        <td>{{ $detail->masakan->nama_masakan }}</td>
                                        <td class="text-center">{{ $detail->quantity }}</td>
                                        <td class="text-end">{{ number_format($detail->total_harga, 0, ',', '.') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex justify-content-between mb-0 mt-2 mx-1">
                        <p>Total</p>
                        <p class="text-end">{{ number_format($order->total_harga, 0, ',', '.') }}</p>
                    </div>

                        <form action="{{ route('order.updateStatus', $order->id_order) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-primary w-100">Pesanan Selesai</button>
                        </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
