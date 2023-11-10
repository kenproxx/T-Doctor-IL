@extends('layouts.admin')

@section('main-content')
{{--    <h1 class="h3 mb-4 text-gray-800">{{ __('List Configuration') }}</h1>--}}
    <div id="example">
        <h1>{{ __('List Configuration') }}</h1>
        <ul class="list">
            <a href="#">
                <li class="logo">
                    <span class="title">Cài đặt logo</span>
                    <span class="subtitle">Hình ảnh</span>
                </li>
            </a>
            <a href="#">
                <li class="Banner">
                    <span class="title">Banner quảng cáo</span>
                    <span class="subtitle">Banner</span>
                </li>
            </a>
            <a href="#">
                <li class="work">
                    <span class="title">Địa chỉ , Email, Số điện thoại</span>
                    <span class="subtitle">Work</span>
                </li>
            </a>
            <a href="#">
                <li class="yellow">
                    <span class="title">Meeting with San Francisco Team</span>
                    <span class="subtitle">yellow</span>
                </li>
            </a>
            <a href="#">
                <li class="pink">
                    <span class="title">Meeting with San Francisco Team</span>
                    <span class="subtitle">green</span>
                </li>
            </a>
        </ul>
    </div>

@endsection
