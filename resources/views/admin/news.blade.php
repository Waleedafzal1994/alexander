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
        <h6>Admin Panel - News </h6>
        <small>{{ date('Y-m-d H:i:s') }}</small>
        <hr>

        <button class="btn btn-primary" id="createPostBtn">Create new post</button>

        <div id="create" style="display:none; transition:2s; transition-style:ease-in-out;">
            <h4>Create a New Post</h4>
            <form action="javascript:void(0)" method="POST" enctype="multipart/form-data" id="newsCreate">
                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" name="title" id="title" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Image</label>
                    <input type="file" name="image" id="image" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Content</label>
                    <div id="editor"></div>
                </div>

                <div class="form-group">
                    <button class="btn btn-primary" id="submitBtn">Submit</button>
                </div>
            </form>
        </div>
        <br>
        <br>
        <div style="width:100%; border-bottom:2px dashed var(--color-primary);"></div>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Date</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($news as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->created_at }}</td>
                            <td>
                                <a href="/news/{{ $post->id }}" class="btn btn-primary">View</a>
                                <a href="/admin/news/{{ $post->id }}" class="btn btn-primary">Edit</a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>





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
        $('#createPostBtn').click(function(e) {
            e.preventDefault();
            $('#create').show();
            $(this).remove();
        });



        $('#newsCreate').submit(function(e) {
            e.preventDefault();
            let formData = new FormData($('#newsCreate')[0]);
            formData.append('content', quill.root.innerHTML);
            console.log(...formData);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: "/admin/createNews",
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                success: (data) => {
                    console.log(data);
                    if (JSON.parse(data)['status'] == 'success') {
                        var a = confirm('Would you like to go to the news article?');
                        if (a) window.location = '/news/' + JSON.parse(data)['id'];
                        this.reset();
                    }
                    // this.reset();
                    // window.location.reload();
                },
                error: function(data) {}
            });
        });
    </script>
@endpush
