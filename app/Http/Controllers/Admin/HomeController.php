<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
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
        $product = Product::orderBy('created_at', 'ASC')->paginate(10);
        return view('admin.product.index',[
            'products' => $product
        ]);
    }
}
