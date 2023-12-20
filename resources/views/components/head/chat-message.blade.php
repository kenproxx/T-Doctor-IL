@php use Illuminate\Support\Facades\Auth; @endphp

<link href="{{ asset('css/chatmessage.css') }}" rel="stylesheet">

<div id="widget-chat">

    <div id="chat-circle" class="btn btn-raised">
        <div id="chat-overlay"></div>
        <i class="fa-solid fa-message"></i>
    </div>

    <div class="chat-box">
        <div class="chat-box-header">
            <span class="chat-box-toggle"><i class="fa-solid fa-x"></i></span>
        </div>
        <div class="chat-box-body">

            <ul class="nav nav-tabs" role="tablist" id="chat-widget-navbar">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="chat-widget-all-online" data-toggle="tab"
                            data-target="#chat-widget-all-online-tabs" type="button" role="tab" aria-controls="home"
                            aria-selected="true">Đang online
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="chat-widget-connected" data-toggle="tab"
                            data-target="#chat-widget-connected-tabs" type="button" role="tab" aria-controls="profile"
                            aria-selected="false">Đã connect
                    </button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="chat-widget-all-online-tabs" role="tabpanel"
                     aria-labelledby="chat-widget-all-online">
                    <div id="friendslist-all-online">
                        <div id="friends-all-online"></div>
                    </div>
                </div>
                <div class="tab-pane fade" id="chat-widget-connected-tabs" role="tabpanel"
                     aria-labelledby="chat-widget-connected">
                    <div id="friendslist-connected">
                        <div id="friends-connected"></div>
                    </div>
                </div>

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

<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/laravel-echo@1.11.2/dist/echo.iife.js"></script>

<script>

    const CHAT_TYPE_ALL_ONLINE = 'all-online';
    const CHAT_TYPE_CONNECTED = 'connected';

    let chatUserId;
    let isShowOpenWidget;

    let currentUserIdChat = '{{ Auth::check() ? Auth::user()->id : '' }}';

    let totalMessageUnseen = 0;

    window.Echo = new Echo({
        broadcaster: 'pusher',
        key: 'e700f994f98dbb41ea9f',
        cluster: 'eu',
        encrypted: true,
    });

    window.Echo.private("messages." + currentUserIdChat).listen('NewMessage', function (e) {
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

        if (isShowOpenWidget) {
            return;
        }

        totalMessageUnseen++;

        $('#totalMsgUnseen').html(totalMessageUnseen);

        // duyệt class friend, tìm ra div có data-id = e.message.from
        // tăng thêm 1 span.badge
        $("#friendslist-connected .friend").each(function () {

            if ($(this).data('id') === e.message.from) {
                let countUnseen = $(this).data('msg-unseen');
                countUnseen++;
                $(this).data('msg-unseen', countUnseen);

                $(this).find('span.badge-light').html(countUnseen);
            }

        });
    }

    function genListUserWasConnect(data, type) {
        let html = '';

        if (data.length == 0) {
            // html hiển thị "Bạn chưa chat với bác sĩ nào"


            switch (type) {
                case CHAT_TYPE_ALL_ONLINE:

                    html = `<p>
                            <strong>Không có ai đang online</strong>
                        </p>`;

                    $('#friendslist-all-online #friends-all-online').html(html);
                    break;
                case CHAT_TYPE_CONNECTED:

                    html = `<p>
                            <strong>Bạn chưa chat với ai</strong>
                        </p>`;

                    $('#friendslist-connected #friends-connected').html(html);
                    break;
            }

            return;
        }

        let isShowBadge = false;

        if (type === CHAT_TYPE_CONNECTED) {
            isShowBadge = true;
        }

        $.each(data, function (index, item) {
            let countUnseen = item.count_unread_message;
            if (countUnseen === 0 || !countUnseen) {
                countUnseen = '';
            }
            if (!isShowBadge) {
                countUnseen = '';
            }

            html += `<div class="friend" data-id=${item.id} data-msg-unseen="${countUnseen}">
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

        switch (type) {
            case CHAT_TYPE_ALL_ONLINE:
                $('#friendslist-all-online #friends-all-online').html(html);
                break;
            case CHAT_TYPE_CONNECTED:
                $('#friendslist-connected #friends-connected').html(html);
                break;
        }


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
                isShowOpenWidget = true;

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
                let parent = $(this).parent();
                parent.hide();
                $('#chat-widget-navbar').hide();
                $('#chatview').show();

                $('#close').unbind("click").click(function () {
                    isShowOpenWidget = false;
                    $("#chat-messages, #profile, #profile p").removeClass("animate");

                    setTimeout(function () {
                        $('#chatview').hide();
                        // $(this).parent().show();
                        parent.show();
                        $('#chat-widget-navbar').show();
                    }, 50);
                });
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


    $(function () {

        $("#chat-circle").click(function () {
            $("#chat-circle").toggle("scale");
            $(".chat-box").toggle("scale");
        });

        $(".chat-box-toggle").click(function () {
            isShowOpenWidget = false;
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
        document.getElementById('chat-messages').innerHTML = '';

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
            if (!msg.chat_message) {
                return;
            }

            let isMySeen = msg.from_user_id === currentUserId ? 'right' : '';


            html += `<div class="message ${isMySeen}">
                        <img src="${msg.from_avatar}"/>
                        <div class="bubble">
                            ${msg.chat_message}
                            <div class="corner"></div>
                        </div>
                    </div>`
        });

        document.getElementById('chat-messages').innerHTML = html;
        autoScrollChatBox();
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
                genListUserWasConnect(data.connected, CHAT_TYPE_CONNECTED);
                genListUserWasConnect(data.online, CHAT_TYPE_ALL_ONLINE);
                renderTotalMessageUnseen(data.connected);
            },
            error: function (e) {
                console.log(e);
            }
        });
    }

    function renderTotalMessageUnseen(data) {
        if (data.length < 1) {
            return;
        }
        totalMessageUnseen = data[0]['total_unread_message'];

        if (totalMessageUnseen <= 1) {
            totalMessageUnseen = '';
        }
        $('#chat-circle').append(`<span class="badge badge-light text-black" id="totalMsgUnseen">${totalMessageUnseen}</span>`);
    }

    getListUserWasConnect();

</script>

