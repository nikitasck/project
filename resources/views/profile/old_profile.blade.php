@extends('layouts.main')

@section('title', 'profile')

@section('content')
    <div class="container p-3 bg-light">
        <h1>Welcome {{ $user->firstname }} {{$user->lastname}}</h1> 
        <div class="row">
            <div class="col-4">
                <h3>Profile</h3>
                <div class="row">
                    <h4>Delivery information</h4>
                    <p>First name: {{$user->deliveryInformation->user->firstname}}</p>
                    <p>Last name: {{$user->deliveryInformation->user->lastname}}</p>
                    <p>Adress: 
                        {{$user->deliveryInformation->adress->city}}
                        {{$user->deliveryInformation->adress->country}}
                        {{$user->deliveryInformation->adress->street}}
                        {{$user->deliveryInformation->adress->house_number}}
                    </p>
                    <p>Delivery name: {{$user->deliveryInformation->delivery->name}}</p>
                    <p>Postal office: {{$user->deliveryInformation->postal_office}}</p>
                </div>
            </div>
            <div class="col-8">
                <h3>Orders</h3>

                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>   
                                <th scope="col">Order number</th>
                                <th scope="col">Adress</th>
                                <th scope="col">Ordered</th>
                                <th scope="col">Total</th> 
                                <th scope="col">Status</th> 
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($user->orders as $order)
                            <tr>

                                    <td>{{$order->id}}</td>
                                    <td>
                                        {{$order->adress->country}},
                                        {{$order->adress->city}},
                                        {{$order->adress->street}},
                                        {{$order->adress->house_number}}
                                    </td>
                                    <td>{{$order->created_at}}</td>
                                    <td>{{$order->total}}</td>
                                    <td>{{$order->status}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
@endsection