@extends('layouts.app')

@section('content')

    <div class="card-header">{{ __('Stripe') }}</div>

    <div class="card-body">

        <div class='form-row'>
            <div class='col-12 stripe_error form-group d-none'>
                <div class='alert-danger alert'>Please correct the errors and try again.</div>
            </div>
        </div>

        {{-- Stripe's JS hijacks the initial form submit.  Stripe payment processing requires these additional fields.   --}}
        <script src='https://js.stripe.com/v2/' type='text/javascript'></script>

        <form method="POST"
              action="{{ route('pay') }}"
              accept-charset="UTF-8"
              class="require-validation"
              data-cc-on-file="false"
              data-stripe-publishable-key="pk_test_lIGvrSjEyrE3sbKD7cM75aDI"
              id="payment-form">

            @csrf

            <div class="form-group row">
                <label for="amount" class="col-sm-4 text-md-right">{{ __('Item') }}</label>
                <div class="col-sm-6">
                    <div class="">basic subscription</div>
                    <input type="hidden" name="amount" id="amount" value="basic" class="form-control" autofocus>
                </div>
            </div>

            <div class="form-group row required">
                <label for="card_number" class="col-sm-4 col-form-label text-md-right">{{ __('Card Number') }} *</label>
                <div class="col-sm-4">
                    <input type="text" name="card_number" id="card_number" class="card_number form-control" autofocus>
                </div>
            </div>

            <div class="form-group row required">
                <label for="exp_month" class="col-sm-4 col-form-label text-md-right">{{ __('Expiration Month') }} *</label>
                <div class="col-1">
                    <input type="text" name="exp_month" id="exp_month" class="exp_month form-control" placeholder="MM" autofocus>
                </div>
            </div>

            <div class="form-group row required">
                <label for="exp_year" class="col-sm-4 col-form-label text-md-right">{{ __('Expiration Year') }} *</label>
                <div class="col-1">
                    <input type="text" name="exp_year" id="exp_year" class="exp_year form-control" placeholder="YY" autofocus>
                </div>
            </div>

            <div class="form-group row required">
                <label for="cvc" class="col-sm-4 col-form-label text-md-right">{{ __('CVC') }} *</label>
                <div class="col-sm-1">
                    <input type="text" name="cvc" id="cvc" class="cvc form-control" placeholder="123" autofocus>
                </div>
            </div>

            <div class="form-group row">
                <label for="zip_code" class="col-sm-4 col-form-label text-sm-right">{{ __('Zip code of credit card') }} *</label>
                <div class="col-md-2">
                    <input type="text" name="zip_code" id="zip_code"class="form-control" placeholder="48226">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-6 offset-md-4">
                    <button type="submit" class="btn btn-primary px-5">{{ __('Pay') }}</button>
                </div>
            </div>

        </form>

        <script>
            $(function() {
                $('form.require-validation').bind('submit', function(e) {
                    let $form         = $(e.target).closest('form'),
                        inputSelector = ['input[type=email]', 'input[type=password]',
                            'input[type=text]', 'input[type=file]', 'textarea'].join(', '),
                        $inputs       = $form.find('.required').find(inputSelector),
                        $errorMessage = $form.find('div.error'),
                        valid         = true;
                    $errorMessage.addClass('hide');
                    $('.has-error').removeClass('has-error');
                    $inputs.each(function(i, el) {
                        let $input = $(el);
                        if ($input.val() === '') {
                            $input.parent().addClass('has-error');
                            $errorMessage.removeClass('hide');
                            e.preventDefault(); // cancel on first error
                        }
                    });
                });
            });

            $(function() {

                let $form = $("#payment-form");

                $form.on('submit', function(e) {
                    if (!$form.data('cc-on-file')) {
                        e.preventDefault();
                        Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                        Stripe.createToken({
                            number: $('.card_number').val(),
                            cvc: $('.cvc').val(),
                            exp_month: $('.exp_month').val(),
                            exp_year: $('.exp_year').val()
                        }, stripeResponseHandler);
                    }
                });

                function stripeResponseHandler(status, response) {
                    if (response.error) {
                        $('.stripe_error')
                            .removeClass('d-none')
                            .find('.alert')
                            .text(response.error.message);
                    } else {
                        // token contains id, last4, and card type
                        let token = response['id'];
                        // insert the token into the form so it gets submitted to the server
                        $form.find('input[type=text]').empty();
                        $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                        $form.get(0).submit();
                    }
                }
            })
        </script>

    </div>

@endsection