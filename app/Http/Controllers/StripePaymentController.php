<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Stripe;

class StripePaymentController extends Controller
{
    public function stripe()
    {
        if(Auth::check()){
            return view('stripe');
        }
        else
        {
            return redirect('login');
        }

    }

    public function stripePost(Request $request)
    {
        // Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create([
            'amount' => 100*100,
            'currency'=>"usd",
            'source'=> $request->stripeToken,
            'description' =>'Test payment from developers'
        ]);

        Session::flash('success','Payment has been successfully');
        return back();
    }


}
