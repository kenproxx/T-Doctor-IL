@extends('layouts.master')
@section('title', 'Online Medicine')
@section('content')
    @include('layouts.partials.header')
    @include('component.banner')

    <div class="row clinic-search">
            <div class="clinic-search--left col-md-6 d-flex justify-content-around">
                <div class="title">Category <i class="bi bi-arrow-down-up"></i></div>
                <div class="title">Location <i class="bi bi-arrow-down-up"></i></div>
                <div class="title">Theme <i class="bi bi-arrow-down-up"></i></div>
            </div>
            <div class="clinic-search--center col-md-6 row d-flex justify-content-between">
                <form class="search-box col-md-10">
                    <input type="search" name="focus" placeholder="Search" id="search-input" value="">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </form>
            </div>
        </div>
    <div class="clinics-list">
        <div class="header">

        </div>

        <div class="body row">
            <div class="col-md-4">
                @include('component.clinic')
            </div>
            <div class="col-md-4">
                @include('component.clinic')
            </div>
            <div class="col-md-4">
                @include('component.clinic')
            </div>
            <div class="col-md-4">
                @include('component.clinic')
            </div>
            <div class="col-md-4">
                @include('component.clinic')
            </div>
            <div class="col-md-4">
                @include('component.clinic')
            </div>
            <div class="col-md-4">
                @include('component.clinic')
            </div>
            <div class="col-md-4">
                @include('component.clinic')
            </div>
            <div class="col-md-4">
                @include('component.clinic')
            </div>
            <div class="col-md-4">
                @include('component.clinic')
            </div>
            <div class="col-md-4">
                @include('component.clinic')
            </div>
            <div class="col-md-4">
                @include('component.clinic')
            </div>
        </div>
    </div>
@endsection
