@extends('layouts.master')
@section('title', 'Online Medicine')
@section('content')
    @include('layouts.partials.header')
    @include('component.banner')
    <div class="recruitment-details ">
        <div class="container">
            <div class="recruitment-details--title"><i class="fa-solid fa-arrow-left"></i> Recruitment details</div>
            <div class="row recruitment-details--content">
                <div class="col-md-8 recruitment-details--content--left">
                    <img src="{{asset('/img/recruitment/Rectangle 23798.png')}}" alt="show" class="main">
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
                        <div class="frame">
                            <p class="text-wrapper" style="font-size: 24px; font-weight: 800">Thuốc giảm đau PARALMAX EXTRA</p>
                            <div class="div" style="font-size: 32px; font-weight: 800">599,000 VND</div>
                            <div class="div-2">
                                <div class="text-wrapper-2">Location:</div>
                                <div class="text-wrapper-3">Ha Noi</div>
                            </div>
                            <div class="div-2">
                                <div class="text-wrapper-2">Category:</div>
                                <div class="text-wrapper-3">medicine</div>
                            </div>
                            <div class="div-2">
                                <div class="text-wrapper-2">Brand name:</div>
                                <div class="text-wrapper-3">OMRON</div>
                            </div>
                            <div class="div-3">
                                <div class="div-wrapper"><div class="text">Visit store</div></div>
                                <div class="text-wrapper-4"><div class="text-2">Buy now</div></div>
                            </div>
                        </div>
                        <div class="div-7 d-flex justify-content-between">
                            <button class="div-wrapper">Company page</button>
                            <button id="button-apply" class="text-wrapper-5">Apply</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row recruitment-details--text" style="margin-top: 80px">
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
@endsection
