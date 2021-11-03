@extends('layouts.main')

@section('title', 'Products')
@section('content')

<div class="container">
    <!-- Portfolio Item Heading -->
    <h3>{{$product->manufacture}} {{$product->name}}</h3>

    <!-- Portfolio Item Row -->
    <div class="row">
  
      <div class="col-md-6">
          <div class="img ratio ratio-1x1">
            <img class="card-img-top" src="{{Storage::url($image)}}" alt="Card image">
          </div>

      </div>

      <div class="col-md-6 bg-light">
            <p>{{$product->description}}</p>
            <p>{{$product->price}}</p>

            <a class="btn btn-success" href="">buy</a>
            <a class="btn btn-primary" href="">add to card</a>
      </div>

</div>


@endsection