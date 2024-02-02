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
                        @if($coupon->is_tiktok == 1)
                            <div class="button-black mr-3">Tiktok</div>
                        @endif
                        @if($coupon->is_facebook == 1)
                            <div class="button-black mr-3">Facebook</div>
                        @endif
                            @if($coupon->is_instagram == 1)
                            <div class="button-black mr-3">Instagram</div>
                        @endif
                            @if($coupon->is_youtube == 1)
                            <div class="button-black mr-3">Youtube</div>
                        @endif
                            @if($coupon->is_google == 1)
                            <div class="button-black mr-3">Google</div>
                        @endif
                        <div class="button-black mr-3"><i class="fa-solid fa-user-group"> </i>{{ $coupon->registered }}
                            /{{ $coupon->max_register }}</div>
                        <div class="button-black"><i class="fa-regular fa-eye mr-3"></i>{{ $coupon->views }}</div>
                    </div>
                    <div class="img-main">
                        <img src="{{asset($coupon->thumbnail)}}" style="object-fit: contain; height: 100%" alt="show"
                             class="main">
                    </div>

                    <div class="mb-3 mt-30 d-md-flex">
                        <div class="mb-2 flea-content-product col-md-3">Phần thưởng</div>
                        <div class="flea-text-gray color-Grey-Black col-md-9">{!! $coupon->short_description !!}</div>
                    </div>
                    <div class="mb-3 d-md-flex">
                        <div class="mb-2 flea-content-product col-md-3">Điều khoản và điều kiện</div>
                        <div class="flea-text-gray color-Grey-Black col-md-9">{!! $coupon->condition !!}</div>
                    </div>
                    <div class="mb-3 d-md-flex">
                        <div class="mb-2 flea-content-product col-md-3">Hướng dẫn chiến dịch</div>
                        <div class="flea-text-gray color-Grey-Black col-md-9">{!! $coupon->conduct !!}</div>
                    </div>
                    <div class="mb-3 d-md-flex">
                        <div class="mb-2 flea-content-product col-md-3">Yêu cầu nội dung</div>
                        <div class="flea-text-gray color-Grey-Black col-md-9">{!! $coupon->description !!}</div>
                    </div>

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
                        @php
                                    function isWithinTimeRange($start, $end) {
                                        $now = time();
                                        $currentDateTime = new DateTime();
                                        $currentDateTimeString = $currentDateTime->format('Y-m-d H:i:s');
                                        return ($start <= $currentDateTimeString && $currentDateTimeString <= $end);
                                    }
                        @endphp
                        <div class="div-3">
                            <div class="justify-content-between d-flex">
                                <div class="{{ isWithinTimeRange($coupon->startDate, $coupon->endDate) ? 'bold-text' : '' }}">Thời gian ứng tuyển</div>
                                <div
                                    class="{{ isWithinTimeRange($coupon->startDate, $coupon->endDate) ? 'bold-text' : '' }}">{{ Carbon::parse($coupon->startDate)->format('d.m') }}
                                    ~ {{ Carbon::parse($coupon->endDate)->format('d.m') }}</div>
                            </div>
                            <div class="justify-content-between d-flex">
                                <div class="{{ isWithinTimeRange($coupon->start_selective, $coupon->end_selective) ? 'bold-text' : '' }}">Thời gian chọn lọc</div>
                                <div
                                    class="{{ isWithinTimeRange($coupon->start_selective, $coupon->end_selective) ? 'bold-text' : '' }}">{{ Carbon::parse($coupon->start_selective)->format('d.m') }}
                                    ~ {{ Carbon::parse($coupon->end_selective)->format('d.m') }}</div>
                            </div>
                            <div class="justify-content-between d-flex">
                                <div class="{{ isWithinTimeRange($coupon->start_post, $coupon->end_post) ? 'bold-text' : '' }}">Thời gian đăng bài</div>
                                <div
                                    class="{{ isWithinTimeRange($coupon->start_post, $coupon->end_post) ? 'bold-text' : '' }}">{{ Carbon::parse($coupon->start_post)->format('d.m') }}
                                    ~ {{ Carbon::parse($coupon->end_post)->format('d.m') }}</div>
                            </div>
                            <div class="justify-content-between d-flex">
                                <div class="{{ isWithinTimeRange($coupon->start_evaluate, $coupon->end_evaluate) ? 'bold-text' : '' }}">Thời gian đánh giá</div>
                                <div
                                    class="{{ isWithinTimeRange($coupon->start_evaluate, $coupon->end_evaluate) ? 'bold-text' : '' }}">{{ Carbon::parse($coupon->start_evaluate)->format('d.m') }}
                                    ~ {{ Carbon::parse($coupon->end_evaluate)->format('d.m') }}</div>
                            </div>

                            <div class="flea-text-gray color-Grey-Black">{!! $coupon->short_description !!} </div>
                        </div>
                        <div class="div-7 d-flex justify-content-between">
                            <button id="button-apply" class="text-wrapper-5 w-100">{{ __('home.Apply') }}</button>
                        </div>
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
                                           id="name">
                                </div>
                                <div class="div-5">
                                    <div class="text-wrapper-3">{{ __('home.Email') }}</div>
                                    <input class="form-control" type="text" name="email_"
                                           id="email_">
                                </div>
                                <div class="div-5">
                                    <div class="text-wrapper-3">{{ __('home.Contact number') }}</div>
                                    <input class="form-control" type="number" name="phone"
                                           id="phone">
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
                        <input type="hidden" value="{{ Auth::user()->id }}" name="user_id" id="user_id">
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
@endsection
