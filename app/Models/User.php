<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @mixin IdeHelperUser
 */
class User extends Authenticatable
{
    use HasFactory;

    protected $table = 'user';
    protected $primaryKey = 'id_user';
    public $timestamps = false;
    protected $dates = ['created_at'];

    protected $fillable = [
        'username',
        'password',
        'nama_user',
        'id_level'
    ];

    protected $hidden = [
        'password'
    ];

    public function level()
    {
        return $this->belongsTo(Level::class, 'id_level');
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
