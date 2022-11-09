<link rel="stylesheet" href="{{asset('css/emojibuttonlistjs.css')}}">
<style type="text/css">
    .show-less {
        display: none !important;
    }

    .show-less-block {
        display: block !important;
    }
</style>

@if (!empty($posts))
@foreach ($posts as $post)

<!-- @if (!empty($post)) -->
<div class="central-meta item remove-when-timeline-clicked" style="display: inline-block;" id="post-item-box-{{ $post->id }}">

    <div class="user-post">
        <div class="friend-info">

            <div class="w-100">
                <div class="d-flex justify-content-between w-100">
                    <div class="d-flex blue_white">
                        <div class="card border-0 bg-transparent blue_white mr-3">
                            <div class="card-body card-clr p-0">
                                <div class="card-image mr-0">
                                    <div class="img-frame">
                                        <img id="circle-profile-pic" src="{{ $post->postAuthor->getProfilePicture() }}" class="diamond-img rounded-circle" alt="" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex">
                            <div class="d-flex flex-column">
                                <span class="mr-3 font-weight-bold review-profile-heading"><a href="javascrip:void(0);" title="">{{ Str::upper($post->postAuthor->name ?: 'NA') }}</a>
                                    {{-- share <a href="#" title="">link</a> --}}
                                </span>
                                <span class="date-post">
                                    <!-- <i class="fa fa-globe"></i> -->
                                    {{ $post->formatted_created_at }}
                                </span>
                            </div>
                            <div class="title-badge">
                                <img src="{{asset('imgs/icons/blue_badge.svg')}}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="dots-dropdown dropdown">
                        <a class="nav-link dropdown-toggle text-white" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa-solid fa-ellipsis"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#">First Item</a>
                            <a class="dropdown-item" href="#">Second One</a>
                            <a class="dropdown-item" href="#">The last but not the least</a>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-between">
                    @if ($post->user_id == Auth::user()->id)
                    <div class="more">
                        <div class="more-post-optns post-actions" data-post="{{ $post->id }}" data-href="deletePost({{$post->id}})">
                            <i class="fas fa-ellipsis-h"></i>
                            <ul>
                                {{-- <li><i class="fas fa-edit"></i>Edit
                                            Post
                                        </li> --}}


                                <li class="delete-post-action">

                                    <i class="fas fa-trash"></i>Delete Post
                                    <!-- <a href="#" data-href="deletePost({{$post->id}})" data-toggle="modal" data-target="#deletemodal"><i class="fas fa-trash"></i>Delete Post</a> -->

                                </li>
                                {{-- <li class="bad-report"><i class="fa fa-flag"></i>Report
                                            Post</li> --}}
                                {{-- <li>
                                        <i class="fas fa-address-card"></i>Boost
                                            This Post</li>
                                        <li><i class="fas fa-clock"></i>Schedule Post</li>
                                        <li><i class="fab fa-wpexplorer"></i>Select as featured
                                        </li>
                                        <li><i class="fas fa-bell-slash"></i>Turn off
                                            Notifications
                                        </li> --}}
                            </ul>
                        </div>
                    </div>
                    @endif
                </div>

                <!-- New Design -->
                <!-- <div id="carousel-1" class="lightbox mt-4 mb-5 carousel slide" data-ride="carousel" data-interval="false">
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-1" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-1" data-slide-to="1"></li>
                        <li data-target="#carousel-1" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="/imgs/services/astronaut.png" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="/imgs/services/astronaut.png" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="/imgs/services/astronaut.png" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carousel-1" role="button" data-slide="prev">
                        <i class="fa-solid fa-location-arrow prev-icon"></i>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carousel-1" role="button" data-slide="next">
                        <i class="fa-solid fa-location-arrow next-icon"></i>
                        <span class="sr-only">Next</span>
                    </a>
                </div> -->

                <!-- New Design -->

                <!-- This section is for pictures & comment-section and also dynamic -->
                <div class="post-meta mt-3">
                    <div class="description">
                        <p class="">Hello! what you’re looking for?</p>
                    </div>
                    <!-- <div class="row">
                        <p> {!! $post->videoContentHtml() !!}
                        </p>
                    </div> -->
                    <div class="carousel_section">
                        <div class="carousel-row">
                            @php $images = $post->imageContentHtml() @endphp
                            @if(!empty($images) && $images->count()>0)
                            <div id="carousel-{{$post->id}}" class="lightbox mt-4 mb-5 post-carousel carousel slide" data-ride="carousel" data-interval="false">
                                <ol class="carousel-indicators">
                                    @if(!empty($images))
                                    @php $i=0; @endphp
                                    @foreach ($images as $value)
                                    <li data-target="#carousel-{{$post->id}}" data-slide-to="{{$i}}" class="{{$i == 0 ? 'active' :''}}"></li>
                                    @php $i++ @endphp
                                    @endforeach
                                    @endif

                                </ol>
                                <div class="carousel-inner">

                                    @if(!empty($images))
                                    @php $i=0; @endphp
                                    @foreach ($images as $value)

                                    <div class="carousel-item carousel-item-{{$post->id}} {{$i == 0 ? 'active' :''}}">
                                        <img src="{{asset('imgs/carousel-imgs/fortnite-lfg.jpg')}}" class="d-block w-100" alt="">
                                    </div>
                                    @php $i++ @endphp
                                    @endforeach
                                    @endif

                                </div>
                                <a class="carousel-control-prev" href="#carousel-{{$post->id}}" role="button" data-slide="prev">
                                    <i class="fa-solid fa-location-arrow prev-icon"></i>
                                    <span class="sr-only">Previous</span>
                                </a>

                                @if(!empty($images) && count($images) > 1 )
                                <a class="carousel-control-next" href="#carousel-{{$post->id}}" role="button" data-slide="next">
                                    <i class="fa-solid fa-location-arrow next-icon"></i>
                                    <span class="sr-only">Next</span>
                                </a>
                                @endif
                            </div>
                            @endif

                        </div>
                        <div class="we-video-info d-flex justify-content-between align-items-center pt-0">
                            <ul>
                                {{-- <li>
                                        <span class="views" title="views">
                                            <i class="fa fa-eye"></i>
                                            <ins>0</ins>
                                        </span>
                                    </li> --}}
                                <li>
                                    <div class="likes heart post-reaction HeartAnimation {{ $post->userliked() ? 'active-heart' : '' }}" title="Like/Dislike" data-post-id="{{ $post->id }}" data-reaction-id="{{ $post->likedPost() }}">
                                        <!-- <i class="fas fa-heart"></i> -->
                                        <!-- <div class="HeartAnimation"></div> -->
                                        <span class="liked_post_count">{{ shortNumber($post->likes_count) }}</span>
                                    </div>
                                </li>
                                <li>
                                    <span class="comment" title="Comments">
                                        <i class="fa fa-commenting"></i>
                                        <ins id="comment_post_count_{{ $post->id }}">{{ shortNumber($post->comments_count) }}</ins>
                                    </span>
                                </li>

                                {{-- <li><span><a class="share-pst" href="#" title="Share">
                                        <i class="fa fa-share-alt"></i></a><ins>20</ins></span>
                                    </li> --}}
                            </ul>
                            <div class="hashtag">
                                <div class="">#Highlights</div>
                            </div>
                        </div>
                        <!-- <div class="users-thumb-list text-right" id="people-liked-post-{{ $post->id }}">
                            {!! $post->postLikedUserNames() !!}
                        </div> -->
                    </div>
                </div>
                <div class="coment-area ">
                    <ul class="we-comet" id="comment-box_{{ $post->id }}">
                        {!! $post->commentByUsers() !!}

                        <span id="append_comment_{{ $post->id }}"></span>

                        <div class="comment-loader" id="append_less_comment_{{ $post->id }}" style="display: none;">
                            <img src="{{asset('imgs/loader.gif')}}">
                        </div>


                        @if ($post->comments_count > 3)
                        <li>
                            <a href="#" title="" class="showmore text-decoration-none more-comment" data-comment-load_page="1" data-comment-post-id="{{ $post->id }}" id="showmore_{{ $post->id }}">more comments+
                            </a>
                        </li>
                        @endif

                        <li class="show-less show-less-{{ $post->id }}">
                            <a href="#" title="" class="showmore text-decoration-none more-comment" data-comment-load_page="0" data-comment-post-id="{{ $post->id }}" id="showless_{{ $post->id }}">less comments-
                            </a>
                        </li>

                        <li class="post-comment bg-darkgrey br-16 p-3" id="post-comment_form_{{ $post->id }}">
                            <div class="d-flex">
                                <div class="card bg-transparent p-0 border-0">
                                    <div class="card-body card-clr p-0">
                                        <div class="card-image">
                                            <div class="img-frame">
                                                <img src="{{Auth::user()->getProfilePicture()}}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="post-comt-box">
                                    <form method="POST" action="#" id="comment_{{ $post->id }}" data-post-id="{{ $post->id }}">
                                        <div class="position-relative">
                                            <input name="commentable_id" type="hidden" value="{{ $post->id }}" id="commentable_id_{{ $post->id }}">
                                            <div id="post_id" style="display: none;">{{ $post->id }}</div>
                                            <div class="textArea-body">
                                                <textarea class="textarea content-count" maxlength="500" name="body" rows="8" id="commentable_content_{{ $post->id }}" data-post-id="{{ $post->id }}" placeholder="" onkeyup="wordCount(this)" oninput="auto_grow(this)"></textarea>
                                            </div>

                                            <script>
                                                // function wordCount(val) {
                                                //     var len = val.value.length;
                                                //     console.log(len,'Leng')
                                                //     if (len >= 500) {
                                                //         val.value = val.value.substring(0, 500);
                                                //     } else {
                                                //         $('#wordsCounts').text(len);
                                                //     };
                                                // };
                                                $(function() {
                                                    window.charCount = 0;
                                                    setInterval(function() {
                                                        var c = $(".content-count").val().length;
                                                        if (c != window.charCount) {
                                                            window.charCount = c;
                                                            $("#wordsCounts").html(window.charCount);
                                                        }
                                                    }, 500);
                                                });
                                            </script>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mt-3">
                                            <div class="d-flex align-items-center">
                                                <button id="emojishow">
                                                    <i class="fa-solid fa-face-smile"></i>
                                                </button>
                                                <div class="upload-post-img ml-3 position-relative">
                                                    <input type="file">
                                                    <img src="{{asset('imgs/icons/camera-icon.svg')}}" alt="">
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <div class="text-counter mr-12">
                                                    <span id="wordsCounts" class="counter">0</span>
                                                    <span class="fix-count">/500</span>
                                                </div>
                                                <input type="submit" class="nav-link btn-post post-btn-border btn-solid btn-actives save_btn_hover" name="" value="Post">
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- </div> -->
<!-- @endif -->
@endforeach
@endif

