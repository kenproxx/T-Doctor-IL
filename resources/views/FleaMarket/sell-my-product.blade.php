@extends('layouts.master')
@section('title', 'Flea Market')
@section('content')
    @include('layouts.partials.headerFleaMarket')
    <body>
    @include('component.banner')
    <div class="container content-add">
        <div class="add-cv_text">
            <div class="ac-text_content font-18-mobi"><a href=""><i class="fa-solid fa-arrow-left mr-4" style="color: black"></i></a>Product details</div>
        </div>
        <div class="d-flex row">
            <div class="col-md-12">
                <div class="">
                    <div class="">
                        <div class="text-font-24 font-16-mobi mt-3 mt-md-4">Product information</div>
                    </div>
                    <div class="p-0 col-md-12 border-top">
                        <div class="text-font-16 mt-4 font-14-mobi">
                            <p><span>Product name </span><span class="red-color"> *</span></p>
                            <div class="w-100 mt-2">
                                <input class="ac-email font-16-mobi" placeholder="example123">
                            </div>
                        </div>
                    </div>
                    <div class="d-block d-md-flex ">
                        <div class="col-md-6 pl-0 pr-0 pr-md-3">
                            <div class="text-font-16 mt-md-4 mt-3 font-14-mobi">
                                <p><span>Category </span><span class="red-color"> *</span></p>
                                <div class="w-100 mt-md-2">
                                    <select class="ac-choose font-16-mobi mt-2">
                                        <option>Please choose....</option>
                                        <option>123</option>
                                    </select>
                                </div>
                            </div>
                            <div class="text-font-16 font-14-mobi mt-md-4 mt-3">
                                <p><span>Location </span> <span class="red-color">*</span></p>
                                <div class="w-100 mt-2">
                                    <select class="ac-choose font-16-mobi mt-2">
                                        <option>Please choose....</option>
                                        <option>123</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 pr-0 pl-0 pl-md-3">
                            <div class="text-font-16 font-14-mobi mt-md-4 mt-3">
                                <p><span>Brand name </span></p>
                                <div class="w-100 mt-2 d-flex col-12 p-0">
                                    <div class="p-0 col-md-9 mt-2 col-8"><input class="web ac-nation font-16-mobi " style="max-width: 100%" placeholder="0123456789"></div>
                                    <div class="pr-0 col-md-3 mt-2 col-4"><a href="" class=" no-brand ">No Brand </a></div>
                                </div>
                            </div>
                            <div class="text-font-16 font-14-mobi mt-md-4 mt-3">
                                <p><span>Price </span> <span class="red-color">*</span></p>
                                <div class="w-100 mt-2">
                                    <input class="web ac-nation font-16-mobi mt-2" placeholder="Please choose....">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cv-about col-md-12">
                <div class="">
                    <div class="text-font-24 font-14-mobi mt-md-4 mt-3">Detailed description</div>
                </div>
                <div class="mt-md-3 mt-2 font-16-mobi">
                    <textarea class="ac-textarea mt-md-3" placeholder="Enter an introduction about yourself"></textarea>
                </div>
                <div class="d-flex mt-2 font-10-mobi">
                    <i class="fa-solid fa-circle-exclamation text-center" style="color: red;    padding: 4px 8px;"></i>
                    <p>When promoting your website and exposing the website address, use of site will be suspended</p>
                </div>
            </div>
            <div class="">
                <div class="text-font-24 font-14-mobi">Photo</div>
                <div class="d-flex mt-2">
                    <div class="col-md-4 pl-0"><img class="w-100 b-radius" src="{{asset('img/flea-market/photo.png')}}"></div>
                    <div class="col-md-4"><img class="w-100" src="{{asset('img/flea-market/add-photo.png')}}"></div>

                </div>
            </div>
            <div class="text-font-24 mt-4 col-md-12 font-14-mobi">
                <p><span>Please choose you adertisement plan </span><span class="red-color">*</span></p>
                <div class="mt-2 d-flex font-12-mobi">
                    <div class="text-wrapper-input col-md-4 d-flex pl-0">
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
            <div class="text-font-24 mt-4 col-md-12 mb-80 font-14-mobi">
                <p><span>Advetisement period</span><span class="red-color">*</span></p>
                <div class="mt-2 d-flex font-12-mobi">
                    <div class="text-wrapper-input col-md-3 d-flex pl-0">
                        <input type="radio" class="web-tick-box" name="check-day">
                        <label class="ml-2"><strong>5 Day</strong></label>
                    </div>
                    <div class="col-md-3 d-flex text-wrapper-input pl-0 ">
                        <input type="radio" class="web-tick-box" name="check-day">
                        <label class=" ml-2"><strong>10 Day</strong></label>
                    </div>
                    <div class="col-md-3 d-flex text-wrapper-input pl-0">
                        <input type="radio" class="web-tick-box" name="check-day">
                        <label class=" ml-2"><strong>15 Day</strong></label>
                    </div>
                    <div class="col-md-3 d-flex text-wrapper-input pl-0">
                        <input type="radio" class="web-tick-box" name="check-day">
                        <label class=" ml-2"><strong>20 Day</strong></label>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-center">
            <button class="add-cv-bt w-100 apply-bt_delete col-6">Cancel</button>
            <form action="#" class="col-6 pr-0">
                <button type="submit" class="add-cv-bt w-100 apply-bt_edit">Register</button>
            </form>
        </div>
    </div>
    </body>
@endsection
