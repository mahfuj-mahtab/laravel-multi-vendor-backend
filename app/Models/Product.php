<?php

namespace App\Models;
use App\Models\Category;
use App\Models\Product_variant;
use App\Models\Vendor;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'description', 'banner_image', 'price', 'discount_price', 'stock', 'vendor_id', 'category_id', 'is_active', 'has_variation'];

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function productVariants()
    {
        return $this->hasMany(Product_variant::class);
    }

    // public function orderItems()
    // {
    //     return $this->hasMany(Order_item::class);
    // }
}
