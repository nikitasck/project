@extends('layouts.main')

@section('title', 'Cart')

@section('content')
    <div class="container">
    <div class="row">
            <div class="col-11">
                <h1 class ="m-3">Products</h1>
            </div>
            <div class="col-1 align-self-center">
                <a href="{{route('product.index')}}" class="btn btn-primary position-relative">
                        Back
                </a>
            </div>
        </div>
        @if(count($cart))
            <table class="table">
                <thead>
                    <tr>   
                        <th scope="col">Manufacture</th>
                        <th scope="col">Product</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Price</th> 
                        <th scope="col"></th> 
                    </tr>
                </thead>
                <tbody>
                @foreach($cart as $item)
                    <tr>

                            <td>{{$item->product->manufacture}}</td>
                            <td>{{$item->product->name}}</td>
                            <td>{{$item->amount}}</td>
                            <td>{{$item->total}}</td>
                            <td class="text-end">
                                <form action="{{route('cart.destroy', $item->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        Delete
                                    </button>
                                </form>
                            </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="container p-0 text-end">
                <a href="{{route('order.create')}}" class="btn btn-success flex-row-reverse">Make order</a>
            </div>

        @else
            <div class="container text-center">
                <h3>Cart is empty</h3>
            </div>
        @endif
    </div>
@endsection