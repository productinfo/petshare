@extends('layouts.app')

@section('content')

    <div class="card-header">{{ __('Pet') }}: {{ $pet->name }}</div>

    <div class="card-body">

        <div class="row my-2">
            <div class="col-md-4 text-md-right">Owner name:</div>
            <div class="col-md-6">{{ $pet->owner->getName() }}</div>
        </div>
        <div class="row my-2">
            <div class="col-md-4 text-md-right">Owner screen name:</div>
            <div class="col-md-6">{{ $pet->owner->screen_name }}</div>
        </div>
        <div class="row my-2">
            <div class="col-md-4 text-md-right">Owner address:</div>
            <div class="col-md-6">{{ $pet->owner->street }} {{ $pet->owner->city }}, {{ $pet->owner->state }} {{ $pet->owner->zip_code }}</div>
        </div>
        <div class="row my-2">
            <div class="col-md-4 text-md-right">Type:</div>
            <div class="col-md-6">{{ $pet->type }}</div>
        </div>
        <div class="row my-2">
            <div class="col-md-4 text-md-right">Breed:</div>
            <div class="col-md-6">{{ $pet->breed }}</div>
        </div>
        <div class="row my-2">
            <div class="col-md-4 text-md-right">Name:</div>
            <div class="col-md-6">{{ $pet->name  }}</div>
        </div>
        <div class="row my-2">
            <div class="col-md-4 text-md-right">Description:</div>
            <div class="col-md-6">{{ $pet->description }}</div>
        </div>

    </div>

    </div>

@endsection