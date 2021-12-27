@extends('layouts.profile')

@section('coc')
    <div class="row border-bottom justify-content-between">
        <div class="col">
            <h2 class="">Orders</h2>
        </div>
    </div>

    <div class="">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>   
                                <th scope="col">№</th>
                                <th scope="col">Adress</th>
                                <th scope="col">Ordered</th>
                                <th scope="col">Total</th> 
                                <th scope="col">Status</th> 
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
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

    <div class="d-flex justify-content-center">
        {{ $orders->links() }}
    </div>

@endsection