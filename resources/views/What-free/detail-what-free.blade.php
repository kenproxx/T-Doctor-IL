@extends('layouts.master')
@section('title', 'What free')
@section('content')

    <style>
        #select-sns-apply .button {
            float: left;
            margin: 0 5px 0 0;
            width: 100px;
            height: 40px;
            position: relative;
            z-index: 0;
        }

        #select-sns-apply .button label,
        #select-sns-apply .button input {
            display: block;
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
        }

        #select-sns-apply .button input[type="radio"] {
            opacity: 0.011;
            z-index: 100;
        }

        #select-sns-apply .button input[type="radio"]:checked + label {
            background: #20b8be;
            border-radius: 4px;
        }

        #select-sns-apply .button label {
            cursor: pointer;
            z-index: 90;
            line-height: 1.8em;
        }

    </style>
    @include('layouts.partials.header')
    @include('component.banner')
    <div class="recruitment-details ">
        <div class="container">
            @include('What-free.header-wFree')
            <a href="{{route('what.free')}}" class="recruitment-details--title"><i class="fa-solid fa-arrow-left"></i> What’s free details</a>
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
                        <img src="{{asset('/img/recruitment/Rectangle 23798.png')}}" alt="show" class="main">
                    </div>
                    {{-- Start nội dung mô tả (backend)--}}

                    <div class="mb-3 mt-30">
{{--                        <div class="mb-2 flea-content-product">Today’s free</div>--}}
                        <div class="flea-text-gray color-Grey-Black">{{ $coupon->description }}</div>
                    </div>

                    {{-- End nội dung mô tả--}}
                </div>
                <div class="col-md-4 recruitment-details--content--right">
                    <div class="form-1 " id="form-hospital">
                        <div class="div d-flex justify-content-between align-items-center">
                            <div class="title">Platinum</div>
                            <button class="text-wrapper">FOLLOW</button>
                        </div>
                        <div class="div-2">
                            <img class="image" src="{{asset('img/recruitment/logo.png')}}"/>
                            <div class="text-wrapper-2">{{ $clinic->name ?? '' }}</div>
                        </div>
                        <div class="div-3">
                            <div class="mb-2 flea-content-product">Visit information</div>
                            <div class="flea-text-gray color-Grey-Black">{{ $coupon->title }}</div>
                        </div>
                        <div class="div-7 d-flex justify-content-between">
                            <button id="button-apply" class="text-wrapper-5 w-100">Apply</button>
                        </div>
                    </div>
                    <div class="form-2 d-none" id="form-apply">
                        <div class="div">
                            <div class="text-wrapper">SNS option</div>
                            <div class="div-2 d-flex" id="select-sns-apply">
                                <div class="button">
                                    <input type="radio" id="a25" name="check-substitution-2" checked/>
                                    <label class="btn btn-default" for="a25">TikTok</label>
                                </div>
                                <div class="button">
                                    <input type="radio" id="a50" name="check-substitution-2"/>
                                    <label class="btn btn-default" for="a50">Facebook</label>
                                </div>
                                <div class="button">
                                    <input type="radio" id="a75" name="check-substitution-2"/>
                                    <label class="btn btn-default" for="a75">Instagram</label>
                                </div>
                            </div>
                        </div>
                        <div class="div-3">
                            <div class="text-wrapper">Applicant information</div>
                            <div class="div-4">
                                <div class="div-5">
                                    <div class="text-wrapper-3">Name</div>
                                    <input class="form-control" type="text" placeholder="example123" name="name" id="name">
                                </div>
                                <div class="div-5">
                                    <div class="text-wrapper-3">Email</div>
                                    <input class="form-control" type="text" placeholder="example123" name="email" id="email">
                                </div>
                                <div class="div-5">
                                    <div class="text-wrapper-3">Contact number</div>
                                    <input class="form-control" type="text" placeholder="example123" name="phone" id="phone">
                                </div>
                            </div>
                            <div>
                                <div class="flea-prise">Apply motivation</div>
                                <textarea class="form-control" placeholder="Please let me use your service" name="content" id="content_"></textarea>
                            </div>
                        </div>
                        <input type="hidden" value="{{ $coupon->id }}" name="coupon_id" id="coupon_id">
                        <input type="hidden" value="{{ csrf_token() }}" name="_token" id="_token">
                        <div class="div-7 d-flex justify-content-between">
                            <button class="div-wrapper" id="button-back">Cancel</button>
                            <button  class="text-wrapper-5 apply-button">Apply</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        const token = `{{ $_COOKIE['accessToken'] ?? '' }}`;

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
                if (!token) {
                    alert('Please login to apply')
                    return;
                }
                const headers = {
                    'Authorization': `Bearer ${token}`
                };
                const formData = new FormData();

                const fieldNames = [
                    "name", "email", "phone", "coupon_id", "_token"
                ];
                fieldNames.forEach(fieldName => {
                    formData.append(fieldName, $(`#${fieldName}`).val());
                });
                formData.append("user_id", '{{ \Illuminate\Support\Facades\Auth::user()->id ?? '' }}');
                formData.append("content", $(`#content_`).val());

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
                            window.location.reload();
                        },
                        error: function (exception) {
                            console.log(exception)
                        }
                    });
                } catch (error) {
                    throw error;
                }
            })
        })
    </script>
@endsection
