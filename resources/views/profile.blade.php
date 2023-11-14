@extends('layouts.admin')

@section('main-content')

    <style>
        .w-icon-px {
            width: 14px;
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
                    <figure class="rounded-circle avatar avatar font-weight-bold"
                            style="font-size: 60px; height: 180px; width: 180px;"
                            data-initial="{{ Auth::user()->avt }}"></figure>
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

                    <div class="row">
                        <div class="col-md-4">
                            <div class="card-profile-stats">
                                <span class="heading">22</span>
                                <span class="description">Friends</span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card-profile-stats">
                                <span class="heading">10</span>
                                <span class="description">Photos</span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card-profile-stats">
                                <span class="heading">89</span>
                                <span class="description">Comments</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow mb-4">
                <div class="card-body">
                    <form>
                        <div class="input-group mb-3" >
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa-brands fa-facebook w-icon-px"></i></span>
                            </div>
                            <input type="text" class="form-control" id="facebook" name="facebook" value="{{ $socialUser->facebook ?? '' }}">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa-brands fa-tiktok w-icon-px"></i></span>
                            </div>
                            <input type="text" class="form-control" id="tiktok" name="tiktok" value="{{ $socialUser->tiktok ?? '' }}">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa-brands fa-instagram"></i></span>
                            </div>
                            <input type="text" class="form-control" id="instagram" name="instagram" value="{{ $socialUser->instagram ?? '' }}">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa-brands fa-google"></i></span>
                            </div>
                            <input type="text" class="form-control" id="google_review" name="google_review" value="{{ $socialUser->google_review ?? '' }}">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa-brands fa-youtube w-icon-px"></i></span>
                            </div>
                            <input type="text" class="form-control" id="youtube" name="youtube" value="{{ $socialUser->youtube ?? '' }}">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-otter w-icon-px"></i></span>
                            </div>
                            <input type="text" class="form-control" id="other" name="other" value="{{ $socialUser->other ?? '' }}">
                        </div>

                        <input type="hidden" id="user_id" name="user_id" value="{{ \Illuminate\Support\Facades\Auth::user()->id }}">
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
                                        <select id="member" name="member" class="form-control">
                                            @foreach($roles as $role)
                                                @php
                                                    $isSelected = false;
                                                    if ($role->id == $roleItem->id){
                                                        $isSelected = true;
                                                    }
                                                @endphp
                                                <option {{ $isSelected ? 'selected' : '' }} value="{{$role->id}}">{{$role->name}}</option>
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
