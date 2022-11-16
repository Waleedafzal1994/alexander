@extends('layouts.app')
@section('content')

    <div class="main-service-detail">
        <h2>League of Legends</h2>
        <div class="gp-text mb-4">23.5k GP+</div>

        <div class="service-section">
            <div class="d-flex align-items-center justify-content-between">
                
                <div class="d-flex align-items-center">

                    <div class="service-label border-bg rounded-pill p-1px">
                        <button class="new-btn bg-lightgrey rounded-pill">
                            <img src="{{asset('imgs/icons/new-icon.svg')}}" alt="">
                            <span>New GP+</span>
                        </button>
                    </div>
                    <div class="service-label border-bg rounded-pill p-1px">
                        <button class="new-btn bg-lightgrey rounded-pill">
                            <img src="{{asset('imgs/icons/free-order-icon.svg')}}" alt="">
                            <span>Free Order GP+</span>
                        </button>
                    </div>
                    <div class="service-label border-bg rounded-pill p-1px">
                        <button class="new-btn bg-lightgrey rounded-pill">
                            <img src="{{asset('imgs/icons/top-badge-icon.svg')}}" alt="">
                            <span>Top</span>
                        </button>
                    </div>
                    <div class="service-label border-bg rounded-pill p-1px">
                        <button class="new-btn bg-lightgrey rounded-pill">
                            <img src="{{asset('imgs/icons/gold_badge-icon.svg')}}" alt="">
                            <span>Elite</span>
                        </button>
                    </div>
                    <div class="service-label border-bg rounded-pill p-1px">
                        <button class="new-btn bg-lightgrey rounded-pill menu-icon">
                            <img src="{{asset('imgs/icons/filter-icon.svg')}}" alt="">
                            <span>More Filters</span>
                        </button>
                    </div>
                </div>
                
                <div class="sort-by d-flex align-items-center">
                    <label for="">Sort By</label>
                    <div class="border-bg rounded-pill p-1px">

                        <!-- <div class="dropdown bg-lightgrey rounded-pill">
                            <button class="btn shadow-none dropdown-toggle text-white" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                General
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                            </ul>
                        </div> -->

                        <div class="dropdown bg-lightgrey rounded-pill">
                            <button class="btn shadow-none dropdown-toggle text-white" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                General
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="service-game-card-section">
                <div class="card">
                    <div class="card-body">
                        <div class="card-rating">
                            <div class="card-image">
                                <img src="{{asset('imgs/jaylon.svg')}}" alt="">
                                <div class="online"></div>
                            </div>
                            <div class="rating-num d-flex align-items-center">
                                <span>
                                    <img src="{{asset('imgs/icons/rating-star.svg')}}" alt="">
                                    5.0
                                </span>
                                <div class="tag-box">13</div>
                            </div>
                        </div>
                        <div class="card-title">
                            <h4>Jaylon</h4>
                            <img src="{{asset('imgs/services/gold_badge.svg')}}" alt="">
                        </div>

                        <div class="card-text">I love to plau League of legends and Apex Legends!</div>
                        <div class="buyBtn bg-purple-white rounded-pill">Buy 2 get 1 free</div>

                        <div class="card-footer border-0 p-0">
                            <div class="game-price">
                                <img src="{{asset('imgs/icons/currency-coin.svg')}}" alt="">
                                <span>225<small>.0</small> <span class="game-title">/Game</span></span>
                            </div>
                        </div>

                        <div class="game-playBtn">
                            <img src="{{asset('imgs/services/game-playBtn.svg')}}" alt="">
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="card-rating">
                            <div class="card-image">
                                <img src="{{asset('imgs/talan.svg')}}" alt="">
                                <div class="online"></div>
                            </div>
                            <div class="rating-num d-flex align-items-center">
                                <span>
                                    <img src="{{asset('imgs/icons/rating-star.svg')}}" alt="">
                                    5.0
                                </span>
                                <div class="tag-box">13</div>
                            </div>
                        </div>
                        <div class="card-title">
                            <h4>Talan</h4>
                            <img src="{{asset('imgs/services/gold_badge.svg')}}" alt="">
                        </div>

                        <div class="card-text">I love to plau League of legends and Apex Legends!</div>
                        <div class="buyBtn bg-purple-white rounded-pill">16% OFF</div>

                        <div class="card-footer border-0 p-0">
                            <div class="game-price">
                                <img src="{{asset('imgs/icons/currency-coin.svg')}}" alt="">
                                <span>225<small>.0</small> <span class="game-title"><del>300</del>/10Min</span></span>
                            </div>
                        </div>
                        
                        <div class="game-playBtn">
                            <img src="{{asset('imgs/services/game-playBtn.svg')}}" alt="">
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="card-rating">
                            <div class="card-image">
                                <img src="{{asset('imgs/tatiana.svg')}}" alt="">
                                <div class="online"></div>
                            </div>
                            <div class="rating-num d-flex align-items-center">
                                <span>
                                    <img src="{{asset('imgs/icons/rating-star.svg')}}" alt="">
                                    5.0
                                </span>
                                <div class="tag-box">13</div>
                            </div>
                        </div>
                        <div class="card-title">
                            <h4>Tatiana</h4>
                            <img src="{{asset('imgs/services/gold_badge.svg')}}" alt="">
                        </div>

                        <div class="card-text">I love to plau League of legends and Apex Legends!</div>
                        <div class="buyBtn bg-purple-white rounded-pill">Buy 2 get 1 free</div>

                        <div class="card-footer border-0 p-0">
                            <div class="game-price">
                                <img src="{{asset('imgs/icons/currency-coin.svg')}}" alt="">
                                <span>130<small>.0</small> <span class="game-title">/Game</span></span>
                            </div>
                        </div>
                        
                        <div class="game-playBtn">
                            <img src="{{asset('imgs/services/game-playBtn.svg')}}" alt="">
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="card-rating">
                            <div class="card-image">
                                <img src="{{asset('imgs/alena.svg')}}" alt="">
                                <div class="online"></div>
                            </div>
                            <div class="rating-num d-flex align-items-center">
                                <span>
                                    <img src="{{asset('imgs/icons/rating-star.svg')}}" alt="">
                                    5.0
                                </span>
                                <div class="tag-box">13</div>
                            </div>
                        </div>
                        <div class="card-title">
                            <h4>Alena</h4>
                            <img src="{{asset('imgs/services/gold_badge.svg')}}" alt="">
                        </div>

                        <div class="card-text">I love to plau League of legends and Apex Legends!</div>
                        <div class="buyBtn bg-purple-white rounded-pill">Buy 2 get 1 free</div>

                        <div class="card-footer border-0 p-0">
                            <div class="game-price">
                                <img src="{{asset('imgs/icons/currency-coin.svg')}}" alt="">
                                <span>276<small>.0</small> <span class="game-title"><del>300</del>/30Min</span></span>
                            </div>
                        </div>
                        
                        <div class="game-playBtn">
                            <img src="{{asset('imgs/services/game-playBtn.svg')}}" alt="">
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="card-rating">
                            <div class="card-image">
                                <img src="{{asset('imgs/kianna.svg')}}" alt="">
                                <div class="online"></div>
                            </div>
                            <div class="rating-num d-flex align-items-center">
                                <span>
                                    <img src="{{asset('imgs/icons/rating-star.svg')}}" alt="">
                                    5.0
                                </span>
                                <div class="tag-box">13</div>
                            </div>
                        </div>
                        <div class="card-title">
                            <h4>Kianna</h4>
                            <img src="{{asset('imgs/services/gold_badge.svg')}}" alt="">
                        </div>

                        <div class="card-text">I love to plau Valorant and Apex Legends!</div>
                        <div class="buyBtn bg-purple-white rounded-pill">Buy 2 get 1 free</div>

                        <div class="card-footer border-0 p-0">
                            <div class="game-price">
                                <img src="{{asset('imgs/icons/currency-coin.svg')}}" alt="">
                                <span>110<small>.0</small> <span class="game-title">/Game</span></span>
                            </div>
                        </div>
                        
                        <div class="game-playBtn">
                            <img src="{{asset('imgs/services/game-playBtn.svg')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar Section Start -->
            <div class="fixed-nav bg-lightgrey">
                <div class="logo menu-icon mx-auto">
                    <img src="{{asset('imgs/side-arrow.svg')}}" alt="">
                </div>

                <div class="card border-0 bg-transparent menu-icon">
                    <div class="online"></div>
                    <div class="card-body card-clr p-0">
                        <div class="king-circle small">
                            <div class="dark-circle bg-darkgrey">
                                <div class="golden-circle">
                                    <img src="{{asset('imgs/icons/king-head.svg')}}" class="king-head" alt="">
                                    <div class="inner-golden-circle h-100">
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
                <div class="card border-0 bg-transparent menu-icon grey_white">
                    <div class="online"></div>
                    <div class="card-body card-clr p-0">
                        <div class="card-image">
                            <div class="img-frame">
                            <img id="circle-profile-pic" src="{{asset('imgs/jacob-oliver.svg')}}" alt="" class="" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card border-0 bg-transparent menu-icon purple_white">
                    <div class="online"></div>
                    <div class="card-body card-clr p-0">
                        <div class="card-image">
                            <div class="img-frame">
                            <img id="circle-profile-pic" src="{{asset('imgs/hailey-james.svg')}}" alt="" class="" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card border-0 bg-transparent menu-icon blue_white">
                    <div class="online"></div>
                    <div class="card-body card-clr p-0">
                        <div class="card-image">
                            <div class="img-frame">
                            <img id="circle-profile-pic" src="{{asset('imgs/noah-henry.svg')}}" alt="" class="" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card border-0 bg-transparent menu-icon simple">
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
                    <div class="chat-bar h-100">
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
                            <div class="tab-content rightMesageTabContent d-none" id="v-pills-tabContent">
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
                        </div>
                    </div>
                    <div class="filter-section">
                        <div class="filters">
                            <div class="d-flex align-items-center">
                                <div class="logo menu-icon d-flex align-content-center">
                                    <img src="{{asset('imgs/side-arrow.svg')}}" alt="">
                                </div>
                                <h2 class="text-white mb-0">Filter</h2>

                                <div class="view-online-pad"></div>
                            </div>

                            <div class="view-online-gamers mt-4">
                                <h2 class="text-white m-0 mb-3">Online</h2>

                                <div class="d-flex align-items-center">
                                    <p class="text-white">View only online GamersPlays</p>
                                    <label class="switch">
                                        <input type="checkbox">
                                        <span class="slider"></span>
                                    </label>
                                </div>
                            </div>

                            <div class="language mt-5">
                                <h2 class="text-white m-0 mb-4">Language</h2>
                                <form action="" id="langForm">
                                    <div class="row">
                                        <div class="col-3 mb-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="lang1">
                                                <label class="form-check-label" for="lang1">English</label>
                                            </div>
                                        </div>
                                        <div class="col-3 mb-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="lang2">
                                                <label class="form-check-label" for="lang2">Duetsch</label>
                                            </div>
                                        </div>
                                        <div class="col-3 mb-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="lang3">
                                                <label class="form-check-label" for="lang3">Netherlands</label>
                                            </div>
                                        </div>
                                        <div class="col-3 mb-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="lang4">
                                                <label class="form-check-label" for="lang4">Français</label>
                                            </div>
                                        </div>

                                        <div class="col-3 mb-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="lang5">
                                                <label class="form-check-label" for="lang5">Español</label>
                                            </div>
                                        </div>
                                        <div class="col-3 mb-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="lang6">
                                                <label class="form-check-label" for="lang6">Español (AR)</label>
                                            </div>
                                        </div>
                                        <div class="col-3 mb-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="lang7">
                                                <label class="form-check-label" for="lang7">Catalang</label>
                                            </div>
                                        </div>
                                        <div class="col-3 mb-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="lang8">
                                                <label class="form-check-label" for="lang8">Italiana</label>
                                            </div>
                                        </div>

                                        <div class="col-3 mb-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="lang9">
                                                <label class="form-check-label" for="lang9">Português (PT)</label>
                                            </div>
                                        </div>
                                        <div class="col-3 mb-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="lang10">
                                                <label class="form-check-label" for="lang10">Português (BR)</label>
                                            </div>
                                        </div>
                                        <div class="col-3 mb-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="lang11">
                                                <label class="form-check-label" for="lang11">Norsk</label>
                                            </div>
                                        </div>
                                        <div class="col-3 mb-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="lang12">
                                                <label class="form-check-label" for="lang12">Suomi</label>
                                            </div>
                                        </div>

                                        <div class="col-3 mb-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="lang13">
                                                <label class="form-check-label" for="lang13">Svenska</label>
                                            </div>
                                        </div>
                                        <div class="col-3 mb-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="lang14">
                                                <label class="form-check-label" for="lang14">Dansk</label>
                                            </div>
                                        </div>
                                        <div class="col-3 mb-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="lang15">
                                                <label class="form-check-label" for="lang15">Čeština</label>
                                            </div>
                                        </div>
                                        <div class="col-3 mb-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="lang16">
                                                <label class="form-check-label" for="lang16">Magyar</label>
                                            </div>
                                        </div>

                                        <div class="col-3 mb-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="lang17">
                                                <label class="form-check-label" for="lang17">Română</label>
                                            </div>
                                        </div>
                                        <div class="col-3 mb-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="lang18">
                                                <label class="form-check-label" for="lang18">日本語</label>
                                            </div>
                                        </div>
                                        <div class="col-3 mb-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="lang19">
                                                <label class="form-check-label" for="lang19">简体中文</label>
                                            </div>
                                        </div>
                                        <div class="col-3 mb-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="lang20">
                                                <label class="form-check-label" for="lang20">繁體中文</label>
                                            </div>
                                        </div>

                                        <div class="col-3 mb-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="lang21">
                                                <label class="form-check-label" for="lang21">Polski</label>
                                            </div>
                                        </div>
                                        <div class="col-3 mb-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="lang22">
                                                <label class="form-check-label" for="lang22">Ελληνικά</label>
                                            </div>
                                        </div>
                                        <div class="col-3 mb-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="lang23">
                                                <label class="form-check-label" for="lang23">Русский</label>
                                            </div>
                                        </div>
                                        <div class="col-3 mb-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="lang24">
                                                <label class="form-check-label" for="lang24">Türkçe</label>
                                            </div>
                                        </div>

                                        <div class="col-3 mb-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="lang25">
                                                <label class="form-check-label" for="lang25">Български</label>
                                            </div>
                                        </div>
                                        <div class="col-3 mb-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="lang26">
                                                <label class="form-check-label" for="lang26">العربية</label>
                                            </div>
                                        </div>
                                        <div class="col-3 mb-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="lang27">
                                                <label class="form-check-label" for="lang27">한국어</label>
                                            </div>
                                        </div>
                                        <div class="col-3 mb-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="lang28">
                                                <label class="form-check-label" for="lang28">עברית</label>
                                            </div>
                                        </div>

                                        <div class="col-3 mb-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="lang29">
                                                <label class="form-check-label" for="lang29">Latviski</label>
                                            </div>
                                        </div>
                                        <div class="col-3 mb-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="lang30">
                                                <label class="form-check-label" for="lang30">Українська</label>
                                            </div>
                                        </div>
                                        <div class="col-3 mb-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="lang31">
                                                <label class="form-check-label" for="lang31">Bahasa Indonesia</label>
                                            </div>
                                        </div>
                                        <div class="col-3 mb-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="lang32">
                                                <label class="form-check-label" for="lang32">Bahasa Malaysia</label>
                                            </div>
                                        </div>

                                        <div class="col-3 mb-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="lang33">
                                                <label class="form-check-label" for="lang33">ภาษาไทย</label>
                                            </div>
                                        </div>
                                        <div class="col-3 mb-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="lang34">
                                                <label class="form-check-label" for="lang34">Eesti</label>
                                            </div>
                                        </div>
                                        <div class="col-3 mb-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="lang35">
                                                <label class="form-check-label" for="lang35">Hrvatski</label>
                                            </div>
                                        </div>
                                        <div class="col-3 mb-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="lang36">
                                                <label class="form-check-label" for="lang36">Lietuvių</label>
                                            </div>
                                        </div>

                                        <div class="col-3 mb-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="lang37">
                                                <label class="form-check-label" for="lang37">Slovenčina</label>
                                            </div>
                                        </div>
                                        <div class="col-3 mb-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="lang38">
                                                <label class="form-check-label" for="lang38">Srpski</label>
                                            </div>
                                        </div>
                                        <div class="col-3 mb-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="lang39">
                                                <label class="form-check-label" for="lang39">Slovenščina</label>
                                            </div>
                                        </div>
                                        <div class="col-3 mb-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="lang40">
                                                <label class="form-check-label" for="lang40">Tiếng Việt</label>
                                            </div>
                                        </div>
                                        
                                        <div class="col-3 mb-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="lang41">
                                                <label class="form-check-label" for="lang41">Filipino</label>
                                            </div>
                                        </div>
                                        <div class="col-3 mb-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="lang42">
                                                <label class="form-check-label" for="lang42">Íslenska</label>
                                            </div>
                                        </div>
                                        <div class="col-3 mb-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="lang43">
                                                <label class="form-check-label" for="lang43">Georgian</label>
                                            </div>
                                        </div>
                                        <div class="col-3 mb-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="lang44">
                                                <label class="form-check-label" for="lang44">Macedonian</label>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <button id="expandBtn" class="new-btn p-0 showLang bg-transparent border-0 shadow-0 purple-white font-16 font-weight-bold my-4">Show more</button>
                            </div>

                            <div class="price pricing">
                                <h2>Price</h2>

                                <button class="new-btn">
                                    <img src="{{asset('imgs/icons/thunder.png')}}" width="12" alt="">
                                    <span>1.00 - 5.00</span>
                                </button>
                                <button class="new-btn">
                                    <img src="{{asset('imgs/icons/thunder.png')}}" width="12" alt="">
                                    <span>1.00 - 20.00</span>
                                </button>
                                <button class="new-btn">
                                    <img src="{{asset('imgs/icons/thunder.png')}}" width="12" alt="">
                                    <span>3.00 - 15.00</span>
                                </button>
                                <button class="new-btn">
                                    <img src="{{asset('imgs/icons/thunder.png')}}" width="12" alt="">
                                    <span>1.00 - 10.00</span>
                                </button>
                                <button class="new-btn">
                                    <img src="{{asset('imgs/icons/thunder.png')}}" width="12" alt="">
                                    <span>1.00 - 20+</span>
                                </button>
                            </div>

                            <div class="promotion price">
                                <h2>Promotion</h2>

                                <button class="new-btn">
                                    <img src="{{asset('imgs/icons/thunder.png')}}" width="12" alt="">
                                    <span>Discount</span>
                                </button>
                                <button class="new-btn">
                                    <img src="{{asset('imgs/icons/thunder.png')}}" width="12" alt="">
                                    <span>1st Order Free</span>
                                </button>
                                <button class="new-btn">
                                    <img src="{{asset('imgs/icons/thunder.png')}}" width="12" alt="">
                                    <span>Buy X Get Y</span>
                                </button>
                            </div>

                            <div class="gender price">
                                <h2>Gender</h2>

                                <button class="new-btn">
                                    <img src="{{asset('imgs/icons/thunder.png')}}" width="12" alt="">
                                    <span>Male</span>
                                </button>
                                <button class="new-btn">
                                    <img src="{{asset('imgs/icons/thunder.png')}}" width="12" alt="">
                                    <span>Female</span>
                                </button>
                                <button class="new-btn">
                                    <img src="{{asset('imgs/icons/thunder.png')}}" width="12" alt="">
                                    <span>Nonconforming</span>
                                </button>
                            </div>

                            <div class="age price">
                                <h2>Age</h2>

                                <button class="new-btn">
                                    <img src="{{asset('imgs/icons/thunder.png')}}" width="12" alt="">
                                    <span>18 - 25</span>
                                </button>
                                <button class="new-btn">
                                    <img src="{{asset('imgs/icons/thunder.png')}}" width="12" alt="">
                                    <span>26 - 30</span>
                                </button>
                                <button class="new-btn">
                                    <img src="{{asset('imgs/icons/thunder.png')}}" width="12" alt="">
                                    <span>30+</span>
                                </button>
                            </div>

                            <div class="gamersplays">
                                <h2 class="m-0 mb-4">Role</h2>

                                <form action="">
                                    <div class="mini-heading text-dark">GamersPlay</div>
                                    <div class="row">
                                        <div class="col-3 mb-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="gamersPlay1">
                                                <label class="form-check-label" for="gamersPlay1">GamersPlay 1</label>
                                            </div>
                                        </div>
                                        <div class="col-3 mb-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="gamersPlay2">
                                                <label class="form-check-label" for="gamersPlay2">GamersPlay 1</label>
                                            </div>
                                        </div>
                                        <div class="col-3 mb-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="gamersPlay3">
                                                <label class="form-check-label" for="gamersPlay3">GamersPlay 1</label>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="mini-heading text-dark">Quality GamersPlay</div>
                                    <div class="row">
                                        <div class="col-3 mb-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="qualityGanmersPlay1">
                                                <label class="form-check-label" for="qualityGanmersPlay1">GamersPlay Star 1</label>
                                            </div>
                                        </div>
                                        <div class="col-3 mb-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="qualityGanmersPlay2">
                                                <label class="form-check-label" for="qualityGanmersPlay2">GamersPlay Star 2</label>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="filter-footer">
                            <button class="new-btn clearAll bg-transparent"> Clear all</button>
                            <button class="new-btn submit bg-purple-white text-white"> Submit</button>
                        </div>
                    </div>
                </div>
            </nav>
            
            <div class="overlay"></div>
        <!-- Sidebar Section End -->
    </div>

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

        $(document).ready(function () {
 
            // for age
            $('.pricing .new-btn').click(function (e) {
                $('.pricing .new-btn')
                    .removeClass('active'); 
                $(this).addClass('active');
            });

            // for gender
            $('.gender .new-btn').click(function (e) {
                $('.gender .new-btn')
                    .removeClass('active'); 
                $(this).addClass('active');
            });

            // for age
            $('.age .new-btn').click(function (e) {
                $('.age .new-btn')
                    .removeClass('active'); 
                $(this).addClass('active');
            });


            // $('.showLang').click(function() {
            //     $('.language form').toggleClass('full-height');
            // });

            $('button').click(function(){
                if($('#langForm').hasClass("readmore")) {
                    $('#expandBtn').html('Show more');
                    $('#langForm').removeClass("readmore");
                } else {
                    $('#expandBtn').html('Show less');
                    $('#langForm').addClass("readmore");
                }
            });
        });
    </script>

@endsection