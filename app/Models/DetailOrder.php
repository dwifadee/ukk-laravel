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
    protected $fillable = [
        'id_order',
        'id_masakan',
        'keterangan',
        'status_detail_order',
    ];
}
