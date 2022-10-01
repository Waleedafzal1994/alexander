@extends('layouts.app')
@section('content')

<a href="/news" class="new-btn close-btn bg-white rounded-circle font-weight-bold">X</a>

<div class="container create-post mt-4">
    <div class="row">
        <div class="col-8 mx-auto">
            <h4 class="mb-3">Create a Post</h4>
            <div class="">
                <div class="post-img d-flex">
                    <div class="img">
                       <img src="{{asset('imgs/finish.png')}}" class="mr-3" alt="post-image">
                    </div>
                    <div class="w-100">
                        <div class="my-3">
                            <h5 class="font-weight-bold mb-4 pt-2">Mark zinger burger</h5>
                            <input type="text" class="form-control bg-gradient" name="" placeholder="Please input title" id="">
                        </div>

                        <div class="youtube-section my-5">
                            <h5 class="font-weight-bold mb-4">Youtube Link (Optional)</h5>
                            <input type="text" class="form-control bg-gradient" name="" placeholder="Please input URL" id="">
                        </div>

                        <div class="msg-section">
                            <div class="position-relative">
                                <div class="textArea-body br-10">
                                    <textarea class="textarea content-count" maxlength="500" name="body" rows="8" placeholder="" onkeyup="wordCount(this)" oninput="auto_grow(this)"></textarea>
                                    <button id="emojishow" class="border-0">
                                        <i class="fa-solid fa-face-smile"></i>
                                    </button>
                                    <div class="text-counter">
                                        <span id="wordsCounts" class="counter">0</span>
                                        <span class="fix-count">/500</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="upload-section mt-4 p-4 br-10">
                            <div class="d-flex align-items-center">
                                <div class="form-group mb-0 mr-3">
                                    <input type="file">
                                    <div class="upload-box">
                                        <i class="fa-regular fa-image"></i>
                                    </div>
                                </div>
                                <div class="form-group mb-0">
                                    <input type="file">
                                    <div class="upload-box">
                                        <i class="fa-solid fa-film"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="w-100 d-flex align-items-center justify-content-between hashtag">
                                <div class="form-group w-100 mr-2">
                                    <div class="newdropdown">
                                        <div class="dropdown w-100">
                                            <a id="drop1" href="#" class="dropdown-toggle d-flex align-items-center justify-content-between" data-toggle="dropdown" aria-haspopup="true" role="button" aria-expanded="false">
                                                <div class="game-title" id="drop_down_select_month">Post Type</div>
                                            </a>
                                            <ul class="dropdown-menu dropdown_month" role="menu" aria-labelledby="drop1">
                                                <div class="scroll-div month">
                                                    <li role="presentation" class="active">
                                                        <a role="menuitem" tabindex="-1">
                                                            <div >Highlights</div>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z" fill="#fff"/></svg>
                                                        </a>
                                                    </li>
                                                    <li role="presentation" class="">
                                                        <a role="menuitem" tabindex="-1">
                                                            <div >Selfies</div>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z" fill="#fff"/></svg>
                                                        </a>
                                                    </li>
                                                    <li role="presentation" class="">
                                                        <a role="menuitem" tabindex="-1">
                                                            <div class="">Chit-Chat</div>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z" fill="#fff"/></svg>
                                                        </a>
                                                    </li>
                                                    <li role="presentation" class="">
                                                        <a role="menuitem" tabindex="-1">
                                                            <div class="">Events</div>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z" fill="#fff"/></svg>
                                                        </a>
                                                    </li>
                                                    <li role="presentation" class="">
                                                        <a role="menuitem" tabindex="-1">
                                                            <div class="">Hardware-Gear</div>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z" fill="#fff"/></svg>
                                                        </a>
                                                    </li>
                                                </div>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <div class="post-desc pb-4">
                            <p class="font-weight-bold">All posts made should be in accordance with out <a href="">Communit Guidlines.</a> Violation of these terms could result in account suspension.</p>
                        </div>

                        <hr>

                        <div class="text-right mt-4">
                            <a href="" class="new-btn new-purple-gradient text-white py-2 px-5 rounded-pill">Post</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(function() {
        window.charCount = 0;
        setInterval(function() {
            var c = $(".content-count").val().length;
                if(c != window.charCount) {
                    window.charCount = c;
                    $("#wordsCounts").html(window.charCount); 
                }
            }, 
        500);
    });

    function auto_grow(element) {
        element.style.height = "5px";
        element.style.height = (element.scrollHeight)+"px";
    };

    $('.textarea').focus(function() { 
        $(this).parent().removeClass("inputFocus");
        $(this).parent().addClass("inputFocus");
    }).blur(function(){
        $(this).parent().removeClass("inputFocus");
    });
</script>
@endsection