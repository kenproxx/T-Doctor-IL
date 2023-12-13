@php use Illuminate\Support\Facades\Auth; @endphp

<link href="{{ asset('css/chatmessage.css') }}" rel="stylesheet">

<div id="widget-chat">

    <div id="chat-circle" class="btn btn-raised">
        <div id="chat-overlay"></div>
        <i class="fa-solid fa-message"></i>
    </div>

    <div class="chat-box">
        <div class="chat-box-header">
            {{ __('home.ChatBot') }}
            <span class="chat-box-toggle"><i class="fa-solid fa-x"></i></span>
        </div>
        <div class="chat-box-body">
            <div id="friendslist">
                <div id="friends"></div>
            </div>

            <div id="chatview" class="p1">
                <div id="profile">
                    <div id="close">
                        <i class="fa-solid fa-x"></i>
                    </div>

                    <p></p>
                    <span></span>
                </div>
                <div id="chat-messages"></div>

                <div id="sendmessage">
                    <input type="text" value="Send message..." id="text-chatMessage"/>
                    <button id="send-chatMessage" onclick="sendMessageChatWidget()"></button>
                </div>

            </div>
        </div>

    </div>
</div>


<script>

    let chatUserId;

    let currentId = '{{ Auth::check() ? Auth::user()->id : '' }}';

    let totalMessageUnseen = 0;

    window.Echo.private("messages." + currentId).listen('NewMessage', function (e) {
        renderMessageReceive(e);
        handleSeenMessage();
        calculateTotalMessageUnseen(e);
    });

    function handleSeenMessage() {
        if (!chatUserId) {
            return;
        }

        let url = `{{ route('api.backend.connect.chat.seen-message', ['id' => ':id']) }}`;
        url = url.replace(':id', chatUserId);

        $.ajax({
            url: url,
            type: "GET",
            dataType: "json",

            success: function (data) {
            },
            error: function (e) {
                console.log(e);
            }
        });

    }

    function calculateTotalMessageUnseen(e) {

        if (e.message.from === chatUserId) {
            return;
        }

        totalMessageUnseen++;

        $('#totalMsgUnseen').html(totalMessageUnseen);

        // duyệt class friend, tìm ra div có data-id = e.message.from
        // tăng thêm 1 span.badge
        $(".friend").each(function () {

            if ($(this).data('id') === e.message.from) {
                let countUnseen = $(this).data('msg-unseen');
                countUnseen++;
                $(this).data('msg-unseen', countUnseen);

                $(this).find('span.badge-light').html(countUnseen);
            }

        });
    }

    function genListUserWasConnect(data) {
        let html = '';
        $.each(data, function (index, item) {
            let countUnseen = item.count_unread_message;
            if (countUnseen === 0) {
                countUnseen = '';
            }

            html += `<div class="friend" data-id=${item.id} data-msg-unseen="${item.count_unread_message}">
                        <img src="${item.avt}"/>
                        <p>
                            <strong>${item.name}
                                <span class="badge badge-light text-black">${countUnseen}</span>
                            </strong>
                                <br>
                            <span>${item.email}</span>
                        </p>
                    </div>`;
        });

        $('#friends').html(html);

        setOnclickFriend();
    }

    function renderMessageReceive(element) {
        let html = `<div class="message">
                        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/245657/1_copy.jpg"/>
                        <div class="bubble">
                            ${element.message.text}
                            <div class="corner"></div>
                        </div>
                    </div>`
        $('#chat-messages').append(html);
        autoScrollChatBox();
    }

    function setOnclickFriend() {
        $(".friend").each(function () {
            $(this).click(function () {
                chatUserId = $(this).data('id');
                handleSeenMessage();
                handleStartChat(chatUserId);
                removeSpanBadges(this);

                var childOffset = $(this).offset();
                var parentOffset = $(this).parent().parent().offset();
                var childTop = childOffset.top - parentOffset.top;
                var clone = $(this).find('img').eq(0).clone();
                var top = childTop + 12 + "px";


                setTimeout(function () {
                    $("#profile p").addClass("animate");
                    $("#profile").addClass("animate");
                }, 100);
                setTimeout(function () {
                    $("#chat-messages").addClass("animate");
                }, 150);

                var name = $(this).find("p strong").html();
                var email = $(this).find("p span").html();
                $("#profile p").html(name);
                $("#profile span").html(email);

                $(".message").not(".right").find("img").attr("src", $(clone).attr("src"));
                $('#friendslist').fadeOut();
                $('#chatview').fadeIn();


                $('#close').unbind("click").click(function () {
                    chatUserId = '';
                    $("#chat-messages, #profile, #profile p").removeClass("animate");

                    setTimeout(function () {
                        $('#chatview').fadeOut();
                        $('#friendslist').fadeIn();
                    }, 50);
                });
                autoScrollChatBox();
            });
        });
    }

    function removeSpanBadges(divElement) {
        $(divElement).find('span.badge').html('');

        let countUnseen = $(divElement).data('msg-unseen');

        totalMessageUnseen -= countUnseen;

        if (totalMessageUnseen <= 0) {
            $('#totalMsgUnseen').html('');
        } else {
            $('#totalMsgUnseen').html(totalMessageUnseen);
        }
    }

    // Gắn sự kiện keyup cho input
    $('#text-chatMessage').keypress(function (event) {
        // Kiểm tra xem nút nhấn có phải là Enter (mã 13) hay không
        if (event.keyCode === 13) {
            // Xử lý sự kiện khi nhấn Enter
            sendMessageChatWidget();
        }
    });

    function sendMessageChatWidget() {
        let textChat = $('#text-chatMessage').val();
        if (textChat.trim() == '') {
            return;
        }

        let currentUserId = '{{ Auth::check() ? Auth::user()->id : '' }}';

        $.ajax({
            url: "{{ route('chat.send-message') }}",
            type: "POST",
            dataType: "json",
            data: {
                sender_id: currentUserId,
                receiver_id: chatUserId,
                text: textChat
            },
            success: function (data) {
                renderMessageFromThisUser(textChat);
                afterSendMessageChatWidget();
            },
            error: function (e) {
                console.log(e);
            }
        });
    }

    function renderMessageFromThisUser(textChat) {
        let html = `<div class="message right">
                        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/245657/1_copy.jpg"/>
                        <div class="bubble">
                            ${textChat}
                            <div class="corner"></div>
                        </div>
                    </div>`
        $('#chat-messages').append(html);
    }

    function afterSendMessageChatWidget() {
        $('#text-chatMessage').val('');

        //scroll to bottom
        autoScrollChatBox();
    }

    function autoScrollChatBox() {
        $('#chat-messages').scrollTop($('#chat-messages')[0].scrollHeight);
    }

