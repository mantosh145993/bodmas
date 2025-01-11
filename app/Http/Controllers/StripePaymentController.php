<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Stripe\Stripe;
use Stripe\PaymentIntent;

class StripePaymentController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe()
    {
        return view('stripe');
    }
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response

     */
    public function stripePost(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $customer = Stripe\Customer::create(array(
            "address" => [

                "line1" => "Virani Chowk",

                "postal_code" => "360001",

                "city" => "Rajkot",
                
                "state" => "GJ",
                
                "country" => "IN",
            ],
            "email" => "demo@gmail.com",

            "name" => "Hardik Savani",

            "source" => $request->stripeToken
        ));
        // dd($customer);
        Stripe\Charge::create([
            "amount" => 100 * 100,

            "currency" => "usd",

            "customer" => $customer->id,

            "description" => "Test payment from itsolutionstuff.com.",

            "shipping" => [

                "name" => "Jenny Rosen",

                "address" => [

                    "line1" => "510 Townsend St",

                    "postal_code" => "98140",

                    "city" => "San Francisco",

                    "state" => "CA",

                    "country" => "US",

                ],
            ]
        ]);
        Session::flash('success', 'Payment successful!');
        return back();
    }

    public function createPaymentIntent(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));
        // Create a Payment Intent
        $paymentIntent = PaymentIntent::create([
            'amount' => $request->amount * 100, // Amount in smallest currency unit (e.g., paise for INR)
            'currency' => 'inr', // Set the currency to INR for India
            'payment_method_types' => ['card'], // Indian payment methods
        ]);
        return response()->json([
            'clientSecret' => $paymentIntent->client_secret,
        ]);
    }
}
