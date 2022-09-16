@extends('layouts.app')

@section('content')
<div class="header-page">
    <div>
        <h1>Dispute #{{$dispute->id}}</h1>
    </div>
</div>

<div class="container">
    <div style="text-align:center;">
    </div>
    <div class="card">
        <div class="card-body">
            <p>Disputed by: {{$dispute->disputer->name}} on {{$dispute->created_at}}</p>
            <p>Status:
                @php
                    switch($dispute->status) {
                        case '0':
                        echo "Open";
                        break;

                        case '1':
                        echo "Buyer Refunded";
                        break;

                        case '2':
                        echo "Funds released to Seller";
                        break;

                        default:
                        break;
                    }
                @endphp
            </p>
        </div>
    </div>


    @foreach($dispute->replies as $reply)
    <div class="card">
        @if($reply->staff_id != null)
        <div class="card-body" style="background:red; color:white;">
            @else
        <div class="card-body">
            @endif
            @if($reply->staff_id == null)
            <h4 class="card-title">{{$reply->user['name']}} <span style="float:right; font-size:12px; color:#ccc;">{{$reply->created_at}}</span></h4>
            @else
            <h4 class="card-title">GamersPlay Staff <span style="float:right; font-size:12px; color:#ccc;">{{$reply->created_at}}</span></h4>
            @endif
            <p class="card-text">{{$reply->message}}</p>
        </div>
    </div>
    @endforeach
    <br>

    @if($dispute->status == 0)
    <form action="/dispute/{{$dispute->id}}/addReply" method="POST">
    @csrf
    <h4>Add Reply</h4>
    <textarea name="message" class="form-control" cols="30" rows="3" required></textarea>
    <br>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    @endif
</div>
@endsection