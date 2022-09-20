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
                            <a type="button" data-target="#loginModal" data-toggle="modal" data-backdrop="static" data-keyboard="false" class="button-pu pulse">Get started</a>
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
                            <div class="frontpage-hero-box-cta text-white shadows">Let's Play!</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div style="height:70px;">
        </div>

        <div class="container mb-5 pb-5">
            <div class="row d-flex align-items-center justify-content-center games-cards flex-wrap">
                <div class="col-lg col-md-4 col-sm-6">
                    <div class="card border-0 p-0">
                        <div class="card-body p-0">
                            <div class="card-image position-relative br-10">
                                <img src="/imgs/league-of-legends-lfg.png" class="w-100" alt="">
                                <div id="play-video" class="video-play-button" href="#">
                                    <span></span>
                                </div>
                                <div class="titles text-white font-weight-bold">
                                    <div class="card-sub-title font-weight-medium">League of Legends</div>
                                    <div class="card-title new-purple-gradient br-10 px-2 py-1 shadows font-weight-bold">5.780 GP+ Gamers</div>
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
                                <div id="play-video" class="video-play-button" href="#">
                                    <span></span>
                                </div>
                                <div class="titles text-white font-weight-bold">
                                    <div class="card-sub-title font-weight-medium">Valorant</div>
                                    <div class="card-title new-purple-gradient font-weight-bold br-10 px-2 py-1 shadows">4.639 GP+ Gamers</div>
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
                                <div id="play-video" class="video-play-button" href="#">
                                    <span></span>
                                </div>
                                <div class="titles text-white font-weight-bold">
                                    <div class="card-sub-title font-weight-medium">Fortnite</div>
                                    <div class="card-title new-purple-gradient font-weight-bold br-10 px-2 py-1 shadows">3.738 GP+ Gamers</div>
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
                                <div id="play-video" class="video-play-button" href="#">
                                    <span></span>
                                </div>
                                <div class="titles text-white font-weight-bold">
                                    <div class="card-sub-title font-weight-medium">Apex Legends</div>
                                    <div class="card-title new-purple-gradient font-weight-bold br-10 px-2 py-1 shadows">2.367 GP+ Gamers</div>
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
                                <div id="play-video" class="video-play-button" href="#">
                                    <span></span>
                                </div>
                                <div class="titles text-white font-weight-bold">
                                    <div class="card-sub-title font-weight-medium">Overwatch 2</div>
                                    <div class="card-title new-purple-gradient font-weight-bold br-10 px-2 py-1 shadows">1.457 GP+ Gamers</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container pb-5 mb-5">
            <!-- <div class="d-flex align-items-center justify-content-between flex-wrap diff-btns"> -->
            <div class="d-flex align-items-center diff-btns flex-wrap">
                <svg class="liquid-button"
                    data-text="#MATCH"
                    data-force-factor="0.1"
                    data-layer-1-viscosity="0.5"
                    data-layer-2-viscosity="0.4"
                    data-layer-1-mouse-force="400"
                    data-layer-2-mouse-force="500"
                    data-layer-1-force-limit="1"
                    data-layer-2-force-limit="2"
                ></svg>
                <svg class="liquid-button"
                    data-text="#GAMERS"
                    data-force-factor="0.1"
                    data-layer-1-viscosity="0.5"
                    data-layer-2-viscosity="0.4"
                    data-layer-1-mouse-force="400"
                    data-layer-2-mouse-force="500"
                    data-layer-1-force-limit="1"
                    data-layer-2-force-limit="2"
                ></svg>
                <svg class="liquid-button"
                    data-text="#E-GIRLS"
                    data-force-factor="0.1"
                    data-layer-1-viscosity="0.5"
                    data-layer-2-viscosity="0.4"
                    data-layer-1-mouse-force="400"
                    data-layer-2-mouse-force="500"
                    data-layer-1-force-limit="1"
                    data-layer-2-force-limit="2"
                ></svg>
                <svg class="liquid-button"
                    data-text="#PLAY"
                    data-force-factor="0.1"
                    data-layer-1-viscosity="0.5"
                    data-layer-2-viscosity="0.4"
                    data-layer-1-mouse-force="400"
                    data-layer-2-mouse-force="500"
                    data-layer-1-force-limit="1"
                    data-layer-2-force-limit="2"
                ></svg>
                <svg class="liquid-button"
                    data-text="#REWARDS"
                    data-force-factor="0.1"
                    data-layer-1-viscosity="0.5"
                    data-layer-2-viscosity="0.4"
                    data-layer-1-mouse-force="400"
                    data-layer-2-mouse-force="500"
                    data-layer-1-force-limit="1"
                    data-layer-2-force-limit="2"
                ></svg>
                <svg class="liquid-button"
                    data-text="#GIVEAWAYS"
                    data-force-factor="0.1"
                    data-layer-1-viscosity="0.5"
                    data-layer-2-viscosity="0.4"
                    data-layer-1-mouse-force="400"
                    data-layer-2-mouse-force="500"
                    data-layer-1-force-limit="1"
                    data-layer-2-force-limit="2"
                ></svg>
                <svg class="liquid-button"
                    data-text="#CASH INCOME"
                    data-force-factor="0.1"
                    data-layer-1-viscosity="0.5"
                    data-layer-2-viscosity="0.4"
                    data-layer-1-mouse-force="400"
                    data-layer-2-mouse-force="500"
                    data-layer-1-force-limit="1"
                    data-layer-2-force-limit="2"
                ></svg>
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

    // LIQUID BUTTON ANIMATION
        const LiquidButton = class LiquidButton {
        constructor(svg) {
            const options = svg.dataset;
            this.id = this.constructor.id || (this.constructor.id = 1);
            this.constructor.id++;
            this.xmlns = 'http://www.w3.org/2000/svg';
            this.tension = options.tension * 1 || 0.4;
            this.width   = options.width   * 1 || 150;
            this.height  = options.height  * 1 ||  50;
            this.margin  = options.margin  ||  10;
            this.hoverFactor = options.hoverFactor || -0.1;
            this.gap     = options.gap     ||   3;
            this.debug   = options.debug   || false;
            this.forceFactor = options.forceFactor || 0.2;
            this.color1 = options.color1 || '#36DFE7';
            this.color2 = options.color2 || '#8F17E1';
            this.color3 = options.color3 || '#BF09E6';
            this.textColor = options.textColor || '#FFFFFF';
            this.text = options.text    || '▶';
            this.svg = svg;
            this.layers = [{
            points: [],
            viscosity: 0.5,
            mouseForce: 100,
            forceLimit: 2,
            },{
            points: [],
            viscosity: 0.8,
            mouseForce: 150,
            forceLimit: 3,
            }];
            for (let layerIndex = 0; layerIndex < this.layers.length; layerIndex++) {
            const layer = this.layers[layerIndex];
            layer.viscosity = options['layer-' + (layerIndex + 1) + 'Viscosity'] * 1 || layer.viscosity;
            layer.mouseForce = options['layer-' + (layerIndex + 1) + 'MouseForce'] * 1 || layer.mouseForce;
            layer.forceLimit = options['layer-' + (layerIndex + 1) + 'ForceLimit'] * 1 || layer.forceLimit;
            layer.path = document.createElementNS(this.xmlns, 'path');
            this.svg.appendChild(layer.path);
            }
            this.wrapperElement = options.wrapperElement || document.body;
            if (!this.svg.parentElement) {
            this.wrapperElement.append(this.svg);
            }

            this.svgText = document.createElementNS(this.xmlns, 'text');
            this.svgText.setAttribute('x', '50%');
            this.svgText.setAttribute('y', '50%');
            this.svgText.setAttribute('dy', ~~(this.height / 8) + 'px');
            this.svgText.setAttribute('font-size', ~~(this.height / 3));
            this.svgText.style.fontFamily = 'sans-serif';
            this.svgText.setAttribute('text-anchor', 'middle');
            this.svgText.setAttribute('pointer-events', 'none');
            this.svg.appendChild(this.svgText);

            this.svgDefs = document.createElementNS(this.xmlns, 'defs')
            this.svg.appendChild(this.svgDefs);

            this.touches = [];
            this.noise = options.noise || 0;
            document.body.addEventListener('touchstart', this.touchHandler);
            document.body.addEventListener('touchmove', this.touchHandler);
            document.body.addEventListener('touchend', this.clearHandler);
            document.body.addEventListener('touchcancel', this.clearHandler);
            this.svg.addEventListener('mousemove', this.mouseHandler);
            this.svg.addEventListener('mouseout', this.clearHandler);
            this.initOrigins();
            this.animate();
        }

        get mouseHandler() {
            return (e) => {
            this.touches = [{
                x: e.offsetX,
                y: e.offsetY,
                force: 1,
            }];
            };
        }

        get touchHandler() {
            return (e) => {
            this.touches = [];
            const rect = this.svg.getBoundingClientRect();
            for (let touchIndex = 0; touchIndex < e.changedTouches.length; touchIndex++) {
                const touch = e.changedTouches[touchIndex];
                const x = touch.pageX - rect.left;
                const y = touch.pageY - rect.top;
                if (x > 0 && y > 0 && x < this.svgWidth && y < this.svgHeight) {
                this.touches.push({x, y, force: touch.force || 1});
                }
            }
            e.preventDefault();
            };
        }

        get clearHandler() {
            return (e) => {
            this.touches = [];
            };
        }

        get raf() {
            return this.__raf || (this.__raf = (
            window.requestAnimationFrame ||
            window.webkitRequestAnimationFrame ||
            window.mozRequestAnimationFrame ||
            function(callback){ setTimeout(callback, 10)}
            ).bind(window));
        }

        distance(p1, p2) {
            return Math.sqrt(Math.pow(p1.x - p2.x, 2) + Math.pow(p1.y - p2.y, 2));
        }

        update() {
            for (let layerIndex = 0; layerIndex < this.layers.length; layerIndex++) {
            const layer = this.layers[layerIndex];
            const points = layer.points;
            for (let pointIndex = 0; pointIndex < points.length; pointIndex++) {
                const point = points[pointIndex];
                const dx = point.ox - point.x + (Math.random() - 0.5) * this.noise;
                const dy = point.oy - point.y + (Math.random() - 0.5) * this.noise;
                const d = Math.sqrt(dx * dx + dy * dy);
                const f = d * this.forceFactor;
                point.vx += f * ((dx / d) || 0);
                point.vy += f * ((dy / d) || 0);
                for (let touchIndex = 0; touchIndex < this.touches.length; touchIndex++) {
                const touch = this.touches[touchIndex];
                let mouseForce = layer.mouseForce;
                if (
                    touch.x > this.margin &&
                    touch.x < this.margin + this.width &&
                    touch.y > this.margin &&
                    touch.y < this.margin + this.height
                ) {
                    mouseForce *= -this.hoverFactor;
                }
                const mx = point.x - touch.x;
                const my = point.y - touch.y;
                const md = Math.sqrt(mx * mx + my * my);
                const mf = Math.max(-layer.forceLimit, Math.min(layer.forceLimit, (mouseForce * touch.force) / md));
                point.vx += mf * ((mx / md) || 0);
                point.vy += mf * ((my / md) || 0);
                }
                point.vx *= layer.viscosity;
                point.vy *= layer.viscosity;
                point.x += point.vx;
                point.y += point.vy;
            }
            for (let pointIndex = 0; pointIndex < points.length; pointIndex++) {
                const prev = points[(pointIndex + points.length - 1) % points.length]; 
                const point = points[pointIndex];
                const next = points[(pointIndex + points.length + 1) % points.length];
                const dPrev = this.distance(point, prev);
                const dNext = this.distance(point, next);

                const line = {
                x: next.x - prev.x,
                y: next.y - prev.y,
                };
                const dLine = Math.sqrt(line.x * line.x + line.y * line.y);

                point.cPrev = {
                x: point.x - (line.x / dLine) * dPrev * this.tension,
                y: point.y - (line.y / dLine) * dPrev * this.tension,
                };
                point.cNext = {
                x: point.x + (line.x / dLine) * dNext * this.tension,
                y: point.y + (line.y / dLine) * dNext * this.tension,
                };
            }
            }
        }

        animate() {
            this.raf(() => {
            this.update();
            this.draw();
            this.animate();
            });
        }

        get svgWidth() {
            return this.width + this.margin * 2;
        }

        get svgHeight() {
            return this.height + this.margin * 2;
        }

        draw() {
            for (let layerIndex = 0; layerIndex < this.layers.length; layerIndex++) {
            const layer = this.layers[layerIndex];
            if (layerIndex === 1) {
                if (this.touches.length > 0) {
                while (this.svgDefs.firstChild) {
                    this.svgDefs.removeChild(this.svgDefs.firstChild);
                }
                for (let touchIndex = 0; touchIndex < this.touches.length; touchIndex++) {
                    const touch = this.touches[touchIndex];
                    const gradient = document.createElementNS(this.xmlns, 'radialGradient');
                    gradient.id = 'liquid-gradient-' + this.id + '-' + touchIndex;
                    const start = document.createElementNS(this.xmlns, 'stop');
                    start.setAttribute('stop-color', this.color3);
                    start.setAttribute('offset', '0%');
                    const stop = document.createElementNS(this.xmlns, 'stop');
                    stop.setAttribute('stop-color', this.color2);
                    stop.setAttribute('offset', '100%');
                    gradient.appendChild(start);
                    gradient.appendChild(stop);
                    this.svgDefs.appendChild(gradient);
                    gradient.setAttribute('cx', touch.x / this.svgWidth);
                    gradient.setAttribute('cy', touch.y / this.svgHeight);
                    gradient.setAttribute('r', touch.force);
                    layer.path.style.fill = 'url(#' + gradient.id + ')';
                }
                } else {
                layer.path.style.fill = this.color2;
                }
            } else {
                layer.path.style.fill = this.color1;
            }
            const points = layer.points;
            const commands = [];
            commands.push('M', points[0].x, points[0].y);
            for (let pointIndex = 1; pointIndex < points.length; pointIndex += 1) {
                commands.push('C',
                points[(pointIndex + 0) % points.length].cNext.x,
                points[(pointIndex + 0) % points.length].cNext.y,
                points[(pointIndex + 1) % points.length].cPrev.x,
                points[(pointIndex + 1) % points.length].cPrev.y,
                points[(pointIndex + 1) % points.length].x,
                points[(pointIndex + 1) % points.length].y
                );
            }
            commands.push('Z');
            layer.path.setAttribute('d', commands.join(' '));
            }
            this.svgText.textContent = this.text;
            this.svgText.style.fill = this.textColor;
        }

        createPoint(x, y) {
            return {
            x: x,
            y: y,
            ox: x,
            oy: y,
            vx: 0,
            vy: 0,
            };
        }

        initOrigins() {
            this.svg.setAttribute('width', this.svgWidth);
            this.svg.setAttribute('height', this.svgHeight);
            for (let layerIndex = 0; layerIndex < this.layers.length; layerIndex++) {
            const layer = this.layers[layerIndex];
            const points = [];
            for (let x = ~~(this.height / 2); x < this.width - ~~(this.height / 2); x += this.gap) {
                points.push(this.createPoint(
                x + this.margin,
                this.margin
                ));
            }
            for (let alpha = ~~(this.height * 1.25); alpha >= 0; alpha -= this.gap) {
                const angle = (Math.PI / ~~(this.height * 1.25)) * alpha;
                points.push(this.createPoint(
                Math.sin(angle) * this.height / 2 + this.margin + this.width - this.height / 2,
                Math.cos(angle) * this.height / 2 + this.margin + this.height / 2
                ));
            }
            for (let x = this.width - ~~(this.height / 2) - 1; x >= ~~(this.height / 2); x -= this.gap) {
                points.push(this.createPoint(
                x + this.margin,
                this.margin + this.height
                ));
            }
            for (let alpha = 0; alpha <= ~~(this.height * 1.25); alpha += this.gap) {
                const angle = (Math.PI / ~~(this.height * 1.25)) * alpha;
                points.push(this.createPoint(
                (this.height - Math.sin(angle) * this.height / 2) + this.margin - this.height / 2,
                Math.cos(angle) * this.height / 2 + this.margin + this.height / 2
                ));
            }
            layer.points = points;
            }
        }
        }


        const redraw = () => {
        button.initOrigins();
        };

        const buttons = document.getElementsByClassName('liquid-button');
        for (let buttonIndex = 0; buttonIndex < buttons.length; buttonIndex++) {
        const button = buttons[buttonIndex];
        button.liquidButton = new LiquidButton(button);
        }

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

    // Play btn animation start
    $('#play-video').on('click', function(e){
        e.preventDefault();
        $('#video-overlay').addClass('open');
        $("#video-overlay").append('<iframe width="560" height="315" src="https://www.youtube.com/embed/ngElkyQ6Rhs" frameborder="0" allowfullscreen></iframe>');
    });

    $('.video-overlay, .video-overlay-close').on('click', function(e){
        e.preventDefault();
        close_video();
    });

    $(document).keyup(function(e){
        if(e.keyCode === 27) { close_video(); }
    });

    function close_video() {
        $('.video-overlay.open').removeClass('open').find('iframe').remove();
    };
    // Play btn aniimaion end

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

    // var user = "{{ !empty(Auth::user()->id) ? Auth::user()->id : ''}}";
    //     $(document).ready(function() {
    //     $('.get_start').click(function() {
    //         if (user == '') 
    //         {
    //             var msg = 'asdfasdf';
    //             Swal.fire('Error', 'You are not login. Please Login Now');
    //         }
    //         else
    //         {
    //             window.location.href = "{{url('/gp')}}";
    //         }
                    
    //     });
    // })

</script>

@endpush
@endif