@extends('layouts.app')

@section('content')
<div class="header-page">
    <div>
        <a href="/moderator" class="btn btn-primary" style="margin:5px 0;">Back to Moderator Panel</a>
        <h1>Disputes</h1>
        <p>Here you may find all the disputes.</p>
    </div>
</div>

<div class="container-fluid">
    <div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Amount</th>
                <th>Disputed by</th>
                <th>Status</th>
                <th>Created at</th>
                <th> </th>
            </tr>
        </thead>
        <tbody>
            @foreach($disputes as $dispute)
            <tr>
                <td>{{$dispute->id}}</td>
                <td>{{$dispute->order->price}}</td>
                <td><a href="/profile/{{$dispute->disputer->id}}">{{$dispute->disputer->name}}</a></td>
                <td>
                    @php
                 switch ($dispute->status) {
                     case '0':
                         echo 'In Progress';
                         break;
                     case '1':
                         echo 'Buyer Refunded';
                         break;
                     case '2':
                         echo 'Seller credited';
                         break;
                     
                     default:
                         # code...
                         break;
                 }   
                @endphp
                </td>
                <td>{{$dispute->created_at->diffForHumans()}}</td>
                <td><a href="/moderator/dispute/{{$dispute->id}}" class="btn btn-primary">View</a></td>
            </tr>
            @endforeach
            @if(count($disputes) == 0)
            <td colspan="6" style="text-align:center !important;">No data found.</td>
            @endif
        </tbody>
    </table>
</div>
    {{$disputes->links()}}

</div>

@endsection