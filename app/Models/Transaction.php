<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_order',
        'metode_pembayaran',
        'status_pembayaran',
        'total_bayar',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'id_order');
    }
}