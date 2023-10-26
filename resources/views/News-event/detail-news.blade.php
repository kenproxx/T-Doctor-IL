@extends('layouts.master')
@section('title', 'News')
@section('content')
    @include('layouts.partials.header')
    @include('component.banner')
    <div class="recruitment-details ">
        <div class="container">
            <a href="{{route('index.new')}}">
                <div class="recruitment-details--title mb-30"><i class="fa-solid fa-arrow-left"></i> Product details</div>
            </a>
            <div class="d-flex">
                <div class="col-md-9">
                    <div>
                        <div class="flea-content">Dạ dày trào ngược có nguy hiểm không? Nguyên nhân và cách phòng ngừa Dạ dày trào ngược có nguy hiểm không?</div>
                        <div class="fs-16px color-Grey-Dark mb-4 mt-2">Thứ tư, ngày 13-09-2023</div>
                        <div class="justify-content-center row w-100">
                            <img class="" src="{{asset('img/News-event/dau-da-day.png')}}">
                        </div>
                        <div class="justify-content-center row mb-4">Dạ dày trào ngược có nguy hiểm không? Nguyên nhân và cách phòng ngừa Dạ dày trào ngược có nguy hiểm không?</div>
                        <div class="">
                            <strong class="text-content-product">Trong bài viết này, yumangel.vn sẽ cùng bạn tìm hiểu về nguyên nhân và triệu chứng của trào ngược dạ dày, nguy hiểm của tình trạng này và cách phòng ngừa.
                                Nguyên nhân và triệu chứng của trào ngược dạ dày</strong>
                            <p class="text-gray mt-3">Có nhiều yếu tố đóng vai trò trong việc gây ra trào ngược dạ dày. Một số
                                nguyên nhân phổ biến bao gồm tăng áp lực bên trong dạ dày, suy giảm hoạt động cơ của dạ dày,
                                tháo dỡ của cơ thực quản dạ dày, và dịch vị thừa trong dạ dày. Các yếu tố này có thể được gây ra
                                bởi thói quen ăn uống không lành mạnh, tình trạng béo phì, thai kỳ hoặc sử dụng thuốc.</p>
                        </div>
                    </div>
                    <div class="border-top mt-30">
                        <div class="mb-30">
                            <div class="justify-content-between align-items-center d-flex mt-4">
                                <div class="ac-text_content ">Related news</div>
                                <div class="flea-content-product">See all</div>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="col-md-6 d-flex pl-0">
                                <a href="{{route('detail.new')}}">
                                    <div class="d-flex border-8px">
                                        <div class="col-md-3 p-0">
                                            <img class="w-100" src="{{asset('img/News-event/oc.png')}}">
                                        </div>
                                        <div class="col-md-9 pr-0">
                                            <strong class="fs-16px">TAI BIẾN DO TIÊM CHẤT LÀM ĐẦY</strong>
                                            <p class="fs-12px mt-2">Chiều qua, nhận được cuộc gọi của một đồng nghiệp, hỏi ý kiến về
                                                một cô
                                                gái bị mù mắt sau khi được tiêm chất làm đầy. Dù đã có nhiều cảnh báo trên các
                                                phương tiện
                                                truyền thông, tuy vậy, rất đáng tiếc khi vẫn còn khá nhiều cô gái trẻ trở thành nạn
                                                nhân của
                                                việc làm đẹp.</p>
                                            <div class="d-flex justify-content-end align-items-end">
                                                <p>Read more</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-6 d-flex pl-0">
                                <a href="{{route('detail.new')}}">
                                    <div class="d-flex border-8px">
                                        <div class="col-md-3 p-0">
                                            <img class="w-100" src="{{asset('img/News-event/oc.png')}}">
                                        </div>
                                        <div class="col-md-9 pr-0">
                                            <strong class="fs-16px">TAI BIẾN DO TIÊM CHẤT LÀM ĐẦY</strong>
                                            <p class="fs-12px mt-2">Chiều qua, nhận được cuộc gọi của một đồng nghiệp, hỏi ý kiến về
                                                một cô
                                                gái bị mù mắt sau khi được tiêm chất làm đầy. Dù đã có nhiều cảnh báo trên các
                                                phương tiện
                                                truyền thông, tuy vậy, rất đáng tiếc khi vẫn còn khá nhiều cô gái trẻ trở thành nạn
                                                nhân của
                                                việc làm đẹp.</p>
                                            <div class="d-flex justify-content-end align-items-end">
                                                <p>Read more</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <img class="w-100 mb-4" src="{{asset('img/icons_logo/banner-doc.png')}}">
                    <img class="w-100 mb-4" src="{{asset('img/icons_logo/banner-doc.png')}}">
                    <img class="w-100 mb-4" src="{{asset('img/icons_logo/banner-doc.png')}}">
                </div>
            </div>

        </div>
    </div>

@endsection
