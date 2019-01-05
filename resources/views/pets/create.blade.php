@extends('layouts.app')

@section('content')

    <div class="card-header">{{ __('Create Pet Profile') }}</div>

    <div class="card-body">

        <form method="POST" action="{{ route('create') }}">

            @csrf

            <div class="form-group row">
                <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Type') }} *</label>

                <div class="col-md-6">
                    <input id="type" type="text" class="form-control{{ $errors->has('type') ? ' is-invalid' : '' }}" name="type" value="{{ old('type') }}" required autofocus>

                    @if ($errors->has('type'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('type') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="breed" class="col-md-4 col-form-label text-md-right">{{ __('Breed') }} *</label>

                <div class="col-md-6">
                    <input id="breed" type="text" class="form-control{{ $errors->has('breed') ? ' is-invalid' : '' }}" name="breed" value="{{ old('breed') }}" required autofocus>

                    @if ($errors->has('breed'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('breed') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }} *</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }} *</label>

                <div class="col-md-6">
                    <input id="description" type="text" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{ old('description') }}" required autofocus>

                    @if ($errors->has('description'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Register') }}
                    </button>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-right">* = required field</label>
                <div class="col-md-6"></div>
            </div>

        </form>

    </div>

@endsection