@extends('layouts.master')
@section('title', 'Flea Market')
@section('content')
    @include('layouts.partials.headerFleaMarket')
    <body>
    @include('component.banner')
    <div class="container p-0 content-add">
        <div class="add-cv_text">
            <div class="ac-text_content"><a href=""><i class="fa-solid fa-arrow-left mr-4" style="color: black"></i></a>Edit product information</div>
        </div>
        <div class="d-flex row">
            <div class="col-md-12 pl-0">
                <div class="">
                    <div class="">
                        <div class="text-font-24">Personal information</div>
                    </div>
                    <div class="p-0 col-md-12 border-top">
                        <div class="text-font-16 mt-4">
                            <p><span>Product name </span><span class="red-color"> *</span></p>
                            <div class="w-100 mt-2">
                                <input class="ac-email" placeholder="example123">
                            </div>
                        </div>
                    </div>
                    <div class="d-flex ">
                        <div class=" col-md-6 pl-0">
                            <div class="text-font-16 mt-4">
                                <p><span>Category </span><span class="red-color"> *</span></p>
                                <div class="w-100 mt-2">
                                    <select class="ac-choose mt-2">
                                        <option>Please choose....</option>
                                        <option>123</option>
                                    </select>
                                </div>
                            </div>
                            <div class="text-font-16 mt-4">
                                <p><span>Location </span> <span class="red-color">*</span></p>
                                <div class="w-100 mt-2">
                                    <select class="ac-choose mt-2">
                                        <option>Please choose....</option>
                                        <option>123</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 pr-0">
                            <div class="text-font-16 mt-4">
                                <p><span>Brand name </span></p>
                                <div class="w-100 mt-2 d-flex">
                                    <input class="web ac-nation col-md-9 mt-2" style="max-width: 73%" placeholder="0123456789">
                                    <a href="" class="col-md-3 no-brand mt-2 ">No Brand </a>
                                </div>
                            </div>
                            <div class="text-font-16 mt-4">
                                <p><span>Price </span> <span class="red-color">*</span></p>
                                <div class="w-100 mt-2">
                                    <input class="web ac-nation mt-2" placeholder="Please choose....">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cv-about col-md-12 pl-0">
                <div class="">
                    <div class="text-font-24">Detailed description</div>
                </div>
                <div class="mt-3">
                    <textarea class="ac-textarea mt-3" placeholder="Enter an introduction about yourself"></textarea>
                </div>
                <div class="d-flex mt-2">
                    <i class="fa-solid fa-circle-exclamation text-center" style="color: red;    padding: 4px 8px;"></i>
                    <p>When promoting your website and exposing the website address, use of site will be suspended</p>
                </div>
            </div>
            <div class="">
                <div class="text-font-24">Photo</div>
                <div class="d-flex mt-2">
                    <div class="col-md-4 pl-0"><img class="w-100 b-radius" src="{{asset('img/flea-market/photo.png')}}"></div>
                    <div class="col-md-4"><img class="w-100" src="{{asset('img/flea-market/add-photo.png')}}"></div>

                </div>
            </div>
            <div class="text-font-24 mt-4 col-md-12">
                <p><span>Please choose you adertisement plan </span><span class="red-color">*</span></p>
                <div class="mt-2 d-flex">
                    <div class="text-wrapper-input col-md-4 d-flex">
                        <input type="radio" class="web-tick-box" name="check-plan">
                        <label class="ml-2"><strong>Platinum</strong></label>
                    </div>
                    <div class="col-md-4 d-flex text-wrapper-input ">
                        <input type="radio" class="web-tick-box" name="check-plan">
                        <label class=" ml-2"><strong>Premium</strong></label>
                    </div>
                    <div class="col-md-4 d-flex text-wrapper-input">
                        <input type="radio" class="web-tick-box" name="check-plan">
                        <label class=" ml-2"><strong>Silver</strong></label>
                    </div>
                </div>
            </div>
            <div class="text-font-24 mt-4 col-md-12 mb-80">
                <p><span>Advetisement period</span><span class="red-color">*</span></p>
                <div class="mt-2 d-flex">
                    <div class="text-wrapper-input col-md-3 d-flex">
                        <input type="radio" class="web-tick-box" name="check-day">
                        <label class="ml-2"><strong>5 Day</strong></label>
                    </div>
                    <div class="col-md-3 d-flex text-wrapper-input ">
                        <input type="radio" class="web-tick-box" name="check-day">
                        <label class=" ml-2"><strong>10 Day</strong></label>
                    </div>
                    <div class="col-md-3 d-flex text-wrapper-input">
                        <input type="radio" class="web-tick-box" name="check-day">
                        <label class=" ml-2"><strong>15 Day</strong></label>
                    </div>
                    <div class="col-md-3 d-flex text-wrapper-input">
                        <input type="radio" class="web-tick-box" name="check-day">
                        <label class=" ml-2"><strong>20 Day</strong></label>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-center">
            <button class="add-cv-bt apply-bt_delete">Cancel</button>
            <form action="#">
                <button type="submit" class="add-cv-bt apply-bt_edit">Register</button>
            </form>
        </div>
    </div>
    </body>
@endsection
