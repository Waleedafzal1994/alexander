<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Ticket;
use App\Models\TicketReply;
use Auth;

class TicketController extends Controller
{
    //

    public function index() {
        $tickets = Ticket::where('user_id',Auth::id())->paginate(30);
        return view('support.tickets',compact('tickets'));
    }
    public function new() {
        return view('support.ticketNew');
    }

    public function show($id) {
        $ticket = Ticket::with('replies.user')->where('user_id',Auth::id())->whereId($id)->first();
        if($ticket == null) return redirect('/support'); 
        return view('support.ticket',compact('ticket'));
    }
    public function create(Request $request) {
        $validated = $request->validate([
            'title' => 'required|string|max:128',
            'message' => 'required|max:5000'
        ]);

        $ticket = new Ticket;
        $ticket->user_id = Auth::id();
        $ticket->message = $validated['message'];
        $ticket->title = $validated['title'];
        $ticket->save();


        return redirect('/support/ticket/'.$ticket->id);
    }

    public function ticketReply(Request $request) {
      
        if(!isset($request->id) || !is_numeric($request->id)) return redirect('/');
        if(!isset($request->message) || $request->message == "" || strlen($request->message) > 3000) {
            return redirect('/support/ticket/'.$request->id); 
        }

        $ticket = Ticket::whereId($request->id)->where('user_id',Auth::id())->where('status','!=','3')->first();
        if($ticket == null) return redirect('/support/ticket/'.$request->id); 

        $ticketReply = new TicketReply;
        $ticketReply->user_id = Auth::id();
        $ticketReply->ticket_id = $ticket->id;
        $ticketReply->message = $request['message'];
        $ticketReply->save();
        $ticket->touch();
        return redirect('/support/ticket/'.$request->id); 
    }
    public function ticketClose(Request $request) {

        if(!isset($request->id) || !is_numeric($request->id)) return redirect('/');

        $ticket = Ticket::whereId($request->id)->where('user_id',Auth::id())->where('status','<',3)->first();
        if($ticket == null) return redirect('/support/ticket/'.$request->id); 

        $ticket->status = 3;
        $ticket->save();

        return redirect('/support/ticket/'.$request->id); 
    }

}
