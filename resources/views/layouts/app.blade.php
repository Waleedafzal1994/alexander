<!doctype html>
@php
$noFooter = true;
@endphp
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('imgs/fav.png') }}" sizes="32x32" type="image/png">
    <title>GamersPlay :. Gaming & Lifestyle</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"/>
    <!-- Scripts -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/init.js') }}" defer></script>
    <script type="text/javascript" src="{{ asset('js/slick.min.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    {{-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> --}}

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css?v=') . time() }}" rel="stylesheet">
    <link href="{{ asset('css/style-services.css?v=') . time() }}" rel="stylesheet">
    <link href="{{ asset('css/mq.css?v=1.0.0') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Owl caoursel -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css" />
    <!-- Owl caoursel -->

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">

    <!-- Primary Meta Tags -->
    <title>GamersPlay | Home</title>
    <meta name="title" content="GamersPlay | Home">
    <meta name="description"
        content="GamersPlay is a  premier destination for finding gamer friends to play with, browse our selection of hundreds of services in gaming and lifestyle categories.">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://gamersplay.gg/">
    <meta property="og:title" content="GamersPlay | Home">
    <meta property="og:description"
        content="GamersPlay is a  premier destination for finding gamer friends to play with, browse our selection of hundreds of services in gaming and lifestyle categories.">
    <meta property="og:image" content="/imgs/astronaut.png">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://gamersplay.gg/">
    <meta property="twitter:title" content="GamersPlay | Home">
    <meta property="twitter:description"
        content="GamersPlay is a  premier destination for finding gamer friends to play with, browse our selection of hundreds of services in gaming and lifestyle categories.">
    <meta property="twitter:image" content="/imgs/astronaut.png">


    {{-- SEO optimization KWs --}}
    <meta name="keywords"
        content="gaming website, meet new friends, socialize, find new gaming friend, gamersplay, play games, play games online, online, online gaming, gaming services, csgo, lol, dota2, pubg, gaming,friends,total gaming,gaming friends,making friends,green gaming,gaming music,family friendly,online gaming,kid friendly,game with friends,no friends,online friends,#friends,ff game with friends,games to make friends,as gaming,gaming funny,as gaming free fire,make friends video games">
    <meta name="robots" content="index, follow">
    <meta name="language" content="English">
    <meta name="revisit-after" content="15 days">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    @yield('style')
</head>

