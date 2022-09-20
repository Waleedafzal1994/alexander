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
<div class="gamePlay" id="gamePlay">
    <div id="user_points" style="display: none;" value="{{Auth::user()->points}}">{{Auth::user()->points}}</div>
    <!-- START: Service Section -->
    <section class="service" id="servicePage">
        <a class="right-bottom-arrow new-purple-gradient shadows text-decoration-none" style="display: none;" id="back_to_top">
            <div class="d-flex align-items-center justify-content-center h-100">
                <i class="fa fa-chevron-up text-white"></i>
            </div>
        </a>

        <div class="d-flex justify-content-between">
            <!-- START: Service Profile Side bar -->
            <div class="profileBar {{!empty($checkBlockedUser) ? 'hide-on-block' : 'show-on-unblock'}}" id="profileBar_info">
                <!-- START: Service Profile Side bar First Card -->
                <div class="card shadows">
                    <div class="card-body p-0 m-0">
                        <div class="profile-image-part">
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



                        <div class="nav-button-side mt-2 mx-3">
                            <div class="mt-3 mx-0 d-flex justify-content-between img-two-btns-row">
                                @if(Request::segment(1) !='user-profile')
                                    <div class="mt-4">
                                        <a class="btn-follower follow d-flex align-items-center justify-content-center" id="follow-checkss" type="button">{{ !empty($checkFollow) ? 'Following' : 'Follow' }} </a>
                                        <input type="hidden" id="check-follow-toggless" value= "{{$checkFollow}}">
                                    </div>
                                @else    
                                <div class="mt-4"></div>
                                @endif
                                
                                <div class="center-img">
                                    <div class="">
                                        <!-- <a href="#" class="pop"> -->
                                        <div class="lightbox lightbox-user-gallery">
                                            <img id="circle-profile-pic" src='{{ $service->user->getProfilePicture() }}' alt="" class="pointer img-fluid profile-image-v2 zoom-clicked-img" />
                                            <!-- </a> -->
                                        </div>
                                    </div>
                                </div>
                                @if(Request::segment(1) !='user-profile')
                                <div class="mt-4">
                                    <a class="btn-cust btn-width" type="button">Chat</a>
                                </div>
                                @else    
                                <div class="mt-4"></div>
                                @endif
                            </div>
                        </div>

                        <!-- END: Service Social button -->
                        <div class="profile-info mt-2 pr-3 mb-2 profile-name-top">
                            <h3 class="pl-3 profile-name text-center text-style-3 mb-2 profile-name-game">
                                {{ $service->user->name ?: 'N/A' }}
                            </h3>
                            <div class="profile-about">
                                <div class="pl-3">
                                    <div class=" profile-section-two">
                                        <div class="review-body text-center">
                                            {{ $service->user->primary_language ?: 'N/A' }}
                                            {{ !empty($service->user->secondary_language) ? '1/'.$service->user->secondary_language : '' }}
                                        </div>
                                    </div>
                                    <div class="my-1 d-flex align-items-center justify-content-between">
                                        <div class="profile-section-two gender">
                                            <div class="review-body text-center">
                                                <!-- @if($service->user->gender == 'Male') -->
                                                <!-- <img src="{{URL::asset('/images/ProfilePlaceholders/male.jpg')}}"> -->
                                                {{ $service->user->gender ?: 'N/A' }}
                                                <!-- @elseif($service->user->gender == 'Female') -->
                                                <!-- <img src="{{URL::asset('/images/ProfilePlaceholders/female.jpg')}}"> -->
                                                <!-- {{ $service->user->gender ?: 'N/A' }} -->
                                                <!-- @elseif($service->user->gender == 'Non-Binary') -->
                                                <!-- <img src="{{URL::asset('/images/ProfilePlaceholders/non-binary.jpg')}}"> -->
                                                <!-- {{ $service->user->gender ?: 'N/A' }} -->
                                                <!-- @else -->
                                                <!-- N/A -->
                                                <!-- @endif -->
                                            </div>
                                        </div>
                                        <div class="profile-section-two w-100 mx-2">
                                            <div class="review-body text-center">
                                                &nbsp;
                                            </div>
                                        </div>
                                        <div class="profile-section-two numbers">
                                            <div class="review-body text-center">
                                                {{ $service->user->getAge() ? $service->user->getAge().' years': '-' }}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-block mt-5 ml-3 pb-3">
                                    <div class="new-purple-gradient text-white border-0 py-3 br-10 h-40 d-flex align-items-center justify-content-between mb-2 px-3">
                                        <span>Avg. Response Time</span>
                                        <span>5 - 10 Mins</span>
                                    </div>
                                    <div class="new-purple-gradient text-white border-0 py-3 br-10 h-40 d-flex align-items-center justify-content-between px-3 sidebar-rating">
                                        <span>1258 Served</span>
                                        <span class="number-row-card"><i class="fas fa-star"></i> 5.0 </span>
                                    </div>
                                </div>

                                <div class="pl-3 badge-section my-5 d-flex align-items-center justify-content-between pb-5">

                                    @if(!empty($service->user->general_badge))

                                    @php
                                    $g_badge = explode(',',$service->user->general_badge)
                                    @endphp

                                    @if(in_array('elite',$g_badge))

                                    <div class="">
                                        <img src="/imgs/elitegpbadge.png" width="40" alt="">
                                        ELITE GP+
                                    </div>
                                    @else
                                    <div class="disbaled">
                                        <img src="/imgs/elitegpbadgedisabled.png" width="40" alt="">
                                        Elite GP+
                                    </div>
                                    @endif

                                    @if(in_array('top',$g_badge))

                                    <div class="">
                                        <img src="/imgs/topgpbadge.png" width="40" alt="">
                                        Top GP+
                                    </div>
                                    @else
                                    <div class="disbaled">
                                        <img src="/imgs/topgpbadgedisabled.png" width="40" alt="">
                                        Top GP+
                                    </div>
                                    @endif

                                    @if(in_array('vip',$g_badge))

                                    <div class="">
                                        <img src="/imgs/vipbadge.png" width="40" alt="">
                                        VIP+
                                    </div>
                                    @else
                                    <div class="disbaled">
                                        <img src="/imgs/vipbadgedisabled.png" width="40" alt="">
                                        VIP+
                                    </div>
                                    @endif

                                    @else

                                    <div class="disbaled">
                                        <img src="/imgs/elitegpbadgedisabled.png" width="40" alt="">
                                        Elite GP+
                                    </div>
                                    <div class="disbaled">
                                        <img src="/imgs/topgpbadgedisabled.png" width="40" alt="">
                                        Top GP+
                                    </div>
                                    <div class="disbaled">
                                        <img src="/imgs/vipbadgedisabled.png" width="40" alt="">
                                        VIP+
                                    </div>
                                    @endif


                                </div>

                                <h4 class="skew-height skew-bg profile-name text-style-4 color-primary head-style-fst">
                                    About Me
                                </h4>

                                <p class="text-black pl-3 more-description text-justify mt-3"> {{ !empty($service->user->description) ? $service->user->description : 'N/A' }} </p>
                                {{-- <hr class="hr-dotted-2px mt-5"> --}}
                                <div class="pl-3 mb-3"></div>
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
            {{-- <hr class="hr-dotted-2px mb-5"> --}}
            <div class="mb-5"></div>

            <div class="profile-about mt-3">

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

                



                <!-- <div class="body-fluid row justify-content-start ml-0">
                    @if (!empty($service->user->instagram_profile))
                    <a href="https://www.instagram.com/{{ $service->user->instagram_profile }}" class="icon-game col-3 icon-instagram" target="_blank">
                        <i class="fab fa-instagram"></i>
                    </a>
                    @endif

                    @if (!empty($service->user->twitch_profile))
                    <a href="https://www.{{ $service->user->twitch_profile }}" class="icon-game col-3 icon-twitch" target="_blank">
                        <i class="fab fa-twitch"></i>
                    </a>
                    @endif

                    @if (!empty($service->user->facebook_profile))
                    <a href="https://www.{{ $service->user->facebook_profile }}" class="icon-game col-3 icon-fb" target="_blank">
                        <i class="fab fa-facebook-square"></i>
                    </a>
                    @endif
                </div> -->


            </div>

        </div>
    </div>
