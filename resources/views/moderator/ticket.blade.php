@extends('layouts.app')

@section('content')
<div class="header-page">
    <div>
        <img src="/imgs/icons/customer-service.png" alt="">
    </div>
    <div>
        <h1>Support Ticket - #{{$ticket->id}}</h1>
        <p>Below you may find the details regarding this ticket.</p>
    </div>
</div>

<div class="container-fluid">
 @if($ticket->status != '3')
    <form action="/moderator/ticket/{{$ticket->id}}/close" method="POST">
    @csrf
    <button type="submit" class="btn btn-danger">Close Ticket</button>
    </form>
    <br>
@endif
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">{{$ticket->title}} <span style="float:right; font-size:10px;">{{$ticket->created_at}}</span></h4>
            <hr>
            <p class="card-text">{{$ticket->message}}</p>
        </div>
    </div>

    <br>
    @foreach($ticket->replies as $reply)

    <div class="card">
        <div class="card-body">
            @if($reply->staff_id != null)
            <h4 style="color:red;">GamersPlay Staff <span style="float:right; font-size:10px;">{{$reply->created_at}}</span></h4>
            @else
            <h4>{{$reply->user->name}} <span style="float:right; font-size:10px;">{{$reply->created_at}}</span></h4>
            @endif
            <hr>
            <p class="card-text">{{$reply->message}}</p>
        </div>
    </div>
    @endforeach
    @if($ticket->status != '3')

<br>

    <h4>Actions</h4>

    <form action="/moderator/ticket/{{$ticket->id}}/reply" method="POST">
    @csrf
    <textarea name="message" id="" cols="30" rows="3" class="form-control"></textarea>
<br>
    <button type="submit" class="btn btn-primary">Reply</button>
    </form>
@endif
    
</div>
@endsection