@extends('layouts.app')
@section('content')
<div class="header-page rounded">
    <div>
        <img src="/imgs/icons/news.png" alt="" srcset="" style="height:64px;">
    </div>
 
    <div>
        <h1>News</h1>
        <p>Here you may find the latest news and posts from the GamersPlay community.</p>
    </div>
</div>
    <div class="container-fluid">
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
    </div>
@endsection

