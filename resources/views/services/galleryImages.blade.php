@php
$userGallery = $service->user->imagesAsArray;
// $userGallery = $service->user
// ->imagesAsArray()
// ->get()
// ->toArray();
@endphp
<div class="lightbox lightbox-user-gallery">
    <!-- <div class="row">
        @foreach ($userGallery as $galleryImage)
        <div class="col-lg-4 my-1 gallery-img-item" id="gallery-id-{{ $galleryImage->id }}">
            <div class="position-relative photos-section">
                <img src="{{ $galleryImage->file_name }}" data-mdb-img="{{ $galleryImage->file_name }}" alt="" class="w-100 shadow-1-strong rounded img-bg-overlay">
                <div class="box-shadow"></div>
            </div>
            <div class="likes gallery-reaction " data-gallery-image-id="{{ $galleryImage->id }}" data-gallery-reaction-id="{{ $galleryImage->likedPost() }}">
                <span class="gallery-like-heart heart float-left {{ $galleryImage->userliked() ? 'active-heart' : '' }}"><i class="fas fa-heart"></i></span>
                <span class="liked_gallery_count" id="liked_gallery_count-{{ $galleryImage->id }}">{{ $galleryImage->likes->count() }}</span>
                @auth
                @if (Auth::user()->id == $service->user->id)
                <span class="delete-gallery float-right" id="delete-gallery-{{ $galleryImage->id }}" data-delete-post-id="{{ $galleryImage->id }}" title="Delete"><i class="fas fa-trash"></i></span>
                @endif
                @endauth
            </div>
        </div>

        @endforeach
    </div> -->

    <!-- Gallery images section -->
    <div id="gallery" class="gallery-section">
        <div class="w-100 bg-white">
            @foreach ($userGallery as $galleryImage)
            <img src="{{ $galleryImage->file_name }}" class="img-responsive">
            <div class="likes gallery-reaction " data-gallery-image-id="{{ $galleryImage->id }}" data-gallery-reaction-id="{{ $galleryImage->likedPost() }}">
                <span class="gallery-like-heart heart float-left {{ $galleryImage->userliked() ? 'active-heart' : '' }}"><i class="fas fa-heart"></i></span>
                <span class="liked_gallery_count" id="liked_gallery_count-{{ $galleryImage->id }}">{{ $galleryImage->likes->count() }}</span>
                @auth
                @if (Auth::user()->id == $service->user->id)
                <span class="delete-gallery float-right" id="delete-gallery-{{ $galleryImage->id }}" data-delete-post-id="{{ $galleryImage->id }}" title="Delete"><i class="fas fa-trash"></i></span>
                @endif
                @endauth
            </div>
            @endforeach
            <!-- <img src="https://source.unsplash.com/1024x768?female,portrait" class="img-responsive">
            <img src="https://source.unsplash.com/1366x768?female,portrait" class="img-responsive">
            <img src="https://source.unsplash.com/1920x1080?female,portrait" class="img-responsive">
            <img src="https://source.unsplash.com/640x360?female,portrait" class="img-responsive">
            <img src="https://source.unsplash.com/320x640?female,portrait" class="img-responsive">
            <img src="https://source.unsplash.com/1200x1600?female,portrait" class="card img-responsive">
            <img src="https://source.unsplash.com/800x600?female,portrait" class="img-responsive">
            <img src="https://source.unsplash.com/600x800?female,portrait" class="img-responsive">
            <img src="https://source.unsplash.com/400x600?female,portrait" class="img-responsive">
            <img src="https://source.unsplash.com/600x400?female,portrait" class="img-responsive">
            <img src="https://source.unsplash.com/1100x1600?female,portrait" class="img-responsive">
            <img src="https://source.unsplash.com/1600x1100?female,portrait" class="img-responsive">
            <img src="https://source.unsplash.com/992x768?female,portrait" class="img-responsive">
            <img src="https://source.unsplash.com/768x992?female,portrait" class="img-responsive"> -->
        </div>
    </div>

</div>