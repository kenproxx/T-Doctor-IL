@extends('layouts.master')
@section('title', 'Home')
@section('content')
    @include('layouts.partials.header_3')
    @include('component.banner')
    <div id="examination-scene" class="container ">
        <div class="d-flex justify-content-center">
            <div id="filter" class="box--1 d-flex ">
                <div class="d-flex flex-fill">
                    <div class="filter_option"><p>Category <i class="bi bi-chevron-expand"></i></p></div>
                    <div class="filter_option"><p>Location <i class="bi bi-chevron-expand"></i></p></div>
                </div>
                <div class="filter_search flex-fill d-flex align-content-center p-0" style="background-color: #F3F3F3!important;">
                    <button style="background-color: #F3F3F3;color: #000"><i class="bi bi-search" style="font-size: 25px; font-weight: 600"></i></button>
                    <input  style="border: none" type="text" name="filter_search" id="filter_search" placeholder="Search for anything.....">
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <div id="list-title" class="d-flex">
                <div class="list--doctor p-0">
                    <p>Best Pharmacists</p>
                </div>
                <div class="ms-auto p-2"><a href="{{route('examination.bestpharmacists')}}">See all</a></div>
            </div>
        </div>
        <div id="list-doctor" class="d-flex justify-content-center">
            <div class="card" >
                <i class="bi bi-heart"></i>
                <img src="{{asset('img/doctor.png')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <a href="{{route('examination.doctor_info')}}"><h5 class="card-title">BS Đô Văn Định</h5></a>
                    <p class="card-text">respiratory doctor</p>
                    <p class="card-text_1">Location: <b>Hanoi</b></p>
                    <p class="card-text_1">Working time: <b>8:00 - 16:00</b></p>
                </div>
            </div>
            <div class="card" >
                <i class="bi bi-heart"></i>
                <img src="{{asset('img/doctor.png')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <a href="{{route('examination.doctor_info')}}"><h5 class="card-title">BS Đô Văn Định</h5></a>
                    <p class="card-text">respiratory doctor</p>
                    <p class="card-text_1">Location: <b>Hanoi</b></p>
                    <p class="card-text_1">Working time: <b>8:00 - 16:00</b></p>
                </div>
            </div>
            <div class="card" >
                <i class="bi bi-heart"></i>
                <img src="{{asset('img/doctor.png')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <a href="{{route('examination.doctor_info')}}"><h5 class="card-title">BS Đô Văn Định</h5></a>
                    <p class="card-text">respiratory doctor</p>
                    <p class="card-text_1">Location: <b>Hanoi</b></p>
                    <p class="card-text_1">Working time: <b>8:00 - 16:00</b></p>
                </div>
            </div>
            <div class="card" >
                <i class="bi bi-heart"></i>
                <img src="{{asset('img/doctor.png')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <a href="{{route('examination.doctor_info')}}"><h5 class="card-title">BS Đô Văn Định</h5></a>
                    <p class="card-text">respiratory doctor</p>
                    <p class="card-text_1">Location: <b>Hanoi</b></p>
                    <p class="card-text_1">Working time: <b>8:00 - 16:00</b></p>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <div id="list-title" class="d-flex">
                <div class="list--doctor p-0">
                    <p>New Pharmacists</p>
                </div>
                <div class="ms-auto p-2"><a href="{{route('examination.newpharmacists')}}">See all</a></div>
            </div>
        </div>
        <div id="list-doctor" class="d-flex justify-content-center">
            <div class="card" >
                <i class="bi bi-heart"></i>
                <img src="{{asset('img/doctor.png')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <a href="{{route('examination.doctor_info')}}"><h5 class="card-title">BS Đô Văn Định</h5></a>
                    <p class="card-text_1">Location: <b>Hanoi</b></p>
                    <p class="card-text_1">Working time: <b>8:00 - 16:00</b></p>
                </div>
            </div>
            <div class="card" >
                <i class="bi bi-heart"></i>
                <img src="{{asset('img/doctor.png')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <a href="{{route('examination.doctor_info')}}"><h5 class="card-title">BS Đô Văn Định</h5></a>
                    <p class="card-text_1">Location: <b>Hanoi</b></p>
                    <p class="card-text_1">Working time: <b>8:00 - 16:00</b></p>
                </div>
            </div>
            <div class="card" >
                <i class="bi bi-heart"></i>
                <img src="{{asset('img/doctor.png')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <a href="{{route('examination.doctor_info')}}"><h5 class="card-title">BS Đô Văn Định</h5></a>
                    <p class="card-text_1">Location: <b>Hanoi</b></p>
                    <p class="card-text_1">Working time: <b>8:00 - 16:00</b></p>
                </div>
            </div>
            <div class="card" >
                <i class="bi bi-heart"></i>
                <img src="{{asset('img/doctor.png')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <a href="{{route('examination.doctor_info')}}"><h5 class="card-title">BS Đô Văn Định</h5></a>
                    <p class="card-text_1">Location: <b>Hanoi</b></p>
                    <p class="card-text_1">Working time: <b>8:00 - 16:00</b></p>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <div id="list-title" class="d-flex">
                <div class="list--doctor p-0">
                    <p>24/7 Available Pharmacists</p>
                </div>
                <div class="ms-auto p-2"><a href="{{route('examination.availablepharmacists')}}">See all</a></div>
            </div>
        </div>
        <div id="list-doctor" class="d-flex justify-content-center">
            <div class="card" >
                <i class="bi bi-heart"></i>
                <img src="{{asset('img/doctor.png')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <a href="{{route('examination.doctor_info')}}"><h5 class="card-title">BS Đô Văn Định</h5></a>
                    <p class="card-text_1">Location: <b>Hanoi</b></p>
                    <p class="card-text_1">Working time: <b>24/7</b></p>
                </div>
            </div>
            <div class="card" >
                <i class="bi bi-heart"></i>
                <img src="{{asset('img/doctor.png')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <a href="{{route('examination.doctor_info')}}"><h5 class="card-title">BS Đô Văn Định</h5></a>
                    <p class="card-text_1">Location: <b>Hanoi</b></p>
                    <p class="card-text_1">Working time: <b>24/7</b></p>
                </div>
            </div>
            <div class="card" >
                <i class="bi bi-heart"></i>
                <img src="{{asset('img/doctor.png')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <a href="{{route('examination.doctor_info')}}"><h5 class="card-title">BS Đô Văn Định</h5></a>
                    <p class="card-text_1">Location: <b>Hanoi</b></p>
                    <p class="card-text_1">Working time: <b>24/7</b></p>
                </div>
            </div>
            <div class="card" >
                <i class="bi bi-heart"></i>
                <img src="{{asset('img/doctor.png')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <a href="{{route('examination.doctor_info')}}"><h5 class="card-title">BS Đô Văn Định</h5></a>
                    <p class="card-text_1">Location: <b>Hanoi</b></p>
                    <p class="card-text_1">Working time: <b>24/7</b></p>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <div id="list-title" class="d-flex">
                <div class="list--doctor p-0">
                    <p>Hot deal medicine</p>
                </div>
                <div class="ms-auto p-2"><a href="{{route('examination.hotdealmedicine')}}">See all</a></div>
            </div>
        </div>
        <div id="list-doctor" class="d-flex justify-content-center">
            <div class="card" >
                <i class="bi bi-heart"></i>
                <img src="{{asset('/img/Rectangle 23798 (1).png')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <a href="{{route('medicine.detail')}}"><h5 class="card-title">PARALMAX EXTRA</h5></a>
                    <p class="card-text_1">Location: <b>Hanoi</b></p>
                    <p class="card-text_1"><b>599,000 VND</b></p>
                </div>
            </div>
            <div class="card" >
                <i class="bi bi-heart"></i>
                <img src="{{asset('/img/Rectangle 23798 (1).png')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <a href="{{route('medicine.detail')}}"><h5 class="card-title">PARALMAX EXTRA</h5></a>
                    <p class="card-text_1">Location: <b>Hanoi</b></p>
                    <p class="card-text_1"><b>599,000 VND</b></p>
                </div>
            </div>
            <div class="card" >
                <i class="bi bi-heart"></i>
                <img src="{{asset('/img/Rectangle 23798 (1).png')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <a href="{{route('medicine.detail')}}"><h5 class="card-title">PARALMAX EXTRA</h5></a>
                    <p class="card-text_1">Location: <b>Hanoi</b></p>
                    <p class="card-text_1"><b>599,000 VND</b></p>
                </div>
            </div>
            <div class="card" >
                <i class="bi bi-heart"></i>
                <img src="{{asset('/img/Rectangle 23798 (1).png')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <a href="{{route('medicine.detail')}}"><h5 class="card-title">PARALMAX EXTRA</h5></a>
                    <p class="card-text_1">Location: <b>Hanoi</b></p>
                    <p class="card-text_1"><b>599,000 VND</b></p>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <div id="list-title" class="d-flex">
                <div class="list--doctor p-0">
                    <p>New medicine</p>
                </div>
                <div class="ms-auto p-2"><a href="{{route('examination.newmedicine')}}">See all</a></div>
            </div>
        </div>
        <div id="list-doctor" class="d-flex justify-content-center">
            <div class="card" >
                <i class="bi bi-heart"></i>
                <img src="{{asset('/img/Rectangle 23798 (1).png')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <a href="{{route('medicine.detail')}}"><h5 class="card-title">PARALMAX EXTRA</h5></a>
                    <p class="card-text_1">Location: <b>Hanoi</b></p>
                    <p class="card-text_1"><b>599,000 VND</b></p>
                </div>
            </div>
            <div class="card" >
                <i class="bi bi-heart"></i>
                <img src="{{asset('/img/Rectangle 23798 (1).png')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <a href="{{route('medicine.detail')}}"><h5 class="card-title">PARALMAX EXTRA</h5></a>
                    <p class="card-text_1">Location: <b>Hanoi</b></p>
                    <p class="card-text_1">Working time: <b>8:00 - 16:00</b></p>
                </div>
            </div>
            <div class="card" >
                <i class="bi bi-heart"></i>
                <img src="{{asset('/img/Rectangle 23798 (1).png')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <a href="{{route('medicine.detail')}}"><h5 class="card-title">PARALMAX EXTRA</h5></a>
                    <p class="card-text_1">Location: <b>Hanoi</b></p>
                    <p class="card-text_1"><b>599,000 VND</b></p>
                </div>
            </div>
            <div class="card" >
                <i class="bi bi-heart"></i>
                <img src="{{asset('/img/Rectangle 23798 (1).png')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <a href="{{route('medicine.detail')}}"><h5 class="card-title">PARALMAX EXTRA</h5></a>
                    <p class="card-text_1">Location: <b>Hanoi</b></p>
                    <p class="card-text_1"><b>599,000 VND</b></p>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <div id="list-title" class="d-flex">
                <div class="list--doctor p-0">
                    <p>Recommended</p>
                </div>
                <div class="ms-auto p-2"><a href="{{route('examination.recommended')}}">See all</a></div>
            </div>
        </div>
        <div id="list-doctor" class="d-flex justify-content-center">
            <div class="card" >
                <i class="bi bi-heart"></i>
                <img src="{{asset('/img/Rectangle 23798 (1).png')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <a href="{{route('medicine.detail')}}"><h5 class="card-title">PARALMAX EXTRA</h5></a>
                    <p class="card-text_1">Location: <b>Hanoi</b></p>
                    <p class="card-text_1"><b>599,000 VND</b></p>
                </div>
            </div>
            <div class="card" >
                <i class="bi bi-heart"></i>
                <img src="{{asset('/img/Rectangle 23798 (1).png')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <a href="{{route('medicine.detail')}}"><h5 class="card-title">PARALMAX EXTRA</h5></a>
                    <p class="card-text_1">Location: <b>Hanoi</b></p>
                    <p class="card-text_1"><b>599,000 VND</b></p>
                </div>
            </div>
            <div class="card" >
                <i class="bi bi-heart"></i>
                <img src="{{asset('/img/Rectangle 23798 (1).png')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <a href="{{route('medicine.detail')}}"><h5 class="card-title">PARALMAX EXTRA</h5></a>
                    <p class="card-text_1">Location: <b>Hanoi</b></p>
                    <p class="card-text_1"><b>599,000 VND</b></p>
                </div>
            </div>
            <div class="card" >
                <i class="bi bi-heart"></i>
                <img src="{{asset('/img/Rectangle 23798 (1).png')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <a href="{{route('medicine.detail')}}"><h5 class="card-title">PARALMAX EXTRA</h5></a>
                    <p class="card-text_1">Location: <b>Hanoi</b></p>
                    <p class="card-text_1"><b>599,000 VND</b></p>
                </div>
            </div>
        </div>
    </div>

@endsection

