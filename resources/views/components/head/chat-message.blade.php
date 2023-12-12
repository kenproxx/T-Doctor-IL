@php use Illuminate\Support\Facades\Auth; @endphp
<style>
    #widget-chat #center-text {
        display: flex;
        flex: 1;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 100%;

    }

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

    #widget-chat .btn#my-btn {
        background: white;
        padding-top: 13px;
        padding-bottom: 12px;
        border-radius: 45px;
        padding-right: 40px;
        padding-left: 40px;
        color: #5865C3;
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

    #widget-chat #chat-input {
        background: #f4f7f9;
        width: 100%;
        position: relative;
        height: 47px;
        padding-top: 10px;
        padding-right: 50px;
        padding-bottom: 10px;
        padding-left: 15px;
        border: none;
        resize: none;
        outline: none;
        border: 1px solid #ccc;
        color: #888;
        border-top: none;
        border-bottom-right-radius: 5px;
        border-bottom-left-radius: 5px;
        overflow: hidden;
    }

    #widget-chat .chat-input > form {
        margin-bottom: 0;
    }

    #widget-chat #chat-input::-webkit-input-placeholder { /* Chrome/Opera/Safari */
        color: #ccc;
    }

    #widget-chat #chat-input::-moz-placeholder { /* Firefox 19+ */
        color: #ccc;
    }

    #widget-chat #chat-input:-ms-input-placeholder { /* IE 10+ */
        color: #ccc;
    }

    #widget-chat #chat-input:-moz-placeholder { /* Firefox 18- */
        color: #ccc;
    }

    #widget-chat .chat-submit {
        position: absolute;
        bottom: 3px;
        right: 10px;
        background: transparent;
        box-shadow: none;
        border: none;
        border-radius: 50%;
        color: #5A5EB9;
        width: 35px;
        height: 35px;
    }

    #widget-chat .chat-logs {
        padding: 15px;
        height: 370px;
        overflow-y: scroll;
    }

    #widget-chat .chat-logs::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
        background-color: #F5F5F5;
    }

    #widget-chat .chat-logs::-webkit-scrollbar {
        width: 5px;
        background-color: #F5F5F5;
    }

    #widget-chat .chat-logs::-webkit-scrollbar-thumb {
        background-color: #5A5EB9;
    }


    @media only screen and (max-width: 500px) {
        #widget-chat .chat-logs {
            height: 40vh;
        }
    }

    #widget-chat .chat-msg.user > .msg-avatar img {
        width: 45px;
        height: 45px;
        border-radius: 50%;
        float: left;
        width: 15%;
    }

    #widget-chat .chat-msg.self > .msg-avatar img {
        width: 45px;
        height: 45px;
        border-radius: 50%;
        float: right;
        width: 15%;
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

    #widget-chat .chat-msg {
        clear: both;
    }

    #widget-chat .chat-msg.self > .cm-msg-text {
        float: right;
        margin-right: 10px;
        background: #5A5EB9;
        color: white;
    }

    #widget-chat .cm-msg-button > ul > li {
        list-style: none;
        float: left;
        width: 50%;
    }

    #widget-chat .cm-msg-button {
        clear: both;
        margin-bottom: 70px;
    }
</style>

