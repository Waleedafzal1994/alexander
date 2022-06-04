@extends('layouts.app')

@section('content')

<div class="header-page rounded">
    <div>
        <img src="/imgs/icons/rankings.png" alt="" srcset="" style="height:64px;">
    </div>
 
    <div>
        <h1>Rankings</h1>
        <p>Here you may find the top 50 rankings of GamersPlay members & Seller+</p>
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