</script>

<script>
    $(function () {

        $("#chat-circle").click(function () {
            $("#chat-circle").toggle("scale");
            $(".chat-box").toggle("scale");
        });

        $(".chat-box-toggle").click(function () {
            chatUserId = '';
            $("#chat-circle").toggle("scale");
            $(".chat-box").toggle("scale");
        });

    });

    $(document).ready(function () {


        var preloadbg = document.createElement("img");
        preloadbg.src = "https://s3-us-west-2.amazonaws.com/s.cdpn.io/245657/timeline1.png";

        $("#sendmessage input").focus(function () {
            if ($(this).val() == "Send message...") {
                $(this).val("");
            }
        });
        $("#sendmessage input").focusout(function () {
            if ($(this).val() == "") {
                $(this).val("Send message...");

            }
        });

    });

    function handleStartChat(id) {
        getMessage(id);
    }

    async function getMessage(id) {
        let token = `{{ $_COOKIE['accessToken'] ?? '' }}`;
        let accessToken = `Bearer ` + token;

        let url = `{{ route('api.backend.connect.chat.getMessageByUserId', ['id' => ':id']) }}`;
        url = url.replace(':id', id);
        let data = [];

        let result = await fetch(url, {
            method: 'GET',
            headers: {
                'Authorization': accessToken
            },
        })

        if (result.ok) {
            data = await result.json();
            renderMessage(data);
        }
    }

    function renderMessage(data) {
        let html = '';
        let currentUserId = '{{ Auth::check() ? Auth::user()->id : '' }}';
        data.forEach((msg) => {
            let isMySeen = msg.from_user_id === currentUserId ? 'right' : '';

            html += `<div class="message ${isMySeen}">
                        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/245657/1_copy.jpg"/>
                        <div class="bubble">
                            ${msg.chat_message}
                            <div class="corner"></div>
                        </div>
                    </div>`
        });

        document.getElementById('chat-messages').innerHTML = html;
    }

    function getListUserWasConnect() {
        if (!'{{ Auth::check() }}') {
            return;
        }
        $.ajax({
            url: "{{ route('api.backend.connect.chat.getListUserWasConnect') }}",
            type: "GET",
            dataType: "json",
            success: function (data) {
                genListUserWasConnect(data);
                renderTotalMessageUnseen(data);
            },
            error: function (e) {
                console.log(e);
            }
        });
    }

    function renderTotalMessageUnseen(data) {
        if (data.length == 0) {
            return;
        }
        totalMessageUnseen = data[0]['total_unread_message'];

        if (totalMessageUnseen > 0) {
            $('#chat-circle').append(`<span class="badge badge-light text-black" id="totalMsgUnseen">${totalMessageUnseen}</span>`);
        }
    }

    getListUserWasConnect();

</script>

