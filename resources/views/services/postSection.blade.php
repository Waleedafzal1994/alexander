@foreach ($posts as $post)
@if (!empty($post))
<div class="central-meta item post-item-box shadow" style="display: inline-block;" id="post-item-box-{{ $post->id }}">
    <div class="user-post">
        <div class="friend-info">
            <div class="d-flex">
                <img src="{{ $post->postAuthor->getProfilePicture() }}" style="height:80px;" width="80" class="rounded-circle mr-3" alt="">
                <div class="w-100 d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                        <div class="d-flex flex-column w-100">
                            <div class="d-flex align-items-center justify-content-between mt-3">
                                <div class="d-flex align-items-center">
                                    <span class="mr-3 font-weight-bold review-profile-heading"><a href="time-line.html" title="">{{ Str::upper($post->postAuthor->name ?: 'NA') }}</a>
                                        {{-- share <a href="#" title="">link</a> --}}
                                    </span>
                                    <span class="text-black">
                                        <!-- <i class="fa fa-globe"></i> -->
                                        {{ $post->formatted_created_at }}
                                    </span>
                                </div>
                                @if ($post->user_id == Auth::user()->id)
                                <div class="more">
                                    <div class="more-post-optns post-actions" data-post="{{ $post->id }}">
                                        <i class="fas fa-ellipsis-h"></i>
                                        <ul>
                                            {{-- <li><i class="fas fa-edit"></i>Edit
                                                        Post
                                                    </li> --}}
                                            <li class="delete-post-action"><i class="fas fa-trash"></i>Delete
                                                Post
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

                            <!-- This section is for pictures & comment-section and also dynamic -->
                            <!-- <div class="post-meta mt-3">
                                <div class="description">
                                    <p class="text-black">{!! $post->content !!}</p>
                                </div>
                                <div class="row">
                                    <p> {!! $post->videoContentHtml() !!}
                                    </p>
                                </div>
                                <div class="row">
                                    <p> {!! $post->imageContentHtml() !!}
                                    </p>
                                </div>
                                <div class="we-video-info">
                                    <ul>
                                        {{-- <li>
                                                <span class="views" title="views">
                                                    <i class="fa fa-eye"></i>
                                                    <ins>0</ins>
                                                </span>
                                            </li> --}}
                                        <li>
                                            <div class="likes heart post-reaction {{ $post->userliked() ? 'active-heart' : '' }}" title="Like/Dislike" data-post-id="{{ $post->id }}" data-reaction-id="{{ $post->likedPost() }}">
                                                <i class="fas fa-heart"></i>
                                                <span class="liked_post_count">{{ $post->likes_count }}</span>
                                            </div>
                                        </li>
                                        <li>
                                            <span class="comment" title="Comments">
                                                <i class="fa fa-commenting"></i>
                                                <ins id="comment_post_count_{{ $post->id }}">{{ $post->comments_count }}</ins>
                                            </span>
                                        </li>

                                        {{-- <li><span><a class="share-pst"
                                                                                href="#" title="Share"><i
                                                                                    class="fa fa-share-alt"></i></a><ins>20</ins></span>
                                                                            </li> --}}
                                    </ul>
                                    <div class="users-thumb-list" id="people-liked-post-{{ $post->id }}">
                                        {!! $post->postLikedUserNames() !!}
                                    </div>
                                </div>
                            </div>
                            <div class="coment-area ">
                                <ul class="we-comet" id="comment-box_{{ $post->id }}">
                                    {!! $post->commentByUsers() !!}
                                    @if ($post->comments_count > 3)
                                    <li>
                                        <a href="#" title="" class="showmore underline" data-comment-load_page="1" data-comment-post-id="{{ $post->id }}" id="showmore_{{ $post->id }}">more comments+
                                        </a>
                                    </li>
                                    @endif

                                    <li class="post-comment" id="post-comment_form_{{ $post->id }}">
                                        <div class="d-flex">
                                            <div class="comet-avatar">
                                                <img width="80" src="{{Auth::user()->getProfilePicture()}}" alt="">
                                            </div>
                                            <div class="post-comt-box">
                                                <form method="POST" action="#" id="comment_{{ $post->id }}" data-post-id="{{ $post->id }}">
                                                    <input name="commentable_id" type="hidden" value="{{ $post->id }}" id="commentable_id_{{ $post->id }}">
                                                    <textarea name="body" rows="8" id="commentable_content_{{ $post->id }}" data-post-id="{{ $post->id }}" placeholder="Write a Comment"></textarea>
                                                    {{-- <div class="add-smiles">
                                                            <div class="uploadimage">
                                                                <i class="fa fa-image"></i>
                                                                <label class="fileContainer">
                                                                    <input type="file">
                                                                </label>
                                                            </div>
                                                            <span class="em em-expressionless"
                                                                title="add icon"></span>
                                                            <div class="smiles-bunch">
                                                                <i class="em em---1"></i>
                                                                <i class="em em-smiley"></i>
                                                                <i class="em em-anguished"></i>
                                                                <i class="em em-laughing"></i>
                                                                <i class="em em-angry"></i>
                                                                <i class="em em-astonished"></i>
                                                                <i class="em em-blush"></i>
                                                                <i class="em em-disappointed"></i>
                                                                <i class="em em-worried"></i>
                                                                <i class="em em-kissing_heart"></i>
                                                                <i class="em em-rage"></i>
                                                                <i class="em em-stuck_out_tongue"></i>
                                                            </div>
                                                    </div> --}}

                                                    {{-- <button type="submit"></button> --}}
                                                </form>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div> -->

                            <div id="carousel-1" class="lightbox mt-4 mb-5 carousel slide" data-ride="carousel" data-interval="false">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endforeach
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>        
<script>
$(document).ready(function(){
  // When strating hide prev arrow
  $('.carousel-control-prev').hide();
});



$('#carousel-1').on('slide.bs.carousel', function (e) {

  var slidingItemsAsIndex = $('.carousel-item').length - 1;

  // If last item hide next arrow
  if($(e.relatedTarget).index() == slidingItemsAsIndex ){
      $('.carousel-control-next').hide();
  }
  else{
      $('.carousel-control-next').show();
  }

  // If first item hide prev arrow
  if($(e.relatedTarget).index() == 0){
      $('.carousel-control-prev').hide();
    }
  else{
      $('.carousel-control-prev').show();
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