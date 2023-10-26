@extends('layouts.master')
@section('title', 'Flea Market')
@section('content')
    @include('layouts.partials.header')
    @include('component.banner')
    <div class="container">
        <div class="d-flex">
            <div class="col-md-3 mr-2 mobile-hidden">
                <div class="">
                    <div class="flea-adv row align-items-center justify-content-center">
                        <img src="{{asset('img/image 16.png')}}" alt="" style="width: 270px;height: 682px">
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
            <div class="col-md-9 medicine-list--item col-12">
                @include('component.avt-info')
                <ul class="nav nav-tabs row tabMystore" role="tablist">
                    <li class="nav-item col-4">
                        <a class="nav-link active font-14-mobi" id="productList-tab" data-toggle="tab" href="#productList" role="tab" aria-controls="home" aria-selected="true">Home</a>
                    </li>
                    <li class="nav-item col-4">
                        <a class="nav-link font-14-mobi" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="profile" aria-selected="false">Review</a>
                    </li>
                    <li class="nav-item col-4">
                        <a class="nav-link font-14-mobi" id="wishList-tab" data-toggle="tab" href="#wishList" role="tab" aria-controls="contact" aria-selected="false">Wish List</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="productList" role="tabpanel" aria-labelledby="productList-tab">
                        <div class="page row">
                            @for($i = 0; $i < 12; $i++)
                                <div class="col-md-4 item col-6">
                                    @include('component.edit-product')
                                </div>
                            @endfor
                        </div>
                    </div>
                    <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                        @include('component.review-item')
                    </div>
                    <div class="tab-pane fade" id="wishList" role="tabpanel" aria-labelledby="wishList-tab">
                        <div class="row">
                            @for($i = 0; $i < 12; $i++)
                                <div class="col-md-4 col-6 item">
                                    @include('component.product-wish')
                                </div>
                            @endfor
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
    </div>
@endsection
