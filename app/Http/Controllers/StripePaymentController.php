<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use session;
use Stripe;

class StripePaymentController extends Controller
{

public function stripe ()
    {
        return view('stripe');
    }


public function stripePost(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create(

            [
                'amount'=> 100*100 ,
                'currency'=>"usd",
                'source'=>$request->stripeToken,
                'description'=>'test'


            ]
            );
        session('seccess', 'payment has been seccess');
        return back();
    }
}
