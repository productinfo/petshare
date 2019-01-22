@extends('layouts.app')

@section('content')

    <div class="card-header">{{ __('Edit User') }}: {{ $user->screen_name }}</div>

    <div class="card-body">

        <form method="POST" action="/users/{{ $user->id }}">

            {{ method_field('PATCH') }}

            @csrf

            <div class="form-group row">
                <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }} *</label>

                <div class="col-md-6">
                    <input id="type" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ $user->first_name }}" required autofocus>

                    @if ($errors->has('first_name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('first_name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }} *</label>

                <div class="col-md-6">
                    <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ $user->last_name }}" required autofocus>

                    @if ($errors->has('last_name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('last_name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="screen_name" class="col-md-4 col-form-label text-md-right">{{ __('Screen Name') }} *</label>

                <div class="col-md-6">
                    <input id="screen_name" type="text" class="form-control{{ $errors->has('screen_name') ? ' is-invalid' : '' }}" name="screen_name" value="{{ $user->screen_name }}" required autofocus>

                    @if ($errors->has('screen_name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('screen_name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Role') }} *</label>

                <div class="col-md-6">

                    <select class="form-control" id="role" name="role">
                        <option>owner</option>
                        <option>non-owner</option>
                    </select>

                    @if ($errors->has('role'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('role') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }} *</label>

                <div class="col-md-6">

                    <select class="form-control" id="gender" name="gender">
                        <option>male</option>
                        <option>female</option>
                    </select>

                    @if ($errors->has('gender'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('gender') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="age" class="col-md-4 col-form-label text-md-right">{{ __('Age') }} *</label>

                <div class="col-md-6">
                    <input id="age" type="text" class="form-control{{ $errors->has('age') ? ' is-invalid' : '' }}" name="age" value="{{ $user->age }}" required autofocus>

                    @if ($errors->has('age'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('age') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="street" class="col-md-4 col-form-label text-md-right">{{ __('Street') }} *</label>

                <div class="col-md-6">
                    <input id="street" type="text" class="form-control{{ $errors->has('street') ? ' is-invalid' : '' }}" name="street" value="{{ $user->street }}" required autofocus>

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
                    <input id="city" type="text" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" name="city" required value="{{ $user->city }}" autofocus>

                    @if ($errors->has('city'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('city') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="state" class="col-md-4 col-form-label text-md-right">{{ __('St') }} *</label>

                <div class="col-md-6">
                    <input id="state" type="text" class="form-control{{ $errors->has('state') ? ' is-invalid' : '' }}" name="state" value="{{ $user->state }}" required autofocus>

                    @if ($errors->has('state'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('state') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="zip_code" class="col-md-4 col-form-label text-md-right">{{ __('Zip Code') }} </label>

                <div class="col-md-6">
                    <input id="zip_code" type="text" class="form-control{{ $errors->has('zip_code') ? ' is-invalid' : '' }}" name="zip_code" value="{{ $user->zip_code }}" required autofocus>

                    @if ($errors->has('zip_code'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('zip_code') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }} *</label>

                <div class="col-md-6">
                    <input id="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $user->email }}" required autofocus>

                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __(' Update ') }}
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