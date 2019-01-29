@extends('layouts.app')

@section('content')

    <div class="card-header">{{ __('Stripe') }}</div>

    <div class="card-body">

        <form method="POST" action="{{ route('pay') }}">

            @csrf

            <div class="form-group row">
                <label for="amount" class="col-4 text-md-right">{{ __('Item') }}</label>

                <div class="col-6">
                    <div class="">basic subscription</div>
                    <input type="hidden" name="amount" id="amount" value="basic" class="form-control" autofocus>
                </div>
            </div>

            <div class="form-group row">
                <label for="card_number" class="col-4 col-form-label text-md-right">{{ __('Card Number') }} *</label>

                <div class="col-4">
                    <input type="text" name="card_number" id="card_number" class="form-control" autofocus>
                </div>

                @if ($errors->has('card_number'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('card_number') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group row">
                <label for="expiration_month" class="col-4 col-form-label text-md-right">{{ __('Expiration Month') }} *</label>

                <div class="col-1">
                    <input type="text" name="expiration_month" id="expiration_month" class="form-control" placeholder="MM" autofocus>
                </div>

                @if ($errors->has('expiration_month'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('expiration_month') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group row">
                <label for="expiration_year" class="col-4 col-form-label text-md-right">{{ __('Expiration Year') }} *</label>

                <div class="col-1">
                    <input type="text" name="expiration_year" id="expiration_year" class="form-control" placeholder="YY" autofocus>
                </div>

                @if ($errors->has('expiration_year'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('expiration_year') }}</strong>
                    </span>
                @endif

            </div>

            <div class="form-group row">
                <label for="cvv" class="col-4 col-form-label text-md-right">{{ __('CVV') }} *</label>

                <div class="col-1">
                    <input type="text" name="cvv" id="cvv" class="form-control" placeholder="123" autofocus>
                </div>

                @if ($errors->has('cvv'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('cvv') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group row">
                <label for="zip_code" class="col-4 col-form-label text-md-right">{{ __('Zip code of credit card') }} *</label>
                <div class="col-2">
                    <input type="text" name="zip_code" id="zip_code"class="form-control {{ $errors->has('zip_code') ? ' is-invalid' : '' }}"  placeholder="48226" value="{{ old('zip_code') }}">

                    @if ($errors->has('zip_code'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('zip_code') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary px-5">
                        {{ __('Pay') }}
                    </button>
                </div>
            </div>

        </form>

    </div>

@endsection