@extends('layouts.profile')

@section('coc')

    <div class="row g-0 border-bottom justify-content-between p-2">
        <div class="col-10 col-xs-10 col-md-10 col-lg-11">
            <h2 class="">Personal information</h2>
        </div>
        <div class="col-2 col-xs-2 col-md-2 col-lg-1 align-self-center text-end">
            <a href="{{ route('user.edit' , $user->id)}}" class="btn btn-danger">Edit</a>
        </div>
    </div>

    <div class="container p-2 m-2">

    <ul class="list-unstyled ps-3">
        <li>
            <b>Firstname:</b> {{$user->firstname}}
        </li>
        <li>
            <b>Lastname:</b> {{$user->lastname}}
        </li>
        <li>
            <b>email:</b> {{$user->email}}
        </li>
    </ul>

    </div>

@endsection