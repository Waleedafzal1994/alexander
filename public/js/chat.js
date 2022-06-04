var firstRun = true;
var conversations = {};
var selectedConversation;
var page = 1;
var nextPageExists = false;
var loadedConversationIDs = [];
var lastMessageSenderID, lastMessageSide, currentPage, maxPages;

$(function () {
    fetchMessages();
});

reverseObj = (obj) =>{
    return Object.keys(obj).reverse().reduce((a,key,i)=>{
        a[key] = obj[key];
        return a;
    }, {})
};

function nextPageExistsCheck(response) {
    nextPageExists = response.last_page > page;
    if(nextPageExists) {
        $('#showMore').show();
    } else {
        $('#showMore').hide();
    }
}

$('#showMore').on('click',function() {
    page = page + 1;
    $.ajax({
        type: "GET",
        url: "/messages",
        data: {page:page},
        success: function (response) {
            var response = JSON.parse(response);
            conversations = response.conversations;
            nextPageExistsCheck(conversations);
            conversations.data.forEach(conversation => {
                var HTML = generateConversationHTML(conversation,response['currentUserID']);
                loadedConversationIDs.push(conversation['id']);
                $('#conversations').append(HTML);
            });
        }
    });
});

function fetchMessages(conversationID = null) {
    clearMessages();
    if(conversationID == null) {
        $.ajax({
            type: "GET",
            url: "/messages",
            success: function (response) {
                var response = JSON.parse(response);
                conversations = response.conversations;
                nextPageExistsCheck(conversations);

                conversations.data.forEach(conversation => {
                    var HTML = generateConversationHTML(conversation,response['currentUserID']);
                    loadedConversationIDs.push(conversation['id']);
                    $('#conversations').append(HTML);
                });
            }
        });
    } else {
        $.ajax({
            type: "GET",
            url: "/messages",
            data: {conversation: conversationID},
            success: function (response) {
                var response = JSON.parse(response);
                
                currentPage = response.messages.current_page;
                maxPages = response.messages.last_page;
                moreMessagesCheck(currentPage,maxPages);
                messages = response.messages;
                messages.data.forEach(singleMessage => {
                    var HTML = generateMessageHTML(singleMessage,response['currentUserID']);
                    $('#messages').append(HTML);
                    var objDiv = document.getElementById("messages");
                    objDiv.scrollTop = objDiv.scrollHeight;
                });

                // if there is enough messages, show option to load next page on top

            }
        });
    }
}

function generateConversationHTML(conversation,currentUserId) {
    if(currentUserId == conversation['user_one']['id']) {
        var profilePicture = conversation['user_two']['profile_picture'];
        var userName = conversation['user_two']['name'];
    } else {
        var profilePicture = conversation['user_one']['profile_picture'];
        var userName = conversation['user_one']['name'];

    }
    if (profilePicture == null) {
        profilePicture = '/imgs/avatar.svg';
    }

    var HTML = '';
    HTML+= '<div class="chat_conversation_container" data-id="'+conversation['id']+'">';
    HTML+= '<div class="chat_conversation_avatar_container">';
    HTML+= '<img src="'+profilePicture+'" alt="Photo" class="chat_conversation_avatar"></div>';
    HTML+= '<div class="chat_conversation_user_info_container">';
    HTML+= '<h6>'+userName+' <span class="text-muted"></span></h6>';
    HTML+= '</div>';
    HTML+= '<div id="notifications_'+conversation['id']+'" class="chat-notify-gray">0</div>';
    HTML+= '</div>';
    HTML+= '<hr class="chat_conversation_hr">';
    return HTML;
}


function clearMessages() {
    $('#messages').html('');
    lastMessageSenderID = undefined;
    currentPage = undefined;
    maxPages = undefined;
}


