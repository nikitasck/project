@extends('layouts.main')

@section('title', 'Cart')

@section('content')
    <div class="container">
        <div class="row g-0">
            <div class="col-9 col-md-11">
                <h1 class ="m-3">Products</h1>
            </div>
            <div class="col-2 col-md-1 align-self-center text-end">
                <a href="{{route('product.index')}}" class="btn btn-primary position-relative">
                        Back
                </a>
            </div>
        </div>
        @if(count($cart))
            @foreach($cart as $item)
                                                        <div class="row g-0 text-center fs-6">
                                                              <div class="col-3">
                                                                <div class="col fw-bold border-bottom border-dark">Product</div>
                                                                <div class="col p-1">{{$item->product->manufacture}} {{$item->product->name}}</div>
                                                              </div>
                                                              <div class="col-3">
                                                                <div class="col fw-bold border-bottom border-dark">Amount</div>
                                                                <div class="col-7 col-md-auto mx-auto p-2">{{$item->amount}}</div>
                                                              </div>
                                                              <div class="col-3">
                                                                <div class="col fw-bold border-bottom border-end border-dark">Total</div>
                                                                <div class="col border-end border-dark p-1">{{$item->total}}</div>
                                                              </div>
                                                              <div class="col-3 text-end">
                                                                <form action="{{route('cart.destroy', $item->id)}}" method="post">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-danger">
                                                                        Delete
                                                                    </button>
                                                                </form>
                                                              </div>
                                                        </div>                    
            @endforeach

            <div class="container p-0 text-end pt-3 pb-3">
                <a href="{{route('order.create')}}" class="btn btn-success flex-row-reverse">Make order</a>
            </div>

        @else
            <div class="container text-center">
                <h3>Cart is empty</h3>
            </div>
        @endif
    </div>
@endsection