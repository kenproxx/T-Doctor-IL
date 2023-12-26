@extends('layouts.master')
@section('title', 'Home')
@section('content')
    @include('layouts.partials.header_3')
    @include('component.banner')
    <div id="examination-scene" class="container ">
        <div class="d-flex w-100">
            <div id="filter" class="box--3 d-flex justify-content-between w-100">
                <div class="d-flex flex-fill">
                    <div class="filter_option" style="list-style: none;">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ __('home.Department') }}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @foreach($departments as $department)
                                    <a class="dropdown-item doctor-department" href="#"
                                       data-department="{{$department}}">{{$department->name}}</a>
                                @endforeach
                            </div>
                        </li>
                    </div>
                    <div class="filter_option"><p>{{ __('home.Position') }}</p></div>
                    <div class="filter_option"><p>{{ __('home.Location') }}</p></div>
                    <div class="filter_option"><p>{{ __('home.Experience') }}</p></div>
                </div>
                <div class="form-group has-search">
                    <span class="fa fa-search form-control-feedback"></span>
                    <input type="text" onkeyup="performSearchDoctor()" id="inputSearchDoctor" class="form-control"
                           placeholder="{{ __('home.Search for anything…') }}">
                </div>
            </div>
        </div>
        <div id="show-doctor">
            <div class="d-flex justify-content-center" style="padding: 12px">
                <div id="list-title-best" class="list-title d-flex">
                    <div class="list--doctor p-0">
                        <p>{{ __('home.Best doctor') }}</p>
                    </div>
                    <div class="ms-auto p-2"><a href="{{route('examination.best_doctor')}}">{{ __('home.See all') }}</a>
                    </div>
                </div>
            </div>
            <div class="row list-doctor m-auto find-my-medicine">
                @if(count($bestDoctorInfos) > 0)
                    @foreach($bestDoctorInfos as $pharmacist)
                        @include('examination.component_doctor_findmymedicine', ['pharmacist' => $pharmacist])
                    @endforeach
                @else
                    <h3 class="no-data text-center">{{ __('home.no data') }}</h3>
                @endif
            </div>


            <div class="d-flex justify-content-center" style="padding: 12px">
                <div id="list-title-new" class="list-title d-flex">
                    <div class="list--doctor p-0">
                        <p>{{ __('home.New doctor') }}</p>
                    </div>
                    <div class="ms-auto p-2"><a href="{{route('examination.new_doctor')}}">{{ __('home.See all') }}</a>
                    </div>
                </div>
            </div>
            <div class="row list-doctor m-auto find-my-medicine">
                @if(count($newDoctorInfos) > 0)
                    @foreach($newDoctorInfos as $pharmacist)
                        @include('examination.component_doctor_findmymedicine', ['pharmacist' => $pharmacist])
                    @endforeach
                @else
                    <h3 class="no-data text-center">{{ __('home.no data') }}</h3>
                @endif
            </div>
            <div class="d-flex justify-content-center" style="padding: 12px;">
                <div id="list-title-available" class="list-title d-flex">
                    <div class="list--doctor p-0">
                        <p>{{ __('home.24/7 Available doctor') }}</p>
                    </div>
                    <div class="ms-auto p-2"><a
                            href="{{route('examination.available_doctor')}}">{{ __('home.See all') }}</a></div>
                </div>
            </div>
            <div class="row list-doctor m-auto find-my-medicine">
                @if(count($availableDoctorInfos) > 0)
                    @foreach($availableDoctorInfos as $pharmacist)
                        @include('examination.component_doctor_findmymedicine', ['pharmacist' => $pharmacist])
                    @endforeach
                @else
                    <h3 class="no-data text-center">{{ __('home.no data') }}</h3>
                @endif
            </div>
        </div>
    </div>
@endsection
