<div class="card mt-2 p-0">
    <div class="card-body">
        <div class="service-main-body-content">
            <div class="row">
                <div class="col-sm-12">
                
                @if (!empty($followingList))
                    @foreach ($followingList as $row)
                        <div class="post-box">
                            <div class="central-meta item post-item-box" style="display: inline-block;" id="post-item-box-1">
                                <div class="user-post">
                                    <div class="friend-info">

                                    
                                                <figure>
                                                    <img src="{{$row->profile_picture}}" alt="">
                                                </figure>
                                                <div class="friend-name">
                                                
                                                    <ins>
                                                        <a href="/user-profile/{{ $row->id }}#edit_user_profile/">{{$row->name}}</a>
                                                    </ins>
                                                </div>
                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                    @endforeach    
                @endif   
                </div>
            </div>
        </div>
    </div>
</div>
