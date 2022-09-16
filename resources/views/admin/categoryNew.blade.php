@extends('layouts.admin')

@section('content')
<div class="container-fluid admin-container">
    <h6>Admin Panel - Create New Category </h6>
    <small>{{date('Y-m-d H:i:s')}}</small>
    <p>Below you may add a new category to GamersPlay.</p>
    <br>
    <hr>
    <form action="/admin/createCategory" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="">Name</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="">Menu</label>
        <select name="menu" class="form-control" required>
            @foreach($menus as $menu)
            <option value="{{$menu->id}}">{{$menu->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="">Image</label>
        <input type="file" name="image" class="form-control">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    </form>
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