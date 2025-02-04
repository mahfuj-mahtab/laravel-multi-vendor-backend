<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order_payment extends Model
{
    protected $fillable = ['order_id', 'amount', 'delivery_methods', 'credential', 'status'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
