@extends('layouts.app')

@section('content')


<!-- Modal -->
<div class="modal fade" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Send Message to {{$user->name}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <textarea name="message" id="" cols="5" rows="5"></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="sendBtn">Send</button>
            </div>
        </div>
    </div>
</div>


<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 offset-md-1" id="profile_main_container">
            <div style="min-height:300px; background:white; border-radius:4px;">
                <div class="subheader-page" style="height:120px; border-radius:10px 10px 0 0;">
                    <div>
                        <h1>User Profile</h1>
                    </div>
                </div>
                <div style="display:Flex; align-items:center;" id="profile_column_mobile">
                    <div>
                        @if($user->profile_picture != null)
                        <img src="{{$user->profile_picture}}" class="profile_picture" style="position:relative; bottom:35px; left:10px; border-radius:50%;">
                        @else
                        <img src="{{'/imgs/avatar.svg'}}" class="profile_picture" style="position:relative; bottom:35px; left:10px; border-radius:50%;">
                        @endif
                    </div>
                    <div style="margin-left:20px;">
                        <h3 style="font-weight:bold; margin:0;">{{$user->real_name}}
                        
                        </h3>
                        <p style="color:#3f3f3f;">{{$user->user_title}}
                        </p>
                  
                        <p>
                            @if(Cache::has('user-is-online-' . $user->id))
                                <span class="text-success">Online
                                    @if($user->last_seen != null)
                                   - Last seen {{ \Carbon\Carbon::parse($user->last_seen)->diffForHumans() }}
                                @else
                                    No data
                                @endif

                                </span>
                            @else
                                <span class="text-secondary">Offline</span>
                            @endif
                        </p>
                    </div>
                    
                </div>
                
                <div style="margin-left:150px;">
                  
                </div>
            </div>

            <br>
            <div class="subheader-page rounded-top" style="justify-content:space-between !important;">
                <div>

                    <h5>About Me</h5>
                
                </div>
                @if(Auth::id() == $user->id)
                    
                <a class="btn btn-primary" href="/profile/{{$user->id}}/edit">Edit info</a>
                @endif
            </div>
            <div class="rounded-bottom" style="min-height:280px; background:white; border-radius:10px; padding:10px; overflow:auto;">
            @if(!$user->description)
            <small>This user has no description.</small>
            @else
            <p style="white-space:pre-line; max-height:40vh; overflow:auto;">{{$user->description}}</p>
            @endif

            </div>
            
        </div>
        <div class="col-md-2">
            @if(Auth::id() != $user->id || Auth::user()->user_group == '3')
            <div class="subheader-page rounded-top">
                <div>
                    <h5>Actions</h5>
                </div>
            </div>
            <div  class="rounded-bottom" style="min-height:100px; background:white;  border-radius:10px; padding:10px; margin-bottom:10px;">
              
                
             
               
                @if(Auth::id() != $user->id)
                <a class="btn btn-primary" style="width:100%; margin:5px 0;" href="#" id="messageBtn"> <span class="material-icons" style="vertical-align:middle;">message</span> Message</a>
                @endif
                @if(Auth::user()->user_group == '3')
                <a class="btn btn-primary" style="width:100%; margin:5px 0;" href="/admin/users/{{$user->id}}" id="editBtn"> <span class="material-icons" style="vertical-align:middle;">edit</span> Edit User</a>
                @endif
            </div>
            @endif

            <div class="subheader-page rounded-top">
                <div>
                    <h5>Location</h5>
                </div>
            </div>
            <div class="rounded-bottom" style="min-height:100px; background:white;border-radius:10px; padding:10px; margin-bottom:10px;">
                <p>
                    @php
                    if(file_exists('imgs/flags/'.$user->country.'.png')) {
                        echo "<img src='/imgs/flags/".$user->country.".png' style='height:16px;'>";
                    }
                @endphp
                    {{$user->country}}
                </p>
            </div>


            
            @if($user->instagram_profile || $user->twitch_profile || $user->facebook_profile || $user->discord_handle)

            <div class="subheader-page rounded-top">
                <div>
                    <h5>Connect</h5>
                </div>
            </div>
            <div class="rounded-bottom" style="min-height:150px; background:white; border-radius:10px; padding:10px; margin-bottom:10px;">
                <hr>
                <table>
                
                @if($user->instagram_profile)
                <tr>
                    <th style="padding:2px 5px; ">Instagram</th>
                    <td style="padding:5px;">{{$user->instagram_profile}}</td>
                </tr>
                @endif
                @if($user->twitch_profile)
                <tr>
                    <th style="padding:2px 5px; ">Twitch</th>
                    <td style="padding:5px;">{{$user->twitch_profile}}</td>
                </tr>
                @endif
                @if($user->facebook_profile)
                <tr>
                    <th style="padding:2px 5px; ">Facebook</th>
                    <td style="padding:5px;">{{$user->facebook_profile}}</td>
                </tr>
                @endif
                @if($user->discord_handle)
                <tr>
                    <th style="padding:2px 5px; ">Discord</th>
                    <td style="padding:5px;">{{$user->discord_handle}}</td>
                </tr>
                @endif


                </table>
            </div>
            @endif
     
            @if(isset($user->services) && count($user->services) > 0)
            <br>
            <div class="subheader-page rounded-top">
                <div>
                    <h5>Services</h5>
                </div>
            </div>
            <div class="rounded-bottom" style="min-height:150px; background:white; border-radius:10px; padding:10px; margin-bottom:10px;">
                <div style="max-height:300px; overflow:auto; padding:5px;" id="profile_services_list">
                @foreach($user->services as $service)
                @php
                $service->category->image_1 == null ? $image = '/imgs/services/astronaut.png' : $image = $service->category->image_1;
                @endphp
                {{-- {{dd($service->serviceType->name)}} --}}
                <div class="profile_service_list_item">
                    <a href="/service/{{$service->id}}"><img src="{{$image}}" alt=""></a>
                </div>
                @endforeach
            </div>
            </div>
            @endif
        </div>
    </div>
</div>
    
@endsection

@push('scripts')
<script>
    $('#messageBtn').click(function (e) { 
        e.preventDefault();
        $('#messageModal').modal('show');
    });

    $('#sendBtn').click(function (e) { 
        e.preventDefault();
        var message = $('textarea[name="message"]').val();
        var id = this.dataset.id;
        if(message == "") {
            Swal.fire('','Please enter a message.','error');
            return false;
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "POST",
            url: "/message/send",
            data: {message:message, id:{{$user->id}}},
            success: function (response) {
                if(response.status == 'success') {
                    window.location = '/chat/?conversation=' + response.conversation;
                } else {
                    Swal.fire('An error occured while attempting to send a message.');
                } 
            }
        });
    });
</script>
@endpush