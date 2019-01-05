@extends('layouts.app')

@section('content')

    <div class="card-header">{{ __('Search for Pets') }}</div>

    <div class="card-body">

        <form method="POST" action="{{ route('pets.search') }}">

            @csrf

            <div class="form-group row">
                <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Type') }} *</label>

                <div class="col-md-6">
                    {{--<input id="type" type="text" class="form-control{{ $errors->has('type') ? ' is-invalid' : '' }}" name="type" value="{{ old('type') }}" required autofocus>--}}

                    <select class="form-control" id="type">
                        <option>Dog</option>
                        <option>Cat</option>
                        <option>horse</option>
                        <option>bird</option>
                        <option>rabbit</option>
                        <option>fish</option>
                        <option>reptile</option>
                        <option>other</option>
                    </select>

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
                <label for="distance" class="col-md-4 col-form-label text-md-right">{{ __('Within') }}</label>

                <div class="col-md-6">
                    <select class="form-control" id="distance">
                        <option>1 mile</option>
                        <option>5 miles</option>
                        <option>25 miles</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('of Address') }} *</label>

                <div class="col-md-6">
                    <input id="address" type="text" class="form-control{{ $errors->has('adddress') ? ' is-invalid' : '' }}" name="address" value="{{ old('address') }}" required autofocus>

                    @if ($errors->has('address'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('address') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Search') }}
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