<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperOrder
 */
class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $primaryKey = 'id_order';
    public $incrementing = false;
    protected $keyType = 'integer';

    protected $fillable = [
        'id_order',
        'total_harga',
        'nama_pemesan',
        'status_pesanan',
        'id_user',
        'id_meja',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
    public function meja()
    {
        return $this->belongsTo(Meja::class, 'id_meja');
    }

    public function detailOrders()
    {
        return $this->hasMany(DetailOrder::class, 'id_order');
    }

    public function transaction()
    {
        return $this->hasOne(Transaction::class, 'id_order');
    }
}
