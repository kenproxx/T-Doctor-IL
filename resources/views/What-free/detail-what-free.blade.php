@php use Carbon\Carbon;use Illuminate\Support\Facades\Auth;  @endphp
@extends('layouts.master')
@section('title', 'What free')
@section('content')
    <style>
        .bold-text {
            color: #333;
            font-weight: 800;
            font-size: 18px;
        }

        .hover-description {
            color: #333;
            font-weight: 600;
            font-size: 18px;
        }

        .hover-description:hover {
            color: #1ed3d2;
        }

        .section-description::before {
            display: block;
            content: "";
            margin-top: -80px;
            height: 80px;
            visibility: hidden;
            pointer-events: none;
        }
        .text-wrapper-55 {
            padding: 15px;
            display: flex;
            background-color: #ded7d7;
            width: 100%;
            font-weight: 800;
        }
    </style>
    <link href="{{ asset('css/detailwhatfree.css') }}" rel="stylesheet">
    @include('layouts.partials.header')
    @include('component.banner')
    <div class="recruitment-details ">
        <div class="container">
            <a href="{{route('what.free')}}" class="recruitment-details--title"><i class="fa-solid fa-arrow-left"></i>
                {{ __("home.What’s free details") }}</a>
            <div class="row recruitment-details--content">
                <div class="col-md-8 recruitment-details--content--left">
                    <div class="text-content-product">{{ $coupon->title }}</div>
                    <div class="d-flex mt-3 mb-3">
                        @foreach(['tiktok', 'facebook', 'instagram', 'youtube', 'google'] as $platform)
                            @if($coupon->{"is_$platform"} == 1)
                                <div class="button-black mr-3">{{ ucfirst($platform) }}</div>
                            @endif
                        @endforeach

                        <div class="button-black mr-3"><i class="fa-solid fa-user-group"> </i>{{ $coupon->registered }}
                            /{{ $coupon->max_register }}</div>
                        <div class="button-black"><i class="fa-regular fa-eye mr-3"></i>{{ $coupon->views }}</div>
                    </div>
                    <div class="img-main h-auto">
                        <img src="{{asset($coupon->thumbnail)}}" style="object-fit: contain; height: 100%" alt="show"
                             class="main">
                    </div>
                    @if($coupon->short_description != null)
                        <div class="mb-3 mt-30 d-md-flex">
                            <div id="short_description" class="mb-2 section-description flea-content-product col-md-3">
                                Phần thưởng
                            </div>
                            <div
                                class="flea-text-gray color-Grey-Black col-md-9">{!! $coupon->short_description !!}</div>
                        </div>
                    @endif
                    @if($coupon->condition != null)
                        <div class="mb-3 d-md-flex">
                            <div id="condition" class="mb-2 section-description flea-content-product col-md-3">Điều
                                khoản và
                                điều kiện
                            </div>
                            <div class="flea-text-gray color-Grey-Black col-md-9">{!! $coupon->condition !!}</div>
                        </div>
                    @endif
                    @if($coupon->conduct != null)
                        <div class="mb-3 d-md-flex">
                            <div id="conduct" class="mb-2 section-description flea-content-product col-md-3">Hướng dẫn
                                chiến
                                dịch
                            </div>
                            <div class="flea-text-gray color-Grey-Black col-md-9">{!! $coupon->conduct !!}</div>
                        </div>
                    @endif
                    @if($coupon->description != null)
                        <div class="mb-3 d-md-flex">
                            <div id="description" class="mb-2 section-description flea-content-product col-md-3">Yêu cầu
                                nội
                                dung
                            </div>
                            <div class="flea-text-gray color-Grey-Black col-md-9">{!! $coupon->description !!}</div>
                        </div>
                    @endif
                    @if($coupon->description != null)
                        <div class="mb-3 d-md-flex">
                            <div id="instruction" class="mb-2 section-description flea-content-product col-md-3">Hướng
                                dẫn chi tiết
                            </div>
                            <div class="flea-text-gray color-Grey-Black col-md-9">{!! $coupon->instruction !!}</div>
                        </div>
                    @endif
                    @if($coupon->description != null)
                        <div class="mb-3 d-md-flex">
                            <div id="website" class="mb-2 section-description flea-content-product col-md-3">Website
                            </div>
                            <div class="flea-text-gray color-Grey-Black col-md-9">{!! $coupon->website !!}</div>
                        </div>
                    @endif


                </div>
                <div class="col-md-4 recruitment-details--content--right">
                    <div class="form-1 " id="form-hospital">
                        <div class="div d-flex justify-content-between align-items-center">
                            <div class="title">{{ __('home.Platinum') }}</div>
                            <button class="text-wrapper">{{ __('home.FOLLOW') }}</button>
                        </div>
                        <div class="div-2">
                            <img class="image" src="{{asset('img/recruitment/logo.png')}}"/>
                            <div class="text-wrapper-2">{{ $clinic->name ?? '' }}</div>
                        </div>
                        <div class="div-3">
                            <div class="justify-content-between d-flex">
                                <div
                                    class="{{ \App\Http\Controllers\CouponController::isWithinTimeRange($coupon->startDate, $coupon->endDate) ? 'bold-text' : '' }}">
                                    Thời gian ứng tuyển
                                </div>
                                <div
                                    class="{{ \App\Http\Controllers\CouponController::isWithinTimeRange($coupon->startDate, $coupon->endDate) ? 'bold-text' : '' }}">{{ Carbon::parse($coupon->startDate)->format('d.m') }}
                                    ~ {{ Carbon::parse($coupon->endDate)->format('d.m') }}</div>
                            </div>
                            <div class="justify-content-between d-flex">
                                <div
                                    class="{{ \App\Http\Controllers\CouponController::isWithinTimeRange($coupon->start_selective, $coupon->end_selective) ? 'bold-text' : '' }}">
                                    Thời gian chọn lọc
                                </div>
                                <div
                                    class="{{ \App\Http\Controllers\CouponController::isWithinTimeRange($coupon->start_selective, $coupon->end_selective) ? 'bold-text' : '' }}">{{ Carbon::parse($coupon->start_selective)->format('d.m') }}
                                    ~ {{ Carbon::parse($coupon->end_selective)->format('d.m') }}</div>
                            </div>
                            <div class="justify-content-between d-flex">
                                <div
                                    class="{{ \App\Http\Controllers\CouponController::isWithinTimeRange($coupon->start_post, $coupon->end_post) ? 'bold-text' : '' }}">
                                    Thời gian đăng bài
                                </div>
                                <div
                                    class="{{ \App\Http\Controllers\CouponController::isWithinTimeRange($coupon->start_post, $coupon->end_post) ? 'bold-text' : '' }}">{{ Carbon::parse($coupon->start_post)->format('d.m') }}
                                    ~ {{ Carbon::parse($coupon->end_post)->format('d.m') }}</div>
                            </div>
                            <div class="justify-content-between d-flex">
                                <div
                                    class="{{ \App\Http\Controllers\CouponController::isWithinTimeRange($coupon->start_evaluate, $coupon->end_evaluate) ? 'bold-text' : '' }}">
                                    Thời gian đánh giá
                                </div>
                                <div
                                    class="{{ \App\Http\Controllers\CouponController::isWithinTimeRange($coupon->start_evaluate, $coupon->end_evaluate) ? 'bold-text' : '' }}">{{ Carbon::parse($coupon->start_evaluate)->format('d.m') }}
                                    ~ {{ Carbon::parse($coupon->end_evaluate)->format('d.m') }}</div>
                            </div>
                            <hr>

                            @if($coupon->short_description != null)
                                <a class="hover-description" href="#short_description">Phần thưởng</a>
                                <hr>
                            @endif

                            @if($coupon->condition != null)
                                <a class="hover-description" href="#condition">Điều khoản và điều kiện</a>
                                <hr>
                            @endif

                            @if($coupon->conduct != null)
                                <a class="hover-description" href="#conduct">Hướng dẫn chiến dịch</a>
                                <hr>
                            @endif

                            @if($coupon->description != null)
                                <a class="hover-description" href="#description">Yêu cầu nội dung</a>
                                <hr>
                            @endif
                        </div>
                        @php
                            if (Auth::check()) {
                                $SocialUser = \App\Models\SocialUser::where('user_id', Auth::user()->id)
                                ->where('status', \App\Enums\SocialUserStatus::ACTIVE)
                                ->first();

                                $my_array = [];
                                $my_array = array_filter([
                                    $SocialUser->instagram ? 'instagram' : null,
                                    $SocialUser->facebook ? 'facebook' : null,
                                    $SocialUser->tiktok ? 'tiktok' : null,
                                    $SocialUser->youtube ? 'youtube' : null,
                                    $SocialUser->google_review ? 'google_review' : null,
                                ]);

                                $coupon = \App\Models\Coupon::find($coupon->id);

                                $your_array = [];
                                $your_array = array_filter([
                                    $coupon->is_instagram == 1 ? 'instagram' : null,
                                    $coupon->is_facebook == 1 ? 'facebook' : null,
                                    $coupon->is_tiktok == 1 ? 'tiktok' : null,
                                    $coupon->is_youtube == 1 ? 'youtube' : null,
                                    $coupon->is_google == 1 ? 'google_review' : null,
                                ]);

    // Kiểm tra nếu tất cả các nền tảng yêu cầu bởi phiếu giảm giá được hỗ trợ bởi người dùng
                                $is_valid = empty(array_diff($your_array, $my_array));
                                $diff_array = array_diff($your_array, $my_array);
                                $text = $is_valid ? null : reset($diff_array);
                            }

                        @endphp
                        @if(Auth::check())
                            @if($text == null)
                                @php
                                    $exitCouponApply = \App\Models\CouponApply::where('user_id', Auth::user()->id)->where('coupon_id', $coupon->id)->first();
                                @endphp
                                @if(!$exitCouponApply)
                                    <div class="div-7 d-flex justify-content-between">
                                        <button id="button-apply"
                                                class="text-wrapper-5 w-100">{{ __('home.Apply') }}</button>
                                    </div>
                                @else
                                    <span class="text-wrapper-55 w-100">{{ __('home.Bạn đã ứng tuyển') }}</span>
                                @endif
                            @else
                                <div class="text-wrapper-55">{{ __('home.Kiểm tra tình trạng truyền thông.') }} {{$text}}
                                    {{ __('home.Bạn chưa kết nối với kênh truyền thông này.') }}
                                </div>
                                <div class="div-7 d-flex justify-content-between">

                                    <a class="text-wrapper-5 w-100"
                                       href="{{route('profile')}}">{{ __('home.Update profile') }}</a>
                                </div>
                            @endif
                        @else
                            <div class="div-7 d-flex justify-content-between">
                                <button class="account_control text-wrapper-5 w-100" id="show_login" data-toggle="modal"
                                        data-target="#staticBackdrop">{{ __('home.Log In') }}
                                </button>
                            </div>
                        @endif
                    </div>

                            <div class="form-2 d-none" id="form-apply">
                                <div class="div">
                                </div>
                                <div class="div-3">
                                    <div class="text-wrapper">{{ __('home.Applicant information') }}</div>
                                    <div class="div-4">
                                        <div class="div-5">
                                            <div class="text-wrapper-3">{{ __('home.Name') }}</div>
                                            <input class="form-control" type="text" name="name"
                                                   id="name" value="{{Auth::user()->name}}">
                                        </div>
                                        <div class="div-5">
                                            <div class="text-wrapper-3">{{ __('home.Email') }}</div>
                                            <input class="form-control" type="text" name="email_"
                                                   id="email_" value="{{Auth::user()->email}}">
                                        </div>
                                        <div class="div-5">
                                            <div class="text-wrapper-3">{{ __('home.Contact number') }}</div>
                                            <input class="form-control" type="number" name="phone"
                                                   id="phone" value="{{Auth::user()->phone}}">
                                        </div>
                                    </div>
                                    <div>
                                        <div class="flea-prise">{{ __('home.Apply motivation') }}</div>
                                        <textarea class="form-control"
                                                  name="content" id="content_"></textarea>
                                    </div>
                                </div>
                                <input type="hidden" value="{{ $coupon->id }}" name="coupon_id" id="coupon_id">
                                <input type="hidden" value="{{ csrf_token() }}" name="_token" id="_token">
                                @if(Auth::user())
                                    <input type="hidden" value="{{ Auth::user()->id }}" name="user_id" id="user_id">
                                @endif
                                <div class="div-7 d-flex justify-content-between">
                                    <button class="div-wrapper" id="button-back">{{ __('home.CANCEL') }}</button>
                                    <button class="text-wrapper-5 apply-button">{{ __('home.Apply') }}</button>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <script>

            var selectedOption = document.querySelector('input[name="sns_option"]:checked');

            // auto checked sns option vị trí đầu tiên
            if (!selectedOption) {
                selectedOption = document.querySelector('input[name="sns_option"]');
                try {
                    selectedOption.checked = true;
                } catch (e) {
                }

            }

            $(document).ready(function () {
                $('#button-apply').on('click', function () {
                    $('#form-hospital').addClass('d-none')
                    $('#form-apply').removeClass('d-none')
                })

                $('#button-back').on('click', function () {
                    $('#form-hospital').removeClass('d-none')
                    $('#form-apply').addClass('d-none')
                })

                $('.apply-button').on('click', function () {
                    var selectedOption = document.querySelector('input[name="sns_option"]:checked');

                    if ('{{ !Auth::check() }}') {
                        alert('{{ __('home.Please login to continue') }}')
                        return;
                    }

                    // if (!selectedOption) {
                    //     alert('Xin cập nhật thông tin SNS và chọn lại');
                    //     return;
                    // }

                    if (!token) {
                        alert('{{ __('home.Please login to continue') }}')
                        return;
                    }

                    if (document.getElementById('name').value === '') {
                        alert('{{ __('home.Please enter your name') }}')
                        return;
                    }

                    if (document.getElementById('email_').value === '') {
                        alert('{{ __('home.Please enter your email') }}')
                        return;
                    }

                    // check regex email
                    var email = document.getElementById('email_').value;
                    var regex = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/g;
                    if (!regex.test(email)) {
                        alert('{{ __('home.Please enter your email correctly') }}')
                        return;
                    }

                    if (document.getElementById('phone').value === '') {
                        alert('{{ __('home.Please enter your phone') }}')
                        return;
                    }

                    if (tinymce.get('content_').getContent() === '') {
                        alert('{{ __('home.Please enter your content') }}')
                        return;
                    }

                    const headers = {
                        'Authorization': `Bearer ${token}`
                    };
                    const formData = new FormData();

                    const fieldNames = [
                        "name", "phone", "coupon_id", "_token"
                    ];
                    fieldNames.forEach(fieldName => {
                        formData.append(fieldName, $(`#${fieldName}`).val());
                    });

                    formData.append("email", $(`#email_`).val());
                    formData.append("user_id", '{{ Auth::user()->id ?? '' }}');

                    const content = tinymce.get('content_').getContent();
                    formData.append("content", content);

                    loadingMasterPage();
                    try {
                        $.ajax({
                            url: `{{route('api.backend.coupons-apply.create')}}`,
                            method: 'POST',
                            headers: headers,
                            contentType: false,
                            cache: false,
                            processData: false,
                            data: formData,
                            success: function () {
                                alert('success');
                                loadingMasterPage();
                                window.location.reload();
                            },
                            error: function (xhr, status, exception) {
                                loadingMasterPage();
                                alert(xhr.responseJSON.message);
                            }
                        });
                    } catch (error) {
                        loadingMasterPage();
                        throw error;
                    }
                });
            })
        </script>
        <script>
            const navLink = document.querySelectorAll('a[href^="#"]');
            const header = document.querySelector('header');

            for (let link of navLink) {
                link.onclick = function (e) {
                    e.preventDefault();
                    const hash = link.hash;
                    const section = document.querySelector(hash);
                    const scrollToSection = section.offsetTop - header.offsetHeight;
                    console.log(scrollToSection)
                    window.location.hash = hash;
                    window.scrollTo(50, scrollToSection);
                }
            }
        </script>
@endsection
