@extends('layouts.app')
@section('content')
<div class="header-page rounded">
    <div>
        <img src="/imgs/icons/news.png" alt="" srcset="" style="height:64px;">
    </div>
 
    <div>
        <h1>Posts</h1>
        <p>Here you may find the latest news and posts from the GamersPlay community.</p>
    </div>
</div>
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

    <div class="container post-tabs mt-5 px-0">
        <div class="row">
            <div class="col-4">
                <div class="nav flex-column nav-pills bg-lightgrey shadows rounded-lg mb-4 py-4  br-16" id="v-pills-tab" role="tablist" aria-orientation="vertical">

                    <a class="nav-link active" id="profile-tab" data-toggle="pill" href="#profile" role="tab" aria-controls="profile" aria-selected="true">
                        <img src="{{asset('imgs/posts/profile-icon.svg')}}" alt=""> Profile</a>

                    <a class="nav-link" id="account-tab" data-toggle="pill" href="#account" role="tab" aria-controls="account" aria-selected="false">
                        <img src="{{asset('imgs/posts/account-icon.svg')}}" alt=""> Account</a>

                    <a class="nav-link" id="notification-tab" data-toggle="pill" href="#notification" role="tab" aria-controls="notification" aria-selected="false">
                        <img src="{{asset('imgs/posts/notification-icon.svg')}}" alt=""> Notifications</a>

                    <a class="nav-link" id="imSetting-tab" data-toggle="pill" href="#imSetting" role="tab" aria-controls="imSetting" aria-selected="false">
                        <img src="{{asset('imgs/posts/imsetting-icon.svg')}}" alt=""> IM Settings</a>

                    <a class="nav-link" id="identify-tab" data-toggle="pill" href="#identify" role="tab" aria-controls="identify" aria-selected="false">
                        <img src="{{asset('imgs/posts/identify-icon.svg')}}" alt=""> Identify</a>

                    <a class="nav-link" id="blockList-tab" data-toggle="pill" href="#blockList" role="tab" aria-controls="blockList" aria-selected="false">
                        <img src="{{asset('imgs/posts/blocklist-icon.svg')}}" alt=""> block List</a>
                    
                    <div class="nav-link post-btn text-center mx-4">
                        <a href="/community/post" class="new-btn w-100 d-block py-2 rounded-pill">
                            <img src="{{asset('imgs/posts/logout-icon.svg')}}" alt="">
                            <span> Log Out</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-8">
                <div class="tab-content" id="v-pills-tabContent">
                    
                    <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        Profile Tab
                    </div>
                    <div class="tab-pane fade" id="account" role="tabpanel" aria-labelledby="account-tab">
                        Account Tab
                    </div>
                    <div class="tab-pane fade" id="notification" role="tabpanel" aria-labelledby="notification-tab">
                        Notifications Tab
                    </div>
                    <div class="tab-pane fade" id="imSetting" role="tabpanel" aria-labelledby="imSetting-tab">
                        IM Settings Tab
                    </div>
                    <div class="tab-pane fade" id="identify" role="tabpanel" aria-labelledby="identify-tab">
                        Identify Selfies Tab
                    </div>
                    <div class="tab-pane fade" id="blockList" role="tabpanel" aria-labelledby="blockList-tab">
                        Block List Tab
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

