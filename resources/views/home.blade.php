@extends('layouts.app')

@section('content')

    <div class="card-header">Home/vestigial screen</div>

    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        This is a vestigial screen with no meaning.  If you are seeing it, something is probably wrong.

        <p>My name: {{Auth::user()->name}}</p>
        <p>My Email: {{Auth::user()->email}}</p>
        <img alt="{{Auth::user()->name}}" src="{{Auth::user()->image}}"/>

    </div>

@endsection