<style>
    #widget-chat #view-code {
        color: #89a2b5;
        opacity: 0.7;
        font-size: 14px;
        text-transform: uppercase;
        font-weight: 700;
        text-decoration: none;
        position: absolute;
        top: 660px;
        left: 50%;
        margin-left: -50px;
        z-index: 200;
    }

    #widget-chat #view-code:hover {
        opacity: 1;
    }

    #widget-chat #chatbox {
        width: 290px;
        background: #fff;
        border-radius: 6px;
        overflow: hidden;
        height: 484px;
        position: absolute;
        top: 200px;
        left: 50%;
        margin-left: -155px;
    }

    #widget-chat #friendslist {
        top: 0;
        left: 0;
        width: 290px;
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

    #widget-chat .floatingImg {
        width: 40px;
        border-radius: 50%;
        position: absolute;
        top: 0;
        left: 12px;
        border: 3px solid #fff;
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

    #widget-chat .friend .status {
        background: #26c281;
        border-radius: 50%;
        width: 9px;
        height: 9px;
        position: absolute;
        top: 31px;
        right: 17px;
    }

    #widget-chat .friend .status.away {
        background: #ffce54;
    }

    #widget-chat .friend .status.inactive {
        background: #eaeef0;
    }

    #widget-chat #search {
        background: #e3e9ed url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/245657/search.png") -11px 0 no-repeat;
        height: 60px;
        width: 290px;
        position: absolute;
        bottom: 0;
        left: 0;
    }

    #widget-chat #searchfield {
        background: #e3e9ed;
        margin: 21px 0 0 55px;
        border: none;
        padding: 0;
        font-size: 14px;
        font-family: "Open Sans", sans-serif;
        font-weight: 400;
        color: #8198ac;
    }

    #widget-chat #searchfield:focus {
        outline: 0;
    }

    #widget-chat #chatview {
        width: 290px;
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
        background: #fff url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/245657/timeline1.png") 0 0 no-repeat;
    }

    #widget-chat #profile .avatar {
        width: 68px;
        border: 3px solid #fff;
        margin: 23px 0 0;
        border-radius: 50%;
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
        width: 290px;
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
        width: 290px;
        background: #fff;
        padding-bottm: 50px;
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

    #widget-chat .cx, #widget-chat .cy {
        background: #fff;
        position: absolute;
        width: 0px;
        top: 15px;
        right: 15px;
        height: 3px;
        -webkit-transition: all 250ms ease-in-out;
        -moz-transition: all 250ms ease-in-out;
        -ms-transition: all 250ms ease-in-out;
        -o-transition: all 250ms ease-in-out;
        transition: all 250ms ease-in-out;
    }

    #widget-chat .cx.s1, #widget-chat .cy.s1 {
        right: 0;
        width: 20px;
        -webkit-transition: all 100ms ease-out;
        -moz-transition: all 100ms ease-out;
        -ms-transition: all 100ms ease-out;
        -o-transition: all 100ms ease-out;
        transition: all 100ms ease-out;
    }

    #widget-chat .cy.s2 {
        -ms-transform: rotate(50deg);
        -webkit-transform: rotate(50deg);
        transform: rotate(50deg);
        -webkit-transition: all 100ms ease-out;
        -moz-transition: all 100ms ease-out;
        -ms-transition: all 100ms ease-out;
        -o-transition: all 100ms ease-out;
        transition: all 100ms ease-out;
    }

    #widget-chat .cy.s3 {
        -ms-transform: rotate(45deg);
        -webkit-transform: rotate(45deg);
        transform: rotate(45deg);
        -webkit-transition: all 100ms ease-out;
        -moz-transition: all 100ms ease-out;
        -ms-transition: all 100ms ease-out;
        -o-transition: all 100ms ease-out;
        transition: all 100ms ease-out;
    }

    #widget-chat .cx.s1 {
        right: 0;
        width: 20px;
        -webkit-transition: all 100ms ease-out;
        -moz-transition: all 100ms ease-out;
        -ms-transition: all 100ms ease-out;
        -o-transition: all 100ms ease-out;
        transition: all 100ms ease-out;
    }

    #widget-chat .cx.s2 {
        -ms-transform: rotate(140deg);
        -webkit-transform: rotate(140deg);
        transform: rotate(140deg);
        -webkit-transition: all 100ms ease-out;
        -moz-transition: all 100ms ease-out;
        -ms-transition: all 100 ease-out;
        -o-transition: all 100ms ease-out;
        transition: all 100ms ease-out;
    }

    #widget-chat .cx.s3 {
        -ms-transform: rotate(135deg);
        -webkit-transform: rotate(135deg);
        transform: rotate(135deg);
        -webkit-transition: all 100 ease-out;
        -moz-transition: all 100ms ease-out;
        -ms-transition: all 100ms ease-out;
        -o-transition: all 100ms ease-out;
        transition: all 100ms ease-out;
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

                <div id="friends">

                    <div id="search">
                        <input type="text" id="searchfield" value="Search contacts..."/>
                    </div>

                </div>

            </div>

            <div id="chatview" class="p1">
                <div id="profile">

                    <div id="close">
                        <div class="cy"></div>
                        <div class="cx"></div>
                    </div>

                    <p></p>
                    <span></span>
                </div>
                <div id="chat-messages">

                </div>

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

    function genListUserWasConnect(data) {
        let html = '';
        $.each(data, function (index, item) {
            html += `<div class="friend" data-id=${item.id}>
                        <img src="${item.avt}"/>
                        <p>
                            <strong>${item.name}</strong>
                            <span>${item.email}</span>
                        </p>
                    </div>`
        });

        $('#friends').html(html);

        setOnclickFriend();
    }

    function setOnclickFriend() {
        $(".friend").each(function () {
            $(this).click(function () {
                chatUserId = $(this).data('id');

                var childOffset = $(this).offset();
                var parentOffset = $(this).parent().parent().offset();
                var childTop = childOffset.top - parentOffset.top;
                var clone = $(this).find('img').eq(0).clone();
                var top = childTop + 12 + "px";

                $(clone).css({'top': top}).addClass("floatingImg").appendTo("#chatbox");

                setTimeout(function () {
                    $("#profile p").addClass("animate");
                    $("#profile").addClass("animate");
                }, 100);
                setTimeout(function () {
                    $("#chat-messages").addClass("animate");
                    $('.cx, .cy').addClass('s1');
                    setTimeout(function () {
                        $('.cx, .cy').addClass('s2');
                    }, 100);
                    setTimeout(function () {
                        $('.cx, .cy').addClass('s3');
                    }, 200);
                }, 150);

                $('.floatingImg').animate({
                    'width': "68px",
                    'left': '108px',
                    'top': '20px'
                }, 200);

                var name = $(this).find("p strong").html();
                var email = $(this).find("p span").html();
                $("#profile p").html(name);
                $("#profile span").html(email);

                $(".message").not(".right").find("img").attr("src", $(clone).attr("src"));
                $('#friendslist').fadeOut();
                $('#chatview').fadeIn();


                $('#close').unbind("click").click(function () {
                    $("#chat-messages, #profile, #profile p").removeClass("animate");
                    $('.cx, .cy').removeClass("s1 s2 s3");
                    $('.floatingImg').animate({
                        'width': "40px",
                        'top': top,
                        'left': '12px'
                    }, 200, function () {
                        $('.floatingImg').remove()
                    });

                    setTimeout(function () {
                        $('#chatview').fadeOut();
                        $('#friendslist').fadeIn();
                    }, 50);
                });

            });
        });
    }

    // Gắn sự kiện keyup cho input
    $('#text-chatMessage').keypress(function (event) {
        console.log(Echo)
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
        $('#chat-messages').scrollTop($('#chat-messages')[0].scrollHeight);
    }
</script>

<script>
    $(function () {
        var INDEX = 0;
        $("#chat-submit").click(function (e) {
            e.preventDefault();
            var msg = $("#chat-input").val();
            if (msg.trim() == "") {
                return false;
            }
            generate_message(msg, "self");
            var buttons = [
                {
                    name: "Existing User",
                    value: "existing"
                },
                {
                    name: "New User",
                    value: "new"
                }
            ];
            setTimeout(function () {
                generate_message(msg, "user");
            }, 1000);
        });

        function generate_message(msg, type) {
            INDEX++;
            var str = "";
            str += "<div id='cm-msg-" + INDEX + "' class=\"chat-msg " + type + '">';
            str += '          <span class="msg-avatar">';
            str +=
                '            <img src="https://image.crisp.im/avatar/operator/196af8cc-f6ad-4ef7-afd1-c45d5231387c/240/?1483361727745">';
            str += "          </span>";
            str += '          <div class="cm-msg-text">';
            str += msg;
            str += "          </div>";
            str += "        </div>";
            $(".chat-logs").append(str);
            $("#cm-msg-" + INDEX)
                .hide()
                .fadeIn(300);
            if (type == "self") {
                $("#chat-input").val("");
            }
            $(".chat-logs")
                .stop()
                .animate({scrollTop: $(".chat-logs")[0].scrollHeight}, 1000);
        }

        function generate_button_message(msg, buttons) {
            /* Buttons should be object array
              [
                {
                  name: 'Existing User',
                  value: 'existing'
                },
                {
                  name: 'New User',
                  value: 'new'
                }
              ]
            */
            INDEX++;
            var btn_obj = buttons
                .map(function (button) {
                    return (
                        '              <li class="button"><a href="javascript:;" class="btn btn-primary chat-btn" chat-value="' +
                        button.value +
                        '">' +
                        button.name +
                        "</a></li>"
                    );
                })
                .join("");
            var str = "";
            str += "<div id='cm-msg-" + INDEX + '\' class="chat-msg user">';
            str += '          <span class="msg-avatar">';
            str +=
                '            <img src="https://image.crisp.im/avatar/operator/196af8cc-f6ad-4ef7-afd1-c45d5231387c/240/?1483361727745">';
            str += "          </span>";
            str += '          <div class="cm-msg-text">';
            str += msg;
            str += "          </div>";
            str += '          <div class="cm-msg-button">';
            str += "            <ul>";
            str += btn_obj;
            str += "            </ul>";
            str += "          </div>";
            str += "        </div>";
            $(".chat-logs").append(str);
            $("#cm-msg-" + INDEX)
                .hide()
                .fadeIn(300);
            $(".chat-logs")
                .stop()
                .animate({scrollTop: $(".chat-logs")[0].scrollHeight}, 1000);
            $("#chat-input").attr("disabled", true);
        }

        $(document).delegate(".chat-btn", "click", function () {
            var value = $(this).attr("chat-value");
            var name = $(this).html();
            $("#chat-input").attr("disabled", false);
            generate_message(name, "self");
        });

        $("#chat-circle").click(function () {
            $("#chat-circle").toggle("scale");
            $(".chat-box").toggle("scale");
        });

        $(".chat-box-toggle").click(function () {
            $("#chat-circle").toggle("scale");
            $(".chat-box").toggle("scale");
        });

    });

    $(document).ready(function () {


        var preloadbg = document.createElement("img");
        preloadbg.src = "https://s3-us-west-2.amazonaws.com/s.cdpn.io/245657/timeline1.png";

        $("#searchfield").focus(function () {
            if ($(this).val() == "Search contacts...") {
                $(this).val("");
            }
        });
        $("#searchfield").focusout(function () {
            if ($(this).val() == "") {
                $(this).val("Search contacts...");

            }
        });

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
            },
            error: function (e) {
                console.log(e);
            }
        });
    }
    getListUserWasConnect();

</script>

<script>



</script>

