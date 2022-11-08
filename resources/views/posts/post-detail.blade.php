@extends('layouts.app')
@section('content')

    <div class="post-detail">
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
                <div class="post-right-section">
                    <div class="mt-4 their-services bg-lightgrey br-16 p-3">
                        <div class="border-bg bg-darkgrey br-16">
                            <div class="bg-darkgrey br-16">
                                <h4 class="text-white mb-3">their Services</h4>

                                <div class="card border-0 bg-transparent p-0">
                                    <div class="card-body p-0">
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

@endsection