<body>
    <div id="app">
    <nav class="navbar navbar-expand-md navbar-dark" style="position:fixed; width:100%; height:70px; z-index: 100; box-shadow: 0px 1px 5px rgba(24, 27, 32, 0.3) !important;">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <div style=" width: max-content;">
                        <!-- <img src="{{ asset('imgs/gplogopurple.svg') }}" alt="" style="height:40px; width:40px; padding:5px;"> -->
                        {{ config('app.name', 'Laravel') }}

                    </div>
                </a>
                <button class="navbar-toggler mr-2" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav">
                        @auth
                            <li class="nav-item">
                                <a class="nav-link" href="/gp">
                                    <div class="nav-link-icon-container">
                                        <img src="{{ asset('/imgs/icons/services-icon.svg') }}" class="nav-link-icon">
                                    </div>
                                    Services
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/news">
                                    <div class="nav-link-icon-container">
                                        <img src="{{ asset('/imgs/icons/posts-icon.svg') }}" class="nav-link-icon">
                                    </div>
                                    Posts
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/rankings">
                                    <div class="nav-link-icon-container">
                                        <img src="{{ asset('/imgs/icons/ranking-icon.svg') }}" class="nav-link-icon">
                                    </div>
                                    Rankings
                                </a>
                            </li>
                            <li class="nav-item mr-3">
                                <a class="nav-link" href="/frequently-asked-questions">
                                    <div class="nav-link-icon-container">
                                        <img src="{{ asset('/imgs/icons/faq-icon.svg') }}" class="nav-link-icon">
                                    </div>
                                    F.A.Q
                                </a>
                            </li>
                        @endauth
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto auth-links">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a href="#loginPanel" class="btn login-btn" id="" style="cursor: pointer"
                                        data-toggle="modal" data-target="#loginModal" data-backdrop="static"
                                        data-keyboard="false">
                                        <img src="{{ asset('temp-services/images/3d/circle.png') }}"
                                            style="height:20px;">
                                        {{ __('Login') }}
                                    </a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a href="#registerPanel" class="btn register-btn" id="" style="cursor: pointer;"
                                        data-toggle="modal" data-target="#loginModal" data-backdrop="static"
                                        data-keyboard="false">
                                        <img src="{{ asset('temp-services/images/3d/triangle.png') }}"
                                            style="height:20px;">
                                        {{ __('Register') }}
                                    </a>
                                </li>
                            @endif
                        @else
                        <li class="nav-item">
                            <button id="buyBtn" class="mt-0"> 
                                <!-- <svg width="22" class="mr-1" height="24" viewBox="0 0 22 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9.16647 27.9558C9.25682 27.9856 9.34946 28.0001 9.44106 28.0001C9.71269 28.0001 9.97541 27.8732 10.1437 27.6467L21.5954 12.2248C21.7926 11.9594 21.8232 11.6055 21.6746 11.31C21.526 11.0146 21.2236 10.8282 20.893 10.8282H13.1053V0.874999C13.1053 0.495358 12.8606 0.15903 12.4993 0.042327C12.1381 -0.0743215 11.7428 0.0551786 11.5207 0.363124L0.397278 15.7849C0.205106 16.0514 0.178364 16.403 0.327989 16.6954C0.477614 16.9878 0.77845 17.1718 1.10696 17.1718H8.56622V27.125C8.56622 27.5024 8.80816 27.8373 9.16647 27.9558ZM2.81693 15.4218L11.3553 3.58389V11.7032C11.3553 12.1865 11.7471 12.5782 12.2303 12.5782H19.1533L10.3162 24.479V16.2968C10.3162 15.8136 9.92444 15.4218 9.44122 15.4218H2.81693Z" fill="#fff"></path>
                                </svg> -->
                                Start earning as GP+
                            </button>
                        </li>
                            <li class="nav-item">
                                <div style="margin-right:25px; display:flex; justify-content:center; padding:10px 0;">
                                    <div class="position-relative search-section">
                                        <input type="text" class="font-15 search-input border-0" id="search" placeholder="Search">
                                        <i class="fa fa-search text-white"></i>
                                    </div>
                                    <div id="myDropdown" class="dropdown-content"
                                        style="border-radius:4px; width:250px; min-height:50px; margin-top:40px;">

                                        <div id="spinner"
                                            style="display:flex; justify-content:center; align-items:center; height:100%; width:100%; margin:10px 0;">

                                            <div class="spinner-border" role="status"
                                                style="display:Flex; justify-content:center;align-items:center;">
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                        </div>

                                        <div id="search_content" style="display:flex; flex-direction:column;">

                                        </div>

                                    </div>
                                </div>
                            </li>

                            <li class="nav-item ml-4">
                                <a href="">
                                    <img src="{{asset('imgs/icons/search-icon.svg')}}" alt="">
                                </a>
                            </li>
                            <li class="nav-item mx-4">
                                <a href="">
                                    <img src="{{asset('imgs/icons/gift-box-icon.svg')}}" alt="">
                                </a>
                            </li>
                            <li class="nav-item mr-4">
                                <a href="" class="bell-icon">
                                    <img src="{{asset('imgs/icons/bell-icon.svg')}}" alt="">
                                    <span>2</span>
                                </a>
                            </li>

                            <li class="nav-item spaced-out-lg mr-0">
                                <a href="/points" class="nav-link p-0"
                                    style="height:100%; display:flex; justify-content:center; align-items:center;">
                                    <span class="badge badge-pill badge-points d-flex align-items-center">
                                        <img src="/imgs/icons/currency-coin.svg" style="height:16px; margin-right:5px;"> 
                                        {{ Auth::user()->points }} GP 
                                    </span>
                                </a>
                            </li>

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="px-0 flex-row nav-link dropdown-toggle nav_profile_name" href="#"
                                    role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                    style="height:100%; display:flex; justify-content:center; align-items:center;" v-pre>
                                    @if (Auth::user()->profile_picture)
                                        <img src="{{Auth::user()->profile_picture}}" class="nav_avatar_container">
                                    @endif
                                    <div class="bg-blur"></div>
                                    <!-- <span class="nav_profile_name">{{ Auth::user()->name }}</span> -->
                                </a>

                                <div class="dropdown-menu dropdown-menu-right user-actions-dropdown"
                                    aria-labelledby="navbarDropdown">
                                    @if (Auth::user()->user_group == '3')
                                        <a class="dropdown-item" href="/admin">
                                            <span class="material-icons"
                                                style="color:red; height:10px; vertical-align:top;">local_police</span>
                                            Admin Panel
                                        </a>
                                    @endif
                                    @if (intVal(Auth::user()->user_group) > 0)
                                        <a class="dropdown-item" href="/moderator">
                                            <span class="material-icons"
                                                style="color:red; height:10px; vertical-align:top;">admin_panel_settings</span>
                                            Moderator Panel
                                        </a>
                                    @endif
                                    @if (intVal(Auth::user()->seller_rank) > 0)
                                        <a class="dropdown-item" href="/seller">
                                            Seller Dashboard
                                        </a>
                                    @endif
                                    @if (Auth::user()->seller_rank == '0')
                                        <a class="dropdown-item" href="/seller/apply">
                                            <span class="material-icons"
                                                style="color:orange; height:10px; vertical-align:top;">star</span>
                                            <span style="font-weight:bold;">Seller Application</span>
                                        </a>
                                    @endif
                                    <a class="dropdown-item" href="/user-profile/{{ Auth::id() }}">
                                        My Profile
                                    </a>
                                    <a class="dropdown-item" href="/points">
                                        Wallet
                                    </a>
                                    <a class="dropdown-item" href="/orders">
                                        Order History
                                    </a>
                                    <a class="dropdown-item" href="/chat">
                                        Chat
                                    </a>
                                    <a class="dropdown-item" href="/support">
                                        Support
                                    </a>

                                    <a class="dropdown-item" href="javascript:void(0)"
                                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>


                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <div class="spacer" style="height:55px;">
                &nbsp;
            </div>
            @guest
                @include('partials.login')
            @endguest
            {{-- @include('partials.login2') --}}
            {{-- @include('partials.register') --}}

            @if(!empty(Auth::user()) && empty(Auth::user()->profile_complete))
                @include('partials.register_complete')
            @endif
            <div class="bg-content-clr" style="padding-top: 14px;">
                <main class="py-4 @if (Route::current()->getName() != 'welcome') container @endif">
                    @yield('content')
                </main>
            </div>
            @yield('footer')

            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            <script src="{{ asset('js/notify/notify.min.js') }}" type="text/javascript"></script>
            <script>
                $(document).ready(function() {
                    $("#loginModal").on('shown.bs.modal', function(e) {
                        var tab = e.relatedTarget.hash;
                        $('.nav-tabs a[href="' + tab + '"]').tab('show');
                    })
                });
            </script>

            <script>
                $(document).ready(function() {

                    $('#staticBackdrop').modal({
                        show: true
                    });
                });
            </script>
            
        </div>
    <script type="text/javascript">
        $.notify.defaults({globalPosition: 'top right'});   
    </script>

    @if(session('success'))
              
        <script type="text/javascript">
            var msg = '{{ session("success")}}';
            $.notify(msg, "success");
        </script>
    @elseif(session('flash_errors'))
   
        <script type="text/javascript">
            var msg = '{{ session("flash_errors")}}';
            $.notify(msg, "error");
        </script>

    @endif
    @stack('scripts')

    <!-- Bootstrap 5 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>

</body>
</html>
