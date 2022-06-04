@extends('layouts.app')
@section('content')
<div class="header-page rounded">
    <div>
        <img src="/imgs/icons/conversation.svg" alt="" srcset="" style="height:64px;">
    </div>

    <div>
        <h1>Order History</h1>
        <p>Here you may find your latest service orders.</p>
        <a href="/transactions" class="btn btn-primary">Transactions</a>

    </div>
</div>




<div class="container-fluid">

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Category</th>
                <th>Price</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if(count($orders) == 0)
            <tr>
                <td colspan="6" style="text-align:center !important;">No data found.</td>
            </tr>
            @endif
            @foreach($orders as $order)
            <tr>
                <td>{{$order->id}}</td>
                <td>{{$order->service->category->name}}</td>
                <td>{{$order->price}} GP</td>
                <td>{{$order->created_at}} ({{$order->created_at->diffForHumans()}})</td>
                <td><a href="/order/{{$order->id}}" class="btn btn-primary">View</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection