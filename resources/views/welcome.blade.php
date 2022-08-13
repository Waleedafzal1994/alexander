@extends('layouts.app')

@section('styles')
<style>
    main {
        padding-bottom: 0 !important;
    }
</style>

@endsection


@section('content')
<style>
    .slick-slide {
        padding: 25px !important;
    }
</style>

<!-- <link rel="stylesheet" type="text/css" href="/css/slick.css" />
<link rel="stylesheet" type="text/css" href="/css/slick-theme.css" /> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

    <div class="bg-welcome-clr">
        <div class="ripple-section">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 d-flex align-items-center">
                        <div class="welcome-heading">
                            <h1 class="text-white">Welcome to GamersPlay</h1>
                            <p class="text-white">Your premier destination for finding gamer friends to play with!</p>
                            <br>
                            <a href="#" class="button-pu pulse get_start">Get started</a>
                            <!-- <a href="/services" class="button-pu pulse">Get started</a> -->
                            <a href="#learnMore" class="button-pub text-white">Learn more</a>
                        </div>
                    </div>
                    <div class="col-md-6">&nbsp;</div>
                </div>
                <!-- <div class="col-md-12">
                    <img src="/imgs/Gaming.png" alt="" class="mw-70">

                </div> -->
            </div>
        </div>
    

        <!-- Sample of a Complete form Modal-->
        <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop" >verification modal</button>

            <div class="modal fade mt-4" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" data-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-close-btn">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-header header-page login-header rounded-top">
                            <div class="header-img-modal-login-center custom-set">
                                <img class="img-modal-login-center" src="{{ asset('temp-services/images/newv3.png') }}">
                            </div>
                        </div>

                        <div class="modal-body dot-body">
                            <h5 class="text-center mb-4 font-weight-bold">Complete your details to meet new gamer friends!</h5>
                            <form method="POST" id="profileFormModal">
                                <div class="row pb-3">
                                    <div class="col-12">
                                        <div class="form-group mb-3 pb-3">
                                            <h6>Nick Name</h6>
                                            <input type="text" id="nickName" placeholder="Please enter your nickname" name="name" value="" required autocomplete="name" autofocus>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group mb-3 pb-3">
                                            <h6>Gender</h6>
                                            <div class="newdropdown">
                                                <div class="dropdown w-100">
                                                    <a id="drop1" href="#" class="dropdown-toggle d-flex align-items-center justify-content-between" data-toggle="dropdown" aria-haspopup="true" role="button" aria-expanded="false">
                                                        <div class="game-title" id="drop_down_select">Please select you gender</div>
                                                    </a>

                                                    <ul class="dropdown-menu" role="menu" aria-labelledby="drop1">
                                                        <div class="scroll-div">
                                                            <li role="presentation" class="">
                                                                <a role="menuitem" tabindex="-1">
                                                                    <div class="">Male</div>
                                                                </a>
                                                            </li>
                                                            <li role="presentation" class="">
                                                                <a role="menuitem" tabindex="-1">
                                                                    <div class="">Female</div>
                                                                </a>
                                                            </li>
                                                            <li role="presentation" class="">
                                                                <a role="menuitem" tabindex="-1">
                                                                    <div class="">Other</div>
                                                                </a>
                                                            </li>
                                                        </div>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 mb-3 pb-3">
                                        <h6>Birthday</h6>

                                        <div class="w-100 d-flex align-items-center justify-content-between dob-dropdown">
                                            <div class="form-group w-100 mr-2">
                                                <div class="newdropdown">
                                                    <div class="dropdown w-100">
                                                        <a id="drop1" href="#" class="dropdown-toggle d-flex align-items-center justify-content-between" data-toggle="dropdown" aria-haspopup="true" role="button" aria-expanded="false">
                                                            <div class="game-title" id="drop_down_select">Month</div>
                                                        </a>

                                                        <ul class="dropdown-menu" role="menu" aria-labelledby="drop1">
                                                            <div class="scroll-div">
                                                                <li role="presentation" class="active">
                                                                    <a role="menuitem" tabindex="-1">
                                                                        <div class="">Jan</div>
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z" fill="#fff"/></svg>
                                                                    </a>
                                                                </li>
                                                                <li role="presentation" class="">
                                                                    <a role="menuitem" tabindex="-1">
                                                                        <div class="">Feb</div>
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z" fill="#fff"/></svg>
                                                                    </a>
                                                                </li>
                                                                <li role="presentation" class="">
                                                                    <a role="menuitem" tabindex="-1">
                                                                        <div class="">Mar</div>
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z" fill="#fff"/></svg>
                                                                    </a>
                                                                </li>
                                                                <li role="presentation" class="">
                                                                    <a role="menuitem" tabindex="-1">
                                                                        <div class="">Apr</div>
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z" fill="#fff"/></svg>
                                                                    </a>
                                                                </li>
                                                                <li role="presentation" class="">
                                                                    <a role="menuitem" tabindex="-1">
                                                                        <div class="">May</div>
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z" fill="#fff"/></svg>
                                                                    </a>
                                                                </li>
                                                                <li role="presentation" class="">
                                                                    <a role="menuitem" tabindex="-1">
                                                                        <div class="">Jun</div>
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z" fill="#fff"/></svg>
                                                                    </a>
                                                                </li>
                                                                <li role="presentation" class="">
                                                                    <a role="menuitem" tabindex="-1">
                                                                        <div class="">Jul</div>
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z" fill="#fff"/></svg>
                                                                    </a>
                                                                </li>
                                                                <li role="presentation" class="">
                                                                    <a role="menuitem" tabindex="-1">
                                                                        <div class="">Aug</div>
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z" fill="#fff"/></svg>
                                                                    </a>
                                                                </li>
                                                                <li role="presentation" class="">
                                                                    <a role="menuitem" tabindex="-1">
                                                                        <div class="">Sep</div>
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z" fill="#fff"/></svg>
                                                                    </a>
                                                                </li>
                                                                <li role="presentation" class="">
                                                                    <a role="menuitem" tabindex="-1">
                                                                        <div class="">Oct</div>
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z" fill="#fff"/></svg>
                                                                    </a>
                                                                </li>
                                                                <li role="presentation" class="">
                                                                    <a role="menuitem" tabindex="-1">
                                                                        <div class="">Nov</div>
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z" fill="#fff"/></svg>
                                                                    </a>
                                                                </li>
                                                                <li role="presentation" class="">
                                                                    <a role="menuitem" tabindex="-1">
                                                                        <div class="">Dec</div>
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z" fill="#fff"/></svg>
                                                                    </a>
                                                                </li>
                                                            </div>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group w-100 mr-2">
                                                <div class="newdropdown">
                                                    <div class="dropdown w-100">
                                                        <a id="drop1" href="#" class="dropdown-toggle d-flex align-items-center justify-content-between" data-toggle="dropdown" aria-haspopup="true" role="button" aria-expanded="false">
                                                            <div class="game-title" id="drop_down_select">Date</div>
                                                        </a>

                                                        <ul class="dropdown-menu" role="menu" aria-labelledby="drop1">
                                                            <div class="scroll-div">
                                                                @for($d = 01; $d<=31; $d++)
                                                                <li role="presentation" class="">
                                                                    <a role="menuitem" tabindex="-1">
                                                                        <div class="">{{$d}}</div>
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z" fill="#fff"/></svg>
                                                                    </a>
                                                                </li>
                                                                @endfor
                                                            </div>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group w-100">
                                                <div class="newdropdown">
                                                    <div class="dropdown w-100">
                                                        <a id="drop1" href="#" class="dropdown-toggle d-flex align-items-center justify-content-between" data-toggle="dropdown" aria-haspopup="true" role="button" aria-expanded="false">
                                                            <div class="game-title" id="drop_down_select">Year</div>
                                                        </a>

                                                        <ul class="dropdown-menu" role="menu" aria-labelledby="drop1">
                                                            <div class="scroll-div">
                                                                @for($i = 1950; $i<= 2022; $i++)
                                                                <li role="presentation" class="">
                                                                    <a role="menuitem" tabindex="-1">
                                                                        <div id="year">{{$i}}</div>
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z" fill="#fff"/></svg>
                                                                    </a>
                                                                </li>
                                                                @endfor
                                                            </div>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 py-2">
                                        <h6>Invitation Code (Optional) <span><a type="button" class="rounded-circle px-1" data-tooltip title="Please contact your registered friends on the platform and obtain an invitation code from the community event.">?</a></span></h6>
                                        <input type="text" placeholder="Please enter your invitation code" name="referal_code" autocomplete="Invitation Code" autofocus>
                                    </div>

                                    <div class="col-12 text-center mt-4 completeBtn">
                                        <button class="new-btn rounded-pill font-weight-bold bg-purple-gradient text-white px-4 py-2" id="completeBtn" disabled>Complete</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div> 
        -->


        <div class="container">

            <!-- <div class="row">
                <div class="col-md-12" style="text-align:center;">
                    <img src="/imgs/Gaming.png" alt="" class="mw-70">
                    <h1>Welcome to GamersPlay</h1>
                    <p>Your premier destination for finding gamer friends to play with!</p>
                    <br>
                    <a href="/services" class="button-pu palse">Get started</a>
                    <a href="#" class="button-pu pulse">Get started</a>
                    <a href="#learnMore" class="button-pub">Learn more</a>
                </div>
            </div> -->
            <div class="text-center">
                <img src="/imgs/gamers-play-lfg.png" alt="" class="characters_image">
            </div>
            <div class="position-relative">
                <div class="flex-collapse frontpage-hero-box new-purple-gradient text-white w-100">
                    <div class="mobile-img mr-4">
                        <img src="/imgs/gamersplay-lfg.png" class="" alt="">
                    </div>

                    <div class="d-flex align-items-center justify-content-between w-100 flex-wrap">
                        <div>
                            <!-- <img src="/imgs/icons/gamersplay-lfg.png" alt="" style="height:50px; margin-right:15px;" class="mr-3"> -->
                            <span class="dashed-heading font-weight-bold">Ready to find your gamer friend?</span>
                        </div>
                        <div class="d-flex align-items-center highlights">
                            <span class="dashed-heading ml-0 mt-0 font-weight-bold mr-2">100K GP+ Gamers offering their companionship</span>
                            <div class="frontpage-hero-box-cta text-white shadow">Let's Play!</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div style="height:70px;">
        </div>

        <div class="container mb-5 pb-5">
            <div class="row d-flex align-items-center justify-content-center games-cards flex-wrap mb-5">
                <div class="col-lg col-md-4 col-sm-6">
                    <div class="card border-0 p-0">
                        <div class="card-body p-0">
                            <div class="card-image position-relative br-10">
                                <img src="/imgs/league-of-legends-lfg.png" class="w-100" alt="">
                                <div class="titles text-white font-weight-bold">
                                    <div class="card-sub-title font-weight-normal">League of Legends</div>
                                    <div class="card-title new-purple-gradient br-10 px-2 py-1 shadow">5.780 GP+ Gamers</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg col-md-4 col-sm-6">
                    <div class="card border-0 p-0">
                        <div class="card-body p-0">
                            <div class="card-image position-relative br-10">
                                <img src="/imgs/Valorant-lfg.png" class="w-100" alt="">
                                <div class="titles text-white font-weight-bold">
                                    <div class="card-sub-title font-weight-normal">Valorant</div>
                                    <div class="card-title new-purple-gradient br-10 px-2 py-1 shadow">4.639 GP+ Gamers</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg col-md-4 col-sm-6">
                    <div class="card border-0 p-0">
                        <div class="card-body p-0">
                            <div class="card-image position-relative br-10">
                                <img src="/imgs/Fortnite-lfg.png" class="w-100" alt="">
                                <div class="titles text-white font-weight-bold">
                                    <div class="card-sub-title font-weight-normal">Fortnite</div>
                                    <div class="card-title new-purple-gradient br-10 px-2 py-1 shadow">3.738 GP+ Gamers</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg col-md-4 col-sm-6">
                    <div class="card border-0 p-0">
                        <div class="card-body p-0">
                            <div class="card-image position-relative br-10">
                                <img src="/imgs/Apex-Legends-lfg.png" class="w-100" alt="">
                                <div class="titles text-white font-weight-bold">
                                    <div class="card-sub-title font-weight-normal">Apex Legends</div>
                                    <div class="card-title new-purple-gradient br-10 px-2 py-1 shadow">2.367 GP+ Gamers</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg col-md-4 col-sm-6">
                    <div class="card border-0 p-0">
                        <div class="card-body p-0">
                            <div class="card-image position-relative br-10">
                                <img src="/imgs/Overwatch-lfg.png" class="w-100" alt="">
                                <div class="titles text-white font-weight-bold">
                                    <div class="card-sub-title font-weight-normal">Overwatch 2</div>
                                    <div class="card-title new-purple-gradient br-10 px-2 py-1 shadow">1.457 GP+ Gamers</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="container">
            <div class="row gamer-puzzle-section justify-content-center">
                <div class="col-lg-5 col-md-5 px-0">
                    <div class="row left-cards">
                        <div class="col-6 px-0">
                            <img src="imgs/become-recognized.png" class="w-100" alt="">
                        </div>
                        <div class="col-6 px-0">
                            <img src="imgs/earn-xp.png" class="w-100" alt="">
                        </div>
                        <div class="col-6 px-0">
                            <img src="imgs/upload-your-highlights-.png" class="w-100" alt="">
                        </div>
                        <div class="col-6 px-0">
                            <img src="imgs/conquer-the-ladders.png" class="w-100" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-2">
                    <div class="middle-puzzle">
                        <img src="imgs/purple-bolt.png" alt="">
                    </div>
                </div>
                <div class="col-lg-5 col-md-5 px-0">
                <div class="row right-cards">
                        <div class="col-6 px-0">
                            <img src="imgs/play-to-earn-crypto-.png" class="w-100" alt="">
                        </div>
                        <div class="col-6 px-0">
                            <img src="imgs/get-paid.png" class="w-100" alt="">
                        </div>
                        <div class="col-6 px-0">
                            <img src="imgs/keep-your-fans.png" class="w-100" alt="">
                        </div>
                        <div class="col-6 px-0">
                            <img src="imgs/vip-benefits.png" class="w-100" alt="">
                        </div>
                </div>
                </div>
            </div>
        </div> -->

        <!-- <div style="display:flex; justify-content:center; margin-top: 40px;">
            <img src="/imgs/arrow-02.png" class="frontpage-arrow-down">
        </div>
        <div style="height:70px;">
        </div> -->

        @if (isset($popular) && count($popular) > 0)
        {{-- <div style="background:#581C87; color:white; padding:10px 0;">
                    <br>
                    <h4 style="text-align:center;">GamersPlay+ members are offering hundreds of gaming and lifestyle services</h4>
                    <div class="autoplay-container" style="display:flex; justify-content:center;">
                        <div class="autoplay mobile-width"
                            style="text-align: center; justify-content:center; margin-top:50px; max-width:60vw;">
                            @foreach ($popular as $category)
                                <a href="/services?category={{ $category->id }}&menu={{ $category->menu_id }}"
        style="color:white; display:flex; justify-content:center; ">
        <div style="width:100%; max-width:33vw;">
            <img src="{{ $category->image_1 }}">
            <h6>{{ $category->name }}</h6>
        </div>
        </a>
        @endforeach
        </div>
        </div>

        </div> --}}


        <!-- Dynamic slick carousel start -->
        <!-- <div class="section carousel-section new-purple-gradient">
            <br>
            <h4 class="text-center">GamersPlay+ members are offering hundreds of gaming and lifestyle services</h4>
            <div class="justify-content-center d-flex">
                <div class="carousel text-center justify-content-center mt-5">
                    @foreach ($popular as $category)
                    <a href="/services?category={{ $category->id }}&menu={{ $category->menu_id }}" class=" slider-link d-flex justify-content-center">
                        <div class="w-100 ">
                            <img src="{{ $category->image_1 }}" class="slider-img">
                            <h6 class="mt-3">{{ $category->name }}</h6>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div> -->
        <!-- Dynamic slick carousel end -->

        <!-- Static slick carousel start -->       
        <div class="section carousel-section new-purple-gradient" id="carousel_id">
            <br>
            <h4 class="text-center">GamersPlay+ members are offering hundreds of gaming and lifestyle services</h4>
            <br>
            <div class="owl-carousel owl-theme">
                <div class="item">
                    <a href="#carousel_id" class="slider-link d-flex justify-content-center">
                        <div class="w-100 ">
                            <img src="/imgs/SliderGames/apex-legends-lfg.jpg" class="slider-img">
                            <h6 class="mt-3">Apex Legends</h6>
                        </div>
                    </a>
                </div>
                <div class="item">
                    <a href="#carousel_id" class="slider-link d-flex justify-content-center">
                        <div class="w-100 ">
                            <img src="/imgs/SliderGames/cs-go-lfg.jpg" class="slider-img">
                            <h6 class="mt-3">CS GO</h6>
                        </div>
                    </a>
                </div>
                <div class="item">
                    <a href="#carousel_id" class="slider-link d-flex justify-content-center">
                        <div class="w-100 ">
                            <img src="/imgs/SliderGames/dota2-lfg.jpg" class="slider-img">
                            <h6 class="mt-3">DOTA 2</h6>
                        </div>
                    </a>
                </div>
                <div class="item">
                    <a href="#carousel_id" class="slider-link d-flex justify-content-center">
                        <div class="w-100 ">
                            <img src="/imgs/SliderGames/elder-ring-lfg.jpg" class="slider-img">
                            <h6 class="mt-3">ELDER RING</h6>
                        </div>
                    </a>
                </div>
                <div class="item">
                    <a href="#carousel_id" class="slider-link d-flex justify-content-center">
                        <div class="w-100 ">
                            <img src="/imgs/SliderGames/fortnite-lfg.jpg" class="slider-img">
                            <h6 class="mt-3">FORTNITE</h6>
                        </div>
                    </a>
                </div>
                <div class="item">
                    <a href="#carousel_id" class="slider-link d-flex justify-content-center">
                        <div class="w-100 ">
                            <img src="/imgs/SliderGames/league-of-legends-lfg.jpg" class="slider-img">
                            <h6 class="mt-3">LEAGUE OF LEGENDS</h6>
                        </div>
                    </a>
                </div>
                <div class="item">
                    <a href="#carousel_id" class="slider-link d-flex justify-content-center">
                        <div class="w-100 ">
                            <img src="/imgs/SliderGames/lost-ark-lfg.jpg" class="slider-img">
                            <h6 class="mt-3">LOST ARK</h6>
                        </div>
                    </a>
                </div>
                <div class="item">
                    <a href="#carousel_id" class="slider-link d-flex justify-content-center">
                        <div class="w-100 ">
                            <img src="/imgs/SliderGames/roblox-lfg.jpg" class="slider-img">
                            <h6 class="mt-3">ROBLOX</h6>
                        </div>
                    </a>
                </div>
                <div class="item">
                    <a href="#carousel_id" class="slider-link d-flex justify-content-center">
                        <div class="w-100 ">
                            <img src="/imgs/SliderGames/the-elder-scrolls-lfg.jpg" class="slider-img">
                            <h6 class="mt-3">THE ELDER SCROLLS</h6>
                        </div>
                    </a>
                </div>
                <div class="item">
                    <a href="#carousel_id" class="slider-link d-flex justify-content-center">
                        <div class="w-100 ">
                            <img src="/imgs/SliderGames/valorant-lfg.jpg" class="slider-img">
                            <h6 class="mt-3">VALORANT</h6>
                        </div>
                    </a>
                </div>
                <div class="item">
                    <a href="#carousel_id" class="slider-link d-flex justify-content-center">
                        <div class="w-100 ">
                            <img src="/imgs/SliderGames/wild-rift-lfg.jpg" class="slider-img">
                            <h6 class="mt-3">WILD RIFT</h6>
                        </div>
                    </a>
                </div>
            </div>
            <br>
            <br>
        </div>
        <!-- Static slick carousel end -->


        <svg id="visual" class="mobile-svg-home-section" viewBox="0 0 1300 50" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1">
        </svg>
        @else
        <div style="height:150px; overflow:hidden;">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                <path fill="#581C87" fill-opacity="1" d="M0,224L120,213.3C240,203,480,181,720,181.3C960,181,1200,203,1320,213.3L1440,224L1440,0L1320,0C1200,0,960,0,720,0C480,0,240,0,120,0L0,0Z">
                </path>
            </svg>
        </div>

        @endif

        <div class="container my-5 pt-4">
            <div class="row gamer-puzzle-section justify-content-center">
                <div class="col-lg-5 col-md-5 px-0">
                    <div class="row left-cards">
                        <div class="col-6 px-0">
                            <img src="imgs/become-recognized.png" class="w-100" alt="">
                        </div>
                        <div class="col-6 px-0">
                            <img src="imgs/earn-xp.png" class="w-100" alt="">
                        </div>
                        <div class="col-6 px-0">
                            <img src="imgs/upload-your-highlights-.png" class="w-100" alt="">
                        </div>
                        <div class="col-6 px-0">
                            <img src="imgs/conquer-the-ladders.png" class="w-100" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-2 pr-0">
                    <div class="middle-puzzle">
                        <img src="imgs/purple-bolt.png" alt="">
                    </div>
                </div>
                <div class="col-lg-5 col-md-5 px-0">
                <div class="row right-cards">
                        <div class="col-6 px-0">
                            <img src="imgs/play-to-earn-crypto-.png" class="w-100" alt="">
                        </div>
                        <div class="col-6 px-0">
                            <img src="imgs/get-paid.png" class="w-100" alt="">
                        </div>
                        <div class="col-6 px-0">
                            <img src="imgs/keep-your-fans.png" class="w-100" alt="">
                        </div>
                        <div class="col-6 px-0">
                            <img src="imgs/vip-benefits.png" class="w-100" alt="">
                        </div>
                </div>
                </div>
            </div>
        </div>

        <div style="display:flex; justify-content:center; padding-top:50px;">
            <img src="/imgs/arrow-02.png" class="frontpage-arrow-down">
        </div>

        <br id="learnMore">
        <br>
        <h2 style="text-align:center; font-weight:700 !important; margin:50px 0; font-size: 2.5rem;">How GamersPlay works</h2>

        <div class="container">


            <div class="row">
                <div class="col-md-4">
                    <div style="text-align:center">
                        <img src="{{ asset('imgs/findservices.png') }}" class="mw-80">
                        <div class="wrapper">
                            <a class="cta" href="#">
                                <spanb>Find</spanb>

                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div style="text-align:center">
                        <img src="{{ asset('imgs/3d/match.png') }}" class="mw-80">
                        <div class="wrapper">
                            <a class="cta" href="#">
                                <spanb>Match</spanb>

                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div style="text-align:center">
                        <img src="{{ asset('imgs/order.png') }}" class="mw-80">
                        <div class="wrapper">
                            <a class="cta" href="#">
                                <spanb>Order</spanb>

                            </a>
                        </div>
                    </div>
                </div>


            </div>
            <div style="height:100px;"></div>
        </div>
        <div style="display:flex; justify-content:center; margin-top: 50px;">
            <img src="/imgs/arrow-02.png" class="frontpage-arrow-down">
        </div>
        <div class="container">
            <div class="col-md-12">
                <div class="frontpage-discord-box position-relative">
                    <img src="/imgs/discord-logo3d.png" style="height:31px;">
                    <img src="{{asset('imgs/discord-gift-box-cutted.png')}}" width="220px" class="gift-image desktopview">
                    <img src="{{asset('imgs/discord-gift-box-cutted.png')}}" width="220px" class="gift-image-left desktopview">
                    <img src="{{asset('imgs/discord-gift-box.png')}}" width="180px" height="160px" class="gift-image mobileview">
                    <div style=" height:100%; display:flex; justify-content:space-between; align-items:center;" class="flex-collapse">
                        <div>
                            <h3 class="text-white"style="margin-top:35px;">Join our Discord server community</h3>
                            <p class="text-white mb-4">Join us for news, updates and latest giveaways.</p>
                        </div>

                        <div>
                            <a href="https://discord.gg/vQ6eAYb8kZ" class="btn btn-discord">Join Discord Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div style="height:70px;"></div>
    </div>

