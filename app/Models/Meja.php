<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meja extends Model
{
    protected $table = 'meja';

    protected $primaryKey = 'id_meja';

    public $timestamps = false;

    protected $fillable = [
        'no_meja'
    ];
}
