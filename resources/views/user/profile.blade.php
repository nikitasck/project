@extends('layouts.main')

@section('title', 'profile')

@section('content')
    <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
        <h1>Welcome {{ $user->firstname }} {{$user->lastname}}</h1> 
        
    </div>
@endsection