@extends('layouts.master')
@section('title', 'Specialist')
@section('content')
    <link rel="stylesheet" href="{{asset('css/homeSpecialist.css')}}">
    @include('layouts.partials.header')
    <div class="container">
        <div class="tab-chuyen-khoa">
            <a href="{{route('home')}}">
                <div class="titleServiceHomeNew"><i class="fa-solid fa-arrow-left"></i> Chuyên khoa</div>
            </a>
            <div class="mainServiceHomeNew row">
                @php
                    $departments = \App\Models\Department::where('status', \App\Enums\DepartmentStatus::ACTIVE)->get();
                @endphp
                @foreach($departments as $departmentItem)
                    <div class="col-md-4">
                        <a href="{{route('home.specialist.department',$departmentItem->id)}}">
                            <div class="border-HomeNew">
                                <div class="w-75 d-flex align-items-center ">
                                    <img src="{{$departmentItem->thumbnail}}" alt="thumbnail">
                                    <span>{{$departmentItem->name}}</span>
                                </div>
                                <div class="svg-containerNho">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                         fill="none">
                                        <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd"
                                              d="M16.6666 0H7.3333V7.33268L0 7.33268V16.666H7.3333V24H16.6666V16.666H24V7.33268L16.6666 7.33268V0Z"
                                              fill="#D8F6FF"/>
                                    </svg>
                                </div>
                                <div class="svg-container">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 60 60"
                                         fill="none">
                                        <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd"
                                              d="M41.6667 0H18.3333V18.3327H0V41.666H18.3333V60H41.6667V41.666H60V18.3327H41.6667V0Z"
                                              fill="#D8F6FF"/>
                                    </svg>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
