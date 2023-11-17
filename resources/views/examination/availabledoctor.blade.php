@extends('layouts.master')
@section('title', 'Home')
@section('content')
    @include('layouts.partials.header_3')
    @include('component.banner')
    <div class="container">
    <div class="d-flex justify-content-center">
        <div id="filter" class="d-flex w-100">
            <div class="d-flex flex-fill">
                <div class="filter_option"><p>Category <i class="bi bi-chevron-expand"></i></p></div>
                <div class="filter_option"><p>Position <i class="bi bi-chevron-expand"></i></p></div>
                <div class="filter_option"><p>Location <i class="bi bi-chevron-expand"></i></p></div>
                <div class="filter_option"><p>Experience <i class="bi bi-chevron-expand"></i></p></div>
            </div>
            <div class="form-group has-search">
                <span class="fa fa-search form-control-feedback"></span>
                <input type="text" class="form-control" placeholder="Search for anything…">
            </div>
        </div>
    </div>
    <div id="title"  class="title d-flex justify-content-center" style="padding: 12px">
        <div id="list-title" class="list-title d-flex">
            <div class="list--doctor p-0">
                <a class="back" href="{{route('examination.index')}}"><p><i class="bi bi-arrow-left"></i> 24/7 Available doctor</p></a>
            </div>
        </div>
    </div>
    @include('examination.list-doctor')
@endsection
