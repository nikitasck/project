<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    //getting order items for order.
    public function orderItems()
    {
        //Возможно дописать, наверное сводную таблицу указать надо.
        return $this->belongsToMany(Product::class, 'order_products', 'order_id', 'product_id')->withPivot('amount', 'total');
    }
}
