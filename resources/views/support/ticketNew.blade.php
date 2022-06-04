@extends('layouts.app')

@section('content')
<div class="header-page rounded">
    <div>
        <img src="/imgs/icons/customer-service.png" alt="">
    </div>
    <div>
        <h1>Support - Create new Request</h1>
        <p>Below you may submit a new ticket.</p>
    </div>
</div>

<div class="container-fluid">
  <form action="/support/new/ticket" method="POST">
    @csrf
    <div class="form-group">
      <label for="">Title</label>
      <input type="text" name="title" class="form-control" required>
    </div>
    <div class="form-group">
      <label for="">Message</label>
      <textarea name="message" id="" cols="30" rows="3" class="form-control" required></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
   </form>
    
</div>
@endsection