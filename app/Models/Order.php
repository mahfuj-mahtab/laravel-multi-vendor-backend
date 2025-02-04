<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id', 'vendor_id', 'phone', 'address', 'order_price', 'tracking_info', 'notes', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    public function orderItems()
    {
        return $this->hasMany(Order_item::class);
    }

    public function orderPayment()
    {
        return $this->hasOne(Order_payment::class);
    }
}
