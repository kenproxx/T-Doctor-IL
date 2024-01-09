@php use App\Models\Province;

@endphp
@extends('layouts.master')
@section('title', 'Detail')
@section('content')
    <link rel="stylesheet" href="{{asset('css/homeSpecialist.css')}}">
    @include('layouts.partials.header')
    <div class="container">
        <div class="detail-clinic-theo-chuyen-khoa-title">
            <a href="{{route('home.specialist')}}">
                <div class="title-detail-clinic"><i class="fa-solid fa-arrow-left"></i> Chi tiết</div>
            </a>
            <div class="specialList-clinics col-md-12 mt-5">
                <div class="border-specialList">
                    <div class="content__item d-flex gap-3">
                        <div class="specialList-clinics--img">
                            <img class="content__item__image" src="{{asset('img/icons_logo/image 1.jpeg')}}"
                                 alt=""/>
                        </div>
                        <div class="specialList-clinics--main">
                            <div class="title-specialList-clinics">
                                {{$clinicDetail->name}}
                            </div>
                            <div class="address-specialList-clinics d-flex">
                                <i class="fas fa-map-marker-alt"></i>
                                @php
                                    $array = explode(',', $clinicDetail->address);
                                    $addressP = Province::where('id', $array[1] ?? null)->first();
                                    $addressD = \App\Models\District::where('id', $array[2] ?? null)->first();
                                    $addressC = \App\Models\Commune::where('id', $array[3] ?? null)->first();
                                @endphp
                                <div class="ml-1">{{$clinicDetail->address_detail}}
                                    , {{$addressC->name ?? ''}} , {{$addressD->name ?? ''}}
                                    , {{$addressP->name ?? ''}}</div>
                            </div>
                            <div class="time-working">
                                <i class="fa-solid fa-clock"></i>
                                {{$clinicDetail->time_work}} | {{ \Carbon\Carbon::parse($clinicDetail->open_date)->format('H:i') }} - {{ \Carbon\Carbon::parse($clinicDetail->close_date)->format('H:i') }}
                            </div>
                            <div class="group-button d-flex mt-3">
                                <a href="" class="mr-2">
                                    <div class="button-follow-specialList">
                                        Theo dõi
                                    </div>
                                </a>
                                <a href="" class="">
                                    <div class="button-direct-specialList">
                                        Chỉ đường
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="detail-clinic-theo-chuyen-khoa-main">
            <div class="d-flex nav-header--homeNew mt-3">
                <ul class="nav nav-pills nav-fill d-flex justify-content-between">
                    <li class="nav-item">
                        <a class="nav-link active font-14-mobi" id="clinicList-tab" data-toggle="tab"
                           href="#clinicList"
                           role="tab" aria-controls="clinicList"
                           aria-selected="true">{{ __('home.Giới thiệu') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link font-14-mobi" id="pharmacies-tab" data-toggle="tab"
                           href="#pharmacies"
                           role="tab" aria-controls="pharmacies"
                           aria-selected="false">{{ __('home.Hình ảnh') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link font-14-mobi" id="doctorList-tab" data-toggle="tab" href="#doctorList"
                           role="tab" aria-controls="doctorList"
                           aria-selected="true">{{ __('home.Đánh giá') }}</a>
                    </li>
                </ul>
            </div>
            <div class="tab-content mt-4" id="myTabContent">
                <div class="tab-pane fade show active" id="clinicList" role="tabpanel"
                     aria-labelledby="clinicList-tab">
                    <div class="">
                        {!! $clinicDetail->introduce !!}
                    </div>
                </div>
                <div class="tab-pane fade" id="pharmacies" role="tabpanel" aria-labelledby="pharmacies-tab">
                    <div class="row">
                        @php
                            $galleryArray = explode(',', $clinicDetail->gallery);
                        @endphp
                        @foreach($galleryArray as $gallery)
                            <img class="p-0"
                                 style="width: 370px;
                                 height: 365px;
                                 object-fit: cover;
                                 border-radius: 16px;

                                 "
                                 src="{{$gallery}}" alt="">
                        @endforeach
                    </div>
                </div>
                <div class="tab-pane fade" id="doctorList" role="tabpanel" aria-labelledby="doctorList-tab">
                    222
                </div>
            </div>
        </div>
    </div>
@endsection
