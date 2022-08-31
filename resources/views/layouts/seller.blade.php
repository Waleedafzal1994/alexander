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
        <nav class="navbar navbar-expand-md navbar-dark px-0" style="position:fixed; width:100%; z-index: 100;">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <div style="height:40px;">
                        <img src="{{ asset('imgs/gplogopurple.svg') }}" alt="" style="height:40px; width:40px; padding:5px;">
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
                    <ul class="navbar-nav mr-auto">
                        @auth
                            <li class="nav-item">
                                <a class="nav-link" href="/gp">
                                    <div class="nav-link-icon-container">
                                        <img src="{{ asset('/imgs/icons/services.png') }}" class="nav-link-icon">
                                    </div>
                                    Services
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/news">
                                    <div class="nav-link-icon-container">
                                        <img src="{{ asset('/imgs/icons/news.png') }}" class="nav-link-icon">
                                    </div>
                                    Posts
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/rankings">
                                    <div class="nav-link-icon-container">
                                        <img src="{{ asset('/imgs/icons/rankings.png') }}" class="nav-link-icon">
                                    </div>
                                    Rankings
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/frequently-asked-questions">
                                    <div class="nav-link-icon-container">
                                        <img src="{{ asset('/imgs/icons/faq.png') }}" class="nav-link-icon">
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
                                <div style="margin-right:25px; display:flex; justify-content:center; padding:10px 0;">
                                    <input type="text"
                                        style="width:250px; text-align:center; background:transparent !important; color:white; border:1px solid rgba(255,255,255,0.3) !important;"
                                        id="search" placeholder="Search">
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

                            <li class="nav-item spaced-out-lg">
                                <a href="/points" class="nav-link"
                                    style="height:100%; display:flex; justify-content:center; align-items:center;">
                                    <span class="badge badge-pill badge-points">{{ Auth::user()->points }} GP <img
                                            src="/imgs/icons/6.png" style="height:24px; margin-left:5px;"></span>
                                </a>
                            </li>

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle nav_profile_name" href="#"
                                    role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                    style="height:100%; display:flex; justify-content:center; align-items:center;" v-pre>
                                    @if (Auth::user()->profile_picture)
                                        <img src="{{Auth::user()->profile_picture}}" class="nav_avatar_container">
                                    @endif
                                    <span class="nav_profile_name">{{ Auth::user()->name }}</span>
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
                                    <a class="dropdown-item" href="/user-profile/{{ Auth::id() }}#edit_user_profile/">
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

        <div class="top-bg-section w-100 d-flex align-items-end">
            <div class="container">
                <div class="bg-img"></div>
                <ul class="list mb-4">
                    <li class="circle-link">
                        <a href="">
                            <i class="fab fa-facebook-f text-white"></i>
                        </a>
                    </li>
                    <li class="circle-link">
                        <a href="">
                            <i class="fab fa-twitter text-white"></i>
                        </a>
                    </li>
                    @if(!empty(Auth::id()) && !empty($service->user->id) && (Auth::id() != $service->user->id))
                    <li class="nav-item dropdown circle-link">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
                            <i class="fas fa-ellipsis-h text-white"></i>
                        </a>
                        <ul class="dropdown-menu fade-up p-2">
                            <li>
                                <div class="d-flex align-items-center justify-content-between p-2 rounded">
                                    <p class="mb-0">Block</p>
                                    <label class="switch m-0 mb-2">
                                        <input type="checkbox" class="block-toggle" value="confirm_block">
                                        <span class="slider"></span>
                                    </label>
                                </div>
                            </li>
                            <li>
                                <a class="dropdown-item p-2 mt-2 rounded" href="#">
                                    <p class="mb-0">Report</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
        <div class="bg-content-clr">
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

                $('.block-toggle').click(function(){
                    //alert($(this).val());
                    $(this).val() == "confirm_block" ? do_block() : do_unblock();
                });

                function do_block() 
                {
                    Swal.fire({
                        title: "Blocked!!!",
                        text: "Are you sure you want to block this person?",
                        // icon: "warning",
                        // buttons: [
                        //     'No, cancel it!',
                        //     'Yes, I am sure!'
                        // ],
                        // dangerMode: true,
                        showCloseButton: true,
                        confirmButtonText : 'Yes',
                        showCancelButton: true,
                        cancelButtonText: 'No, cancel it!'
                    }).then(function(isConfirm) {
                        if (isConfirm.isConfirmed === true) {
                            block();
                            //alert('sdf');
                        } else {
                            //Swal.fire("Cancelled", "Your imaginary file is safe :)", "error");
                        }
                    })
                    //$('.block-toggle').val("confirm_block");
                    // do block
                }

                function do_unblock() {
                    Swal.fire({
                        title: "Un-Block",
                        text: "Are you sure you want to un-block this person?",
                        // icon: "info",
                        
                        // dangerMode: true,
                        confirmButtonText : 'Yes',
                        showCancelButton: true,
                        cancelButtonText: 'No'
                    }).then(function(isConfirm) {
                        if (isConfirm.isConfirmed === true) {
                            unblock();
                            //alert('sdf');
                        } else {
                            //Swal.fire("Cancelled", "Your imaginary file is safe :)", "error");
                        }
                    })
                    // do unblock
                }


                function block() 
                {
                    block_id = "{{ $service->user->id }}";
                    // console.log(following_id);
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: 'POST',
                        url: "/block",
                        data: {
                            'block_id': block_id
                        },
                        success: function(response) {
                            if (response.status === '1') {
                                $('.block-toggle').val("confirm_unblock");
                            }
                            if (response.error === '1') {
                                Swal.fire(response.msg);
                            }
                        },
                        error: function(data) {
                            //console.log(data);
                        }
                    });
                }
                function unblock() 
                {
                    block_id = "{{ $service->user->id }}";
                    // console.log(following_id);
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: 'POST',
                        url: "/block",
                        data: {
                            'block_id': block_id
                        },
                        success: function(response) {
                            if (response.status === '1') {
                                $('.block-toggle').val("confirm_block");
                            }
                            if (response.error === '1') {
                                Swal.fire(response.msg);
                            }
                        },
                        error: function(data) {
                            //console.log(data);
                        }
                    });
                }
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





</body>
</html>
