@extends('layouts.app')

@section('content')

    <div class="card-header">Thank you</div>

    <div class="card-body">
        <p>Thank you for creating an account with Petshare.com.</p>
        <p>We're sorry to see you go.</p>
        <p>You're welcome to <a href="{{ route('register') }}">create an account</a> again.</p>
    </div>

@endsection
