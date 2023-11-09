@extends('layouts.master')
<div class="col-md-2 container-fluid">
    <div class="fs-18px justify-content-start d-flex mb-md-4 mt-2">
        <div class="align-items-center row">
            <i class="fa-solid fa-chevron-left"></i>
        </div>
        <div class="ml-2">
            <span>{{$bookingSv->name}}</span>
        </div>
    </div>
    <div class="mb-md-4">
        <div class="border-bottom fs-16px">
            <span>Booking</span>
        </div>
        <div class="mt-md-3">
            <a class="border-button-address font-weight-800 fs-14 justify-content-center" href="{{route('clinic.booking.select.date',$id)}}">Please select a date and
                time</a>
        </div>
    </div>

    <div class="border-bottom fs-16px mb-md-3">
        <span>Main service</span>
    </div>
    @for($i=0; $i<4; $i++)
        <div class="d-flex justify-content-between mt-md-2 border-booking-sv align-items-center">
            <div class="fs-14 font-weight-600">
                <span>Botox, filler consultation and reservation</span>
            </div>
            <div class="button-booking-sv">
                <a href="{{route('clinic.booking.select.date',$id)}}">Booking</a>
            </div>
        </div>
    @endfor
    <div class="border-bottom mt-md-4 fs-16px mb-md-3">
        <span>Information</span>
    </div>
    <div class="fs-14 font-weight-600">
        <span>
            {{$bookingSv->introduce}}
        </span>
    </div>
</div>
