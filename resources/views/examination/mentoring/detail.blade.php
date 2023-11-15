@php use App\Enums\AnswerStatus;use App\Models\QuestionLikes;use App\Models\User;use Carbon\Carbon;use Illuminate\Support\Facades\Auth; @endphp
@extends('layouts.master')
@section('title', 'Home')
@section('content')
    <style>

        .frame.comment-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
        }

        .button-main {
            width: 200px;
            padding: 12px 16px;
            flex-direction: column;
            align-items: center;
            gap: 10px;
            border-radius: 8px;
        }

        .frame button {
            border-radius: 8px;
            background: #45C3D2;
            color: white;
        }

        .frame button:hover {
            border-radius: 8px;
            background: #26737c;
        }

        .text-title {
            font-size: 24px;
            font-style: normal;
            font-weight: 800;
            line-height: normal;
        }

        .card-title {
            font-size: 32px;
            font-style: normal;
            font-weight: 800;
            line-height: normal;
            text-align: center;
        }

        .frame.mentoring-img {
            align-items: flex-start;
            gap: 30px;
            position: relative;
        }

        .frame.mentoring-img .div {
            position: relative;
            width: 370px;
            height: 276px;
        }

        .frame.mentoring-img .catalog {
            height: 276px;
            background-color: var(--grey-light);
            border-radius: 8px;
            overflow: hidden;
            border: 1px solid;
            border-color: var(--light);
        }

        .frame.mentoring-img .vuesax-bold-gallery {
            position: absolute;
            width: 60px;
            height: 60px;
            top: 108px;
            left: 155px;
        }

        .frame.mentoring-img .rectangle {
            position: absolute;
            width: 370px;
            height: 276px;
            top: 0;
            left: 0;
            object-fit: cover;
        }


        .frame.comment-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 24px;
            position: relative;
        }

        .frame.comment-item .div {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 8px;
            position: relative;
            align-self: stretch;
            width: 100%;
            flex: 0 0 auto;
        }

        .frame.comment-item .div-2 {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 13px;
            position: relative;
            align-self: stretch;
            width: 100%;
            flex: 0 0 auto;
        }

        .frame.comment-item .div-3 {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            position: relative;
            align-self: stretch;
            width: 100%;
            flex: 0 0 auto;
        }

        .frame.comment-item .div-4 {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            position: relative;
            flex: 0 0 auto;
        }

        .frame.comment-item .ellipse {
            position: relative;
            width: 54px;
            height: 54px;
            object-fit: cover;
        }

        .frame.comment-item .text-wrapper {
            position: relative;
            width: fit-content;
            text-align: center;
        }

        .frame.comment-item .div-wrapper {
            display: inline-flex;
            flex-direction: column;
            align-items: flex-end;
            gap: 16px;
            position: relative;
            flex: 0 0 auto;
        }

        .frame.comment-item .text-wrapper-2 {
            position: relative;
            width: fit-content;
            margin-top: -1px;
            color: #000000;
        }

        .frame.comment-item .d-ch-v-c-c-t-t-l-n-u-wrapper {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            position: relative;
            align-self: stretch;
            width: 100%;
            flex: 0 0 auto;
        }

        .frame.comment-item .d-ch-v-c-c-t-t-l-n-u {
            position: relative;
            flex: 1;
            margin-top: -1px;
            font-weight: 400;
            color: #000000;
            font-size: 16px;
            letter-spacing: 0;
            line-height: normal;
        }

        .frame.comment-item .div-5 {
            display: flex;
            align-items: flex-start;
            justify-content: center;
            gap: 16px;
            position: relative;
            align-self: stretch;
            width: 100%;
            flex: 0 0 auto;
        }

        .frame.comment-item .frame-wrapper {
            display: flex;
            flex-direction: column;
            height: 56px;
            align-items: flex-start;
            justify-content: center;
            gap: 10px;
            padding: 20px 16px;
            position: relative;
            flex: 1;
            flex-grow: 1;
            border-radius: 8px;
            border: 1px solid;
        }

        .frame.comment-item .div-6 {
            display: inline-flex;
            align-items: center;
            gap: 16px;
            position: relative;
            flex: 0 0 auto;
            margin-top: -12px;
            margin-bottom: -12px;
        }

        .frame.comment-item .img {
            position: relative;
            width: 40px;
            height: 40px;
            object-fit: cover;
        }

        .frame.comment-item .text-wrapper-4 {
            position: relative;
            width: 146px;
            height: 20px;
        }

        .frame.comment-item .text-wrapper-5 {
            display: flex;
            width: 171px;
            height: 56px;
            align-items: center;
            justify-content: center;
            gap: 10px;
            position: relative;
            border-radius: 8px;
        }

        .frame.comment-item .text {
            position: relative;
            width: fit-content;
            margin-left: -0.5px;
            margin-right: -0.5px;
            text-align: center;
        }

        .frame.comment-item .line {
            position: relative;
            align-self: stretch;
            width: 100%;
            height: 1px;
            object-fit: cover;
        }


    </style>

    <style>
        /* Style the Image Used to Trigger the Modal */
        #mentoring-img img {
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }

        #mentoring-img img:hover {
            opacity: 0.7;
        }

        /* The Modal (background) */
        #image-viewer {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.9);
        }

        #image-viewer .modal-content {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
        }

        #image-viewer .modal-content {
            animation-name: zoom;
            animation-duration: 0.6s;
        }

        @keyframes zoom {
            from {
                transform: scale(0)
            }
            to {
                transform: scale(1)
            }
        }

        #image-viewer .close {
            position: absolute;
            top: 15px;
            right: 35px;
            color: #f1f1f1;
            font-size: 40px;
            font-weight: bold;
            transition: 0.3s;
        }

        #image-viewer .close:hover,
        #image-viewer .close:focus {
            color: #bbb;
            text-decoration: none;
            cursor: pointer;
        }

        @media only screen and (max-width: 700px) {
            #image-viewer .modal-content {
                width: 100%;
            }
        }
    </style>
    @include('layouts.partials.header_3')
    @include('component.banner')
    @php
        $isDoctor = false;
        if (Auth::check()){
            $doctor = \App\Models\DoctorInfo::where('created_by', Auth::user()->id)->where('status', \App\Enums\DoctorInfoStatus::ACTIVE)->first();
            if ($doctor){
                $isDoctor = true;
            }
        }
    @endphp
    <div id="mentoring" class="container">
        <a href="{{ route('examination.mentoring') }}">
            <div class="page-header">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none"
                     style="vertical-align: inherit">
                    <path d="M26.6654 16H5.33203M5.33203 16L13.332 24M5.33203 16L13.332 8" stroke="black"
                          stroke-width="4"
                          stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <h1 class="d-inline ml-3">Comment</h1>
            </div>
        </a>
        <div class="card-body">
            <h5 class="card-title">{{ $question->title }}</h5>
            <p class="card-text">{{ $question->content }}</p>
        </div>

        <div class="frame row justify-content-md-around mentoring-img" id="mentoring-img">

            @foreach(explode(',', $question->gallery_public) as $picture)

                <div class="div col-sm-4">
                    <div class="catalog">
                        <div class="div">
                            <img alt="" class="rectangle" src="{{ asset($picture) }}"/>
                        </div>
                    </div>
                </div>
            @endforeach

            @if(Auth::check())
                @php
                    $doctor = \App\Models\DoctorInfo::where('created_by', Auth::user()->id)->first();
                @endphp
                @if(Auth::user()->id == $question->user_id || $doctor)
                    @foreach(explode(',', $question->gallery) as $picture)
                        <div class="div col-sm-4">
                            <div class="catalog">
                                <div class="div">
                                    <img alt="" class="rectangle" src="{{ asset($picture) }}"/>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            @endif
        </div>

        <div class="mt-5">
            <div class="frame comment-item mb-3 d-none" id="comment-main">
                <div class="div-5 ">
                    <div class="frame-wrapper">
                        <div class="div-6 w-100">
                            <img class="img"
                                 src="https://media.licdn.com/dms/image/D560BAQE96KctT7x-iw/company-logo_200_200/0/1666170056007?e=2147483647&v=beta&t=U-5DmL_mYQaduEYyl0aVlabEvxP6-F5nZE9daao6Wuk"/>
                            <input type="text" class="form-control text-wrapper-4 w-100 h-100 border-0"
                                   placeholder="Enter question here" id="input-comment-main">
                        </div>
                    </div>
                    <div class="text-wrapper-5">
                        <button type="button" class="btn mx-2 w-100 h-100" onclick="submitCommentMain()">comment
                        </button>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                @php
                    $isLike = QuestionLikes::where('question_id', $question->id)->where('user_id', Auth::user()->id ?? '')->first();
                    if (!$isLike) {
                        $isLike = false;
                    }
                @endphp

                @if(!Auth::check())
                    <button type="button" class="btn btn-primary mx-2 button-main" onclick="alertLogin()">Like</button>
                @else
                    <button type="button" class="btn btn-primary mx-2 button-main"
                            onclick="changeEmotion()">{{ $isLike ? ( $isLike->is_like ? 'Dislike' : 'Like' ) : 'Like'}}</button>
                @endif
                @if($isDoctor)
                    <button type="button" class="btn btn-primary mx-2 button-main" onclick="replyCommentMain()">Reply
                    </button>
                @endif
            </div>
        </div>

        <div class="border-bottom mb-4">
            <div class="div d-flex justify-content-between mb-3">
                <div class="text-wrapper d-inline-flex header_comment">Answer</div>
            </div>
        </div>

        @foreach($answers as $index => $answer)
            <div class="frame comment-item border-bottom pb-3" id="{{ $index }}">
                <div class="div">
                    <div class="div-2">
                        <div class="div-3">
                            <div class="div-4">
                                <img class="ellipse"
                                     src="https://media.licdn.com/dms/image/D560BAQE96KctT7x-iw/company-logo_200_200/0/1666170056007?e=2147483647&v=beta&t=U-5DmL_mYQaduEYyl0aVlabEvxP6-F5nZE9daao6Wuk"/>
                                <div
                                    class="text-wrapper text-title">{{ $answer->user_id ? User::getNameByID($answer->user_id) : $answer->name }}</div>
                            </div>
                            <div class="div-wrapper">
                                <div
                                    class="text-wrapper-2">{{ Carbon::parse($answer->created_at)->format('H:i:s d/m/Y') }}</div>
                            </div>
                        </div>
                        <div class="d-ch-v-c-c-t-t-l-n-u-wrapper">
                            <p class="d-ch-v-c-c-t-t-l-n-u">
                                <span class="text-wrapper-3"
                                >{{ $answer->content }}</span
                                >
                            </p>
                        </div>
                    </div>
                    <div class="div-5" id="reply-comment-{{ $index }}" style="display: none">
                        <div class="frame-wrapper">
                            <div class="div-6 w-100">
                                <img class="img"
                                     src="https://media.licdn.com/dms/image/D560BAQE96KctT7x-iw/company-logo_200_200/0/1666170056007?e=2147483647&v=beta&t=U-5DmL_mYQaduEYyl0aVlabEvxP6-F5nZE9daao6Wuk"/>
                                <input type="text" class="form-control text-wrapper-4 w-100 h-100 border-0"
                                       id="input-comment-{{ $index }}"
                                       placeholder="Enter question here">
                            </div>
                        </div>
                        <div class="text-wrapper-5">
                            <button type="button" class="btn mx-2 w-100 h-100"
                                    onclick="submitComment('{{ $index }}')">comment
                            </button>
                        </div>
                    </div>
                    <div class="div-5 justify-content-end" id="button-reply-comment-{{ $index }}">
                        @if($isDoctor)
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"
                                 fill="none">
                                <g clip-path="url(#clip0_1944_12433)">
                                    <path
                                        d="M6.66667 4.66808V1.83342C6.66667 1.63275 6.546 1.45142 6.36133 1.37275C6.17733 1.29475 5.962 1.33408 5.81867 1.47475L0.152 6.97475C0.0546667 7.06875 0 7.19808 0 7.33342C0 7.46875 0.0546667 7.59808 0.152 7.69208L5.81867 13.1921C5.96333 13.3321 6.178 13.3714 6.36133 13.2941C6.546 13.2154 6.66667 13.0341 6.66667 12.8334V10.0001H7.612C10.7027 10.0001 13.552 11.6801 15.0473 14.3814L15.0613 14.4067C15.1507 14.5694 15.32 14.6667 15.5 14.6667C15.5413 14.6667 15.5827 14.6621 15.624 14.6514C15.8453 14.5947 16 14.3954 16 14.1667C16 8.98408 11.8287 4.75742 6.66667 4.66808Z"
                                        fill="#929292"/>
                                </g>
                                <defs>
                                    <clipPath id="clip0_1944_12433">
                                        <rect width="16" height="16" fill="white"/>
                                    </clipPath>
                                </defs>
                            </svg>
                            <div class="text-wrapper-3 reply-comment">Reply</div>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div id="image-viewer">
        <span class="close">&times;</span>
        <img class="modal-content" id="full-image">
    </div>

    <script>
        $(document).ready(function () {
            var mentoringDivs = $('#mentoring-img').find('img.rectangle');

            mentoringDivs.on('click', function () {
                var imageUrl = $(this).attr('src');

                $('#full-image').attr('src', imageUrl);

                $('#image-viewer').css('display', 'flex');
            });

            $("#image-viewer").click(function () {
                $('#image-viewer').hide();
            });
        });

        var replyCommentElements = document.querySelectorAll(".reply-comment");
        let token = `{{ $_COOKIE['accessToken'] ?? '' }}`;
        let headers = {
            'Authorization': `Bearer ${token}`
        };
        // Gắn sự kiện "click" cho mỗi phần tử
        replyCommentElements.forEach(function (element) {
            element.addEventListener("click", function () {
                var parentFrame = element.closest('.frame.comment-item');
                if (parentFrame) {
                    toggleReplyComment(parentFrame.id);
                }
            });
        });

        function hiddenReplyComment() {
            var replyCommentDivs = document.querySelectorAll("div[id^='reply-comment-']");

            replyCommentDivs.forEach(function (div) {
                div.style.display = "none";
            });
            var replyButtonDivs = document.querySelectorAll("div[id^='button-reply-comment-']");

            replyButtonDivs.forEach(function (div) {
                div.style.display = "flex";
            });

            document.getElementById('comment-main').classList.add('d-none');
        }

        function toggleReplyComment(id) {
            const idComment = `reply-comment-${id}`;
            const idButtonReplyComment = `button-reply-comment-${id}`;
            const commentElement = document.getElementById(idComment);
            const buttonReplyCommentElement = document.getElementById(idButtonReplyComment);

            hiddenReplyComment();

            if (commentElement && buttonReplyCommentElement) {
                if (commentElement.style.display === 'none') {
                    commentElement.style.display = 'flex';
                    buttonReplyCommentElement.style.display = 'none';
                } else {
                    commentElement.style.display = 'none';
                    buttonReplyCommentElement.style.display = 'block';
                }
            }
        }

        function submitComment(id) {
            if (!token) {
                alert('Please login to apply')
                return;
            }

            const idComment = `input-comment-${id}`;

            const commentValue = document.getElementById(idComment).value;

            const formData = new FormData();
            formData.append("_token", '{{ csrf_token() }}');
            formData.append("content", commentValue);
            formData.append("content_en", commentValue);
            formData.append("content_laos", commentValue);
            formData.append("question_id", '{{ $question->id }}');
            formData.append("answer_parent", '');
            formData.append("status", '{{ AnswerStatus::APPROVED }}');
            formData.append("user_id", '{{ Auth::user()->id ?? '' }}');
            formData.append("pings", '');
            formData.append("name", '{{ User::getNameByID(Auth::user()->id ?? '' )  }}');

            try {
                $.ajax({
                    url: `{{route('answers.api.create')}}`,
                    method: 'POST',
                    headers: headers,
                    contentType: false,
                    cache: false,
                    processData: false,
                    data: formData,
                    success: function (response) {
                        location.reload();
                    },
                    error: function (exception) {
                    }
                });
            } catch (error) {
                throw error;
            }
        }

        function submitCommentMain() {
            if (!token) {
                alert('Please login to apply')
                return;
            }

            const idComment = `input-comment-main`;

            const commentValue = document.getElementById(idComment).value;

            const formData = new FormData();
            formData.append("_token", '{{ csrf_token() }}');
            formData.append("content", commentValue);
            formData.append("content_en", commentValue);
            formData.append("content_laos", commentValue);
            formData.append("question_id", '{{ $question->id }}');
            formData.append("answer_parent", '');
            formData.append("status", '{{ AnswerStatus::APPROVED }}');
            formData.append("user_id", '{{ Auth::user()->id ?? '' }}');
            formData.append("pings", '');
            formData.append("name", '{{ User::getNameByID(Auth::user()->id ?? '' )  }}');

            try {
                $.ajax({
                    url: `{{route('answers.api.create')}}`,
                    method: 'POST',
                    headers: headers,
                    contentType: false,
                    cache: false,
                    processData: false,
                    data: formData,
                    success: function (response) {
                        location.reload();
                    },
                    error: function (exception) {
                    }
                });
            } catch (error) {
                throw error;
            }
        }

        function changeEmotion() {
            if (!token) {
                alert('Please login to apply')
                return;
            }

            const formData = new FormData();
            formData.append("_token", '{{ csrf_token() }}');

            let url = '{{route('api.backend.question-like.change', ['questionId' => $question->id ?? 0, 'userId' => Auth::user()->id ?? 0])}}';
            try {
                $.ajax({
                    url: url,
                    method: 'POST',
                    headers: headers,
                    contentType: false,
                    cache: false,
                    processData: false,
                    data: formData,
                    success: function () {
                        location.reload();
                    },
                    error: function (exception) {
                    }
                });
            } catch (error) {
                throw error;
            }
        }

        function replyCommentMain() {
            hiddenReplyComment();
            var commentMain = document.getElementById('comment-main');
            commentMain.classList.toggle('d-none');
        }

        function alertLogin() {
            alert('Please login to apply')

        }

    </script>

@endsection
