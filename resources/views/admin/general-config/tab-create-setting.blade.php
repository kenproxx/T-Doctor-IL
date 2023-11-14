@extends('layouts.admin')

@section('main-content')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Create Doctor Information</h1>
    <form id="form" action="{{route('api.backend.setting.create')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-sm-6"><label>logo</label>
                <input type="file" class="form-control" id="logo" name="logo[]" multiple accept="image/*">
            </div>
            <div class="col-sm-6"><label>favicon</label>
                <input type="file" class="form-control" id="favicon" name="favicon[]" multiple accept="image/*">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6"><label>Banner quảng cáo</label>
                <input type="file" class="form-control" id="ad_banner_position" name="ad_banner_position[]" multiple accept="image/*">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4"><label>Mô tả việt</label>
                <textarea class="form-control" name="website_description" id="website_description"></textarea>
            </div>
            <div class="col-sm-4"><label>Mô tả anh</label>
                <textarea class="form-control" name="website_description_en" id="website_description_en"></textarea>
            </div>
            <div class="col-sm-4"><label>Mô tả lào</label>
                <textarea class="form-control" name="website_description_laos" id="website_description_laos"></textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4"><label>Địa chỉ</label>
                <input type="text" class="form-control" id="address" name="address"></div>
            <div class="col-sm-4"><label>email</label>
                <input type="email" class="form-control" id="email" name="email" value=""></div>
            <div class="col-sm-4"><label>số điện thoại</label>
                <input type="number" class="form-control" id="phone" name="phone"
                       value=""></div>
        </div>
        <div class="row">
            <div class="col-sm-4"><label>facebook</label>
                <input type="text" class="form-control" id="facebook" name="facebook"></div>
            <div class="col-sm-4"><label>twitter</label>
                <input type="text" class="form-control" id="twitter" name="twitter"></div>
            <div class="col-sm-4"><label>instagram</label>
                <input type="text" class="form-control" id="instagram" name="instagram"></div>
            <div class="col-sm-4"><label>zalo</label>
                <input type="text" class="form-control" id="zalo" name="zalo"></div>
            <div class="col-sm-4"><label>kakao</label>
                <input type="text" class="form-control" id="kakao" name="kakao"></div>
        </div>


        <button type="submit" class="btn btn-primary up-date-button mt-md-4">Lưu</button>
    </form>
{{--    <script>--}}

{{--        const token = `{{ $_COOKIE['accessToken'] }}`;--}}
{{--        $(document).ready(function () {--}}
{{--            $('.up-date-button').on('click', function () {--}}
{{--                const headers = {--}}
{{--                    'Authorization': `Bearer ${token}`--}}
{{--                };--}}
{{--                const formData = new FormData();--}}
{{--                const fieldNames = [--}}
{{--                    "specialty", "specialty_en", "specialty_laos",--}}
{{--                    "service_price", "service_price_en", "service_price_laos",--}}
{{--                    "detail_address", "detail_address_en", "detail_address_laos",--}}
{{--                    "province_id", "district_id", "commune_id",--}}
{{--                    "time_working_1", "time_working_2",--}}
{{--                    "name","year_of_experience", "status"--}}
{{--                ];--}}
{{--                const fieldTextareaTiny = [--}}
{{--                    "service", "service_en", "service_laos",--}}
{{--                ];--}}

{{--                fieldNames.forEach(fieldName => {--}}
{{--                    formData.append(fieldName, $(`#${fieldName}`).val());--}}
{{--                });--}}

{{--                fieldTextareaTiny.forEach(fieldTextarea => {--}}
{{--                    const content = tinymce.get(fieldTextarea).getContent();--}}
{{--                    formData.append(fieldTextarea, content);--}}
{{--                });--}}

{{--                formData.append("created_by", '{{ \Illuminate\Support\Facades\Auth::user()->id }}');--}}
{{--                formData.append("apply_for", 'doctor');--}}
{{--                const photo = $('#thumbnail')[0].files[0];--}}
{{--                formData.append('thumbnail', photo);--}}
{{--                formData.append('_token', '{{ csrf_token() }}');--}}

{{--                try {--}}
{{--                    $.ajax({--}}
{{--                        url: `{{route('api.backend.doctors.info.create')}}`,--}}
{{--                        method: 'POST',--}}
{{--                        headers: headers,--}}
{{--                        contentType: false,--}}
{{--                        cache: false,--}}
{{--                        processData: false,--}}
{{--                        data: formData,--}}
{{--                        success: function () {--}}
{{--                            alert('success');--}}
{{--                            window.location.href = '{{ route('homeAdmin.list.doctors') }}';--}}
{{--                        },--}}
{{--                        error: function (exception) {--}}
{{--                            console.log(exception)--}}
{{--                        }--}}
{{--                    });--}}
{{--                } catch (error) {--}}
{{--                    throw error;--}}
{{--                }--}}
{{--            })--}}
{{--        })--}}
{{--    </script>--}}
@endsection
