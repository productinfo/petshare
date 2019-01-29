<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;

class PaymentController extends Controller
{
    /**
     * Display view/screen with payment form
     *
     * @return \Illuminate\Http\Response
     */
    public function pay()
    {
        return view('pay');
    }

    /**
     * Process payment with Stripe
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function processPay(Request $request)
    {
        dd($request->all());

        $request->validate([
            'card_number' => 'required|integer|max:16',
            'card_month' => 'required|integer|max:2',
            'card_year' => 'required|integer|max:2',
            'card_csv' => 'required|integer|max:3',
            'zip_code' => 'required|integer|max:6'
        ]);

        try {
            Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

            $customer = Customer::create(array(
                'email' => $request->stripeEmail,
                'source' => $request->stripeToken
            ));

            $charge = Charge::create(array(
                'customer' => $customer->id,
                'amount' => 1999,
                'currency' => 'usd'
            ));

            return 'Charge successful, you get the course!';

        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }
}
