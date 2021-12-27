@extends('layouts.main')

@section('title', 'profile')

@section('content')

<div class="container">
    <div class="border-bottom p-1 mb-3">
        <h3>My profile</h3>
    </div>

    <div class="row m-1">
        <div class="col-4">
            <div class="list-group-flush">
                <a href="/profile/personalInformation" class="list-group-item list-group-item-action">Personal information</a>
                <a href="/profile/deliveryInformation" class="list-group-item list-group-item-action">Delivery information</a>
                <a href="/profile/orders" class="list-group-item list-group-item-action">Orders</a>
                <a href="" class="list-group-item list-group-item-action">Reviews</a>
                <a href="" class="list-group-item list-group-item-action">Wishlist</a>
            </div>
        </div>
        <div class="col-8 border rounded">
            @yield('coc')
        </div>
    </div>
</div>


@endsection