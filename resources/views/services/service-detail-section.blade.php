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
    </div>

@endsection