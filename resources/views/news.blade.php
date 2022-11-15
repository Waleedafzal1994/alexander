@extends('layouts.app')
@section('content')
    <!-- <div class="header-page rounded">
        <div>
            <img src="/imgs/icons/news.png" alt="" srcset="" style="height:64px;">
        </div>
    
        <div>
            <h1>Posts</h1>
            <p>Here you may find the latest news and posts from the GamersPlay community.</p>
        </div>
    </div> -->
    <!-- <div class="container-fluid">
        @foreach($posts as $post)
        <div>

        <div class="news-article">
            <div class="row">
                <div class="col-md-3">
                    <a href="/news/10">
                        <div class="news-article-image" style="background:url('{{$post->image}}'); width:100%; height:150px; background-position:center; background-size:cover; border-radius:16px;"></div>
                    </a>
                </div>
                <div class="col-md-9">
                    <h4 style="margin:0; padding:0;"><a href="/news/10">{{$post->title}}</a></h4>
                    @if($post->postAuthor != null)
                    <p style="padding-bottom:10px; border-bottom:1px solid var(--color-secondary);">by <span style="font-weight:bold;">{{$post->postAuthor->name}}</span></p>
                    @endif
                   
                    {!! substr(strip_tags($post->content,'<br>'),0,150) !!}...
                    {{-- <a href="/news/10" class="btn button-primary">Read more</a> --}}
                </div>
            </div>
           
        
        </div>
        </div>
        @endforeach

        {{$posts->links()}}
    </div> -->

    <!-- Posts Section -->
    <div class="container post-tabs mt-5 px-0">
        <div class="row">
            <div class="col-4">
                <div class="nav flex-column nav-pills bg-lightgrey shadows rounded-lg mb-4 py-4  br-16" id="v-pills-tab" role="tablist" aria-orientation="vertical">

                    <a class="nav-link active" id="following-tab" data-toggle="pill" href="#following" role="tab" aria-controls="following" aria-selected="true">
                        <span>
                            <svg width="20" height="15" viewBox="0 0 20 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M6 7.5C7.93437 7.5 9.5 5.82254 9.5 3.75C9.5 1.67746 7.93437 0 6 0C4.06563 0 2.5 1.67746 2.5 3.75C2.5 5.82254 4.06563 7.5 6 7.5ZM8.4 8.57143H8.14062C7.49062 8.90625 6.76875 9.10714 6 9.10714C5.23125 9.10714 4.5125 8.90625 3.85938 8.57143H3.6C1.6125 8.57143 0 10.2991 0 12.4286V13.3929C0 14.2801 0.671875 15 1.5 15H10.5C11.3281 15 12 14.2801 12 13.3929V12.4286C12 10.2991 10.3875 8.57143 8.4 8.57143ZM15 7.5C16.6562 7.5 18 6.06027 18 4.28571C18 2.51116 16.6562 1.07143 15 1.07143C13.3438 1.07143 12 2.51116 12 4.28571C12 6.06027 13.3438 7.5 15 7.5ZM16.5 8.57143H16.3813C15.9469 8.73214 15.4875 8.83929 15 8.83929C14.5125 8.83929 14.0531 8.73214 13.6187 8.57143H13.5C12.8625 8.57143 12.275 8.76897 11.7594 9.08705C12.5219 9.96763 13 11.1362 13 12.4286V13.7143C13 13.7879 12.9844 13.8583 12.9812 13.9286H18.5C19.3281 13.9286 20 13.2087 20 12.3214C20 10.2489 18.4344 8.57143 16.5 8.57143Z" fill="#fff"/>
                            </svg>
                        </span>
                        Following
                    </a>

                    <a class="nav-link" id="official-tab" data-toggle="pill" href="#official" role="tab" aria-controls="official" aria-selected="false">
                        <span>
                            <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.40375 0.103447C8.50632 0.03599 8.62679 0 8.75 0C8.87321 0 8.99368 0.03599 9.09625 0.103447C11.4561 1.67562 14.1461 2.69819 16.9637 3.09414C17.1126 3.11525 17.2488 3.1887 17.3473 3.30102C17.4458 3.41333 17.5 3.55699 17.5 3.70562V9.38806C16.0976 8.6802 14.4919 8.46955 12.9512 8.79133C11.4106 9.1131 10.0284 9.9478 9.03576 11.1559C8.04313 12.3639 7.50022 13.8721 7.49781 15.4283C7.49539 16.9845 8.03362 18.4943 9.0225 19.7054L8.975 19.7239C8.8302 19.7791 8.6698 19.7791 8.525 19.7239C2.885 17.5782 0 14.0699 0 9.26453V3.70562C2.28144e-05 3.5568 0.0544125 3.413 0.153166 3.30065C0.25192 3.18831 0.388398 3.11497 0.5375 3.09414C3.35471 2.69801 6.04429 1.67545 8.40375 0.103447ZM20 15.4411C20 13.9668 19.4074 12.5528 18.3525 11.5104C17.2976 10.4679 15.8668 9.88218 14.375 9.88218C12.8832 9.88218 11.4524 10.4679 10.3975 11.5104C9.34263 12.5528 8.75 13.9668 8.75 15.4411C8.75 16.9154 9.34263 18.3293 10.3975 19.3718C11.4524 20.4143 12.8832 21 14.375 21C15.8668 21 17.2976 20.4143 18.3525 19.3718C19.4074 18.3293 20 16.9154 20 15.4411ZM17.3175 13.1508C17.3757 13.2082 17.4219 13.2764 17.4534 13.3514C17.4849 13.4264 17.5011 13.5069 17.5011 13.5881C17.5011 13.6694 17.4849 13.7498 17.4534 13.8249C17.4219 13.8999 17.3757 13.968 17.3175 14.0254L13.5675 17.7314C13.5094 17.7889 13.4405 17.8345 13.3645 17.8657C13.2886 17.8968 13.2072 17.9128 13.125 17.9128C13.0428 17.9128 12.9614 17.8968 12.8855 17.8657C12.8095 17.8345 12.7406 17.7889 12.6825 17.7314L11.4325 16.496C11.3151 16.3801 11.2492 16.2228 11.2492 16.0587C11.2492 15.8947 11.3151 15.7374 11.4325 15.6214C11.5499 15.5055 11.709 15.4403 11.875 15.4403C12.041 15.4403 12.2001 15.5055 12.3175 15.6214L13.125 16.4207L16.4325 13.1508C16.4906 13.0933 16.5595 13.0477 16.6355 13.0165C16.7114 12.9854 16.7928 12.9694 16.875 12.9694C16.9572 12.9694 17.0386 12.9854 17.1145 13.0165C17.1905 13.0477 17.2594 13.0933 17.3175 13.1508Z" fill="white"/>
                            </svg>
                        </span>
                        Official
                    </a>

                    <a class="nav-link" id="recommended-tab" data-toggle="pill" href="#recommended" role="tab" aria-controls="recommended" aria-selected="false">
                        <span>
                            <svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1.9 18H2.85V5.68421H1.9C1.39609 5.68421 0.912816 5.88383 0.556497 6.23917C0.200178 6.5945 0 7.07643 0 7.57895V16.1053C0 16.6078 0.200178 17.0897 0.556497 17.445C0.912816 17.8004 1.39609 18 1.9 18ZM17.1 5.68421H10.45L11.5159 2.49347C11.611 2.20871 11.6369 1.90549 11.5915 1.60878C11.5461 1.31207 11.4306 1.03037 11.2546 0.786879C11.0786 0.543388 10.8472 0.345071 10.5793 0.208265C10.3114 0.0714594 10.0147 7.77911e-05 9.71375 0H9.5L4.75 5.15179V18H15.2L18.9164 9.85642L19 9.47368V7.57895C19 7.07643 18.7998 6.5945 18.4435 6.23917C18.0872 5.88383 17.6039 5.68421 17.1 5.68421Z" fill="white"/>
                            </svg>
                        </span>
                        Recommended
                    </a>

                    <a class="nav-link" id="highlight-tab" data-toggle="pill" href="#highlight" role="tab" aria-controls="highlight" aria-selected="false">
                        <span>
                            <svg width="19" height="22" viewBox="0 0 19 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M18.193 9.95617C17.6691 8.88176 16.9074 7.91742 15.9557 7.12349L15.1703 6.46695C15.1436 6.44527 15.1115 6.42989 15.0768 6.42215C15.0421 6.4144 15.0058 6.41455 14.9712 6.42256C14.9366 6.43057 14.9046 6.44621 14.8781 6.46809C14.8517 6.48998 14.8315 6.51745 14.8194 6.5481L14.4686 7.46528C14.25 8.04067 13.8479 8.62835 13.2784 9.2062C13.2406 9.24308 13.1974 9.25292 13.1677 9.25538C13.1381 9.25784 13.0922 9.25292 13.0517 9.21849C13.0139 9.18899 12.995 9.14472 12.9977 9.10046C13.0976 7.62019 12.6118 5.95058 11.5484 4.13343C10.6686 2.62365 9.44601 1.44582 7.91846 0.624539L6.80383 0.0270191C6.65809 -0.0516666 6.47187 0.0516082 6.47997 0.206521L6.53934 1.38681C6.57982 2.19333 6.47727 2.90642 6.23437 3.49903C5.93749 4.22441 5.51107 4.89816 4.9659 5.50305C4.58651 5.92344 4.15649 6.30368 3.68394 6.63662C2.54585 7.43372 1.62043 8.45508 0.976988 9.62422C0.335128 10.8035 0.000783104 12.102 0 13.4183C0 14.579 0.250994 15.7027 0.747584 16.7625C1.22708 17.7829 1.91905 18.7089 2.78522 19.4894C3.65966 20.2763 4.67443 20.8959 5.80525 21.3263C6.97656 21.7738 8.21803 22 9.49999 22C10.7819 22 12.0234 21.7738 13.1947 21.3287C14.3228 20.9009 15.3485 20.277 16.2148 19.4919C17.0892 18.705 17.7747 17.7854 18.2524 16.7649C18.7482 15.708 19.0026 14.5702 19 13.4208C19 12.2208 18.7301 11.0553 18.193 9.95617Z" fill="white"/>
                            </svg>
                        </span>
                        Highlights
                    </a>

                    <a class="nav-link" id="chitchat-tab" data-toggle="pill" href="#chitchat" role="tab" aria-controls="chitchat" aria-selected="false">
                        <span>
                            <svg width="19" height="20" viewBox="0 0 19 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1.9 15.2H3.8V19.077L8.64595 15.2H13.3C14.3478 15.2 15.2 14.3479 15.2 13.3V5.70005C15.2 4.6522 14.3478 3.80005 13.3 3.80005H1.9C0.85215 3.80005 0 4.6522 0 5.70005V13.3C0 14.3479 0.85215 15.2 1.9 15.2Z" fill="white"/>
                                <path d="M17.0998 0H5.6998C4.65195 0 3.7998 0.85215 3.7998 1.9H15.1998C16.2477 1.9 17.0998 2.75215 17.0998 3.8V11.4C18.1477 11.4 18.9998 10.5478 18.9998 9.5V1.9C18.9998 0.85215 18.1477 0 17.0998 0Z" fill="white"/>
                            </svg>
                        </span>
                        Chit-Chat
                    </a>

                    <a class="nav-link" id="newcomer-tab" data-toggle="pill" href="#newcomer" role="tab" aria-controls="newcomer" aria-selected="false">
                        <span>
                            <svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9.50039 6.6499C7.95569 6.6499 6.65039 7.9552 6.65039 9.4999C6.65039 11.0446 7.95569 12.3499 9.50039 12.3499C11.0451 12.3499 12.3504 11.0446 12.3504 9.4999C12.3504 7.9552 11.0451 6.6499 9.50039 6.6499Z" fill="white"/>
                                <path d="M17.1 2.85H14.6433L12.0716 0.278351C11.9836 0.189961 11.8789 0.119862 11.7636 0.0720911C11.6484 0.0243201 11.5248 -0.000179977 11.4 9.9529e-07H7.6C7.47522 -0.000179977 7.35164 0.0243201 7.23637 0.0720911C7.1211 0.119862 7.01642 0.189961 6.92835 0.278351L4.3567 2.85H1.9C0.85215 2.85 0 3.70215 0 4.75V15.2C0 16.2479 0.85215 17.1 1.9 17.1H17.1C18.1479 17.1 19 16.2479 19 15.2V4.75C19 3.70215 18.1479 2.85 17.1 2.85ZM9.5 14.25C6.9255 14.25 4.75 12.0745 4.75 9.5C4.75 6.9255 6.9255 4.75 9.5 4.75C12.0745 4.75 14.25 6.9255 14.25 9.5C14.25 12.0745 12.0745 14.25 9.5 14.25Z" fill="white"/>
                            </svg>
                        </span>
                        Newcomer Selfies
                    </a>

                    <a class="nav-link" id="gears-tab" data-toggle="pill" href="#gears" role="tab" aria-controls="gears" aria-selected="false">
                        <span>
                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15.3641 15.3637C16.0033 14.7249 16.0033 13.6885 15.3641 13.0497L15.227 12.9127C15.6625 12.2217 15.9873 11.4557 16.1739 10.6363H16.3636C17.2673 10.6363 18 9.90363 18 8.99995C18 8.09627 17.2673 7.36358 16.3636 7.36358H16.1739C15.9873 6.54423 15.6625 5.77815 15.227 5.0872L15.3641 4.95015C16.0033 4.31136 16.0033 3.27503 15.3641 2.63623C14.7249 1.99703 13.6894 1.99703 13.0502 2.63623L12.9131 2.77328C12.2224 2.33749 11.4561 2.01288 10.6364 1.82593V1.63636C10.6364 0.732682 9.90368 0 9 0C8.09632 0 7.36364 0.732682 7.36364 1.63636V1.82593C6.54387 2.01288 5.77759 2.33749 5.08689 2.77333L4.94985 2.63628C4.31064 1.99708 3.27513 1.99708 2.63593 2.63628C1.99672 3.27508 1.99672 4.31141 2.63593 4.9502L2.77297 5.08725C2.33749 5.7782 2.01268 6.54428 1.82613 7.36364H1.63636C0.732682 7.36364 0 8.09632 0 9C0 9.90368 0.732682 10.6364 1.63636 10.6364H1.82613C2.01268 11.4557 2.33749 12.2218 2.77297 12.9128L2.63593 13.0498C1.99672 13.6886 1.99672 14.7249 2.63593 15.3637C2.95553 15.6833 3.37423 15.8431 3.79289 15.8431C4.21154 15.8431 4.63024 15.6833 4.94985 15.3637L5.08689 15.2267C5.77764 15.6625 6.54387 15.9871 7.36364 16.1741V16.3636C7.36364 17.2673 8.09632 18 9 18C9.90368 18 10.6364 17.2673 10.6364 16.3636V16.1741C11.4561 15.9871 12.2224 15.6625 12.9131 15.2267L13.0502 15.3637C13.3698 15.6833 13.7885 15.8431 14.2071 15.8431C14.6258 15.8431 15.0445 15.6833 15.3641 15.3637ZM9 13.0909C6.74443 13.0909 4.90909 11.2556 4.90909 9C4.90909 6.74443 6.74443 4.90909 9 4.90909C11.2556 4.90909 13.0909 6.74443 13.0909 9C13.0909 11.2556 11.2556 13.0909 9 13.0909Z" fill="white"/>
                                <path d="M9.00044 11.4547C10.3561 11.4547 11.455 10.3558 11.455 9.0002C11.455 7.64459 10.3561 6.54565 9.00044 6.54565C7.64484 6.54565 6.5459 7.64459 6.5459 9.0002C6.5459 10.3558 7.64484 11.4547 9.00044 11.4547Z" fill="white"/>
                            </svg>
                        </span>
                        PC & Gears
                    </a>

                    <div class="post-btn text-center mx-4">
                        <a href="/community/post" class="new-btn w-100 text-white text-center d-flex align-items-center justify-content-center py-2 rounded-pill">Post</a>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="following" role="tabpanel" aria-labelledby="following-tab">
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
                                    <div id="carousel-following" class="lightbox mb-5 carousel slide" data-ride="carousel" data-interval="false">
                                        <ol class="carousel-indicators">
                                            <li data-target="#carousel-following" data-slide-to="0" class="active"></li>
                                            <li data-target="#carousel-following" data-slide-to="1" class=""></li>
                                            <li data-target="#carousel-following" data-slide-to="2" class=""></li>
                                        </ol>
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <img src="{{asset('imgs/carousel-imgs/apex-lfg.jpg')}}" class="d-block w-100" alt="">
                                            </div>
                                            <div class="carousel-item ">
                                                <img src="{{asset('imgs/carousel-imgs/fortnite-lfg.jpg')}}" class="d-block w-100" alt="">
                                            </div>
                                            <div class="carousel-item ">
                                                <img src="{{asset('imgs/carousel-imgs/genshin-impact-lfg.png')}}" class="d-block w-100" alt="">
                                            </div>
                                        </div>
                                        <a class="carousel-control-prev" href="#carousel-following" role="button" data-slide="prev">
                                            <i class="fa-solid fa-location-arrow prev-icon"></i>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carousel-following" role="button" data-slide="next">
                                            <i class="fa-solid fa-location-arrow next-icon"></i>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="we-video-info highlight-section float-none d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <div class="likes d-flex align-items-center">
                                            <img src="{{asset('imgs/icons/red-heart.svg')}}" alt="">
                                            <span class="ml-2">23</span>
                                        </div>
                                        <a href="/post-details" class="likes comments d-flex align-items-center">
                                            <img src="{{asset('imgs/icons/comment-icon.svg')}}" alt="">
                                            <span class="ml-2">13</span>
                                        </a>
                                    </div>
                                    <div class="hashtag">
                                        <div class="">#Newcomer Selfies</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="official" role="tabpanel" aria-labelledby="official-tab">
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
                                    <div id="carousel-official" class="lightbox mb-5 carousel slide" data-ride="carousel" data-interval="false">
                                        <ol class="carousel-indicators">
                                            <li data-target="#carousel-official" data-slide-to="0" class="active"></li>
                                            <li data-target="#carousel-official" data-slide-to="1" class=""></li>
                                            <li data-target="#carousel-official" data-slide-to="2" class=""></li>
                                        </ol>
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <img src="{{asset('imgs/carousel-imgs/fortnite-lfg.jpg')}}" class="d-block w-100" alt="">
                                            </div>
                                            <div class="carousel-item ">
                                                <img src="{{asset('imgs/carousel-imgs/apex-lfg.jpg')}}" class="d-block w-100" alt="">
                                            </div>
                                            <div class="carousel-item ">
                                                <img src="{{asset('imgs/carousel-imgs/genshin-impact-lfg.png')}}" class="d-block w-100" alt="">
                                            </div>
                                        </div>
                                        <a class="carousel-control-prev" href="#carousel-official" role="button" data-slide="prev">
                                            <i class="fa-solid fa-location-arrow prev-icon"></i>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carousel-official" role="button" data-slide="next">
                                            <i class="fa-solid fa-location-arrow next-icon"></i>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="we-video-info highlight-section float-none d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <div class="likes d-flex align-items-center">
                                            <img src="{{asset('imgs/icons/red-heart.svg')}}" alt="">
                                            <span class="ml-2">23</span>
                                        </div>
                                        <a href="/post-details" class="likes comments d-flex align-items-center">
                                            <img src="{{asset('imgs/icons/comment-icon.svg')}}" alt="">
                                            <span class="ml-2">13</span>
                                        </a>
                                    </div>
                                    <div class="hashtag">
                                        <div class="">#Newcomer Selfies</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="recommended" role="tabpanel" aria-labelledby="recommended-tab">
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
                                    <div id="carousel-recommended" class="lightbox mb-5 carousel slide" data-ride="carousel" data-interval="false">
                                        <ol class="carousel-indicators">
                                            <li data-target="#carousel-recommended" data-slide-to="0" class="active"></li>
                                            <li data-target="#carousel-recommended" data-slide-to="1" class=""></li>
                                            <li data-target="#carousel-recommended" data-slide-to="2" class=""></li>
                                        </ol>
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <img src="{{asset('imgs/carousel-imgs/league-of-legends-lfg.png')}}" class="d-block w-100" alt="">
                                            </div>
                                            <div class="carousel-item ">
                                                <img src="{{asset('imgs/carousel-imgs/legends-of-runeterra-lfg.jpg')}}" class="d-block w-100" alt="">
                                            </div>
                                            <div class="carousel-item ">
                                                <img src="{{asset('imgs/carousel-imgs/minecraft-lfg.png')}}" class="d-block w-100" alt="">
                                            </div>
                                        </div>
                                        <a class="carousel-control-prev" href="#carousel-recommended" role="button" data-slide="prev">
                                            <i class="fa-solid fa-location-arrow prev-icon"></i>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carousel-recommended" role="button" data-slide="next">
                                            <i class="fa-solid fa-location-arrow next-icon"></i>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="we-video-info highlight-section float-none d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <div class="likes d-flex align-items-center">
                                            <img src="{{asset('imgs/icons/red-heart.svg')}}" alt="">
                                            <span class="ml-2">23</span>
                                        </div>
                                        <a href="/post-details" class="likes comments d-flex align-items-center">
                                            <img src="{{asset('imgs/icons/comment-icon.svg')}}" alt="">
                                            <span class="ml-2">13</span>
                                        </a>
                                    </div>
                                    <div class="hashtag">
                                        <div class="">#Newcomer Selfies</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="highlight" role="tabpanel" aria-labelledby="highlight-tab">
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
                                    <div id="carousel-highlight" class="lightbox mb-5 carousel slide" data-ride="carousel" data-interval="false">
                                        <ol class="carousel-indicators">
                                            <li data-target="#carousel-highlight" data-slide-to="0" class="active"></li>
                                            <li data-target="#carousel-highlight" data-slide-to="1" class=""></li>
                                            <li data-target="#carousel-highlight" data-slide-to="2" class=""></li>
                                        </ol>
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <img src="{{asset('imgs/carousel-imgs/overwatch-lfg.png')}}" class="d-block w-100" alt="">
                                            </div>
                                            <div class="carousel-item ">
                                                <img src="{{asset('imgs/carousel-imgs/valorant-lfg.png')}}" class="d-block w-100" alt="">
                                            </div>
                                            <div class="carousel-item ">
                                                <img src="{{asset('imgs/carousel-imgs/wild-rift-lfg.png')}}" class="d-block w-100" alt="">
                                            </div>
                                        </div>
                                        <a class="carousel-control-prev" href="#carousel-highlight" role="button" data-slide="prev">
                                            <i class="fa-solid fa-location-arrow prev-icon"></i>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carousel-highlight" role="button" data-slide="next">
                                            <i class="fa-solid fa-location-arrow next-icon"></i>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="we-video-info highlight-section float-none d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <div class="likes d-flex align-items-center">
                                            <img src="{{asset('imgs/icons/red-heart.svg')}}" alt="">
                                            <span class="ml-2">23</span>
                                        </div>
                                        <a href="/post-details" class="likes comments d-flex align-items-center">
                                            <img src="{{asset('imgs/icons/comment-icon.svg')}}" alt="">
                                            <span class="ml-2">13</span>
                                        </a>
                                    </div>
                                    <div class="hashtag">
                                        <div class="">#Newcomer Selfies</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="chitchat" role="tabpanel" aria-labelledby="chitchat-tab">
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
                                    <div id="carousel-chitchat" class="lightbox mb-5 carousel slide" data-ride="carousel" data-interval="false">
                                        <ol class="carousel-indicators">
                                            <li data-target="#carousel-chitchat" data-slide-to="0" class="active"></li>
                                            <li data-target="#carousel-chitchat" data-slide-to="1" class=""></li>
                                            <li data-target="#carousel-chitchat" data-slide-to="2" class=""></li>
                                        </ol>
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <img src="{{asset('imgs/carousel-imgs/league-of-legends-lfg.png')}}" class="d-block w-100" alt="">
                                            </div>
                                            <div class="carousel-item ">
                                                <img src="{{asset('imgs/carousel-imgs/legends-of-runeterra-lfg.jpg')}}" class="d-block w-100" alt="">
                                            </div>
                                            <div class="carousel-item ">
                                                <img src="{{asset('imgs/carousel-imgs/minecraft-lfg.png')}}" class="d-block w-100" alt="">
                                            </div>
                                        </div>
                                        <a class="carousel-control-prev" href="#carousel-chitchat" role="button" data-slide="prev">
                                            <i class="fa-solid fa-location-arrow prev-icon"></i>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carousel-chitchat" role="button" data-slide="next">
                                            <i class="fa-solid fa-location-arrow next-icon"></i>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="we-video-info highlight-section float-none d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <div class="likes d-flex align-items-center">
                                            <img src="{{asset('imgs/icons/red-heart.svg')}}" alt="">
                                            <span class="ml-2">23</span>
                                        </div>
                                        <a href="/post-details" class="likes comments d-flex align-items-center">
                                            <img src="{{asset('imgs/icons/comment-icon.svg')}}" alt="">
                                            <span class="ml-2">13</span>
                                        </a>
                                    </div>
                                    <div class="hashtag">
                                        <div class="">#Newcomer Selfies</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="newcomer" role="tabpanel" aria-labelledby="newcomer-tab">
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
                                    <div id="carousel-selfie" class="lightbox mb-5 carousel slide" data-ride="carousel" data-interval="false">
                                        <ol class="carousel-indicators">
                                            <li data-target="#carousel-selfie" data-slide-to="0" class="active"></li>
                                            <li data-target="#carousel-selfie" data-slide-to="1" class=""></li>
                                            <li data-target="#carousel-selfie" data-slide-to="2" class=""></li>
                                        </ol>
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <img src="{{asset('imgs/carousel-imgs/fortnite-lfg.jpg')}}" class="d-block w-100" alt="">
                                            </div>
                                            <div class="carousel-item ">
                                                <img src="{{asset('imgs/carousel-imgs/apex-lfg.jpg')}}" class="d-block w-100" alt="">
                                            </div>
                                            <div class="carousel-item ">
                                                <img src="{{asset('imgs/carousel-imgs/genshin-impact-lfg.png')}}" class="d-block w-100" alt="">
                                            </div>
                                        </div>
                                        <a class="carousel-control-prev" href="#carousel-selfie" role="button" data-slide="prev">
                                            <i class="fa-solid fa-location-arrow prev-icon"></i>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carousel-selfie" role="button" data-slide="next">
                                            <i class="fa-solid fa-location-arrow next-icon"></i>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="we-video-info highlight-section float-none d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <div class="likes d-flex align-items-center">
                                            <img src="{{asset('imgs/icons/red-heart.svg')}}" alt="">
                                            <span class="ml-2">23</span>
                                        </div>
                                        <a href="/post-details" class="likes comments d-flex align-items-center">
                                            <img src="{{asset('imgs/icons/comment-icon.svg')}}" alt="">
                                            <span class="ml-2">13</span>
                                        </a>
                                    </div>
                                    <div class="hashtag">
                                        <div class="">#Newcomer Selfies</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="gears" role="tabpanel" aria-labelledby="gears-tab">
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
                                    <div id="carousel-pcgear" class="lightbox mb-5 carousel slide" data-ride="carousel" data-interval="false">
                                        <ol class="carousel-indicators">
                                            <li data-target="#carousel-pcgear" data-slide-to="0" class="active"></li>
                                            <li data-target="#carousel-pcgear" data-slide-to="1" class=""></li>
                                            <li data-target="#carousel-pcgear" data-slide-to="2" class=""></li>
                                        </ol>
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <img src="{{asset('imgs/carousel-imgs/valorant-lfg.png')}}" class="d-block w-100" alt="">
                                            </div>
                                            <div class="carousel-item ">
                                                <img src="{{asset('imgs/carousel-imgs/overwatch-lfg.png')}}" class="d-block w-100" alt="">
                                            </div>
                                            <div class="carousel-item ">
                                                <img src="{{asset('imgs/carousel-imgs/wild-rift-lfg.png')}}" class="d-block w-100" alt="">
                                            </div>
                                        </div>
                                        <a class="carousel-control-prev" href="#carousel-pcgear" role="button" data-slide="prev">
                                            <i class="fa-solid fa-location-arrow prev-icon"></i>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carousel-pcgear" role="button" data-slide="next">
                                            <i class="fa-solid fa-location-arrow next-icon"></i>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="we-video-info highlight-section float-none d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <div class="likes d-flex align-items-center">
                                            <img src="{{asset('imgs/icons/red-heart.svg')}}" alt="">
                                            <span class="ml-2">23</span>
                                        </div>
                                        <a href="/post-details" class="likes comments d-flex align-items-center">
                                            <img src="{{asset('imgs/icons/comment-icon.svg')}}" alt="">
                                            <span class="ml-2">13</span>
                                        </a>
                                    </div>
                                    <div class="hashtag">
                                        <div class="">#Newcomer Selfies</div>
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

