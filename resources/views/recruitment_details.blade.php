@extends('layouts.master')
@section('title', 'Recruitment Details')
@section('content')
    @include('layouts.partials.header_2')
    @include('component.banner')
    <div class="recruitment-details ">
        <div class="container">
            <a href="{{route('recruitment.index')}}" class="recruitment-details--title"><i class="fa-solid fa-arrow-left"></i> Recruitment details</a>
            <div class="row recruitment-details--content">
                <div class="col-md-8 recruitment-details--content--left">
                    <div class="img-main">
                        <img src="{{asset('/img/recruitment/Rectangle 23798.png')}}" alt="show" class="main">
                    </div>
                    <div class="list d-flex">
                        <div class="item">
                            <img src="{{asset('/img/recruitment/Rectangle 23798.png')}}" alt="">
                        </div>
                        <div class="item">
                            <img src="{{asset('/img/favicon.png')}}" alt="">
                        </div>
                        <div class="item">
                            <img src="{{asset('/img/recruitment/Rectangle 23798.png')}}" alt="">
                        </div>
                        <div class="item">
                            <img src="{{asset('/img/favicon.png')}}" alt="">
                        </div>
                        <div class="item">
                            <img src="{{asset('/img/recruitment/Rectangle 23798.png')}}" alt="">
                        </div>
                        <div class="item">
                            <img src="{{asset('/img/favicon.png')}}" alt="">
                        </div>
                        <div class="item">
                            <img src="{{asset('/img/recruitment/Rectangle 23798.png')}}" alt="">
                        </div>
                        <div class="item">
                            <img src="{{asset('/img/favicon.png')}}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-md-4 recruitment-details--content--right">
                    <div class="form-1" id="form-hospital">
                        <div class="div d-flex justify-content-between align-items-center">
                            <div class="title">Platinum</div>
                            <button class="text-wrapper">FOLLOW</button>
                        </div>
                        <div class="div-2">
                            <img class="image" src="{{asset('img/recruitment/logo.png')}}"/>
                            <div class="text-wrapper-2">Bệnh viện bạch mai</div>
                        </div>
                        <div class="div-3">
                            <div class="div-4">
                                <div class="img-wrapper"><img class="img"
                                                              src="{{asset('img/recruitment/Vector.png')}}"/></div>
                                <div class="div-5">
                                    <div class="text-wrapper-3">Position</div>
                                    <div class="text-wrapper-4">Staff</div>
                                </div>
                            </div>
                            <div class="div-4">
                                <div class="img-wrapper"><img class="img"
                                                              src="{{asset('img/recruitment/hourglass-03.png')}}"/>
                                </div>
                                <div class="div-5">
                                    <div class="text-wrapper-3">From of employment</div>
                                    <div class="text-wrapper-4">1 year</div>
                                </div>
                            </div>
                            <div class="div-4">
                                <div class="img-wrapper"><img class="img"
                                                              src="{{asset('img/recruitment/briefcase.png')}}"/></div>
                                <div class="div-5">
                                    <div class="text-wrapper-3">Experience</div>
                                    <div class="text-wrapper-4">Full time</div>
                                </div>
                            </div>
                            <div class="div-4">
                                <div class="img-wrapper"><img class="img" src="{{asset('img/recruitment/Icon.png')}}"/>
                                </div>
                                <div class="div-5">
                                    <div class="text-wrapper-3">Salary</div>
                                    <div class="text-wrapper-4">7 - 12 million</div>
                                </div>
                            </div>
                            <div class="div-4">
                                <div class="img-wrapper"><img class="img" src="{{asset('img/recruitment/clock.png')}}"/>
                                </div>
                                <div class="div-5">
                                    <div class="text-wrapper-3">Deadline</div>
                                    <div class="text-wrapper-4">30/10/2023</div>
                                </div>
                            </div>
                        </div>
                        <div class="div-7 d-flex justify-content-between">
                            <button class="div-wrapper">Company page</button>
                            <button id="button-apply" class="text-wrapper-5">Apply</button>
                        </div>
                    </div>
                    <div class="form-2 d-none" id="form-apply">
                        <div class="div">
                            <div class="text-wrapper">Select CV</div>
                            <div class="div-2 d-flex">
                                <div class="div-wrapper">
                                    <div class="text-wrapper-2">CV 1</div>
                                </div>
                                <div class="div-wrapper">
                                    <div class="text-wrapper-2">CV 2</div>
                                </div>
                                <div class="div-wrapper">
                                    <i class="fa-solid fa-plus"></i>
                                </div>
                            </div>
                        </div>
                        <div class="div-3">
                            <div class="text-wrapper">Applicant information</div>
                            <div class="div-4">
                                <div class="div-5">
                                    <div class="text-wrapper-3">Name</div>
                                    <input class="frame-wrapper" type="text" placeholder="example123">
                                </div>
                                <div class="div-5">
                                    <div class="text-wrapper-3">Email</div>
                                    <input class="frame-wrapper" type="text" placeholder="example123">
                                </div>
                                <div class="div-5">
                                    <div class="text-wrapper-3">Conact number</div>
                                    <input class="frame-wrapper" type="text" placeholder="example123">
                                </div>
                            </div>
                        </div>
                        <div class="div-7 d-flex justify-content-between">
                            <button class="div-wrapper" id="button-back">Cancel</button>
                            <button  class="text-wrapper-5" data-toggle="modal" data-target=".bd-example-modal-lg">Apply</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row recruitment-details--text">
                <div class="col-md-8">
                    <hr>

                    {{-- Start nội dung mô tả (backend)--}}
                    <div class="frame">
                        <b style="font-size: 20px" class="text-wrapper">Bên mình đang cần tuyển dụng 2 BS chuyên khoa
                            VLTL hoặc YHCT</b>
                        <div class="div">
                            <div class="div-2">
                                <b style="font-size: 16px" class="text-wrapper-2">Job Description</b>
                                <p class="th-c-hi-n-c-c-k-thu">
                                    Thực hiện các kỹ thuật xét nghiệm phức tạp và thông thường tại phòng khám theo quy
                                    định<br/>Nghiêm chỉnh
                                    thực hiện quy chế cơ quan<br/>Thực hiện công việc khác theo sự phân công của lãnh
                                    đạo<br/>Công việc cụ thể
                                    trao đổi khi phỏng vấn
                                </p>
                            </div>
                            <div class="div-3">
                                <b style="font-size: 16px" class="text-wrapper-2">Job requirements</b>
                                <p class="c-nh-n-x-t-nghi-m-c">
                                    Cử nhân Xét nghiệm (có CCHN, tối thiểu 36 tháng hành nghề)<br/>Có năng lực và chuyên
                                    môn đúng với vị trí dự
                                    tuyển<br/>Các vị trí chuyên môn tốt nghiệp trình độ Cao đẳng trở lên<br/>Sử dụng
                                    thành thạo máy tính<br/>Nhanh
                                    nhẹn, năng động, trung thực, muốn gắn bó lâu dài<br/>Ưu tiên có CCHN/giao tiếp tiếng
                                    anh
                                </p>
                            </div>
                            <div class="div-3">
                                <b style="font-size: 16px" class="text-wrapper-2">Job requirements</b>
                                <p class="c-nh-n-x-t-nghi-m-c">
                                    Cử nhân Xét nghiệm (có CCHN, tối thiểu 36 tháng hành nghề)<br/>Có năng lực và chuyên
                                    môn đúng với vị trí dự
                                    tuyển<br/>Các vị trí chuyên môn tốt nghiệp trình độ Cao đẳng trở lên<br/>Sử dụng
                                    thành thạo máy tính<br/>Nhanh
                                    nhẹn, năng động, trung thực, muốn gắn bó lâu dài<br/>Ưu tiên có CCHN/giao tiếp tiếng
                                    anh
                                </p>
                            </div>
                        </div>
                    </div>
                    {{-- End nội dung mô tả--}}

                </div>
            </div>
        </div>
    </div>
    <script>
        $('.list img').click(function () {
            $(".main").attr("src", $(this).attr('src'));
        })
    </script>

    <script>
        $(document).ready(function () {
            $('#button-apply').on('click', function () {
                $('#form-hospital').addClass('d-none')
                $('#form-apply').removeClass('d-none')
            })

            $('#button-back').on('click', function () {
                $('#form-hospital').removeClass('d-none')
                $('#form-apply').addClass('d-none')
            })
        })
    </script>
@endsection