</div>

<div class="card mt-4 mb-4 shadows">
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
                    <div class="activeFollowers">
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
</div>

<div class="card mt-4 mb-4 shadows">
    <div class="card">
        <div class="profile-info-counters">
            <div class="social">
            <p class="pl-3 mb-3 text-style-4 text-black" style="font-size: 14px;"><span class="font-weight-bold">ID:</span> {{ str_pad($service->user->id, 5, '0', STR_PAD_LEFT) }}</p>
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
<!-- END: Service Profile Side bar -->

<!-- START: Service main Body-->

<div class="mainBody">

    <!-- START: First Card mianbody -->
    <div class="card review-body shadows {{!empty($checkBlockedUser) ? 'hide-on-block' : 'show-on-unblock'}}" id="services_navbar">
        <div class="card-body ">
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
                                        Service Details
                                    </a>
                                </li>
                                @endif

                                <li class="nav-item" role="presentation">
                                    <a class="nav-link <?= (Request::segment(1) =='user-profile') ? 'active' : '' ?> " id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false" href="#profile">
                                        Timeline
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="gallery-tab" data-bs-toggle="tab" data-bs-target="#gallery" type="button" role="tab" aria-controls="gallery" aria-selected="false" href="#gallery">
                                        Photos
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="followers-tab" data-bs-toggle="tab" data-bs-target="#followers" type="button" role="tab" aria-controls="followers" aria-selected="false" href="#followers">
                                        Followers
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
                                    <a class="nav-link btn-active" id="edit_user_profile-tab"  type="button" role="tab" aria-controls="" aria-selected="false" href="/user-profile/{{Auth::id()}}/#edit_user_profile">
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
    </div>

    <div class="" id="hide-show-on-block">
        <div class="col-md-12 bg-white rounded shadow d-flex align-items-center justify-content-center block-text">
           <!-- <h1>1</h1> -->
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
<!-- END: Service main Body -->
</div>
</section>

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
</div>

