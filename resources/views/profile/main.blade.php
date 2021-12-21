@extends('layouts.profile')

@section('coc')
    <p>Welcome <b>{{$user->firstname}} {{$user->lastname}}</b></p>
    <p>Here you can change your personal information, track orders and more.</p>
@endsection