@extends('layouts.master')
@section('title', 'Home')
@section('content')
    @include('layouts.partials.headerRecruitment')

<body>

<div class="col-md-12 banner-add_cv p-0">
    <img src="{{ asset('img/icons_logo/banner.png') }}">
</div>
<div class="container p-0 content-add">
    <div class="add-cv_text">
        <div class="ac-text_content"><a href=""><i class="fa-solid fa-arrow-left mr-4" style="color: black"></i></a>Add CV</div>
    </div>
    <div class="d-flex row">
        <div class="col-md-8 pl-0">
            <div class="cv-about">
                <div class="">
                    <div class="text-font-24">About Me</div>
                </div>
                <div class="border-top mt-3">
                    <textarea class="ac-textarea mt-3" placeholder="Enter an introduction about yourself"></textarea>
                </div>
            </div>
            <div class="">
                <div class="">
                    <div class="text-font-24">Personal information</div>
                </div>
                <div class="d-flex border-top">
                    <div class="col-md-6 pl-0">
                        <div class="text-font-16 mt-4">
                            <p><span>Email </span><span class="red-color"> *</span></p>
                            <div class="w-100 mt-2">
                                <input class="ac-email" placeholder="example123">
                            </div>
                        </div>
                        <div class="text-font-16 mt-4">
                            <p><span>Date of birth </span> <span class="red-color">*</span></p>
                            <div class="w-100 mt-2">
                                <input class="ac-birth" type="date">
                            </div>
                        </div>
                        <div class="text-font-16 mt-4">
                            <p><span>Sexs </span><span class="red-color">*</span></p>
                            <div class="mt-2">
                                <input type="radio" class="web-tick-box" name="check-sex">
                                <label class="mr-5"><strong>man</strong></label>
                                <input type="radio" class="web-tick-box" name="check-sex">
                                <label class="text-wrapper-8"><strong>women</strong></label>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-6 pr-0">
                        <div class="text-font-16 mt-4">
                            <p class="p"><span class="span">Phone number </span> <span class="red-color">*</span></p>
                            <div class="d-flex mt-2">
                                <select class="ac-select-phone">
                                    <option><img src="{{asset('img/icons_logo/vietnam.png')}}" alt="#">+84</option>
                                    <option>+85</option>
                                </select>
                                <input class="ac-input-phone" placeholder="0123456789">
                            </div>
                        </div>
                        <div class="text-font-16 mt-4">
                            <p><span>Nation </span> <span class="red-color">*</span></p>
                            <div class="w-100 mt-2">
                                <input class="web ac-nation" placeholder="Please choose....">
                            </div>
                        </div>
                        <div class="text-font-16 mt-4">
                            <p class="p"><span class="span">Marital status </span> <span class="red-color">*</span></p>
                            <div class="mt-2">
                                <div class="d-flex">
                                    <input type="radio" class="web-tick-box mr-1" name="marital">
                                    <label class="mb-0 mr-5"><strong>Single</strong></label>
                                    <input type="radio" class="web-tick-box mr-1" name="marital">
                                    <label class="mb-0"><strong>Married</strong></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="">
                <div class="text-font-24">Address</div>
                <div class="">
                    <div class="d-flex">
                        <div class="col-md-6 pl-0">
                            <input class="ac-nation" placeholder="Province/City">
                        </div>
                        <div class="col-md-6 pr-0">
                            <input class="ac-nation" placeholder="District">
                        </div>
                    </div>
                    <div class="w-100">
                        <input class="ac-address" placeholder="House number, specific address">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 pr-0">
            <div class="border ac-info">
                <div class="text-font-24 m-0">Basic information</div>
                <div class="justify-content-md-center avatar-info"><img src="{{ asset('img/recruitment-img/avt-info.png') }}"></div>
                <div class="">
                    <div class="">
                        <div class="text-font-16 mt-4">
                            <p><span><strong>Name </strong></span> <span class="red-color">*</span></p>
                            <div class="w-100 mt-2">
                                <input class="ac-email" placeholder="example123">
                            </div>
                        </div>
                        <div class="text-font-16 mt-4">
                            <p><span><strong>Job Title  </strong></span> <span class="red-color">*</span></p>
                            <div class="w-100 mt-2">
                                <input class="ac-email" placeholder="example123">
                            </div>
                        </div>
                        <div class="text-font-16 mt-4">
                            <p><span><strong>Position </strong></span> <span class="red-color">*</span></p>
                            <div class="w-100 mt-2">
                                <input class="ac-email" placeholder="example123">
                            </div>
                        </div>
                        <div class="text-font-16 mt-4">
                            <p><span><strong>Experience </strong></span> <span class="red-color">*</span></p>
                            <div class="p-0 ac-year mt-2">
                                <input class="ac-email ac-default" placeholder="0"><span class="span-year">year</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="p-0 mt-5">
        <div class="">
            <div class="">
                <div class="">
                    <h3 class=""><strong>Education</strong></h3>
                </div>
                <p class="border-top mt-2">
                    Describe your entire educational background, as well as any qualifications you have earned and
                    training
                    courses you have attended.
                </p>
            </div>
            <a href="">
                <div class="d-flex mt-4">
                    <img class="plus-img" src="{{asset('img/recruitment-img/ac_plus.png')}}">
                    <div class="color_text-add">Add education</div>
                </div>
            </a>

        </div>
        <div class="border-note d-flex mt-5">
            <div class="col-md-11">
                <div class="text-wrapper mt-2"><strong>Thiết kế đồ hoạ</strong></div>
                <p class="p">Trường cao đẳng FPT - Cao đẳng</p>
                <p class="p">Từ tháng 9/2021 - 9/2023</p>
            </div>
            <div class="col-md-1 mt-2rem"><i class="fa-solid fa-pencil mr-3"></i> <i
                    class="fa-regular fa-trash-can"></i>
            </div>
        </div>
    </div>
    <div class="p-0 mt-5">
        <div class="">
            <div class="">
                <div class="">
                    <h3 class=""><strong>Skill</strong></h3>
                </div>
                <p class="border-top">
                    In this section, you should list skills that are relevant to the position or career field you are
                    interested in.
                </p>
            </div>
            <a href="">
                <div class="d-flex mt-4">
                    <img class="plus-img" src="{{asset('img/recruitment-img/ac_plus.png')}}">
                    <div class="color_text-add">Add Skill</div>
                </div>
            </a>
        </div>
        <div class="d-flex">
            <div class="border-note d-flex mt-5 col-md-3 mr-3">
                <div class="col-md-11 p-0">
                    <div class="text-wrapper mt-2"><strong>Web Design</strong></div>
                    <p class="fs-12">Mức Độ Thành Thạo:<strong class="fs-14">Competently</strong></p>
                </div>
                <div class="col-md-1 mt-2rem p-0"><i class="fa-regular fa-trash-can"></i>
                </div>
            </div>
            <div class="border-note d-flex mt-5 col-md-3 mr-3">
                <div class="col-md-11 p-0">
                    <div class="text-wrapper mt-2"><strong>Web Design</strong></div>
                    <p class="fs-12">Mức Độ Thành Thạo:<strong class="fs-14">Competently</strong></p>
                </div>
                <div class="col-md-1 mt-2rem p-0"><i class="fa-regular fa-trash-can"></i>
                </div>
            </div>
            <div class="border-note d-flex mt-5 col-md-3 mr-3">
                <div class="col-md-11 p-0">
                    <div class="text-wrapper mt-2"><strong>Web Design</strong></div>
                    <p class="fs-12">Mức Độ Thành Thạo:<strong class="fs-14">Competently</strong></p>
                </div>
                <div class="col-md-1 mt-2rem p-0"><i class="fa-regular fa-trash-can"></i>
                </div>
            </div>
        </div>


    </div>
    <div class="p-0 mt-5">
        <div class="">
            <div class="">
                <div class="">
                    <h3 class=""><strong>Certificate and license</strong></h3>
                </div>
                <p class="border-top">
                </p>
            </div>
            <a href="">
                <div class="d-flex mt-4">
                    <img class="plus-img" src="{{asset('img/recruitment-img/ac_plus.png')}}">
                    <div class="color_text-add">Add Certificate and license</div>
                </div>
            </a>

        </div>
        <div class="border-note d-flex mt-5 justify-content-between">
            <div class="col-md-8 d-flex">
                <div class="ac-license"><img src="{{asset('img/recruitment-img/license.png')}}"></div>
                <div class=" d-flex">
                    <div class="text-wrapper mt-2"><strong>UI/UX cơ bản</strong>
                        <p class="p">mindx technology school</p>
                        <p class="text-color-gray">Tháng 9/2023</p>
                    </div>
                </div>
            </div>

            <div class="col-md-1 mt-2rem"><i class="fa-solid fa-pencil mr-3"></i> <i
                    class="fa-regular fa-trash-can"></i>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <button class="add-cv-bt apply-bt_delete">Save draft</button>
        <form action="{{ route('recruitment.apply') }}">
            <button type="submit" class="add-cv-bt apply-bt_edit">Complete</button>
        </form>
    </div>
</div><!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<a href="#" id="openModal">Mở modal</a>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Understood</button>
            </div>
        </div>
    </div>
</div>
</body>
</html>

</body>
@endsection
<script>
    $(document).ready(function() {
        $("#openModal").click(function() {
            $('#staticBackdrop').modal('show');
        });
    });
</script>
