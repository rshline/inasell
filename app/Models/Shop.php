<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shop extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'invitation_id',
        'address',
        'phone',
    ];

    public function shoplists()
    {
        return $this->hasMany(ShopList::class, 'shops_id', 'id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'shops_id', 'id');
    }
}
