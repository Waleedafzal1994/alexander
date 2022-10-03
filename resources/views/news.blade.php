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
                    <a href="/news/{{$post->id}}">
                        <div class="news-article-image" style="background:url('{{$post->image}}'); width:100%; height:150px; background-position:center; background-size:cover; border-radius:16px;"></div>
                    </a>
                </div>
                <div class="col-md-9">
                    <h4 style="margin:0; padding:0;"><a href="/news/{{$post->id}}">{{$post->title}}</a></h4>
                    @if($post->postAuthor != null)
                    <p style="padding-bottom:10px; border-bottom:1px solid var(--color-secondary);">by <span style="font-weight:bold;">{{$post->postAuthor->name}}</span></p>
                    @endif
                   
                    {!! substr(strip_tags($post->content,'<br>'),0,150) !!}...
                    {{-- <a href="/news/{{$post->id}}" class="btn button-primary">Read more</a> --}}
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
                <div class="nav flex-column nav-pills bg-white shadows rounded-lg mb-4 py-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">

                    <a class="nav-link active" id="following-tab" data-toggle="pill" href="#following" role="tab" aria-controls="following" aria-selected="true"><i class="fa-solid fa-user-group"></i> Following</a>

                    <a class="nav-link" id="official-tab" data-toggle="pill" href="#official" role="tab" aria-controls="official" aria-selected="false"><i class="fa-brands fa-squarespace"></i> Official</a>

                    <a class="nav-link" id="highlights-tab" data-toggle="pill" href="#highlights" role="tab" aria-controls="highlights" aria-selected="false"><i class="fa-solid fa-wand-magic-sparkles"></i> Highlights</a>

                    <a class="nav-link" id="chitchat-tab" data-toggle="pill" href="#chitchat" role="tab" aria-controls="chitchat" aria-selected="false"><i class="fa-regular fa-comments"></i> Chit-Chat</a>

                    <a class="nav-link" id="newcomer-tab" data-toggle="pill" href="#newcomer" role="tab" aria-controls="newcomer" aria-selected="false"><i class="fa-solid fa-camera"></i> Newcomer Selfies</a>

                    <a class="nav-link" id="gears-tab" data-toggle="pill" href="#gears" role="tab" aria-controls="gears" aria-selected="false"><i class="fa-solid fa-gamepad"></i> Gears</a>
                </div>
                <div class="post-btn text-center">
                    <a href="/community/post" class="new-btn w-100 d-block new-purple-gradient text-white py-2 rounded-pill">Post</a>
                </div>
            </div>
            <div class="col-8">
                <div class="tab-content" id="v-pills-tabContent">
                    
                    <div class="tab-pane fade show active" id="following" role="tabpanel" aria-labelledby="following-tab">
                        Following Tab
                    </div>
                    <div class="tab-pane fade" id="official" role="tabpanel" aria-labelledby="official-tab">
                        Official Tab
                    </div>
                    <div class="tab-pane fade" id="highlights" role="tabpanel" aria-labelledby="highlights-tab">
                        Highlights Tab
                    </div>
                    <div class="tab-pane fade" id="chitchat" role="tabpanel" aria-labelledby="chitchat-tab">
                        Chit-Chat Tab
                    </div>
                    <div class="tab-pane fade" id="newcomer" role="tabpanel" aria-labelledby="newcomer-tab">
                        NewComer Selfies Tab
                    </div>
                    <div class="tab-pane fade" id="gears" role="tabpanel" aria-labelledby="gears-tab">
                        Grears Tab
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

