@extends('layouts.app')

@section('content')

    <div class="card-header">{{ __('Pet') }}: {{ $pet->name }}</div>

    <div class="card-body">

        <div class="row my-2">
            <div class="col-md-4 text-md-right">User ID</div>
            <div class="col-md-6">{{ $pet->user_id}}</div>
        </div>
        <div class="row my-2">
            <div class="col-md-4 text-md-right">Type</div>
            <div class="col-md-6">{{ $pet->type }}</div>
        </div>
        <div class="row my-2">
            <div class="col-md-4 text-md-right">Breed</div>
            <div class="col-md-6">{{ $pet->breed }}</div>
        </div>
        <div class="row my-2">
            <div class="col-md-4 text-md-right">Name</div>
            <div class="col-md-6">{{ $pet->name  }}</div>
        </div>
        <div class="row my-2">
            <div class="col-md-4 text-md-right">Description</div>
            <div class="col-md-6">{{ $pet->description }}</div>
        </div>

    </div>

    </div>

@endsection