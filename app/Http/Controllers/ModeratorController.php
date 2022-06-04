<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Conversation;
use App\Models\Service;
use App\Models\Order;
use App\Models\SellerApplication;
use App\Models\WithdrawalRequest;
use App\Models\Ticket;
use App\Models\TicketReply;
use App\Models\Dispute;
use App\Models\DisputeReply;
use Carbon\Carbon;
use Auth;
use Illuminate\Support\Facades\DB;
class ModeratorController extends Controller
{
    //
    public function index() {
        $totalUsers = User::count();
        $openTickets = Ticket::where('status',0)->count();
        $openDisputes = Dispute::where('status',0)->count();
        $totalServices = Service::where('active',1)->count();
        $totalOrders = Order::count();
        return view('moderator.index',compact('totalUsers','openTickets','openDisputes','totalServices','totalOrders'));
    }

    public function tickets() {
        $tickets = Ticket::with('user')->orderBy('created_at','desc')->paginate(15);
        return view('moderator.tickets',compact('tickets'));
    }

    public function ticket($id) {
        $ticket = Ticket::with('replies')->whereId($id)->first();
        return view('moderator.ticket',compact('ticket'));
    }

    public function disputes() {
        $disputes = Dispute::orderBy('created_at','desc')->paginate(15);
        return view('moderator.disputes',compact('disputes'));
    }

    public function dispute($id) {
        $dispute = Dispute::with('order','replies.user')->whereId($id)->first();
        $order = Order::whereId($dispute->order_id)->first();

        $conversation = Conversation::with('messages.user')->where(function($q) use($order) {
            $q->where('user_one',$order->buyer_id)->where('user_two',$order->seller_id);
        })->orWhere(function($q) use($order) {
            $q->where('user_one',$order->seller_id)->where('user_two',$order->buyer_id);
        })->first();


        return view('moderator.dispute',compact('dispute','conversation'));
    }

    public function disputeReply(Request $request) {
        $dispute = Dispute::whereId($request->id)->where('status',0)->first();
        if($dispute == null) return redirect()->back()->with(['error' => 'Dispute not found.']);
     
        $reply = new DisputeReply;
        $reply->dispute_id = $dispute->id;
        $reply->message = $request->reply;
        $reply->staff_id = Auth::id();
        $reply->save();
        return redirect()->back();
    }
    
    public function disputeDecisionRefund($id) {
        $dispute = Dispute::whereId($id)->where('status',0)->first();
        if($dispute == null) return redirect()->back()->with(['error' => 'Dispute not found.']);
        $order = Order::where('status',2)->where('escrow',1)->whereId($dispute->order_id)->first();
        if($order == null) return redirect()->back()->with(['error' => 'Order not found.']);
        $user = User::whereId($order->buyer_id)->first();
        $user->points = floatval($user->points) + floatval($order->price);
        $user->save();

        $order->escrow = 0;
        $order->status = 3;
        $dispute->admin_id = Auth::id();
        $dispute->status = 1;
        $dispute->save();
        $order->save();

        return redirect()->back()->with(['success' => 'Buyer has been refunded.']);

    }

    public function disputeDecisionSeller($id) {
        $dispute = Dispute::whereId($id)->where('status',0)->first();
        if($dispute == null) return redirect()->back()->with(['error' => 'Dispute not found.']);
        $order = Order::where('status',2)->where('escrow',1)->whereId($dispute->order_id)->first();
        if($order == null) return redirect()->back()->with(['error' => 'Order not found.']);
        $user = User::whereId($order->seller_id)->first();
        $order->status = 4;
        if($user != null) {
            $user->earned_gp = floatval($user->earned_gp) + floatval($order->price);
            $user->save();
        }
        $order->escrow = 0;
        $dispute->admin_id = Auth::id();
        $dispute->status = 2;
        $dispute->save();
        $order->save();

        return redirect()->back()->with(['success' => 'Funds released to Seller.']);

    }

    public function ticketReply(Request $request) {
      
        if(!isset($request->id) || !is_numeric($request->id)) return redirect('/');
        if(!isset($request->message) || $request->message == "" || strlen($request->message) > 3000) {
            return redirect('/moderator/ticket/'.$request->id); 
        }

        $ticket = Ticket::whereId($request->id)->first();
        if($ticket == null) return redirect('/moderator/ticket/'.$request->id); 

        $ticketReply = new TicketReply;
        $ticketReply->user_id = Auth::id();
        $ticketReply->staff_id = Auth::id();
        $ticketReply->ticket_id = $ticket->id;
        $ticketReply->message = $request['message'];
        $ticketReply->save();
        $ticket->status = '1';
        $ticket->save();
        return redirect('/moderator/ticket/'.$request->id); 
    }
    public function ticketClose(Request $request) {

        if(!isset($request->id) || !is_numeric($request->id)) return redirect('/');

        $ticket = Ticket::whereId($request->id)->where('status','<',3)->first();
        if($ticket == null) return redirect('/moderator/ticket/'.$request->id); 

        $ticket->status = 3;
        $ticket->save();

        return redirect('/moderator/ticket/'.$request->id); 
    }


}
