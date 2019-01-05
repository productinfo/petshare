@extends('layouts.app')

@section('content')

    <div class="card-header">{{ __('Users') }}</div>

    <div class="card-body">

        <table class="table">
            <thead>
            <tr>
                <th scope="col">User ID</th>
                <th scope="col">Type</th>
                <th scope="col">Breed</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
            </tr>
            </thead>
            <tbody>
            @foreach($pets as $pet)
                <tr>
                    <td>{{ $pet->user_id}}</td>
                    <td>{{ $pet->type }}</td>
                    <td>{{ $pet->breed }}</td>
                    <td>{{ $pet->name }}</td>
                    <td>{{ $pet->description }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>

    </div>

@endsection