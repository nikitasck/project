<?php

namespace App\Http\Controllers;

use App\Models\DeliveryInformation;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile.main', [
            'user' => User::find(Auth::id())
        ]);
    }

    public function personalInformation()
    {
        return view('profile.personalInformation.main',[
            'user' => User::find(Auth::id())
        ]);
    }

    public function deliveryInformation()
    {
        return view('profile.deliveryInformation.main', [
            'deliveryInformation' => DeliveryInformation::with(['user', 'delivery', 'adress'])->where('user_id', Auth::id())->first()
        ]);
    }

    public function orders()
    {
        return view('profile.orders.main', [
            'orders' => Order::where('user_id', Auth::id())->paginate(15)
        ]);
    }
}
