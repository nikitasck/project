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
                    @yield('order')
                </div>
            </div>
            <div class="d-grid justify-content-md-end">
                <button class="btn btn-success" type="subbmit">Make Order</button>
            </div>
        </form>
    </div>

    <script src="/js/amount.js"></script>

    <script>
        var totalElements = document.getElementsByClassName("test");
        var total = 0;
        for(var i = 0; i < totalElements.length; i++) {
            total += parseFloat(totalElements[i].innerHTML);
        } 
        document.getElementById('totalLabel').innerHTML = total;
        document.getElementById('total').value = total;
    </script>

@endsection