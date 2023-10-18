@extends('layouts.master')
@section('title', 'What free')
@section('content')
    @include('layouts.partials.header')
    @include('component.banner')
    <div class="container">
        @include('What-free.header-wFree')
        <div class="clinics-list">
            <div class="clinics-header margin-bottom-32 border-bottom">
                <div class="justify-content-between align-items-center d-flex mt-4 mb-2">
                    <div class="ac-text_content ">Free today</div>
                    <div class="flea-content-product"><a href="{{route('what.free.to.day')}}">See all</a></div>
                </div>
            </div>
            <div class="body row">
                @for($i = 0; $i < 9; $i++)
                    <div class="col-md-4 mb-30">
                        @include('component.what-free')
                    </div>
                @endfor
            </div>
        </div>
        <div class="clinics-list">
            <div class="clinics-header margin-bottom-32 border-bottom">
                <div class="justify-content-between align-items-center d-flex mt-4 mb-2">
                    <div class="ac-text_content ">Free with mission</div>
                    <div class="flea-content-product"><a href="{{route('what.free.with.mission')}}">See all</a></div>
                </div>
            </div>
            <div class="body row">
                @for($i = 0; $i < 9; $i++)
                    <div class="col-md-4 mb-30">
                        @include('component.what-free')
                    </div>
                @endfor
            </div>
        </div>
        <div class="clinics-list">
            <div class="clinics-header margin-bottom-32 border-bottom">
                <div class="justify-content-between align-items-center d-flex mt-4 mb-2">
                    <div class="ac-text_content ">Discounted sevice</div>
                    <div class="flea-content-product"><a href="{{route('what.free.discounted.service')}}">See all</a></div>
                </div>
            </div>
            <div class="body row">
                @for($i = 0; $i < 9; $i++)
                    <div class="col-md-4 mb-30">
                        @include('component.what-free')
                    </div>
                @endfor
            </div>
        </div>
    </div>
@endsection
