<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'users_id',
        'status',
        'notes',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'users_id', 'id');
    }

    public function shop(){
        return $this->belongsTo(Shop::class, 'shops_id', 'id');
    }

    public function items(){
        return $this->hasMany(OrderItem::class, 'orders_id', 'id');
    }
}
