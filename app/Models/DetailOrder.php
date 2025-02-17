<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperDetailOrder
 */
class DetailOrder extends Model
{
    use HasFactory;

    protected $table = 'detail_orders';
    protected $primaryKey = 'id_detail_order';
    public $timestamps = false;
    protected $fillable = [
        'quantity',
        'harga_satuan',
        'total_harga',
        'id_order',
        'id_masakan',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'id_order');
    }

    public function masakan()
    {
        return $this->belongsTo(Masakan::class, 'id_masakan');
    }
}
