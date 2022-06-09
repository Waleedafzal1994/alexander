@php
$userGallery = $service->user->imagesAsArray;
// $userGallery = $service->user
// ->imagesAsArray()
// ->get()
// ->toArray();
@endphp
<div class="lightbox lightbox-user-gallery">
    <div class="row">
        @foreach ($userGallery as $galleryImage)
        <div class="col-lg-4 my-1 gallery-img-item" id="gallery-id-{{ $galleryImage->id }}">
            <img src="{{ $galleryImage->file_name }}" data-mdb-img="{{ $galleryImage->file_name }}" alt="{{ $galleryImage->name }}" class="w-100 shadow-1-strong rounded mb-2 img-bg-overlay">
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
    </div>
</div>