@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h2>{{ $user->name }}'s Profile</h2>
                <img src="/storage/avatars/{{ $user->avatar }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
                <h3>{{ $user->nickname }}</h3>
                <h3>{{ $user->name. ' '. $user->second_name }}</h3>
                <h3>{{ $user->phone_number }}</h3>
            </div>
        </div>
    </div>
@endsection