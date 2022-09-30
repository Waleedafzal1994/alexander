@extends('layouts.app')
@section('content')
<a href="/news" class="new-btn bg-white rounded-circle font-weight-bold">X</a>

<div class="container create-post">
    <div class="row">
        <div class="col-xl-6 col-lg-7 mx-auto">
            <h4 class="mb-3">Create a Post</h4>
            <div class="">
                <div class="post-img">
                    <img src="" alt="post-img">
                    <h3>Mak zinger burger</h3>
                </div>
            </div>
            <div class="upload-section">
                <p>Photo or Video</p>

                <!-- <div class="d-flex align-items-center">
                    <div class="form-group mr-3">
                        <input type="file">
                        <div class="upload-box">
                            <i class="fa-regular fa-image"></i>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="file">
                        <div class="upload-box">
                            <i class="fa-solid fa-film"></i>
                        </div>
                    </div>
                </div> -->
            
            </div>
        </div>
    </div>
</div>

@endsection