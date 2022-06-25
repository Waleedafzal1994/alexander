
<div class="timiline-cards">
    <div class="card bg-transparent mt-2 p-0">
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
                                        <figure>
                                            <img src="/temp-services/images/admin.jpg" alt="">
                                        </figure>
                                        <div class="newpst-input">
                                            <textarea rows="5" name="content" id="post-content" placeholder="Share some what you are thinking?"></textarea>
                                        </div>
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
                        @if ($service->post_count > 0)
                            <div class="loadMore post-box">
                                <!-- {{$service->post_count}} -->
                                @include('services.postSection', [
                                    'posts' => $service->posts->skip(0)->take(5),
                                ])
                            </div>
                        @endif
                        @if ($service->post_count > 5)
                            <div class="text-center">
                                <a href="#" title="" class="showmore-posts underline font-weight-bold" data-post-load_page="1"
                                    data-post-service="{{ $service->id }}">
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
