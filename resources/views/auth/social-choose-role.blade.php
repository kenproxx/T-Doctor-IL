@extends('layouts.master')
@section('title', 'Login Page')
@section('content')
    @include('layouts.partials.header_3')
    <div class="container" style="margin-top: 120px">
        <h3 class="text-center" style="font-weight: 600">Welcome new {{$user->name}}</h3>
        <div class="text-center mt-3 mb-3">
            <img src="{{ $user->avt }}" alt="" style="width:150px;" class="bg-info rounded-circle border">
        </div>
        @if($user->provider_name)
            <form action="{{ route('save.user.login.social') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" id="name" value="{{ $user->name }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="last_name">Last name</label>
                        <input type="text" name="last_name" class="form-control" id="last_name" value="{{ $user->last_name }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="phone">PhoneNumber</label>
                        <input required type="text" name="phone" class="form-control" id="phone" value="{{ $user->phone }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="username">Username</label>
                        <input required type="text" name="username" class="form-control" id="username" value="{{ $user->username }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="email">Email</label>
                        <input required type="email" name="email" class="form-control" id="email" value="{{ $user->email }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="password">Password</label>
                        <input required type="password" name="password" class="form-control" id="password">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="passwordConfirm">PasswordConfirm</label>
                        <input required type="password" name="passwordConfirm" class="form-control" id="passwordConfirm">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="address_code">AddressCode</label>
                        <input type="text" name="address_code" class="form-control" id="address_code" value="{{ $user->address_code }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="member">Member</label>
                        <select id="member" name="member" class="form-select">
                            <option>Choose...</option>
                            <option value="PHARMACEUTICAL_COMPANIES">PHARMACEUTICAL COMPANIES</option>
                            <option value="HOSPITALS">HOSPITALS</option>
                            <option value="CLINICS">CLINICS</option>
                            <option value="PHARMACIES">PHARMACIES</option>
                            <option value="SPAS">SPAS</option>
                            <option value="OTHERS">OTHERS</option>
                        </select>
                    </div>
                </div>
                <div class="">
                    <a href="{{ route('home') }}" class="btn btn-secondary float-left">Back</a>
                    <button type="submit" class="btn btn-primary float-right">Continue</button>
                </div>
            </form>
        @endif
    </div>
@endsection
