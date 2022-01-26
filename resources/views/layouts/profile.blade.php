@extends('layouts.main')

@section('title', 'profile')

@section('content')

<div class="container">
    <div class="row border-bottom p-1 mb-3">
        <h3 class="col-10">My profile</h3>
        <button class="d-md-none col-2" type="button" data-bs-toggle="collapse" data-bs-target="#profileDropDownMemu" aria-controls="profileDropDownMemu" aria-expanded="false" aria-label="Toggle navigation">
            Menu
        </button>
    </div>

    <div class="row m-1">
        <div class="collapse d-md-flex col-md-4 col-xl-3 col-xxl-2" id="profileDropDownMemu">
            <div class="list-group-flush">
                <a href="/profile/personalInformation" class="list-group-item list-group-item-action">Personal information</a>
                <a href="/profile/deliveryInformation" class="list-group-item list-group-item-action">Delivery information</a>
                <a href="/profile/orders" class="list-group-item list-group-item-action">Orders</a>
                <a href="" class="list-group-item list-group-item-action">Reviews</a>
                <a href="" class="list-group-item list-group-item-action">Wishlist</a>
            </div>
        </div>
        <div class="col-md-8 col-xl-9 col-xxl-10 border rounded">
            @yield('coc')
        </div>
    </div>
</div>


@endsection