{{-- NEW CONTENT END --}}
@endsection


@push('scripts')
<script src="{{ asset('js/mdb.min.js') }}"></script>

<script>
    jQuery(document).ready(function($) {

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

            // console.log("Hello");
            // localStorage.setItem("edit_seller_profile", "edit_btn_pressed");
            
            document.getElementById("profileBar_info").style.display = "none";
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

        $("#follow-checkss").hover(function(){
            var follow_checking = document.getElementById("follow-checkss").innerHTML;
            if(follow_checking == 'Following'){
                document.getElementById("follow-checkss").innerHTML = "Unfollow";
                console.log(follow_checking,'1');
            }else if(follow_checking == 'Follow'){
                document.getElementById("follow-checkss").innerHTML = "Follow";
                console.log(follow_checking,'2');
            }else{
            }
            }, function(){
                let follow_status = document.getElementById("check-follow-toggle").value;
                if(follow_status == 'Following'){
                    document.getElementById("follow-checkss").innerHTML = "Following";
                    console.log(follow_status,'3');
                }else{
                    document.getElementById("follow-checkss").innerHTML = "Follow";
                    console.log(follow_status,'4');
                }
        });
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
        $(document).on("click", ".post-actions", function(e) {
            if (e.currentTarget.classList.contains("post-actions")) {
                let post_id = $(e.currentTarget).attr('data-post');
                if (e.target.className === 'delete-post-action') {
                    Swal.fire({
                        title: "Are you sure you want to delete this Post?",
                        text: "You will not be able to recover this post!",
                        icon: "warning",
                        buttons: [
                            'No, cancel it!',
                            'Yes, I am sure!'
                        ],
                        dangerMode: true,
                        showCancelButton: true,
                    }).then(function(isConfirm) {
                        if (isConfirm.isConfirmed === true) {
                            deletePost(post_id)
                        } else {
                            Swal.fire("Cancelled", "Your post is safe :)", "error");
                        }
                    })
                }
            }
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
                    // $("#post-item-box-" + postId).remove();
                    // Swal.fire('Success', response.message);
                    window.location.reload();
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
                    // $("#post-item-box-" + postId).remove();
                    // Swal.fire('Success', response.message);
                    window.location.reload();
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

            var clickedTab = $(this).attr('id');
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
                Swal.fire({
                    title: "Are you sure you want to delete this image?",
                    text: "You will not be able to recover this image file!",
                    icon: "warning",
                    buttons: [
                        'No, cancel it!',
                        'Yes, I am sure!'
                    ],
                    dangerMode: true,
                    showCancelButton: true,
                }).then(function(isConfirm) {
                    if (isConfirm.isConfirmed === true) {
                        deleteGalleryImage(post_id);
                    } else {
                        Swal.fire("Cancelled", "Your imaginary file is safe :)", "error");
                    }
                })
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