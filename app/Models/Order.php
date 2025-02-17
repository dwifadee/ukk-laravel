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

    protected $fillable = [
        'id_order',
        'tanggal',
        'id_user',
        'id_meja',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }
    public function meja()
    {
        return $this->belongsTo(Meja::class, 'id_meja', 'id_meja');
    }
}
