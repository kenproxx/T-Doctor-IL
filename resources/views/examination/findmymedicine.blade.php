@extends('layouts.master')
@section('title', 'Home')
@section('content')
    @include('layouts.partials.header_3')
    @include('component.banner')
    <div id="examination-scene" class="container ">
        <div class="d-flex justify-content-center">
            <div id="filter" class="box--1 d-flex ">
                <div class="d-flex flex-fill">
                    <div class="filter_option"><p>Category <i class="bi bi-chevron-expand"></i></p></div>
                    <div class="filter_option"><p>Location <i class="bi bi-chevron-expand"></i></p></div>
                </div>
                <div class="filter_search flex-fill d-flex align-content-center p-0"
                     style="background-color: #F3F3F3!important;">
                    <button style="background-color: #F3F3F3;color: #000"><i class="bi bi-search"
                                                                             style="font-size: 25px; font-weight: 600"></i>
                    </button>
                    <input style="border: none" type="text" name="filter_search" id="filter_search"
                           placeholder="Search for anything.....">
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <div class=" list-title d-flex">
                <div class="list--doctor p-0">
                    <p>Best Pharmacists</p>
                </div>
                <div class="ms-auto p-2"><a href="{{route('examination.bestpharmacists')}}">See all</a></div>
            </div>
        </div>
        <div class="d-flex justify-content-center list-doctor">
            @if(count($bestPhamrmacists) > 0)
                @foreach($bestPhamrmacists as $bestPhamrmacist)
                    <div class="card">
                        <i class="bi bi-heart"></i>
                        @php
                            $arrayGallery=[];
                            $gallery = $bestPhamrmacist->gallery;
                            if ($gallery){
                                $arrayGallery = explode(',', $gallery);
                            }
                            $text = '';
                            switch ($bestPhamrmacist->time_work){
                                case \App\Enums\TypeTimeWork::ALL:
                                    $text = '24/7';
                                    break;
                                case \App\Enums\TypeTimeWork::OTHER:
                                    $text = 'Other';
                                    break;
                                case \App\Enums\TypeTimeWork::ONLY_MORNING:
                                    $text = 'All morning';
                                    break;
                                case \App\Enums\TypeTimeWork::ONLY_AFTERNOON:
                                    $text = 'All afternoon';
                                    break;
                                default:
                                    $text = 'Private';
                                    break;

                            }

                        @endphp
                        @if(count($arrayGallery) > 0)
                            <img src="{{asset($arrayGallery[0])}}" class="card-img-top" alt="...">
                        @endif
                        <div class="card-body">
                            <a href="#"><h5
                                        class="card-title"> {{ $bestPhamrmacist->name }}</h5></a>
                            <p class="card-text_1">Location: <b>{{ $bestPhamrmacist->address_detail }}</b></p>
                            <p class="card-text_1">Working time: <b> {{ $text }}</b></p>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        <div class="d-flex justify-content-center">
            <div class=" list-title d-flex">
                <div class="list--doctor p-0">
                    <p>New Pharmacists</p>
                </div>
                <div class="ms-auto p-2"><a href="{{route('examination.newpharmacists')}}">See all</a></div>
            </div>
        </div>
        <div class="d-flex justify-content-center list-doctor">
            @if(count($newPhamrmacists) > 0)
                @foreach($newPhamrmacists as $newPhamrmacist)
                    <div class="card">
                        <i class="bi bi-heart"></i>
                        @php
                            $arrayGallery=[];
                            $gallery = $newPhamrmacist->gallery;
                            if ($gallery){
                                $arrayGallery = explode(',', $gallery);
                            }
                            $text = '';
                            switch ($newPhamrmacist->time_work){
                                case \App\Enums\TypeTimeWork::ALL:
                                    $text = '24/7';
                                    break;
                                case \App\Enums\TypeTimeWork::OTHER:
                                    $text = 'Other';
                                    break;
                                case \App\Enums\TypeTimeWork::ONLY_MORNING:
                                    $text = 'All morning';
                                    break;
                                case \App\Enums\TypeTimeWork::ONLY_AFTERNOON:
                                    $text = 'All afternoon';
                                    break;
                                default:
                                    $text = 'Private';
                                    break;

                            }

                        @endphp
                        @if(count($arrayGallery) > 0)
                            <img src="{{asset($arrayGallery[0])}}" class="card-img-top" alt="...">
                        @endif
                        <div class="card-body">
                            <a href="#"><h5
                                    class="card-title"> {{ $newPhamrmacist->name }}</h5></a>
                            <p class="card-text_1">Location: <b>{{ $newPhamrmacist->address_detail }}</b></p>
                            <p class="card-text_1">Working time: <b> {{ $text }}</b></p>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        <div class="d-flex justify-content-center">
            <div class=" list-title d-flex">
                <div class="list--doctor p-0">
                    <p>24/7 Available Pharmacists</p>
                </div>
                <div class="ms-auto p-2"><a href="{{route('examination.availablepharmacists')}}">See all</a></div>
            </div>
        </div>
        <div class="d-flex justify-content-center list-doctor">
            @if(count($allPhamrmacists) > 0)
                @foreach($allPhamrmacists as $allPhamrmacist)
                    <div class="card">
                        <i class="bi bi-heart"></i>
                        @php
                            $arrayGallery=[];
                            $gallery = $allPhamrmacist->gallery;
                            if ($gallery){
                                $arrayGallery = explode(',', $gallery);
                            }
                            $text = '';
                            switch ($allPhamrmacist->time_work){
                                case \App\Enums\TypeTimeWork::ALL:
                                    $text = '24/7';
                                    break;
                                case \App\Enums\TypeTimeWork::OTHER:
                                    $text = 'Other';
                                    break;
                                case \App\Enums\TypeTimeWork::ONLY_MORNING:
                                    $text = 'All morning';
                                    break;
                                case \App\Enums\TypeTimeWork::ONLY_AFTERNOON:
                                    $text = 'All afternoon';
                                    break;
                                default:
                                    $text = 'Private';
                                    break;

                            }

                        @endphp
                        @if(count($arrayGallery) > 0)
                            <img src="{{asset($arrayGallery[0])}}" class="card-img-top" alt="...">
                        @endif
                        <div class="card-body">
                            <a href="#"><h5
                                    class="card-title"> {{ $allPhamrmacist->name }}</h5></a>
                            <p class="card-text_1">Location: <b>{{ $allPhamrmacist->address_detail }}</b></p>
                            <p class="card-text_1">Working time: <b> {{ $text }}</b></p>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        <div class="d-flex justify-content-center">
            <div class=" list-title d-flex">
                <div class="list--doctor p-0">
                    <p>Hot deal medicine</p>
                </div>
                <div class="ms-auto p-2"><a href="{{route('examination.hotdealmedicine')}}">See all</a></div>
            </div>
        </div>
        <div class="d-flex justify-content-center list-doctor">

        </div>
        <div class="d-flex justify-content-center">
            <div class=" list-title d-flex">
                <div class="list--doctor p-0">
                    <p>New medicine</p>
                </div>
                <div class="ms-auto p-2"><a href="{{route('examination.newmedicine')}}">See all</a></div>
            </div>
        </div>
        <div class="d-flex justify-content-center list-doctor">

        </div>
        <div class="d-flex justify-content-center">
            <div class=" list-title d-flex">
                <div class="list--doctor p-0">
                    <p>Recommended</p>
                </div>
                <div class="ms-auto p-2"><a href="{{route('examination.recommended')}}">See all</a></div>
            </div>
        </div>
        <div class="d-flex justify-content-center list-doctor">

        </div>
    </div>

@endsection

