@extends('layouts.admin')

@section('content')
<div class="container-fluid admin-container">
    <h6>Admin Panel - Edit Service </h6>
    <small>{{date('Y-m-d H:i:s')}}</small>
    <p>Below you may edit service info.</p>
    <br>
    <hr>
    
    <form action="/admin/updateService" method="POST">
    <input type="hidden" name="id" value="{{$service->id}}">
   
    @csrf
    <div class="form-group">
        <p>Service: <a href="/service/{{$service->id}}">{{$service->name}}</a></p>
        <p>Service created by: <a href="/profile/{{$service->user->id}}">{{$service->user->name}}</a></p>
    </div>
    <div class="form-group">
        <label for="">Name</label>
        <input type="text" name="name" class="form-control" value="{{$service->name}}" required>
    </div>
    <div class="form-group">
        <label for="">Category</label>
        <select name="category"  class="form-control" required>
            @foreach($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="">Price</label>
        <input type="number" name="price" class="form-control" step="0.01" min="0.01" value="{{$service->price}}" required>
    </div>

    @if($service->images != null && count($service->images) > 0)
    <div class="form-group" id="images">
        <label for="">Images</label>
        <div style="display:flex; flex-wrap:wrap;" id="imagesDiv">@foreach($service->images as $serviceImage)
        <div class="admin-service-image" id="image_{{$serviceImage->id}}" data-id="{{$serviceImage->id}}">
            <img src="/{{$serviceImage->file_name}}">
        </div>
        @endforeach</div>

    </div>
    @endif

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
    </form>
</div>    
@endsection

@push('scripts')
<script>

    $('.admin-service-image').click(function (e) { 
        e.preventDefault();
        var imageID = this.dataset.id;
        var a = confirm('Please confirm image deletion.');
        if(a) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "/admin/deleteServiceImage",
                data: {id:imageID},
                success: function (response) {
                    $('#image_' + imageID).remove();
                    if($('#imagesDiv').html() == '') {
                        $('#images').remove();
                    }
                }
            });
        }
    });

    $(document).ready(function () {
        $('select[name="category"]').val('{{$service->category_id}}');
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