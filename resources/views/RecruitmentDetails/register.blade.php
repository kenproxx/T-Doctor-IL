@extends('layouts.master')
@section('title', 'Home')
@section('content')
    @include('layouts.partials.header_2')

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
                <a href="#" data-toggle="modal" data-target="#modalRegisterMore">
                    <div class="d-flex mt-4">
                        <img class="plus-img" src="{{asset('img/recruitment-img/ac_plus.png')}}">
                        <div class="color_text-add">Add education</div>
                    </div>
                </a>

            </div>
            <div class="border-note d-flex mt-2rem">
                <div class="col-md-11">
                    <div class="text-wrapper mt-2"><strong>Thiết kế đồ hoạ</strong></div>
                    <p class="p">Trường cao đẳng FPT - Cao đẳng</p>
                    <p class="mb-2">Từ tháng 9/2021 - 9/2023</p>
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
                <a href="#" data-toggle="modal" data-target="#modalAddSkill">
                    <div class="d-flex mt-4">
                        <img class="plus-img" src="{{asset('img/recruitment-img/ac_plus.png')}}">
                        <div class="color_text-add">Add Skill</div>
                    </div>
                </a>
            </div>
            <div class="d-flex">
                <div class="border-note d-flex mt-4 col-md-3 mt-2rem mr-24">
                    <div class="col-md-11 p-0 mb-1">
                        <div class="text-wrapper mt-2"><strong>Web Design</strong></div>
                        <p class="fs-12">Mức Độ Thành Thạo:<strong class="fs-14">Competently</strong></p>
                    </div>
                    <div class="col-md-1 mt-4 p-0"><i class="fa-regular fa-trash-can"></i>
                    </div>
                </div>
                <div class="border-note d-flex mt-4 col-md-3 mt-2rem mr-24">
                    <div class="col-md-11 p-0 mb-1">
                        <div class="text-wrapper mt-2"><strong>Web Design</strong></div>
                        <p class="fs-12">Mức Độ Thành Thạo:<strong class="fs-14">Competently</strong></p>
                    </div>
                    <div class="col-md-1 mt-4 p-0"><i class="fa-regular fa-trash-can"></i>
                    </div>
                </div>
                <div class="border-note d-flex mt-4 col-md-3 mt-2rem mr-24">
                    <div class="col-md-11 p-0 mb-1">
                        <div class="text-wrapper mt-2"><strong>Web Design</strong></div>
                        <p class="fs-12">Mức Độ Thành Thạo:<strong class="fs-14">Competently</strong></p>
                    </div>
                    <div class="col-md-1 mt-4 p-0"><i class="fa-regular fa-trash-can"></i>
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
                <a href="#" data-toggle="modal" data-target="#modalLicense">
                    <div class="d-flex mt-4">
                        <img class="plus-img" src="{{asset('img/recruitment-img/ac_plus.png')}}">
                        <div class="color_text-add">Add Certificate and license</div>
                    </div>
                </a>

            </div>
            <div class="border-note d-flex mt-4 justify-content-between">
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
        <!-- Modal add education -->
        <div class="modal fade" id="modalRegisterMore" tabindex="-1" role="dialog"
             aria-labelledby="modalRegisterMoreLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content" style="width: 770px; height: 886px">
                    <div class="modal-header">
                        <h5 class="modal-title text-font-24 mt-0"
                            id="modalRegisterMoreLabel">Add education</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <form action="" method="post"
                                  enctype="multipart/form-data"
                                  class="form-horizontal row" role="form">
                                @csrf
                                <div class="col-12 rm-pd-on-mobile">
                                    <div class="form-group">
                                        <div class="text-font-16">Specializesd <span class="red-color">*</span></div>
                                        <input type="text" class="ac-email mt-2"
                                               placeholder="example123" required>
                                    </div>
                                    <div class="d-flex">
                                        <div class="col-md-6 pl-0">
                                            <div class="form-group">
                                                <div class="text-font-16 mt-4">School <span class="red-color">*</span></div>
                                                <input type="text" class="ac-email mt-2"
                                                       placeholder="example123" required>
                                            </div>
                                            <div>
                                                <div class="text-font-16 mt-4">Graduate <span class="red-color">*</span>
                                                </div>
                                                <div class="d-flex">
                                                    <div class="col-md-6 p-0 mt-2">
                                                        <input type="radio" name="Graduate">
                                                        <label><strong>Graduate</strong></label>
                                                    </div>
                                                    <div class="col-md-6 p-0 mt-2">
                                                        <input type="radio" name="Graduate">
                                                        <label><strong>Undergraduates</strong></label>
                                                    </div>
                                                </div>


                                            </div>
                                            <div class="form-group">
                                                <div class="text-font-16 mt-4">From month <span class="red-color">*</span>
                                                </div>
                                                <input type="month" class="ac-birth mt-2" name="phone" id="phone"
                                                       placeholder=""
                                                       required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 pr-0">
                                            <div class="form-group">
                                                <div class="text-font-16 mt-4">Degree</div>
                                                <select class="ac-choose mt-2">
                                                    <option>Please choose....</option>
                                                    <option></option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <div class="text-font-16 mt-4 mt-110">To month <span
                                                        class="red-color">*</span></div>
                                                <input type="month" class="ac-email mt-2"
                                                       placeholder=""
                                                       required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 rm-pd-on-mobile">
                                    <div class="form-group">
                                        <div class="text-font-16 mt-4">Achievement</div>
                                        <textarea class="ac-textarea mt-3"
                                                  placeholder="Enter an introduction about yourself"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12 justify-content-between d-flex">
                                    <div class="col-md-5 mt-2"><span class="red-color">*</span> <span
                                            class="">Required Information</span></div>
                                    <div class="col-md-7 row justify-content-end">
                                        <button type="button" class="button-cancel"
                                                data-dismiss="modal">Cancel
                                        </button>
                                        <button type="submit"
                                                class="button-save">Save
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal add Skill -->
        <div class="modal fade" id="modalAddSkill" tabindex="-1" role="dialog"
             aria-labelledby="modalRegisterMoreLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content" style="width: 770px; height: 540px">
                    <div class="modal-header">
                        <h5 class="modal-title text-font-24 mt-0"
                            id="modalRegisterMoreLabel">Add Skill</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <form action="" method="post"
                                  enctype="multipart/form-data"
                                  class="form-horizontal row" role="form">
                                @csrf
                                <div class="col-12 rm-pd-on-mobile">
                                    <div class="form-group">
                                        <div class="text-font-16">Skill name <span class="red-color">*</span></div>
                                        <input type="text" class="ac-email mt-2"
                                               placeholder="example123" required>
                                    </div>
                                    <div>
                                        <div class="text-font-16 mt-4">Level <span class="red-color">*</span></div>
                                        <div class="col-md-6 d-flex">
                                            <div class="col-md-6 p-0 mt-2">
                                                <input type="radio" name="Level">
                                                <label><strong>Base</strong></label>
                                            </div>
                                            <div class="col-md-6 p-0 mt-2">
                                                <input type="radio" name="Level">
                                                <label><strong>Competently</strong></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 justify-content-between d-flex row margin-top-220">
                                    <div class="col-md-5 mt-2"><span class="red-color">*</span> <span
                                            class="">Required Information</span></div>
                                    <div class="col-md-7 row justify-content-end">
                                        <button type="button" class="button-cancel"
                                                data-dismiss="modal">Cancel
                                        </button>
                                        <button type="submit"
                                                class="button-save">Save
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Add Certificate and license -->
        <div class="modal fade" id="modalLicense" tabindex="-1" role="dialog"
             aria-labelledby="modalRegisterMoreLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content" style="width: 770px; height: 620px">
                    <div class="modal-header">
                        <h5 class="modal-title text-font-24 mt-0"
                            id="modalRegisterMoreLabel">Add Certificate and license</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <form action="" method="post"
                                  enctype="multipart/form-data"
                                  class="form-horizontal row" role="form">
                                @csrf
                                <div class="col-12 rm-pd-on-mobile">
                                    <div class="form-group">
                                        <div class="text-font-16">Name of Certificate/License <span
                                                class="red-color">*</span></div>
                                        <input type="text" class="ac-email mt-2"
                                               placeholder="example123" required>
                                    </div>
                                    <div class="d-flex">
                                        <div class="col-md-6 pl-0">
                                            <div class="form-group">
                                                <div class="text-font-16 mt-4">licensing unit <span
                                                        class="red-color">*</span></div>
                                                <input type="text" class="ac-email mt-2"
                                                       placeholder="Enter keywords to search" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 pl-0">
                                            <div class="form-group">
                                                <div class="text-font-16 mt-4">From month <span class="red-color">*</span></div>
                                                <input type="month" class="ac-birth mt-2" name="phone" id="phone"
                                                       placeholder=""
                                                       required>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-12 rm-pd-on-mobile">
                                    <div class="form-group">
                                        <div class="text-font-16 mt-4">Attention</div>
                                        <textarea class="ac-textarea mt-3"
                                                  placeholder="Enter an introduction about yourself" style="height: 172px"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12 justify-content-between d-flex">
                                    <div class="col-md-5 mt-2"><span class="red-color">*</span> <span
                                            class="">Required Information</span></div>
                                    <div class="col-md-7 row justify-content-end">
                                        <button type="button" class="button-cancel"
                                                data-dismiss="modal">Cancel
                                        </button>
                                        <button type="submit"
                                                class="button-save">Save
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>

@endsection
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script>
    $(document).ready(function() {
        $("#openModal").click(function() {
            $('#staticBackdropEducation').modal('show');
        });
    });
</script>

</body>
</html>

