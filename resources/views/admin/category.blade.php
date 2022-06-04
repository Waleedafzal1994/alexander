@extends('layouts.admin')

@section('content')
<div class="container-fluid admin-container">
    <h6>Admin Panel - Create New Category </h6>
    <small>{{date('Y-m-d H:i:s')}}</small>
    <p>Below you may add a new category to GamersPlay.</p>
    <br>
    <hr>
    
    <form action="/admin/updateCategory" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="{{$category->id}}">
    @if($category->image_1)
    <p>Current Image</p>
    <img src="/{{$category->image_1}}" alt="" style="height:180px; object-fit:cover; border-radius:4px; max-width:180px;">
    <br>
    <br>
    @endif
    @csrf
    <div class="form-group">
        <label for="">Name</label>
        <input type="text" name="name" class="form-control" value="{{$category->name}}" required>
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
        <small>Leave this input blank if you don't want to update category image.</small>
    </div>
    <div class="form-group">
        <label for="popular">Popular         <input type="checkbox" name="popular" style="display:inline !important;" <?php if($category->popular == '1') echo "checked"; ?>>
        </label>
        <small>Check this field if you want this category to appear in Popular tab and on homepage.</small>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    </form>
</div>    
@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        $('select[name="menu"]').val('{{$category->menu_id}}');
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