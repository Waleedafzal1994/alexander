<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use App\Models\Transaction;
use App\Models\Service;
use App\Models\Dispute;
use App\Models\DisputeReply;
use App\Models\Rating;
use App\Models\Order;
use App\Models\Conversation;
use App\Models\Message;
use Carbon\Carbon;

class PurchaseController extends Controller
{
    //
    public function index() {
        return view('points');
    }

    public function orders() {
        $orders = Order::with('service.category')->where('buyer_id',Auth::id())->orderBy('created_at','desc')->paginate(30);   
        return view('orders',compact('orders')); 
    }

    public function transactions() {  
        $transactions = Transaction::where('user_id',Auth::id())->orderBy('created_at','desc')->paginate(30);   
        return view('transactions',compact('transactions')); 
    }

    public function purchase($id) {
        if(!is_numeric($id)) {
            return redirect('/');
        }
        $service = Service::whereId($id)->where('active',1)->first();
        if($service == null) {
            return redirect('/');
        }
        if($service->user_id == Auth::id()) {
            return redirect()->back()->with(['error' => 'You cannot purchase your own service.']);

        }

         $current_user = User::whereId(Auth::id())->first();
         if($current_user == null) {
            return redirect('/');
         }

         $seller = User::whereId($service->user_id)->first();

         if($seller == null) {
            return redirect()->back()->with(['error' => 'Seller not found.']);
         }

         if($seller->banned == '1') {
             return redirect()->back()->with(['error' => 'This seller has been banned for breaking our Terms of Service.']);
         }

         if($seller->seller_vacation_mode == '1') {
            return redirect()->back()->with(['error' => 'This seller is currently on vacation.']);
        }
         
         $price = floatval($service->price);
         $current_user_balance = floatval($current_user->points);
         $new_user_balance = $current_user_balance - $price;
         if($new_user_balance > 0) {
             // User has enough points to purchase service
            $current_user->points = $new_user_balance;
            $current_user->save();

            $transaction = new Transaction;
            $transaction->type = '1';
            $transaction->amount = $price;
            $transaction->user_id = $current_user->id; 
            $transaction->inc_dec = 'dec'; 
            $transaction->save();


            $order = new Order;
            $order->buyer_id = $current_user->id;
            $order->seller_id = $service->user_id;
            $order->service_id = $service->id;
            $order->tx_id = $transaction->id;
            $order->price = $price;
            $order->escrow_release = Carbon::now()->addDays(1);
            $order->save();

            $conversation = Conversation::where('user_one',Auth::id())->orWhere('user_two',Auth::id())->first();
            if($conversation == null) {
                $conversation = new Conversation;
                $conversation->user_one = Auth::id();
                $conversation->user_two = $order->seller_id;
                $conversation->save();
            } 

            $message = new Message();
            $message->conversation_id = $conversation->id;
            $message->message = 'A new order has been created: #'.$order->id.'. Please follow the site rules and have fun!';
            $message->save();
            return redirect('/order/'.$order->id);

         } else {
             return redirect('/');
         }
        

    }

    public function order($id) {
        if(is_numeric($id) == false) {
            return redirect('/');
        }
        $order = Order::with('service.images')->whereId($id)->first();
        if($order == null) {
            return redirect('/');
        }
        if(Auth::id() != $order->buyer_id && Auth::id() != $order->seller_id && Auth::user()->user_group != 3) {
            return redirect('/');
        }

        if(Auth::id() == $order->seller_id) {
            $otherUser = $order->buyer_id;
        } else {
            $otherUser = $order->seller_id;
        }

        $conversation = Conversation::where(function($query) use ($otherUser) {
            $query->where('user_one',Auth::id());
            $query->where('user_two',$otherUser);
        })->orWhere(function($query) use ($otherUser) {
            $query->where('user_one',$otherUser);
            $query->where('user_two',Auth::id());
        })->first();
        $conversationID = $conversation->id;
        $timeRemaining = strtotime($order->escrow_release) - strtotime(Carbon::now());
        $dispute = Dispute::where('order_id',$order->id)->first();
        return view('order',compact('order','conversationID','timeRemaining','dispute'));
    }

