@extends('layouts.app')

@section('content')
<br>
    <div class="container">
        <h4>Welcome, {{Auth::user()->name}}.</h4>
        <div class="row">
            <div class="col-md-2">
            @foreach($conversations as $conversation)
            @endforeach
            </div>
            <div class="col-md-10">

            </div>
        </div>
    </div>
@endsection