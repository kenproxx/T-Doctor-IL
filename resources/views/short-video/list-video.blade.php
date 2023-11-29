@extends('layouts.master')
@section('title', 'Short Videos')
@section('content')
    <style>
        .user-avt {
            border: 1px solid #ccc;
            border-radius: 50px;
            max-width: 100px;
        }

        video {
            max-width: 50%;
            height: auto;
        }
    </style>
    @include('layouts.partials.header')
    @include('component.banner')
    <div class="container">
        <div class="text-center">
            @foreach($videos as $video)
                <div class="user-posted">
                    <div class="header-post">
                        <div class="user">
                            <img class="user-avt" src="{{ asset($video->avt) }}" alt="">
                            <span class="username">{{ $video->username }}</span>
                            <span class="name">{{ $video->name }}</span>
                        </div>
                        <div class="content">
                            <a href="{{ route('short.videos.item', $video->id) }}">{{ $video->title }}</a>
                        </div>
                    </div>
                    <div class="main-post">
                        <div class="row">
                            <div class="col-md-10 see-video">
                                <video controls>
                                    <source src="{{ asset($video->file) }}" type="video/mp4">
                                    <source src="{{ asset($video->file) }}" type="video/ogg">
                                    Your browser does not support the video tag.
                                </video>
                            </div>
                            <div class="col-md-2 action-video">

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
