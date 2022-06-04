@extends('layouts.app')

@section('style')
<style>
    .black-box {
        border-radius:4px; background:black; color:white; padding:5px; max-height:500px; overflow:auto;
        font-family:monospace !important;
    }

    .black-box div, .black-box span, .black-box div span {
        font-family:monospace !important;
    }
</style>
@endsection

@section('content')
<div class="header-page">
    <div>
        <a href="/moderator/disputes" class="btn btn-primary" style="margin:5px 0;">Back to Disputes</a>
        <h1>Dispute #{{$dispute->id}}</h1>
        <p>Here you may find info regarding this particular dispute.</p>
    </div>
</div>

<div class="container-fluid">
<h4>Details</h4>
<p><strong>Order Amount:</strong> {{$dispute->order['price']}} GP</p>
<p><strong>Created at:</strong> {{$dispute->order['created_at']}}</p>
<p><strong>Disputed by:</strong> {{$dispute->disputer['name']}}</p>
<p><strong>Service:</strong> <a href="/service/{{$dispute->order['service_id']}}">View</a></p>
<br>
<div class="row">
    <div class="col-md-6">
    <h4>Messages History</h4>
    <small>History of messages between two disputed users.</small>
    <hr>
    <div style="border-radius:4px; background:black; color:white; padding:5px; max-height:500px; overflow:auto;">
    @foreach($conversation->messages as $message)
    <div style="font-family:monospace !important;">
        @if($message->user['id'] == null)
        <span style="color:red;">SYSTEM:</span>
        @else
    
            @php
                if($message->user->id == $dispute->order['buyer_id'])
                echo "<span style='color:limegreen;'>Buyer </span>";
                    else           echo "<span style='color:yellow;'>Seller </span>";

            @endphp
            <span>{{$message->user->name}}:</span>

        @endif
        {{$message->message}}
        <span style="color:#555;">{{$message->created_at}}</span>
        </div>
    @endforeach
    </div>
    </div>
    <div class="col-md-6">
    <h4>Dispute & Replies</h4>
    <small>Dispute process messages.</small>
    <hr>
    <div class="black-box">
        <div style="font-family:monospace !important;">

        <span style="color:red;">SYSTEM:</span>
        <span style="font-family:monospace !important;">Dispute created on {{$dispute->created_at}}</span>
        </div>
        @foreach($dispute->replies as $message)
        <div>

            @if($message['staff_id'] != null)
            <span style="color:red;">GamersPlay Staff:</span>
            @else
    
                @php
                    if($message['user_id'] == $dispute->order['buyer_id'])
                    echo "<span style='color:limegreen;'>Buyer </span>";
                        else           echo "<span style='color:yellow;'>Seller </span>";

                @endphp
                @if($message['user_id'] != null)
                <span style="font-family:monospace !important;">{{$message->user->name}}:</span>
                @endif
            @endif
            {{$message->message}}
            <span style="color:#555;">{{$message->created_at}}</span>
            </div>
        @endforeach
    </div>
    </div>
</div>
<br>
<hr>
@if($dispute->status == 0)
<h4>Actions</h4>
<div class="row">
    <div class="col-md-12">
        <form method="POST" action="/moderator/dispute/{{$dispute->id}}/release" style="display:inline;">
            @csrf
        <button type="submit" class="btn btn-primary">Release to Seller</button>
        </form>
        <form  method="POST" action="/moderator/dispute/{{$dispute->id}}/refund" style="display:inline-block;">
            @csrf
        <button type="submit" class="btn btn-primary">Refund Buyer</button>
        </form>
    </div>
</div>


<br>
<br>
<h4>Add Reply</h4>
<small>Your reply will be added to the dispute & replies section and will be visible to both parties.</small>
<form action="/moderator/dispute/{{$dispute->id}}/reply" method="POST">
@csrf
<textarea name="reply" class="form-control" cols="30" rows="3" style="max-width:100%;" required></textarea>
<br>
<button class="btn btn-primary">Reply</button>
</form>
@endif
</div>
@endsection


@push('scripts')
    <script>
        @if (\Session::has('success'))
        Swal.fire('Success','{{\Session::get('success')}}','success');
        {{\Session::forget('success')}}
        @endif

        @if (\Session::has('error'))
        Swal.fire('Error','{{\Session::get('error')}}','error');
        {{\Session::forget('error')}}
        @endif
    </script>
@endpush