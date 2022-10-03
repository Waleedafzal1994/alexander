<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('imgs/fav.png') }}" sizes="32x32" type="image/png">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/admin.js') }}" defer></script>
    <script src="{{ asset('js/auto-tables.js') }}" defer></script>
    <script src="{{ asset('js/init.js') }}" defer></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mq.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    @yield('style')
</head>

<body>
    <div id="app">
        <div style="min-height:100%; background:var(--color-primary); top:40px; width:160px; position:fixed; transition:ease-in-out 1s; display:flex; flex-direction:column; align-items:center; padding:20px 0; z-index:9999;"
            id="admin_sidebar">
            <div style="display:flex; flex-direction:column;">
                <a href="/admin/" style="color:white; margin:15px 0;">
                    <span class="material-icons admin_nav_icon">admin_panel_settings</span>
                    <span class="toggle-display">Dashboard</span>
                </a>
                <a href="/admin/users" style="color:white; margin:15px 0;">
                    <span class="material-icons admin_nav_icon">manage_accounts</span>
                    <span class="toggle-display">Users</span>
                </a>

                <a href="/admin/services" style="color:white; margin:15px 0;">
                    <span class="material-icons admin_nav_icon">assignment_ind</span>
                    <span class="toggle-display">Services</span>
                </a>

                <a href="/admin/applications" style="color:white; margin:15px 0;">
                    <span class="material-icons admin_nav_icon">web_asset</span>
                    <span class="toggle-display">Applications</span>
                </a>

                <a href="/admin/withdrawals" style="color:white; margin:15px 0;">
                    <span class="material-icons admin_nav_icon"
                        style="vertical-align:middle;">account_balance_wallet</span>
                    <span class="toggle-display">Withdrawals</span>
                </a>

                <a href="/admin/categories" style="color:white; margin:15px 0;">
                    <span class="material-icons admin_nav_icon" style="vertical-align:middle;">list</span>
                    <span class="toggle-display">Categories</span>
                </a>
                <a href="/admin/news" style="color:white; margin:15px 0;">
                    <span class="material-icons admin_nav_icon" style="vertical-align:middle;">post_add</span>
                    <span class="toggle-display">News</span>
                </a>

            </div>
        </div>




        <nav class="navbar navbar-expand-md navbar-dark bg-white" style="position:fixed; width:100%;">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <span id="admin_panel_mobile">Admin Panel</span>
                    {{-- <span class="material-icons" style="z-index:999;" id="admin_expand">menu</span> --}}
                </a>
                <button class="navbar-toggler mr-2" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item d-block d-sm-none">
                                <a class="nav-link" href="/admin">Dashboard</a>
                            </li>
                            <li class="nav-item d-block d-sm-none">
                                <a class="nav-link" href="/admin/users">Users</a>
                            </li>
                            <li class="nav-item d-block d-sm-none">
                                <a class="nav-link" href="/admin/services">Services</a>
                            </li>
                            <li class="nav-item d-block d-sm-none">
                                <a class="nav-link" href="/admin/applications">Applications</a>
                            </li>
                            <li class="nav-item d-block d-sm-none">
                                <a class="nav-link" href="/admin/withdrawals">Withdrawals</a>
                            </li>
                            <li class="nav-item d-block d-sm-none">
                                <a class="nav-link" href="/admin/categories">Categories</a>
                            </li>
                            <li class="nav-item d-block d-sm-none">
                                <a class="nav-link" href="/admin/news">News</a>
                            </li>








                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle nav_profile_name" href="#"
                                    role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                    style="height:100%; display:flex; justify-content:center; align-items:center;" v-pre>
                                    @if (Auth::user()->profile_picture)
                                        <img src="{{ Auth::user()->profile_picture }}" class="nav_avatar_container">
                                    @endif
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
                                    <a class="dropdown-item" href="/profile/{{ Auth::id() }}">
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

                                    <a class="dropdown-item" href="javascript:void(0)" onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
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
        <main class="py-4">
            @yield('content')
        </main>

        @yield('footer')
    </div>
    @stack('scripts')
</body>

</html>
