@extends('layouts.app')


@section('content')

<div class="header-page rounded">
    <div>
        <h1>Orders</h1>
        <p>Here you may find all current orders you have received as a Seller.</p>
    </div>
</div>
<div class="container-fluid">

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Service</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <td>{{$order->id}}</td>
                    <td>{{$order->service->name}}</td>
                    <td>{{$order->price}}</td>
                    <td>
                        @php
                        // 0 - Created (funds in escrow), 1 - Complete, 2 - Under Dispute, 3 - Dispute buyer won, 4 - Dispute seller won
                        switch($order->status) {
                            case '0':
                                echo 'Created';
                            break;
                            case '1':
                                echo 'Complete';
                            break;
                            case '2':
                                echo 'Under Dispute';
                            break;
                            case '3':
                                echo 'Dispute';
                            break;
                            case '4':
                                echo 'Dispute';
                            break;
                            case '5':
                                echo 'Cancelled';
                            break;

                            default:
                            echo 'Created';
                        }
                        @endphp
                    </td>
                    <td>
                        <a href="/order/{{$order->id}}" class="btn btn-primary">View</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{$orders->links()}}
    </div>
</div>
@endsection