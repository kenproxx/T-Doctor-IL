@extends('layouts.master')
@section('title', 'Home')
@section('content')
    @include('layouts.partials.header_3')
    @include('component.banner')
    <div class="d-flex justify-content-center">
        <div id="filter" class="box--3 d-flex ">
            <div class="d-flex flex-fill">
                <div class="filter_option"><p>Category <i class="bi bi-chevron-expand"></i></p></div>
                <div class="filter_option"><p>Position <i class="bi bi-chevron-expand"></i></p></div>
                <div class="filter_option"><p>Location <i class="bi bi-chevron-expand"></i></p></div>
                <div class="filter_option"><p>Experience <i class="bi bi-chevron-expand"></i></p></div>
            </div>
            <div class="filter_search flex-fill">
                <label for="filter_search"><i class="bi bi-search"></i></label>
                <input type="text" name="filter_search" id="filter_search" placeholder="Search for anything.....">
            </div>
        </div>
    </div>
    <div id="title" class="d-flex justify-content-center">
        <div id="list-title" class="d-flex">
            <div class="list--doctor p-0">
                <a class="back" href="{{route('examination.index')}}"><p><i class="bi bi-arrow-left"></i>New doctor</p></a>
            </div>
        </div>
    </div>
    <div id="list-doctor" class="d-flex justify-content-center container">
        <div class="card" >
                <i class="bi bi-heart"></i>
                <img src="{{asset('img/doctor.png')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <a href=""><h5 class="card-title">BS Đô Văn Định</h5></a>
                    <p class="card-text">respiratory doctor</p>
                    <p class="card-text_1">Location: <b>Hanoi</b></p>
                    <p class="card-text_1">Working time: <b>8:00 - 16:00</b></p>
                </div>
            </div>
        <div class="card" >
                <i class="bi bi-heart"></i>
                <img src="{{asset('img/doctor.png')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <a href=""><h5 class="card-title">BS Đô Văn Định</h5></a>
                    <p class="card-text">respiratory doctor</p>
                    <p class="card-text_1">Location: <b>Hanoi</b></p>
                    <p class="card-text_1">Working time: <b>8:00 - 16:00</b></p>
                </div>
            </div>
        <div class="card" >
                <i class="bi bi-heart"></i>
                <img src="{{asset('img/doctor.png')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <a href=""><h5 class="card-title">BS Đô Văn Định</h5></a>
                    <p class="card-text">respiratory doctor</p>
                    <p class="card-text_1">Location: <b>Hanoi</b></p>
                    <p class="card-text_1">Working time: <b>8:00 - 16:00</b></p>
                </div>
            </div>
        <div class="card" >
                <i class="bi bi-heart"></i>
                <img src="{{asset('img/doctor.png')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <a href=""><h5 class="card-title">BS Đô Văn Định</h5></a>
                    <p class="card-text">respiratory doctor</p>
                    <p class="card-text_1">Location: <b>Hanoi</b></p>
                    <p class="card-text_1">Working time: <b>8:00 - 16:00</b></p>
                </div>
            </div>
    </div>
@endsection
