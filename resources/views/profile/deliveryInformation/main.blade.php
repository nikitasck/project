@extends('layouts.profile')

@section('coc')

    <div class="row border-bottom justify-content-between">
        <div class="col-10">
            <h2 class="">Delivery information</h2>
        </div>
        <div class="col-1 align-self-center">
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

@endsection