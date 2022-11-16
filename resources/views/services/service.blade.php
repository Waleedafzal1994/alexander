@extends('layouts.app')

@section('content')

    <link rel="stylesheet" href="https://unpkg.com/simplebar@latest/dist/simplebar.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"/>


    <!-- This is a dynamic code -->
    <div class="container-fluid d-none">
        <div class="menu-navbar" style="position:fixed !important;" data-simplebar>
            <div class="showMenuDiv">
                <img src="/imgs/sidebar.png" style="height:32px; float:right;" class="showMenu">
                <br>
                <br>
            </div>
            @if (isset($popular) && count($popular) > 0)
                <div class="menu" data-id="-1" style="color:yellow;" id="popularMenu">Popular</div>
                <div id="menu_categories_-1" class="menu_category">
                    <ul class="menu_ul">
                        @foreach ($popular as $category)
                            <li onclick="updateCategoryID({{ $category->id }})">
                                @if ($category->image_1 != null)
                                    <div class="categories_box_holder"
                                        style="background-image:linear-gradient(rgba(0,0,0,0.3),rgba(0,0,0,0.3)),url('{{ $category->image_1 }}');">
                                    @else
                                        <div class="categories_box_holder" style="background:var(--color-secondary);">
                                @endif
                                <p>{{ $category->name }}</p>
                </div>
                </li>
            @endforeach
            </ul>
        </div>
        @endif

        @foreach ($menus as $menu)
            <div class="menu" data-id="{{ $menu->id }}">{{ $menu->name }}</div>

            <div id="menu_categories_{{ $menu->id }}" class="menu_category">
                <ul class="menu_ul">
                    @foreach ($menu->categories as $category)
                        <li class="menu_category_{{ $category->id }}" onclick="updateCategoryID({{ $category->id }})">
                            @if ($category->image_1 != null)
                                <div class="categories_box_holder"
                                    style="background-image:linear-gradient(rgba(0,0,0,0.3),rgba(0,0,0,0.3)),url('{{ $category->image_1 }}');">
                                @else
                                    <div class="categories_box_holder" style="background:var(--color-secondary);">
                            @endif
                                        <p>{{ $category->name }}</p>
                                    </div>
                        </li>
                    @endforeach
                    </ul>
                </div>
                @endforeach
            <br>
            <br>

            </div>

        <div style="margin-left:260px;" id="services_container_responsive">

            <div class="header-page rounded">
                <div>
                    <img src="/imgs/icons/services.png" alt="" srcset="" style="height:64px;">
                </div>
                <div>
                    <h1>Services <span id="category_name"></span> <img src="/imgs/sidebar.png"
                            style="height:32px; float:right; position:relative;top:2px;" class="showMenu"></h1>

                    <p>Here you can browse GamersPlay Sellers and find a perfect match!</p>
                </div>
            </div>

            <div id="filters"
                style="display:none; align-items:center; justify-content:flex-end; background:white; border-radius:20px; padding:20px 15px; box-shadows: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;">
                <div class="services_filterable">
                    <label for="">Language</label>
                    <select name="" id="language" class="select">
                        <option value="">Select</option>
                        <option value="English">English</option>
                        <option value="German">German</option>
                        <option value="French">French</option>
                        <option value="Russian">Russian</option>
                        <option value="Chinese">Chinese</option>
                        <option value="Japanese">Japanese</option>
                        <option value="Korean">Korean</option>
                    </select>
                </div>
                <div class="services_filterable">
                    <label for="">Gender</label>
                    <select name="" id="gender" class="select">
                        <option value="">Select</option>
                        <option value="0">Male</option>
                        <option value="1">Female</option>
                        <option value="2">Non-binary</option>
                    </select>
                </div>
                <div class="services_filterable">
                    <label for="">Age</label>
                    <br>
                    <input type="number" class="input" id="age" style="width:80px;" min="16">
                </div>
                <div class="services_filterable">
                    <label for="">Rating (min)</label>
                    <br>
                    <input type="number" class="input" id="minRating" min="1" max="5" style="width:80px;" step="0.1"
                        min="16">
                </div>
                <div class="services_filterable">
                    <label for="">Price</label>
                    <div style="display:flex; justify-content:space-between;">
                        <input type="number" class="input" placeholder="Min" id="priceMin" min="0.01" step="0.01"
                            style="width:80px; margin-right:5px;">
                        <input type="number" class="input" placeholder="Max" id="priceMax" min="0.01" step="0.01"
                            style="width:80px;">
                    </div>

                </div>
                <div class="services_filterable">
                    <p>&nbsp;</p>
                    <a href="" class="new-btn font-weight-bold button-anim btn-solid text-white px-4 py-2" id="filterBtn" style="height:35px; position:relative; top:5px;">Apply</a>
                </div>

            </div>
            <div id="services"></div>
            <div id="getStarted" style="width:100%;">
                <div style="display:flex; justify-content:center; align-items:center; flex-direction:column;">
                    {{-- <lottie-player src="https://assets9.lottiefiles.com/private_files/lf30_j0plevar.json"  background="transparent"  speed="1"  style="max-width:350px; height:350px !important;" autoplay></lottie-player> --}}
                    <img src="/imgs/gamersplay-gp-services.png"
                        style="height:400px !important; max-width:100%; object-fit:contain;" alt="">
                    <h4>Please choose a category in the sidebar menu. (Games, Lifestyle, etc)</h4>
                </div>

            </div>
            <div id="loader" style="display:none; flex-direction:column; align-items:center;justify-content:center;">
                <h4>Loading...</h4>
                <lottie-player src="https://assets1.lottiefiles.com/packages/lf20_y4piddma.json" background="transparent"
                    speed="1" style="width: 300px; height: 300px;" loop autoplay></lottie-player>
            </div>

            <div id="no_results" style="display:none;">
                <img src="{{ asset('imgs/no-results.png') }}" alt="" srcset="" style="height:180px;">
                <br>
                <br>
                <h5>There's no services found - please check back later or revise your search.</h5>
            </div>
        </div>
    </div>


    <!-- This is a Static Code -->
    <div class="main-services mt-4">
        <div class="recent-events">
            <h2 class="text-white">Recent Events</h2>
            <div id="owlCarouselEvents" class="owl-carousel owl-theme">
                <div class="item">
                    <div class="card border-0 p-0">
                        <div class="card-body">
                            <div class="card-title">INFLUENCER GROWING PROJECT</div>
                            <div class="card-text">
                                Natoque imperdiet placerat non pulvinar nam consequat ut id pellentesque.
                            </div>
                            <div class="card-btn">
                                <div class="bg-blur"></div>
                                <button class="new-btn learn-more">Learn more</button>
                            </div>
                            <div class="card-footer">1/8</div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card border-0 p-0">
                        <div class="card-body">
                            <div class="card-title">LEAGUE S12 Worlds Picks & Guessing</div>
                            <div class="card-text">
                                Natoque imperdiet placerat non pulvinar nam consequat ut id pellentesque.
                            </div>
                            <div class="card-btn">
                                <div class="bg-blur"></div>
                                <button class="new-btn check-now">Check now</button>
                            </div>
                            <div class="card-footer">1/8</div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card border-0 p-0">
                        <div class="card-body">
                            <div class="card-title">Halloween Discord Gaming</div>
                            <div class="card-text">
                                Natoque imperdiet placerat non pulvinar nam consequat ut id pellentesque.
                            </div>
                            <div class="card-btn">
                                <div class="bg-blur"></div>
                                <button class="new-btn check-now">Check now</button>
                            </div>
                            <div class="card-footer">1/8</div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card border-0 p-0">
                        <div class="card-body">
                            <div class="card-title">PLAY WITH THE LEGENDS</div>
                            <div class="card-text">
                                Natoque imperdiet placerat non pulvinar nam consequat ut id pellentesque.
                            </div>
                            <div class="card-btn">
                                <div class="bg-blur"></div>
                                <button class="new-btn check-now">Check now</button>
                            </div>
                            <div class="card-footer">1/8</div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card border-0 p-0">
                        <div class="card-body">
                            <div class="card-title">INFLUENCER GROWING PROJECT</div>
                            <div class="card-text">
                                Natoque imperdiet placerat non pulvinar nam consequat ut id pellentesque.
                            </div>
                            <div class="card-btn">
                                <div class="bg-blur"></div>
                                <button class="new-btn learn-more">Learn more</button>
                            </div>
                            <div class="card-footer">1/8</div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card border-0 p-0">
                        <div class="card-body">
                            <div class="card-title">LEAGUE S12 Worlds Picks & Guessing</div>
                            <div class="card-text">
                                Natoque imperdiet placerat non pulvinar nam consequat ut id pellentesque.
                            </div>
                            <div class="card-btn">
                                <div class="bg-blur"></div>
                                <button class="new-btn check-now">Check now</button>
                            </div>
                            <div class="card-footer">1/8</div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card border-0 p-0">
                        <div class="card-body">
                            <div class="card-title">Halloween Discord Gaming</div>
                            <div class="card-text">
                                Natoque imperdiet placerat non pulvinar nam consequat ut id pellentesque.
                            </div>
                            <div class="card-btn">
                                <div class="bg-blur"></div>
                                <button class="new-btn check-now">Check now</button>
                            </div>
                            <div class="card-footer">1/8</div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card border-0 p-0">
                        <div class="card-body">
                            <div class="card-title">PLAY WITH THE LEGENDS</div>
                            <div class="card-text">
                                Natoque imperdiet placerat non pulvinar nam consequat ut id pellentesque.
                            </div>
                            <div class="card-btn">
                                <div class="bg-blur"></div>
                                <button class="new-btn check-now">Check now</button>
                            </div>
                            <div class="card-footer">1/8</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="recommended">
            <h2 class="text-white">Recommended</h2>
            <div class="position-relative game-carousel">
                <div id="owlCarouselGames" class="owl-carousel owl-theme">
                    <div class="item">
                        <a href="/services/info">
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
                    <div class="item">
                        <a href="">
                            <img src="{{asset('imgs/game-2.svg')}}" alt="">
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
                </div>
                <div class="browse-more-games menu-icon">
                    <!-- <img src="{{asset('imgs/more-services-img.svg')}}" alt=""> -->
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

                    <div class="game-label border-bg br-8 p-1px">
                        <h5 class="bg-darkgrey br-8 text-white">League of Legends</h5>
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

                    <div class="game-label border-bg br-8 p-1px">
                        <h5 class="bg-darkgrey br-8 text-white">E-chat</h5>
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

                    <div class="game-label border-bg br-8 p-1px">
                        <h5 class="bg-darkgrey br-8 text-white">League of Legends</h5>
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

                    <div class="game-label border-bg br-8 p-1px">
                        <h5 class="bg-darkgrey br-8 text-white">Discover Server</h5>
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

                    <div class="game-label border-bg br-8 p-1px">
                        <h5 class="bg-darkgrey br-8 text-white">Valorant</h5>
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
                <div class="d-flex h-100">
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
                    </div>
                </div>
            </div>
        </nav>
        
        <div class="overlay"></div>
        <!-- Sidebar Section End -->

    </div>

@endsection


@push('scripts')
    <script src="https://unpkg.com/simplebar@latest/dist/simplebar.min.js"></script>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

    <!-- Owl Carousel Slider Start -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

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

        </script>
    <!-- Owl Carousel Slider End -->

    <script>
        @if (Auth::check() == false)
            $(document).ready(function () {
            $('#registerModalBtn').trigger('click');
            });
        @endif
    </script>
    <script>
        var menuCategories = @json($categories);
        $(document).ready(function() {
            $('#popularMenu').trigger('click');
        });
    </script>
    <script src="{{ asset('js/services.js?v=') . time() }}"></script>

    @if (isset($_GET['menu']) && isset($_GET['category']))
        <script>
            $(document).ready(function() {
                $('.menu[data-id="{{ $_GET['menu'] }}"]').trigger('click');
                $('.menu_category_{{ $_GET['category'] }}').trigger('click');
            });
        </script>
    @endif
@endpush