<!-- more post data -->
<div class="loader" style="display: none;">
    <img src="/imgs/loader.gif">
</div>
<div class="post-item-box"></div>


<!-- Modal On Delete Post to Show Start Here -->

<!-- <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-close-btn">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-header header-page login-header rounded-top">
                <div class="header-img-modal-login-center custom-set">
                    <img class="img-modal-login-center" src="{{ asset('temp-services/images/newv3.png') }}">
                </div>
            </div>
            <div class="modal-body">
                <div class="swal2-title">Are you sure you want to delete this Post?</div>
                <div class="swal2-html-container">You will not be able to recover this post!</div>
                <div class="swal2-actions d-flex align-items-center justify-content-end">
                    <button class="btn swal2-confirm swal2-styled">OK</button>
                    <button class="btn swal2-cancel swal2-styled">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div> -->

<!-- Modal On Delete Post to Show End Here -->


<!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"/> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"> </script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="{{asset('js/emojibuttonlistjs.js')}}"></script>
<script>
    $(document).ready(function() {
        $(".HeartAnimation").click(function() {
            $(this).toggleClass("animate");
        });
        let post_id = document.getElementById("post_id").innerText;
        // $("#emojishow").click(function(){
        // let post_id = document.querySelector('input').value;
        // let post_id = document.getElementById("commentable_id").value;
        // console.log(post_id,'POST ID');
        var margin = 10,
            instance1 = new emojiButtonList("emojishow", {
                dropDownXAlign: "left",
                textBoxID: "commentable_content_" + post_id,
                yAlignMargin: margin,
                xAlignMargin: margin
            });

        function emojiClickEvent(emojiText) {
            document.title += " " + emojiText;
        }
        // })
        //show comment//
        $('.comment').off().on('click', function(e) {
            e.stopImmediatePropagation();
            $(this).parents(".post-meta").siblings(".coment-area").slideToggle("slow");
        });
        // When strating hide prev arrow
        $('.carousel-control-prev').hide();

        jQuery(".post-comt-box form").on("submit", function(event) {
            event.preventDefault();
            event.stopImmediatePropagation();
            let comment = jQuery(this).find('textarea').val();
            let post_id = jQuery(this).attr("data-post-id");

            if (!post_id) {
                return false;
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: "/post/comment",
                data: $('#' + jQuery(this).attr("id")).serialize(),
                success: function(response) {
                    if (response.status === true && response.code === 200) {
                        let parent = jQuery("#post-comment_form_" + post_id).parent(
                            "li");
                        let comment_HTML = response.data;
                        // $("#comment-box_" + post_id).prepend(comment_HTML);

                        if (response.count == 1) {

                            $("#append_comment_" + post_id).append(comment_HTML);

                        } else if ($("#comment-box_" + post_id).first().length > 0) {

                            $(".comment-section_" + post_id).last().after(response.data);
                        } else {
                            $("#append_comment_" + post_id).append(comment_HTML);
                        }

                        // $("#append_comment_" + post_id).append(comment_HTML);
                        // $(comment_HTML).insertBefore("#post-comment_form_" + post_id);
                        $("#commentable_content_" + post_id).val("");
                        $("#comment_post_count_" + post_id).text(response.count);
                    }
                },

                error: function(data) {
                    data?.responseJSON?.error?.error ? $.notify(data.responseJSON.error
                        .error, "error") : ""
                    data?.responseJSON?.message ? $.notify(data.responseJSON.message, "error") :
                        ""
                    jQuery(this).find('textarea').val(' ');
                }
            });

        });

        // Emoji textarea content start //
        // var margin = 10,
        //     instance1 = new emojiButtonList( "emojishow", {
        //         dropDownXAlign: "left",
        //         textBoxID: "emojitext",
        //         yAlignMargin: margin,
        //         xAlignMargin: margin
        //     } )

        // function emojiClickEvent( emojiText ) {
        //     document.title += " " + emojiText;
        // }
        // Emoji textarea content end //


        $('#add-blog-post-form').submit(function(e) {

            e.preventDefault();
            let i = 1;
            $("#create-post-btn").attr('disabled', true);
            $("#create-post-btn").text("Posting");
            let formDataAddPost = new FormData($('#add-blog-post-form')[0]);
            console.log(...formDataAddPost);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                beforeSend: function() {
                    $('.add-post-progress-bar').html(
                        '<div class="progress"><div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div></div>'
                    );
                    setTimeout(function() {
                        $('.progress-bar').animate({
                            width: i + "%"
                        }, 100);
                    }, 10);
                    i = i + Math.floor(Math.random() * 100);
                },
                type: 'POST',
                url: "/create/post",
                data: formDataAddPost,
                cache: false,
                processData: false,
                contentType: false,
                success: (data) => {
                    console.log("success", data);
                    $('.progress-bar').addClass("bg-success")
                    $('.progress-bar').animate({
                        width: "100%",
                    }, 1);
                    $("#create-post-btn").attr('disabled', false);
                    $("#create-post-btn").text("Post");
                    setTimeout(function() {
                        window.location.reload();
                    }, 1000);
                },
                error: function(data) {
                    console.log("error", data);
                    $('.progress-bar').addClass("bg-danger")
                    $('.progress-bar').animate({
                        width: "100%"
                    }, 1);
                    $("#create-post-btn").attr('disabled', false);
                    $("#create-post-btn").text("Post");

                    data?.responseJSON?.error?.error ? $.notify(data.responseJSON.error
                        .error, "error") : ""
                    data?.responseJSON?.message ? $.notify(data.responseJSON.message, "error") :
                        ""
                    setTimeout(function() {
                        window.location.reload();
                    }, 1000);
                }
            });
            // this.submit();
        });


    });

    // Textarea
    function auto_grow(element) {
        element.style.height = "5px";
        element.style.height = (element.scrollHeight) + "px";
    };

    $('.textarea').focus(function() {
        $(this).parent().removeClass("inputFocus");
        $(this).parent().addClass("inputFocus");
    }).blur(function() {
        $(this).parent().removeClass("inputFocus");
    });

    // function countCount(val) {
    //         console.log(val,'Hello');
    //         var len = val.value.length;
    //         if (len >= 500) {
    //             val.value = val.value.substring(0, 500);
    //         } else {
    //             $('#charCounts').text(500 - len);
    //         }
    //     };


    $('.post-carousel').on('slide.bs.carousel', function(e) {

        // var slidingItemsAsIndex = $('.carousel-item').length - 1;
        var slidingItemsAsIndex = $(this).find('.carousel-item').length - 1;

        // If last item hide next arrow
        if ($(e.relatedTarget).index() == slidingItemsAsIndex) {

            $(this).find('.carousel-control-next').hide();
        } else {
            $(this).find('.carousel-control-next').show();
        }

        // If first item hide prev arrow
        if ($(e.relatedTarget).index() == 0) {
            $(this).find('.carousel-control-prev').hide();
        } else {
            $(this).find('.carousel-control-prev').show();
        }

    })
</script>










<!-- Owl Carousel -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js"></script> -->

<!-- Owl Carousel -->
<script>
    // Owl Carousel
    // $(".owl-carousel").owlCarousel();

    // $('.owl-carousel').owlCarousel({
    //     loop:false,
    //     margin:10,
    //     nav:true,
    //     responsive:{
    //         0:{
    //             items:1
    //         },
    //         600:{
    //             items:3
    //         },
    //         1000:{
    //             items:50
    //         }
    //     }
    // });
</script>