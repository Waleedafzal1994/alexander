@extends('layouts.app')

@section('content')

    <link rel="stylesheet" href="https://unpkg.com/simplebar@latest/dist/simplebar.css" />


    <div class="container-fluid">
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
            style="display:none; align-items:center; justify-content:flex-end; background:white; border-radius:20px; padding:20px 15px; box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;">
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


@endsection


@push('scripts')
    <script src="https://unpkg.com/simplebar@latest/dist/simplebar.min.js"></script>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
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
