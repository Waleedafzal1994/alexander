@extends('layouts.app')
@section('content')
    <div class="header-page">
        <div>
            <img src="/imgs/icons/conversation.svg" alt="" srcset="" style="height:64px;">
        </div>
    
        <div>
            <h1>Transaction History</h1>
            <p>Here you may find the transactions associated with your orders and financial purchases.</p>
            <a href="/orders" class="btn btn-primary">Back to Order History</a>
        </div>
    </div>
    
<div class="container-fluid">
    <table class="table">
        <thead>
            <tr>
                <th>Type</th>
                <th>Name</th>
                <th>Payment Method</th>
                <th>Payment Status</th>
                <th>Amount</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @if(count($transactions) == 0)
            <tr>
                <td colspan="6" style="text-align:center !important;">No data found.</td>
            </tr>
            @endif
            @foreach($transactions as $transaction)
            @php
                if($transaction->type == 0) {
                    $name = 'GP Refill';
                } else {
                    $name = 'Service Purchase';
                }

                if($transaction->inc_dec == 'inc') {
                    $icon = 'add';
                    $color = '#4cfa50';
                } else {
                    $icon = 'remove';
                    $color = 'red';
                }

                if($transaction->paypal_tx_id != null) {
                    $paymentMethod = 'PayPal';
                } else if($transaction->stripe_tx_id != null) {
                    $paymentMethod = 'Stripe';
                } else {
                    $paymentMethod = '';
                }

                if($transaction->payment_status === '0') {
                    $paymentStatus = 'Unpaid';
                } else if($transaction->payment_status == 1) {
                    $paymentStatus = 'Paid';
                } else {
                    $paymentStatus = '';
                }
            @endphp
            <tr>
                <td><span class="material-icons" style="color:{{$color}}">{{$icon}}</span></td>
                <td>{{$name}}</td>
                <td>{{$paymentMethod}}</td>
                <td>{{$paymentStatus}}</td>
                <td>{{$transaction->amount}} GP</td>
                <td>{{$transaction->created_at}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection