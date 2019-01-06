@extends('layouts.app')

@section('content')

    <div class="card-header">{{ __('Pets Search Results') }}</div>

    <div class="card-body">

        <table class="table">
            <thead>
            <tr>
                <th scope="col">User ID</th>
                <th scope="col">Type</th>
                <th scope="col">Breed</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($pets as $pet)
                <tr>
                    <td>{{ $pet->user_id}}</td>
                    <td>{{ $pet->type }}</td>
                    <td>{{ $pet->breed }}</td>
                    <th><a href="/pets/{{ $pet->id }}">{{ $pet->name  }}</a></th>
                    <td>{{ $pet->description }}</td>
                    <td>
                        <div style="width: 7rem">
                            <a href="/pets/{{ $pet->id }}/edit" class="btn btn-outline-primary btn-sm mr-2 d-inline">Edit</a>
                            {{--<a href="/pets/{{ $pet->id }}" class="btn btn-outline-primary btn-sm">Delete</a>--}}
                            <form method="POST" action="pets/{{ $pet->id }}" class="d-inline">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button class="btn btn-outline-primary btn-sm">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>

    </div>

@endsection