@extends('layouts.admin')

@section('style')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
<style type="">
    .choices__input{
      display: none;
    }

</style>
@endsection
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
                 @if(!empty($user->general_badge))
                                
                  @php
                    $g_badge = explode(',',$user->general_badge)
                  @endphp
                  @endif    
                <div class="form-group">
                    <label for="">General Badges</label>
                  <select class="form-control" id="choices-multiple-remove-button"  multiple  name="general_badge[]" >
                      <option value="elite" <?= (!empty($g_badge) && in_array("elite",$g_badge)) ? "selected" : '' ?>>
                      Elite GamersPlay+
                    </option>
                      <option value="top" <?= (!empty($g_badge) && in_array("top",$g_badge)) ? "selected" : '' ?>>Top GamersPlay+</option>
                      <option value="vip"  <?= (!empty($g_badge) && in_array("vip",$g_badge)) ? "selected" : '' ?>>VIP +</option>
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

<script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>

<script>
$(document).ready(function(){
    
     var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
        removeItemButton: true,
        // maxItemCount:5,

        // searchEnabled: false,
        // searchChoices: false,
        placeholder: true,
        placeholderValue: 'Select General Basdge',
        // renderChoiceLimit:5
      }); 
     
     
 });

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