function generateMessageHTML(message, currentUserID) {
    var HTML = '';
    if(message.user_id == null) {
        HTML = '<div style="padding:25px";><div class="alert alert-primary" role="alert"><strong>'+message['message']+'</strong> <small>'+message['created_at']+'</small></div></div>';
        return HTML;
    }
    if(message['user_photo']['profile_picture'] == null) {
        var photo = '/imgs/avatar.svg';
    } else {
        var photo = message['user_photo']['profile_picture'];
    }

    if(message.user_id == currentUserID) {
        // Sending a message - message should be on right
        HTML += '<div class="chat_conversation_message_right_div">';
        HTML += '<div style="width:100%; padding:5px 0;">';
        HTML += '<small class="chat-message-alt">'+message["message"]+'</small>';
        HTML += '<br>';
        HTML += '<small class="text-muted" style="font-size:10px;">'+message["created_at"]+'</small></div>';
        HTML += '<div style="margin-left:10px;">';
        if(message.user_id == lastMessageSenderID) {
            HTML += '<img src="'+photo+'" alt="Photo" style="visibility:hidden;" class="chat_conversation_message_left_div_avatar">';

        } else {
          
            HTML += '<img src="'+photo+'" alt="Photo" class="chat_conversation_message_left_div_avatar">';
        }


    } else {
        // Receiving a message - message should be on left
        HTML += '<div class="chat_conversation_message_left_div">';
        HTML += '<div style="margin-right:10px;">';
        if(message.user_id == lastMessageSenderID) {
            HTML += '<img src="'+photo+'" alt="Photo" style="visibility:hidden;" class="chat_conversation_message_left_div_avatar">';

        } else {
          
            HTML += '<img src="'+photo+'" alt="Photo" class="chat_conversation_message_left_div_avatar">';
        }
        HTML += '</div>';
        HTML += '<div style="width:100%; padding:5px 0;">';
        HTML += '<small class="chat-message">'+message["message"]+'</small>';
        HTML += '<br>';
        HTML += '<small class="text-muted" style="font-size:10px;">'+message["created_at"]+'</small></div>';
        HTML += '</div>';
        HTML += '</div>';
 

    }

    // HTML += '<div>'+message["message"]+'</div>';
    // if loading ????
    
    lastMessageSenderID = message.user_id;
    return HTML;
}




$('body').on('click','.chat_conversation_container',function (e) { 
    e.preventDefault();
    selectConversation(this.dataset.id);
});

function selectConversation(id) {
    selectedConversation = id;
    $('#messages').html('');
    $('#notifications_'+id).addClass('chat-notify-gray');
    $('#notifications_'+id).removeClass('chat-notify-red');
    $('#notifications_'+id).text('0');
    fetchMessages(selectedConversation);
}

$('#sendBtn').on('click',function (e) { 
    e.preventDefault();
    var message = $('textarea[name="message"]').val();
    if(selectedConversation == null || selectedConversation == undefined) {
        return false;
    }
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
        data: {message:message, conversation:selectedConversation},
        success: function (response) {
            if(response.status == 'success') {
                var html = generateMessageHTML(response.message,currentUsersIdAuth);
                $('#messages').append(html);
                $('textarea[name="message"]').val('');
                var objDiv = document.getElementById("messages");
                objDiv.scrollTop = objDiv.scrollHeight;
            } else {
                Swal.fire('An error occured while attempting to send a message.');
            } 
        }
    });
});


function loadOrderChat(orderConversationID) {
    selectedConversation = orderConversationID;
    // lastMessageSide = 'left';
    $('#messages').html('');
    fetchMessages(selectedConversation);
}

$('textarea[name="message"]').on('keydown',function(e){
    if (e.keyCode === 13) {
        // Cancel the default action, if needed
        e.preventDefault();
        // Trigger the button element with a click
        document.getElementById("sendBtn").click();
      }
});


function moreMessagesCheck(currentPage, maxPages) {
    if(Number(currentPage) < Number(maxPages)) {
        $('.old_messages_loader').css('visibility','visible');
    } else {
        $('.old_messages_loader').css('visibility','hidden');
    }
}

$('.old_messages_loader').on('click',function (e) { 
    e.preventDefault();
    $.ajax({
        type: "GET",
        url: "/messages",
        data: {conversation: selectedConversation, page:currentPage+1},
        success: function (response) {
            var response = JSON.parse(response);
            
            currentPage = response.messages.current_page;
            maxPages = response.messages.last_page;
            moreMessagesCheck(currentPage,maxPages);
            messages = response.messages;
            // messages. = reverseObj(messages);
            console.log(typeof messages.data);
            messages.data = messages.data.reverse();
            messages.data.forEach(singleMessage => {
                var HTML = generateMessageHTML(singleMessage,response['currentUserID']);
                $('#messages').prepend(HTML);
                var objDiv = document.getElementById("messages");
                objDiv.scrollTop = objDiv.scrollHeight;
            });


        }
    });
});