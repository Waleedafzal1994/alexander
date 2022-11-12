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
                    <div class="filters h-100">
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

                        <div class="language text-white my-5">
                            <h2 class="text-white m-0 mb-4">Language</h2>
                            <form action="">
                                <div class="row">
                                    <div class="col-3 mb-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="engLang">
                                            <label class="form-check-label" for="engLang">English</label>
                                        </div>
                                    </div>
                                    <div class="col-3 mb-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="dueLang">
                                            <label class="form-check-label" for="dueLang">Duetsch</label>
                                        </div>
                                    </div>
                                    <div class="col-3 mb-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="netLang">
                                            <label class="form-check-label" for="netLang">Netherlands</label>
                                        </div>
                                    </div>
                                    <div class="col-3 mb-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="franceLang">
                                            <label class="form-check-label" for="franceLang">Français</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-3 mb-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="espLang">
                                            <label class="form-check-label" for="espLang">Español</label>
                                        </div>
                                    </div>
                                    <div class="col-3 mb-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="espArLang">
                                            <label class="form-check-label" for="espArLang">Español (AR)</label>
                                        </div>
                                    </div>
                                    <div class="col-3 mb-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="catLang">
                                            <label class="form-check-label" for="catLang">Catalang</label>
                                        </div>
                                    </div>
                                    <div class="col-3 mb-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="itlLang">
                                            <label class="form-check-label" for="itlLang">Italiana</label>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="price">

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
    </script>

@endsection