@foreach ($posts as $post)
@if (!empty($post))
<div class="central-meta item post-item-box shadow" style="display: inline-block;" id="post-item-box-{{ $post->id }}">
    <div class="user-post">
        <div class="friend-info">
            <div class="d-flex align-items-center">
                <img src="{{ $post->postAuthor->getProfilePicture() }}" width="80" class="rounded-circle mr-3" alt="">
                <div class="w-100 d-flex align-items-center justify-content-between">
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
                                {{-- <li><i class="fas fa-address-card"></i>Boost
                                            This Post</li>
                                        <li><i class="fas fa-clock"></i>Schedule Post</li>
                                        <li><i class="fab fa-wpexplorer"></i>Select as featured
                                        </li>
                                        <li><i class="fas fa-bell-slash"></i>Turn off
                                            Notifications</li> --}}
                            </ul>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            <div class="post-meta">
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
                                    <textarea name="body" id="commentable_content_{{ $post->id }}" data-post-id="{{ $post->id }}" placeholder="Write a Comment"></textarea>
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
            </div>
        </div>
    </div>
</div>
@endif
@endforeach