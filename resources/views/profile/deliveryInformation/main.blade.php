@extends('layouts.profile')

@section('coc')

    <div class="row g-0 border-bottom justify-content-between p-2">
        <div class="col-10 col-xs-10 col-md-10 col-lg-11">
            <h2 class="">Delivery information</h2>
        </div>
    @if($deliveryInformation)
        <div class="col-2 col-xs-2 col-md-2 col-lg-1 align-self-center text-end">
            <a href="{{ route('deliveryinformation.edit' , $deliveryInformation->id)}}" class="btn btn-danger">Edit</a>
        </div>
    </div>

    <div class="container p-2 m-2">

    
    <h5 class="text-decoration-underline">Adress</h5>
    <ul class="list-unstyled ps-3">
        <li>
            <b>Country:</b> {{$deliveryInformation->adress->country}}
        </li>
        <li>
            <b>City:</b> {{$deliveryInformation->adress->city}}
        </li>
        <li>
            <b>Street:</b> {{$deliveryInformation->adress->street}}
        </li>
        <li>
            <b>House number:</b> {{$deliveryInformation->adress->house_number}}
        </li>
    </ul>

    <h5 class="text-decoration-underline">Delivery</h5>
    <ul class="list-unstyled ps-3">
        <li>
            <b>Company:</b> {{$deliveryInformation->delivery->name}}
        </li>
        <li>
            <b>Postal Office:</b> {{$deliveryInformation->postal_office}} 
        </li>
    </ul>
    </div>
    @else
        <div class="col-2 col-xs-2 col-md-2 col-lg-1 align-self-center text-end">
            <a class="btn btn-success" href="">Fill</a>
        </div>
    </div>
        <div class="text-center m-3">
            <p>You don't have deliveryinformation.Do you want <a href="" class="text-success">fill</a> it?</p>
        </div>
    @endif
@endsection