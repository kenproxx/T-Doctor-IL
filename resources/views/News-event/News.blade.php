@extends('layouts.master')
@section('title', 'News')
@section('content')
    @include('layouts.partials.header')
    @include('component.banner')
    <div class="recruitment-details ">
        <div class="container">
            <div class="d-flex">
                <div class="col-md-5 pl-0">
                    <img class="w-100" src="{{asset('img/News-event/dau-da-day.png')}}">
                </div>
                <div class="col-md-7 pr-0">
                    <strong class="text-content-product">Dạ dày trào ngược có nguy hiểm không? Nguyên nhân và cách phòng
                        ngừa Dạ dày trào ngược có nguy hiểm không?</strong>
                    <p class="text-gray mt-3">Có nhiều yếu tố đóng vai trò trong việc gây ra trào ngược dạ dày. Một số
                        nguyên nhân phổ biến bao gồm tăng áp lực bên trong dạ dày, suy giảm hoạt động cơ của dạ dày,
                        tháo dỡ của cơ thực quản dạ dày, và dịch vị thừa trong dạ dày. Các yếu tố này có thể được gây ra
                        bởi thói quen ăn uống không lành mạnh, tình trạng béo phì, thai kỳ hoặc sử dụng thuốc.</p>
                </div>
            </div>
            <div class="mt-4">
                <p class="text-content-product">All news</p>
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
                <div class="col-md-6 d-flex pr-0">
                    <div class="d-flex border-8px">
                        <div class="col-md-3 p-0">
                            <img class="w-100" src="{{asset('img/News-event/oc.png')}}">
                        </div>
                        <div class="col-md-9 pr-0">
                            <strong class="fs-16px">TAI BIẾN DO TIÊM CHẤT LÀM ĐẦY</strong>
                            <p class="fs-12px mt-2">Chiều qua, nhận được cuộc gọi của một đồng nghiệp, hỏi ý kiến về một
                                cô
                                gái bị mù mắt sau khi được tiêm chất làm đầy. Dù đã có nhiều cảnh báo trên các phương
                                tiện
                                truyền thông, tuy vậy, rất đáng tiếc khi vẫn còn khá nhiều cô gái trẻ trở thành nạn nhân
                                của
                                việc làm đẹp.</p>
                            <div class="d-flex justify-content-end align-items-end">
                                <p>Read more</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <nav aria-label="Page navigation example" class="d-flex justify-content-center">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                        </a>
                    </li>
                </ul>
            </nav>


        </div>
    </div>
    @include('component.banner')
    <div class="recruitment-details ">
        <div class="container">
            <div class="d-flex">
                <div class="col-md-5 pl-0">
                    <img class="w-100" src="{{asset('img/News-event/dau-da-day.png')}}">
                </div>
                <div class="col-md-7 pr-0">
                    <strong class="text-content-product">Dạ dày trào ngược có nguy hiểm không? Nguyên nhân và cách phòng
                        ngừa Dạ dày trào ngược có nguy hiểm không?</strong>
                    <p class="text-gray mt-3">Có nhiều yếu tố đóng vai trò trong việc gây ra trào ngược dạ dày. Một số
                        nguyên nhân phổ biến bao gồm tăng áp lực bên trong dạ dày, suy giảm hoạt động cơ của dạ dày,
                        tháo dỡ của cơ thực quản dạ dày, và dịch vị thừa trong dạ dày. Các yếu tố này có thể được gây ra
                        bởi thói quen ăn uống không lành mạnh, tình trạng béo phì, thai kỳ hoặc sử dụng thuốc.</p>
                </div>
            </div>
            <div class="mt-4">
                <p class="text-content-product">All Events</p>
            </div>
            <div class="d-flex">
                <div class="col-md-6 d-flex pl-0">
                    <div class="d-flex border-8px">
                        <div class="col-md-3 p-0">
                            <img class="w-100" src="{{asset('img/News-event/oc.png')}}">
                        </div>
                        <div class="col-md-9 pr-0">
                            <strong class="fs-16px">TAI BIẾN DO TIÊM CHẤT LÀM ĐẦY</strong>
                            <p class="fs-12px mt-2">Chiều qua, nhận được cuộc gọi của một đồng nghiệp, hỏi ý kiến về một
                                cô
                                gái bị mù mắt sau khi được tiêm chất làm đầy. Dù đã có nhiều cảnh báo trên các phương
                                tiện
                                truyền thông, tuy vậy, rất đáng tiếc khi vẫn còn khá nhiều cô gái trẻ trở thành nạn nhân
                                của
                                việc làm đẹp.</p>
                            <div class="d-flex justify-content-end align-items-end">
                                <p>Read more</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 d-flex pr-0">
                    <div class="d-flex border-8px">
                        <div class="col-md-3 p-0">
                            <img class="w-100" src="{{asset('img/News-event/oc.png')}}">
                        </div>
                        <div class="col-md-9 pr-0">
                            <strong class="fs-16px">TAI BIẾN DO TIÊM CHẤT LÀM ĐẦY</strong>
                            <p class="fs-12px mt-2">Chiều qua, nhận được cuộc gọi của một đồng nghiệp, hỏi ý kiến về một
                                cô
                                gái bị mù mắt sau khi được tiêm chất làm đầy. Dù đã có nhiều cảnh báo trên các phương
                                tiện
                                truyền thông, tuy vậy, rất đáng tiếc khi vẫn còn khá nhiều cô gái trẻ trở thành nạn nhân
                                của
                                việc làm đẹp.</p>
                            <div class="d-flex justify-content-end align-items-end">
                                <p>Read more</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <nav aria-label="Page navigation example" class="d-flex justify-content-center">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                        </a>
                    </li>
                </ul>
            </nav>


        </div>
    </div>

@endsection
