@extends('layouts.app')
@section('style')
<link rel="stylesheet" href="{{asset('css/chat.css')}}">
@endsection
@section('content')
<div class="container-fluid">

  {{-- // Conversations, Search --}}
  <div style="display:flex; flex-direction:row; justify-content:space-between; padding:0px;">
    <div style="background:white; border-radius:2px; border:1px solid rgba(0,0,0,0.2);  min-height:600px; width:40%; margin:0 10px;">
      <div style="display:flex; justify-content:space-between; align-items:center; padding:5px; height:50px;">
          <h4 style="margin:0; padding:0;">Chat</h4>
          <input type="text" class="search-input-chat" placeholder="Search" style="visibility:hidden; max-width:50% !important; border-radius:40px;">
      </div>
      <hr style="margin:0; padding:0; border-bottom:1px solid rgba(0,0,0,0.3) !important;">

      <div id="conversations" style="display:flex; max-height:550px; overflow:auto; flex-direction:column;">

    </div>

    <div id="showMore" style="display:none; position:relative; bottom: 0; text-align:center; background:#ccc; cursor:pointer;">Load More</div>
    </div>



    {{-- Current active window --}}
    <div style="background:white; border-radius:2px; border:1px solid rgba(0,0,0,0.2);min-height:600px; width:95%;">

      {{-- User Info --}}
      <div style="display:flex; justify-content:space-between; background:rgba(0,0,0,0.03); border-radius:0px; width:100%; padding:10px; height:60px;">
        <div style="margin-right:10px;">
          <img src="{{asset('/imgs/avatar.svg')}}" alt="Photo" style="height:40px; object-fit:cover; width:40px; border:2px solid transparent;">
        </div>
        <div style="width:100%; padding:5px 0;">
        <h6>Chat <span style="float:right;" class="material-icons">more_horiz</span></h6>
        </div>
      </div>
      <hr style="margin:0; padding:0;">

      <div class="old_messages_loader">Click to load older messages</div>

      <div id="messages" style="min-height:380px; max-height:380px; overflow:auto; margin-top:5px;">




  


    </div>


    {{-- Send Message --}}
    <hr>
    <div style="display:flex; padding:15px;">
      <textarea name="message" id="" rows="2" style=""></textarea>
      <div style="margin-left:15px;">
        <button class="btn btn-primary" id="sendBtn" style="border-radius:10px;"><span class="material-icons" style="vertical-align:middle; font-size:24px !important;">send</span></button>
      </div>
    </div>

    </div>

  </div>



</div>

@endsection

@push('scripts')
<script>
  var currentUsersIdAuth = {{Auth::id()}};
</script>
<script src="{{asset('/js/chat.js')}}"></script>

<script>
  $(document).ready(function () {
    var channel_id = 'user.{{Auth::id()}}';
  Echo.private(channel_id)
    .listen('.userEvent', (e) => {
      console.log(e);
      // check if currently selected conversation is with this user, otherwise do nothing
      if(e.data.conversation_id == selectedConversation) {
        var html = generateMessageHTML(e.data,currentUsersIdAuth);
        $('#messages').append(html);
        var objDiv = document.getElementById("messages");
        objDiv.scrollTop = objDiv.scrollHeight;
      } else {
        // to-do: add notification to conversation if it exists
        $('#notifications_'+e.data.conversation_id).removeClass('chat-notify-gray');
        $('#notifications_'+e.data.conversation_id).addClass('chat-notify-red');
        var messagesCounter = $('#notifications_'+e.data.conversation_id).text();
        $('#notifications_'+e.data.conversation_id).text(Number(messagesCounter)+1);
      }

      if(!loadedConversationIDs.includes(Number(e.data.conversation_id))) {
        $.ajax({
          type: "GET",
          url: "/messages/fetch/new",
          data: {id: e.data.conversation_id},
          success: function (response) {
            var HTML = generateConversationHTML(JSON.parse(response),currentUsersIdAuth);
                    $('#conversations').prepend(HTML);
                    loadedConversationIDs.push(e.data.conversation_id);
          }
        });
                  
      }

    });
  });


</script>


@endpush



