@php use Illuminate\Support\Facades\Auth; @endphp

<style>

    #widget-chat #chat-circle {
        position: fixed;
        bottom: 50px;
        right: 50px;
        background: #5A5EB9;
        width: 80px;
        height: 80px;
        border-radius: 50%;
        color: white;
        padding: 28px;
        cursor: pointer;
        box-shadow: 0px 3px 16px 0px rgba(0, 0, 0, 0.6), 0 3px 1px -2px rgba(0, 0, 0, 0.2), 0 1px 5px 0 rgba(0, 0, 0, 0.12);
    }

    #widget-chat #chat-overlay {
        background: rgba(255, 255, 255, 0.1);
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border-radius: 50%;
        display: none;
    }


    #widget-chat .chat-box {
        display: none;
        background: #efefef;
        position: fixed;
        right: 30px;
        bottom: 50px;
        width: 350px;
        max-width: 85vw;
        max-height: 100vh;
        border-radius: 5px;
    }

    #widget-chat .chat-box-toggle {
        float: right;
        margin-right: 15px;
        cursor: pointer;
    }

    #widget-chat .chat-box-header {
        background: #5A5EB9;
        height: 70px;
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
        color: white;
        text-align: center;
        font-size: 20px;
        padding-top: 17px;
    }

    #widget-chat .chat-box-body {
        position: relative;
        height: 370px;
        height: auto;
        border: 1px solid #ccc;
        overflow: hidden;
    }

    #widget-chat .chat-box-body:after {
        content: "";
        background-image: url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAwIiBoZWlnaHQ9IjIwMCIgdmlld0JveD0iMCAwIDIwMCAyMDAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGcgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoMTAgOCkiIGZpbGw9Im5vbmUiIGZpbGwtcnVsZT0iZXZlbm9kZCI+PGNpcmNsZSBzdHJva2U9IiMwMDAiIHN0cm9rZS13aWR0aD0iMS4yNSIgY3g9IjE3NiIgY3k9IjEyIiByPSI0Ii8+PHBhdGggZD0iTTIwLjUuNWwyMyAxMW0tMjkgODRsLTMuNzkgMTAuMzc3TTI3LjAzNyAxMzEuNGw1Ljg5OCAyLjIwMy0zLjQ2IDUuOTQ3IDYuMDcyIDIuMzkyLTMuOTMzIDUuNzU4bTEyOC43MzMgMzUuMzdsLjY5My05LjMxNiAxMC4yOTIuMDUyLjQxNi05LjIyMiA5LjI3NC4zMzJNLjUgNDguNXM2LjEzMSA2LjQxMyA2Ljg0NyAxNC44MDVjLjcxNSA4LjM5My0yLjUyIDE0LjgwNi0yLjUyIDE0LjgwNk0xMjQuNTU1IDkwcy03LjQ0NCAwLTEzLjY3IDYuMTkyYy02LjIyNyA2LjE5Mi00LjgzOCAxMi4wMTItNC44MzggMTIuMDEybTIuMjQgNjguNjI2cy00LjAyNi05LjAyNS0xOC4xNDUtOS4wMjUtMTguMTQ1IDUuNy0xOC4xNDUgNS43IiBzdHJva2U9IiMwMDAiIHN0cm9rZS13aWR0aD0iMS4yNSIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIi8+PHBhdGggZD0iTTg1LjcxNiAzNi4xNDZsNS4yNDMtOS41MjFoMTEuMDkzbDUuNDE2IDkuNTIxLTUuNDEgOS4xODVIOTAuOTUzbC01LjIzNy05LjE4NXptNjMuOTA5IDE1LjQ3OWgxMC43NXYxMC43NWgtMTAuNzV6IiBzdHJva2U9IiMwMDAiIHN0cm9rZS13aWR0aD0iMS4yNSIvPjxjaXJjbGUgZmlsbD0iIzAwMCIgY3g9IjcxLjUiIGN5PSI3LjUiIHI9IjEuNSIvPjxjaXJjbGUgZmlsbD0iIzAwMCIgY3g9IjE3MC41IiBjeT0iOTUuNSIgcj0iMS41Ii8+PGNpcmNsZSBmaWxsPSIjMDAwIiBjeD0iODEuNSIgY3k9IjEzNC41IiByPSIxLjUiLz48Y2lyY2xlIGZpbGw9IiMwMDAiIGN4PSIxMy41IiBjeT0iMjMuNSIgcj0iMS41Ii8+PHBhdGggZmlsbD0iIzAwMCIgZD0iTTkzIDcxaDN2M2gtM3ptMzMgODRoM3YzaC0zem0tODUgMThoM3YzaC0zeiIvPjxwYXRoIGQ9Ik0zOS4zODQgNTEuMTIybDUuNzU4LTQuNDU0IDYuNDUzIDQuMjA1LTIuMjk0IDcuMzYzaC03Ljc5bC0yLjEyNy03LjExNHpNMTMwLjE5NSA0LjAzbDEzLjgzIDUuMDYyLTEwLjA5IDcuMDQ4LTMuNzQtMTIuMTF6bS04MyA5NWwxNC44MyA1LjQyOS0xMC44MiA3LjU1Ny00LjAxLTEyLjk4N3pNNS4yMTMgMTYxLjQ5NWwxMS4zMjggMjAuODk3TDIuMjY1IDE4MGwyLjk0OC0xOC41MDV6IiBzdHJva2U9IiMwMDAiIHN0cm9rZS13aWR0aD0iMS4yNSIvPjxwYXRoIGQ9Ik0xNDkuMDUgMTI3LjQ2OHMtLjUxIDIuMTgzLjk5NSAzLjM2NmMxLjU2IDEuMjI2IDguNjQyLTEuODk1IDMuOTY3LTcuNzg1LTIuMzY3LTIuNDc3LTYuNS0zLjIyNi05LjMzIDAtNS4yMDggNS45MzYgMCAxNy41MSAxMS42MSAxMy43MyAxMi40NTgtNi4yNTcgNS42MzMtMjEuNjU2LTUuMDczLTIyLjY1NC02LjYwMi0uNjA2LTE0LjA0MyAxLjc1Ni0xNi4xNTcgMTAuMjY4LTEuNzE4IDYuOTIgMS41ODQgMTcuMzg3IDEyLjQ1IDIwLjQ3NiAxMC44NjYgMy4wOSAxOS4zMzEtNC4zMSAxOS4zMzEtNC4zMSIgc3Ryb2tlPSIjMDAwIiBzdHJva2Utd2lkdGg9IjEuMjUiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCIvPjwvZz48L3N2Zz4=');
        opacity: 0.1;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        height: 100%;
        position: absolute;
        z-index: -1;
    }

    #widget-chat .cm-msg-text {
        background: white;
        padding: 10px 15px 10px 15px;
        color: #666;
        max-width: 75%;
        float: left;
        margin-left: 10px;
        position: relative;
        margin-bottom: 20px;
        border-radius: 30px;
    }
