<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DeliveryInformationController;
use App\Http\Controllers\ImgsController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Product\CategoriesController;
use App\Http\Controllers\Product\ColorController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Product\SizeController;
use App\Http\Controllers\Product\StorageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Symfony\Component\HttpKernel\Profiler\Profile;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index']);

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/ap', [AdminHomeController::class, 'index'])->name('homeAdmin');
    Route::get('/ap/products', [AdminHomeController::class, 'products'])->name('adminProducts');
    Route::get('/ap/orders', [AdminHomeController::class, 'orders'])->name('adminOrders');

    //add resouces like product etc
    Route::resources([
        'product' => ProductController::class,
        'img' => ImgsController::class,
        'category' => CategoriesController::class,
        'color' => ColorController::class,
        'storage' => StorageController::class,
        'size' => SizeController::class,
        'cart' => CartController::class,
        'deliveryinformation' => DeliveryInformationController::class,
        'order' => OrderController::class,
        'user' => UserController::class
    ]);
});

Route::get('/profile', [ProfileController::class, 'index'])->middleware(['auth']);
Route::get('/profile/personalInformation', [ProfileController::class, 'personalInformation'])->middleware('auth');
Route::get('/profile/deliveryInformation', [ProfileController::class, 'deliveryInformation'])->middleware(['auth']);
Route::get('/profile/orders', [ProfileController::class, 'orders'])->middleware(['auth']);

Route::get('/products', [ProductController::class, 'index'])->name('products');
Route::resources([
    'cart' => CartController::class,
    'order' => OrderController::class
]);




/*
Route::get('/dashboard', function () {
    return view('home.index');
})->middleware(['auth'])->name('home.index');
*/
require __DIR__.'/auth.php';
