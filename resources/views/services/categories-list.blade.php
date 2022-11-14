
        <li class="nav-item active" id="{{!empty($service->category->id) ? $service->category->id : ''}}" value="{{!empty($service->category->id) ? $service->category->id : ''}}" onclick="getCategoryServices(this,this.id)">
            @if ($service->category->image_1 != null)


            <div class="categories_box_holder" style="background-image:url('{{url($service->category->image_1) }}');">
                @else
                <div class="categories_box_holder" style="background:var(--color-secondary);">
                </div>
            </div>
            @endif
        </li>



    <?php $i = 1;
    $order_arr = array();
    $order_arr[0] = $service->category->id; ?>
    @if(!empty($all_remaining_cats))
    @foreach($all_remaining_cats as $category)



    <?php array_push($order_arr, $category->id); ?>



    <li class="nav-item" id="{{$category->id}}" onclick="getCategoryServices(this,this.id)" role="presentation" value="{{$category->id}}">
        @if($category->image_1 != null)
        <div class="categories_box_holder" style="background-image:linear-gradient(rgba(0,0,0,0.0),rgba(0,0,0,0.0)),url({{url($category->image_1)}});">

        </div>
        @else
        <div class="categories_box_holder" style="background:var(--color-secondary);">
        </div>
        @endif

    </li>


@if($i >= 3)
@break



@endif
<?php $i++; ?>
@endforeach



<input type="hidden" name="" id="cat_ord_arr" value="<?= !empty($order_arr) ? implode(',', $order_arr) : ''; ?>">

@endif

@if(!empty($all_remaining_cats) && (count($all_remaining_cats) >=4))

<li class="nav-item more-section mr-0" role="presentation" id="{{$category->id}}" onclick="getCategoryServices(this,'more')" >
    <a class="nav-link p-0 ml-auto menu-icon" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false" style="background-image:url({{asset('imgs/more-services-img.svg')}}) !important; backdrop-filter: blur(4px); background-repeat: no-repeat;" >
        <div class="categories_box_holder">
            <div class="d-flex align-items-end">
                <p class="text-white mb-0">Browse <br> more Services</p>
                <div class="d-flex mb-1">
                    <img src="{{asset('imgs/icons/service-arrow.svg')}}" class="mr-2" alt="">
                    <img src="{{asset('imgs/icons/service-arrow.svg')}}" alt="">
                </div>
            </div>
        </div>
    </a>
</li>
@endif





<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"/> 

<div class="recommended">
    <div class="position-relative game-carousel">
        <div class="owl-carousel owl-theme">
            <div class="item">
                <a href="">
                    <img src="{{asset('imgs/game-1.svg')}}" alt="">
                </a>
            </div>
            <div class="item">
                <a href="">
                    <img src="{{asset('imgs/game-4.svg')}}" alt="">
                </a>
            </div>
            <div class="item">
                <a href="">
                    <img src="{{asset('imgs/game-3.svg')}}" alt="">
                </a>
            </div>
            <div class="item">
                <a href="">
                    <img src="{{asset('imgs/game-4.svg')}}" alt="">
                </a>
            </div>
            <div class="item">
                <a href="">
                    <img src="{{asset('imgs/game-5.svg')}}" alt="">
                </a>
            </div>
            <div class="item">
                <a href="">
                    <img src="{{asset('imgs/game-6.svg')}}" alt="">
                </a>
            </div>
            <div class="item">
                <a href="">
                    <img src="{{asset('imgs/game-1.svg')}}" alt="">
                </a>
            </div>
        </div>
        <div class="browse-more-games menu-icon">
            <div class="browse-text d-flex align-items-end">
                <p class="text-white mb-0">Browse <br> more Services</p>
                <div class="d-flex mb-1">
                    <img src="{{asset('imgs/icons/service-arrow.svg')}}" class="mr-2" alt="">
                    <img src="{{asset('imgs/icons/service-arrow.svg')}}" alt="">
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<script>
    $('#owlCarouselEvents').owlCarousel({
        loop:true,
        margin:24,
        nav:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:2
            },
            1000:{
                items:3
            },
            1400:{
                items:4
            }
        }
    });
    $('#owlCarouselGames').owlCarousel({
        loop:true,
        margin:24,
        nav:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:2
            },
            1000:{
                items:4
            },
            1400:{
                items:6
            },
            1600:{
                items:7
            }
        }
    });

</script> -->