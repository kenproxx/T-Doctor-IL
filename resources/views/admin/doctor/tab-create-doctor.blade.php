@php
    use App\Enums\Role;
@endphp
@extends('layouts.admin')
@section('title')
    Create Doctor
@endsection
@section('main-content')
    <style>
        .list-apply {
            list-style-type: none;
            padding: 0;
            margin: 0;
            display: flex;
        }

        .list-apply li {
            margin-right: 20px; /* Adjust as needed */
        }

        .list-apply li:last-child {
            margin-right: 0;
        }

        .new-select {
            display: flex;
            align-items: center;
        }

        .new-select input {
            margin-right: 5px; /* Adjust as needed */
        }

        .new-select label {
            margin-top: 10px;
        }

        /* Add more styles as needed */

    </style>

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('home.Create Doctor Information') }}</h1>
    @if (session('success'))
        <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <form id="form">

        @csrf
        <div class="row">
            <div class="col-lg-4">
                <div class="form-group focused">
                    <label class="form-control-label" for="username">{{ __('home.Username') }}<span
                            class="small text-danger">*</span></label>
                    <input type="text" id="username" class="form-control" name="username"
                           placeholder="Username"
                           value="">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group focused">
                    <label class="form-control-label" for="name">{{ __('home.Name') }}<span
                            class="small text-danger">*</span></label>
                    <input type="text" id="name" class="form-control" name="name" placeholder="Name" required
                           value="">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group focused">
                    <label class="form-control-label"
                           for="last_name">{{ __('home.Last name') }}</label>
                    <input type="text" id="last_name" class="form-control" name="last_name"
                           placeholder="Last name"
                           value="">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <label class="form-control-label" for="email">{{ __('home.Email address') }}
                        <span
                            class="small text-danger">*</span></label>
                    <input type="email" id="email" class="form-control" name="email"
                           placeholder="example@example.com"
                           value="">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label class="form-control-label" for="phone">{{ __('home.PhoneNumber') }}r<span
                            class="small text-danger">*</span></label>
                    <input type="number" id="phone" class="form-control" name="phone"
                           placeholder="Phone"
                           value="" required>
                </div>
            </div>
            <div class="col-sm-4">
                <label for="avt">{{ __('home.Ảnh đại diện') }} </label>
                <input type="file" class="form-control" id="avt" name="avt" accept="image/*, .pdf, .doc, .docx">
            </div>
        </div>

        <div class="row">
            <div class="form-element col-md-4">
                <label for="password">{{ __('home.Password') }}</label>
                <input class="form-control" id="password" type="password" name="password" minlength="8"
                       placeholder="********" required>
            </div>
            <div class="form-element col-md-4">
                <label for="passwordConfirm">{{ __('home.Enter the Password') }}</label>
                <input class="form-control" id="passwordConfirm" name="passwordConfirm" minlength="8"
                       type="password" placeholder="********" required>
            </div>
                        <div class="col-sm-4 d-flex justify-content-start align-items-center">
                            <span id='message'></span>
                        </div>
        </div>
        <div class="row">
            <div class="form-element col-md-6">
                <label for="type">{{ __('home.Type Account') }}</label>
                <select id="type" name="type" class="form-select form-control">
                    <option value="{{Role::MEDICAL }}">{{ __('home.MEDICAL') }}</option>
                </select>
            </div>
            <div class="form-element col-md-6">
                <label for="member">{{ __('home.Member') }}</label>
                <select id="member" name="member" class="form-select form-control">
                    <option value="{{Role::DOCTORS}}">{{ __('home.DOCTOR') }}</option>
                    <option value="{{Role::PHAMACISTS}}">{{ __('home.PHAMACISTS') }}</option>
                    <option value="{{Role::THERAPISTS}}">{{ __('home.THERAPISTS') }}</option>
                    <option value="{{Role::ESTHETICIANS}}">{{ __('home.ESTHETICIANS') }}</option>
                    <option value="{{Role::NURSES}}">{{ __('home.NURSES') }}</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4"><label for="specialty">{{ __('home.chuyên môn việt') }}</label>
                <input type="text" class="form-control" id="specialty" name="specialty" value="">
            </div>
            <div class="col-sm-4"><label for="specialty_en">{{ __('home.chuyên môn anh') }}</label>
                <input type="text" class="form-control" id="specialty_en" name="specialty_en"
                       value=""></div>
            <div class="col-sm-4"><label for="specialty_laos">{{ __('home.chuyên môn lào') }}</label>
                <input type="text" class="form-control" id="specialty_laos" name="specialty_laos"
                       value=""></div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <label for="service">{{ __('home.Dịch vụ cung cấp việt') }}</label>
                <textarea class="form-control" name="service" id="service"></textarea>
            </div>
            <div class="col-sm-4">
                <label for="service_en">{{ __('home.Dịch vụ cung cấp anh') }}</label>
                <textarea class="form-control" name="service_en" id="service_en"></textarea>
            </div>
            <div class="col-sm-4">
                <label for="service_laos">{{ __('home.Dịch vụ cung cấp lào') }}</label>
                <textarea class="form-control" name="service_laos"
                          id="service_laos"></textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <label for="service_price">{{ __('home.Giá dịch vụ việt') }}</label>
                <input class="form-control" type="number" name="service_price" id="service_price"
                       value="">
            </div>
            <div class="col-sm-4">
                <label for="service_price_en">{{ __('home.Giá dịch vụ anh') }}</label>
                <input class="form-control" type="number" name="service_price_en" id="service_price_en"
                       value="">
            </div>
            <div class="col-sm-4">
                <label for="service_price_laos">{{ __('home.Giá dịch vụ lào') }}</label>
                <input class="form-control" type="number" name="service_price_laos" id="service_price_laos"
                       value="">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <label for="detail_address">{{ __('home.địa chỉ chi tiết việt') }}</label>
                <input class="form-control" name="detail_address" id="detail_address"
                       value="">
            </div>
            <div class="col-sm-4">
                <label for="detail_address_en">{{ __('home.địa chỉ chi tiết anh') }}</label>
                <input class="form-control" name="detail_address_en" id="detail_address_en"
                       value="">
            </div>
            <div class="col-sm-4">
                <label for="detail_address_laos">{{ __('home.địa chỉ chi tiết lào') }}</label>
                <input class="form-control" name="detail_address_laos" id="detail_address_laos"
                       value="">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <label for="province_id">{{ __('home.Tỉnh') }}</label>
                <select name="province_id" id="province_id" class="form-control">

                </select>
            </div>
            <div class="col-sm-4">
                <label for="district_id">{{ __('home.Quận') }}</label>
                <select name="district_id" id="district_id" class="form-control">

                </select>
            </div>
            <div class="col-sm-4">
                <label for="commune_id">{{ __('home.Xã') }}</label>

                <select name="commune_id" id="commune_id" class="form-control">
                </select>
            </div>
        </div>
        <div class="row">

            <div class="col-sm-3">
                <label for="time_working_1_start">{{ __('home.Thời gian làm việc bắt đầu') }}</label>
                <input type="time" class="form-control" id="time_working_1_start" name="time_working_1_start"
                       value="00:00">
            </div>
            <div class="col-sm-3">
                <label for="time_working_1_end">{{ __('home.Thời gian làm việc kết thúc') }}</label>
                <input type="time" class="form-control" id="time_working_1_end"
                       name="time_working_1_end" value="23:59">
            </div>
            <div class="col-sm-3">
                <label for="time_working_2_start">{{ __('home.Những này làm việc bắt đầu') }}</label>
                <select name="time_working_2_start" id="time_working_2_start" class="form-control">
                    <option value="T2">{{ __('home.Thứ 2') }}</option>
                    <option value="T3">{{ __('home.Thứ 3') }}</option>
                    <option value="T4">{{ __('home.Thứ 4') }}</option>
                    <option value="T5">{{ __('home.Thứ 5') }}</option>
                    <option value="T6">{{ __('home.Thứ 6') }}</option>
                    <option value="T7">{{ __('home.Thứ 7') }}</option>
                    <option value="CN">{{ __('home.Chủ nhật') }}</option>
                </select>
            </div>
            <div class="col-sm-3">
                <label for="time_working_2_end">{{ __('home.Những này làm việc kết thúc') }}</label>
                <select name="time_working_2_end" id="time_working_2_end" class="form-control">
                    <option value="T2">{{ __('home.Thứ 2') }}</option>
                    <option value="T3">{{ __('home.Thứ 3') }}</option>
                    <option value="T4">{{ __('home.Thứ 4') }}</option>
                    <option value="T5">{{ __('home.Thứ 5') }}</option>
                    <option value="T6">{{ __('home.Thứ 6') }}</option>
                    <option value="T7">{{ __('home.Thứ 7') }}</option>
                    <option value="CN">{{ __('home.Chủ nhật') }}</option>
                </select>
            </div>

            <input type="text" class="form-control d-none" id="time_working_1" name="time_working_1">
            <input type="text" class="form-control d-none" id="time_working_2" name="time_working_2">
            <input type="text" class="form-control d-none" id="apply_for" name="apply_for">
        </div>
        <div class="row">

            <div class="col-sm-4"><label for="department_id">{{ __('home.Department') }}</label>
                <select class="form-select" id="department_id" name="department_id">
                    @foreach($departments as $department)
                        <option value=" {{$department->id}}"> {{$department->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm-4"><label for="status">{{ __('home.Trạng thái') }}</label>
                <select class="form-select" id="status" name="status">
                    <option value="{{ \App\Enums\UserStatus::PENDING }}">
                        {{ \App\Enums\UserStatus::PENDING }}
                    </option>
                    <option
                        value="{{ \App\Enums\UserStatus::INACTIVE }}">
                        {{ \App\Enums\UserStatus::INACTIVE }}
                    </option>
                    <option value="{{ \App\Enums\UserStatus::ACTIVE }}">
                        {{ \App\Enums\UserStatus::ACTIVE }}
                    </option>
                    <option value="{{ \App\Enums\UserStatus::BLOCKED }}">
                        {{ \App\Enums\UserStatus::BLOCKED }}
                    </option>
                    <option value="{{ \App\Enums\UserStatus::DELETED }}">
                        {{ \App\Enums\UserStatus::DELETED }}
                    </option>
                </select>
            </div>
            <div class="col-sm-4">
                <label for="year_of_experience">{{ __('home.Năm kinh nghiệm') }}</label>
                <input type="number" class="form-control" id="year_of_experience" name="year_of_experience"
                       value="">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                <label for="apply_show">{{ __('home.Apply Show') }}</label>
                <input type="text" class="form-control" id="apply_show" name="apply_show" disabled>
                @php
                    $arrayApply = [
                        'name'=> 'Name',
                        'response_rate'=> 'Response Rate',
                        'specialty'=> 'Specialty',
                        'year_of_experience'=> 'Years of experience',
                        'service'=> 'Service',
                        'service_price'=> 'Service Price',
                        'time_working_1'=> 'Time Working',
                        'time_working_2'=> 'Date Working',
                    ];
                @endphp
                <ul class="list-apply flex-wrap-reverse">
                    @foreach($arrayApply as $key => $value)
                        <li class="new-select">
                            <input onchange="getInput();" class="apply_item" value="{{$key}}"
                                   id="apply_item_{{$key}}"
                                   name="apply_item"
                                   type="checkbox">
                            <label for="apply_item_{{$key}}">{{$value}}</label>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <input hidden="" id="address_code" name="address_code" value="">
        <button type="button" class="btn btn-primary up-date-button mt-md-4">{{ __('home.Save') }}</button>
    </form>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        $('#password, #confirm_password').on('keyup', function () {
            if ($('#password').val() === $('#passwordConfirm').val()) {
                $('#message').html('Matching').css('color', 'green');
            } else
                $('#message').html('Not Matching').css('color', 'red');
        });
    </script>
    <script>
        const token = `{{ $_COOKIE['accessToken'] }}`;
        $(document).ready(function () {
            $('.up-date-button').on('click', function () {
                const headers = {
                    'Authorization': `Bearer ${token}`
                };
                const formData = new FormData();
                const fieldNames = [
                    "specialty", "specialty_en", "specialty_laos",
                    "service_price", "service_price_en", "service_price_laos",
                    "detail_address", "detail_address_en", "detail_address_laos",
                    "province_id", "district_id", "commune_id",
                    "time_working_1", "time_working_2", "apply_for", "address_code",
                    "name", "year_of_experience", "status", "department_id", "username", "email", "phone", "last_name", "password", "passwordConfirm", "member", "type"
                ];
                const fieldTextareaTiny = [
                    "service", "service_en", "service_laos",
                ];

                fieldNames.forEach(fieldName => {
                    formData.append(fieldName, $(`#${fieldName}`).val());
                });


                fieldTextareaTiny.forEach(fieldTextarea => {
                    const content = tinymce.get(fieldTextarea).getContent();
                    formData.append(fieldTextarea, content);
                });

                formData.append("created_by", '{{ \Illuminate\Support\Facades\Auth::user()->id }}');
                formData.append("apply_for", $('#apply_for').val());
                const photo = $('#avt')[0].files[0];
                formData.append('avt', photo);
                formData.append('_token', '{{ csrf_token() }}');

                if (photo) {
                        try {
                            $.ajax({
                                url: `{{route('api.backend.doctors.info.create')}}`,
                                method: 'POST',
                                headers: headers,
                                contentType: false,
                                cache: false,
                                processData: false,
                                data: formData,
                                success: function () {
                                    toastr.success('Create success', 'Success');
                                    window.location.href = '{{ route('homeAdmin.list.doctors') }}';
                                },
                                error: function (xhr) {
                                    if (xhr.status === 400) {
                                        toastr.error(xhr.responseText, 'Error');
                                    } else {
                                        toastr.error('Create error, Please try again!', 'Error');
                                    }
                                    console.log(xhr);
                                }
                            });
                        } catch (error) {
                            throw error;
                        }
                } else {
                    toastr.error('Please choosing thumbnail!');
                }
            })

            setDataForTime('time_working_1_start', 'time_working_1_end', 'time_working_1');
            setDataForTime('time_working_2_start', 'time_working_2_end', 'time_working_2');

            $('#time_working_1_start').on('change', function () {
                setDataForTime('time_working_1_start', 'time_working_1_end', 'time_working_1')
            })

            $('#time_working_1_end').on('change', function () {
                setDataForTime('time_working_1_start', 'time_working_1_end', 'time_working_1')
            })

            $('#time_working_2_start').on('change', function () {
                setDataForTime('time_working_2_start', 'time_working_2_end', 'time_working_2')
            })

            $('#time_working_2_end').on('change', function () {
                setDataForTime('time_working_2_start', 'time_working_2_end', 'time_working_2')
            })

            function setDataForTime(time_working_start, time_working_end, merge) {
                let value_start = $('#' + time_working_start).val();
                let value_end = $('#' + time_working_end).val();
                let mergeValue = value_start + '-' + value_end;
                $('#' + merge).val(mergeValue);
            }
        })
    </script>
    <script>
        $(document).ready(function () {
            callGetAllProvince();

            $('#province_id').on('change', function () {
                let id_code = $(this).val();
                let myArray = id_code.split('-');
                let code = myArray[1];
                $('#address_code').val(myArray[2]);
                callGetAllDistricts(code);
            })

            $('#district_id').on('change', function () {
                let id_code = $(this).val();
                let myArray = id_code.split('-');
                let code = myArray[1];
                callGetAllCommunes(code);
            })
        })

        async function callGetAllProvince() {
            $.ajax({
                url: `{{ route('restapi.get.provinces') }}`,
                method: 'GET',
                success: function (response) {
                    showAllProvince(response);
                },
                error: function (exception) {
                    console.log(exception);
                }
            });
        }

        async function callGetAllDistricts(code) {
            let url = `{{ route('restapi.get.districts', ['code' => ':code']) }}`;
            url = url.replace(':code', code);
            $.ajax({
                url: url,
                method: 'GET',
                success: function (response) {
                    showAllDistricts(response);
                },
                error: function (exception) {
                    console.log(exception);
                }
            });
        }

        async function callGetAllCommunes(code) {
            let url = `{{ route('restapi.get.communes', ['code' => ':code']) }}`;
            url = url.replace(':code', code);
            $.ajax({
                url: url,
                method: 'GET',
                success: function (response) {
                    showAllCommunes(response);
                },
                error: function (exception) {
                    console.log(exception);
                }
            });
        }

        function showAllProvince(res) {
            let html = ``;
            for (let i = 0; i < res.length; i++) {
                let data = res[i];
                let code = data.code;
                html = html + `<option class="province province-item" data-code="${code}" value="${data.id}-${data.code}-${data.code_name}">${data.name}</option>`;
            }

            $('#province_id').empty().append(html);
        }

        function showAllDistricts(res) {
            let html = ``;
            for (let i = 0; i < res.length; i++) {
                let data = res[i];
                html = html + `<option class="district district-item" value="${data.id}-${data.code}">${data.name}</option>`;
            }
            $('#district_id').empty().append(html);
        }

        function showAllCommunes(res) {
            let html = ``;
            for (let i = 0; i < res.length; i++) {
                let data = res[i];
                html = html + `<option value="${data.id}-${data.code}">${data.name}</option>`;
            }
            $('#commune_id').empty().append(html);
        }
    </script>
    <script>
        let arrayItem = [];
        let arrayNameCategory = [];

        function removeArray(arr) {
            var what, a = arguments, L = a.length, ax;
            while (L > 1 && arr.length) {
                what = a[--L];
                while ((ax = arr.indexOf(what)) !== -1) {
                    arr.splice(ax, 1);
                }
            }
            return arr;
        }

        function getListName(array, items) {
            for (let i = 0; i < items.length; i++) {
                if (items[i].checked) {
                    if (array.length == 0) {
                        array.push(items[i].nextElementSibling.innerText);
                    } else {
                        let name = array.includes(items[i].nextElementSibling.innerText);
                        if (!name) {
                            array.push(items[i].nextElementSibling.innerText);
                        }
                    }
                } else {
                    removeArray(array, items[i].nextElementSibling.innerText)
                }
            }
            return array;
        }

        function checkArray(array, listItems) {
            for (let i = 0; i < listItems.length; i++) {
                if (listItems[i].checked) {
                    if (array.length == 0) {
                        array.push(listItems[i].value);
                    } else {
                        let check = array.includes(listItems[i].value);
                        if (!check) {
                            array.push(listItems[i].value);
                        }
                    }
                } else {
                    removeArray(array, listItems[i].value);
                }
            }
            return array;
        }

        function getInput() {
            let items = document.getElementsByClassName('apply_item');

            arrayItem = checkArray(arrayItem, items);
            arrayNameCategory = getListName(arrayNameCategory, items)

            let listName = arrayNameCategory.toString();

            if (listName) {
                $('#apply_show').val(listName);
            }

            arrayItem.sort();
            let value = arrayItem.toString();
            $('#apply_for').val(value);
        }
    </script>
@endsection
