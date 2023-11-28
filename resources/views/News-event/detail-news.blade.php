@extends('layouts.master')
@section('title', 'News')
@section('content')
    @include('layouts.partials.header')
    @include('component.banner')
    <div class="recruitment-details ">
        <div class="container">
            <a href="{{route('index.new')}}">
                <div class="recruitment-details--title mb-30"><i class="fa-solid fa-arrow-left"></i> {{ __('home.News details') }}</div>
            </a>
            <div class="d-flex">
                <div class="col-md-9">
                    <div>
                        <div class="flea-content">{{$newEvent->title}}</div>
                        <div class="fs-16px color-Grey-Dark mb-4 mt-2">{{ __('home.Thứ tư, ngày 13-09-2023') }}</div>
                        <div class="justify-content-center row w-100">
                            <img class="b-radius-8px p-0" src="{{$newEvent->thumbnail}}">
                        </div>
{{--                        <div class="justify-content-center row mb-4">{!! $newEvent->short_description !!}</div>--}}
                        <div class="mt-md-3">
                            <strong class="text-content-product">{!! $newEvent->short_description !!}</strong>
                            <p class="text-gray mt-3">{!! $newEvent->description !!}</p>
                        </div>
                    </div>
                    <div class="border-top mt-30">
                        <div class="mb-30">
                            <div class="justify-content-between align-items-center d-flex mt-4">
                                <div class="ac-text_content ">{{ __('home.Related news') }}</div>
                                <div class="flea-content-product"><a href="{{route('index.new')}}">See all</a></div>
                            </div>
                        </div>
                        <div class="d-flex row">
                            @foreach($related as $item)
                                <div class="col-md-6 d-flex mb-4">
                                    <a class="w-100" href="{{route('detail.new',$item->id)}}">
                                        <div class="d-flex border-8px">
                                            <div class="col-md-3 p-0">
                                                <img class="w-100" src="{{$item->thumbnail}}"  style="object-fit: cover;border-radius: 8px;height: 111px;">
                                            </div>
                                            <div class="col-md-9 pr-0">
                                                <strong class="fs-16px">{{$item->title}}</strong>
                                                <p class="fs-12px mt-2">{!! $item->short_description !!}</p>
                                                <div class="d-flex justify-content-end align-items-end">
                                                    <p>{{ __('home.Read more') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <img class="w-100 mb-4" src="{{asset('img/icons_logo/banner-doc.png')}}">
                    <img class="w-100 mb-4" src="{{asset('img/icons_logo/banner-doc.png')}}">
                    <img class="w-100 mb-4" src="{{asset('img/icons_logo/banner-doc.png')}}">
                </div>
            </div>

        </div>
    </div>

@endsection