</style>

<style>

    #widget-chat #friendslist {
        top: 0;
        left: 0;
        height: 484px;
    }

    #widget-chat .friend {
        height: 70px;
        border-bottom: 1px solid #e7ebee;
        position: relative;
    }

    #widget-chat .friend:hover {
        background: #f1f4f6;
        cursor: pointer;
    }

    #widget-chat .friend img {
        width: 40px;
        border-radius: 50%;
        margin: 15px;
        float: left;
    }

    #widget-chat .friend p {
        padding: 15px 0 0 0;
        float: left;
        width: 220px;
    }

    #widget-chat .friend p strong {
        font-weight: 600;
        font-size: 15px;
        color: #597a96;

    }

    #widget-chat .friend p span {
        font-size: 13px;
        font-weight: 400;
        color: #aab8c2;
    }

    #widget-chat #chatview {
        height: 484px;
        top: 0;
        left: 0;
        display: none;
        background: #fff;
    }

    #widget-chat #profile {
        height: 153px;
        overflow: hidden;
        text-align: center;
        color: #fff;
    }

    #widget-chat .p1 #profile {
        background: #fff url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/245657/timeline1.png") 0 0 content-box;
    }

    #widget-chat #profile p {
        font-weight: 600;
        font-size: 15px;
        margin: 118px 0 -1px;
        opacity: 0;
        -webkit-transition: all 200ms cubic-bezier(0.000, 0.995, 0.990, 1.000);
        -moz-transition: all 200ms cubic-bezier(0.000, 0.995, 0.990, 1.000);
        -ms-transition: all 200ms cubic-bezier(0.000, 0.995, 0.990, 1.000);
        -o-transition: all 200ms cubic-bezier(0.000, 0.995, 0.990, 1.000);
        transition: all 200ms cubic-bezier(0.000, 0.995, 0.990, 1.000);
    }

    #widget-chat #profile p.animate {
        margin-top: 97px;
        opacity: 1;
        -webkit-transition: all 200ms cubic-bezier(0.000, 0.995, 0.990, 1.000);
        -moz-transition: all 200ms cubic-bezier(0.000, 0.995, 0.990, 1.000);
        -ms-transition: all 200ms cubic-bezier(0.000, 0.995, 0.990, 1.000);
        -o-transition: all 200ms cubic-bezier(0.000, 0.995, 0.990, 1.000);
        transition: all 200ms cubic-bezier(0.000, 0.995, 0.990, 1.000);
    }

    #widget-chat #profile span {
        font-weight: 400;
        font-size: 11px;
    }

    #widget-chat #chat-messages {
        opacity: 0;
        margin-top: 30px;
        height: 270px;
        overflow-y: scroll;
        overflow-x: hidden;
        padding-right: 20px;
        -webkit-transition: all 200ms cubic-bezier(0.000, 0.995, 0.990, 1.000);
        -moz-transition: all 200ms cubic-bezier(0.000, 0.995, 0.990, 1.000);
        -ms-transition: all 200ms cubic-bezier(0.000, 0.995, 0.990, 1.000);
        -o-transition: all 200ms cubic-bezier(0.000, 0.995, 0.990, 1.000);
        transition: all 200ms cubic-bezier(0.000, 0.995, 0.990, 1.000);
    }

    #widget-chat #chat-messages.animate {
        opacity: 1;
        margin-top: 0;
    }

    #widget-chat #chat-messages label {
        color: #aab8c2;
        font-weight: 600;
        font-size: 12px;
        text-align: center;
        margin: 15px 0;
        width: 290px;
        display: block;
    }

    #widget-chat #chat-messages div.message {
        padding: 0 0 30px 58px;
        clear: both;
        margin-bottom: 45px;
    }

    #widget-chat #chat-messages div.message.right {
        padding: 0 58px 30px 0;
        margin-right: -19px;
        margin-left: 19px;
    }

    #widget-chat #chat-messages .message img {
        float: left;
        margin-left: -38px;
        border-radius: 50%;
        width: 30px;
        margin-top: 12px;
    }

    #widget-chat #chat-messages div.message.right img {
        float: right;
        margin-left: 0;
        margin-right: -38px;
    }

    #widget-chat .message .bubble {
        background: #f0f4f7;
        font-size: 13px;
        font-weight: 600;
        padding: 12px 13px;
        border-radius: 5px 5px 5px 0px;
        color: #8495a3;
        position: relative;
        float: left;
    }

    #widget-chat #chat-messages div.message.right .bubble {
        float: right;
        border-radius: 5px 5px 0px 5px;
    }

    #widget-chat .bubble .corner {
        background: url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/245657/bubble-corner.png") 0 0 no-repeat;
        position: absolute;
        width: 7px;
        height: 7px;
        left: -5px;
        bottom: 0;
    }

    #widget-chat div.message.right .corner {
        background: url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/245657/bubble-cornerR.png") 0 0 no-repeat;
        left: auto;
        right: -5px;
    }

    #widget-chat .bubble span {
        color: #aab8c2;
        font-size: 11px;
        position: absolute;
        right: 0;
        bottom: -22px;
    }

    #widget-chat #sendmessage {
        height: 60px;
        border-top: 1px solid #e7ebee;
        position: absolute;
        bottom: 0;
        right: 0px;
        width: 100%;
        background: #fff;
    }

    #widget-chat #sendmessage input {
        background: #fff;
        margin: 21px 0 0 21px;
        border: none;
        padding: 0;
        font-size: 14px;
        font-family: "Open Sans", sans-serif;
        font-weight: 400;
        color: #aab8c2;
    }

    #widget-chat #sendmessage input:focus {
        outline: 0;
    }

    #widget-chat #sendmessage button {
        background: #fff url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/245657/send.png") 0 -41px no-repeat;
        width: 30px;
        height: 30px;
        position: absolute;
        right: 15px;
        top: 23px;
        border: none;
    }

    #widget-chat #sendmessage button:hover {
        cursor: pointer;
        background-position: 0 0;
    }

    #widget-chat #sendmessage button:focus {
        outline: 0;
    }

    #widget-chat #close {
        position: absolute;
        top: 8px;
        opacity: 0.8;
        right: 10px;
        width: 20px;
        height: 20px;
        cursor: pointer;
    }

    #widget-chat #close:hover {
        opacity: 1;
    }

    #widget-chat #chatview, #widget-chat #sendmessage {
        overflow: hidden;
        border-radius: 6px;
    }
</style>

<div id="widget-chat">

    <div id="chat-circle" class="btn btn-raised">
        <div id="chat-overlay"></div>
        <i class="fa-solid fa-message"></i>
    </div>

    <div class="chat-box">
        <div class="chat-box-header">
            ChatBot
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

<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/laravel-echo@1.11.2/dist/echo.iife.js"></script>

<script>

    let chatUserId;

    let currentId = '{{ Auth::check() ? Auth::user()->id : '' }}';

    let totalMessageUnseen = 0;

    window.Pusher = Pusher;
    window.Echo = new Echo({
        broadcaster: 'pusher',
        key: 'e700f994f98dbb41ea9f',
        cluster: 'eu',
        encrypted: true,
    });

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
                console.log(data)
            },
            error: function (e) {
                console.log(e);
            }
        });

    }

    function calculateTotalMessageUnseen(e) {
        console.log(e)
        console.log(chatUserId)

        if (e.message.from === chatUserId) {
            console.log(123)
            return;
        }
        console.log(456)

        totalMessageUnseen++;

        console.log('totalMessageUnseen', totalMessageUnseen)

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

