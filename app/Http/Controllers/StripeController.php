<?php

namespace App\Http\Controllers;
   
use Stripe;
use App\Vol;
use Stripe\Charge;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
   
class StripePaymentController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe($id)
    {
        return view('stripe');
    }
  
    /**
     * success response method.
     * @param  int 
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request,$id)
    {    $vol=Vol::findOrFail($id);
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => $vol->prix,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Achat d'un billet" 
        ]);
  
        Session::flash('success', 'Payment successful!');
          
        return back();
    }
}