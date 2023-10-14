@extends('layouts.master')
@section('title', 'Online Medicine')
@section('content')
    @include('layouts.partials.header')
    @include('component.banner')
    <div class="recruitment-details ">
        <div class="container">
            <div class="row medicine-search">
                <div class="medicine-search--left col-md-3 d-flex justify-content-around">
                    <div class="title">Category <i class="bi bi-arrow-down-up"></i></div>
                    <div class="title">Location <i class="bi bi-arrow-down-up"></i></div>
                </div>
                <div class="medicine-search--center col-md-6 row d-flex justify-content-between">
                    <form class="search-box col-md-10">
                        <input type="search" name="focus" placeholder="Search" id="search-input" value="">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </form>
                    <button type="button" data-toggle="modal" data-target="#modalCart" class="shopping-bag">
                        <i class="fa-solid fa-bag-shopping"></i>
                        <div class="text-wrapper">1</div>
                    </button>
                    @include('component.modal-cart')
                </div>
                <div class="medicine-search--right col-md-3 d-flex row justify-content-between">
                    <div class="col-md-6 ">
                        <div class="div-wrapper">
                            <button type="button" data-toggle="modal" data-target="#modalCreatPrescription">Create prescription</button>
                        </div>
                    </div>
                    @include('component.modalCreatPrescription')
                    <div class="col-md-6">
                        <div class="div-wrapper">
                            <a href="{{route('flea.market.wish.list')}}">Wish list</a>
                        </div>
                    </div>
                </div>
            </div>

            <a href="{{route('medicine')}}" class="recruitment-details--title"><i class="fa-solid fa-arrow-left"></i> Product details</a>
            <div class="row recruitment-details--content">
                <div class="col-md-8 recruitment-details--content--left">
                    <div class="img-main">
                        <img src="{{asset('/img/Rectangle 23798 (1).png')}}" alt="show" class="main">
                    </div>
                    <div class="list d-flex">
                        <div class="item">
                            <img src="{{asset('/img/Rectangle 23798 (1).png')}}" alt="">
                        </div>
                        <div class="item">
                            <img src="{{asset('/img/Rectangle 23800.png')}}" alt="">
                        </div>
                        <div class="item">
                            <img src="{{asset('/img/Rectangle 23801.png')}}" alt="">
                        </div>
                        <div class="item">
                            <img src="{{asset('/img/Rectangle 23802.png')}}" alt="">
                        </div>
                        <div class="item">
                            <img src="{{asset('/img/Rectangle 23800.png')}}" alt="">
                        </div>
                        <div class="item">
                            <img src="{{asset('/img/Rectangle 23801.png')}}" alt="">
                        </div>
                        <div class="item">
                            <img src="{{asset('/img/Rectangle 23802.png')}}" alt="">
                        </div>
                        <div class="item">
                            <img src="{{asset('/img/Rectangle 23800.png')}}" alt="">
                        </div>
                        <div class="item">
                            <img src="{{asset('/img/Rectangle 23801.png')}}" alt="">
                        </div>
                        <div class="item">
                            <img src="{{asset('/img/Rectangle 23802.png')}}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-md-4 recruitment-details--content--right">
                    <div class="product-details">
                        <div class="body">
                            <p class="text-wrapper" >Thuốc giảm đau PARALMAX EXTRA</p>
                            <div class="price">599,000 VND</div>
                            <div class="brand-name d-flex">
                                <div class="text-wrapper-2">Location:</div>
                                <div class="text-wrapper-3">Ha Noi</div>
                            </div>
                            <div class="brand-name d-flex">
                                <div class="text-wrapper-2">Category:</div>
                                <div class="text-wrapper-3">medicine</div>
                            </div>
                            <div class="brand-name d-flex">
                                <div class="text-wrapper-2">Brand name:</div>
                                <div class="text-wrapper-3">OMRON</div>
                            </div>
                        </div>
                        <div class="button row justify-content-between">
                            <div class="col-6"><button class="div-wrapper">Visit store</button></div>
                            <div class="col-6"><button id="button-apply" class="text-wrapper-5">Buy now</button></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="recruitment-details--text" >
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

    <script>
        $('.list img').click(function () {
            $(".main").attr("src", $(this).attr('src'));
        })
    </script>
@endsection
