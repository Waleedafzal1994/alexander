@extends('layouts.app')
@section('content')

    <div class="post-detail mt-5">
        <a href="/news" class="mb-4 px-0 back-btn new-btn bg-transparent border-0 shadow-0 text-white">
            <i class="fa fa-chevron-left"></i>
            Back
        </a>
        <div class="row">
            <div class="col-md-6">
                <div class="post-left-section">
                    <div class="bg-lightgrey br-16 mb-32">
                        <div class="game-post d-flex align-items-center justify-content-between">
                            <div class="d-flex grey_white">
                                <div class="card border-0 bg-transparent mr-3">
                                    <div class="card-body card-clr p-0">
                                        <div class="card-image mr-0">
                                            <div class="img-frame">
                                                <img id="circle-profile-pic" src="{{asset('imgs/aunty.jpg')}}" class="diamond-img rounded-circle" alt="" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="d-flex flex-column justify-content-center">
                                        <span class="mr-3 font-weight-bold review-profile-heading">
                                            <a type="button">GamersPlayAlex</a>
                                        </span>
                                        <span class="date-post">August 26, 2022</span>
                                    </div>
                                    <div class="title-badge">
                                        <img src="{{asset('imgs/icons/blue_badge.svg')}}" alt="">
                                    </div>
                                </div>
                            </div>
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

                        <div class="description">
                            <p>Hello! What You’re Looking For?</p>
                        </div>
                        <div class="desc-detail">
                            Hi, I, Paola and I love to plau League of legends and Apex Legends! Feel free to dm me so we can play together! Don’t forget to follow me on social media for update.
                        </div>

                        <div class="carousel_section">
                            <div id="carousel-post" class="lightbox mb-5 carousel slide" data-ride="carousel" data-interval="false">
                                <ol class="carousel-indicators">
                                    <li data-target="#carousel-post" data-slide-to="0" class="active"></li>
                                    <li data-target="#carousel-post" data-slide-to="1" class=""></li>
                                    <li data-target="#carousel-post" data-slide-to="2" class=""></li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="{{asset('imgs/carousel-imgs/apex-lfg.jpg')}}" class="d-block w-100" alt="">
                                    </div>
                                    <div class="carousel-item ">
                                        <img src="{{asset('imgs/carousel-imgs/apex-lfg.jpg')}}" class="d-block w-100" alt="">
                                    </div>
                                    <div class="carousel-item ">
                                        <img src="{{asset('imgs/carousel-imgs/apex-lfg.jpg')}}" class="d-block w-100" alt="">
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#carousel-post" role="button" data-slide="prev">
                                    <i class="fa-solid fa-location-arrow prev-icon"></i>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carousel-post" role="button" data-slide="next">
                                    <i class="fa-solid fa-location-arrow next-icon"></i>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                        <div class="we-video-info highlight-section float-none d-flex align-items-center justify-content-between">
                            <div class="likes d-flex align-items-center">
                                <img src="{{asset('imgs/icons/red-heart.svg')}}" alt="">
                                <span class="ml-2">23</span>
                            </div>
                            <div class="hashtag">
                                <div class="">#Newcomer Selfies</div>
                            </div>
                        </div>
                    </div>

                    <div class="comment-box-section bg-lightgrey br-16 p-3">
                        <div class="d-flex align-items-center">
                            <h2>Comments</h2>
                            <div class="tag-box">5</div>
                            <div class="middle-line w-100"></div>
                        </div>
                        
                        <div class="post-comment bg-darkgrey br-16 p-3 mb-4">
                            <div class="d-flex">
                                <div class="card bg-transparent p-0 border-0">
                                    <div class="card-body card-clr p-0">
                                        <div class="card-image">
                                            <div class="img-frame">
                                                <img src="{{asset('imgs/aunty.jpg')}}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="post-comt-box">
                                    <form method="POST" action="#" id="comment_7" data-post-id="7">
                                        <div class="position-relative">
                                            <input name="commentable_id" type="hidden" value="7" id="commentable_id_7">
                                            <div id="post_id" style="display: none;">7</div>
                                            <div class="textArea-body">
                                                <textarea class="textarea content-count" maxlength="500" name="body" rows="10" id="commentable_content_7" data-post-id="7" placeholder="" onkeyup="wordCount(this)" oninput="auto_grow(this)"></textarea>
                                            </div>
                                            
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mt-3">
                                            <div class="d-flex align-items-center">
                                                <button id="emojishow">
                                                    <i class="fa-solid fa-face-smile"></i>
                                                </button>
                                                <div class="upload-post-img ml-3 position-relative">
                                                    <input type="file">
                                                    <img src="http://127.0.0.1:8000/imgs/icons/camera-icon.svg" alt="">
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <div class="text-counter mr-12">
                                                    <span id="wordsCounts" class="counter">0</span>
                                                    <span class="fix-count">/500</span>
                                                </div>
                                                <input type="submit" class="nav-link btn-post post-btn-border btn-solid btn-actives save_btn_hover" name="" value="Post">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="main-card">
                            <div class="review-cards bg-transparent">
                                <div class="card bg-darkgrey br-12 border-0 p-10">
                                    <div class="card-body card-clr p-0">
                                        <div class="card-image">
                                            <div class="img-frame">
                                                <img src="{{asset('imgs/aunty.jpg')}}" alt="">
                                            </div>
                                        </div>
                                        <div>
                                            <a class="card-title" href="/user-profile/3" title="">diamond</a>
                                            <div class="card-text">CEO <sup>.</sup> GamersPlay+</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-end mt-12">
                                    <div class="gamerHash mr-3">13 October 2022</div>
                                </div>
                                <div class="review-description ml-2 pl-1">Comment Description will be display here...</div>
                                <div class="reply-delt ml-2 pl-1 mb-4 d-flex align-items-center">
                                    <div class="comment-like">
                                        <img src="{{asset('imgs/icons/red-heart.svg')}}" alt="">
                                        <span>2</span>
                                    </div>
                                    <div class="comment-reply">
                                        <img src="{{asset('imgs/icons/reply-arrow.svg')}}" alt="">
                                        <span>Reply</span>
                                    </div>
                                    <div class="comment-delt">
                                        <img src="{{asset('imgs/icons/delete-basket.svg')}}" alt="">
                                        <span>Delete</span>
                                    </div>
                                </div>
                            </div>
                            <div class="review-cards bg-transparent">
                                <div class="card bg-darkgrey br-12 border-0 p-10 blue_white">
                                    <div class="card-body card-clr p-0">
                                        <div class="card-image">
                                            <div class="img-frame">
                                                <img src="{{asset('imgs/aunty.jpg')}}" alt="">
                                            </div>
                                        </div>
                                        <div>
                                            <a class="card-title" href="/user-profile/3" title="">diamond</a>
                                            <div class="card-text">CEO <sup>.</sup> GamersPlay+</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-end mt-12">
                                    <div class="gamerHash mr-3">13 October 2022</div>
                                </div>
                                <div class="review-description ml-2 pl-1">Comment Description will be display here...</div>
                                <div class="reply-delt ml-2 pl-1 mb-4 d-flex align-items-center">
                                    <div class="comment-like">
                                        <img src="{{asset('imgs/icons/red-heart.svg')}}" alt="">
                                        <span>2</span>
                                    </div>
                                    <div class="comment-reply">
                                        <img src="{{asset('imgs/icons/reply-arrow.svg')}}" alt="">
                                        <span>Reply</span>
                                    </div>
                                    <div class="comment-delt">
                                        <img src="{{asset('imgs/icons/delete-basket.svg')}}" alt="">
                                        <span>Delete</span>
                                    </div>
                                </div>
                            </div>
                            <div class="review-cards bg-transparent">
                                <div class="card bg-darkgrey br-12 border-0 p-10 purple_white">
                                    <div class="card-body card-clr p-0">
                                        <div class="card-image">
                                            <div class="img-frame">
                                                <img src="{{asset('imgs/aunty.jpg')}}" alt="">
                                            </div>
                                        </div>
                                        <div>
                                            <a class="card-title" href="/user-profile/3" title="">diamond</a>
                                            <div class="card-text">CEO <sup>.</sup> GamersPlay+</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-end mt-12">
                                    <div class="gamerHash mr-3">13 October 2022</div>
                                </div>
                                <div class="review-description ml-2 pl-1">Comment Description will be display here...</div>
                                <div class="reply-delt ml-2 pl-1 mb-4 d-flex align-items-center">
                                    <div class="comment-like">
                                        <img src="{{asset('imgs/icons/red-heart.svg')}}" alt="">
                                        <span>2</span>
                                    </div>
                                    <div class="comment-reply">
                                        <img src="{{asset('imgs/icons/reply-arrow.svg')}}" alt="">
                                        <span>Reply</span>
                                    </div>
                                    <div class="comment-delt">
                                        <img src="{{asset('imgs/icons/delete-basket.svg')}}" alt="">
                                        <span>Delete</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row">
                    <div class="col-12">
                        <div class="right-detail bg-lightgrey br-16 p-3 border-0">
                            <div class=" bg-darkgrey br-16">
                                <div class="main-card">
                                    <div class="card border-0 bg-darkgrey grey_white br-12">
                                        <div class="card-body card-clr p-0">
                                            <div class="card-image hw-61px">
                                                <div class="img-frame hw-57px">
                                                    <img id="circle-profile-pic" src="{{asset('imgs/jacob-oliver.svg')}}" alt="" class="hw-52px" />
                                                </div>
                                            </div>
                                            <div class="">
                                                <div class="card-title">Jacob Oliver</div>
                                                <div class="card-text">Elite <sup>.</sup> GamersPlay+</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="lang-years my-1 d-flex align-items-center justify-content-center">
                                    <div class="profile-section-two gender pl-0">
                                        <div class="review-body text-center">6</div>
                                        <p>Topics</p>
                                    </div>
                                    
                                    <div class="profile-section-two">
                                        <div class="review-body text-center">13</div>
                                        <p>Comments</p>
                                    </div>

                                    <div class="profile-section-two numbers pr-0 mr-0">
                                        <div class="review-body text-center">123</div>
                                        <p>Likes</p>
                                    </div>
                                </div>

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

                                <div class="img-two-btns-row">
                                    <div class="">
                                        <a class="btn-follower d-flex align-items-center justify-content-center" id="follow-checkss" type="button">Follow</a>
                                        <input type="hidden" id="check-follow-toggless" value= "">
                                    </div>
                                    <div class="">
                                        <a class="btn-cust btn-width" type="button">Chat</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="post-right-section">
                            <div class="mt-4 their-services bg-lightgrey br-16 p-3">
                                <div class="border-bg bg-darkgrey br-16">
                                    <div class="bg-darkgrey br-16">
                                        <h4 class="text-white mb-3">their Services</h4>

                                        <div class="scroll-card">
                                            <div class="card border-0 bg-transparent p-0">
                                                <div class="card-body p-0">
                                                    <div class="d-flex align-items-center">
                                                        <div class="card-image">
                                                            <img src="{{asset('imgs/icons/mini-game-img.svg')}}" alt="">
                                                        </div>
                                                        <div class="card-text">
                                                            <div class="card-title">League of Legends</div>
                                                            <div class="card-price">
                                                                <img src="{{asset('imgs/icons/currency-coin.svg')}}" alt="">
                                                                <span>4.00/Game</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-detail">
                                                        <div class="d-flex align-items-center justify-content-end">
                                                            <div class="card-rating text-white">
                                                                <img src="{{asset('imgs/icons/rating-star.svg')}}" alt="">
                                                                <span class="ml-1">5.0</span>
                                                            </div>
                                                            <div class="tag-box">10</div>
                                                        </div>
                                                        <div class="card-btn">
                                                            <button class="new-btn">Buy 3 get 1 free</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card border-0 bg-transparent p-0">
                                                <div class="card-body p-0">
                                                    <div class="d-flex align-items-center">
                                                        <div class="card-image">
                                                            <img src="{{asset('imgs/icons/mini-game-img.svg')}}" alt="">
                                                        </div>
                                                        <div class="card-text">
                                                            <div class="card-title">League of Legends</div>
                                                            <div class="card-price">
                                                                <img src="{{asset('imgs/icons/currency-coin.svg')}}" alt="">
                                                                <span>4.00/Game</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-detail">
                                                        <div class="d-flex align-items-center justify-content-end">
                                                            <div class="card-rating text-white">
                                                                <img src="{{asset('imgs/icons/rating-star.svg')}}" alt="">
                                                                <span class="ml-1">5.0</span>
                                                            </div>
                                                            <div class="tag-box">10</div>
                                                        </div>
                                                        <div class="card-btn">
                                                            <button class="new-btn">Buy 3 get 1 free</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card border-0 bg-transparent p-0">
                                                <div class="card-body p-0">
                                                    <div class="d-flex align-items-center">
                                                        <div class="card-image">
                                                            <img src="{{asset('imgs/icons/mini-game-img.svg')}}" alt="">
                                                        </div>
                                                        <div class="card-text">
                                                            <div class="card-title">League of Legends</div>
                                                            <div class="card-price">
                                                                <img src="{{asset('imgs/icons/currency-coin.svg')}}" alt="">
                                                                <span>4.00/Game</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-detail">
                                                        <div class="d-flex align-items-center justify-content-end">
                                                            <div class="card-rating text-white">
                                                                <img src="{{asset('imgs/icons/rating-star.svg')}}" alt="">
                                                                <span class="ml-1">5.0</span>
                                                            </div>
                                                            <div class="tag-box">10</div>
                                                        </div>
                                                        <div class="card-btn">
                                                            <button class="new-btn">Buy 3 get 1 free</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card border-0 bg-transparent p-0">
                                                <div class="card-body p-0">
                                                    <div class="d-flex align-items-center">
                                                        <div class="card-image">
                                                            <img src="{{asset('imgs/icons/mini-game-img.svg')}}" alt="">
                                                        </div>
                                                        <div class="card-text">
                                                            <div class="card-title">League of Legends</div>
                                                            <div class="card-price">
                                                                <img src="{{asset('imgs/icons/currency-coin.svg')}}" alt="">
                                                                <span>4.00/Game</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-detail">
                                                        <div class="d-flex align-items-center justify-content-end">
                                                            <div class="card-rating text-white">
                                                                <img src="{{asset('imgs/icons/rating-star.svg')}}" alt="">
                                                                <span class="ml-1">5.0</span>
                                                            </div>
                                                            <div class="tag-box">10</div>
                                                        </div>
                                                        <div class="card-btn">
                                                            <button class="new-btn">Buy 3 get 1 free</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card border-0 bg-transparent p-0">
                                                <div class="card-body p-0">
                                                    <div class="d-flex align-items-center">
                                                        <div class="card-image">
                                                            <img src="{{asset('imgs/icons/mini-game-img.svg')}}" alt="">
                                                        </div>
                                                        <div class="card-text">
                                                            <div class="card-title">League of Legends</div>
                                                            <div class="card-price">
                                                                <img src="{{asset('imgs/icons/currency-coin.svg')}}" alt="">
                                                                <span>4.00/Game</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-detail">
                                                        <div class="d-flex align-items-center justify-content-end">
                                                            <div class="card-rating text-white">
                                                                <img src="{{asset('imgs/icons/rating-star.svg')}}" alt="">
                                                                <span class="ml-1">5.0</span>
                                                            </div>
                                                            <div class="tag-box">10</div>
                                                        </div>
                                                        <div class="card-btn">
                                                            <button class="new-btn">Buy 3 get 1 free</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card border-0 bg-transparent p-0">
                                                <div class="card-body p-0">
                                                    <div class="d-flex align-items-center">
                                                        <div class="card-image">
                                                            <img src="{{asset('imgs/icons/mini-game-img.svg')}}" alt="">
                                                        </div>
                                                        <div class="card-text">
                                                            <div class="card-title">League of Legends</div>
                                                            <div class="card-price">
                                                                <img src="{{asset('imgs/icons/currency-coin.svg')}}" alt="">
                                                                <span>4.00/Game</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-detail">
                                                        <div class="d-flex align-items-center justify-content-end">
                                                            <div class="card-rating text-white">
                                                                <img src="{{asset('imgs/icons/rating-star.svg')}}" alt="">
                                                                <span class="ml-1">5.0</span>
                                                            </div>
                                                            <div class="tag-box">10</div>
                                                        </div>
                                                        <div class="card-btn">
                                                            <button class="new-btn">Buy 3 get 1 free</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card border-0 bg-transparent p-0">
                                                <div class="card-body p-0">
                                                    <div class="d-flex align-items-center">
                                                        <div class="card-image">
                                                            <img src="{{asset('imgs/icons/mini-game-img.svg')}}" alt="">
                                                        </div>
                                                        <div class="card-text">
                                                            <div class="card-title">League of Legends</div>
                                                            <div class="card-price">
                                                                <img src="{{asset('imgs/icons/currency-coin.svg')}}" alt="">
                                                                <span>4.00/Game</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-detail">
                                                        <div class="d-flex align-items-center justify-content-end">
                                                            <div class="card-rating text-white">
                                                                <img src="{{asset('imgs/icons/rating-star.svg')}}" alt="">
                                                                <span class="ml-1">5.0</span>
                                                            </div>
                                                            <div class="tag-box">10</div>
                                                        </div>
                                                        <div class="card-btn">
                                                            <button class="new-btn">Buy 3 get 1 free</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card border-0 bg-transparent p-0">
                                                <div class="card-body p-0">
                                                    <div class="d-flex align-items-center">
                                                        <div class="card-image">
                                                            <img src="{{asset('imgs/icons/mini-game-img.svg')}}" alt="">
                                                        </div>
                                                        <div class="card-text">
                                                            <div class="card-title">League of Legends</div>
                                                            <div class="card-price">
                                                                <img src="{{asset('imgs/icons/currency-coin.svg')}}" alt="">
                                                                <span>4.00/Game</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-detail">
                                                        <div class="d-flex align-items-center justify-content-end">
                                                            <div class="card-rating text-white">
                                                                <img src="{{asset('imgs/icons/rating-star.svg')}}" alt="">
                                                                <span class="ml-1">5.0</span>
                                                            </div>
                                                            <div class="tag-box">10</div>
                                                        </div>
                                                        <div class="card-btn">
                                                            <button class="new-btn">Buy 3 get 1 free</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card border-0 bg-transparent p-0">
                                                <div class="card-body p-0">
                                                    <div class="d-flex align-items-center">
                                                        <div class="card-image">
                                                            <img src="{{asset('imgs/icons/mini-game-img.svg')}}" alt="">
                                                        </div>
                                                        <div class="card-text">
                                                            <div class="card-title">League of Legends</div>
                                                            <div class="card-price">
                                                                <img src="{{asset('imgs/icons/currency-coin.svg')}}" alt="">
                                                                <span>4.00/Game</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-detail">
                                                        <div class="d-flex align-items-center justify-content-end">
                                                            <div class="card-rating text-white">
                                                                <img src="{{asset('imgs/icons/rating-star.svg')}}" alt="">
                                                                <span class="ml-1">5.0</span>
                                                            </div>
                                                            <div class="tag-box">10</div>
                                                        </div>
                                                        <div class="card-btn">
                                                            <button class="new-btn">Buy 3 get 1 free</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                    <div class="tab-content rightContactTabContent d-none" id="contactTabContent">
                        <div class="tab-pane fade show active" id="side-ordered" role="tabpanel" aria-labelledby="side-ordered-tab">
                            <div class="d-flex align-items-center justify-content-between">
                                <h2>Ordered Tab</h2>
                                <div class="right-search position-relative">
                                    <input type="text" class="form-control" placeholder="search">
                                    <i class="fa fa-search"> </i>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="side-following" role="tabpanel" aria-labelledby="side-following-tab">
                            <div class="d-flex align-items-center justify-content-between">
                                <h2>Following Tab</h2>
                                <div class="right-search position-relative">
                                    <input type="text" class="form-control" placeholder="search">
                                    <i class="fa fa-search"> </i>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="side-followers" role="tabpanel" aria-labelledby="side-followers-tab">
                            <div class="d-flex align-items-center justify-content-between">
                                <h2>Followers Tab</h2>
                                <div class="right-search position-relative">
                                    <input type="text" class="form-control" placeholder="search">
                                    <i class="fa fa-search"> </i>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="side-visitors" role="tabpanel" aria-labelledby="side-visitors-tab">
                            <div class="d-flex align-items-center justify-content-between">
                                <h2>Side Visitors Tab</h2>
                                <div class="right-search position-relative">
                                    <input type="text" class="form-control" placeholder="search">
                                    <i class="fa fa-search"> </i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="overlay"></div>
    <!-- Sidebar Section End -->

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