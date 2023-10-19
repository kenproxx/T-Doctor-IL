@extends('layouts.master')
@section('title', 'What free')
@section('content')
    @include('layouts.partials.header')
    @include('component.banner')
    <div class="recruitment-details ">
        <div class="container">
            @include('What-free.header-wFree')

            <a href="{{route('what.free')}}" class="recruitment-details--title"><i class="fa-solid fa-arrow-left"></i> What’s free details</a>
            <div class="row recruitment-details--content">
                <div class="col-md-8 recruitment-details--content--left">
                    <div class="text-content-product">Nha khoa Blossom - Tặng 700.000đ tiền mặt và voucher 3.000.000đ khi quay video check-in trải nghiệm trên Tiktok và Re-up Reels Facebook</div>
                    <div class="d-flex mt-3 mb-3">
                        <div class="button-black mr-3">Tiktok</div>
                        <div class="button-black mr-3">Facebook</div>
                        <div class="button-black mr-3"><i class="fa-solid fa-user-group"> </i>10/20</div>
                        <div class="button-black"><i class="fa-regular fa-eye mr-3"></i>1000</div>
                    </div>
                    <div class="img-main">
                        <img src="{{asset('/img/recruitment/Rectangle 23798.png')}}" alt="show" class="main">
                    </div>
                    {{-- Start nội dung mô tả (backend)--}}

                    <div class="mb-3 mt-30">
                        <div class="mb-2 flea-content-product">Today’s free</div>
                        <div class="flea-text-gray color-Grey-Black">Nha khoa Blossom - Tặng 700.000đ tiền mặt và voucher 3.000.000đ khi quay video check-in trải nghiệm trên Tiktok và Re-up Reels Facebook</div>
                    </div>
                    <div class="mb-3">
                        <div class="mb-2 flea-content-product">Visit information</div>
                        <div class="flea-text-gray color-Grey-Black">Bạn đến trải nghiệm dịch vụ tại Nha khoa Greenfield: 95 Trung Hòa, Cầu Giấy, Hà Nội</div>
                    </div>
                    <div class="mb-3">
                        <div class="mb-2 flea-content-product">Address</div>
                        <ul>
                            <li class="flea-text-gray color-Grey-Black ml-3">95 Trung Hòa, Cầu Giấy, Hà Nội</li>
                        </ul>
                    </div>

                    <div>
                        <iframe class="w-100" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3725.4921913629623!2d105.75452117588662!3d20.97289858969358!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313453779ecd7b59%3A0x21695bf72a03120f!2zQ8O0bmcgdHkgVE5ISCBJTCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1697616034747!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    <div class="mt-3">
                        <div class="mb-2 flea-content-product">Caution</div>
                        <ul class="mt-3">
                            <li class="flea-text-gray color-Grey-Black ml-3">Tuổi: 18+</li>
                            <li class="flea-text-gray color-Grey-Black ml-3">Giới tính: Nữ</li>
                            <li class="flea-text-gray color-Grey-Black ml-3">Cư trú: Hà Nội</li>
                            <li class="flea-text-gray color-Grey-Black ml-3">Sỡ hữu: Có tài khoản TikTok hoặc Facebook về chăm sóc da và làm đẹp có 5000 người theo dõi trở lên </li>
                        </ul>
                    </div>
                    {{-- End nội dung mô tả--}}
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
                            <div class="mb-2 flea-content-product">Visit information</div>
                            <div class="flea-text-gray color-Grey-Black">Nha khoa Blossom - Tặng 700.000đ tiền mặt và voucher 3.000.000đ khi quay video check-in trải nghiệm trên Tiktok và Re-up Reels Facebook</div>
                        </div>
                        <div class="div-7 d-flex justify-content-between">
                            <button class="div-wrapper">Company page</button>
                            <button id="button-apply" class="text-wrapper-5">Apply</button>
                        </div>
                    </div>
                    <div class="form-2 d-none" id="form-apply">
                        <div class="div">
                            <div class="text-wrapper">SNS option</div>
                            <div class="div-2 d-flex">
                                <div class="div-wrapper-detail ">
                                    <div class="text-wrapper-2 text-option">TikTok</div>
                                </div>
                                <div class="div-wrapper-detail ">
                                    <div class="text-wrapper-2 text-option">Facebook</div>
                                </div>
                                <div class="div-wrapper-detail ">
                                    <div class="text-wrapper-2 text-option">Instagram</div>
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
                            <div>
                                <div class="flea-prise">Name</div>
                                <textarea class="text-arena-info text-arena-p" placeholder="Please let me use your service"></textarea>
                            </div>
                        </div>
                        <div class="div-7 d-flex justify-content-between">
                            <button class="div-wrapper" id="button-back">Cancel</button>
                            <button  class="text-wrapper-5" data-toggle="modal" data-target=".bd-example-modal-lg">Apply</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row recruitment-details--text mt-3">
                <div class="col-md-8">



                </div>
            </div>
        </div>
    </div>
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
