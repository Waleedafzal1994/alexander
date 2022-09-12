<div class="card mt-2 p-0">
    <div class="card-body">
        <div class="service-main-body-content">
            <div class="row">
                <div class="col-sm-12">
                
                
                        <div class="post-box">

                           
                            
                            <div class="follower-section">
                                <ul class="nav nav-pills mb-3 pb-3" id="followers-tab" role="tablist">
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
                                                <img src="{{$row->profile_picture}}" class="rounded-circle w-60px" alt="">
                                                <a href="/user-profile/{{ $row->id }}#edit_user_profile/" class="hover-black">{{$row->name}}</a>
                                                <!-- <div class="online">
                                                    <div class="tool-tip">Online</div>
                                                </div> -->
                                                <div class="offline">
                                                    <div class="dash"></div>
                                                    <div class="tool-tip">Offline</div>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <button class="new-btn rounded-pill btn-follower px-4 py-2 mr-2 d-flex justify-content-center loginUserFollows-{{$row->id}} hover-text-change" onclick="loginFollow('<?= $row->id;?>')" id="follow-check">{{ $checkFlow = checkLoginFollows($row->id,Auth::user()->id);}}</button>
                                                <input type="hidden" id="check-follow-toggle" value= "{{$checkFlow}}">
                                                <button class="new-btn rounded-pill btn-solid text-white px-4 py-2 d-flex justify-content-center">Chat</button>
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
                                                <a href="/user-profile/{{ $row->id }}#edit_user_profile/" class="hover-black">{{$row->name}}</a>
                                                <!-- <div class="online">
                                                    <div class="tool-tip">Online</div>
                                                </div> -->
                                                <div class="offline">
                                                    <div class="dash"></div>
                                                    <div class="tool-tip">Offline</div>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <button class="new-btn rounded-pill btn-follower px-4 py-2 mr-2 d-flex justify-content-center hover-text-change loginUserFollows-{{$row->id}}" onclick="loginFollow('<?= $row->id;?>')" id="follow-checks">{{ $checkFlow = checkLoginFollows($row->id,Auth::user()->id);}}</button>
                                                <input type="hidden" id="check-follow-toggles" value= "{{$checkFlow}}">
                                                <button class="new-btn rounded-pill btn-solid text-white px-4 py-2 d-flex justify-content-center">Chat</button>
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

<script type="text/javascript">
    function loginFollow(user_id) {
            // console.log(following_id);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: "/loginfollow",
                data: {
                    'following_id':user_id
                },
                success: function(response) {
                    console.log(response,'Click Response');
                    if (response.status === '1') {
                        $('.loginUserFollows-'+user_id).html(response.msg);
                        document.getElementById("check-follow-toggle").value = response.msg;
                        document.getElementById("check-follow-toggles").value = response.msg;
                    }
                    if (response.error === '1') {
                        Swal.fire(response.msg);
                    }
                },
                error: function(data) {
                    //console.log(data);
                }
            });
        }
        $("#follow-check").hover(function(){
            console.log("H111");
            var follow_check = document.getElementById("follow-check").innerHTML;
            if(follow_check == 'Following'){
                document.getElementById("follow-check").innerHTML = "Unfollow";
            }else{
                document.getElementById("follow-check").innerHTML = "Follow";
            }
            }, function(){
                let follow_status = document.getElementById("check-follow-toggle").value;
                if(follow_status == 'Following'){
                    document.getElementById("follow-check").innerHTML = "Following";
                }else{
                    document.getElementById("follow-check").innerHTML = "Follow";
                }
        });
        $("#follow-checks").hover(function(){
            console.log("H111");
            var follow_check = document.getElementById("follow-checks").innerHTML;
            if(follow_check == 'Following'){
                document.getElementById("follow-checks").innerHTML = "Unfollow";
            }else{
                document.getElementById("follow-checks").innerHTML = "Follow";
            }
            }, function(){
                let follow_status = document.getElementById("check-follow-toggles").value;
                if(follow_status == 'Following'){
                    document.getElementById("follow-checks").innerHTML = "Following";
                }else{
                    document.getElementById("follow-checks").innerHTML = "Follow";
                }
        });  
</script>