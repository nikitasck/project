@extends('layouts.main')

@section('title', 'Products')
@section('content')
    <div class="container">
        <div class="row m-3">
            <div class="col-9">
                <h1>@if($choosenCategory){{$choosenCategory->category}} @else Products @endif</h1>
            </div>
            <div class="col-3">
                <button class="btn btn-secondary d-md-none text-light" type="button" data-bs-toggle="collapse" data-bs-target="#sideToggle" aria-controls="sideToggle" aria-expanded="false" aria-label="Toggle navigation">
                    Filter
                </button>
            </div>
        </div>



        <div class="row">
            <!-- Filter left side group -->
            <div class="collapse d-md-flex col-xs-12 col-md-2 border-3 border-secondary border-end" id="sideToggle">
                <div class="flex-shrink-0 p-3">

                    <span class="fw-bold" data-bs-toggle="collapse" data-bs-target="#categoryDropList" aria-controls="categoryDropList" aria-expanded="false" aria-label="Toggle navigation">Category</span>

                    <ul class="list-unstyled" id="categoryDropList">
                        @foreach($categories as $category)
                            <li class="nav-item">
                                <a href="/product?category={{$category->id}}" class="nav-link link-dark p-0 ps-4">{{$category->category}}</a>
                            </li>
                        @endforeach
                    </ul>

                    <form action="{{route('product.index')}}" method="get">
                        <input type="hidden" name="category" value="{{$choosenCategory}}">
                        <div>
                            <span class="fw-bold" data-bs-toggle="collapse" data-bs-target="#colorsDropList" aria-controls="colorsDropList" aria-expanded="false" aria-label="Toggle navigation">Colors</span>
                        </div>
                        <div class="collapse" id="colorsDropList">
                            @foreach($colors as $color)
                                <div class="form-check small ms-3" >
                                    <label class="form-check-label" for="colors">{{$color->color}}</label>

                                    <input class="form-check-input" type="checkbox" name="colors[]" value="{{$color->id}}" id="flexCheckDefault">
                                    @if($choosenColors)
                                        @foreach($choosenColors as $col)
                                                @if($color->id == $col)
                                                    <input class="form-check-input" type="checkbox" name="colors[]" value="{{$color->id}}" id="colors" checked>
                                                @endif
                                        @endforeach
                                    @endif
                                </div>
                            @endforeach
                        </div>

                        <div>
                            <span class="fw-bold" data-bs-toggle="collapse" data-bs-target="#storagesDropList" aria-controls="storagesDropList" aria-expanded="false" aria-label="Toggle navigation">Storage</span>
                        </div>
                        <div class="collapse" id="storagesDropList">
                            @foreach($storages as $storage)
                                <div class="form-check small ms-3">
                                    <label class="form-check-label" for="flexCheckDefault">{{$storage->storage_size}}</label>
                                    <input class="form-check-input" type="checkbox" name="storages[]" value="{{$storage->id}}" id="flexCheckDefault">

                                    @if($choosenStorages)
                                        @foreach($choosenStorages as $stor)
                                            @if($storage->id == $stor)
                                                <input class="form-check-input" type="checkbox" name="storages[]" value="{{$storage->id}}" id="flexCheckDefault" checked>
                                            @endif
                                        @endforeach
                                    @endif
                                </div>
                            @endforeach
                        </div>

                        <div>
                            <span class="fw-bold" data-bs-toggle="collapse" data-bs-target="#sizesDropList" aria-controls="sizesDropList" aria-expanded="false" aria-label="Toggle navigation">Size</span>
                        </div>
                        <div class="collapse" id="sizesDropList">
                            @foreach($sizes as $size)
                                <div class=" form-check small ms-3">
                                    <label class="form-check-label" for="flexCheckDefault">{{$size->size}}</label>
                                    <input class="form-check-input" type="checkbox" name="sizes" value="{{$size->id}}" id="flexCheckDefault">

                                    @if($choosenSizes)
                                        @foreach($choosenSizes as $siz)
                                            @if($size-id == $siz)
                                                <input class="form-check-input" type="checkbox" name="sizes" value="{{$size->id}}" id="flexCheckDefault" checked>
                                            @endif
                                        @endforeach
                                    @endif
                                </div>
                            @endforeach
                        </div>
                        <button type="submit" class="btn btn-primary">Search</button>
                    </form>
                </div>
            </div>
            <!-- Products card -->
            <div class="col-12 col-md-10 mt-3">
            <div class="album py-3 bg-light">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3 p-3">
                        @foreach($products as $product)
                        <div class="col">
                            <a href="{{route('product.show', $product->id)}}" class="text-decoration-none link-dark">
                                <div class="card">
                                    
                                    <img class="card-img-top" src="{{Storage::url($product->image->first()->src)}}" alt="Card image">

                                    <div class="card-body ">
                                        <p class="card-title fs-6">{{$product->manufacture}} {{$product->name}}</p>
                                        <p class="ms-1">{{$product->price}} $</p>
                            </a> 
                            
                                        <div class="row">
                                            <div class="col-xs-12 col-md-12 col-lg-8 g-0">
                                                <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#exampleModal{{$product->id}}">
                                                    Add to cart
                                                </button>
                                            </div>
                                            <div class="col-xs-12 col-md-12 col-lg-4 g-0">
                                                <form action="{{route('order.create')}}" method="GET">
                                                    <input type="hidden" name="product" value="{{$product->id}}">
                                                    <button type="submit" class="btn btn-success w-100">Buy</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
  
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

                                                        <div class="row g-0 text-center">
                                                              <div class="col-12 col-md-2">
                                                                <div class="col"></div>
                                                                <div class="col p-1"><img class="img-thumbnail" src="{{Storage::url($product->image->first()->src)}}" alt="Card image"></div>
                                                              </div>
                                                              <div class="col-6 col-md-3">
                                                                <div class="col fw-bold border-bottom border-dark">Manufacture</div>
                                                                <div class="col p-1">{{$product->manufacture}}</div>
                                                              </div>
                                                              <div class="col-6 col-md-2">
                                                                <div class="col fw-bold border-bottom border-dark">Product</div>
                                                                <div class="col p-1">{{$product->name}}</div>
                                                              </div>
                                                              <div class="col-6 col-md-3">
                                                                <div class="col fw-bold border-bottom border-dark">Amount</div>
                                                                <div class="col-7 col-md-auto mx-auto p-2">
                                                                  <div class="btn-group">
                                                                    <button type="button" id="amountDecrement" class="btn btn-light rounded-start">-</button>
                                                                    <input class="input-group text-center rounded-0" id="amount" type="text" name="amount" value="1">
                                                                    <button type="button" id="amountIncrement" class="btn btn-light rounded-end">+</button>
                                                                  </div>
                                                                </div>
                                                              </div>
                                                              <div class="col-6 col-md-2">
                                                                <div class="col fw-bold border-bottom border-dark">Price</div>
                                                                <div class="col p-1">
                                                                  <label for="total" id="productPriceLabel">{{$product->price}}</label>
                                                                  <input type="hidden" id="productPrice" name="total" value="{{$product->price}}">
                                                                </div>
                                                              </div>
                                                        </div>                    
                   
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back to the shop</button>
                                                    <button type="submit" class="btn btn-primary">Add to card</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    @endforeach
                </div>
            </div>
            </div>
        </div>
    </div>
    
    <div class="d-flex justify-content-center fixed-bottom">
        {{ $products->links() }}
    </div>

    <script>

    </script>
@endsection