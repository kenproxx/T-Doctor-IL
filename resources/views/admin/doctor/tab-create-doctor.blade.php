@extends('layouts.admin')
@section('title')
    Create Doctor
@endsection
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
@section('main-content')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Create Doctor Information</h1>
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
        <div>
            <label for="name">name</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="row">
            <div class="col-sm-4"><label for="hocham_hocvi">Học hàm học vị</label>
                <select class="custom-select" id="hocham_hocvi" name="hocham_hocvi">
                    @foreach($types as $type)
                        <option value="{{ $type }}">{{ $type }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm-4">
                <label for="year_of_experience">Năm kinh nghiệm</label>
                <input type="number" class="form-control" id="year_of_experience" name="year_of_experience">
            </div>
            <div class="col-sm-4">
                <label for="created_by">User</label>
                <select class="custom-select" id="created_by" name="created_by">
                    @foreach($users as $user)
                        <option value=" {{$user->id}}"> {{$user->username}} ({{$user->email}})</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <label for="specialty">chuyên môn việt</label>
                <input type="text" class="form-control" id="specialty" name="specialty"></div>
            <div class="col-sm-4">
                <label for="specialty_en">chuyên môn anh</label>
                <input type="text" class="form-control" id="specialty_en" name="specialty_en" value=""></div>
            <div class="col-sm-4">
                <label for="specialty_laos">chuyên môn lào</label>
                <input type="text" class="form-control" id="specialty_laos" name="specialty_laos"
                       value=""></div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <label for="service">Dịch vụ cung cấp việt</label>
                <textarea class="form-control" name="service" id="service"></textarea>
            </div>
            <div class="col-sm-4">
                <label for="service_en">Dịch vụ cung cấp anh</label>
                <textarea class="form-control" name="service_en" id="service_en"></textarea>
            </div>
            <div class="col-sm-4">
                <label for="service_laos">Dịch vụ cung cấp lào</label>
                <textarea class="form-control" name="service_laos" id="service_laos"></textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <label for="service_price">Giá dịch vụ việt</label>
                <input class="form-control" type="number" name="service_price" id="service_price">
            </div>
            <div class="col-sm-4">
                <label for="service_price_en">Giá dịch vụ anh</label>
                <input class="form-control" type="number" name="service_price_en" id="service_price_en">
            </div>
            <div class="col-sm-4">
                <label for="service_price_laos">Giá dịch vụ lào</label>
                <input class="form-control" type="number" name="service_price_laos" id="service_price_laos">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <label for="detail_address">địa chỉ chi tiết việt</label>
                <input class="form-control" name="detail_address" id="detail_address">
            </div>
            <div class="col-sm-4">
                <label for="detail_address_en">địa chỉ chi tiết anh</label>
                <input class="form-control" name="detail_address_en" id="detail_address_en">
            </div>
            <div class="col-sm-4">
                <label for="detail_address_laos">địa chỉ chi tiết lào</label>
                <input class="form-control" name="detail_address_laos" id="detail_address_laos">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <label for="province_id">Tỉnh</label>
                <select name="province_id" id="province_id" class="form-control">

                </select>
            </div>
            <div class="col-sm-4">
                <label for="district_id">Quận</label>
                <select name="district_id" id="district_id" class="form-control">

                </select>
            </div>
            <div class="col-sm-4">
                <label for="commune_id">Xã</label>
                <select name="commune_id" id="commune_id" class="form-control">

                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                <label for="time_working_1_start">Thời gian làm việc bắt đầu</label>
                <input type="time" class="form-control" id="time_working_1_start" name="time_working_1_start"
                       value="00:00">
            </div>
            <div class="col-sm-3">
                <label for="time_working_1_end">Thời gian làm việc kết thúc</label>
                <input type="time" class="form-control" id="time_working_1_end" name="time_working_1_end" value="23:59">
            </div>
            <div class="col-sm-3">
                <label for="time_working_2_start">Những này làm việc bắt đầu</label>
                <select name="time_working_2_start" id="time_working_2_start" class="form-control">
                    <option value="T2">Thứ 2</option>
                    <option value="T3">Thứ 3</option>
                    <option value="T4">Thứ 4</option>
                    <option value="T5">Thứ 5</option>
                    <option value="T6">Thứ 6</option>
                    <option value="T7">Thứ 7</option>
                    <option value="CN">Chủ nhật</option>
                </select>
            </div>
            <div class="col-sm-3">
                <label for="time_working_2_end">Những này làm việc kết thúc</label>
                <select name="time_working_2_end" id="time_working_2_end" class="form-control">
                    <option value="T2">Thứ 2</option>
                    <option value="T3">Thứ 3</option>
                    <option value="T4">Thứ 4</option>
                    <option value="T5">Thứ 5</option>
                    <option value="T6">Thứ 6</option>
                    <option value="T7">Thứ 7</option>
                    <option value="CN">Chủ nhật</option>
                </select>
            </div>

            <input type="text" class="form-control d-none" id="time_working_1" name="time_working_1">
            <input type="text" class="form-control d-none" id="time_working_2" name="time_working_2">
            <input type="text" class="form-control d-none" id="apply_for" name="apply_for">
        </div>
        <div class="row">
            <div class="col-sm-4"><label>Số lượng đký tối đa</label>
                <label>thumbnail</label>
                <input type="file" class="form-control" id="thumbnail" name="thumbnail" multiple accept="image/*">
            </div>
            <div class="col-sm-4"><label for="department_id">Department</label>
                <select class="custom-select" id="department_id" name="department_id">
                    @foreach($departments as $department)
                        <option value="{{$department->id}}"> {{$department->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm-4"><label for="status">Trạng thái</label>
                <select class="custom-select" id="status" name="status">
                    <option value="{{ \App\Enums\DoctorInfoStatus::ACTIVE }}">
                        {{ \App\Enums\DoctorInfoStatus::ACTIVE }}
                    </option>
                    <option value="{{ \App\Enums\DoctorInfoStatus::INACTIVE }}">
                        {{ \App\Enums\DoctorInfoStatus::INACTIVE }}
                    </option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="apply_show">Apply Show</label>
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
            <ul class="list-apply">
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

        <button type="button" class="btn btn-primary up-date-button mt-md-4">Lưu</button>
    </form>
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
                    "time_working_1", "time_working_2", "apply_for",
                    "name", "year_of_experience", "status", "department_id", "created_by", "hocham_hocvi"
                ];
                const fieldTextareaTiny = [
                    "service", "service_en", "service_laos",
                ];

                fieldNames.forEach(fieldName => {
                    formData.append(fieldName, $(`#${fieldName}`).val());
                });

                console.log(fieldNames);

                /* Temporary don't use tinymce because this was error
                *  and move the necessary ids(service, service_en, service_laos) to fieldNames array*/
                fieldTextareaTiny.forEach(fieldTextarea => {
                    const content = tinymce.get(fieldTextarea).getContent();
                    formData.append(fieldTextarea, content);
                });

                {{--formData.append("created_by", '{{ \Illuminate\Support\Facades\Auth::user()->id }}');--}}
                formData.append("apply_for", $('#apply_for').val());
                const photo = $('#thumbnail')[0].files[0];
                formData.append('thumbnail', photo);
                formData.append('_token', '{{ csrf_token() }}');

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
                            alert('Create success');
                            window.location.href = '{{ route('homeAdmin.list.doctors') }}';
                        },
                        error: function (exception) {
                            alert('Create error');
                            console.log(exception)
                        }
                    });
                } catch (error) {
                    throw error;
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
                html = html + `<option class="province province-item" data-code="${code}" value="${data.id}-${data.code}">${data.name}</option>`;
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
