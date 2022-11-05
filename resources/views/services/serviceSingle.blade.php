@extends('layouts.seller')

    @section('style')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="{{ asset('css/style-services.css?v=') . time() }}" />
        <link rel="stylesheet" href="{{ asset('css/mdb.min.css?v=') . time() }}" />
        <style>
            .progress {
                width: 100%;
                background-color: white;
            }

            .progressBar {
                width: 1%;
                height: 40px;
                background-color: white;
                text-align: center;
                line-height: 40px;
                color: white;
            }

            .progressBar.active {
                width: 1%;
                height: 40px;
                background-color: green;
                text-align: center;
                line-height: 40px;
                color: white;
            }
        </style>
    @endsection

    @section('content')
        <!-- {{-- NEW CONTENT START --}} -->
        <?php $checkBlockedUser = checkUserBloked($service->user->id)?>
        <div class="social-icons-list position-sticky d-none">
            <ul class="list mb-4">
                <li class="circle-link">
                    <a href="">
                        <img src="{{asset('imgs/front-view-icons/Twitter.png')}}" alt="">
                    </a>
                </li>
                <li class="circle-link">
                    <a href="">
                        <img src="{{asset('imgs/front-view-icons/Instagram.png')}}" alt="">
                    </a>
                </li>
                <li class="circle-link">
                    <a href="">
                        <img src="{{asset('imgs/front-view-icons/Tiktok.png')}}" alt="">
                    </a>
                </li>
                <li class="circle-link">
                    <a href="">
                        <img src="{{asset('imgs/front-view-icons/Twitch.png')}}" alt="">
                    </a>
                </li>
            </ul>    
        </div>

        <div class="gamePlay container" id="gamePlay">
            <div id="user_points" style="display: none;" value="{{Auth::user()->points}}">{{Auth::user()->points}}</div>
            <!-- START: Service Section -->
            <section class="service" id="servicePage">
                <a class="right-bottom-arrow new-purple-gradient shadows text-decoration-none" style="display: none;" id="back_to_top">
                    <div class="d-flex align-items-center justify-content-center h-100">
                        <i class="fa fa-chevron-up text-white"></i>
                    </div>
                </a>

                <div class="row">

                    <!-- START: Service Profile Side bar -->
                    <div class="col-lg-3">
                        <div class="profileBar {{!empty($checkBlockedUser) ? 'hide-on-block' : 'show-on-unblock'}}" id="profileBar_info">
                            <!-- START: Service Profile Side bar First Card -->
                            <div class="card border-0">

                                <div class="nav-button-side">
                                    <div class="mx-0 d-flex justify-content-center new-profile-section mb-4 golden-king">
                                        <div class="king-circle center-img mt-2">
                                            <div class="dark-circle">
                                                <div class="light-dark-circle">
                                                    <div class="golden-circle">
                                                        <img src="{{asset('imgs/icons/king-head.svg')}}" class="king-head" alt="">
                                                        <div class="inner-golden-circle lightbox lightbox-user-gallery h-100">
                                                            <img class="sparkle left" src="{{asset('imgs/icons/sparkle-white.svg')}}" alt="">
                                                            <img class="sparkle right" src="{{asset('imgs/icons/sparkle-white.svg')}}" alt="">
                                                            <img class="sparkle bottom" src="{{asset('imgs/icons/sparkle-mini.svg')}}" alt="">
                                                            <img class="sparkle top" src="{{asset('imgs/icons/sparkle-mini.svg')}}" alt="">
                                                            @if($service->user->getProfilePicture() != '/imgs/avatar.svg')
                                                            <img id="circle-profile-pic" src='{{ $service->user->getProfilePicture() }}' alt="" class="pointer img-fluid profile-image-v2 zoom-clicked-img h-100" />
                                                            @else
                                                                @if($service->user->gender == 'Male')
                                                                    <img src="{{URL::asset('/images/ProfilePlaceholders/male.jpg')}}">
                                                                @elseif($service->user->gender == 'Female')
                                                                    <img src="{{URL::asset('/images/ProfilePlaceholders/female.jpg')}}">
                                                                @else
                                                                    <img src="{{URL::asset('/images/ProfilePlaceholders/non-binary.jpg')}}">
                                                                @endif
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="subscribe text-center">
                                            <div class="heading">CEO - Admin</div>
                                            <div class="designation d-flex align-items-center justify-content-center">
                                                <div class="circle"></div> Online
                                                <!-- <div class="circle off"></div> Offline -->
                                            </div>
                                            <button class="new-btn text-white text-center">Subscribe</button>
                                        </div>
                                    </div>
                                    
                                    <div class="mx-0 d-flex justify-content-center new-profile-section mb-4 new-circle yellow-circle">
                                        <div class="king-circle center-img mt-2">
                                            <div class="dark-circle">
                                                <div class="inner-golden-circle position-static lightbox lightbox-user-gallery h-100">
                                                    <img class="sparkle bottom" src="{{asset('imgs/icons/sparkle-large.svg')}}" width="24" alt="">
                                                    <img class="sparkle top" src="{{asset('imgs/icons/sparkle-large.svg')}}" width="24" alt="">
                                                    @if($service->user->getProfilePicture() != '/imgs/avatar.svg')
                                                    <img id="circle-profile-pic" src='{{ $service->user->getProfilePicture() }}' alt="" class="pointer img-fluid profile-image-v2 zoom-clicked-img h-100" />
                                                    @else
                                                        @if($service->user->gender == 'Male')
                                                            <img src="{{URL::asset('/images/ProfilePlaceholders/male.jpg')}}">
                                                        @elseif($service->user->gender == 'Female')
                                                            <img src="{{URL::asset('/images/ProfilePlaceholders/female.jpg')}}">
                                                        @else
                                                            <img src="{{URL::asset('/images/ProfilePlaceholders/non-binary.jpg')}}">
                                                        @endif
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="subscribe text-center">
                                            <div class="heading">ELITE <sup>.</sup> GamersPlay+</div>
                                            <div class="designation d-flex align-items-center justify-content-center">
                                                <div class="circle"></div> Online
                                                <!-- <div class="circle off"></div> Offline -->
                                            </div>
                                            <button class="new-btn text-white text-center">Subscribe</button>
                                        </div>
                                    </div>

                                    <div class="mx-0 d-flex justify-content-center new-profile-section mb-4 new-circle purple-circle">
                                        <div class="king-circle center-img mt-2">
                                            <div class="dark-circle">
                                                <div class="inner-golden-circle position-static lightbox lightbox-user-gallery h-100">
                                                    <img class="sparkle bottom" src="{{asset('imgs/icons/sparkle-large.svg')}}" width="24" alt="">
                                                    <img class="sparkle top" src="{{asset('imgs/icons/sparkle-large.svg')}}" width="24" alt="">
                                                    @if($service->user->getProfilePicture() != '/imgs/avatar.svg')
                                                    <img id="circle-profile-pic" src='{{ $service->user->getProfilePicture() }}' alt="" class="pointer img-fluid profile-image-v2 zoom-clicked-img h-100" />
                                                    @else
                                                        @if($service->user->gender == 'Male')
                                                            <img src="{{URL::asset('/images/ProfilePlaceholders/male.jpg')}}">
                                                        @elseif($service->user->gender == 'Female')
                                                            <img src="{{URL::asset('/images/ProfilePlaceholders/female.jpg')}}">
                                                        @else
                                                            <img src="{{URL::asset('/images/ProfilePlaceholders/non-binary.jpg')}}">
                                                        @endif
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="subscribe text-center">
                                            <div class="heading">VIP <sup>.</sup> GamersPlay+</div>
                                            <div class="designation d-flex align-items-center justify-content-center">
                                                <div class="circle"></div> Online
                                                <!-- <div class="circle off"></div> Offline -->
                                            </div>
                                            <button class="new-btn text-white text-center">Subscribe</button>
                                        </div>
                                    </div>

                                    <div class="mx-0 d-flex justify-content-center new-profile-section mb-4 new-circle blue-circle">
                                        <div class="king-circle center-img mt-2">
                                            <div class="dark-circle">
                                                <div class="inner-golden-circle position-static lightbox lightbox-user-gallery h-100">
                                                    <img class="sparkle bottom" src="{{asset('imgs/icons/sparkle-large.svg')}}" width="24" alt="">
                                                    <img class="sparkle top" src="{{asset('imgs/icons/sparkle-large.svg')}}" width="24" alt="">
                                                    @if($service->user->getProfilePicture() != '/imgs/avatar.svg')
                                                    <img id="circle-profile-pic" src='{{ $service->user->getProfilePicture() }}' alt="" class="pointer img-fluid profile-image-v2 zoom-clicked-img h-100" />
                                                    @else
                                                        @if($service->user->gender == 'Male')
                                                            <img src="{{URL::asset('/images/ProfilePlaceholders/male.jpg')}}">
                                                        @elseif($service->user->gender == 'Female')
                                                            <img src="{{URL::asset('/images/ProfilePlaceholders/female.jpg')}}">
                                                        @else
                                                            <img src="{{URL::asset('/images/ProfilePlaceholders/non-binary.jpg')}}">
                                                        @endif
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="subscribe text-center">
                                            <div class="heading">TOP <sup>.</sup> GamersPlay+</div>
                                            <div class="designation d-flex align-items-center justify-content-center">
                                                <div class="circle"></div> Online
                                                <!-- <div class="circle off"></div> Offline -->
                                            </div>
                                            <button class="new-btn text-white text-center">Subscribe</button>
                                        </div>
                                    </div>

                                    <div class="mx-0 d-flex justify-content-center new-profile-section mb-4 new-circle simple-circle">
                                        <div class="king-circle center-img mt-2">
                                            <div class="dark-circle">
                                                <div class="inner-golden-circle position-static lightbox lightbox-user-gallery h-100">
                                                    @if($service->user->getProfilePicture() != '/imgs/avatar.svg')
                                                    <img id="circle-profile-pic" src='{{ $service->user->getProfilePicture() }}' alt="" class="pointer img-fluid profile-image-v2 zoom-clicked-img h-100" />
                                                    @else
                                                        @if($service->user->gender == 'Male')
                                                            <img src="{{URL::asset('/images/ProfilePlaceholders/male.jpg')}}">
                                                        @elseif($service->user->gender == 'Female')
                                                            <img src="{{URL::asset('/images/ProfilePlaceholders/female.jpg')}}">
                                                        @else
                                                            <img src="{{URL::asset('/images/ProfilePlaceholders/non-binary.jpg')}}">
                                                        @endif
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="subscribe text-center">
                                            <div class="heading">VIP <sup>.</sup> GamersPlay+</div>
                                            <div class="designation d-flex align-items-center justify-content-center">
                                                <div class="circle"></div> Online
                                                <!-- <div class="circle off"></div> Offline -->
                                            </div>
                                            <button class="new-btn text-white text-center">Subscribe</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body px-3">
                                    <div class="profile-image-part d-none">
                                        <div class="profile-background">
                                            <!-- <a href="#" class="pop">
                                                <img id="img01" src="/temp-services/images/2728343.jpg" data-mdb-img="/temp-services/images/2728343.jpg" alt="" class="img-fluid profile-background-image boder-top-left-right-radius zoom-clicked-img" />
                                            </a> -->
                                            <div class="lightbox lightbox-user-gallery">
                                                <!-- <img src="/temp-services/images/2728343.jpg" data-mdb-img="/temp-services/images/2728343.jpg" alt="" class="pointer w-100 shadows-1-strong rounded mb-2 img-bg-overlay"> -->
                                                <img src="/temp-services/images/1.webp" data-mdb-img="/temp-services/images/2728343.jpg" alt="" class="pointer w-100 shadows-1-strong rounded mb-2 img-bg-overlay">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- START: Service Social button -->

                                    <!-- END: Service Social button -->
                                    <div class="profile-info my-2 profile-name-top">
                                        <h3 class="profile-name text-center text-style-3 mb-2 profile-name-game">
                                            {{ $service->user->name ?: 'N/A' }}
                                        </h3>
                                        <div class="profile-about">
                                            <div class="lang-years my-1 d-flex align-items-center justify-content-center">
                                                <div class="profile-section-two gender pl-0">
                                                    <div class="review-body text-center">
                                                        <!-- @if($service->user->gender == 'Male') -->
                                                        <!-- <img src="{{URL::asset('/images/ProfilePlaceholders/male.jpg')}}"> -->



                                                        <!-- {{ $service->user->gender ?: 'N/A' }} -->



                                                        <!-- @elseif($service->user->gender == 'Female') -->
                                                        <!-- <img src="{{URL::asset('/images/ProfilePlaceholders/female.jpg')}}"> -->
                                                        <!-- {{ $service->user->gender ?: 'N/A' }} -->
                                                        <!-- @elseif($service->user->gender == 'Non-Binary') -->
                                                        <!-- <img src="{{URL::asset('/images/ProfilePlaceholders/non-binary.jpg')}}"> -->
                                                        <!-- {{ $service->user->gender ?: 'N/A' }} -->
                                                        <!-- @else -->
                                                        <!-- N/A -->
                                                        <!-- @endif -->
                                                        M
                                                    </div>
                                                    <p>Gender</p>
                                                </div>
                                                
                                                <div class="profile-section-two">
                                                    <div class="review-body text-center">
                                                        {{ $service->user->primary_language ?: 'N/A' }}
                                                        <!-- {{ !empty($service->user->secondary_language) ? '1/'.$service->user->secondary_language : '' }} -->
                                                    </div>
                                                    <p>Language</p>
                                                </div>

                                                <div class="profile-section-two numbers pr-0 mr-0">
                                                    <div class="review-body text-center">
                                                        {{ $service->user->getAge() ? $service->user->getAge(): '-' }}
                                                    </div>
                                                    <p>Age</p>
                                                </div>
                                            </div>

                                            <div class="range-slider">
                                                <div class="text-white">
                                                    <label>
                                                        <span class="range-slider__value"> 250</span>/400xp
                                                    </label>
                                                </div>
                                                <input class="range-slider__range" type="range" value="250" min="0" max="400">
                                                <div class="text-white d-flex align-items-center justify-content-between">
                                                    <span>Level 1</span>
                                                    <span>Level 2</span>
                                                </div>
                                            </div>

                                            <!-- <div class="d-block mt-5 pb-3"> -->
                                                <!-- <div class="new-purple-gradient text-white border-0 py-3 br-10 h-40 d-flex align-items-center justify-content-between mb-2 px-3">
                                                    <span>Avg. Response Time</span>
                                                    <span>5 - 10 Mins</span>
                                                </div> -->
                                                <!-- <div class="new-purple-gradient text-white border-0 py-3 br-10 h-40 d-flex align-items-center justify-content-between px-3 sidebar-rating">
                                                    <span>1258 Served</span>
                                                    <span class="number-row-card"><i class="fas fa-star"></i> 5.0 </span>
                                                </div> -->
                                            <!-- </div> -->

                                            <!-- <div class="badge-section my-5 d-flex align-items-center justify-content-between pb-5">

                                                @if(!empty($service->user->general_badge))

                                                @php
                                                $g_badge = explode(',',$service->user->general_badge)
                                                @endphp

                                                @if(in_array('elite',$g_badge))

                                                <div class="">
                                                    <img src="/imgs/elitegpbadge.png" width="60" alt="">
                                                    ELITE GP+
                                                </div>
                                                @else
                                                <div class="disbaled">
                                                    <img src="/imgs/elitegpbadgedisabled.png" width="60" alt="">
                                                    Elite GP+
                                                </div>
                                                @endif

                                                @if(in_array('top',$g_badge))

                                                <div class="">
                                                    <img src="/imgs/topgpbadge.png" width="60" alt="">
                                                    Top GP+
                                                </div>
                                                @else
                                                <div class="disbaled">
                                                    <img src="/imgs/topgpbadgedisabled.png" width="60" alt="">
                                                    Top GP+
                                                </div>
                                                @endif

                                                @if(in_array('vip',$g_badge))

                                                <div class="">
                                                    <img src="/imgs/vipbadge.png" width="60" alt="">
                                                    VIP+
                                                </div>
                                                @else
                                                <div class="disbaled">
                                                    <img src="/imgs/vipbadgedisabled.png" width="60" alt="">
                                                    VIP+
                                                </div>
                                                @endif

                                                @else

                                                <div class="disbaled">
                                                    <img src="/imgs/elitegpbadgedisabled.png" width="60" alt="">
                                                    Elite GP+
                                                </div>
                                                <div class="disbaled">
                                                    <img src="/imgs/topgpbadgedisabled.png" width="60" alt="">
                                                    Top GP+
                                                </div>
                                                <div class="disbaled">
                                                    <img src="/imgs/vipbadgedisabled.png" width="60" alt="">
                                                    VIP+
                                                </div>
                                                @endif


                                            </div> -->

                                            <div class="achievements text-center">
                                                <div class="">
                                                    <h4>Achievements</h4>
                                                    <div class="badges">
                                                        <img src="{{asset('imgs/icons/purple_badge.svg')}}" alt="">
                                                        <img src="{{asset('imgs/icons/blue_badge.svg')}}" alt="">
                                                        <img src="{{asset('imgs/icons/gold_badge.svg')}}" alt="">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="light-border my-5"></div>
                                            
                                            <div class="socialmedia">
                                                <ul>
                                                    <li>
                                                        <a href="">
                                                            <img src="{{asset('imgs/icons/instagram-icon.svg')}}" alt="">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <img src="{{asset('imgs/icons/tiktok-icon.svg')}}" alt="">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <img src="{{asset('imgs/icons/twitter-icon.svg')}}" alt="">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <img src="{{asset('imgs/icons/facebook-icon.svg')}}" alt="">
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="img-two-btns-row">
                                                @if(Request::segment(1) !='user-profile' || empty(Auth::id()))
                                                    <div class="">
                                                        <a class="btn-follower d-flex align-items-center justify-content-center" id="follow-checkss" type="button">{{ !empty($checkFollow) ? 'Following' : 'Follow' }} </a>
                                                        <input type="hidden" id="check-follow-toggless" value= "{{$checkFollow}}">
                                                    </div>
                                                @else    
                                                <div class=""></div>
                                                @endif

                                                @if((Request::segment(1) !='user-profile') || empty(Auth::id()) )
                                                <div class="">
                                                    <a class="btn-cust btn-width" type="button">Chat</a>
                                                </div>
                                                @else    
                                                <div class=""></div>
                                                @endif
                                            </div>

                                            <!-- <h4 class="skew-height skew-bg profile-name text-style-4 color-primary head-style-fst">
                                                About Me
                                            </h4>

                                            <p class="text-black pl-3 more-description text-justify mt-3"> {{ !empty($service->user->description) ? $service->user->description : 'N/A' }} </p>
                                            {{-- <hr class="hr-dotted-2px mt-5"> --}} -->

                                            
                                            <!-- Commented Data -->
                                            {{-- <div class="review-body">
                                                <div class="profile-section-two">
                                                    <div class="body-fluid row mt-1">
                                                        <div class="text-name col-6 text-style-5 text-start info-game-name">
                                                            Gender
                                                        </div>
                                                        <div class="text-text col-6 text-style-5 info-game-name">
                                                            {{ $service->user->gender }}
                                                        </div>
                                                    </div>
                                                    <div class="body-fluid row mt-1">
                                                        <div class="text-name col-6 text-style-5 text-start info-game-name ">
                                                            Age
                                                        </div>
                                                        <div class="text-text col-6 text-style-5 info-game-name">
                                                            {{ $service->user->getAge() }}
                                                        </div>
                                                    </div>
                                                    <div class="body-fluid row mt-1">
                                                        <div class="text-name col-6 text-style-5 text-start info-game-name">
                                                            Language
                                                        </div>
                                                        <div class="text-text col-6 text-style-5 info-game-name">
                                                            {{ $service->user->primary_language }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> --}}
                                                
                                        </div>

                                        {{-- <hr class="hr-dotted-2px py-5 mb-5"> --}}


                                        <!-- <div class="profile-about mt-3">

                                            <h4 class="skew-bg skew-height mb-4 profile-name text-style-4 color-primary font-weight-600 head-style-fst">
                                                Socials
                                            </h4>

                                            <div class="pl-3 social_icons mb-4">
                                                @if(!empty($service->user->facebook_profile) || !empty($service->user->instagram_profile) || !empty($service->user->twitch_profile) || !empty($service->user->tiktok_profile))


                                                @if(!empty($service->user->facebook_profile))
                                                <a href="{{$service->user->facebook_profile}}" target=_blank>
                                                    <i class="fab fa-facebook-f text-white"></i>
                                                </a>
                                                @endif

                                                @if(!empty($service->user->instagram_profile))
                                                <a href="{{$service->user->instagram_profile}}" target=_blank>
                                                    <i class="fab fa-instagram text-white"></i>
                                                </a>
                                                @endif

                                                @if(!empty($service->user->twitch_profile))
                                                <a href="{{$service->user->twitch_profile}}" target=_blank>
                                                    <i class="fab fa-twitch text-white"></i>

                                                </a>
                                                @endif

                                                @if(!empty($service->user->tiktok_profile))

                                                <a href="{{$service->user->tiktok_profile}}" target=_blank>
                                                    <i class="fab fa-tiktok text-white"></i>
                                                </a>
                                                @endif


                                                @else
                                                <p class="text-black">N/A</p>
                                                @endif

                                            </div>
                                        </div> -->

                                    </div>
                                </div>
                            </div>

                            <!-- <div class="card mt-4 mb-4 shadows">
                                <div class="card">
                                    <div class="profile-info-counters">
                                        <div class="social mt-0">
                                            <div class="item" id="activeTimeline">
                                                <div class="activeTimeline">
                                                    <div class="count">{{$service->user->post_count}}</div>
                                                    <div class="socialName">Posts</div>
                                                </div>
                                            </div>
                                            <div class="item" id="activefollowers">
                                                <div class="activeFollowers">
                                                    <div class="count count-followers">{{ !empty($totalFollowers) ? $totalFollowers : '0' }} </div>
                                                    <div class="socialName">Followers</div>
                                                </div>
                                                
                                            </div>
                                            <div class="item" id="activefollowing">
                                                <div class="activeFollowers">
                                                    <div class="count count-following">{{ !empty($totalfollowing) ? $totalfollowing : '0' }} </div>
                                                    <div class="socialName">Following</div>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="activeBadge">
                                                    <div class="count">

                                                        @if(!empty($service->user->general_badge))
                                                        @php
                                                        $g_badge = count(explode(',',$service->user->general_badge));
                                                        @endphp
                                                        @else
                                                        @php
                                                        $g_badge = 0;
                                                        @endphp
                                                        @endif


                                                        @if($totalOrders >= 50 && $totalOrders < 100) {{ 1 + $g_badge }} @elseif($totalOrders>= 100 && $totalOrders < 500) {{ 2 + $g_badge}} @elseif($totalOrders>= 500 && $totalOrders < 1000) {{ 3 + $g_badge}} @elseif($totalOrders>= 1000)
                                                                    {{ 4 + $g_badge}}
                                                                    @else
                                                                    {{ 0 + $g_badge}}
                                                                    @endif
                                                    </div>
                                                    <div class="socialName">Badge</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->

                            <!-- <div class="card mt-4 mb-4 shadows">
                                <div class="card">
                                    <div class="profile-info-counters">
                                        <div class="social">
                                        <p class="pl-3 mb-3 text-style-4 text-black" style="font-size: 14px;"><span class="font-weight-bold">ID:</span> {{ str_pad($service->user->id, 5, '0', STR_PAD_LEFT) }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div> -->

                            <div class="card share-and-win">
                                <div class="card-body border-0">
                                    <div class="left-bg"></div>
                                    <div class="left-bg right"></div>
                                    <div class="dots-border">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="left-circle"></div>
                                            <div class="right-heading">GamersPlay</div>
                                        </div>
                                        <div class="coins-heading d-flex align-items-center justify-content-between">
                                            <div class="">
                                                <div class="text-white font-weight-bold">Share and win</div>
                                                <div class="green">COINS!</div>
                                            </div>
                                            <div class="left-circle right"></div>
                                        </div>
                                        <div class="share-btn d-flex align-items-center justify-content-between">
                                            <a href="" type="button">
                                                <img src="{{asset('imgs/icons/f-icon.svg')}}" alt="">
                                                Facebook
                                            </a>
                                            <a href="" type="button">
                                                <img src="{{asset('imgs/icons/f-icon.svg')}}" alt="">
                                                Twitter
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- END: Service Profile Side bar First Card -->

                            <!-- <div class="card mt-4 mb-4 shadows">
                                <div class="card table-card">
                                    <h4 class="skew-bg skew-height mb-4 profile-name text-style-4 color-primary head-style-fst">
                                        Available Time
                                    </h4>
                                    <div class="table-responsive pl-20">
                                        <table class="table timeline-table" style="text-align: center">
                                            <tr>
                                                <th>Monday</th>
                                                @if (isset(explode(':', $service->monday_from)[1]) && isset(explode(':', $service->monday_to)[1]))
                                                <td>{{ explode(':', $service->monday_from)[0] . ':' . explode(':', $service->monday_from)[1] }}
                                                </td>
                                                <td>-</td>
                                                <td>{{ explode(':', $service->monday_to)[0] . ':' . explode(':', $service->monday_to)[1] }}
                                                </td>
                                                @else
                                                <td colspan="3">Unavailable</td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <th>Tuesday</th>
                                                @if (isset(explode(':', $service->tuesday_from)[1]) && isset(explode(':', $service->tuesday_to)[1]))
                                                <td>{{ explode(':', $service->tuesday_from)[0] . ':' . explode(':', $service->tuesday_from)[1] }}
                                                </td>
                                                <td>-</td>
                                                <td>{{ explode(':', $service->tuesday_to)[0] . ':' . explode(':', $service->tuesday_to)[1] }}
                                                </td>
                                                @else
                                                <td colspan="3">Unavailable</td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <th>Wednesday</th>
                                                @if (isset(explode(':', $service->wednesday_from)[1]) && isset(explode(':', $service->wednesday_to)[1]))
                                                <td>{{ explode(':', $service->wednesday_from)[0] . ':' . explode(':', $service->wednesday_from)[1] }}
                                                </td>
                                                <td>-</td>
                                                <td>{{ explode(':', $service->wednesday_to)[0] . ':' . explode(':', $service->wednesday_to)[1] }}
                                                </td>
                                                @else
                                                <td colspan="3">Unavailable</td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <th>Thursday</th>
                                                @if (isset(explode(':', $service->thursday_from)[1]) && isset(explode(':', $service->thursday_to)[1]))
                                                <td>{{ explode(':', $service->thursday_from)[0] . ':' . explode(':', $service->thursday_from)[1] }}
                                                </td>
                                                <td>-</td>
                                                <td>{{ explode(':', $service->thursday_to)[0] . ':' . explode(':', $service->thursday_to)[1] }}
                                                </td>
                                                @else
                                                <td colspan="3">Unavailable</td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <th>Friday</th>
                                                @if (isset(explode(':', $service->friday_from)[1]) && isset(explode(':', $service->friday_to)[1]))
                                                <td>{{ explode(':', $service->friday_from)[0] . ':' . explode(':', $service->friday_from)[1] }}
                                                </td>
                                                <td>-</td>
                                                <td>{{ explode(':', $service->friday_to)[0] . ':' . explode(':', $service->friday_to)[1] }}
                                                </td>
                                                @else
                                                <td colspan="3">Unavailable</td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <th>Saturday</th>
                                                @if (isset(explode(':', $service->saturday_from)[1]) && isset(explode(':', $service->saturday_to)[1]))
                                                <td>{{ explode(':', $service->saturday_from)[0] . ':' . explode(':', $service->saturday_from)[1] }}
                                                </td>
                                                <td>-</td>
                                                <td>{{ explode(':', $service->saturday_to)[0] . ':' . explode(':', $service->saturday_to)[1] }}
                                                </td>
                                                @else
                                                <td colspan="3">Unavailable</td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <th>Sunday</th>
                                                @if (isset(explode(':', $service->sunday_from)[1]) && isset(explode(':', $service->sunday_to)[1]))
                                                <td>{{ explode(':', $service->sunday_from)[0] . ':' . explode(':', $service->sunday_from)[1] }}
                                                </td>
                                                <td>-</td>
                                                <td>{{ explode(':', $service->sunday_to)[0] . ':' . explode(':', $service->sunday_to)[1] }}
                                                </td>
                                                @else
                                                <td colspan="3">Unavailable</td>
                                                @endif
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div> -->

                            <!-- END: Service Profile Side bar SECOND Card -->

                        </div>
                    </div>
                    <!-- END: Service Profile Side bar -->

                    <!-- START: Service main Body-->
                    <div class="col-lg-6">
                        <div class="mainBody">

                            <!-- START: First Card mianbody -->
                            <div class="card review-body mb-4 bg-transparent shadow-0 {{!empty($checkBlockedUser) ? 'hide-on-block' : 'show-on-unblock'}}" id="services_navbar">
                                <div class="card-body p-0">
                                    <div class="service-game-main-body">
                                        <div class="service-game-nav">
                                            <!-- START: Service main Body nav bar-->
                                            <div class="row">
                                                <!-- START: Service main Menu -->
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-tab-nav">
                                                    <ul class="nav nav-tabs nav-custom-nav  border-bottom-0" id="myTab" role="tablist">
                                                        @if(Request::segment(1) !='user-profile')
                                                        <li class="nav-item" role="presentation">
                                                            <a class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" href="#home" aria-selected="true">
                                                                Services
                                                            </a>
                                                        </li>
                                                        @endif

                                                        <li class="nav-item" role="presentation">
                                                            <a class="nav-link <?= (Request::segment(1) =='user-profile') ? 'active' : '' ?> " id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false" href="#profile">
                                                                Feeds
                                                            </a>
                                                        </li>
                                                        <li class="nav-item" role="presentation">
                                                            <a class="nav-link" id="gallery-tab" data-bs-toggle="tab" data-bs-target="#gallery" type="button" role="tab" aria-controls="gallery" aria-selected="false" href="#gallery">
                                                                Album
                                                            </a>
                                                        </li>
                                                        <li class="nav-item" role="presentation">
                                                            <a class="nav-link" id="followers-tab" data-bs-toggle="tab" data-bs-target="#followers" type="button" role="tab" aria-controls="followers" aria-selected="false" href="#followers">
                                                                About
                                                            </a>
                                                        </li>
                                                        <!-- <li class="nav-item" role="presentation">
                                                            <a class="nav-link" id="following-tab" data-bs-toggle="tab" data-bs-target="#following" type="button" role="tab" aria-controls="following" aria-selected="false" href="#following">
                                                                Following
                                                            </a>
                                                        </li> -->
                                                        <li class="nav-item" role="presentation">
                                                            <a class="nav-link" id="badges-tab" data-bs-toggle="tab" data-bs-target="#badges" type="button" role="tab" aria-controls="badges" aria-selected="false" href="#badges">
                                                                Badges
                                                            </a>
                                                        </li>
                                                        @if(!empty(Auth::id()) && (Auth::id() == $service->user->id)) 
                                                        <li class="nav-item ml-auto" role="presentation">
                                                            <!-- <a class="nav-link" id="badges-tab" href="/edit-profile/{{$service->id}}">
                                                                Edit
                                                            </a> -->
                                                            <a class="nav-link btn-active" data-bs-toggle="tab" data-bs-target="#edit_user_profile" id="edit_user_profile-tab"  type="button" role="tab" aria-controls="" aria-selected="false" href="#edit_user_profile">
                                                                <!-- href="/user-profile/{{Auth::id()}}/#edit_user_profile" -->
                                                            <i class="fa fa-cog mr-1" aria-hidden="true"></i>Settings
                                                            </a>
                                                        </li>
                                                        @endif 
                                                    </ul>
                                                </div>
                                                <!-- END: Service main Menu -->
                                                <!-- START: Service Notificaiton menu -->
                                                {{-- <div class="col-lg-5 col-md-5 col-sm-12 m-auto col-tab-nav-snd">
                                                    <ul class="service-nav-notificaiton d-flex justify-content-around">
                                                        <li class="service-notificaiton-tab col-3 col-sm-3 d-flex">
                                                            <div class="notificaiton-name">Posts</div>
                                                            <div class="notificaiton-count">1.7k</div>
                                                        </li>
                                                        <li class="service-notificaiton-tab col-4 col-sm-3 d-flex">
                                                            <div class="notificaiton-name">Followers</div>
                                                            <div class="notificaiton-count">1.3M</div>
                                                        </li>
                                                        <li class="service-notificaiton-tab col-4 col-sm-3 d-flex">
                                                            <div class="notificaiton-name">Following</div>
                                                            <div class="notificaiton-count">1200</div>
                                                        </li>
                                                    </ul>
                                                </div> --}}
                                                <!-- END: Service Notificaiton menu -->
                                            </div>
                                            <!-- END: Service main Body nav bar-->
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-content {{!empty($checkBlockedUser) ? 'hide-on-block' : 'show-on-unblock'}}" id="myTabContent">
                                @if(Request::segment(1) !='user-profile')
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    @include('services.serviceDetails', [
                                    'service' => $service,
                                    ])
                                </div>
                                @endif

                                <!-- START: Timeline Tab Start here -->
                                <div class="tab-pane fade posttimeline <?= (Request::segment(1) =='user-profile') ? 'show active' : '' ?> " id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                @include('services.servicesPost', [
                                    'service' => $service,
                                    ]) 
                                </div>

                                <!-- END: Timeline Tab END here -->
                                <!-- Badges -->
                                <div class="tab-pane fade" id="badges" role="tabpanel" aria-labelledby="badges-tab">
                                    @include('services.badges')
                                </div>

                                <!-- START: Gallery -->
                                <div class="tab-pane fade" id="gallery" role="tabpanel" aria-labelledby="gallery-tab">
                                    <div class="card mt-2 p-3 shadows">
                                        <div class="card-body ">
                                            <div class="service-main-body-content">
                                                @include('services.galleryImages', [
                                                'service' => $service,
                                                ])
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END: Gallery -->

                                <!-- START: Followers -->
                                <div class="tab-pane fade followers-result shadows rounded" id="followers" role="tabpanel" aria-labelledby="followers-tab">
                                    @include('services.followers')
                                </div>

                                <div class="tab-pane fade following-result" id="following" role="tabpanel" aria-labelledby="following-tab">
                                    @include('services.following')
                                </div>
                                <!-- END: Followers -->

                                <!-- Edit Tab Start Here for user profile to edit -->
                                <div class="tab-pane fade" id="edit_user_profile" role="tabpanel" aria-labelledby="following-tab">
                                    @include('services.edit-profile')
                                </div>
                                <!-- End Edit Tab End Here for user profile to edit -->

                                <div class="" id="hide-show-on-block">
                                    <div class="col-md-12 bg-white rounded shadow d-flex align-items-center justify-content-center block-text">
                                    <!-- <h1>1</h1> -->
                                    <!-- <input type="hidden" value="{{$checkBlockedUser}}"> -->
                                        <p class="text-center my-5 block-text">This user is blocked by <a class="block-person" href="/user-profile/{{Auth::id()}}">{{Auth::user()->name}}</a></p>
                                    </div>  
                                </div>
                            
                                @if(!empty($checkBlockedUser))
                                    <?php $getUser = getUserById($checkBlockedUser->blocker_id)?>
                                    <div class="col-md-12 bg-white rounded shadow d-flex align-items-center justify-content-center block-text" id="block-user-message">
                                    <!-- <h1>2</h1> -->
                                        <p class="text-center my-5 block-text">This user is blocked by <a class="block-person" href="/user-profile/{{$getUser->id}}">{{$getUser->name}}</a></p>
                                    </div>  
                                @endif

                            <!-- END: First Card mianbody -->

                            <!-- START: SECOND Card mianbody -->

                            <!-- END: First Card mianbody -->
                            </div>
                        </div>
                    </div>
                    <!-- END: Service main Body -->

                    <div class="col-lg-3">
                        <div class="service-type-section">
                            <div class="gp-staff mb-3">
                                <img src="{{asset('imgs/staff-img.svg')}}" class="w-100" alt="">
                                <div class="gp-staff-label">
                                    <div class="label-img">
                                        <img src="{{asset('imgs/label-img.svg')}}" class="w-100" alt="">
                                    </div>
                                    <div class="">
                                        <div class="label-heading">GamersPlay Staff</div>
                                        <div class="label-text">GP Staff</div>
                                    </div>
                                </div>
                            </div>
                            <div class="service-type">
                                <div class="card bg-lightgrey">
                                    <div class="d-flex align-items-center">
                                        <h4>Service Type</h4>
                                        <div class="tag-box">6</div>
                                    </div>
                                    <div class="card-body bg-darkgrey">
                                        <div class="card border-0 border-bg">
                                            <div class="card-body">
                                                <div class="service-title">1v1 me in rift!</div>
                                                <div class="service-btn">Buy 3 get 1 free</div>
                                                <div class="service-game-price">
                                                    <img src="{{asset('imgs/icons/currency-coin.svg')}}" alt="">
                                                    <span>17.00/ Game</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card border-0 border-bg">
                                            <div class="card-body">
                                                <div class="service-title">1v1 me in rift!</div>
                                                <div class="service-btn">Buy 3 get 1 free</div>
                                                <div class="service-game-price">
                                                    <img src="{{asset('imgs/icons/currency-coin.svg')}}" alt="">
                                                    <span>17.00/ Game</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card border-0 border-bg">
                                            <div class="card-body">
                                                <div class="service-title">1v1 me in rift!</div>
                                                <div class="service-btn">Buy 3 get 1 free</div>
                                                <div class="service-game-price">
                                                    <img src="{{asset('imgs/icons/currency-coin.svg')}}" alt="">
                                                    <span>17.00/ Game</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="play-btn">
                                            <button class="new-btn">
                                                <img src="{{asset('imgs/icons/mini-bolt.svg')}}" alt="">
                                                Play
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </section>

            <!-- Sidebar Section Start -->
            <div class="fixed-nav bg-lightgrey">
                <div class="logo menu-icon mx-auto">
                    <img src="{{asset('imgs/side-arrow.svg')}}" alt="">
                </div>

                <div class="card border-0 bg-transparent">
                    <div class="online"></div>
                    <div class="card-body card-clr p-0">
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
                    </div>
                </div>
                <div class="card border-0 bg-transparent grey_white">
                    <div class="online"></div>
                    <div class="card-body card-clr p-0">
                        <div class="card-image">
                            <div class="img-frame">
                            <img id="circle-profile-pic" src="{{asset('imgs/jacob-oliver.svg')}}" alt="" class="" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card border-0 bg-transparent purple_white">
                    <div class="online"></div>
                    <div class="card-body card-clr p-0">
                        <div class="card-image">
                            <div class="img-frame">
                            <img id="circle-profile-pic" src="{{asset('imgs/hailey-james.svg')}}" alt="" class="" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card border-0 bg-transparent blue_white">
                    <div class="online"></div>
                    <div class="card-body card-clr p-0">
                        <div class="card-image">
                            <div class="img-frame">
                            <img id="circle-profile-pic" src="{{asset('imgs/noah-henry.svg')}}" alt="" class="" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card border-0 bg-transparent simple">
                    <div class="online"></div>
                    <div class="card-body card-clr p-0">
                        <div class="card-image bg-transparent">
                            <img id="circle-profile-pic" src="{{asset('imgs/william-lucas.svg')}}" alt="" class="" />
                        </div>
                    </div>
                </div>

                <div class="question logo mx-auto menu-icon">
                    <img src="{{asset('imgs/icons/question-icon.svg')}}" alt="">
                </div>

            </div>

            <nav class="navSection">
                <div class="right-sidebar">
                    <div class="d-none h-100">
                        <div class="left-section">
                            <div class="logo menu-icon">
                                <img src="{{asset('imgs/side-arrow.svg')}}" alt="">
                            </div>

                            <div class="sidebar-content h-100 d-flex justify-content-between flex-column">
                                <div class="">
                                    <div class="nav nav-pills me-3 my-4" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                        <button class="new-btn nav-link active" id="message-tab" data-bs-toggle="pill" data-bs-target="#message" type="button" role="tab" aria-controls="message" aria-selected="true">Message</button>
                                        <button class="new-btn nav-link" id="contact-tab" data-bs-toggle="pill" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Contact</button>
                                    </div>
                                    <div class="tab-content" id="v-pills-tabContent">
                                        <div class="tab-pane fade show active" id="message" role="tabpanel" aria-labelledby="message-tab">
                                            <div class="card border-0 bg-darkgrey br-12">
                                                <div class="card-body card-clr p-0">
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
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                            <div class="d-flex align-items-start inner-tabs-btn">
                                                <div class="nav flex-column nav-pills me-3 w-100" id="contactTab" role="tablist" aria-orientation="vertical">
                                                    <button class="nav-link active" id="side-ordered-tab" data-bs-toggle="pill" data-bs-target="#side-ordered" type="button" role="tab" aria-controls="side-ordered" aria-selected="true">Home</button>

                                                    <button class="nav-link" id="side-following-tab" data-bs-toggle="pill" data-bs-target="#side-following" type="button" role="tab" aria-controls="side-following" aria-selected="false">Profile</button>
                                                    
                                                    <button class="nav-link" id="side-followers-tab" data-bs-toggle="pill" data-bs-target="#side-followers" type="button" role="tab" aria-controls="side-followers" aria-selected="false">Messages</button>
                                                    
                                                    <button class="nav-link" id="side-visitors-tab" data-bs-toggle="pill" data-bs-target="#side-visitors" type="button" role="tab" aria-controls="side-visitors" aria-selected="false">Settings</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="help-btn px-3">
                                    <button class="new-btn rounded-pill text-center w-100 text-white bg-darkgrey py-2">Need help?</button>
                                </div>
                            </div>
                        </div>
                        <div class="right-section">
                            <div class="tab-content rightMesageTabContent" id="v-pills-tabContent">
                                <div class="tab-pane fade show active" id="message" role="tabpanel" aria-labelledby="message-tab">
                                    <div class="right-main-content">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="card border-0 bg-transparent">
                                                <div class="online"></div>
                                                <div class="card-body p-0 d-flex align-items-center">
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
                                                    <div class="card-title mb-0 text-white font-20 font-weight-bold">Hailey Marcie</div>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <a type="button" class="call-now text-white me-4">
                                                    <i class="fa-solid fa-phone"></i>
                                                </a>
                                                <div class="dots-dropdown dropdown">
                                                    <a class="nav-link dropdown-toggle text-white" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fa-solid fa-ellipsis"></i>
                                                    </a>
                                                    <div class="dropdown-menu bg-darkgrey" aria-labelledby="navbarDropdownMenuLink">
                                                        <a class="dropdown-item" href="#">Follow</a>
                                                        <a class="dropdown-item" href="#">Note</a>
                                                        <a class="dropdown-item" href="#">Report</a>
                                                        <a class="dropdown-item" href="#">Mute</a>
                                                        <a class="dropdown-item" href="#">Block</a>
                                                        <div class="dropdown-divider mx-1"></div>
                                                        <a class="delete-message dropdown-item" href="#">Delete Message</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="dropdown-divider mt-4 mb-3"></div>

                                        <div class="chat-section">
                                            <div class="inner-chat-section">
                                                <div class="opacity-7 last-chat-date font-12 text-white text-center mb-3">Oct 31, 1:09 PM</div>

                                                <div class="left-chat-msg">
                                                    Hi Sallu! My name is Brian, the CEO of E-Pal. I'm glad to meet you here. if you are new comer and feel confused about E-Pal, here is an official discord group to solve your problems!
                                                </div>
                                                
                                                <div class="opacity-7 time-msg-sent font-12 text-white text-center my-2">2:45 PM</div>
                                                
                                                <div class="right-chat-msg">
                                                    Hi Sallu! My name is Brian, the CEO of E-Pal. I'm glad to meet you here. if you are new comer and feel confused about E-Pal.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="chat-footer">
                                            <div class="d-flex align-items-center w-100">
                                                <div class="price-sec bg-darkgrey">
                                                    <img src="{{asset('imgs/icons/money-sent.png')}}" width="22" alt="">
                                                </div>
                                                <div class="gallery-sec bg-darkgrey">
                                                    <input type="file">
                                                    <i class="fa-regular fa-image text-white"></i>
                                                </div>
                                                <div class="chat-type-sec position-relative">
                                                    <input type="text" class="form-control bg-darkgrey" placeholder="Knowing and respecting your teammate .....">
                                                    <button id="emojishow" class="border-0">
                                                        <i class="fa-solid fa-face-smile"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">

                                </div>
                            </div>
                            <!-- <div class="tab-content rightContactTabContent" id="contactTabContent">
                                <div class="tab-pane fade show active" id="side-ordered" role="tabpanel" aria-labelledby="side-ordered-tab">Ordered Tab</div>
                                <div class="tab-pane fade" id="side-following" role="tabpanel" aria-labelledby="side-following-tab">Following Tab</div>
                                <div class="tab-pane fade" id="side-followers" role="tabpanel" aria-labelledby="side-followers-tab">Followers Tab</div>
                                <div class="tab-pane fade" id="side-visitors" role="tabpanel" aria-labelledby="side-visitors-tab">Ordered Tab</div>
                            </div> -->
                        </div>
                    </div>
                    <div class="browse-section h-100">
                        <div class="p-24">
                            <div class="d-flex align-items-center">
                                <div class="logo menu-icon mr-4">
                                    <img src="{{asset('imgs/side-arrow.svg')}}" alt="">
                                </div>
                                <div class="font-24 font-weight-bold text-white">All Services</div>
                            </div>
                        </div>
                        <div class="px-24 sidebar-content more-cards">
                            <ul class="nav nav-pills mb-4" id="gamestab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="favorites-tab" data-bs-toggle="pill" data-bs-target="#favorites" type="button" role="tab" aria-controls="favorites" aria-selected="true">Favorites</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="games-tab" data-bs-toggle="pill" data-bs-target="#games" type="button" role="tab" aria-controls="games" aria-selected="false">Games</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="lisestyle-tab" data-bs-toggle="pill" data-bs-target="#lisestyle" type="button" role="tab" aria-controls="lisestyle" aria-selected="false">Lifestyle</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="customized-tab" data-bs-toggle="pill" data-bs-target="#customized" type="button" role="tab" aria-controls="customized" aria-selected="false">Customized</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="gamestabContent">
                                <div class="tab-pane fade show active" id="favorites" role="tabpanel" aria-labelledby="favorites-tab">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="game-card pointer" id="{{!empty($service->category->id) ? $service->category->id : ''}}" onclick="getCategoryServices(this,this.id)">
                                            @if ($service->category->image_1 != null)

                                            <div class="game-img">
                                                <div class="star">
                                                    <i class="fa-solid fa-star"></i>
                                                </div>
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
                                        <div class="game-card pointer" id="{{$category->id}}" onclick="getCategoryServices(this,this.id)">

                                            @if ($category->image_1 != null)

                                            <div class="game-img">
                                                <div class="star">
                                                    <i class="fa-solid fa-star"></i>
                                                </div>
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
                                <div class="tab-pane fade" id="games" role="tabpanel" aria-labelledby="games-tab">
                                    Alphabetically Games Display here...
                                </div>
                                <div class="tab-pane fade" id="lisestyle" role="tabpanel" aria-labelledby="lisestyle-tab">
                                    Lise Styles Display here...
                                </div>
                                <div class="tab-pane fade" id="customized" role="tabpanel" aria-labelledby="customized-tab">
                                    Customized Games Display here...
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
            <div class="overlay"></div>
            <!-- Sidebar Section End -->

        <!-- END: Service Section  -->

        <div class="modal fade modal-body-custom" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" data-dismiss="modal">
                <div class="modal-content modal-content-custom">
                    <div class="modal-body">
                        <button type="button" class="close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <img src="" class="imagepreview">
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="modal fade modal-body-custom" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" data-dismiss="modal">
                <div class="modal-content modal-content-custom">
                    <div class="modal-body">
                        <button type="button" class="close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <img src="" class="imagepreview">
                    </div>
                </div>
            </div>
        </div> -->

        <div class="modal fade in" id="file_not_supported" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <p style="text-align: center;padding: 30px 20px;font-family: Hind,Arial;font-size: 14px;">
                        <i class="fa fa-info-circle main" aria-hidden="true" style="color:#f2dede;"></i>
                        <?php echo 'This file format is not supported'; ?>
                    </p>
                </div>
            </div>
        </div>

        <div class="modal fade modal-body-custom" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-close-btn">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="close_action">×</span>
                        </button>
                    </div>
                    <div class="modal-header header-page login-header rounded-top">
                        <div class="header-img-modal-login-center custom-set h-auto mx-2 font-weight-bold">
                            Delete 
                            <!-- <img class="img-modal-login-center" src="{{ asset('temp-services/images/newv3.png') }}"> -->
                        </div>
                    </div>
                    
                    <div class="modal-body px-0">
                        <div class="text-center py-2">Are you sure you want to delete ?</div>
                        <!-- <div class="text-center py-4 model-footer-bg">You will not be able to recover this post!</div> -->
                    </div>
                    <div class="modal-footer model-footer-bg d-flex align-items-center justify-content-end">
                        <button class="new-btn mr-3 btn-ok">OK</button>
                        <button class="new-btn close_action btn-danger rounded-pill text-white px-3 py-1">Cancel</button>
                    </div>
                </div>
            </div>
        </div>




    @endsection

@push('scripts')
    <script src="{{ asset('js/mdb.min.js') }}"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->

    <script>

        // Chat Section Start
            const navBar = document.querySelector(".navSection"),
            menuBtns = document.querySelectorAll(".menu-icon"),
            overlay = document.querySelector(".overlay");

            menuBtns.forEach((menuBtn) => {
                menuBtn.addEventListener("click", () => {
                    navBar.classList.toggle("open");
                });
            });

            overlay.addEventListener("click", () => {
                navBar.classList.remove("open");
            });

        // Chat Section End

         /*--- emojies show on text area ---*/
         $('.add-smiles > span, .smile-it').on("click", function() {
            $(this).siblings(".smiles-bunch").toggleClass("active");
        });

        jQuery(document).ready(function($) {

        // Multiple Tabs Active start
        
            // document.querySelectorAll('button[data-bs-toggle="tab"]').forEach((t,i)=>{
            //     t.addEventListener('show.bs.tab', function (e) {
            //         let targetClass = t.dataset.bsTarget
            //         var pane = document.querySelector('#v-pills-tabContentS '+targetClass)
            //         var sibling = document.querySelector('#v-pills-tabContentS .tab-pane.active')
            //         // hide 2nd pane sibling
            //         sibling.classList.remove('show')
            //         sibling.classList.remove('active')
            //         // show 2nd pane
            //         pane.classList.add('show')
            //         pane.classList.add('active')
            //     })  
            // })
        // Multiple tabs Active End

        // Range Slider Start
            const settings={
                fill: '#6DD95A',
                background: '#000000'
            }

            const sliders = document.querySelectorAll('.range-slider');

            Array.prototype.forEach.call(sliders,(slider)=>{
                slider.querySelector('input').addEventListener('input', (event)=>{
                slider.querySelector('span').innerHTML = event.target.value;
                applyFill(event.target);
            });
                applyFill(slider.querySelector('input'));
            });
            
            function applyFill(slider) {
                const percentage = 100*(slider.value-slider.min)/(slider.max-slider.min);
                const bg = `linear-gradient(90deg, ${settings.fill} ${percentage}%, ${settings.background} ${percentage+0.1}%)`;
                slider.style.background = bg;
            }

        // Range Slider End




        // console.log("Hello");
        // var seller_edit = localStorage.getItem("edit_seller_profile");
        // if(seller_edit){
            // localStorage.removeItem("edit_seller_profile");
            // COMMENTED CODE ------ 16/09/2022

                // document.getElementById("profileBar_info").style.display = "none";
                // $('#services_navbar').removeClass('show-on-unblock');
                // $('#services_navbar').addClass('hide-on-block');
                // // document.getElementById("services_navbar").style.display = "none";
                // document.getElementById("edit_profile").style.display = "block";
                
                // $("#pills-edit-profile-tab").addClass('active');
                // $("#pills-edit-profile").addClass('show active');
                // $("#edit_user_profile").addClass('show active');  
                
                // $("#home").removeClass('active');    
                // $("#edit_user_profile-tab").removeClass('active');
                // $("#pills-back-tab").removeClass('active');
                // $("#pills-account").removeClass('active show');
                // $("#pills-notification").removeClass('active show');
                // $("#pills-privacy").removeClass('active show');
                // $("#pills-settings").removeClass('active show');
            // COMMENTED END HERE
        // }


            jQuery(document).scroll(function() { // OR  $(window).scroll(function() {
                didScroll = true;

                if (jQuery(window).scrollTop() + jQuery(window).height() >= jQuery(document).height()) { //if user scrolled from top to bottom of the page
                    // alert();
                    // page++; //page number increment
                    loadMorePost(); //load content   
                }
            });
            $('#edit_user_profile-tab').click(function(){

                console.log("4");
                // localStorage.setItem("edit_seller_profile", "edit_btn_pressed");
                
                // document.getElementById("profileBar_info").style.display = "none !important";
                $('#profileBar_info').attr("style", "display: none !important");
                $('#services_navbar').removeClass('show-on-unblock');
                $('#services_navbar').addClass('hide-on-block');
                // document.getElementById("services_navbar").style.display = "none";
                // document.getElementById("services_navbar").style.display = "none";
                document.getElementById("edit_profile").style.display = "block";
                
                $("#pills-edit-profile-tab").addClass('active');
                $("#pills-edit-profile").addClass('show active');
                $("#edit_user_profile").addClass('show active');  
                
                $("#home").removeClass('active');    
                $("#edit_user_profile-tab").removeClass('active');
                $("#pills-back-tab").removeClass('active');
                $("#pills-account").removeClass('active show');
                $("#pills-notification").removeClass('active show');
                $("#pills-privacy").removeClass('active show');
                $("#pills-settings").removeClass('active show');
            });
            // $('#profile-tab').click(function(){
            //     $('.showmore-posts').attr('data-post-load_page','0');
            //     loadMorePost();
            // });

            // load more posts
            // $(document).on("click", '.showmore-posts', function(e) {

            //     e.preventDefault();

            //      loadMorePost();

            // });

            function loadMorePost() {
                // alert('loadmore');
                let page = $('.showmore-posts').attr('data-post-load_page');
                let service = $('.showmore-posts').attr('data-post-service');//umar change it to user id
                //alert(page+'service'+service);
                if (!page && !service) return false;
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    method: 'post',
                    url: `/posts/load`,
                    data: {
                        page,
                        service
                    },
                    // beforeSend:function(){
                    //     $('.loader').show();
                    // },
                    // complete:function(){
                    //     $('.loader').hide();
                    // },
                    success: function(response) {
                        if (response.status === true && response.code === 200) {

                            $(".post-item-box").after(response.data);
                            // $(".post-item-box").last().after(response.data);
                            $('.showmore-posts').attr("data-post-load_page", response.page);
                            if (response.last_page === true) {
                                $(".showmore-posts").hide();
                            }
                        }
                    },
                    error: function(XMLHttpRequest) {
                        Swal.fire('An error occured while attempting this action.');
                    }
                });
            }
            // Scroll Button Functionality End Here

            $("#back_to_top").css("display", "none");
            // Scroll Button Functionality Start Here 
            const btnScrollToTop = document.querySelector("#back_to_top");

            // // scroll to top of page when button clicked
            btnScrollToTop.addEventListener("click", e => {
                window.scrollTo({
                    top: 0,
                    left: 0,
                    behavior: "smooth"
                });
            });

            // // toggle 'scroll to top' based on scroll position
            window.addEventListener('scroll', e => {
                btnScrollToTop.style.display = window.scrollY > 20 ? 'block' : 'none';
            });





            // show comments	

            /*--- emojies show on text area ---*/
            $('.add-smiles > span, .smile-it').on("click", function() {
                $(this).siblings(".smiles-bunch").toggleClass("active");
            });

            $('.follow').on("click", function() {
                following_id = "{{ $service->user->id }}";
                // console.log(following_id);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: "/follow",
                    data: {
                        'following_id': following_id
                    },
                    success: function(response) {
                        if (response.status === '1') {
                            $('.follow').html(response.msg);
                            $('.count-followers').text(response.totalFollowers);
                            $('.count-following').text(response.totalfollowing);
                            $('.followers-result').html(response.followersListhtml);
                            $('.following-result').html(response.followingListhtml);
                        }
                        if (response.error === '1') {
                            Swal.fire(response.msg);
                        }
                    },
                    error: function(data) {
                        //console.log(data);
                    }
                });
            })


            $('.smile-it').on("click", function() {
                $(this).children(".smiles-bunch").toggleClass("active");
            });


            /** Post a Comment **/

            // jQuery(".post-comt-box form").on("submit", function(event) 
            // {
            //     event.preventDefault();
            //     let comment = jQuery(this).find('textarea').val();
            //     let post_id = jQuery(this).attr("data-post-id");

            //     if (!post_id) {
            //         return false;
            //     }

            //     $.ajaxSetup({
            //         headers: {
            //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //         }
            //     });
            //     $.ajax({
            //         type: 'POST',
            //         url: "/post/comment",
            //         data: $('#' + jQuery(this).attr("id")).serialize(),
            //         success: function(response) {
            //             if (response.status === true && response.code === 200) {
            //                 let parent = jQuery("#post-comment_form_" + post_id).parent(
            //                     "li");
            //                 let comment_HTML = response.data;
            //                 // $("#comment-box_" + post_id).prepend(comment_HTML);

            //                 $("#append_comment_" + post_id).append(comment_HTML);
            //                 // $(comment_HTML).insertBefore("#post-comment_form_" + post_id);
            //                 $("#commentable_content_" + post_id).val("");
            //                 $("#comment_post_count_" + post_id).text(response.count);
            //             }
            //         },

            //         error: function(data) {
            //             data?.responseJSON?.error?.error ? $.notify(data.responseJSON.error
            //                 .error, "error") : ""
            //             data?.responseJSON?.message ? $.notify(data.responseJSON.message, "error") :
            //                 ""
            //             jQuery(this).find('textarea').val(' ');
            //         }
            //     });

            // });
            // jQuery(".post-comt-box textarea").on("keydown", function(event) {
            //     if (event.keyCode == 13) {
            //         event.preventDefault();
            //         let comment = jQuery(this).val();
            //         let post_id = jQuery(this).attr("data-post-id");
            //         if (!post_id) {
            //             return false;
            //         }

            //         $.ajaxSetup({
            //             headers: {
            //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //             }
            //         });
            //         $.ajax({
            //             type: 'POST',
            //             url: "/post/comment",
            //             data: $('#' + event.target.form.id).serialize(),
            //             success: function(response) {
            //                 if (response.status === true && response.code === 200) {
            //                     let parent = jQuery("#post-comment_form_" + post_id).parent(
            //                         "li");
            //                     let comment_HTML = response.data;
            //                     $("#comment-box_" + post_id).prepend(comment_HTML);
            //                     // $(comment_HTML).insertBefore("#post-comment_form_" + post_id);
            //                     $("#commentable_content_" + post_id).val("");
            //                     $("#comment_post_count_" + post_id).text(response.count);
            //                 }
            //             },
            //             error: function(data) {
            //                 data?.responseJSON?.error?.error ? Swal.fire(data.responseJSON.error
            //                     .error) : ""
            //                 data?.responseJSON?.message ? Swal.fire(data.responseJSON.message) :
            //                     ""
            //                 jQuery(this).val(' ');
            //             }
            //         });
            //     }
            // });

            // $("#follow-checkss").hover(function(){
            //     var follow_checking = document.getElementById("follow-checkss").innerHTML;
            //     console.log(follow_checking,'12121');
            //     if(follow_checking == 'Following'){
            //         document.getElementById("follow-checkss").innerHTML = "Unfollow";
            //         console.log(follow_checking,'1');
            //     }else if(follow_checking == 'Follow'){
            //         document.getElementById("follow-checkss").innerHTML = "Follow";
            //         console.log(follow_checking,'2');
            //     }else{
            //     }
            //     }, function(){
            //         let follow_status = document.getElementById("check-follow-toggle").value;
            //         console.log(follow_status,'Yeh')
            //         if(follow_status == 'Following'){
            //             document.getElementById("follow-checkss").innerHTML = "Following";
            //             // console.log(follow_status,'3');
            //         }else{
            //             document.getElementById("follow-checkss").innerHTML = "Follow";
            //             // console.log(follow_status,'4');
            //         }
            // });
            // NEED TO WORK ON TO MAKE IT PERFECTLY MATCH REQUIREMENT
            $(document).on({
                mouseenter: function () {
                    var follow_checking = document.getElementById("follow-check").innerHTML;
                    if(follow_checking == 'Following'){
                        document.getElementById("follow-checkss").innerHTML = "Unfollow";
                        console.log(follow_checking,'1');
                    }else if(follow_checking == 'Follow'){
                        document.getElementById("follow-checkss").innerHTML = "Follow";
                        console.log(follow_checking,'2');
                }else{
                }
                },
                mouseleave: function () {
                    let follow_status = document.getElementById("check-follow-toggle").value;
                    if(follow_status == 'Following'){
                        document.getElementById("follow-checkss").innerHTML = "Following";
                    }else{
                        document.getElementById("follow-checkss").innerHTML = "Follow";
                    }
                }
            }, '#follow-checkss');
            // END HERE NEED TO WORK ON TO MAKE IT PERFECTLY MATCH REQUIREMENT
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            let showChar = 100;
            let ellipsestext = "...";
            let moretext = "more";
            let lesstext = "less";
            $('.more-description').each(function() {
                var content = $(this).html();
                if (content.length > showChar) {
                    var c = content.substr(0, showChar);
                    var h = content.substr(showChar - 0, content.length - showChar);

                    var html = c + '<span class="moreellipses">' + ellipsestext + '&nbsp;</span>';
                    html += '<span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;';
                    html += '<a href="javascript:void(0)" class="morelink">' + moretext + '</a></span>';

                    $(this).html(html);
                }
            });

            $(".morelink").click(function() {
                if ($(this).hasClass("less")) {
                    $(this).removeClass("less");
                    $(this).html(moretext);
                } else {
                    $(this).addClass("less");
                    $(this).html(lesstext);
                }
                $(this).parent().prev().toggle();
                $(this).prev().toggle();
                return false;
            });

            $(function() {
                $('.pop').on('click', function() {
                    $('.imagepreview').attr('src', $(this).find('img').attr('src'));
                    $('#imagemodal').modal('show');
                });
            });

            // on click of photo upload icon
            $("#publisher-photos").on('change', function(e) {
                deleted_images = [];
                //Get count of selected files
                var countFiles = $(this)[0].files.length;
                $("#postphotos_error").html("");
                if (countFiles > 4) {
                    $("#postphotos_error").html("Only 4 files allowed!!!");
                    e.preventDefault();
                } else {
                    var imgPath = $(this)[0].value;
                    var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
                    var image_holder = $("#image-holder");
                    image_holder.empty();
                    if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
                        if (typeof(FileReader) != "undefined") {
                            //loop for each file selected for uploaded.
                            for (var i = 0; i < countFiles; i++) {
                                var reader = new FileReader();
                                var ii = 0;
                                reader.onload = function(e) {
                                    name = "'" + $("#publisher-photos")[0].files[ii].name + "'";
                                    image_holder.append(
                                        '<span class="thumb-image-delete" id="image_to_' +
                                        ii + '"><span onclick="DeleteImageById(' + name + ',' + ii +
                                        ')" class="pointer thumb-image-delete-btn"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"><path fill="currentColor" d="M19,6.41L17.59,5L12,10.59L6.41,5L5,6.41L10.59,12L5,17.59L6.41,19L12,13.41L17.59,19L19,17.59L13.41,12L19,6.41Z" /></svg></span><img src="' +
                                        e.target.result + '" class="thumb-image"></span>')
                                    ii = ii + 1;
                                }
                                image_holder.show();
                                reader.readAsDataURL($(this)[0].files[i]);
                            }
                        } else {
                            image_holder.html("<p>This browser does not support FileReader.</p>");
                        }
                    }

                }
            });

            var allowed = "jpg,png,jpeg,gif,mkv,docx,zip,rar,pdf,doc,mp3,mp4,flv,wav,txt,mov,avi,webm,wav,mpeg";

            function isInArray(value, array) {
                return array.indexOf(value) > -1;
            }

            function Wo_IsFileAllowedToUpload(filename, allowed) {
                var extension = filename.replace(/^.*\./, '').toLowerCase();
                var allowed_array = allowed.split(',');
                if (isInArray(extension, allowed_array)) {
                    return true;
                }
                return false;
            }
            var Wo_Delay = (function() {
                var timer = 0;
                return function(callback, ms) {
                    clearTimeout(timer);
                    timer = setTimeout(callback, ms);
                };
            })();
            // on click of video upload icon
            // $("#publisher-video").change(function() {
            //     var filename = $(this).val().replace(/C:\\fakepath\\/i, '');
            //     $("#video-form").val(filename);
            //     $("#video-holder").addClass("d-block").removeClass("d-none")
            //     $("#videofilename").html(filename)
            //     if (Wo_IsFileAllowedToUpload(filename, allowed) == false) {
            //         $("#file_not_supported").modal('show');
            //         Wo_Delay(function() {
            //             $("#file_not_supported").modal('hide');
            //         }, 3000);
            //         $("#publisher-video").val('');
            //         $("#video-form").val('');
            //         return false;
            //     }
            // });

            // $("#publisher-music").change(function() {
            //     var filename = $(this).val().replace(/C:\\fakepath\\/i, '');
            //     $("#music-form").val(filename);
            //     $("#music-form").val(filename);
            //     $("#music-holder").addClass("d-block").removeClass("d-none")
            //     $("#musicfilename").html(filename)
            //     if (Wo_IsFileAllowedToUpload(filename, allowed) == false) {
            //         $("#file_not_supported").modal('show');
            //         Wo_Delay(function() {
            //             $("#file_not_supported").modal('hide');
            //         }, 3000);
            //         $("#publisher-music").val('');
            //         $("#music-form").val('');
            //         return false;
            //     }
            // });




            // load more comments
            $(document).on("click", "[id^='showmore_']", function(e) {


                e.preventDefault();
                let loadMoreTarget = e.target;
                let post_id = $(loadMoreTarget).attr("data-comment-post-id");
                let page = $(loadMoreTarget).attr("data-comment-load_page");

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    method: 'post',
                    url: `/comments/load`,
                    data: {
                        'id': post_id,
                        'page': page
                    },
                    beforeSend: function() {
                        $('.comment-loader').show();
                    },
                    complete: function() {
                        $('.comment-loader').hide();
                    },
                    success: function(response) {
                        if (response.status === true && response.code === 200) {
                            // console.log(response.data);
                            // $(".comment-section_" + post_id).last().after(response.data);
                            // console.log($("#append_comment_" + post_id).first().length );
                            // if($("#append_comment_" + post_id).first().length > 0){

                            //  $("#append_comment_" + post_id).first().after(response.data);

                            // }
                            // else{
                            $(".comment-section_" + post_id).first().before(response.data);
                            // }

                            // $(".comment-section_" + post_id).append(response.data);
                            $(loadMoreTarget).attr("data-comment-load_page", response.page)
                            if (response.last_page === true) {
                                $("#showmore_" + post_id).hide();
                                $(".show-less-" + post_id).addClass('show-less-block');
                            } else {
                                $(".show-less-" + post_id).removeClass('show-less-block');
                            }
                        }
                    },
                    error: function(XMLHttpRequest) {
                        $.notify('An error occured while attempting this action.', 'error');
                    }
                });
            });

            $(document).on("click", "[id^='showless_']", function(e) {


                e.preventDefault();
                let loadMoreTarget = e.target;
                let post_id = $(loadMoreTarget).attr("data-comment-post-id");
                let page = $(loadMoreTarget).attr("data-comment-load_page");

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    method: 'post',
                    url: `/comments/load`,
                    data: {
                        'id': post_id,
                        'page': page
                    },
                    beforeSend: function() {
                        $('.comment-loader').show();
                    },
                    complete: function() {
                        $('.comment-loader').hide();
                    },
                    success: function(response) {
                        if (response.status === true && response.code === 200) {
                            $(".comment-section_" + post_id).remove();
                            // console.log(response.data);
                            $("#append_comment_" + post_id).append(response.data);
                            // $(".comment-section_" + post_id).append(response.data);

                            $(".show-less-" + post_id).removeClass('show-less-block');
                            if (response.last_page === false) {
                                $("#showmore_" + post_id).show();
                                $("#showmore_" + post_id).attr("data-comment-load_page", '1');
                                //     $("#show-less-" + post_id).show();
                            }
                            // else{
                            //     $("#show-less-" + post_id).hide();
                            // }
                        }
                    },
                    error: function(XMLHttpRequest) {
                        $.notify('An error occured while attempting this action.', 'error');
                    }
                });
            });

            //On scroll Down load post//


            // $(window).scroll(function(){
            //     // alert();
            //     var position = $(window).scrollTop();

            //     var bottom = $(document).height() - $(window).height();
            //     bottom = parseInt(bottom) - parseInt(20);
            //     console.log(position+'bottom'+bottom);
            //     if( position >= bottom ){

            //       loadMorePost();

            //     }


            // });



            // validate if description has links it should be youtube links only

            let regexYoutubeURl = new RegExp(
                "([a-zA-Z0-9]+://)?([a-zA-Z0-9_]+:[a-zA-Z0-9_]+@)?([a-zA-Z0-9.-]+\\.[A-Za-z]{2,4})(:[0-9]+)?(/.*)?"
            );
            let linksArray = [];
            $(document).on("input paste", "#post-content", function() {
                var urlDescription = $(this).val();
                let geturl = new RegExp(
                    "(^|[ \t\r\n])((http|https|Http|Https):(([A-Za-z0-9$_.+!*(),;/?:@&~=-])|%[A-Fa-f0-9]{2}){2,}(#([a-zA-Z0-9][a-zA-Z0-9$_.+!*(),;/?:@&~=%-]*))?([A-Za-z0-9$_+!*();/?:~-]))",
                    "g"
                );
                if (urlDescription.match(geturl)) {
                    console.log("length", urlDescription.match(geturl).length);
                    console.log("marched", urlDescription.match(geturl));
                    validateYouTubeUrl(urlDescription.match(geturl));
                }
                // console.log("hereeeee", url.match(regexYoutubeURl));
                // if (regexYoutubeURl.test(urlDescription)) {
                //     console.log("contains url", regexYoutubeURl.exec(urlDescription));
                // }
            });
            // delete post
            // $('#deletemodal').on('show.bs.modal', function(e) {
            // // $('#confirm-delete').on('click', function(e) {
                
            //     // $('#deletemodal').modal("show");
            //     alert($(e.relatedTarget).data('href'));
            //     // $(this).find('.btn-ok').attr('onclick', $(e.relatedTarget).data('href'));
            // });


            $(document).on("click", ".post-actions", function(e) {
                if (e.currentTarget.classList.contains("post-actions")) {
                    let post_id = $(e.currentTarget).attr('data-post');
                    if (e.target.className === 'delete-post-action') {

                        $('#deletemodal').modal("show");

                        $('#deletemodal').find('.btn-ok').attr('onclick', $(e.currentTarget).data('href'));
                        // $()()

                        // $('#imagemodal').modal('show');
                        // Swal.fire({
                        //     title: "Are you sure you want to delete this Post?",
                        //     text: "You will not be able to recover this post!",
                        //     icon: "warning",
                        //     buttons: [
                        //         'No, cancel it!',
                        //         'Yes, I am sure!'
                        //     ],
                        //     dangerMode: true,
                        //     showCancelButton: true,
                        // }).then(function(isConfirm) {
                        //     if (isConfirm.isConfirmed === true) {
                        //         deletePost(post_id)
                        //     } else {
                        //         Swal.fire("Cancelled", "Your post is safe :)", "error");
                        //     }
                        // })
                    }
                }
            });
            $(".close_action").click(function(){
            
                $('#deletemodal').modal("hide");
                // $("#deletemodal .close").click();
            });
        });
        // post delete function
        function deletePost(postId, post_html) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                method: 'DELETE',
                url: `/post/delete`,
                data: {
                    id: postId,
                    type: 'delete'
                },
                success: function(response) {
                    if (response.status === true && response.code === 200) {

                        $("#post-item-box-" + postId).remove();
                        $('#deletemodal').modal("hide");

                    }
                },
                error: function(XMLHttpRequest) {
                    Swal.fire('An error occured while attempting this action.');
                }
            });
        }
        // delete gallery image
        function deleteGalleryImage(post_id) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                method: 'DELETE',
                url: `/gallery/delete`,
                data: {
                    id: post_id,
                    type: 'delete'
                },
                success: function(response) {
                    if (response.status === true && response.code === 200) {

                        $("#gallery-item-box-" + post_id).remove();
                        $('#deletemodal').modal("hide");
                        // $("#post-item-box-" + postId).remove();
                        // Swal.fire('Success', response.message);
                        // window.location.reload();
                    }
                },
                error: function(XMLHttpRequest) {
                    Swal.fire('An error occured while attempting this action.');
                }
            });
        }
        // youtube link validation starts here //
        let youtubeLinks = [];
        let existsYoutubeLinks = [];
        let uniqueyoutubeLinks;

        function validateYouTubeUrl(url) {
            // let spliteurl = url.split(" ")
            console.log("spliteurlspliteurl", url);
            if (url != undefined || url != '') {
                let regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=|\?v=)([^#\&\?]*).*/;
                let filteraa = url.filter(function(m, i, self) {
                    let match = m.match(regExp)
                    if (match && match[2]) {
                        if (existsYoutubeLinks.indexOf(match[2]) > -1) {} else {
                            youtubeLinks.push({
                                url: match[2],
                                show: false
                            })
                            existsYoutubeLinks.push(match[2]);
                        }
                    }
                });

                const getUniqArrBy = (props = [], arrInp = [], objTmp = {}, arrTmp = []) => {
                    if (arrInp.length > 0) {
                        const lastItem = arrInp[arrInp.length - 1]
                        const propStr = props.reduce((res, item) => (`${res}${lastItem[item]}`), '')
                        if (!objTmp[propStr]) {
                            objTmp[propStr] = true
                            arrTmp = [...arrTmp, lastItem]
                        }
                        arrInp.pop()
                        return getUniqArrBy(props, arrInp, objTmp, arrTmp)
                    }
                    return arrTmp
                }
                uniqueyoutubeLinks = getUniqArrBy(['url', 'show'], youtubeLinks)
                uniqueyoutubeLinks.map((videoUrl, i) => {
                    if (videoUrl.show === false) {
                        let youtubeFrame = '<img src="https://img.youtube.com/vi/' + videoUrl.url +
                            '/default.jpg">';
                        // let youtubeIframe = '<div col-4><iframe src="https://www.youtube.com/embed/' + videoUrl +
                        //     '" type="text/html" width="500" height="265" frameborder="0" allowfullscreen></iframe></div>';
                        $(youtubeFrame).appendTo("#videoObject");
                        // youtubeLinks[i].show = true
                        videoUrl.show = true
                    }
                })
            }
        }

        $(document).ready(() => {
            let url = location.href.replace(/\/$/, "");

            if (location.hash) {
                const hash = url.split("#");
                $('#myTab a[href="#' + hash[1] + '"]').tab("show");
                url = location.href.replace(/\/#/, "#");
                history.replaceState(null, null, url);
                setTimeout(() => {
                    $(window).scrollTop(0);
                }, 400);
            }


            $('.activeTimeline').on("click", function() {

                //Active Tab//
                $('#myTab a[href="#' + 'profile' + '"]').tab("show");


                // activeTimeline
                //Change Url//
                let c_tab = '#profile';
                if (c_tab == "#home") {

                    newUrl = url.split("#")[0];
                } else {

                    newUrl = url.split("#")[0] + c_tab;

                    id = "{{ $service->user->id }}";
                    //alert(id);
                    //reset timeline page with ajax//
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: 'POST',
                        url: "/loadTimeline",
                        data: {
                            'id': id,
                        },

                        // data: $('#' + jQuery(this).attr("id")).serialize(),
                        success: function(response) {
                            $(".posttimeline").html(response);
                        },

                        error: function(data) {

                        }
                    });
                }
                newUrl += "/";
                history.replaceState(null, null, newUrl);
                setTimeout(() => {
                    $(window).scrollTop(0);
                }, 400);
            });

            $('.activeFollowers').on("click", function() {
                //Active Tab//
                $('#myTab a[href="#' + 'followers' + '"]').tab("show");

                var clickedTab = $(this).parent().attr('id');
            
                if (clickedTab == 'activefollowers') {

                    $('#pills-following-tab').removeClass('active');
                    $('#pills-following').removeClass('active show');

                    $('#pills-follower-tab').addClass('active');
                    $('#pills-follower').addClass('active show');
                } else if (clickedTab == 'activefollowing') {

                    $('#pills-follower-tab').removeClass('active');
                    $('#pills-follower').removeClass('active show');

                    $('#pills-following-tab').addClass('active');
                    $('#pills-following').addClass('active show');

                }
                //Change Url//
                let c_tab = '#profile';
                if (c_tab == "#home") {
                    newUrl = url.split("#")[0];
                } else {
                    newUrl = url.split("#")[0] + c_tab;
                }
                newUrl += "/";
                history.replaceState(null, null, newUrl);
                setTimeout(() => {
                    $(window).scrollTop(0);
                }, 400);


            });



            $('.activeBadge').on("click", function() {
                //Active Tab//
                $('#myTab a[href="#' + 'badges' + '"]').tab("show");
                //Change Url//
                let c_tab = '#profile';
                if (c_tab == "#home") {
                    newUrl = url.split("#")[0];
                } else {
                    newUrl = url.split("#")[0] + c_tab;
                }
                newUrl += "/";
                history.replaceState(null, null, newUrl);
                setTimeout(() => {
                    $(window).scrollTop(0);
                }, 400);
            });



            $('a[data-bs-toggle="tab"]').on("click", function() {
                let newUrl;

                const hash = $(this).attr("href");
                if (hash == "#home") {
                    newUrl = url.split("#")[0];
                } else if (hash == "#profile") {
                    newUrl = url.split("#")[0] + hash;

                    id = "{{ $service->user->id }}";
                    //reset timeline page with ajax//
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: 'POST',
                        url: "/loadTimeline",
                        data: {
                            'id': id,
                        },

                        // data: $('#' + jQuery(this).attr("id")).serialize(),
                        success: function(response) {
                            $(".posttimeline").html(response);
                        },

                        error: function(data) {

                        }
                    });
                } else {
                    newUrl = url.split("#")[0] + hash;
                }
                newUrl += "/";
                history.replaceState(null, null, newUrl);
            });
            // like post
            $(document).on("click", ".post-box", function(e) {
                if (e.target.classList.contains("post-reaction")) {
                    registerReaction(e.target)
                }
            })
            // like and delete gallery images
            $(document).on("click", ".lightbox-user-gallery", function(e) {

                if (e.target.classList.contains("gallery-like-heart")) {
                    registerGalleryReaction(e.target)
                }
                if (e.target.parentNode.classList.contains("delete-gallery")) {

                    let post_id = e.target.parentNode.getAttribute("data-delete-post-id");
                    if (!post_id) return false;

                        $('#deletemodal').modal("show");

                        var galleryfunction = e.target.parentNode.getAttribute("data-href");

                        $('#deletemodal').find('.btn-ok').attr('onclick', galleryfunction);
                    // Swal.fire({
                    //     title: "Umair",
                    //     text: "You will not be able to recover this image file!",
                    //     icon: "warning",
                    //     buttons: [
                    //         'No, cancel it!',
                    //         'Yes, I am sure!'
                    //     ],
                    //     dangerMode: true,
                    //     showCancelButton: true,
                    // }).then(function(isConfirm) {
                    //     if (isConfirm.isConfirmed === true) {
                    //         deleteGalleryImage(post_id);
                    //     } else {
                    //         Swal.fire("Cancelled", "Your imaginary file is safe :)", "error");
                    //     }
                    // })
                }
            })
            // like comments
            $(document).on("click", ".comment-action-box", function(e) {
                if (e.target.classList.contains("comment-reaction")) {
                    registerCommentReaction(e.target)
                }
            })
        });

        function registerReaction(element) {
            let post_id = $(element).attr('data-post-id');
            let liked = $(element).attr('data-reaction-id');
            let type = "post";
            let userReaction;
            if (liked === '1') {
                userReaction = 0;
            } else {
                userReaction = 1;
            }
            if (!post_id) {
                return false;
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                method: 'post',
                url: `/post/like`,
                data: {
                    'id': post_id,
                    'liked': userReaction,
                    'type': type
                },
                success: function(response) {
                    let msg;
                    if (response.status === true && response.code === 200) {
                        if (response.liked === '1') {
                            $(element).addClass('active-heart');
                        } else {
                            $(element).removeClass('active-heart');
                        }
                        $(element).attr('data-reaction-id', response.liked);
                        $(element.lastElementChild).text(response.likes_count)
                        $("#people-liked-post-" + post_id).html(response.liked_html);
                    }

                    if (response.status === false && response.code === 400) {
                        Swal.fire(response.message);
                    }
                    if (response.status === false && response.code === 500) {
                        Swal.fire(response.message);
                    }
                    setTimeout(() => {
                        Swal.close();
                    }, 800);
                },
                error: function(XMLHttpRequest) {
                    Swal.fire('An error occured while attempting this action.');
                }
            });
        }

        function registerGalleryReaction(element) {
            let post_id = $(element).parent().attr('data-gallery-image-id');
            let liked = $(element).parent().attr('data-gallery-reaction-id');
            let type = "gallery";
            let userReaction;
            if (liked === '1') {
                userReaction = 0;
            } else {
                userReaction = 1;
            }
            if (!post_id) {
                return false;
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                method: 'post',
                url: `/gallery/like`,
                data: {
                    'id': post_id,
                    'liked': userReaction,
                    'type': type
                },
                success: function(response) {
                    let msg;
                    if (response.status === true && response.code === 200) {
                        if (response.liked === '1') {
                            $(element).addClass('active-heart');
                        } else {
                            $(element).removeClass('active-heart');
                        }
                        $(element).parent().attr('data-gallery-reaction-id', response.liked);
                        $("#liked_gallery_count-" + post_id).text(response.likes_count)
                        // Swal.fire(response.message);
                    }

                    if (response.status === false && response.code === 400) {
                        Swal.fire(response.message);
                    }
                    if (response.status === false && response.code === 500) {
                        Swal.fire(response.message);
                    }
                    setTimeout(() => {
                        Swal.close();
                    }, 800);
                },
                error: function(XMLHttpRequest) {
                    Swal.fire('An error occured while attempting this action.');
                }
            });

        }

        function registerCommentReaction(element) {
            let post_id = $(element).attr('data-comment-post-id');
            let liked = $(element).attr('data-comment-reaction-id');
            let type = "comment";
            let userReaction;
            if (liked === '1') {
                userReaction = 0;
            } else {
                userReaction = 1;
            }
            if (!post_id) {
                return false;
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                method: 'post',
                url: `/comment/like`,
                data: {
                    'id': post_id,
                    'liked': userReaction,
                    'type': type
                },
                success: function(response) {
                    let msg;
                    if (response.status === true && response.code === 200) {
                        if (response.liked === '1') {
                            $(element).addClass('active-heart');
                        } else {
                            $(element).removeClass('active-heart');
                        }
                        $(element).attr('data-comment-reaction-id', response.liked);
                        $("#liked_comment_count_" + post_id).text(response.likes_count)
                        // Swal.fire(response.message);
                    }

                    if (response.status === false && response.code === 400) {
                        Swal.fire(response.message);
                    }
                    if (response.status === false && response.code === 500) {
                        Swal.fire(response.message);
                    }
                    setTimeout(() => {
                        Swal.close();
                    }, 800);
                },
                error: function(XMLHttpRequest) {
                    Swal.fire('An error occured while attempting this action.');
                }
            });

        }

        // delete image preview
        var deleted_images = [];

        function DeleteImageById(name, id) {
            deleted_images.push(name);
            $('#image_to_' + id).remove();
        }
        $('#buyBtn').click(function(e) {
            var userBalance = document.getElementById('user_points').innerHTML;
            // console.log(userBalance);
            var serviceCost = parseFloat('{{ $service->price }}');
            if (parseFloat(userBalance) < serviceCost) {
                Swal.fire('Error', 'You do not have enough GP to order this service.', 'error');
                e.preventDefault();
            }
        });
        @if(\Session::has('success'))
        Swal.fire('Success', '{{ \Session::get('
            success ') }}', 'success'); {
            {
                \
                Session::forget('success')
            }
        }
        @endif

        @if(\Session::has('error'))
        Swal.fire('Error', '{{ \Session::get('
            error ') }}', 'error'); {
            {
                \
                Session::forget('error')
            }
        }
        @endif
    </script>

    <script>
        // lightbox gallery
        $(document).on("ready", function() {
            let lightbox = document.getElementById('lightbox');
            let lightboxInstance = mdb.Lightbox.getInstance(lightbox);
            let lightboxToggler = document.getElementById('lightboxToggler');
            lightboxToggler.addEventListener('click', function() {
                lightboxInstance.open(1);
                lightboxInstance.allowfullscreen(true)
            });

        });
    </script>
@endpush