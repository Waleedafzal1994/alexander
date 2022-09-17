@extends('layouts.app')

@section('content')
<div class="header-page">
    <div>
        <a href="/moderator" class="btn btn-primary" style="margin:5px 0;">Back to Moderator Panel</a>
        <h1>Tickets</h1>
        <p>Here you may find all the tickets.</p>
    </div>
</div>

<div class="container-fluid">
    <div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Ticket by</th>
                <th>Status</th>
                <th>Created at</th>
                <th> </th>
            </tr>
        </thead>
        <tbody>
            @foreach($tickets as $ticket)
            <tr>
                <td>{{$ticket->id}}</td>
                <td>{{$ticket->title}}</td>
                <td><a href="/profile/{{$ticket->user->id}}">{{$ticket->user->name}}</a></td>
                <td>
                    {{-- // 0 - open, 1 - Staff Reply, 2 - Waiting for reply, 3 - closed --}}

                    @php
                 switch ($ticket->status) {
                     case '0':
                         echo 'Open';
                         break;
                     case '1':
                         echo 'Staff Reply';
                         break;
                     case '2':
                         echo 'Waiting for Reply';
                         break;
                     case '3':
                         echo 'Closed';
                         break;
                     
                     default:
                         # code...
                         break;
                 }   
                @endphp
                </td>
                <td>{{$ticket->created_at->diffForHumans()}}</td>
                <td><a href="/moderator/ticket/{{$ticket->id}}" class="btn btn-primary">View</a></td>
            </tr>
            @endforeach
            @if(count($tickets) == 0)
            <td colspan="6" style="text-align:center !important;">No data found.</td>
            @endif
        </tbody>
    </table>
</div>
    {{$tickets->links()}}

</div>

@endsection