@extends('layouts.master')
@section('title', 'Flea Market')
@section('content')
    @include('layouts.partials.header')
    @include('component.banner')

    @php
        $pr = (new \App\Http\Controllers\backend\BackendProductInfoController())->show($id);
        $pr_json = json_decode($pr->getContent());
        $galleryArray = explode(',', $pr_json->gallery);

    @endphp
    <style>
        .selected {
            border: 2px solid black;
            opacity: 0.5;
        }
    </style>
    {{--    @dd($productDetail)--}}
    <div class="recruitment-details ">
        <div class="container">
            <div class="recruitment-details--title"><i class="fa-solid fa-arrow-left"></i> Product details</div>
            <div class="row recruitment-details--content">
                <div class="col-md-8 recruitment-details ">
                    @if(!empty($pr_json->thumbnail))
                        <div class="d-flex justify-content-center border-radius-1px color-Grey-Dark col-10 col-md-12">
                            <img src="{{asset($pr_json->thumbnail)}}" alt="show"
                                 class="main col-10 col-md-12">
                        </div>
                    @else
                        <img style="width: 100%" src="{{asset('img/flea-market/photo.png')}}" alt="show"
                             class="main col-10 col-md-12">
                        <p>No Thumbnail Available</p>
                    @endif
                    <div class="list col-2 col-md-12 mt-md-3">
                        @foreach($galleryArray as $pr_gallery)
                            <div
                                class="item-detail d-flex justify-content-center  border-radius-1px color-Grey-Dark mr-md-3">
                                <img style="width: auto; height: 100%" src="{{asset($pr_gallery)}}" alt=""
                                     class="border">
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-4 recruitment-details--content--right">
                    <div class="form-1" id="form-hospital">
                        <div>
                            <strong class="flea-prise">{{$pr_json->name}}</strong>
                            <div class="text-content-product">
                                <strong class="">{{$pr_json->price}} {{$pr_json->price_unit}}</strong>
                            </div>

                            <p style="color: #929292">Location:<strong class="flea-prise">
                                    @php
                                        $province = \Illuminate\Support\Facades\DB::table('provinces')->find($pr_json->province_id);
                                    @endphp
                                    @if(!empty($province))
                                        {{$province->name}}
                                    @else
                                        Null
                                    @endif
                                </strong></p>
                            <p style="color: #929292">Category:<strong class="flea-prise">
                                    @php
                                        $cata_json = \Illuminate\Support\Facades\DB::table('categories')->where('id', $pr_json->category_id)->first()
                                    @endphp
                                    @if(!empty($cata_json))
                                        {{$cata_json->name}}
                                    @else
                                        Null
                                    @endif
                                </strong></p>
                            <p style="color: #929292">Brand name:<strong class="flea-prise">
                                    {{$pr_json->brand_name}}</strong></p>
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
            <div class="row recruitment-details--text mt-45">
                <div class="col-md-8">
                    <hr>

                    {{-- Start nội dung mô tả (backend)--}}
                    <div class="frame">
                        <p class="text-content-product">{{$pr_json->name}}</p>
                        <div class="div mo-ta">
                            <div class="div-2">
                                <p class="text-content-product-2">Product Description</p>
                                <ul class="list-mo-ta">
                                    {{$pr_json->description}}
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
                $('.list .item-detail img').click(function () {
                    $('.list .item-detail img').removeClass('selected');
                    $(this).removeClass('border');
                    $(this).addClass('selected');
                    $(".main").attr("src", $(this).attr('src'));
                })
            </script>
        </div>
    </div>
@endsection
