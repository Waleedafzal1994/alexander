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
        <!-- <div class="col-lg-4 my-1 gallery-img-item" id="gallery-id-{{ $galleryImage->id }}">
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
        </div> -->

        @endforeach
    </div>

    <!-- Gallery images section -->
    <div class="gallery lightbox">
        <div class="gallery__column">
            <a type="button" class="gallery__link">
                <figure class="gallery__thumb position-relative photos-section">
                    <img src="https://source.unsplash.com/_cvwXhGqG-o/300x300" alt="Portrait by Jessica Felicio" class="gallery__image">
                    <div class="box-shadow"></div>
                </figure>
            </a>

            <a type="button" class="gallery__link">
                <figure class="gallery__thumb position-relative photos-section">
                    <img src="https://source.unsplash.com/AHBvAIVqk64/300x500" alt="Portrait by Oladimeji Odunsi" class="gallery__image">
                    <div class="box-shadow"></div>
                </figure>
            </a>

            <a type="button" class="gallery__link">
                <figure class="gallery__thumb position-relative photos-section">
                    <img src="https://source.unsplash.com/VLPLo-GtrIE/300x300" alt="Portrait by Alex Perez" class="gallery__image">
                    <div class="box-shadow"></div>
                </figure>
            </a>
        </div>
        
        <div class="gallery__column">
            <a type="button" class="gallery__link">
                <figure class="gallery__thumb position-relative photos-section">
                    <img src="https://source.unsplash.com/AR7aumwKr2s/300x300" alt="Portrait by Noah Buscher" class="gallery__image">
                    <div class="box-shadow"></div>
                </figure>
            </a>
            
            <a type="button" class="gallery__link">
                <figure class="gallery__thumb position-relative photos-section">
                    <img src="https://source.unsplash.com/dnL6ZIpht2s/300x300" alt="Portrait by Ivana Cajina" class="gallery__image">
                    <div class="box-shadow"></div>
                </figure>
            </a>

            <a type="button" class="gallery__link">
                <figure class="gallery__thumb position-relative photos-section">
                    <img src="https://source.unsplash.com/tV_1sC603zA/300x500" alt="Portrait by Sam Burriss" class="gallery__image">
                    <div class="box-shadow"></div>
                </figure>
            </a>
        </div>
        
        <div class="gallery__column">
            <a type="button" class="gallery__link">
                <figure class="gallery__thumb position-relative photos-section">
                    <img src="https://source.unsplash.com/Xm9-vA_bhm0/300x500" alt="Portrait by Mari Lezhava" class="gallery__image">
                    <div class="box-shadow"></div>
                </figure>
            </a>
            
            <a type="button" class="gallery__link">
                <figure class="gallery__thumb position-relative photos-section">
                    <img src="https://source.unsplash.com/NTjSR3zYpsY/300x300" alt="Portrait by Ethan Haddox" class="gallery__image">
                    <div class="box-shadow"></div>
                </figure>
            </a>

            <a type="button" class="gallery__link">
                <figure class="gallery__thumb position-relative photos-section">
                    <img src="https://source.unsplash.com/2JH8d3ChNec/300x300" alt="Portrait by Amir Geshani" class="gallery__image">
                    <div class="box-shadow"></div>
                </figure>
            </a>
        </div>
    </div>

</div>