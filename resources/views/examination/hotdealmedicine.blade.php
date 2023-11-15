@extends('layouts.master')
@section('title', 'Home')
@section('content')

    <style>
        #list-doctor .card i {
            left: 270px;
        }
    </style>
    @include('layouts.partials.header_3')
    @include('component.banner')
    <div class="d-flex justify-content-center">
        <div id="filter" class="box--1 d-flex ">
            <div class="d-flex flex-fill" style="gap:116px">
                <div class="filter_option"><p>Category <i class="bi bi-chevron-expand"></i></p></div>
                <div class="filter_option"><p>Location <i class="bi bi-chevron-expand"></i></p></div>
            </div>
            <div class="form-group has-search">
                <span class="fa fa-search form-control-feedback"></span>
                <input type="text" class="form-control" placeholder="Search for anything…">
            </div>
        </div>
    </div>
    <div id="title" class="d-flex" style="padding-left: 70px">
        <div id="list-title" class="d-flex">
            <div class="list--doctor p-0">
                <a class="back" href="{{route('examination.findmymedicine')}}"><p><i class="bi bi-arrow-left"></i><b>Hot deal medicine</b></p></a>
            </div>
        </div>
    </div>
    <div id="list-doctor" class="d-flex justify-content-center container">
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
@endsection
