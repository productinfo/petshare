@extends('layouts.app')

@section('content')

    <div class="card-header">{{ __('Pets Search Results') }}</div>

    <div class="card-body">

        <table class="table">
            <thead>
            <tr>
                <th scope="col">Type</th>
                <th scope="col">Breed</th>
                <th scope="col">Distance in miles</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($pets as $pet)
                <tr>
                    <td>{{ $pet->type }}</td>
                    <td>{{ $pet->breed }}</td>
                    <td>{{ number_format($pet->distance,1)  }}</td>
                    <td>{{ $pet->name  }}</td>
                    <td>{{ $pet->description }}</td>
                    <td>
                        <a href="/pets/{{ $pet->id }}" class="btn btn-primary mr-2 d-inline">Message Owner</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>

    </div>

@endsection