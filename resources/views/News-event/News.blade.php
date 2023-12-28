@extends('layouts.master')
@section('title', 'News')
@section('content')
    @include('layouts.partials.header')
    @include('component.banner')
    <style>
        .max-2-line-title {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
            height: 44px;
        }

        .max-5-line-title {
            display: -webkit-box;
            -webkit-line-clamp: 5;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
            min-height: 130px;
        }
    </style>
    <div class="recruitment-details ">
        <div class="container">
            @if($listNews)
                @php
                    $news = $listNews->first();
                @endphp
                @if($news)
                    <a href="{{route('detail.new',$news->id)}}">
                        <div class="d-flex">
                            <div class="col-md-5 pl-0">
                                <img class="w-100 b-radius-8px" src="{{$news->thumbnail}}">
                            </div>
                            <div class="col-md-7 pr-0 max-5-line-title">
                                <strong class="text-content-product">{{$news->title}}</strong>
                                <p class="text-gray mt-3">{!! $news->short_description !!}</p>
                            </div>
                        </div>
                    </a>
                @endif

                <div class="mt-4">
                    <p class="text-content-product">{{ __('home.All news') }}</p>
                </div>
                <div class="d-flex row">
                    @foreach($listNews as $news)
                        <div class="col-md-6 padding-news">
                            <a href="{{route('detail.new',$news->id)}}">
                                <div class="d-flex border-8px w-100">
                                    <div class="col-md-3 p-0 content__item__image">
                                        <img class="content__item__image" src="{{$news->thumbnail}}">
                                    </div>
                                    <div class="col-md-9 pr-0">

                                        <strong class="fs-16px max-2-line-title">{{$news->title}}</strong>
                                        <div class="max-5-line-title">
                                            <p class="fs-12px mt-2">{!! $news->short_description !!}</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                <nav aria-label="Page navigation example" class="d-flex justify-content-center">
                    {{ $listNews->links() }}
                </nav>
            @else
                <div class="d-flex justify-content-center">
                    <h3>{{ __('home.Không có tin tức nào') }}</h3>
                </div>
            @endif
        </div>
    </div>
    <div class="banner2">
        @include('component.banner')
    </div>
    <div class="recruitment-details ">
        <div class="container">
            @if($listEvent)
                @php
                    $Event = $listEvent->first();
                @endphp
                @if($Event)
                    <a href="{{route('detail.new',$Event->id)}}">
                        <div class="d-flex">
                            <div class="col-md-5 pl-0">
                                <img class="w-100 b-radius-8px" src="{{$Event->thumbnail}}">
                            </div>
                            <div class="col-md-7 pr-0 max-5-line-title">
                                <strong class="text-content-product">{{$Event->title}}</strong>
                                <p class="text-gray mt-3">{!! $Event->short_description !!}</p>
                            </div>
                        </div>
                    </a>
                @endif
                <div class="mt-4">
                    <p class="text-content-product">{{ __('home.All Event') }}</p>
                </div>
                <div class="d-flex row">
                    @foreach($listEvent as $event)
                        <div class="col-md-6 padding-news">
                            <a href="{{route('detail.new',$event->id)}}">
                                <div class="d-flex border-8px w-100">
                                    <div class="col-md-3 p-0 content__item__image">
                                        <img class="content__item__image" src="{{$event->thumbnail}}">
                                    </div>
                                    <div class="col-md-9 pr-0">

                                        <strong class="fs-16px max-2-line-title">{{$event->title}}</strong>
                                        <div class="max-5-line-title">
                                            <p class="fs-12px mt-2">{!! $event->short_description !!}</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                <nav aria-label="Page navigation example" class="d-flex justify-content-center">
                    {{ $listEvent->links() }}
                </nav>
            @endif
        </div>
    </div>

@endsection
