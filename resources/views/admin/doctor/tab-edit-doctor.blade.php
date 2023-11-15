@extends('layouts.admin')

@section('main-content')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Edit Coupon</h1>
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
        <div><label for="year_of_experience">Năm kinh nghiệm</label>
            <input class="form-control" type="number" id="year_of_experience" name="year_of_experience"
                   value="{{$doctor->year_of_experience}}"></div>
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
                <input class="form-control" type="number" name="service_price" id="service_price" value="{{$doctor->service_price}}">
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
            <div class="col-sm-4"><label>Tỉnh</label>
                <input class="form-control" type="number" name="province_id" id="province_id" VALUE="{{$doctor->province_id}}">
            </div>
            <div class="col-sm-4"><label>Quận</label>
                <input class="form-control" type="number" name="district_id" id="district_id" value="{{$doctor->district_id}}">
            </div>
            <div class="col-sm-4"><label>Xã</label>
                <input class="form-control" type="number" name="commune_id" id="commune_id" value="{{$doctor->commune_id}}">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6"><label>Thời gian làm việc từ</label>
                <input type="text" class="form-control" id="time_working_1" name="time_working_1"
                       value="{{$doctor->time_working_1}}"></div>
            <div class="col-sm-6"><label>Những này làm việc</label>
                <input type="text" class="form-control" id="time_working_2" name="time_working_2"
                       value="{{$doctor->time_working_2}}"></div>
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
            <div class="col-sm-4"><label for="department">Department</label>
                <select class="custom-select" id="department_id" name="department_id">
                    @foreach($departments as $department)
                        <option
                            {{ $department->id == $doctor->department_id ? 'selected' : ''}} value=" {{$department->id}}"> {{$department->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm-4"><label>Trạng thái</label>
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
                    "time_working_1", "time_working_2",
                    "name", "year_of_experience", "status", "apply_for", "department_id"
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
        })
    </script>
@endsection
