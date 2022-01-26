@extends('layouts.profile')

@section('coc')
    <div class="row g-0 border-bottom justify-content-between p-2">
        <div class="col-9 col-md-10">
            <h2 class="">Orders</h2>
        </div>
    </div>

    <div class="table-responsive">
                    @if(count($orders) > 0)
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
                    @else
                        <p>You don't have orders yet.</p>
                    @endif
    </div>

    <div class="d-flex justify-content-center">
        {{ $orders->links() }}
    </div>

@endsection