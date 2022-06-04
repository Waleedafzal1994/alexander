<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction as TX;
use App\Models\User;
use Validator;
use URL;
use Session;
use Redirect;
use Input;
use Auth;
use Carbon\Carbon;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;

class PayPalController extends Controller
{
  
    // new paypal api

    private $_api_context;
    
    public function __construct()
    {
            
        $paypal_configuration = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_configuration['client_id'], $paypal_configuration['secret']));
        $this->_api_context->setConfig($paypal_configuration['settings']);
    }

    public function payWithPaypal()
    {
        return view('paywithpaypal');
    }

    public function postPaymentWithpaypal(Request $request) {

        $amounts = [10,20,30,50,70,100,200,400,1000];
        if(!in_array($request->amount,$amounts) || !isset($request->amount)) {
            \Session::put('error','Invalid amount.');
            return redirect('/points');
        }

        $payer = new Payer();
        $payer->setPaymentMethod('paypal');
        $currency = 'USD';
       

        $dbTX = new TX;
        $dbTX->amount = intVal($request->amount);
        $dbTX->inc_dec = 'inc';
        $dbTX->payment_method = 'paypal';
        $dbTX->payment_status = 0;
        $dbTX->user_id = Auth::id();
        $dbTX->payment_price = intVal($request->amount);
        $dbTX->save();



        $itemsToAdd = array();
        // Retrieve product

                $item = new Item();
        
                $item->setName('GamersPlay GP Refill')
                    ->setCurrency($currency)
                    ->setQuantity(1)
                    ->setPrice(intVal($request->amount));
                array_push($itemsToAdd,$item);
            


        $item_list = new ItemList();
        $item_list->setItems($itemsToAdd);

        $amount = new Amount();
        $amount->setCurrency($currency)
            ->setTotal(intVal($request->amount));

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('GamersPlay GP Refill');

        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::route('payment.status'))
            ->setCancelUrl(URL::route('payment.status'));

        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));            
        try {
            $payment->create($this->_api_context);
        } catch (\PayPal\Exception\PPConnectionException $ex) {
            if (\Config::get('app.debug')) {
                \Session::put('error','Connection timeout');
                return redirect('/points?error=1');                
            } else {
                \Session::put('error','Some error occured, please try again later.');
                return redirect('/points?error=1');                
            }
        }

        foreach($payment->getLinks() as $link) {
            if($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }
        
        Session::put('paypal_payment_id', $payment->getId());
        $dbTX->paypal_tx_id = $payment->getId();
        $dbTX->save();
        if(isset($redirect_url)) {  
            return redirect($redirect_url);
            return['status' => 'success', 'redirect_uri' => $redirect_url];          
            // return Redirect::away($redirect_url);
        }

        \Session::put('error','Unknown error occurred');
        return redirect('/points?error=1');          
    }

    public function getPaymentStatus(Request $request) {        
        $payment_id = Session::get('paypal_payment_id');

        Session::forget('paypal_payment_id');
        if (empty($request->input('PayerID')) || empty($request->input('token'))) {
            \Session::put('error','Payment failed');
            return redirect('/points?error=1'); 
        }
        $payment = Payment::get($payment_id, $this->_api_context);        
        $execution = new PaymentExecution();
        $execution->setPayerId($request->input('PayerID'));        
        $result = $payment->execute($execution, $this->_api_context);
        
        if ($result->getState() == 'approved') {         
            $tx = TX::where('paypal_tx_id',$payment_id)->first();
            if($tx) {
                $tx->payment_date = Carbon::now();
                $tx->payment_status = 1;
                $tx->save();
                $user = User::whereId($tx->user_id)->first();
                if($user != null) {
                    $user->points = $user->points + $tx->amount;
                    $user->save();
                }
            }
            \Session::put('success','Payment success !!');
            return redirect('/points');
        }

        \Session::put('error','Payment failed !!');
        return redirect('/points');
    }








}