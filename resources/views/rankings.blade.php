@extends('layouts.app')

@section('content')

    <div class="main-ranking-section">
        <h2 class="my-3">Rankings</h2>
        <div class="ranking-section">
            
            <div class="small-card card golden-white">
                <div class="card-body">
                    <div class="card-level">12 Level - 700 XP</div>
                    <div class="king-circle card-image">
                        <div class="inner-golden-circle">
                            <img class="sparkle bottom" src="http://127.0.0.1:8000/imgs/icons/sparkle-large.svg" width="24" alt="">
                            <img class="sparkle top" src="http://127.0.0.1:8000/imgs/icons/sparkle-large.svg" width="24" alt="">
                            <img id="circle-profile-pic" src="{{asset('imgs/profile-logo.jpeg')}}" class="pointer img-fluid profile-image-v2 zoom-clicked-img h-100" alt="">
                            <div class="card-level-num">
                                <span>2</span>
                            </div>
                        </div>
                    </div>
                    <div class="card-title">Maren Botosh</div>
                    <div class="card-service border-bg rounded-pill p-1px mb-2">
                        <div class="bg-lightgrey rounded-pill text-white">Services 800</div>
                    </div>
                    <div class="card-gp rounded-pill p-1px">
                        <div class="d-flex align-items-center justify-content-center">
                            <img src="{{asset('imgs/icons/currency-coin.svg')}}" alt="">
                            <div class="text-white">930.00 GP</div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="small-card large-card card purple-white">
                <div class="card-body">
                    <div class="card-level">16 Level - 800 XP</div>
                    <div class="king-circle card-image">
                        <div class="inner-golden-circle">
                            <img class="sparkle bottom" src="http://127.0.0.1:8000/imgs/icons/sparkle-large.svg" width="24" alt="">
                            <img class="sparkle top" src="http://127.0.0.1:8000/imgs/icons/sparkle-large.svg" width="24" alt="">
                            <img id="circle-profile-pic" src="{{asset('imgs/profile-logo.jpeg')}}" class="pointer img-fluid profile-image-v2 zoom-clicked-img h-100" alt="">
                            <div class="card-level-num">
                                <span>3</span>
                            </div>
                        </div>
                    </div>
                    <div class="card-title">Anika Baptista</div>
                    <div class="card-service border-bg rounded-pill p-1px mb-2">
                        <div class="bg-lightgrey rounded-pill text-white">Services 1000</div>
                    </div>
                    <div class="card-gp rounded-pill p-1px">
                        <div class="d-flex align-items-center justify-content-center">
                            <img src="{{asset('imgs/icons/currency-coin.svg')}}" alt="">
                            <div class="text-white">1179.00 GP</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="small-card card blue-white">
                <div class="card-body">
                    <div class="card-level">10 Level - 500 XP</div>
                    <div class="king-circle card-image">
                        <div class="inner-golden-circle">
                            <img class="sparkle bottom" src="http://127.0.0.1:8000/imgs/icons/sparkle-large.svg" width="24" alt="">
                            <img class="sparkle top" src="http://127.0.0.1:8000/imgs/icons/sparkle-large.svg" width="24" alt="">
                            <img id="circle-profile-pic" src="{{asset('imgs/profile-logo.jpeg')}}" class="pointer img-fluid profile-image-v2 zoom-clicked-img h-100" alt="">
                            <div class="card-level-num">
                                <span>3</span>
                            </div>
                        </div>
                    </div>
                    <div class="card-title">Ann Culhane</div>
                    <div class="card-service border-bg rounded-pill p-1px mb-2">
                        <div class="bg-lightgrey rounded-pill text-white">Services 700</div>
                    </div>
                    <div class="card-gp rounded-pill p-1px">
                        <div class="d-flex align-items-center justify-content-center">
                            <img src="{{asset('imgs/icons/currency-coin.svg')}}" alt="">
                            <div class="text-white">840.00 GP</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


{{-- <div class="container-fluid">

    <div class="row">

        <div class="col-md-6">
            <div style="text-align:center;">
                <img src="{{asset('imgs/achievement.svg')}}" alt="" style="height:128px;">
                <h4 class="text-primary" style="font-weight:bold; padding-bottom:10px;  border-bottom:2px dashed var(--color-primary);">Users</h4>
            </div>
            <div style="display:flex; justify-content:center;">
            <ol style="text-align:left;">
                @foreach($users as $user)
                <li>{{$user->name}}</li>
                @endforeach
            </ol>
        </div>
        </div>
        <div class="col-md-6">
            <div style="text-align:center;">
                <img src="{{asset('imgs/achievement.svg')}}" alt="" style="height:128px;">
                <h4 class="text-primary" style="font-weight:bold; padding-bottom:10px; border-bottom:2px dashed var(--color-primary);">Sellers</h4>
            </div>
            <div style="display:flex; justify-content:center;">
            <ol style="text-align:left;">
                @foreach($sellers as $seller)
                <li>{{$seller->name}}</li>
                @endforeach
            </ol>
        </div>
        </div>
    </div>
</div> --}}

@endsection


