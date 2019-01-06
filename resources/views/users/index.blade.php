@extends('layouts.app')

@section('content')

    <div class="card-header">{{ __('Users') }}</div>

    <div class="card-body">

        <table class="table">
            <thead>
            <tr>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Screen Name</th>
                <th scope="col">Role</th>
                <th scope="col">Gender</th>
                <th scope="col">Age</th>
                <th scope="col">Street</th>
                <th scope="col">City</th>
                <th scope="col">St</th>
                <th scope="col">Zip</th>
                <th scope="col">Email</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->first_name }}</td>
                    <td>{{ $user->last_name }}</td>
                    <td><a href="/users/{{ $user->id }}">{{ $user->screen_name }}</a></td>
                    <td>{{ $user->role }}</td>
                    <td>{{ $user->gender }}</td>
                    <td>{{ $user->age }}</td>
                    <td>{{ $user->street }}</td>
                    <td>{{ $user->city }}</td>
                    <td>{{ $user->state }}</td>
                    <td>{{ $user->zip_code }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <div style="width: 7rem">
                            <a href="/users/{{ $user->id }}/edit" class="btn btn-outline-primary btn-sm mr-2 d-inline">Edit</a>
                            {{--<a href="/users/{{ $user->id }}" class="btn btn-outline-primary btn-sm">Delete</a>--}}
                            <form method="POST" action="users/{{ $user->id }}" class="d-inline">
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