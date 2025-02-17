<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperMasakan
 */
class Masakan extends Model
{
    use HasFactory;
    protected $table = 'masakans';

    protected $primaryKey = 'id_masakan';

    public $timestamps = false;

    protected $fillable = [
        'nama_masakan',
        'harga',
        'status_masakan',
        'gambar'
    ];
}
