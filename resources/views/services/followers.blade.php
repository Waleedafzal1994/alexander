<div class="card mt-2 p-0">
    <div class="card-body">
        <div class="service-main-body-content">
            <div class="row">
                <div class="col-sm-12">
                
                
                        <div class="post-box">

                           
                            
                            <div class="follower-section">
                                <ul class="nav nav-pills mb-3 pb-3 border-bottom" id="followers-tab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" id="pills-follower-tab" data-toggle="pill" href="#pills-follower" role="tab" aria-controls="pills-follower" aria-selected="true">Followers ({{!empty($followersList) ? count($followersList) : 0}})</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="pills-following-tab" data-toggle="pill" href="#pills-following" role="tab" aria-controls="pills-following" aria-selected="false">Following ({{!empty($followingList) ? count($followingList) : 0}})</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="followers-tabContent">
                                    <div class="tab-pane fade show active" id="pills-follower" role="tabpanel" aria-labelledby="pills-follower-tab">
                                        @if (!empty($followersList))
                                        @foreach ($followersList as $row)
                                        <div class="d-flex align-items-center justify-content-between mb-4">
                                            <div class="follower-img d-flex align-items-center">
                                                <img src="{{$row->profile_picture}}" class="rounded-circle" width="80" alt="">
                                                <p class="text-black">{{$row->name.'-'.$row->id}}</p>
                                                <!-- <div class="online">
                                                    <div class="tool-tip">Online</div>
                                                </div> -->
                                                <div class="offline">
                                                    <div class="dash"></div>
                                                    <div class="tool-tip">Offline</div>
                                                </div>
                                            </div>
                                            <div class="">
                                                <button class="new-btn btn-primary mr-3 follow">{{ !empty($checkFollow) ? 'Following' : 'Follow' }}</button>
                                                <button class="new-btn btn-primary">Chat</button>
                                            </div>
                                        </div>
                                        @endforeach    
                                        @endif  
                                   
                                    </div>
                                    <div class="tab-pane fade" id="pills-following" role="tabpanel" aria-labelledby="pills-following-tab">
                                        @if (!empty($followingList))
                                        @foreach ($followingList as $row)
                                        <div class="d-flex align-items-center justify-content-between mb-4">
                                            <div class="follower-img d-flex align-items-center">
                                                <img src="{{$row->profile_picture}}" class="rounded-circle" width="80" alt="">
                                                <p class="text-black">{{$row->name.'-'.$row->id}}</p>
                                                <!-- <div class="online">
                                                    <div class="tool-tip">Online</div>
                                                </div> -->
                                                <div class="offline">
                                                    <div class="dash"></div>
                                                    <div class="tool-tip">Offline</div>
                                                </div>
                                            </div>
                                            <div class="">
                                                <button class="new-btn btn-primary mr-3 follow">Follow</button>
                                                <button class="new-btn btn-primary">Chat</button>
                                            </div>
                                        </div>
                                        @endforeach    
                                        @endif  
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                     
                </div>
            </div>
        </div>
    </div>
</div>
