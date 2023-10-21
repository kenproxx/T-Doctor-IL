@extends('layouts.master')
@section('title', 'Flea Market')
@section('content')
    @include('layouts.partials.header')
    @include('component.banner')
    <style>
        .selected {
            border: 2px solid black !important;
            opacity: 0.5;
        }

    </style>
    <div class="recruitment-details ">
        <div class="container">
            <div class="recruitment-details--title"><i class="fa-solid fa-arrow-left"></i> Product details</div>
            <div class="row recruitment-details--content">
                <div class="col-md-8 recruitment-details ">
                    <img style="width: 100%" src="{{asset('/img/flea-market/product.png')}}" alt="show"
                         class="main col-10 col-md-12">
                    <div class="list col-2 col-md-12">
                        <div class="item">
                            <img src="{{asset('/img/flea-market/product.png')}}" alt="" class="border">
                        </div>
                        <div class="item">
                            <img src="{{asset('/img/flea-market/product.png')}}" alt="" class="border">
                        </div>
                        <div class="item">
                            <img src="{{asset('/img/flea-market/product.png')}}" alt="" class="border">
                        </div>
                        <div class="item">
                            <img src="{{asset('/img/flea-market/product.png')}}" alt="" class="border">
                        </div>
                        <div class="item">
                            <img src="{{asset('/img/recruitment/Rectangle 23798.png')}}" alt="" class="border">
                        </div>
                        <div class="item">
                            <img src="{{asset('/img/recruitment/Rectangle 23798.png')}}" alt="" class="border">
                        </div>
                        <div class="item">
                            <img src="{{asset('/img/recruitment/Rectangle 23798.png')}}" alt="" class="border">
                        </div>
                    </div>
                </div>
                <div class="col-md-4 recruitment-details--content--right">
                    <div class="form-1" id="form-hospital">
                        <div>
                            <strong class="flea-prise">Máy massage cổ Pangao PG-2601B51 giúp xoa dịu đốt sống cổ, thư
                                giãn giảm căng thẳng,
                                thoải mái</strong>
                            <div class="text-content-product">
                                <strong class="">599,000 VND</strong>
                            </div>

                            <p style="color: #929292">Location:<strong class="flea-prise">
                                    Ha Noi</strong></p>
                            <p style="color: #929292">Category:<strong class="flea-prise">
                                    Massage machine</strong></p>
                            <p style="color: #929292">Brand name:<strong class="flea-prise">
                                    OMRON</strong></p>
                        </div>
                        <div class="div-7 d-flex justify-content-between">
                            <a href="" class="div-wrapper">
                                Visit store
                            </a>
                            <button id="button-apply" class="text-wrapper-5">Send message</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row recruitment-details--text mt-110">
                <div class="col-md-8">
                    <hr>

                    {{-- Start nội dung mô tả (backend)--}}
                    <div class="frame">
                        <p class="text-content-product">Máy massage cổ Pangao PG-2601B51 giúp xoa dịu đốt sống cổ, thư
                            giãn giảm căng thẳng, thoải mái</p>
                        <div class="div mo-ta">
                            <div class="div-2">
                                <p class="text-content-product-2">Product Description</p>
                                <ul class="list-mo-ta">
                                    <li>
                                        Dễ dàng tận hưởng hiệu quả massage ngay tại nhà
                                    </li>
                                    <li>Đặc điểm và thông số kỹ thuật:</li>
                                    <li>Model: PG-2601B51</li>
                                    <li>Nguồn điện sạc: DC 5V/1A (Micro USB) Rated power: 7W</li>
                                    <li>Thời đại công nghệ số phát triển vượt bậc, hầu như mọi người đều dành rất nhiều
                                        thời gian làm việc, hoạt động giải trí ở máy vi tính, máy tính bảng và điện
                                        thoại di động mỗi ngày. Với tần suất sử dụng cao, thao tác cúi thấp cổ hay tập
                                        trung trước các phương tiện điện tử khiến tình trạng đau nhức cổ - vai - gáy trở
                                        nên phổ biến. Lúc này, xoa bóp bấm huyệt là một phương pháp Y học cổ truyền điều
                                        trị thay thế, giúp tăng cường lưu lượng máu đến các nhóm cơ đang căng cứng và có
                                        thể giúp giảm đau ở vùng vai, cột sống cổ, ngực cho đến thắt lưng hoặc xương
                                        cùng.
                                    </li>
                                    <li>Nếu bạn cũng đang tìm kiếm một sản phẩm massage cổ vai gáy, xoa dịu căng thẳng
                                        hiệu quả thì máy massage cổ Pangao PG-2601B51 là một gợi ý hoàn hảo. Điểm đặc
                                        biệt của sản phẩm này là tích hợp công nghệ xoa bóp mô phỏng Shiatsu ba chiều 3D
                                        và mô phỏng thao tác xoa bóp tại Spa, giúp hoạt động massage đạt chân thực và
                                        hiệu quả tối ưu.
                                    </li>
                                </ul>
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
                $('.list .item img').click(function () {
                    // Remove border from all images within the "list" class
                    $('.list .item img').css('border');
                    // Add a border to the clicked image
                    $(this).css('border', '2px solid red'); // You can customize the border style
                    $(".main").attr("src", $(this).attr('src'));
                })
            </script>
        </div>
    </div>
@endsection
