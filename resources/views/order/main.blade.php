@extends('layouts.main')

@section('title', 'Order')

@section('content')
    <div class="container">
        <h1>Order</h1>
        <form action="{{route('order.store')}}" method="post">
            @csrf
            <div class="row"> 
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="col-5">
                    <div class="container">
                        <h3>Delivery information</h3>
                            <div class="container">
                                <ul class="list-group list-group-flush">

                                
                                    <p class="fw-bold">Personal information:</p>
                                    <li class="list-group-item">
                                        <div class="container">
                                            <p><b>First name:</b> {{$userAdress->user->firstname}}</p>
                                            <p><b>Last name:</b> {{$userAdress->user->lastname}}</p>
                                        </div>
                                    </li>

                                    <p class="fw-bold">Adress:</p>
                                    <li class="list-group-item">
                                        <div class="container">
                                            <p><b>Country:</b> {{$userAdress->country}}</p>
                                            <p><b>City:</b> {{$userAdress->city}}</p>
                                            <p><b>Street:</b> {{$userAdress->street}}</p>
                                        </div>
                                    </li>
                                    <input type="hidden" name="adress_id" value="{{$userAdress->id}}">

                                    <p class="fw-bold">Delivery information:</p>
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-6">
                                                <label for="delivery">Post</label>
                                                    <select name="delivery_id" class="form-select">
                                                    @foreach($delivery as $item)
                                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                                    @endforeach
                                                    </select>
                                            </div>

                                            <div class="col-6">
                                                <label for="postal_office">Post office</label>
                                                <input class="form-control" type="text" name="postal_office" placeholder="Enter number">
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                    </div>
                </div>
                <div class="col-7">
                    <h3>Products list</h3>
                    <table class="table">
                        <thead>
                            <tr>   
                                <th scope="col">Manufacture</th>
                                <th scope="col">Product</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Price</th> 
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($cart as $item)
                            <tr>
                                    <td>{{$item->product->manufacture}}</td>
                                    <td>{{$item->product->name}}</td>
                                    <td>{{$item->amount}}</td>
                                    <td>{{$item->total}}</td>
                            </tr>
                            <input type="hidden" name="cart_items[]" value="{{$item->id}}">
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="d-grid justify-content-md-end">
                <button class="btn btn-success" type="subbmit">Make Order</button>
            </div>
        </form>
    </div>
@endsection