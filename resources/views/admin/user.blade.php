@extends('layouts.admin')

@section('content')
<div class="container-fluid admin-container">
    <h6>Admin Panel - Editing User {{$user->name}} - {{$user->email}}</h6>
    <small>{{date('Y-m-d H:i:s')}}</small>
    <br>
    <hr>
    <br>
    <div class="row">
        <div class="col-md-12">
            <form action="/admin/user/edit" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{$user->id}}">

                <div class="form-group">
                  <label for="">Nickname</label>
                  <input type="text" name="nickname" class="form-control" value="{{$user->name}}">
                </div>
                <div class="form-group">
                  <label for="">Name</label>
                  <input type="text" name="real_name" class="form-control" value="{{$user->real_name}}">
                </div>
                
                <div class="form-group">
                  <label for="">User Title</label>
                  <input type="text" name="user_title" class="form-control" value="{{$user->user_title}}">
                </div>
    
                <div class="form-group">
                  <label for="">User Email</label>
                  <input type="email" name="email" class="form-control" value="{{$user->email}}">
                </div>
                {{-- $table->integer('user_group')->default(0); // User, EMPTY, Moderator, Administrator
                $table->integer('user_subscription_rank')->default(0); // Standard, Premium, Premium+
                $table->integer('seller_rank')->default(0); // None, Seller, Seller+, Seller++ --}}
                <div class="form-group">
                  <label for="">User Group</label>
                  <select class="form-control" name="user_group">
                      <option value="0">User</option>
                      <option value="2">Moderator</option>
                      <option value="3">Admin</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="">Seller Rank</label>
                <select class="form-control" name="seller_rank">
                    <option value="0">None</option>
                    <option value="1">Seller</option>
                    <option value="2">Seller+</option>
                </select>
            </div>


                <div class="form-group">
                    <label for="">User Description</label>
                    <textarea cols="3" name="description" class="form-control">{{$user->description}}</textarea>
                  </div>
                
                  <button class="btn btn-primary">Save</button>
            </form>
            <br>
            <h5>Additional actions</h5>
            <hr>
            @if($user->banned == '0')
            <form action="/admin/user/ban" method="POST">
                @csrf

            <input type="hidden" name="id" value="{{$user->id}}">
            <button class="btn btn-danger">Ban User</button>
            </form>
            @else
            <form action="/admin/user/unban" method="POST">
                @csrf

                <input type="hidden" name="id" value="{{$user->id}}">
                <button class="btn btn-success">Unban User</button>
            </form>
            @endif
        </div>
    </div>

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