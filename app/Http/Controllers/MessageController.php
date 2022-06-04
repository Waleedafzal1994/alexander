<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conversation;
use App\Models\Message;
use App\Models\User;
use Auth;
use Carbon\Carbon;
use App\Events\UserEvent;

class MessageController extends Controller
{

    public function test() {
        return view('chat.chat');
    }

    public function getMessages(Request $request) {
        if(!isset($request->conversation)) {
            $conversations = Conversation::with('userOne','userTwo')->where('user_one',Auth::id())->orWhere('user_two',Auth::id())->orderBy('updated_at','desc')->paginate(30);
            // $conversations = Conversation::with('userOne','userTwo')->where('user_one',Auth::id())->orWhere('user_two',Auth::id())->orderBy('updated_at','desc')->get()->take(30);
            $data = ['conversations' => $conversations, 'currentUserID' => Auth::id()];
            return json_encode($data);
        } else {
            if(is_numeric($request->conversation)) {
                if(Conversation::whereId($request->conversation)->where(function($query) {
                    $query->where('user_one',Auth::id())->orWhere('user_two',Auth::id());
                })->exists()) {
                  

                    $messages = Message::with('userPhoto')->where('conversation_id',$request->conversation)->orderBy('created_at','desc')->paginate(30);
                    $sortedResult = $messages->getCollection()->sortBy(['id','asc'])->values();
                    $messages->setCollection($sortedResult);

                    $data = ['messages' => $messages, 'currentUserID' => Auth::id()];
                    return json_encode($data);
                }
            }
         
        }
       
    }

    public function send(Request $request) {
     $validatedData = $request->validate([
         'id' => 'integer|nullable',
         'conversation' => 'integer|nullable',
         'message' => 'required|max:1000'
     ]);

     

     if(isset($validatedData['id']) && $validatedData['id'] != null) {

        // ========================= Logic for sending a message to a user ID ====================
  
        $user = User::whereId($validatedData['id'])->first();
        if($user == null || $user->id == Auth::id()) {
            return 'error';
        }
   
        // where user 2 is id


        $conversation = Conversation::where(function($query) use ($user) {
            $query->where('user_one',Auth::id());
            $query->where('user_two',$user->id);
        })->orWhere(function($query) use ($user) {
            $query->where('user_one',$user->id);
            $query->where('user_two',Auth::id());
        })->first();

        $conversation = Conversation::where('user_one',Auth::id())->orWhere('user_two',Auth::id())->first();
        if($conversation == null) {
            $conversation = new Conversation;
            $conversation->user_one = Auth::id();
            $conversation->user_two = $user->id;
            $conversation->last_message = Carbon::now();
            $conversation->save();
        }
   
     } else if(isset($validatedData['conversation']) && $validatedData['conversation'] != null) {
                 // ========================= Logic for sending a message to a conversation ID ====================

        $conversation = Conversation::where('user_one',Auth::id())->orWhere('user_two',Auth::id())->first();

        $conversation = Conversation::whereId($validatedData['conversation'])->where(function($query) {
            $query->where('user_one',Auth::id())->orWhere('user_two',Auth::id());
        })->first();

        if($conversation == null) {
            return false;
         }

         if($conversation['user_one'] == Auth::id()) {
            $user = User::whereId($conversation['user_two'])->first();
         } else {
             $user = User::whereId($conversation['user_one'])->first();
         }
         
     }

        // =========== same logic for both cases once we have decided a conversation ID

        $conversation_id = $conversation->id;

    
        $message = new Message;
        $message->message = $validatedData['message'];
        $message->conversation_id = $conversation_id;
        $message->user_id = Auth::id();
        $message->created_at = Carbon::now();
        $message->save();

        
        $messageToReturn = Message::with('userPhoto')->whereId($message->id)->first();
        event(new UserEvent($user,$messageToReturn,'message'));
        return ['status' => 'success', 'conversation' => $conversation_id, 'message' => $messageToReturn];
        



    }

    public function dispatchEvent() {
        event(new UserEvent(Auth::user(),'Testing a private channel.','message'));
    }

    public function fetchNextMessagesPage(Request $request) {
        if(!$request->conversation || !is_numeric($request->conversation)) {
            return false;
        }
        $conversation = Conversation::with('userOne','userTwo')->where('user_one',Auth::id())->orWhere('user_two',Auth::id())->orderBy('updated_at','desc')->first();
        if($conversation == null) {
            return false;
        }
        
        $messages = Message::with('userPhoto')->where('conversation_id',$conversation->id)->orderBy('created_at','desc')->paginate(30);

    }

    public function fetchNewConversation(Request $request) {
        $validatedData = $request->validate([
            'id' => 'integer'
        ]);

        if(!isset($validatedData['id']) || !is_numeric($validatedData['id'])) {
            return;
        }

        $conversation = Conversation::with('userOne','userTwo')->whereId($validatedData['id'])->where(function($query) {
            $query->where('user_one',Auth::id())->orWhere('user_two',Auth::id());
        })->first();

        return json_encode($conversation);
    }
}
