@extends('layouts.main')

@section('title', 'Products')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-11">
                <h1 class ="m-3">Products</h1>
            </div>
            <div class="col-1 align-self-center">
                <a href="{{route('cart.index')}}" class="btn position-relative">
                        <img class="w-50" src="{{Storage::url('public/staff/cart.png')}}" alt="Cart">
                        @if($cart)
                        <span class="position-absolute top-0 start-80 translate-middle badge rounded-pill bg-danger">
                            
                                {{$cart}}
                        </span>
                        @endif
                </a>
            </div>
        </div>

        <!-- Category nav group -->
            <ul class="nav nav-pills nav-justified bg-secondary">
                @foreach($categories as $category)
                    @if($choosenCategory == $category->id)
                        <li class="nav-item"><a href="/product?category={{$category->id}}" class="nav-link link-warning rounded text-decoration-none">{{$category->category}}</a></li>
                    @else
                        <li class="nav-item"><a href="/product?category={{$category->id}}" class="nav-link link-light rounded text-decoration-none">{{$category->category}}</a></li>
                    @endif
                @endforeach
            </ul>
            @if (session('success')) 
            <div class="alert alert-success" role="alert">
                <button type="button" role="close" data-dismiss="alert" aria-hidden="true"></button>
                <h4><i class="icon fa fa-check"></i>{{ session('success') }}</h4>
            </div>
            @endif
        <div class="row">
            <!-- Filter left side group -->
            <div class="col-2 border-3 border-secondary border-end">
                <div class="flex-shrink-0 p-3">
                    <form action="{{route('product.index')}}" method="get">
                    <input type="hidden" name="category" value="{{$choosenCategory}}">
                    <span class="fw-bold">Colors</span>
                    @foreach($colors as $color)
                        <div class="form-check small ms-3">
                            <label class="form-check-label" for="flexCheckDefault">{{$color->color}}</label>
                            @if($choosenColors)
                            @foreach($choosenColors as $col)
                                    @if($color->id == $col)
                                        <input class="form-check-input" type="checkbox" name="colors[]" value="{{$color->id}}" id="flexCheckDefault" checked>
                                    @else
                                        <input class="form-check-input" type="checkbox" name="colors[]" value="{{$color->id}}" id="flexCheckDefault">
                                    @endif
                            @endforeach
                            @else
                                <input class="form-check-input" type="checkbox" name="colors[]" value="{{$color->id}}" id="flexCheckDefault">
                            @endif
                        </div>
                    @endforeach

                    <span class="fw-bold">Storage</span>
                    @foreach($storages as $storage)
                        <div class="form-check small ms-3">
                            <label class="form-check-label" for="flexCheckDefault">{{$storage->storage_size}}</label>
                            <input class="form-check-input" type="checkbox" name="storages" value="{{$storage->id}}" id="flexCheckDefault">
                        </div>
                    @endforeach

                    <span class="fw-bold">Size</span>
                    @foreach($sizes as $size)
                        <div class="form-check small ms-3">
                            <label class="form-check-label" for="flexCheckDefault">{{$size->size}}</label>
                            <input class="form-check-input" type="checkbox" name="sizes" value="{{$size->id}}" id="flexCheckDefault">
                        </div>
                    @endforeach

                        <button type="submit" class="btn btn-primary">Search</button>
                    </form>
                </div>
            </div>
            <!-- Products card -->
            <div class="col-10 mt-3">
            <div class="album py-5 bg-light">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3 p-3">
                        @foreach($products as $product)
                        @foreach($product->image as $image)
                        <div class="col">
                            <a href="{{route('product.show', $product->id)}}" class="text-decoration-none link-dark">
                                <div class="card">
                                    
                                    <img class="card-img-top" src="{{Storage::url($image->src)}}" alt="Card image">

                                    <div class="card-body ">
                                        <p class="card-title fs-6">{{$product->manufacture}} {{$product->name}}</p>
                                        <p class="ms-1">{{$product->price}} $</p>
                                        <a href="#" class="btn btn-primary">Buy</a>

                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{$product->id}}">
                                        cart
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal" id="exampleModal{{$product->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Add {{$product->manufacture}} {{$product->name}} to card</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{route('cart.store')}}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="product" value="{{$product->id}}">
                                                        <table class="table">
                                                            <thead>
                                                                <tr> 
                                                                    <th scope="col"></th>    
                                                                    <th scope="col">Manufacture</th>
                                                                    <th scope="col">Product</th>
                                                                    <th scope="col">Amount</th>
                                                                    <th scope="col">Price</th> 
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td><img class="" src="{{Storage::url($image->src)}}" alt="Card image"></td>
                                                                    <th scope="row">{{$product->manufacture}}</th>
                                                                    <td>{{$product->manufacture}}</td>
                                                                    <td><input class="w-50" type="text" name="amount" value="1"></td>
                                                                    <td>{{$product->price}}</td>
                                                                    <input type="hidden" name="total" value="{{$product->price}}">
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Discard</button>
                                                    <button type="submit" class="btn btn-primary">Add to card</button>
                                                </div>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    @endforeach
                </div>
            </div>
            </div>
        </div>
    </div>
    
    <div class="d-flex justify-content-center fixed-bottom">
        {{ $products->links() }}
    </div>
@endsection