<script>
    document.documentElement.style.scrollBehavior = "smooth";
</script>

@endsection


@section('footer')
@include('partials.footer')
@endsection

@if (isset($popular) && count($popular) > 0)
@push('scripts')


<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js" ></script>
<script>
    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 25,
        autoplay: true,
        slideTransition: 'linear',
        dots: false,
        nav: false,
        smartSpeed: 2500,
        autoplaySpeed: 5000,
        responsiveClass:true,
        mouseDrag: false,
        responsive:{
            0:{
                items:2,
            },
            600:{
                items:3,
            },
            768:{
                items:4,
            },
            991:{
                items:5,
            },
            1100:{
                items:6,
            },
            1300:{
                items:7,
            },
            1500:{
                items:9,
            }
        }
    })
    
    $('.dropdown').on('show.bs.dropdown', function(e) {
        $(this).find('.dropdown-menu').first().stop(true, true).slideDown(300);
    });

    $('.dropdown').on('hide.bs.dropdown', function(e) {
        $(this).find('.dropdown-menu').first().stop(true, true).slideUp(300);
    });

    var user = "{{ !empty(Auth::user()->id) ? Auth::user()->id : ''}}";
    $(document).ready(function() {
        $('.get_start').click(function() {
            if (user == '') 
            {
                var msg = 'asdfasdf';
                Swal.fire('Error', 'You are not login. Please Login Now');
            }
            else
            {
                window.location.href = "{{url('/gp')}}";
            }
                    
        });
   })

</script>

@endpush
@endif