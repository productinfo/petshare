@extends('layouts.app')

@section('content')

    <div class="card-header">{{ __('Pet') }}: {{ $pet->name }}</div>

    <div class="card-body">

        <div class="row my-2">
            <div class="col-md-4 text-md-right">Name:</div>
            <div class="col-md-6">{{ $pet->name  }}</div>
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
            <div class="col-md-4 text-md-right">Description:</div>
            <div class="col-md-6">{{ $pet->description }}</div>
        </div>

        <div class="row mt-5 mb-2">
            <div class="col-md-4 text-md-right">Owner screen name:</div>
            <div class="col-md-6"><a href="/users/{{ $pet->owner->id }}">{{ $pet->owner->screen_name }}</a></div>
        </div>
        <div class="row my-2">
            <div class="col-md-4 text-md-right">Owner's/pet's address:</div>
            <div class="col-md-6">{{ $pet->owner->street }} {{ $pet->owner->city }}, {{ $pet->owner->state }} {{ $pet->owner->zip_code }}</div>
        </div>

        <div class="row mt-5 mb-4">
            <div class="col-md-3 offset-md-4">
                <a href="/pets/{{ $pet->id }}/edit" class="btn btn-outline-primary btn-sm mr-2 d-inline">Edit</a>
                <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#petDelete">Delete</button>
            </div>
        </div>

    </div>

    </div>

    <!-- Modal -->
    <div class="modal fade" id="petDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirm delete pet (not user's account)</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ $pet->id }}" class="d-inline">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button class="btn btn-primary">DELETE PET</button>
                    </form>
                </div>
                <div class="modal-footer mb-4">
                </div>
            </div>
        </div>
    </div>

    </div>

    </div>

@endsection