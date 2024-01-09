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
                                Bệnh viện đa khoa Hà Đông
                            </div>
                            <div class="address-specialList-clinics">
                                <i class="fas fa-map-marker-alt"></i>
                                Toà V7-B7 The Terra An Hưng, La Khê, Hà Đông
                            </div>
                            <div class="time-working">
                                <i class="fa-solid fa-clock"></i>
                                Mon - Sun | 8am - 20pm
                            </div>
                            <div class="group-button d-flex mt-3">
                                <a href="{{route('home.specialist.detail')}}" class="mr-2">
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
                    <div class="container">

                    </div>
                </div>
                <div class="tab-pane fade" id="pharmacies" role="tabpanel" aria-labelledby="pharmacies-tab">
                    <div class="row">
                        <div class="specialList-clinics col-md-6 mt-5">
                            <div class="border-specialList">
                                <div class="content__item d-flex gap-3">
                                    <div class="specialList-clinics--img">
                                        <img class="content__item__image" src="{{asset('img/icons_logo/image 1.jpeg')}}"
                                             alt=""/>
                                    </div>
                                    <div class="specialList-clinics--main">
                                        <div class="title-specialList-clinics">
                                            Bệnh viện đa khoa Hà Đông
                                        </div>
                                        <div class="address-specialList-clinics">
                                            <i class="fas fa-map-marker-alt"></i>
                                            Toà V7-B7 The Terra An Hưng, La Khê, Hà Đông
                                            - <span>3 Km</span>
                                        </div>
                                        <div class="time-working">
                                            <span class="color-timeWorking">
                                                09:00 - 19:00
                                            </span>
                                            <span>
                                                 / Dental Clinic
                                            </span>
                                        </div>
                                        <div class="group-button d-flex mt-3">
                                            <a href="" class="col-md-6">
                                                <div class="button-booking-specialList">
                                                    Đặt khám
                                                </div>
                                            </a>
                                            <a href="" class="col-md-6">
                                                <div class="button-detail-specialList">
                                                    Xem chi tiết
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="doctorList" role="tabpanel" aria-labelledby="doctorList-tab">
                    222
                </div>
            </div>
        </div>
    </div>
@endsection
