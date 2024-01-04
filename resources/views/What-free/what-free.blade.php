@extends('layouts.master')
@section('title', 'What free')
@section('content')
    @include('layouts.partials.header')
    @include('component.banner')

    <link href="{{ asset('css/whatfree.css') }}" rel="stylesheet">
    <div class="container">
        @include('What-free.header-wFree')

        <div class="clinics-list">
            <div class="clinics-header margin-bottom-32 border-bottom">
                <div class="justify-content-between align-items-center d-flex mt-4 mb-2">
                    <div class="ac-text_content ">{{ __('home.Free today') }}</div>
                    <div class="flea-content-product"><a
                            href="{{route('what.free.to.day')}}">{{ __('home.See all') }}</a></div>
                </div>
            </div>
            <div class="body row">
                @if(count($coupons_freeToDay) > 0)
                    @foreach($coupons_freeToDay as $coupon)
                        @include('What-free.component-what-free', ['coupon' => $coupon])
                    @endforeach
                @else
                    <h3 class="no-data text-center">{{ __('home.no data') }}</h3>
                @endif
            </div>
        </div>
        <div class="clinics-list">
            <div class="clinics-header margin-bottom-32 border-bottom">
                <div class="justify-content-between align-items-center d-flex mt-4 mb-2">
                    <div class="ac-text_content ">{{ __('home.Free with mission') }}</div>
                    <div class="flea-content-product"><a
                            href="{{route('what.free.to.day')}}">{{ __('home.See all') }}</a></div>
                </div>
            </div>
            <div class="body row">
                @if(count($coupons_withMission) > 0)
                    @foreach($coupons_withMission as $coupon)
                        @include('What-free.component-what-free', ['coupon' => $coupon])
                    @endforeach
                @else
                    <h3 class="no-data text-center">{{ __('home.no data') }}</h3>
                @endif
            </div>
        </div>
        <div class="clinics-list">
            <div class="clinics-header margin-bottom-32 border-bottom">
                <div class="justify-content-between align-items-center d-flex mt-4 mb-2">
                    <div class="ac-text_content ">{{ __('home.Discounted sevice') }}</div>
                    <div class="flea-content-product"><a
                            href="{{route('what.free.to.day')}}">{{ __('home.See all') }}</a></div>
                </div>
            </div>
            <div class="body row">
                @if(count($coupons_discount) > 0)
                    @foreach($coupons_discount as $coupon)
                        @include('What-free.component-what-free', ['coupon' => $coupon])
                    @endforeach
                @else
                    <h3 class="no-data text-center">{{ __('home.no data') }}</h3>
                @endif
            </div>
        </div>
    </div>
@endsection
