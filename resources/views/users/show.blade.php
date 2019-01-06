@extends('layouts.app')

@section('content')

    <div class="card-header">{{ __('User') }}: {{ $user->screen_name }}</div>

    <div class="card-body">

        <div class="row my-2">
            <div class="col-md-4 text-md-right">First Name:</div>
            <div class="col-md-6">{{ $user->first_name }}</div>
        </div>
        <div class="row my-2">
            <div class="col-md-4 text-md-right">Last Name:</div>
            <div class="col-md-6">{{ $user->last_name }}</div>
        </div>
        <div class="row my-2">
            <div class="col-md-4 text-md-right">Screen Name:</div>
            <div class="col-md-6">{{ $user->screen_name }}</div>
        </div>
        <div class="row my-2">
            <div class="col-md-4 text-md-right">Role:</div>
            <div class="col-md-6">{{ $user->role  }}</div>
        </div>
        <div class="row my-2">
            <div class="col-md-4 text-md-right">Gender:</div>
            <div class="col-md-6">{{ $user->gender }}</div>
        </div>

        <div class="row my-2">
            <div class="col-md-4 text-md-right">Age:</div>
            <div class="col-md-6">{{ $user->age }}</div>
        </div>
        <div class="row my-2">
            <div class="col-md-4 text-md-right">Street:</div>
            <div class="col-md-6">{{ $user->street }}</div>
        </div>
        <div class="row my-2">
            <div class="col-md-4 text-md-right">City:</div>
            <div class="col-md-6">{{ $user->city }}</div>
        </div>
        <div class="row my-2">
            <div class="col-md-4 text-md-right">St:</div>
            <div class="col-md-6">{{ $user->state  }}</div>
        </div>
        <div class="row my-2">
            <div class="col-md-4 text-md-right">Zip:</div>
            <div class="col-md-6">{{ $user->zip_code }}</div>
        </div>
        <div class="row my-2">
            <div class="col-md-4 text-md-right">Email:</div>
            <div class="col-md-6">{{ $user->email }}</div>
        </div>

    </div>

    </div>

@endsection