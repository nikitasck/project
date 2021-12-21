<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::all()->count();
        $categories = Categories::all()->count();

        return view('admin.home.index', [
            'product_count' => $products,
            'category_count' => $categories
        ]);
    }

    public function products()
    {
        $product = Product::with('image')->orderBy('created_at', 'ASC')->paginate(4);
        return view('admin.product.index',[
            'products' => $product,
        ]);
    }

    public function orders()
    {
        $orders = Order::with(['user', 'adress', 'delivery', 'products'])->orderBy('created_at', 'ASC')->paginate(10);
        return view('admin.order.index',[
            'orders' => $orders,
            'status' => Order::orderStatuses()
        ]);
    }
}
