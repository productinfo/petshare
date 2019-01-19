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

                    <select class="form-control" id="type" name="type">
                        <option>dog</option>
                        <option>cat</option>
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
                <label for="breed" class="col-md-4 col-form-label text-md-right">{{ __('Breed') }} </label>

                <div class="col-md-6">
                    <input id="breed" type="text" class="form-control{{ $errors->has('breed') ? ' is-invalid' : '' }}" name="breed" value="{{ old('breed') }}" autofocus>

                    @if ($errors->has('breed'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('breed') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="distance" class="col-md-4 col-form-label text-md-right">{{ __('Within miles') }}</label>

                <div class="col-md-6">
                    <select class="form-control" id="distance">
                        <option>1</option>
                        <option>5</option>
                        <option>25</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-right">{{ __('Of Address') }} *</label>
                <div class="col-md-6"></div>
            </div>

            <div class="form-group row">
                <label for="street" class="col-md-4 col-form-label text-md-right">{{ __('Street') }} *</label>

                <div class="col-md-6">
                    <input id="street" type="text" class="form-control{{ $errors->has('street') ? ' is-invalid' : '' }}" name="street" value="{{ old('street') }}"  autofocus>

                    @if ($errors->has('street'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('street') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('City') }} *</label>

                <div class="col-md-6">
                    <input id="city" type="text" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" name="city" value="{{ old('city') }}"  autofocus>

                    @if ($errors->has('city'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('city') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="state" class="col-md-4 col-form-label text-md-right">{{ __('State') }} *</label>

                <div class="col-md-6">
                    <input id="state" type="text" class="form-control{{ $errors->has('state') ? ' is-invalid' : '' }}" name="state" value="{{ old('state') }}"  autofocus>

                    @if ($errors->has('state'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('state') }}</strong>
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