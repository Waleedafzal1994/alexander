<div class="main-services">
    <div id="" class="service_category main-category">
        <ul class="menu_ul nav nav-pills top-head-cate position-relative flex-nowrap" id="pills-tab" role="tablist">

            @include('services.categories-list')
        </ul>
    </div>

    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            @include('services.dynamic-service-tabs')
        </div>

        <!-- <div class="tab-pane more_section"> -->
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                <div class="card-body bg-transparent br-10 shadows">
                    <div class="service-main-body-content">
                        <!-- <div id="more_section_content" class="service_category  main-category"> -->
                        <div class="service_category main-category more-cards">

                            <div class="row">
                                <div class="col-4 mb-4 pb-5 pointer" id="{{!empty($service->category->id) ? $service->category->id : ''}}" onclick="getCategoryServices(this,this.id)">
                                    @if ($service->category->image_1 != null)

                                    <div class="game-img">
                                        <img class="rounded" src="{{ url($service->category->image_1) }}">
                                    </div>
                                    @else

                                    <div style="background:var(--color-secondary);">
                                    </div>

                                    @endif
                                    <h2>{{ $service->category->name }}</h2>
                                    <small>{{ $minPrice->minPrice .'/'. $minPrice->service_duration_type }}</small>
                                </div>

                                <?php $i = 1 ?>
                                @if(!empty($all_remaining_cats))
                                @foreach($all_remaining_cats as $category)
                                <div class="col-4 mb-4 pb-5 pointer" id="{{$category->id}}" onclick="getCategoryServices(this,this.id)">

                                    @if ($category->image_1 != null)

                                    <div class="game-img">
                                        <img class="rounded" src="{{ url($category->image_1) }}">
                                    </div>

                                    @else

                                    <div style="background:var(--color-secondary);">

                                    </div>

                                    @endif
                                    <h2>{{ $category->name }} </h2>
                                    <small>{{ $category->minPrice .'/'. $category->service_duration_type }}</small>
                                </div>

                                <?php $i++; ?>
                                @endforeach
                                @endif

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>    
        <!-- Modal -->

        <!-- <div class="modal fade" id="exampleModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        </div> -->

        <div class="review-section card shadows mt-4 bg-lightgrey br-16 px-3">
            <div class="card-body p-0">
                <div class="service-main-body-content">
                    <div class="row">
                        <div class="col-sm-12">
                            <span class="d-flex align-items-center justify-content-between review-header position-relative">
                                <div class="d-flex align-items-center">
                                    <h5 class="color-primary fw-bold mr-2 mb-0">Reviews</h5>
                                    <div class="tag-box">12</div>
                                </div>
                                <div class="middle-line"></div>
                                <div class="review-rating">
                                    <div class="circle">
                                        <div class="percent">
                                            <svg>
                                                <circle cx="50" cy="50" r="41"></circle>
                                            </svg>
                                            <div class="number">
                                                <h3>5.0 <br>
                                                    <img src="{{asset('imgs/icons/rating-star.svg')}}" alt="">
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @if(!empty($service->average_rate))
                                <span class="number-row-card bg-purple-gradient">
                                    {{ $service->average_rate }} <i class="fas fa-star"></i>
                                </span>
                                @endif
                            </span>

                            <div class="review-cards">
                                <!-- King Card -->
                                <div class="main-card">
                                    <div class="card border-0 bg-darkgrey br-12">
                                        <div class="card-body p-0">
                                            <div class="king-circle small">
                                                <div class="dark-circle bg-darkgrey">
                                                    <div class="golden-circle">
                                                        <img src="{{asset('imgs/icons/king-head.svg')}}" class="king-head" alt="">
                                                        <div class="inner-golden-circle lightbox lightbox-user-gallery h-100">
                                                            <img class="sparkle left" src="{{asset('imgs/icons/sparkle-white.svg')}}" alt="">
                                                            <img class="sparkle right" src="{{asset('imgs/icons/sparkle-white.svg')}}" alt="">
                                                            <img class="sparkle bottom" src="{{asset('imgs/icons/sparkle-mini.svg')}}" alt="">
                                                            <img src="{{asset('imgs/hailey-marcie.svg')}}" alt="" class="profile-image-v2" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                                           
                                            <div class="">
                                                <div class="card-title">Hailey Marcie</div>
                                                <div class="card-text">CEO <sup>.</sup> GamersPlay+</div>
                                            </div>
                                        </div>
                                        <div class="card-rating d-flex align-items-center">
                                            <div class="text-star">
                                                <img src="{{asset('imgs/icons/rating-star.svg')}}" width="14" class="mr-1" alt="">
                                                <span>5.0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-end mt-12">
                                        <div class="gamerHash mr-3">13 October 2022</div>
                                        <div class="dots-dropdown dropdown">
                                            <a class="nav-link dropdown-toggle text-white" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fa-solid fa-ellipsis"></i>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                                <a class="dropdown-item" href="#">First Item</a>
                                                <a class="dropdown-item" href="#">Second One</a>
                                                <a class="dropdown-item" href="#">The last but not the least</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="review-description ml-2 pl-1">
                                        Excellent services, recommended ! I would buy again ++
                                    </div>
                                </div>

                                <!-- Golden Card -->
                                <div class="main-card">
                                    <div class="card border-0 bg-darkgrey grey_white br-12">
                                        <div class="card-body p-0">
                                            <div class="card-image">
                                                <div class="img-frame">
                                                <img id="circle-profile-pic" src="{{asset('imgs/jacob-oliver.svg')}}" alt="" class="" />
                                                </div>
                                            </div>
                                            <div class="">
                                                <div class="card-title">Jacob Oliver</div>
                                                <div class="card-text">Elite <sup>.</sup> GamersPlay+</div>
                                            </div>
                                        </div>
                                        <div class="card-rating d-flex align-items-center">
                                            <div class="text-star">
                                                <img src="{{asset('imgs/icons/rating-star.svg')}}" width="14" class="mr-1" alt="">
                                                <span>5.0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-end mt-12">
                                        <div class="gamerHash mr-3">13 October 2022</div>
                                        <div class="dots-dropdown dropdown">
                                            <a class="nav-link dropdown-toggle text-white" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fa-solid fa-ellipsis"></i>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                                <a class="dropdown-item" href="#">First Item</a>
                                                <a class="dropdown-item" href="#">Second One</a>
                                                <a class="dropdown-item" href="#">The last but not the least</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="review-description ml-2 pl-1">
                                        Excellent services, recommended ! I would buy again ++
                                    </div>
                                </div>

                                <!-- Purple Card -->
                                <div class="main-card">
                                    <div class="card border-0 bg-darkgrey purple_white br-12">
                                        <div class="card-body p-0">
                                            <div class="card-image">
                                                <div class="img-frame">
                                                <img id="circle-profile-pic" src="{{asset('imgs/hailey-james.svg')}}" alt="" class="" />
                                                </div>
                                            </div>
                                            <div class="">
                                                <div class="card-title">Hailey James</div>
                                                <div class="card-text">VIP <sup>.</sup> GamersPlay+</div>
                                            </div>
                                        </div>
                                        <div class="card-rating d-flex align-items-center">
                                            <div class="text-star">
                                                <img src="{{asset('imgs/icons/rating-star.svg')}}" width="14" class="mr-1" alt="">
                                                <span>5.0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-end mt-12">
                                        <div class="gamerHash mr-3">13 October 2022</div>
                                        <div class="dots-dropdown dropdown">
                                            <a class="nav-link dropdown-toggle text-white" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fa-solid fa-ellipsis"></i>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                                <a class="dropdown-item" href="#">First Item</a>
                                                <a class="dropdown-item" href="#">Second One</a>
                                                <a class="dropdown-item" href="#">The last but not the least</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="review-description ml-2 pl-1">
                                        Excellent services, recommended ! I would buy again ++
                                    </div>
                                </div>

                                <!-- Blue Card -->
                                <div class="main-card">
                                    <div class="card border-0 bg-darkgrey blue_white br-12">
                                        <div class="card-body p-0">
                                            <div class="card-image">
                                                <div class="img-frame">
                                                <img id="circle-profile-pic" src="{{asset('imgs/noah-henry.svg')}}" alt="" class="" />
                                                </div>
                                            </div>
                                            <div class="">
                                                <div class="card-title">Noah Henry</div>
                                                <div class="card-text">Top  <sup>.</sup> GamersPlay+</div>
                                            </div>
                                        </div>
                                        <div class="card-rating d-flex align-items-center">
                                            <div class="text-star">
                                                <img src="{{asset('imgs/icons/rating-star.svg')}}" width="14" class="mr-1" alt="">
                                                <span>5.0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-end mt-12">
                                        <div class="gamerHash mr-3">13 October 2022</div>
                                        <div class="dots-dropdown dropdown">
                                            <a class="nav-link dropdown-toggle text-white" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fa-solid fa-ellipsis"></i>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                                <a class="dropdown-item" href="#">First Item</a>
                                                <a class="dropdown-item" href="#">Second One</a>
                                                <a class="dropdown-item" href="#">The last but not the least</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="review-description ml-2 pl-1">
                                        Excellent services, recommended ! I would buy again ++
                                    </div>
                                </div>

                                <!-- Simple Card -->
                                <div class="main-card">
                                    <div class="card border-0 bg-darkgrey simple br-12">
                                        <div class="card-body p-0">
                                            <div class="card-image bg-transparent">
                                                <img id="circle-profile-pic" src="{{asset('imgs/william-lucas.svg')}}" alt="" class="" />
                                            </div>
                                            <div class="">
                                                <div class="card-title">William Lucas</div>
                                                <div class="card-text">VIP <sup>.</sup> GamersPlay+</div>
                                            </div>
                                        </div>
                                        <div class="card-rating d-flex align-items-center">
                                            <div class="text-star">
                                                <img src="{{asset('imgs/icons/rating-star.svg')}}" width="14" class="mr-1" alt="">
                                                <span>5.0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-end mt-12">
                                        <div class="gamerHash mr-3">13 October 2022</div>
                                        <div class="dots-dropdown dropdown">
                                            <a class="nav-link dropdown-toggle text-white" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fa-solid fa-ellipsis"></i>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                                <a class="dropdown-item" href="#">First Item</a>
                                                <a class="dropdown-item" href="#">Second One</a>
                                                <a class="dropdown-item" href="#">The last but not the least</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="review-description ml-2 pl-1">
                                        Excellent services, recommended ! I would buy again ++
                                    </div>
                                </div>

                                <div class="show-more-btn text-center mt-3">
                                    <button class="new-btn bg-transparent gamerHash">Show More</button>
                                </div>
                            </div>

                            <ul class="pl-4 review mt-3 mb-3">
                                @if (!empty($service->ratings))
                                @foreach ($service->ratings as $rating)
                                <li class="review-body mb-3 p-3 bg-gradient">
                                    <div class="review-head d-flex justify-content-between">
                                        <span class="review-intro p-3">
                                            <img src='{{ $rating->user->getProfilePicture() }}' alt="" />
                                            <span class="review-profile">
                                                <div class="">
                                                    <div class="d-flex align-items-center">
                                                        <p class="review-profile-heading fw-bold">
                                                            {{ $rating->user->name }}
                                                        </p>
                                                        <p class="text-black">
                                                            {{ Carbon\Carbon::parse($rating->created_at)->format('F d, Y') }}
                                                        </p>
                                                    </div>
                                                    <div class="review-comment text-black p-3">
                                                        Lorem ipsum dolor sit amet consectetur adipisicing
                                                        elit.
                                                        Molestiae aliquid quasi deleniti, nesciunt non
                                                        perspiciatis
                                                        magnam distinctio fugit tempora ut?
                                                    </div>
                                                </div>
                                                <span class="review-star mobile-star">
                                                    {!! str_repeat('<i class="fa fa-star"></i>', $rating->rating) !!}
                                                    {!! str_repeat('<i class="fa fa-star-o"></i>', 5 - $rating->rating) !!}
                                                </span>
                                            </span>
                                        </span>
                                        <span class="review-star desktop-star d-flex">
                                            {!! str_repeat('<i class="fa fa-star"></i>', $rating->rating) !!}
                                            {!! str_repeat('<i class="fa fa-star-o"></i>', 5 - $rating->rating) !!}
                                        </span>
                                    </div>
                                </li>
                                @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<script>
    function categoryId(id) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'GET',
            url: "/getCategoriesInfo/",
            data: {
                'id': id
            },
            success: function(response) {
                console.log(response);
                // if (response.status === '1') {
                $('#categoryName').html(response.name);
                $('#categoryDesc').text(response.description);
                // $('.count-following').text(response.totalfollowing);
                // $('.followers-result').html(response.followersListhtml);
                // $('.following-result').html(response.followingListhtml);
                // }
                // if (response.error === '1') {
                // Swal.fire(response.msg);
                // }    
            },
            error: function(data) {
                //console.log(data);
            }
        });


    }

    function openComfirmOrderModel(id) {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: "/services/getServiceInfoForModel",
            data: {
                'id': id
            },
            success: function(response) {

                $('#exampleModal').html(response);
                $('#exampleModal').modal({ keyboard: false });
                $('#exampleModal').modal("show");

                const li = document.querySelectorAll('#lists_li li');
                for (let i = 0; i < li.length; i++) {
                    // console.log(li[i], 'Data');
                    var list_dropdown = $(li[i]).find('a').attr('id');
                    if (id == list_dropdown) {
                        var li_data = $("#lists_li").find("#list-" + list_dropdown).attr({
                            'class': 'active'
                        });
                    }
                }

            },
            error: function(data) {
                //console.log(data);
            }
        });
    }

    function getCategoryServices(obj, id) {
        $('.nav-item').removeClass('active');
        $(obj).addClass('active');

        // Active and de-active class on more functionality Is one
        const li = document.querySelectorAll('#pills-tab li');
        // alert(li.length);
        for (let i = 0; i < li.length; i++) {
            if (id == li[i].id) {
                document.getElementById('' + li[i].id).className = "active";
            } else {
                //document.getElementById('' + li[i].id).className = "";
                //by umar
                const el = document.getElementById('' + li[i].id);
                if (el) 
                {
                    el.className = "";
                }
                
            }
        }

        // Active and de-active class on more functionality Is Done End Here

        var user_id = '<?php echo $service->user->id; ?>';
        var cat_ord_arr = $('#cat_ord_arr').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: "/services/getServiceDetailsForTab",
            data: {
                'id': id,
                'cat_ord_arr': cat_ord_arr,
                user_id: user_id
            },
            success: function(response) {
                // console.log(id,'Hello');
                if (id == 'more') {
                    $('#more_section').show();
                    $('#more_section_content').show();
                    $('#pills-contact').addClass('show active');
                    $('#pills-home').removeClass('show active');
                } else {
                    $('#pills-home').html(response.html);
                    $('#pills-home').addClass('show active');
                    $('#pills-contact').removeClass('show active');

                    // $('#more_section_content').show();
                }

                // $('#pills-contact').removeClass('show active');

                //top-head-categories//
                if (response.html2 != '') {
                    $('.top-head-cate').html(response.html2);
                }




            },
            error: function(data) {
                //console.log(data);
            }
        });
    }
</script>

