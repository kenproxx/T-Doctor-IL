@php use Illuminate\Support\Facades\Auth; @endphp
@extends('layouts.master')
@section('title', 'What free')
@section('content')

    <link href="{{ asset('css/detailwhatfree.css') }}" rel="stylesheet">
    @include('layouts.partials.header')
    @include('component.banner')
    <div class="recruitment-details ">
        <div class="container">
            @include('What-free.header-wFree')
            <a href="{{route('what.free')}}" class="recruitment-details--title"><i class="fa-solid fa-arrow-left"></i>
                {{ __("home.What’s free details") }}</a>
            <div class="row recruitment-details--content">
                <div class="col-md-8 recruitment-details--content--left">
                    <div class="text-content-product">{{ $coupon->title }}</div>
                    <div class="d-flex mt-3 mb-3">
                        <div class="button-black mr-3">Tiktok</div>
                        <div class="button-black mr-3">Facebook</div>
                        <div class="button-black mr-3"><i class="fa-solid fa-user-group"> </i>{{ $coupon->registered }}
                            /{{ $coupon->max_register }}</div>
                        <div class="button-black"><i class="fa-regular fa-eye mr-3"></i>{{ $coupon->views }}</div>
                    </div>
                    <div class="img-main">
                        <img src="{{asset($coupon->thumbnail)}}" style="object-fit: contain; height: 100%" alt="show"
                             class="main">
                    </div>
                    {{-- Start nội dung mô tả (backend)--}}

                    <div class="mb-3 mt-30">
                        {{--                        <div class="mb-2 flea-content-product">Today’s free</div>--}}
                        <div class="flea-text-gray color-Grey-Black">{!! $coupon->description !!}</div>
                    </div>

                    {{-- End nội dung mô tả--}}
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
                            <div class="mb-2 flea-content-product">{{ __('home.Visit information') }}</div>
                            <div class="flea-text-gray color-Grey-Black">{{ $coupon->title }}</div>
                        </div>
                        <div class="div-7 d-flex justify-content-between">
                            <button id="button-apply" class="text-wrapper-5 w-100">{{ __('home.Apply') }}</button>
                        </div>
                    </div>
                    <div class="form-2 d-none" id="form-apply">
                        <div class="div">
                            @if ($socials)
                                <div class="text-wrapper">{{ __('home.SNS option') }}</div>
                                <div class="div-2 d-flex" id="select-sns-apply">
                                    @if($socials->facebook)
                                        <div class="button">
                                            <input type="radio" id="sns_option_1" name="sns_option" value="facebook"/>
                                            <label class="btn btn-default" for="sns_option_1"><i
                                                    class="fa-brands fa-facebook w-icon-px"></i></label>
                                        </div>
                                    @endif
                                    @if($socials->instagram)
                                        <div class="button">
                                            <input type="radio" id="sns_option_2" name="sns_option" value="instagram"/>
                                            <label class="btn btn-default" for="sns_option_2"><i
                                                    class="fa-brands fa-instagram"></i></label>
                                        </div>
                                    @endif
                                    @if($socials->youtube)
                                        <div class="button">
                                            <input type="radio" id="sns_option_3" name="sns_option" value="youtube"/>
                                            <label class="btn btn-default" for="sns_option_3"><i
                                                    class="fa-brands fa-youtube w-icon-px"></i></label>
                                        </div>
                                    @endif
                                    @if($socials->tiktok)
                                        <div class="button">
                                            <input type="radio" id="sns_option_4" name="sns_option" value="tiktok"/>
                                            <label class="btn btn-default" for="sns_option_4"><i
                                                    class="fa-brands fa-tiktok w-icon-px"></i></label>
                                        </div>
                                    @endif
                                    @if($socials->google_review)
                                        <div class="button">
                                            <input type="radio" id="sns_option_5" name="sns_option"
                                                   value="google_review"/>
                                            <label class="btn btn-default" for="sns_option_5"><i
                                                    class="fa-brands fa-google"></i></label>
                                        </div>
                                    @endif
                                    @if($socials->other)
                                        <div class="button">
                                            <input type="radio" id="sns_option_6" name="sns_option" value="other"/>
                                            <label class="btn btn-default" for="sns_option_6"><i
                                                    class="fa-solid fa-otter w-icon-px"></i></label>
                                        </div>
                                    @endif
                                </div>
                            @endif
                        </div>
                        <div class="div-3">
                            <div class="text-wrapper">{{ __('home.Applicant information') }}</div>
                            <div class="div-4">
                                <div class="div-5">
                                    <div class="text-wrapper-3">{{ __('home.Name') }}</div>
                                    <input class="form-control" type="text" placeholder="example123" name="name"
                                           id="name">
                                </div>
                                <div class="div-5">
                                    <div class="text-wrapper-3">{{ __('home.Email') }}</div>
                                    <input class="form-control" type="text" placeholder="example123" name="email_"
                                           id="email_">
                                </div>
                                <div class="div-5">
                                    <div class="text-wrapper-3">{{ __('home.Contact number') }}</div>
                                    <input class="form-control" type="text" placeholder="example123" name="phone"
                                           id="phone">
                                </div>
                            </div>
                            <div>
                                <div class="flea-prise">{{ __('home.Apply motivation') }}</div>
                                <textarea class="form-control" placeholder="Please let me use your service"
                                          name="content" id="content_"></textarea>
                            </div>
                        </div>
                        <input type="hidden" value="{{ $coupon->id }}" name="coupon_id" id="coupon_id">
                        <input type="hidden" value="{{ csrf_token() }}" name="_token" id="_token">
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

                if (!selectedOption) {
                    alert('Xin cập nhật thông tin SNS và chọn lại');
                    return;
                }

                if (!token) {
                    alert('Please login to apply')
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
                formData.append("sns_option", selectedOption.value);

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
                        error: function (exception) {
                            loadingMasterPage();
                            alert(exception.responseText);
                        }
                    });
                } catch (error) {
                    loadingMasterPage();
                    throw error;
                }
            })
        })
    </script>
@endsection
