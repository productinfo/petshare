<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;
use App\user;

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

        try {
            Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

            $amount = 700;

            // this customer record goes to Stripe
            $customer = Customer::create(array(
                'email' => $request->stripeEmail,
                'source' => $request->stripeToken,
            ));

            // this charge record goes to Stripe
            $charge = Charge::create(array(
                'customer' => $customer->id,
                'amount' => $amount,
                'currency' => 'usd',
                'description' => 'Basic subscription charge'
            ));

            // $stripeToken = $request->input('stripeToken');

            // add subscription record to our db
            $user = User::find(1);
            // $user = User::find(auth()->user()->id);

            // $user->newSubscription('basic','monthly')->create($stripeToken);
            $user->newSubscription('basic','monthly');


            // return 'Charge successful, you get the course!';
            return view('paysuccess')->with('amount', $amount)->with('subscription', 'basic');

        } catch (\Exception $e) {

            return $e->getMessage();
        }
    }

    /**
     * Display view/screen with payment form
     *
     * @return \Illuminate\Http\Response
     */
    public function paySuccess()
    {
        return view('paySuccess');
    }
}
