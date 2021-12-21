<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function orderProduct()
    {
        return $this->hasMany(OrderProduct::class, 'order_id', 'id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_products', 'order_id', 'product_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function adress()
    {
        return $this->belongsTo(Adress::class);
    }

    public function delivery()
    {
        return $this->belongsTo(Delivery::class);
    }

    public static function orderStatuses()
    {
        return [
            'processed',
            'confirmed',
            'shipped',
            'canceled',
            'at post office',
            'completed'
        ];
    }
}
