@php use App\Enums\NewEventStatus;use App\Models\NewEvent;use App\Models\Province;

@endphp
@extends('layouts.master')
@section('title', 'Home')
@section('content')
    <style>
        .border-flea-market {
            border-radius: 16px;
            padding: 16px;
        }

        .object-fit-cover {
            object-fit: cover;
        }

        .title-div-flea-market {
            white-space: nowrap;
            overflow: hidden;
        }

        .background-modal {
            background: #FFFFFF;
            max-height: 820px;
            overflow-y: scroll;
            margin: 20px;
        }

        ::-webkit-scrollbar {
            display: none;
        }

        .border-button-close {
            position: absolute;
            right: 10px;
            top: 10px;
            display: flex;
            align-items: flex-start;
            gap: 10px;
        }

        .border-button-close span {
            padding: 0 5px;
            border-radius: 32px;
            background: #FFF;
        }

        .gm-style-iw {
            padding: 0 !important;
        }

        button.gm-ui-hover-effect {
            top: 10px !important;
            right: 10px !important;
            border-radius: 20px !important;
            background: white !important;
        }

        .background-modal {
            max-width: 400px;
        }

        .button-follow {
            max-height: 30px;
        }
    </style>
    @include('layouts.partials.header')
    @include('component.banner')
    <div>
        <div class="section1 d-flex justify-content-evenly">
            <div class="section1__side">
                <div class="section1__side_1">
                    <img src="{{asset('img/image 16.png')}}" alt="" style="width:165px; height: 313px">
                </div>
                <div class="section1__side_2">
                    <img src="{{asset('img/banner33.png')}}" alt="" style="width:165px; height: 313px">
                </div>

            </div>
            <div class="section1-main d-flex">
                <div class="section1__item order-1">
                    <div class="section1-label position-relative">
                        <h3 class="py-3 text-center">{{ __('home.WHAT’S FREE') }} ?</h3>
                        <a href="#"><p class="section1_link">{{ __('home.See all') }}</p></a>
                    </div>
                    <div class="d-flex">
                        <ul class="nav nav-pills nav-fill d-flex justify-content-between w-100">
                            <li class="nav-item">
                                <a class="nav-link active font-14-mobi" id="home-tab" data-toggle="tab" href="#home"
                                   role="tab" aria-controls="home" aria-selected="true">{{ __('home.Free today') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link font-14-mobi" id="profile-tab" data-toggle="tab" href="#profile"
                                   role="tab" aria-controls="profile"
                                   aria-selected="false">{{ __('home.Free with mission') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link font-14-mobi" id="contact-tab" data-toggle="tab" href="#contact"
                                   role="tab" aria-controls="home"
                                   aria-selected="true">{{ __('home.Discounted service') }}</a>
                            </li>
                        </ul>
                    </div>

                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="section1-content">
                                @foreach($coupons as $coupon)
                                    <a href="{{ route('what.free.detail', $coupon->id) }}" target="_blank">
                                        <div class="px-5 py-2">
                                            <div class="content__item d-flex gap-3">
                                                <img
                                                    class="content__item__image"
                                                    src="{{asset($coupon->thumbnail ?? 'img/icons_logo/image 1.jpeg')}}"
                                                    alt=""
                                                />
                                                <div class="w-100 overflow-hidden">
                                                    <h6>
                                                        {!! $coupon->title !!}
                                                    </h6>
                                                    <div class="content__item__describe">
                                                        {!! $coupon->short_description !!}
                                                    </div>
                                                    <p class="content__item-link">{{ __('home.Read') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>

                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="section1-content">
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
                                            <div class="content__item__describe">
                                                {{ __('home.Chiều qua, nhận được cuộc gọi của một đồng nghiệp, hỏi ý kiến về một cô gái bị mù mắt sau khi được tiêm chất làm đầy. Dù đã có ...') }}
                                            </div>
                                            <p class="content__item-link">{{ __('home.Read') }}</p>
                                        </div>
                                    </div>
                                </div>
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
                                            <div class="content__item__describe">
                                                {{ __('home.Chiều qua, nhận được cuộc gọi của một đồng nghiệp, hỏi ý kiến về một cô gái bị mù mắt sau khi được tiêm chất làm đầy. Dù đã có ...') }}
                                            </div>
                                            <p class="content__item-link">{{ __('home.Read') }}</p>
                                        </div>
                                    </div>
                                </div>
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
                                            <div class="content__item__describe">
                                                {{ __('home.Chiều qua, nhận được cuộc gọi của một đồng nghiệp, hỏi ý kiến về một cô gái bị mù mắt sau khi được tiêm chất làm đầy. Dù đã có ...') }}
                                            </div>
                                            <p class="content__item-link">{{ __('home.Read') }}</p>
                                        </div>
                                    </div>
                                </div>
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
                                            <div class="content__item__describe">
                                                {{ __('home.Chiều qua, nhận được cuộc gọi của một đồng nghiệp, hỏi ý kiến về một cô gái bị mù mắt sau khi được tiêm chất làm đầy. Dù đã có ...') }}
                                            </div>
                                            <p class="content__item-link">{{ __('home.Read') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
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
                <div class="section1__item order-1">
                    <div class="section1-label position-relative">
                        <h3 class="py-3 text-center">{{ __('home.News / Events') }}</h3>
                        <a href="#"><p class="section1_link">{{ __('home.See all') }}</p></a>
                    </div>
                    <div class="d-flex col-md-6 p-0">
                        <ul class="nav nav-pills nav-fill d-flex w-100">
                            <li class="nav-item col-md-6 justify-content-center p-0">
                                <a class="nav-link active font-14-mobi" id="News-tab" data-toggle="tab" href="#News"
                                   role="tab" aria-controls="home" aria-selected="true">{{ __('home.News') }}</a>
                            </li>
                            <li class="nav-item col-md-6 justify-content-center">
                                <a class="nav-link font-14-mobi" id="review-tab" data-toggle="tab" href="#review"
                                   role="tab" aria-controls="profile" aria-selected="false">{{ __('home.Event') }}</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="News" role="tabpanel" aria-labelledby="News-tab">
                            <div class="section1-content">
                                @php
                                    $listNews = NewEvent::where('status', NewEventStatus::ACTIVE)
                                        ->where('type', 'NEWS')
                                        ->orderBy('created_at', 'desc')
                                        ->get();
                                @endphp
                                @foreach($listNews as $news)
                                    <div class="px-5 py-2">
                                        <a href="{{route('detail.new',$news->id)}}">
                                            <div class="content__item d-flex gap-3">
                                                <img
                                                    class="content__item__image"
                                                    src="{{$news->thumbnail}}"
                                                    alt=""
                                                />
                                                <div>
                                                    <h6>
                                                        {{$news->title}}
                                                    </h6>
                                                    <div class="content__item__describe">
                                                        {!!   $news->short_description  !!}
                                                    </div>
                                                    <p class="content__item-link">{{ __('home.Read') }}</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                            <div class="section1-content">
                                @php
                                    $listEvent = NewEvent::where('status', NewEventStatus::ACTIVE)
                                      ->where('type', 'EVENT')
                                      ->orderBy('created_at', 'desc')
                                      ->get();
                                @endphp
                                @foreach($listEvent as $event)
                                    <div class="px-5 py-2">
                                        <a href="{{route('detail.new',$event->id)}}">
                                            <div class="content__item d-flex gap-3">
                                                <img
                                                    class="content__item__image"
                                                    src="{{$event->thumbnail}}"
                                                    alt=""
                                                />
                                                <div>
                                                    <h6>
                                                        {{$event->title}}
                                                    </h6>
                                                    <div class="content__item__describe">
                                                        {!!   $event->short_description  !!}
                                                    </div>
                                                    <p class="content__item-link">{{ __('home.Read') }}</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section1__side">
                <div class="section1__side_1">
                    <img src="{{asset('img/banner44.png')}}" alt="" style="width:165px; height: 313px">
                </div>
                <div class="section1__side_2">
                    <img src="{{asset('img/banner55.png')}}" alt="" style="width:165px; height: 313px">
                </div>
            </div>
        </div>
    </div>
    <div class="banner1">
        <img src="{{asset('img/Rectangle 23815.png')}}" alt="">
    </div>
    <div id="map-location" class="d-flex justify-content-center">
        <div class="content-item  justify-content-center">
            <div class="title-clinics">
                <h2>{{ __('home.Clinics/Pharmacies') }}</h2>
                <p>{{ __('home.Find your suitable clinics/pharmacies and book now') }}!</p>
            </div>
            <div class="d-flex">
                <div id="allAddressesMap" class="p-2 w-100">

                </div>
                <div id="describe" class="p-2">
                    <div class="describe-item">
                        <h3>{{ __('home.24/7 AVAILABLE') }}</h3>
                        <p>{{ __('home.You can find available clinics/pharmacies') }}</p>
                    </div>
                    <div class="describe-item" hidden="">
                        <h3>{{ __('home.HOME CARE SERVICE') }}</h3>
                        <p>{{ __("home.Don't come to us! We will come to you") }}!</p>
                    </div>
                    <div class="describe-item">
                        <h3>{{ __('home.MANY LOCATION') }}</h3>
                        <p>{{ __('home.More than 1500 Doctors, 1000 Pharmacists, 1000 Hospitals always wait for you') }}</p>
                    </div>
                    <button class="btn-visit mt-45">{{ __('home.Visit') }}</button>
                </div>
            </div>

        </div>
    </div>
    <div id="doctor-information" style="padding-top: 15px">
        <h1>{{ __('home.Find a doctor') }}</h1>
        <div id="list-option" class="d-flex justify-content-around ">
            <div class="option-menu d-flex justify-content-center">
                <ul class="nav nav-pills nav-fill">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">{{ __('home.24/7 AVAILABLE') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">{{ __('home.Find my medicine') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">{{ __('home.Mentoring') }}</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="container">
            @php
                $doctors = \App\Models\User::where('member', \App\Enums\TypeUser::DOCTORS)->get();
            @endphp
            <div id="list-doctor" class="d-flex row  pb-md-3">
                @foreach($doctors as $doctor)
                    <div class="col-md-3 mt-3">
                        <a href="{{ route('examination.doctor_info', $doctor->id) }}" target="_blank">
                            <div class="bg-list-doctor">
                                <div><i class="bi bi-heart heart-item"></i><img class="b-radius-8px max-img"
                                                                                src="{{$doctor->avt}}"></div>
                                <div class="d-content">
                                    <div class="fs-18px">{{$doctor->name}}</div>
                                    <div class="respiratory">{!! $doctor->service !!}</div>
                                    <div class="d-flex  location-doc">{{ __('home.Location') }}: <p
                                            class="fs-16px">{{$doctor->name}}</p>
                                    </div>
                                    <div class="d-flex  location-doc">{{ __('home.Working time') }}:<p
                                            class="fs-16px">{{$doctor->time_working_1}}</p></div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="banner1">
        <img src="{{asset('img/Rectangle 23815.png')}}" alt="">
    </div>
    <div id="recruitment_board" class="d-flex justify-content-center">
        <div id="content-bkg" class="content-item d-flex justify-content-center ">
            <div id="recruitment" class="p-2 w-100">
                <h2>{{ __('home.Recruitment') }}</h2>
                <p>{{ __('home.Hire staffs cheaper, find your staffs faster') }}</p>
                <div>
                    <div class="section1-content">
                        <div class="item-bkg">
                            <div class="recruitment__item d-flex ">
                                <img
                                    class="content__item__image"
                                    src="{{asset('img/icons_logo/image 1.jpeg')}}"
                                    alt=""
                                />
                                <div>
                                    <h6>
                                        {{ __('home.Nhận liền tay voucher khám online trị giá 250k từ Phòng khám Med247') }}
                                    </h6>
                                    <div class="content__item__describe">
                                        {{ __('home.Chiều qua, nhận được cuộc gọi của một đồng nghiệp, hỏi ý kiến về một cô gái bị mù mắt sau khi được tiêm chất làm đầy. Dù đã có ...') }}
                                    </div>
                                    <p class="content__item-link">{{ __('home.Read') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="item-bkg">
                            <div class="recruitment__item d-flex ">
                                <img
                                    class="content__item__image"
                                    src="{{asset('img/icons_logo/image 1.jpeg')}}"
                                    alt=""
                                />
                                <div>
                                    <h6>
                                        {{ __('home.Nhận liền tay voucher khám online trị giá 250k từ Phòng khám Med247') }}
                                    </h6>
                                    <div class="content__item__describe">
                                        {{ __('home.Chiều qua, nhận được cuộc gọi của một đồng nghiệp, hỏi ý kiến về một cô gái bị mù mắt sau khi được tiêm chất làm đầy. Dù đã có ...') }}
                                    </div>
                                    <p class="content__item-link">{{ __('home.Read') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="item-bkg">
                            <div class="recruitment__item d-flex ">
                                <img
                                    class="content__item__image"
                                    src="{{asset('img/icons_logo/image 1.jpeg')}}"
                                    alt=""
                                />
                                <div>
                                    <h6>
                                        {{ __('home.Nhận liền tay voucher khám online trị giá 250k từ Phòng khám Med247') }}
                                    </h6>
                                    <div class="content__item__describe">
                                        {{ __('home.Chiều qua, nhận được cuộc gọi của một đồng nghiệp, hỏi ý kiến về một cô gái bị mù mắt sau khi được tiêm chất làm đầy. Dù đã có ...') }}
                                    </div>
                                    <p class="content__item-link">{{ __('home.Read') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="item-bkg">
                            <div class="recruitment__item d-flex ">
                                <img
                                    class="content__item__image"
                                    src="{{asset('img/icons_logo/image 1.jpeg')}}"
                                    alt=""
                                />
                                <div>
                                    <h6>
                                        {{ __('home.Nhận liền tay voucher khám online trị giá 250k từ Phòng khám Med247') }}
                                    </h6>
                                    <div class="content__item__describe">
                                        {{ __('home.Chiều qua, nhận được cuộc gọi của một đồng nghiệp, hỏi ý kiến về một cô gái bị mù mắt sau khi được tiêm chất làm đầy. Dù đã có ...') }}
                                    </div>
                                    <p class="content__item-link">{{ __('home.Read') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="describe" class="d-flex align-items-center flex-column mb-3">
                <div class="p-5 w-100">
                    <div class="describe-item">
                        <h3>{{ __('home.24/7 AVAILABLE') }}</h3>
                        <p>{{ __('home.You can find available clinics/pharmacies') }}</p>
                    </div>
                    <div class="describe-item" hidden="">
                        <h3>{{ __('home.HOME CARE SERVICE') }}</h3>
                        <p>{{ __("home.Don't come to us! We will come to you") }}!</p>
                    </div>
                    <div class="describe-item">
                        <h3>{{ __('home.MANY LOCATION') }}</h3>
                        <p>{{ __('home.More than 1500 Doctors, 1000 Pharmacists, 1000 Hospitals always wait for you') }}</p>
                    </div>
                </div>
                <div class="mt-auto p-2">
                    <button class="btn-see-all ">{{ __('home.See all') }}</button>
                </div>
            </div>
        </div>
    </div>
    <div class="banner1">
        <img src="{{asset('img/Rectangle 23815.png')}}" alt="" style="">
    </div>
    <div id="flea_market_board" class="d-flex justify-content-center">
        <div id="content-bkg" class="col-10 content-item d-flex justify-content-center ">
            <div id="flea-market" class="col-8 p-2 w-100">
                <h2>{{ __('home.Flea market') }}</h2>
                <p>{{ __('home.Hire staffs cheaper, find your staffs faster') }}</p>
                <div class="section1-content">

                    <div class="row">
                        @foreach($products as $product)
                            <div class="col-sm-4 pt-4">
                                <a href="{{ route('flea.market.product.detail', $product->id) }}" target="_blank">
                                    <div class="card border-flea-market" style="height: 342px">
                                        <img src="{{asset($product->thumbnail ?? 'img/item_shopping.png')}}"
                                             class="card-img-top object-fit-cover" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title title-div-flea-market">{{ $product->name }}</h5>
                                            @if($product->province_id)
                                                @php
                                                    $province = Province::find($product->province_id);
                                                @endphp
                                                @if($province)
                                                    <p class="card-text">Location: <b>{{ $province->name}}</b></p>
                                                @endif
                                            @endif
                                            <h4>{{ $product->price }}</h4>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
            <div id="describe" class="d-flex align-items-center flex-column mb-3">
                <div class="p-5 w-100">
                    <div class="describe-item">
                        <h3>{{ __('home.24/7 AVAILABLE') }}</h3>
                        <p>{{ __('home.You can find available clinics/pharmacies') }}</p>
                    </div>
                    <div class="describe-item" hidden="">
                        <h3>{{ __('home.HOME CARE SERVICE') }}</h3>
                        <p>{{ __("home.Don't come to us! We will come to you") }}!</p>
                    </div>
                    <div class="describe-item">
                        <h3>{{ __('home.MANY LOCATION') }}</h3>
                        <p>{{ __('home.More than 1500 Doctors, 1000 Pharmacists, 1000 Hospitals always wait for you') }}</p>
                    </div>
                </div>
                <div class="mt-auto p-2">
                    <a href="{{ route('flea-market.index') }}">
                    <button class="btn-see-all ">{{ __('home.See all') }}</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="banner1">
        <img src="{{asset('img/Rectangle 23815.png')}}" alt="">
    </div>
    <div id="item-information" style="padding-top: 15px; margin-top: 20px">
        <h1>{{ __('home.Buy online') }}</h1>
        <p>{{ __("home.Don't struggle finding, we are always ready for you") }}</p>
        <div id="list-option" style="padding-top: 15px" class="d-flex justify-content-around ">
            <div class="option-menu d-flex justify-content-center">
                <ul class="nav nav-pills nav-fill">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">{{ __('home.Popular') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">{{ __('home.Recommended') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">{{ __('home.New product') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">{{ __('home.Hot deal') }}</a>
                    </li>
                </ul>
            </div>
        </div>


        <div class="container">
            <div id="list-item" class="d-flex row">
                <div class="col-md-3 mt-3">
                    <div class="card" style="width: 237px; height: 361px">
                        <i class="bi bi-heart"></i>
                        <img src="{{asset('img/item_shopping.png')}}" class="card-img-top" alt="..." width="237px"
                             height="237px">
                        <div class="card-body">
                            <h5 class="card-title">{{ __('home.Máy tạo oxy 5 lít Reiwa K5BW') }}</h5>
                            <p class="card-text">{{ __('home.Location') }}: <b>Hanoi</b></p>
                            <h4>599.000</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mt-3">
                    <div class="card" style="width: 237px; height: 361px">
                        <i class="bi bi-heart"></i>
                        <img src="{{asset('img/item_shopping.png')}}" class="card-img-top" alt="..." width="237px"
                             height="237px">
                        <div class="card-body">
                            <h5 class="card-title">{{ __('home.Máy tạo oxy 5 lít Reiwa K5BW') }}</h5>
                            <p class="card-text">{{ __('home.Location') }}: <b>Hanoi</b></p>
                            <h4>599.000</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mt-3">
                    <div class="card" style="width: 237px; height: 361px">
                        <i class="bi bi-heart"></i>
                        <img src="{{asset('img/item_shopping.png')}}" class="card-img-top" alt="..." width="237px"
                             height="237px">
                        <div class="card-body">
                            <h5 class="card-title">{{ __('home.Máy tạo oxy 5 lít Reiwa K5BW') }}</h5>
                            <p class="card-text">{{ __('home.Location') }}: <b>Hanoi</b></p>
                            <h4>599.000</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mt-3">
                    <div class="card" style="width: 237px; height: 361px">
                        <i class="bi bi-heart"></i>
                        <img src="{{asset('img/item_shopping.png')}}" class="card-img-top" alt="..." width="237px"
                             height="237px">
                        <div class="card-body">
                            <h5 class="card-title">{{ __('home.Máy tạo oxy 5 lít Reiwa K5BW') }}</h5>
                            <p class="card-text">{{ __('home.Location') }}: <b>Hanoi</b></p>
                            <h4>599.000</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                    <a class="page-link">{{ __('home.Previous') }}</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">{{ __('home.Next') }}</a>
                </li>
            </ul>
        </nav>
    </div>
    @php
        $addresses = \App\Models\Clinic::all();
        $coordinatesArray = $addresses->toArray();
    @endphp
    <script>
        function viewCoupon(id) {
            window.location.href = "/coupon/" + id;
        }
    </script>
    <script>
        var locations = {!! json_encode($coordinatesArray) !!};
        var infoWindows = [];

        function getCurrentLocation(callback) {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function (position) {
                    var currentLocation = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };
                    callback(currentLocation);
                });
            } else {
                alert('Geolocation is not supported by this browser.');
            }
        }

        function calculateDistance(lat1, lng1, lat2, lng2) {
            var R = 6371; // Độ dài trung bình của trái đất trong km
            var dLat = toRadians(lat2 - lat1);
            var dLng = toRadians(lng2 - lng1);

            var a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
                Math.cos(toRadians(lat1)) * Math.cos(toRadians(lat2)) *
                Math.sin(dLng / 2) * Math.sin(dLng / 2);

            var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));

            var distance = R * c;
            return distance;
        }

        function toRadians(degrees) {
            return degrees * (Math.PI / 180);
        }

        function formatTime(dateTimeString) {
            const date = new Date(dateTimeString);
            const hours = date.getHours().toString().padStart(2, '0');
            const minutes = date.getMinutes().toString().padStart(2, '0');
            return `${hours}:${minutes}`;
        }

        function initMap(currentLocation, locations) {
            var map = new google.maps.Map(document.getElementById('allAddressesMap'), {
                center: currentLocation,
                zoom: 10
            });

            var currentLocationMarker = new google.maps.Marker({
                position: currentLocation,
                map: map,
                title: 'Your Location'
            });

            locations.forEach(function (location) {
                var distance = calculateDistance(
                    currentLocation.lat, currentLocation.lng,
                    parseFloat(location.latitude), parseFloat(location.longitude)
                );

                // Chọn bán kính tìm kiếm (ví dụ: 5 km)
                var searchRadius = 10;

                if (distance <= searchRadius) {
                    var marker = new google.maps.Marker({
                        position: {lat: parseFloat(location.latitude), lng: parseFloat(location.longitude)},
                        map: map,
                        title: 'Location'
                    });
                    var urlDetail = "{{ route('clinic.detail', ['id' => ':id']) }}".replace(':id', location.id);
                    let img = '';
                    let gallery = location.gallery;
                    let arrayGallery = gallery.split(',');


                    var infoWindowContent = `<div class="p-0 m-0 tab-pane fade show active background-modal b-radius" id="modalBooking">
                <div>

                    <img class="b-radius" src="${arrayGallery[0]}" alt="img">
                </div>
                <div class="p-3">
                    <div class="form-group">
                        <div class="d-flex justify-content-between mt-md-2">
                            <div class="fs-18px">${location.name}</div>
                            <div class="button-follow fs-12p ">
                                <a class="text-follow-12" href="">{{ __('home.FOLLOW') }}</a>
                            </div>
                        </div>
                        <div class="d-flex mt-md-2">
                            <div class="d-flex col-md-6 justify-content-center align-items-center">
                                <a class="row p-2" href="">
                                    <div class="justify-content-center d-flex">
                                        <i class="border-button-address fa-solid fa-bullseye"></i>
                                    </div>
                                    <div class="d-flex justify-content-center">{{ __('home.Start') }}</div>
                                </a>
                            </div>
                            <div class="d-flex col-md-6 justify-content-center align-items-center">
                                <a class="row p-2" href="">
                                    <div class="justify-content-center d-flex">
                                        <i class="border-button-address fa-regular fa-circle-right"></i>
                                    </div>
                                    <div class="d-flex justify-content-center">{{ __('home.Direction') }}</div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="mt-md-3 mb-md-3">
                    <a class="w-100 btn btn-secondary border-button-address font-weight-800 fs-14 justify-content-center" href="${urlDetail}" >
                    {{ __('home.Booking') }}
                    </a>
                    </div>
                    <div class="border-top">
                        <div class="mt-md-2"><i class="text-gray mr-md-2 fa-solid fa-location-dot"></i>
                            <span class="fs-14 font-weight-600">${location.address_detail}</span>
                        </div>
                        <div class="mt-md-2">
                            <i class="text-gray mr-md-2 fa-regular fa-clock"></i>
                            <span class="fs-14 font-weight-600">
                                Open: ${formatTime(location.open_date)} - ${formatTime(location.close_date)}
                            </span>
                        </div>
                        <div class="mt-md-2">
                            <i class="text-gray mr-md-2 fa-solid fa-globe"></i>
                            <span class="fs-14 font-weight-600"> ${location.email}</span>
                        </div>
                        <div class="mt-md-2">
                            <i class="text-gray mr-md-2 fa-solid fa-phone-volume"></i> <span
                                class="fs-14 font-weight-600"> ${location.phone}</span>
                        </div>
                        <div class="mt-md-2 mb-md-2">
                            <i class="text-gray mr-md-2 fa-solid fa-bookmark"></i> <span
                                class="fs-14 font-weight-600"> ${location.type}</span>
                        </div>
                        @for($i=0; $i<3; $i++)
                    <div class="border-top mb-md-2">
                        <div
                            class="d-flex justify-content-between rv-header align-items-center mt-md-2">
                            <div class="d-flex rv-header--left">
                                <div class="avt-24 mr-md-2">
                                    <img src="{{asset('img/detail_doctor/ellipse _14.png')}}">
                                        </div>
                                        <p class="fs-16px">Trần Đình Phi</p>
                                    </div>
                                    <div class="rv-header--right">
                                        <p class="fs-14 font-weight-400">10:20 07/04/2023</p>
                                    </div>
                                </div>
                                <div class="content">
                                    <p>
                                        {{ __('home.Lần đầu tiên sử dụng dịch vụ qua app nhưng chất lượng và dịch vụ tại salon quá tốt. Book giờ nào thì cứ đúng giờ đến k sợ phải chờ đợi như mọi chỗ khác. Hy vọng thi thoảng app có nhiều ưu đãi để giới thiệu cho bạn bè cùng sử dụng') }}
                    </p>
                </div>
            </div>
@endfor
                    <div class="border-top">
                        <div
                            class="d-flex justify-content-between rv-header align-items-center mt-md-2">
                            <div class="d-flex rv-header--left">
                                <div class="avt-24 mr-md-2">
                                    <img src="{{asset('img/detail_doctor/ellipse _14.png')}}">
                                    </div>
                                    <p class="fs-16px">Trần Đình Phi</p>
                                </div>
                                <div class="rv-header--right">
                                    <p class="fs-14 font-weight-400">10:20 07/04/2023</p>
                                </div>
                            </div>
                            <div class="content">
                                <p>
                                    {{ __('home.Lần đầu tiên sử dụng dịch vụ qua app nhưng chất lượng và dịch vụ tại salon quá tốt. Book giờ nào thì cứ đúng giờ đến k sợ phải chờ đợi như mọi chỗ khác. Hy vọng thi thoảng app có nhiều ưu đãi để giới thiệu cho bạn bè cùng sử dụng') }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>`;

                    var infoWindow = new google.maps.InfoWindow({
                        content: infoWindowContent
                    });

                    marker.addListener('click', function () {
                        closeAllInfoWindows();
                        infoWindow.open(map, marker);
                    });

                    infoWindows.push(infoWindow);
                }
            });
        }

        function closeAllInfoWindows() {
            infoWindows.forEach(function (infoWindow) {
                infoWindow.close();
            });
        }

        getCurrentLocation(function (currentLocation) {
            initMap(currentLocation, locations);
        });
    </script>
@endsection
