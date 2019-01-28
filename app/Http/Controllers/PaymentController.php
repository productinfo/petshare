<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
     * Process payment
     *
     * @return \Illuminate\Http\Response
     */
    public function process()
    {
        //
    }
}
