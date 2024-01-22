@extends('layouts.master')
@section('title', 'Home')
@section('content')
    @include('layouts.partials.header_3')
    @include('component.banner')
    <div class="container">
        <div class="d-flex justify-content-center">
            <div id="filter" class="d-md-flex d-flex w-100 justify-content-between">
                <div class="d-md-flex d-none flex-fill">
                    <div class="filter_option"><p>{{ __('home.Category') }} <i class="bi bi-chevron-expand"></i></p>
                    </div>
                    <div class="filter_option"><p>{{ __('home.Position') }} <i class="bi bi-chevron-expand"></i></p>
                    </div>
                    <div class="filter_option"><p>{{ __('home.Location') }}<i class="bi bi-chevron-expand"></i></p>
                    </div>
                    <div class="filter_option"><p>{{ __('home.Experience') }} <i class="bi bi-chevron-expand"></i></p>
                    </div>
                </div>
                <div class="form-group has-search position-relative w-100 mr-3 mr-md-0">
                    <span class="fa fa-search form-control-feedbackSearch p-md-3"></span>
                    <input type="text" class="form-control" placeholder="{{ __('home.Search for anything…') }}">
                </div>
                <div class="flex d-md-none">
                    <button class="navbar-toggler border-none css-button" type="button" data-bs-toggle="offcanvas"
                            data-bs-target="#filterNavbar" aria-controls="filterNavbar">
                        <i class="bi bi-filter"></i>
                    </button>
                </div>
            </div>
        </div>
        <div id="title" class="title d-flex justify-content-start" style="padding: 12px">
            <div id="list-title" class="list-title d-flex">
                <div class="list--doctor  p-0">
                    <a class="back " href="{{route('examination.index')}}"><p class="align-items-center d-flex"><i
                                class="bi bi-arrow-left"></i> {{ $title }}</p></a>
                </div>
            </div>
        </div>
        <div class="row list-doctor m-auto find-my-medicine">
            @if(count($doctors) > 0)
                @foreach($doctors as $doctor)
                    @include('examination.component_doctor_findmymedicine', ['pharmacist' => $doctor])
                @endforeach
            @else
                <h3 class="no-data text-center">{{ __('home.no data') }}</h3>
            @endif
        </div>

        <div class="d-flex justify-content-center align-items-center">
            {{$doctors->links()}}
        </div>

    {{-- model--}}
        <div class="offcanvas offcanvas-end" tabindex="-1" id="filterNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <a href="{{route('home')}}" class="offcanvas-title" id="offcanvasNavbarLabel"><img class="w-100"
                                                                                                   src="{{asset('img/icons_logo/logo-new.png')}}"></a>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <div class="border-radius ">
                    <div class="flea-text">{{ __('home.Filter') }}</div>
{{--                    @foreach($departments as $department)--}}
{{--                        <div>--}}
{{--                            <input type="checkbox" onchange="performSearch()" name="category_{{$department->id}}"--}}
{{--                                   id="category_{{$department->id}}">--}}
{{--                            <label for="category_{{$department->id}}"--}}
{{--                                   class="flea-text-gray">{{$department->name}}</label>--}}
{{--                        </div>--}}
{{--                    @endforeach--}}
                    <div class="flea-text-sp">{{ __('home.See all categories') }}</div>
                </div>
                <div class="border-radius mt-3 ">
                    <div class="d-flex">
                        <div class="wrapper">
                            <header>
                                <h2>{{ __('home.Price') }}</h2>
                            </header>
                            <div class="price-input">
                                <div class="field">
                                    <input type="number" onchange="performSearch()" id="inputProductMin"
                                           class="rangePrice input-min" value="0">
                                </div>
                                <div class="separator">-</div>
                                <div class="field">
                                    <input type="number" onchange="performSearch()" id="inputProductMax"
                                           class="rangePrice input-max" value="0">
                                </div>
                            </div>
                            <div class="slider">
                                <div class="progress"></div>
                            </div>
                            <div class="range-input">
                                <input type="range" onchange="performSearch()" class="rangePrice range-min" min="0"
                                       max="100000" value="25000" step="1000">
                                <input type="range" onchange="performSearch()" class="rangePrice range-max" min="0"
                                       max="100000" value="75000" step="1000">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <a href="" class="add-cv-bt w-100 apply-bt_delete col-6">{{ __('home.Refresh') }}</a>
                    <form action="#" class="col-6 pr-0">
                        <button type="button" data-bs-dismiss="offcanvas" aria-label="Close"
                                class="add-cv-bt apply-bt_edit w-100">{{ __('home.Apply') }}</button>
                    </form>
                </div>
            </div>
        </div>
@endsection
