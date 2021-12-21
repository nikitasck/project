@extends('layouts.main')

@section('title', 'Products')
@section('content')

<div class="container">
    <!-- Portfolio Item Heading -->
    <h2 class="m-3">{{$product->manufacture}} {{$product->name}}</h2>
      <p class="ms-3">
        <a href="{{route('product.index')}}" class="text-secondary text-decoration-none">Products</a> 
        > 
        <a href="/product?category={{$product->category->id}}" class="text-secondary text-decoration-none">{{$product->category->category}}</a> 
        >
        <a href="/product?category={{$product->category->id}}/&manufacture={{$product->manufacture}}" class="text-secondary text-decoration-none">{{$product->manufacture}}</a>
      </p>

    <!-- Portfolio Item Row -->
    <div class="row">
  
      <div class="col-md-6">
          <div class="img ratio ratio-1x1">
            <img class="card-img-top" src="{{Storage::url($product->image->first()->src)}}" alt="Card image">
          </div>
      </div>

      <div class="col-md-6 bg-light p-3">
        <ul class="text-decoration-none list-unstyled">
          <li>
            Specification:<br>
              <p class="ps-3">{{$product->description}}</p>
          </li>

          @if($product->colors->count())
          <li>
            Color:<br>
              <select name="" id="">
                @foreach($product->colors as $color)
                  <option value="">{{$color->color}}</option>
                @endforeach
              </select>
          </li>
          @endif

          @if($product->storages->count())
          <li>
            Storage:<br>
              <select name="" id="">
                @foreach($product->storages as $storage)
                  <option value="">{{$storage->storage_size}}</option>
                @endforeach
              </select>
          </li>
          @endif

          @if($product->sizes->count())
          <li>
            Size:<br>
              <select name="" id="">
                @foreach($product->sizes as $size)
                  <option value="">{{$size->size}}</option>
                @endforeach
              </select>
          </li>
          @endif
          <li>
            Price:<br>
            <p class="ps-3">{{$product->price}} $</p>
          </li>
        </ul>

            <p></p>

            <div class="row g-0 justify-content-end align-items-end">
              <div class="col-3">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{$product->id}}">
                  Add to cart
                </button>
              </div>
              <div class="col-2">
                <form action="{{route('order.create')}}" method="GET">
                  <input type="hidden" name="product" value="{{$product->id}}">
                  <button type="submit" class="btn btn-success">Buy</button>
                </form>
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
                                                                    <td><img class="" src="{{Storage::url($product->image->first()->src)}}" alt="Card image"></td>
                                                                    <th scope="row">{{$product->manufacture}}</th>
                                                                    <td>{{$product->manufacture}}</td>
                                                                    <td>
                                                                        <div class="btn-group">
                                                                            <button type="button" id="amountDecrement" class="btn btn-light rounded-start">-</button>
                                                                            <input class="w-50 text-center rounded-0" id="amount" type="text" name="amount" value="1">
                                                                            <button type="button" id="amountIncrement" class="btn btn-light rounded-end">+</button>
                                                                        </div>
                                                                    </td>
                                                                    <td >
                                                                    <label for="total" id="productPriceLabel">{{$product->price}}</label>
                                                                    <input type="hidden" id="productPrice" name="total" value="{{$product->price}}">
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>                       
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back to the shop</button>
                                                    <button type="submit" class="btn btn-primary">Add to card</button>
                                                </div>
                                                </div>
                                                </form>
                                            </div>
      </div>

</div>


@endsection