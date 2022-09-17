@extends('layouts.app')

@section('content')


<div class="header-page">
  <div>
      <h1>Moderator Panel</h1>
      <p>Here you may find the various resources for moderators.</p>
  </div>
</div>

    <div class="container-fluid">

        <div class="col-md-12">
          <a href="/moderator/tickets" class="btn btn-primary">Tickets</a>
          <a href="/moderator/disputes" class="btn btn-primary">Disputes</a>
   
          <br>
          <br>
          <hr>
      </div>

      <div class="subheader-page">
          <div>
              <h5>Statistics</h5>
          </div>
      </div>
      <br>
      <div class="row">
          <div class="col-md-6">
              <div style="text-align:center;">
                <h1 class="h1-moderator-highlight"><span>{{$openTickets}}</span></h1>
                <p>Open Tickets</p>
              </div>
          </div>
          <div class="col-md-6">
              <div style="text-align:center;">
                <h1 class="h1-moderator-highlight"><span>{{$openDisputes}}</span></h1>
                <p>Open Disputes</p>
              </div>
          </div>
      </div>
      <hr>
    <div class="row">
          <div class="col-md-4">
              <div style="text-align:center;">
                <h1 class="h1-moderator-highlight"><span>{{$totalUsers}}</span></h1>
                <p>Total Users</p>
              </div>
          </div>
          <div class="col-md-4">
              <div style="text-align:center;">
                <h1 class="h1-moderator-highlight"><span>{{$totalServices}}</span></h1>
                <p>Total Services</p>
              </div>
          </div>
          <div class="col-md-4">
              <div style="text-align:center;">
                <h1 class="h1-moderator-highlight"><span>{{$totalOrders}}</span></h1>
                <p>Total Orders</p>
              </div>
          </div>
      
      </div>

    </div>

@endsection
