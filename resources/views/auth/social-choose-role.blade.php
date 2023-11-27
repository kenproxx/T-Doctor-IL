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
                        <label for="name">{{ __('home.Name') }}</label>
                        <input type="text" name="name" class="form-control" id="name" value="{{ $user->name }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="last_name">{{ __('home.Last name') }}</label>
                        <input type="text" name="last_name" class="form-control" id="last_name" value="{{ $user->last_name }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="phone">{{ __('home.PhoneNumber') }}</label>
                        <input required type="text" name="phone" class="form-control" id="phone" value="{{ $user->phone }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="username">{{ __('home.Username') }}</label>
                        <input required type="text" name="username" class="form-control" id="username" value="{{ $user->username }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="email">{{ __('home.Email') }}</label>
                        <input required type="email" name="email" class="form-control" id="email" value="{{ $user->email }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="password">{{ __('home.Password') }}</label>
                        <input required type="password" name="password" class="form-control" id="password">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="passwordConfirm">{{ __('home.Confirm Password') }}</label>
                        <input required type="password" name="passwordConfirm" class="form-control" id="passwordConfirm">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="address_code">{{ __('home.AddressCode') }}</label>
                        <input type="text" name="address_code" class="form-control" id="address_code" value="{{ $user->address_code }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="type">{{ __('home.Type Account') }}</label>
                        <select id="type" name="type" class="form-select">
                            <option>Choose...</option>
                            <option value="BUSINESS">{{ __('home.BUSINESS') }}</option>
                            <option value="MEDICAL">{{ __('home.MEDICAL') }}</option>
                            <option value="NORMAL">{{ __('home.NORMAL') }}</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="member">{{ __('home.Member') }}</label>
                        <select id="member" name="member" class="form-select">
                            <option value="PAITENTS">{{ __('home.PAITENTS') }}</option>
                            <option value="NORMAL_PEOPLE">{{ __('home.NORMAL PEOPLE') }}</option>
                        </select>
                    </div>
                </div>
                <div class="">
                    <a href="{{ route('home') }}" class="btn btn-secondary float-left">{{ __('home.Back') }}</a>
                    <button type="submit" class="btn btn-primary float-right">{{ __('home.Continue') }}</button>
                </div>
            </form>
        @endif
    </div>
    <script>
        $(document).ready(function () {
            $('#type').on('change', function () {
                let value = $(this).val();
                let html = ``;
                switch (value) {
                    case 'BUSINESS':
                        html = `<option value="{{\App\Enums\Role::PHARMACEUTICAL_COMPANIES}}">PHARMACEUTICAL COMPANIES</option>
                                                <option value="{{\App\Enums\Role::HOSPITALS}}">HOSPITALS</option>
                                                <option value="{{\App\Enums\Role::CLINICS}}">CLINICS</option>
                                                <option value="{{\App\Enums\Role::PHARMACIES}}">PHARMACIES</option>
                                                <option value="{{\App\Enums\Role::SPAS}}">SPAS</option>
                                                <option value="{{\App\Enums\Role::OTHERS}}">OTHERS</option>`;
                        break;
                    case 'MEDICAL':
                        html = `<option value="{{\App\Enums\Role::DOCTORS}}">DOCTOR</option>
                                                <option value="{{\App\Enums\Role::PHAMACISTS}}">PHAMACISTS</option>
                                                <option value="{{\App\Enums\Role::THERAPISTS}}">THERAPISTS</option>
                                                <option value="{{\App\Enums\Role::ESTHETICIANS}}">ESTHETICIANS</option>
                                                <option value="{{\App\Enums\Role::NURSES}}">NURSES</option>`;
                        break;
                    default:
                        html = `<option value="{{\App\Enums\Role::PAITENTS}}">PAITENTS</option>
                                                <option value="{{\App\Enums\Role::NORMAL_PEOPLE}}">NORMAL PEOPLE</option>`;
                        break;
                }
                $('#member').empty().append(html);
            })
        })
    </script>
@endsection
