@php use Illuminate\Support\Facades\Auth; @endphp
@extends('layouts.admin')

@section('main-content')

    <style>
        .w-icon-px {
            width: 14px;
        }

        .avatar-user {
            vertical-align: middle;
            border-radius: 50% !important;
            border: 1px solid #cccccc;
        }
    </style>
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Profile') }}</h1>

    @if (session('success'))
        <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger border-left-danger" role="alert">
            <ul class="pl-4 my-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">

        <div class="col-lg-4 order-lg-2">

            <div class="card shadow mb-4">
                <div class="card-profile-image mt-4">
                    <img class="avatar-user" src="{{ Auth::user()->avt }}" alt=""
                         style="max-width: 100px; max-height: 100px">
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="text-center">
                                <h5 class="font-weight-bold">{{  Auth::user()->name }}</h5>
                                <p>{{  Auth::user()->username }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow mb-4">
                <div class="card-body">
                    <form>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i
                                        class="fa-brands fa-facebook w-icon-px"></i></span>
                            </div>
                            <input type="text" class="form-control" id="facebook" name="facebook"
                                   value="{{ $socialUser->facebook ?? '' }}">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i
                                        class="fa-brands fa-tiktok w-icon-px"></i></span>
                            </div>
                            <input type="text" class="form-control" id="tiktok" name="tiktok"
                                   value="{{ $socialUser->tiktok ?? '' }}">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa-brands fa-instagram"></i></span>
                            </div>
                            <input type="text" class="form-control" id="instagram" name="instagram"
                                   value="{{ $socialUser->instagram ?? '' }}">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i
                                        class="fa-brands fa-google"></i></span>
                            </div>
                            <input type="text" class="form-control" id="google_review" name="google_review"
                                   value="{{ $socialUser->google_review ?? '' }}">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i
                                        class="fa-brands fa-youtube w-icon-px"></i></span>
                            </div>
                            <input type="text" class="form-control" id="youtube" name="youtube"
                                   value="{{ $socialUser->youtube ?? '' }}">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i
                                        class="fa-solid fa-otter w-icon-px"></i></span>
                            </div>
                            <input type="text" class="form-control" id="other" name="other"
                                   value="{{ $socialUser->other ?? '' }}">
                        </div>

                        <input type="hidden" id="user_id" name="user_id"
                               value="{{ Auth::user()->id }}">
                        <button type="button" class="btn btn-primary" onclick="submitForm()">Submit</button>
                    </form>
                </div>
            </div>

        </div>

        <div class="col-lg-8 order-lg-1">

            <div class="card shadow mb-4">

                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">My Account</h6>
                </div>

                <div class="card-body">

                    <form method="POST" action="{{ route('profile.update') }}" autocomplete="off">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <input type="hidden" name="_method" value="PUT">

                        <h6 class="heading-small text-muted mb-4">User information</h6>

                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="username">Username<span
                                                class="small text-danger">*</span></label>
                                        <input type="text" id="username" class="form-control" name="username"
                                               placeholder="Username"
                                               value="{{ old('username', Auth::user()->username) }}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="name">Name<span
                                                class="small text-danger">*</span></label>
                                        <input type="text" id="name" class="form-control" name="name" placeholder="Name"
                                               value="{{ old('name', Auth::user()->name) }}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="last_name">Last name</label>
                                        <input type="text" id="last_name" class="form-control" name="last_name"
                                               placeholder="Last name"
                                               value="{{ old('last_name', Auth::user()->last_name) }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="email">Email address<span
                                                class="small text-danger">*</span></label>
                                        <input type="email" id="email" class="form-control" name="email"
                                               placeholder="example@example.com"
                                               value="{{ old('email', Auth::user()->email) }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="phone">PhoneNumber<span
                                                class="small text-danger">*</span></label>
                                        <input type="text" id="phone" class="form-control" name="phone"
                                               placeholder="Phone"
                                               value="{{ old('phone', Auth::user()->phone) }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="current_password">Current
                                            password</label>
                                        <input type="password" id="current_password" class="form-control"
                                               name="current_password" placeholder="Current password">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="new_password">New password</label>
                                        <input type="password" id="new_password" class="form-control"
                                               name="new_password" placeholder="New password">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="confirm_password">Confirm
                                            password</label>
                                        <input type="password" id="confirm_password" class="form-control"
                                               name="password_confirmation" placeholder="Confirm password">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3"><label>Nation</label>
                                    <select class="custom-select" name="nation_id" id="nation_id"
                                            onchange="searchProvince(this.value)">
                                        @if($nations)
                                            @foreach($nations as $nation)
                                                <option
                                                    value="{{ $nation->id }}" {{ Auth::user()->nation_id == $nation->id ? 'selected' : '' }}>{{ $nation->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="col-sm-3"><label>Province</label>
                                    <select class="custom-select" name="province_id" id="province_id"
                                            onchange="searchDistrict(this.value)">
                                    </select>
                                </div>
                                <div class="col-sm-3"><label>District</label>
                                    <select class="custom-select" name="district_id" id="district_id"
                                            onchange="searchCommune(this.value)">

                                    </select>
                                </div>
                                <div class="col-sm-3"><label>Commune</label>
                                    <select class="custom-select" name="commune_id" id="commune_id">

                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="address_code">AddressCode</label>
                                        <input type="text" id="address_code" class="form-control" name="address_code"
                                               placeholder="HN123"
                                               value="{{ old('address_code', Auth::user()->address_code) }}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="member">Member<span
                                                class="small text-danger">*</span></label>
                                        <select id="member" name="member" class="form-control" disabled>
                                            @foreach($roles as $role)
                                                @php
                                                    $isSelected = false;
                                                    if ($role->id == $roleItem->id){
                                                        $isSelected = true;
                                                    }
                                                @endphp
                                                <option
                                                    {{ $isSelected ? 'selected' : '' }} value="{{$role->id}}">{{$role->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="status">Status</label>
                                        <input type="text" id="status" class="form-control" name="status"
                                               disabled
                                               value="{{ old('status', Auth::user()->status) }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Button -->
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col text-center">
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>

            </div>

        </div>

    </div>

    <script>

        let isFirstLoading = true;
        let nation_user = '{{ Auth::user()->nation_id }}';
        let province_user = '{{ Auth::user()->province_id }}';
        let district_user = '{{ Auth::user()->district_id }}';
        let commune_user = '{{ Auth::user()->commune_id }}';

        $(document).ready(function () {
            searchProvince(nation_user);
        });

        function searchProvince(id) {
            loadingMasterPage();
            const url = `{{ route('address.get.list.province') }}`;
            const data = {
                _token: '{{ csrf_token() }}',
                nation_id: id
            };
            try {
                $.ajax({
                    url: url,
                    method: 'POST',
                    data: data,
                    success: async function (response) {
                        let html = '';
                        response.forEach((item) => {
                            let isSelected = ''
                            if (isFirstLoading) {
                                isSelected = item.code == province_user ? 'selected' : '';
                            }
                            html += `<option value="${item.code}" ${isSelected}>${item.name}</option>`;
                        });
                        $('#province_id').html(html);
                        if (response.length > 0) {
                            if (isFirstLoading) {
                                await searchDistrict(province_user);
                            } else {
                                await searchDistrict(response[0].code);
                            }
                        } else {
                            $('#district_id').html('');
                            $('#commune_id').html('');
                            isFirstLoading = false;
                        }
                        loadingMasterPage();
                    },
                    error: function (exception) {
                        alert(exception.responseText);
                    }
                });
            } catch (error) {
                loadingMasterPage();
                throw error;
            }
        }

        async function searchDistrict(id) {
            loadingMasterPage();
            const url = `{{ route('address.get.list.district') }}`;
            const data = {
                _token: '{{ csrf_token() }}',
                province_code: id
            };
            try {
                $.ajax({
                    url: url,
                    method: 'POST',
                    data: data,
                    success: async function (response) {
                        let html = '';
                        response.forEach((item) => {
                            let isSelected = ''
                            if (isFirstLoading) {
                                isSelected = item.code == district_user ? 'selected' : '';
                            }
                            html += `<option value="${item.code}" ${isSelected}>${item.name}</option>`;
                        });
                        $('#district_id').html(html);
                        if (response.length > 0) {
                            if (isFirstLoading) {
                                await searchCommune(district_user);
                            } else {
                                await searchCommune(response[0].code);
                            }
                        } else {
                            $('#commune_id').html('');
                            isFirstLoading = false;
                        }
                        loadingMasterPage();
                    },
                    error: function (exception) {
                        loadingMasterPage();
                    }
                });
            } catch (error) {
                loadingMasterPage();
                throw error;
            }
        }

        async function searchCommune(id) {
            loadingMasterPage();
            const url = `{{ route('address.get.list.commune') }}`;
            const data = {
                _token: '{{ csrf_token() }}',
                district_code: id
            };
            try {
                $.ajax({
                    url: url,
                    method: 'POST',
                    data: data,
                    success: async function (response) {
                        let html = '';
                        response.forEach((item) => {
                            let isSelected = ''
                            if (isFirstLoading) {
                                isSelected = item.id == commune_user ? 'selected' : '';
                            }
                            html += `<option value="${item.id}" ${isSelected}>${item.name}</option>`;
                        });
                        $('#commune_id').html(html);
                        loadingMasterPage();
                    },
                    error: function (exception) {
                        loadingMasterPage();
                    }
                });
            } catch (error) {
                loadingMasterPage();
                throw error;
            }
        }
    </script>
    <script>
        function submitForm() {
            loadingMasterPage();
            const token = `{{ $_COOKIE['accessToken'] ?? '' }}`;
            const headers = {
                'Authorization': `Bearer ${token}`
            };
            const formData = new FormData();

            const arrField = ['facebook', 'tiktok', 'instagram', 'google_review', 'youtube', 'other', 'user_id'];

            arrField.forEach((field) => {
                formData.append(field, $(`#${field}`).val().trim());
            });
            formData.append('_token', '{{ csrf_token() }}');

            try {
                $.ajax({
                    url: `{{route('user.social.update')}}`,
                    method: 'POST',
                    headers: headers,
                    contentType: false,
                    cache: false,
                    processData: false,
                    data: formData,
                    success: function () {
                        loadingMasterPage();
                        alert('Update success');
                        window.location.reload();
                    },
                    error: function (exception) {
                        alert(exception.responseText);
                        loadingMasterPage();
                    }
                });
            } catch (error) {
                loadingMasterPage();
                throw error;
            }

        }
    </script>

@endsection
