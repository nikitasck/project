@extends('layouts.main')

@section('title', 'Products')
@section('content')
    <div class="container">
        <h1 class ="m-3">Products</h1>
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
        <div class="row">
            <!-- Filter left side group -->
            <div class="col-2 border-3 border-secondary border-end">
                <div class="flex-shrink-0 p-3">
                    <form action="{{route('product.index')}}" method="get">
                    <input type="hidden" name="category" value="{{$choosenCategory}}">
                    <span>Colors</span>
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

                    <span>Storage</span>
                    @foreach($storages as $storage)
                        <div class="form-check small ms-3">
                            <label class="form-check-label" for="flexCheckDefault">{{$storage->storage_size}}</label>
                            <input class="form-check-input" type="checkbox" name="storages" value="{{$storage->id}}" id="flexCheckDefault">
                        </div>
                    @endforeach

                    <span>Size</span>
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
                            <a href="{{route('product.show', $product->id)}}">
                                <div class="card">
                                    
                                    <img class="card-img-top" src="{{Storage::url($image->src)}}" alt="Card image">

                                    <div class="card-body ">
                                        <p class="card-title fs-6">{{$product->manufacture}} {{$product->name}}</p>
                                        <a href="#" class="btn btn-primary">Buy</a>
                                        <a href="#" class="btn btn-primary">Add to cart</a>
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