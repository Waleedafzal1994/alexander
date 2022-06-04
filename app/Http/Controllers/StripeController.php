<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use URL;
use App\Models\Transaction;
class StripeController extends Controller
{
    //

    public function paymentMethod() {
        $user = User::whereId(Auth::id())->first();
        $paymentMethod = $user->defaultPaymentMethod();
   
        return view('stripe.payment-method', [
            'intent' => $user->createSetupIntent(),
            'method' => $paymentMethod,
        ]);
    }


    public function charge(Request $request) {

        
        $amounts = [10,20,30,50,70,100,200,400,1000];
        if(!in_array($request->amount,$amounts) || !isset($request->amount)) {
            \Session::put('error','Invalid amount.');
            return redirect('/points');
        }
        $pointsAmount = intval($request->amount);
        $user = User::whereId(Auth::id())->first();

        $paymentMethod = $user->defaultPaymentMethod();
        if($paymentMethod == null) {
            \Session::put('no-method','Please provide you payment details before continuing with your purchase.');
            \Session::put('attempted-amount',$pointsAmount);
            return redirect('/stripe/method');
        }


        $amount = intVal($request->amount) * 100;
        $paymentMethod = $user->defaultPaymentMethod();
        // dd($paymentMethod->id);
        try {
            $payment = $user->charge(
                $amount, $paymentMethod->id
            );
            if($payment->status == 'succeeded') {
                $tx = new Transaction;
                $tx->amount = intVal($request->amount);
                $tx->inc_dec = 'inc';
                $tx->payment_method = 'stripe';
                $tx->payment_status = 1;
                $tx->user_id = Auth::id();
                $tx->stripe_tx_id = $payment->id;
                $tx->payment_price = intVal($request->amount);
                $tx->save();

                $user->points = $user->points + $pointsAmount;
                $user->save();
                \Session::put('success','Payment submitted');
                return redirect('/points');
            }
            // dd($payment);
        } catch  (Exception $e) {

        } 
    
    }

    public function updatePaymentMethod(Request $request) {
        $user = User::whereId(Auth::id())->first();
        $stripeCustomer = $user->createOrGetStripeCustomer();
        $paymentMethod = $request->paymentMethod;
        $user->updateDefaultPaymentMethod($paymentMethod);
    }
}
