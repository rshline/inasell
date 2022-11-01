<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopList extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id',
        'shops_id',
        'isOwner',
        'status',
    ];

    public function shop()
    {
        return $this->belongsTo(Shop::class, 'shops_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
}
