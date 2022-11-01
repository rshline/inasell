<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'products_id',
        'orders_id',
        'qty',
    ];

    public function product(){
        return $this->hasOne(Product::class, 'id', 'products_id');
    }
}
