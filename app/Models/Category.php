<?php


use App\Models\Product;
use App\Models\Sub_category;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'description', 'logo', 'status'];
    public function subCategories()
    {
        return $this->hasMany(Sub_category::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

}
