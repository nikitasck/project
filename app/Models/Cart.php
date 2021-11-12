<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Cart extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->hasOne(User::class,'id', 'user_id');
    }

    public function product()
    {
        return $this->hasOne(Product::class,'id', 'product_id');
    }

    public static function getUserCart()
    {
        if($cart = Cart::where('user_id', Auth::id())->get()){
            return $cart;
        } else {
            return false;
        }
    }

    public static function getUserCartCount()
    {
        if($count = Cart::where('user_id', Auth::id())->count()){
            return $count;
        } else {
            return false;
        }
    }

    public static function checkUserCart()
    {
        if(Cart::where('user_id', Auth::id())->first()){
            return true;
        } else {
            return false;
        }
    }
}
