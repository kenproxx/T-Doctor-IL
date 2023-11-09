@extends('layouts.master')
<div class="col-md-3">
    <div>
        <img src="{{asset('img/doctor.png')}}" alt="img">
    </div>
    <div class="d-flex justify-content-between mt-md-2">
        <div class="fs-18px">Nhà thuốc Pramaly</div>
        <div class="button-follow fs-12p ">
            <a href="">FOLLOW</a>
        </div>
    </div>
    <div class="d-flex mt-md-2">
        <div class="d-flex col-md-6 justify-content-center align-items-center">
        <a href=""><i class="fa-solid fa-bullseye"></i>Start</a>
        </div>
        <div class="d-flex col-md-6 justify-content-center align-items-center">
        <a href=""><i class="fa-regular fa-circle-right"></i>Direction</a>
        </div>
    </div>
    <div>
        <a href="#">Booking</a>
    </div>
    <div>
        <div><i class="fa-solid fa-location-dot"></i>
            <span>
                V7-VB7 The Terra An Hưng, La Khê, Hà Đông, Hà Nội
            </span>
        </div>
        <div>
            <i class="fa-regular fa-clock"></i>
            Open: 7am-21pm
        </div>
        <div>
            <i class="fa-solid fa-globe"></i> dalieuthammygsv.com
        </div>
        <div>
            <i class="fa-solid fa-phone-volume"></i> 024 6666 8888
        </div>
        <div>
            <i class="fa-solid fa-bookmark"></i> clinic
        </div>
        <div>
            @include('component.review-item')
        </div>
    </div>
</div>


