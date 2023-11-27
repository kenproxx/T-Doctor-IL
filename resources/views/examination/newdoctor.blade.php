@extends('layouts.master')
@section('title', 'Home')
@section('content')
    @include('layouts.partials.header_3')
    @include('component.banner')
    <div class="container">
    <div class="d-flex justify-content-center">
        <div id="filter" class="d-flex w-100 ">
            <div class="d-flex flex-fill">
                <div class="filter_option"><p>{{ __('home.Category ') }}<i class="bi bi-chevron-expand"></i></p></div>
                <div class="filter_option"><p>{{ __('home.Position') }} <i class="bi bi-chevron-expand"></i></p></div>
                <div class="filter_option"><p>{{ __('home.Location') }} <i class="bi bi-chevron-expand"></i></p></div>
                <div class="filter_option"><p>{{ __('home.Experience') }} <i class="bi bi-chevron-expand"></i></p></div>
            </div>
            <div class="form-group has-search">
                <span class="fa fa-search form-control-feedback"></span>
                <input type="text" class="form-control" placeholder="{{ __('home.Search for anything…') }}">
            </div>
        </div>
    </div>
    <div id="title" class="d-flex title justify-content-center" style="padding: 12px">
        <div id="list-title" class="list-title d-flex">
            <div class="list--doctor p-0">
                <a class="back" href="{{route('examination.index')}}"><p><i class="bi bi-arrow-left"></i>{{ __('home.New doctor') }}</p></a>
            </div>
        </div>
    </div>
    @include('examination.list-doctor')
@endsection
