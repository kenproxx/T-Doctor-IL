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
            <div class="filter_search flex-fill d-flex align-content-center p-0" style="background-color: #F3F3F3!important;">
                <button style="background-color: #F3F3F3;color: #000"><i class="bi bi-search" style="font-size: 25px; font-weight: 600"></i></button>
                <input type="text" name="filter_search" id="filter_search" placeholder="Search for anything.....">
            </div>
        </div>
    </div>
    <div id="title" class="d-flex title justify-content-center">
        <div id="list-title" class="list-title d-flex">
            <div class="list--doctor p-0">
                <a class="back" href="{{route('examination.index')}}"><p><i class="bi bi-arrow-left"></i>New doctor</p></a>
            </div>
        </div>
    </div>
    @include('examination.list-doctor')
@endsection