    public function dispute($id) {
        $order = Order::whereId($id)->where('status',0)->where(function($query) {
            $query->where('seller_id',Auth::id())->orWhere('buyer_id',Auth::id());
        })->first();

        if($order == null) {
            return redirect('/orders/'.$id);
        }

        $dispute = new Dispute;
        $dispute->disputer_id = Auth::id();
        $dispute->order_id = $order->id;
        $dispute->save();

        $order->status = 2;
        $order->save();

        return redirect('/order/'.$id);
    }

    public function cancelOrder($id) {
        $order = Order::whereId($id)->where('seller_id',Auth::id())->whereIn('status',[0])->first();
        if($order == null) return response('Not found',404);
   
        $order->status = 5;
        $user = User::whereId($order->buyer_id)->first();
        if($user != null) {
            $user->points = floatval($user->points) + floatval($order->price);
            $user->save();
        }
        $order->escrow = 0;

        $order->save();
        return redirect()->back()->with(['success' => 'Order has been cancelled.']);
    }


    public function releasePayment($id) {
        $order = Order::whereId($id)->where('status',0)->where(function($query) {
            $query->where('seller_id',Auth::id())->orWhere('buyer_id',Auth::id());
        })->first();

        if($order == null) {
            return redirect('/order/'.$id);
        }
        if($order->buyer_id == Auth::id()) {
            $order->status = 1;
            $user = User::whereId($order->seller_id)->first();
            if($user != null) {
                $user->earned_gp = floatval($user->earned_gp) + floatval($order->price);
                $user->save();
            }
            $order->escrow = 0;
            $order->save();
        }

        return redirect('/order/'.$id);
    }

    public function calculateRating($serviceID) {
        $service = Service::whereId($serviceID)->first();
        if($service == null) return response('Not found', 404);

        $ratings = Rating::where('service_id',$service->id)->get();
        if($ratings == null) {
            $rating = 0;
            $ratingCount = 0;
        } else {
            $rating = $ratings->avg('rating');
            $ratingCount = count($ratings);
        }

        $service->rating = $rating;
        $service->ratings_count = $ratingCount;
        $service->save();
        return $rating;

    }

    public function feedback(Request $request) {
        $validated = $request->validate([
            'id' => 'integer',
            'stars' => 'integer|min:1|max:5',
            'feedback' => 'nullable',
            'anonymous' => 'string',
        ]);

        $id = $validated['id'];

        $order = Order::whereId($id)->where('feedback_posted',0)->whereIn('status',[1,3,4])->where(function($query) {
            $query->where('seller_id',Auth::id())->orWhere('buyer_id',Auth::id());
        })->first();

        if($order == null) {
            return response('Not found',404);
        }

        if($order->buyer_id == Auth::id()) {
            $rating = new Rating;
            $rating->user_id = Auth::id();
            if($validated['feedback'] != "") {
                $rating->review = $validated['feedback'];
            }
            if($validated['anonymous'] == 'true') {
                $rating->anonymous = 1;
                $usersName = Auth::user()->name;
                $usersNameAnonymous = $usersName[0];
                for($i = 1; $i<strlen($usersName); $i++) {
                    $usersNameAnonymous.= '*';
                }
                $rating->anonymous_name = $usersNameAnonymous;
            }
            $rating->service_id = $order->service_id;
            $rating->order_id = $order->id;
            $rating->rating = $request->stars;
            $rating->save();

            $order->feedback_posted = 1;
            $order->save();

            $this->calculateRating($order->service_id);
        }

        return response('Success',200);
    }

    public function disputePage($id) {
        
        $dispute = Dispute::with('replies.user','disputer')->whereId($id)->first();
        if($dispute == null) return redirect('/');
        $order = Order::whereId($dispute->order_id)->where(function($q) {
            $q->where('buyer_id',Auth::id())->orWhere('seller_id',Auth::id());
        })->first();
        if($order == null) return redirect('/');
        return view('dispute',compact('dispute'));
    }

    public function disputeReply(Request $request) {
        $dispute = Dispute::whereId($request->id)->where('status',0)->first();
        if($dispute == null) return redirect()->back()->with(['error' => 'Dispute not found.']);
     
        $reply = new DisputeReply;
        $reply->dispute_id = $dispute->id;
        $reply->message = $request->message;
        $reply->user_id = Auth::id();
        $reply->save();
        return redirect()->back();
    }
}
