<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'delivery_information_id', 
        'status', 
        'total'
    ];

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

    public function deliveryInformation()
    {
        return $this->belongsTo(DeliveryInformation::class);
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
