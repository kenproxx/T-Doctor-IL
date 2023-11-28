@extends('layouts.master')
@section('title', 'News')
@section('content')
    @include('layouts.partials.header')
    @include('component.banner')
    <div class="recruitment-details ">
        <div class="container">
            @if($listNews)
                @php
                    $news = $listNews->first();
                @endphp
            @if($news)
                    <a class="col-md-5 pl-0" href="{{route('detail.new',$news->id)}} ">
                        <div class="d-flex">
                            <div >
                                <img class="w-100 b-radius-8px" src="{{$news->thumbnail}}">
                            </div>
                            <div class="col-md-7 pr-0">
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
                            <div class="d-flex border-8px w-100">
                                <div class="col-md-3 p-0 content__item__image">
                                    <img class="content__item__image" src="{{$news->thumbnail}}">
                                </div>
                                <div class="col-md-9 pr-0">
                                    <a href="{{route('detail.new',$news->id)}}" class="w-100">

                                        <strong class="fs-16px">{{$news->title}}</strong>
                                        <div>
                                            <p class="fs-12px mt-2">{!! $news->short_description !!}</p>
                                        </div>
                                    </a>
                                </div>
                                <div class="d-flex justify-content-end align-items-end"
                                     style="position: absolute;bottom: 30px;right: 30px;">
                                    <a href="{{route('detail.new',$news->id)}}">{{ __('home.Read more') }}</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <nav aria-label="Page navigation example" class="d-flex justify-content-center">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">{{ __('home.Previous') }}</span>
                            </a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">{{ __('home.Next') }}</span>
                            </a>
                        </li>
                    </ul>
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
                            <div class="col-md-7 pr-0">
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
                    @foreach($listEvent as $Event)
                        <div class="col-md-6 padding-news">
                            <div class="d-flex border-8px w-100">
                                <div class="col-md-3 p-0 content__item__image">
                                    <img class="content__item__image" src="{{$Event->thumbnail}}">
                                </div>
                                <div class="col-md-9 pr-0">
                                    <a href="{{route('detail.new',$Event->id)}}" class="w-100">

                                        <strong class="fs-16px">{{$Event->title}}</strong>
                                        <div>
                                            <p class="fs-12px mt-2">{!! $Event->short_description !!}</p>
                                        </div>
                                    </a>
                                </div>
                                <div class="d-flex justify-content-end align-items-end"
                                     style="position: absolute;bottom: 30px;right: 30px;">
                                    <a href="{{route('detail.new',$Event->id)}}">{{ __('home.Read more') }}</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <nav aria-label="Page navigation example" class="d-flex justify-content-center">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">{{ __('home.Previous') }}</span>
                            </a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">{{ __('home.Next') }}</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            @endif
        </div>
    </div>

@endsection
