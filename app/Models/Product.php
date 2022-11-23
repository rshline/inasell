<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'qty',
        'desc',
        'categories_id',
        'shops_id',
    ];

    public function galleries(){
        return $this->hasMany(ProductGallery::class, 'products_id', 'id');
    }

    public function variants(){
        return $this->hasMany(ProductVariant::class, 'products_id', 'id');
    }

    public function orderitems(){
        return $this->hasMany(OrderItem::class, 'order_items_id', 'id');
    }

    public function productcategory(){
        return $this->belongsTo(ProductCategory::class, 'categories_id', 'id');
    }

    public function shop(){
        return $this->belongsTo(Shop::class, 'shops_id', 'id');
    }
}
