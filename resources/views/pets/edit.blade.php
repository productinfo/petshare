@extends('layouts.app')

@section('content')

    <div class="card-header">{{ __('Edit Pet') }}: {{ $pet->name }}</div>

    <div class="card-body">

        <form method="POST" action="/pets/{{ $pet->id }}" enctype="multipart/form-data">

            {{ method_field('PATCH') }}

            @csrf

            <div class="form-group row">
                <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Type') }} *</label>

                <div class="col-md-6">
                    {{--<input id="type" type="text" class="form-control{{ $errors->has('type') ? ' is-invalid' : '' }}" name="type" value="{{ $pet->type }}" required autofocus>--}}

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
                    <input id="breed" type="text" class="form-control{{ $errors->has('breed') ? ' is-invalid' : '' }}" name="breed" value="{{ $pet->breed }}" autofocus>

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
                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $pet->name }}" required autofocus>

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
                    <textarea  id="description" type="text" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" required autofocus rows="5">{{ $pet->description }}</textarea>

                    @if ($errors->has('description'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="photo"  class="col-md-4 col-form-label text-md-right">{{ __('Upload photo of pet') }}</label>
                <div class="col-md-6">
                    <input id="photo" type="file" class="form-control-file {{ $errors->has('name') ? ' is-invalid' : '' }}" name="photo" value="{{ old('photo') }}">

                    @if ($errors->has('photo'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('photo') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Edit') }}
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