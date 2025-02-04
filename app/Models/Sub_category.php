<?php

namespace App\Models;

use Category;
use Illuminate\Database\Eloquent\Model;

class Sub_category extends Model
{
    protected $fillable = ['name', 'description', 'category_id', 'logo', 'status'];
    public function category(){
        return $this->belongsTo(Category::class);
    }

}
