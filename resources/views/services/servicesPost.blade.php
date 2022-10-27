<div class="timiline-cards">
    <div class="bg-transparent mt-2 p-0">
        <div class="card-body bg-transparent p-0">
            <div class="service-main-body-content">
                <div class="row">
                    <div class="col-sm-12">
                        <!-- START: Create Post -->
                        @if ($service->user->id == Auth::user()->id)
                            <div class="central-meta postbox">
                                <span class="create-post">Create post</span>
                                <form name="add-blog-post-form" id="add-blog-post-form" method="post"
                                    enctype="multipart/form-data" action="javascript:void(0)">
                                    @csrf
                                    <input type="hidden" name="service_id" value="{{ $service->id }}">
                                    <input type="hidden" name="url" value="">
                                    <div class="new-postbox">
                                        <div class="d-flex">
                                            <figure class="mr-2">
                                                <img src="/temp-services/images/admin.jpg" alt="">
                                            </figure>
                                            <!-- <div class="newpst-input">
                                                <textarea rows="5" name="content" id="post-content" placeholder="Share some what you are thinking?"></textarea>
                                            </div> -->
                                            <div class="textArea-body">
                                                <textarea type="text" maxlength="500" name="content" id="post-content" placeholder="Share some what you are thinking?" 
                                                class="textarea content-counts"  oninput="auto_grow(this)"
                                                    rows="3"></textarea>
                                                    <div class="text-counter">
                                                        <span id="charCount" class="counter">0</span>
                                                        <span class="fix-count">/500</span>
                                                    </div>
                                            </div>
                                        </div>
                                        
                                        <script>
                                            // function postCount(val) {
                                            //     var len = val.value.length;
                                            //     if (len >= 500) {
                                            //         val.value = val.value.substring(0, 500);
                                            //     } else {
                                            //         $('#charCount').text(len);
                                            //     };
                                            // };
                                            $(function() {
                                                window.charCount = 0;
                                                setInterval(function() {
                                                    var c = $(".content-counts").val().length;
                                                    if(c != window.charCount) {
                                                        window.charCount = c;
                                                        $("#charCount").html(window.charCount); 
                                                    }
                                                    }, 500);
                                            });
                                        </script>
                                        <div class="row" id="videoObject"></div>
                                        <div class="row">
                                            <div id="image-holder"></div>
                                        </div>
                                        <div class="attachments">
                                            <ul>
                                                <li>
                                                    <i class="fa fa-image"></i>
                                                    <label class="fileContainer">
                                                        <input type="file" id="publisher-photos"
                                                            accept="image/x-png, image/gif, image/jpeg" name="postPhotos[]"
                                                            multiple="multiple">
                                                    </label>
                                                    <span id="postphotos_error"></span>
                                                </li>
                                            </ul>
                                            <button id="create-post-btn" class="post-btn" type="submit"
                                                data-ripple="">Post
                                            </button>
                                            <div class="add-post-progress-bar"></div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        @endif
                        <!-- END: Create post -->
                        @if ($service->user->post_count >= 0)
                            <div class="loadMore post-box">
                                <!-- {{$service->post_count}} -->
                                @include('services.postSection', [
                                    'posts' => $service->posts->skip(0)->take(5),
                                ])
                            </div>
                        @endif
                        @if ($service->user->post_count > 5)
                            <div class="text-center">
                                <a href="#" title="" class="showmore-posts underline font-weight-bold" data-post-load_page="1"
                                    data-post-service="{{ $service->user->id }}">
                                    <!-- more posts+ -->
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<script>
    // Textarea
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
</script>