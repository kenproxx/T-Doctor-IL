@extends('layouts.master')
@section('title', 'Specialist')
@section('content')
    <link rel="stylesheet" href="{{asset('css/homeSpecialist.css')}}">
    @include('layouts.partials.header')
    <div class="container">
        <div class="danh-sach-theo-chuyen-khoa">
            <div class="title-findDoctor--homeNew">
                <span class="py-3 text-center">{{ __('home.Danh sách') }}</span>
            </div>
            <div class="d-flex nav-header--homeNew justify-content-center mt-3">
                <ul class="nav nav-pills nav-fill d-flex justify-content-between">
                    <li class="nav-item">
                        <a class="nav-link active font-14-mobi" id="clinicList-tab" data-toggle="tab"
                           href="#clinicList"
                           role="tab" aria-controls="clinicList"
                           aria-selected="true">{{ __('home.Bệnh viện') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link font-14-mobi" id="pharmacies-tab" data-toggle="tab"
                           href="#pharmacies"
                           role="tab" aria-controls="pharmacies"
                           aria-selected="false">{{ __('home.Phòng khám') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link font-14-mobi" id="doctorList-tab" data-toggle="tab" href="#doctorList"
                           role="tab" aria-controls="doctorList"
                           aria-selected="true">{{ __('home.Bác sĩ') }}</a>
                    </li>
                </ul>
            </div>
            <div class="tab-content mt-4" id="myTabContent">
                <div class="tab-pane fade show active" id="clinicList" role="tabpanel"
                     aria-labelledby="clinicList-tab">
                 111
                </div>
                <div class="tab-pane fade" id="pharmacies" role="tabpanel" aria-labelledby="pharmacies-tab">
                   22
                </div>
                <div class="tab-pane fade" id="doctorList" role="tabpanel" aria-labelledby="doctorList-tab">
                    <div class="section1-content mt-5">
                        <div class="px-5 py-2">
                            <div class="content__item d-flex gap-3">
                                <img
                                    class="content__item__image"
                                    src="{{asset('img/icons_logo/image 1.jpeg')}}"
                                    alt=""
                                />
                                <div>
                                    <h6>
                                        {{ __('home.Nhận liền tay voucher khám online trị giá 250k từ Phòng khám Med247') }}
                                    </h6>
                                    <p>
                                        {{ __('home.Chiều qua, nhận được cuộc gọi của một đồng nghiệp, hỏi ý kiến về một cô gái bị mù mắt sau khi được tiêm chất làm đầy. Dù đã có ...') }}
                                    </p>
                                    <p class="content__item-link">{{ __('home.Read') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
