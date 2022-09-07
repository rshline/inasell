<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductVariantOption extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'product_variants_id',
        'name',
    ];

    public function public(){
        return $this->belongsTo(ProductVariant::class, 'product_variants_id', 'id');
    }
}
