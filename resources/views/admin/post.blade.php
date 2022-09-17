@extends('layouts.admin')

@section('content')
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <style>
        .ql-editor {
            background: white !important;
            min-height: 200px;
        }

    </style>
    <div class="container-fluid admin-container">
        <h6>Admin Panel - Update Post #{{ $post->id }} </h6>
        <small>{{ date('Y-m-d H:i:s') }}</small>
        <hr>


        <h4>Updating Post</h4>
        <form action="javascript:void(0)" method="POST" enctype="multipart/form-data" id="newsUpdate">
            <input type="hidden" name="id" value="{{ $post->id }}">
            <div class="form-group">
                <label for="">Title</label>
                <input type="text" name="title" id="title" value="{{ $post->title }}" class="form-control">
            </div>
            <div class="form-group">
                @if ($post->image != null)
                    <h4>Current Post Image</h4>
                    <img src="/{{ $post->image }}" class="rounded"
                        style="height:130px;max-width:130px; object-fit:cover;">
                    <p> <small>Please select a new image if you'd like to update or leave this blank in order to not change
                            the image.</small>
                    </p>
                @endif
                <label for="">Image</label>
                <input type="file" name="image" id="image" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Content</label>
                <div id="editor">{!! $post->content !!}</div>
            </div>

            <div class="form-group">
                <button class="btn btn-primary" id="submitBtn">Update</button>
            </div>
        </form>

        <form action="/admin/news/{{ $post->id }}/delete" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger">Delete this post</button>
        </form>




    </div>
@endsection


@push('scripts')
    <!-- Include the Quill library -->
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

    <!-- Initialize Quill editor -->
    <script>
        var quill = new Quill('#editor', {
            theme: 'snow'
        });
    </script>


    <script>
        $('#newsUpdate').submit(function(e) {
            e.preventDefault();
            let formData = new FormData($('#newsUpdate')[0]);
            formData.append('content', quill.root.innerHTML);
            console.log(...formData);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: "/admin/updateNews",
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                success: (data) => {
                    window.location.reload();
                    // this.reset();
                    // window.location.reload();
                },
                error: function(data) {}
            });
        });
    </script>
@endpush
