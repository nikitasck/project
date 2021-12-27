@extends('layouts.profile')

@section('coc')

    <div class="row border-bottom justify-content-between">
        <div class="col-10">
            <h2 class="">Personal information</h2>
        </div>
        <div class="col-1 align-self-center">
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