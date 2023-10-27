@extends('layouts.master')
@section('title', 'Home')
@section('content')
    <head>
        <meta charset=utf-8>
        <meta name=description content="">
        <meta name=viewport content="width=device-width, initial-scale=1">
        <title>Jquery Comments Plugin</title>

        <!-- Styles -->
        <link rel="stylesheet" type="text/css"
              href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

        <!-- Libraries -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
        <script type="text/javascript"
                src="https://cdnjs.cloudflare.com/ajax/libs/jquery.textcomplete/1.8.0/jquery.textcomplete.js"></script>

        @include('examination.mentoring.jquery-comment')

        <!-- Init jquery-comments -->
        <script type="text/javascript">
            let data;

            $.ajax({
                url: `{{route('api.backend.questions.custome.list')}}`,
                method: 'GET',
                headers: headers,
                success: function (response) {
                    data = response;
                },
                error: function (exception) {
                    console.log(exception)
                }
            });

            $(function () {
                var saveComment = function (data) {

                    // Convert pings to human readable format
                    $(Object.keys(data.pings)).each(function (index, userId) {
                        var fullname = data.pings[userId];
                        var pingText = '@' + fullname;
                        data.content = data.content.replace(new RegExp('@' + userId, 'g'), pingText);
                    });

                    return data;
                }
                $('#comments-container').comments({
                    currentUserId: 1,
                    roundProfilePictures: true,
                    textareaRows: 1,
                    enableAttachments: true,
                    enableHashtags: true,
                    enablePinging: true,
                    scrollContainer: $(window),
                    searchUsers: function (term, success, error) {
                        setTimeout(function () {
                            success(usersArray.filter(function (user) {
                                var containsSearchTerm = user.fullname.toLowerCase().indexOf(term.toLowerCase()) != -1;
                                var isNotSelf = user.id != 1;
                                return containsSearchTerm && isNotSelf;
                            }));
                        }, 500);
                    },

                    getComments: function (success, error) {
                        setTimeout(function () {
                            success(data);
                        }, 500);
                    },
                    postComment: function (data, success, error) {
                        setTimeout(function () {
                            success(saveComment(data));
                        }, 500);
                    },
                    putComment: function (data, success, error) {
                        setTimeout(function () {
                            success(saveComment(data));
                        }, 500);
                    },
                    deleteComment: function (data, success, error) {
                        setTimeout(function () {
                            success();
                        }, 500);
                    },
                    upvoteComment: function (data, success, error) {
                        setTimeout(function () {
                            success(data);
                        }, 500);
                    },
                    validateAttachments: function (attachments, callback) {
                        setTimeout(function () {
                            callback(attachments);
                        }, 500);
                    },
                });
            });
        </script>

    </head>
    @include('layouts.partials.header_3')
    @include('component.banner')
    <div id="mentoring" class="container">
        <div class="nav d-flex justify-content-around">
            <a class="tab active" href="#">All</a>
            <a class="tab" href="#">Health</a>
            <a class="tab" href="#">Beauty</a>
            <a class="tab" href="#">New/Events</a>
            <a class="tab" href="#">Kids</a>
            <a class="tab" href="#">Pets</a>
            <a class="tab" href="#">Other</a>
        </div>
        <div id="comments-container"></div>
    </div>


@endsection
