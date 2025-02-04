<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product_variant extends Model
{
    protected $fillable = ['name', 'size', 'color', 'material', 'banner_image', 'price', 'discount_price', 'stock', 'product_id', 'is_active'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
