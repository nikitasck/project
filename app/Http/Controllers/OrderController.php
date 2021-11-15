<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrder;
use App\Models\Adress;
use App\Models\Cart;
use App\Models\Delivery;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\OrderProducts;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::find(Auth::id());
        $userAdress = Adress::with(['user'])->where('user_id', Auth::id())->first();
        $delivery = Delivery::get();
        $cart = Cart::getUserCart();

        return view('order.main', [
            'user' => $user,
            'cart' => $cart,
            'userAdress' => $userAdress,
            'delivery' => $delivery
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrder $request)
    {
        $order = new Order();
        $filtered = $request->validated();
        
        $order->user_id = Auth::id();
        $order->adress_id = $filtered['adress_id'];
        $order->delivery_id = $filtered['delivery_id'];
        $order->status = 'processed';
        $order->total = 1;
        if($order->save()){
            foreach($filtered['cart_items'] as $item){
                $cart = Cart::find($item);
                $orderProduct = new OrderProduct();
                $orderProduct->product_id = $cart->product_id;
                $orderProduct->order_id = $order->id;
                $orderProduct->amount = $cart->amount;
                $orderProduct->total = $cart->total;
                if($orderProduct->save()){
                    $cart->delete();
                }
            }
        }

        return redirect(route('product.index'))->with('success', 'Congrat:)');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
