@extends('layouts.admin')

@section('main-content')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Edit Product</h1>
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
        <div><label for="name">name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{$doctor->name}}"></div>
        <div class="row">
            <div class="col-sm-4">
                <label for="hocham_hocvi">Học hàm học vị</label>
                <select class="custom-select" id="hocham_hocvi" name="hocham_hocvi">
                    @foreach($types as $type)
                        <option
                            {{ $type == $doctor->hocham_hocvi ? 'selected' : ''}} value="{{ $type }}">{{ $type }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm-4">
                <label for="year_of_experience">Năm kinh nghiệm</label>
                <input type="number" class="form-control" id="year_of_experience" name="year_of_experience"
                       value="{{$doctor->year_of_experience}}">
            </div>
            <div class="col-sm-4">
                <label for="created_by">User</label>
                <select class="custom-select" id="created_by" name="created_by">
                    @php
                        $crUser = \App\Models\User::find($doctor->created_by);
                    @endphp
                    <option value="{{$crUser->id}}"> {{$crUser->username}} ({{$crUser->email}})</option>
                    @foreach($users as $user)
                        <option value="{{$user->id}}"> {{$user->username}} ({{$user->email}})</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div><label for="apply_for">Apply for</label>
            <input type="text" class="form-control" id="apply_for" name="apply_for" value="{{$doctor->apply_for}}">
        </div>
        <div class="row">
            <div class="col-sm-4"><label for="specialty">chuyên môn việt</label>
                <input type="text" class="form-control" id="specialty" name="specialty" value="{{$doctor->specialty}}">
            </div>
            <div class="col-sm-4"><label for="specialty_en">chuyên môn anh</label>
                <input type="text" class="form-control" id="specialty_en" name="specialty_en"
                       value="{{$doctor->specialty_en}}"></div>
            <div class="col-sm-4"><label for="specialty_laos">chuyên môn lào</label>
                <input type="text" class="form-control" id="specialty_laos" name="specialty_laos"
                       value="{{$doctor->specialty_laos}}"></div>
        </div>
        <div class="row">
            <div class="col-sm-4"><label>Dịch vụ cung cấp việt</label>
                <textarea class="form-control" name="service" id="service">{{$doctor->service}}</textarea>
            </div>
            <div class="col-sm-4"><label>Dịch vụ cung cấp anh</label>
                <textarea class="form-control" name="service_en" id="service_en">{{$doctor->service_en}}</textarea>
            </div>
            <div class="col-sm-4"><label>Dịch vụ cung cấp lào</label>
                <textarea class="form-control" name="service_laos"
                          id="service_laos">{{$doctor->service_laos}}</textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4"><label>Giá dịch vụ việt</label>
                <input class="form-control" type="number" name="service_price" id="service_price"
                       value="{{$doctor->service_price}}">
            </div>
            <div class="col-sm-4"><label>Giá dịch vụ anh</label>
                <input class="form-control" type="number" name="service_price_en" id="service_price_en"
                       value="{{$doctor->service_price_en}}">
            </div>
            <div class="col-sm-4"><label>Giá dịch vụ lào</label>
                <input class="form-control" type="number" name="service_price_laos" id="service_price_laos"
                       value="{{$doctor->service_price_laos}}">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4"><label>địa chỉ chi tiết việt</label>
                <input class="form-control" name="detail_address" id="detail_address"
                       value="{{$doctor->detail_address}}">
            </div>
            <div class="col-sm-4"><label>địa chỉ chi tiết anh</label>
                <input class="form-control" name="detail_address_en" id="detail_address_en"
                       value="{{$doctor->detail_address_en}}">
            </div>
            <div class="col-sm-4"><label>địa chỉ chi tiết lào</label>
                <input class="form-control" name="detail_address_laos" id="detail_address_laos"
                       value="{{$doctor->detail_address_laos}}">
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
                @php
                    $district = \App\Models\District::find($doctor->district_id);
                @endphp
                <select name="district_id" id="district_id" class="form-control">
                    <option value="{{$district->id}}-{{$district->code}}"> {{$district->name}}</option>
                </select>
            </div>
            <div class="col-sm-4">
                <label for="commune_id">Xã</label>
                @php
                    $commune = \App\Models\Commune::find($doctor->commune_id);
                @endphp
                <select name="commune_id" id="commune_id" class="form-control">
                    <option value="{{$commune->id}}-{{$commune->code}}">{{$commune->name}}</option>
                </select>
            </div>
        </div>
        <div class="row">
            @php
                $working1 = $doctor->time_working_1;
                $arrayWorking1 = explode('-', $working1);

                $working2 = $doctor->time_working_2;
                $arrayWorking2 = explode('-', $working2);
            @endphp
            <div class="col-sm-3">
                <label for="time_working_1_start">Thời gian làm việc bắt đầu</label>
                <input type="time" class="form-control" id="time_working_1_start" name="time_working_1_start"
                       value="{{ $arrayWorking1[0] }}">
            </div>
            <div class="col-sm-3">
                <label for="time_working_1_end">Thời gian làm việc kết thúc</label>
                <input type="time" class="form-control" id="time_working_1_end" name="time_working_1_end"
                       value="{{ $arrayWorking1[1] }}">
            </div>
            <div class="col-sm-3">
                <label for="time_working_2_start">Những này làm việc bắt đầu</label>
                <select name="time_working_2_start" id="time_working_2_start" class="form-control">
                    <option {{ $arrayWorking2[0] == 'T2' ? 'selected' : '' }} value="T2">Thứ 2</option>
                    <option {{ $arrayWorking2[0] == 'T3' ? 'selected' : '' }}  value="T3">Thứ 3</option>
                    <option {{ $arrayWorking2[0] == 'T4' ? 'selected' : '' }}  value="T4">Thứ 4</option>
                    <option {{ $arrayWorking2[0] == 'T5' ? 'selected' : '' }}  value="T5">Thứ 5</option>
                    <option {{ $arrayWorking2[0] == 'T6' ? 'selected' : '' }}  value="T6">Thứ 6</option>
                    <option {{ $arrayWorking2[0] == 'T7' ? 'selected' : '' }}  value="T7">Thứ 7</option>
                    <option {{ $arrayWorking2[0] == 'CN' ? 'selected' : '' }}  value="CN">Chủ nhật</option>
                </select>
            </div>
            <div class="col-sm-3">
                <label for="time_working_2_end">Những này làm việc kết thúc</label>
                <select name="time_working_2_end" id="time_working_2_end" class="form-control">
                    <option {{ $arrayWorking2[1] == 'T2' ? 'selected' : '' }}  value="T2">Thứ 2</option>
                    <option {{ $arrayWorking2[1] == 'T3' ? 'selected' : '' }}  value="T3">Thứ 3</option>
                    <option {{ $arrayWorking2[1] == 'T4' ? 'selected' : '' }}  value="T4">Thứ 4</option>
                    <option {{ $arrayWorking2[1] == 'T5' ? 'selected' : '' }}  value="T5">Thứ 5</option>
                    <option {{ $arrayWorking2[1] == 'T6' ? 'selected' : '' }}  value="T6">Thứ 6</option>
                    <option {{ $arrayWorking2[1] == 'T7' ? 'selected' : '' }}  value="T7">Thứ 7</option>
                    <option {{ $arrayWorking2[1] == 'CN' ? 'selected' : '' }}  value="CN">Chủ nhật</option>
                </select>
            </div>

            <input type="text" class="form-control d-none" id="time_working_1" name="time_working_1">
            <input type="text" class="form-control d-none" id="time_working_2" name="time_working_2">
        </div>
        <div class="row">
            <div class="col-sm-4"><label>Số lượng đký tối đa</label>
                <label>thumbnail</label>
                <input type="file" class="form-control" id="thumbnail" name="thumbnail" multiple accept="image/*">
                @php
                    $galleryArray = explode(',', $doctor->thumbnail);
                @endphp
                @foreach($galleryArray as $productImg)
                    <img width="50px" src="{{$productImg}}">
                @endforeach
            </div>
            <div class="col-sm-4"><label for="department_id">Department</label>
                <select class="custom-select" id="department_id" name="department_id">
                    @foreach($departments as $department)
                        <option
                            {{ $department->id == $doctor->department_id ? 'selected' : ''}} value=" {{$department->id}}"> {{$department->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm-4"><label for="status">Trạng thái</label>
                <select class="custom-select" id="status" name="status">
                    <option
                        {{ $doctor->status == \App\Enums\DoctorInfoStatus::ACTIVE ? 'selected' : ''}}
                        value="{{ \App\Enums\DoctorInfoStatus::ACTIVE }}">
                        {{ \App\Enums\DoctorInfoStatus::ACTIVE }}
                    </option>
                    <option
                        {{ $doctor->status == \App\Enums\DoctorInfoStatus::INACTIVE ? 'selected' : ''}}
                        value="{{ \App\Enums\DoctorInfoStatus::INACTIVE }}">
                        {{ \App\Enums\DoctorInfoStatus::INACTIVE }}
                    </option>
                </select>
            </div>
        </div>

        <button type="button" class="btn btn-primary up-date-button mt-md-4">Lưu</button>
    </form>
    <script>
        const token = `{{ $_COOKIE['accessToken'] }}`;
        $(document).ready(function () {
            $('.up-date-button').on('click', function () {
                const headers = {
                    'Authorization': `Bearer ${token}`,
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                };
                const formData = new FormData();
                const fieldNames = [
                    "specialty", "specialty_en", "specialty_laos",
                    "service_price", "service_price_en", "service_price_laos",
                    "detail_address", "detail_address_en", "detail_address_laos",
                    "province_id", "district_id", "commune_id",
                    "time_working_1", "time_working_2", "hocham_hocvi",
                    "name", "year_of_experience", "status", "apply_for", "department_id", "created_by"
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
                const photo = $('#thumbnail')[0].files[0];
                formData.append('thumbnail', photo);
                formData.append('_token', '{{ csrf_token() }}');
                formData.append("user_id", '{{ \Illuminate\Support\Facades\Auth::user()->id }}');

                try {
                    $.ajax({
                        url: `{{route('api.backend.doctors.info.update.doctor', ['id' => $doctor->id])}}`,
                        method: 'post',
                        headers: headers,
                        contentType: false,
                        cache: false,
                        processData: false,
                        data: formData,
                        success: function () {
                            alert('success');
                            window.location.href = '{{route('homeAdmin.list.doctors')}}';
                        },
                        error: function (exception) {
                            console.log(exception);
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
                let province_id = `{{ $doctor->province_id }}`;
                let supHtml = '';
                if (province_id == data.id) {
                    supHtml = 'selected';
                }
                html = html + `<option ${supHtml} class="province province-item" data-code="${code}" value="${data.id}-${data.code}">${data.name}</option>`;
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
@endsection
