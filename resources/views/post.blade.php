@extends('layouts.app')
@section('content')
    <div class="container">
        <div style="display:flex; justify-content:center;;">
            <img src="/{{ $post->image }}" alt=""
                style="height:100%; max-height:250px; max-width:100%; object-fit:cover;">
        </div>
        <br>
        <h1 class="rounded"
            style="padding:5px; border-bottom:2px dashed var(--color-secondary); color:white; background:var(--color-secondary); vertical-align:middle;">
            {{ $post->title }}</h1>
        @if ($post->postAuthor != null)
            <h6>by <span style="font-weight:bold;">{{ $post->postAuthor->name }}</span> on
                {{ Carbon\Carbon::parse($post->created_at)->format('d.M.Y.') }} ({{ $post->created_at->diffForHumans() }})
            </h6>
        @endif
        <div class="news-content-box" style="border:1px solid var(--color-secondary);
       box-shadows: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;
            ">
            {!! $post->content !!}
        </div>
    </div>
@endsection
