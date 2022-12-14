<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductCategory extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'shops_id',
        'name'
    ];

    public function products(){
        return $this->hasMany(Product::class, 'categories_id', 'id');
    }

    public function shop(){
        return $this->belongsTo(Shop::class, 'shops_id', 'id');
    }
}
