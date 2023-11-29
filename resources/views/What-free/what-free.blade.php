@extends('layouts.master')
@section('title', 'What free')
@section('content')
    @include('layouts.partials.header')
    @include('component.banner')

    <style>
        .text-short-description {
            max-height: calc(3 * (2.2em));
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: pre-line;
        }

    </style>
    <div class="container">
        @include('What-free.header-wFree')
        <div class="clinics-list">
            <div class="clinics-header margin-bottom-32 border-bottom">
                <div class="justify-content-between align-items-center d-flex mt-4 mb-2">
                    <div class="ac-text_content ">{{ __('home.Free today') }}</div>
                    <div class="flea-content-product"><a href="{{route('what.free.to.day')}}">{{ __('home.See all') }}</a></div>
                </div>
            </div>
            <div class="body row">
                @foreach($coupons as $coupon)
                    <div class="col-md-4 mb-30">
                        <div class="border-16px color-Grey-Dark">
                            <div class="w-100"><img class="w-100" style="max-height: 300px; object-fit: cover; height: 300px" src="{{asset($coupon->thumbnail)}}">
                            </div>
                            <a href="{{route('what.free.detail', $coupon->id)}}">
                                <div class="mt-3 flea-content-product">{{ $coupon->title }}
                                </div>
                                <div class="text-gray mt-2 text-short-description">{!! $coupon->short_description !!}
                                </div>
                            </a>
                            <div class="justify-content-between d-flex mt-2"><i
                                    class="fa-solid fa-user-group d-flex align-items-center"><p
                                        class="flea-content-product ml-4">{{ $coupon->registered }}
                                        /{{ $coupon->max_register }}</p></i><i
                                    class="fa-regular fa-clock d-flex align-items-center"><p class="header-center ml-2">
                                        {{ $coupon->endDate }}</p></i></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
