@extends('layouts.app')

@section('content')

<div class="header-page">
    <div>
        <img src="/imgs/icons/star.svg" alt="" srcset="" style="height:64px;">
    </div>
    <div>
        <h1>Seller Application</h1>
        <p>In order to become a Seller on GamersPlay, you need to provide some additional info.</p>
    </div>
</div>


<div class="container-fluid" style="padding:0 30px;">
    <div class="row">
        <div class="col-md-12">
            @if($application == null)
            <form action="/seller/apply" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="">Please upload an audio recording for verification purposes.</label>
                <br>
                <label for="">This recording will be <strong>public</strong> on your profile.</label>
                <input type="file" class="form-control" id="recorder" required name="file" accept="audio/*" capture>
                <audio id="player" controls style="display:none; margin:10px 0;"></audio>
            </div>
            <button class="btn btn-primary">Submit</button>
            </form>
            @else
            <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
            <div style="display:flex; flex-direction:column; justify-content:center; align-items:center;">
            <lottie-player src="https://assets4.lottiefiles.com/packages/lf20_s9lvjg2e.json"  background="transparent"  speed="1"  style="height:256px;"  loop autoplay></lottie-player>
            <p>Thank you for submitting your application. Your application is under review, please check back later.</p>
        </div>
            @endif
        </div>
    </div>
</div>

<script>
  const recorder = document.getElementById('recorder');
  const player = document.getElementById('player');

  recorder.addEventListener('change', function(e) {
    const file = e.target.files[0];
    const url = URL.createObjectURL(file);
    player.src = url;
    $('#player').show();
  });
</script>

@endsection