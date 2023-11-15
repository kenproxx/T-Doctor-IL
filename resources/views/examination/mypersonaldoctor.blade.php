@extends('layouts.master')
@section('title', 'Home')
@section('content')
    @include('layouts.partials.header_3')
    @include('component.banner')
        <div class="container">
            <div class="d-flex">
                <div class="col-md-3 mr-2">
                    <div class="">
                        <div class="flea-adv row align-items-center justify-content-center">
                            <div class="">
                                <img src="{{asset('img/image 16.png')}}" alt="" style="width: 270px;height: 682px">
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="flea-adv row align-items-center justify-content-center">
                            <div class="">
                                <img src="{{asset('img/image 16.png')}}" alt="" style="width: 270px;height: 682px">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9 medicine-list--item">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="productList" role="tabpanel" aria-labelledby="productList-tab">
                            <div>
                                <h3><b>My personal doctor</b></h3>
                                <hr>
                            </div>
                            <div class="d-flex justify-content-center list-doctor">
                                <div class="card" >
                                    <i class="bi bi-heart"></i>
                                    <img src="{{asset('img/doctor.png')}}" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <a href="{{route('examination.doctor_info', 1)}}"><h5 class="card-title">BS Đô Văn Định</h5></a>
                                        <p class="card-text_1">Location: <b>Hanoi</b></p>
                                        <p class="card-text_1">Working time: <b>8:00 - 16:00</b></p>
                                        <button class="delete-1">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                            @include('component.review-item')
                        </div>
                        <div class="tab-pane fade" id="wishList" role="tabpanel" aria-labelledby="wishList-tab">
                            <div class="row">
{{--                                @for($i = 0; $i < 12; $i++)--}}
{{--                                    <div class="col-md-4 item">--}}
{{--                                        @include('component.product-wish')--}}
{{--                                    </div>--}}
{{--                                @endfor--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection


