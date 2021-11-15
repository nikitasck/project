<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function orderProducts()
    {
        $this->belongsToMany(OrderProducts::class, 'order_id', 'id');
    }
}
