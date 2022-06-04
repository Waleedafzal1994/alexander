@extends('layouts.app')

@section('content')
<div class="header-page rounded">
    <div>
        <img src="/imgs/icons/customer-service.png" alt="">
    </div>
    <div>
        <h1>Support</h1>
        <p>Below you may find a history of all your support requests.</p>
    </div>
</div>

<div class="container-fluid">
    <a href="/support/new" class="btn btn-primary">New support request</a>
    <br>
    <br>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Updated</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($tickets as $ticket)
                <tr>
                    <td>{{$ticket->id}}</td>
                    <td>{{$ticket->title}}</td>
                    <td>
                        @php
                        switch($ticket->status) {
                            case '0':
                            echo "Open";
                            break;
                            case '1':
                            echo "Staff Response";
                            break;
                            case '2':
                            echo "Waiting for reply";
                            break;
                            case '3':
                            echo "Closed";
                            break;
                            default:
                            break;
                        }
                        @endphp
                    </td>
                    <td>{{$ticket->updated_at->diffForHumans()}}</td>
                    <td><a href="/support/ticket/{{$ticket->id}}" class="btn btn-primary">View</a></td>
                </tr>
                @endforeach
                @if(count($tickets) == 0)
                <td colspan="5" class="text-center">No data to show.</td>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection