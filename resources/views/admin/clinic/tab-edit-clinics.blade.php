@extends('layouts.admin')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDQO5YhrnYxyI215uOX9bNQ-_xxV_stGf8&callback=initMap"></script>
@section('main-content')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Edit') }}</h1>
    <form method="post" action="{{ route('api.backend.clinics.update', ['id' => $clinics->id]) }}">
        @csrf
        @method('POST')

        <div>
            <div class="row">
                <div class="col-md-4">
                    <label>name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{$clinics->name}}">
                </div>
                <div class="col-md-4">
                    <label>name_en</label>
                    <input type="text" class="form-control" id="name_en" name="name_en" value="{{$clinics->name_en}}">
                </div>
                <div class="col-md-4">
                    <label>name_laos</label>
                    <input type="text" class="form-control" id="name_laos" name="name_laos" value="{{$clinics->name_laos}}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label>phone</label>
                    <input type="number" class="form-control" id="phone" name="phone" required value="{{$clinics->phone}}">
                </div>
                <div class="col-md-6">
                    <label>email</label>
                    <input type="email" class="form-control" id="email" name="email" required value="{{$clinics->email}}">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4"><label for="address_detail">địa chỉ chi tiết việt</label>
                    <input type="text" class="form-control" name="address_detail" id="address_detail" value="{{$clinics->address_detail}}">
                </div>
                <div class="col-sm-4"><label for="address_detail_en">địa chỉ chi tiết anh</label>
                    <input type="text" class="form-control" name="address_detail_en" id="detail_address_en" value="{{$clinics->address_detail_en}}">
                </div>
                <div class="col-sm-4"><label for="address_detail_laos">địa chỉ chi tiết lào</label>
                    <input type="text" class="form-control" name="address_detail_laos" id="detail_address_laos" value="{{$clinics->address_detail_laos}}">
                </div>
            </div>
            <div class="row">
                @php
                    $combinedAddress = $clinics->address; // Thay bằng giá trị thực tế của bạn
                    $addressParts = explode(',', $combinedAddress);
                    $detailAddress = $addressParts[0];
                    $codeProvince = $addressParts[1];
                    $codeDistrict = $addressParts[2];
                    $codeCommune = $addressParts[3];
                @endphp
                <div class="col-sm-4">
                    <label for="province_id">Tỉnh</label>
                    <select name="province_id" id="province_id" class="form-control">

                    </select>
                </div>
                <div class="col-sm-4">
                    <label for="district_id">Quận</label>
                    @php
                        $district = \App\Models\District::find($codeDistrict);
                    @endphp
                    <select name="district_id" id="district_id" class="form-control">
                        <option value="{{$district->id}}-{{$district->code}}"> {{$district->name}}</option>

                    </select>
                </div>
                <div class="col-sm-4">
                    <label for="commune_id">Xã</label>
                    @php
                        $commune = \App\Models\Commune::find($codeCommune);
                    @endphp
                    <select name="commune_id" id="commune_id" class="form-control">
                        <option value="{{$commune->id}}-{{$commune->code}}">{{$commune->name}}</option>

                    </select>
                </div>
            </div>
            <div>
                <label>introduce</label>
                <input type="text" class="form-control" id="introduce" name="introduce" required
                       value="{{$clinics->introduce}}">
            </div>
            <div>
                <label>gallery</label>
                <input type="file" class="form-control" id="gallery" name="gallery" multiple>
                @php
                    $galleryArray = explode(',', $clinics->gallery);
                @endphp
                @foreach($galleryArray as $productImg)
                    <img width="50px" src="{{$productImg}}">
                @endforeach
            </div>
            <div>
                <label for="status">status</label>
                <select class="custom-select" id="status" name="status">
                    <option
                        value="{{ \App\Enums\ClinicStatus::ACTIVE }}">{{ \App\Enums\ClinicStatus::ACTIVE }}</option>
                    <option
                        value="{{ \App\Enums\ClinicStatus::INACTIVE }}">{{ \App\Enums\ClinicStatus::INACTIVE }}</option>
                    <option
                        value="{{ \App\Enums\ClinicStatus::DELETED }}">{{ \App\Enums\ClinicStatus::DELETED }}</option>
                </select>
            </div>
            <div hidden="">
                <label>User</label>
                <input type="text" class="form-control" id="user_id" name="user_id" value="{{Auth::user()->id}}">
            </div>
            <div>
                <label>open_date</label>
                <input type="datetime-local" class="form-control" id="open_date" name="open_date" required value="{{$clinics->open_date}}">
            </div>
            <div>
                <label>close_date</label>
                <input type="datetime-local" class="form-control" id="close_date" name="close_date" value="{{$clinics->close_date}}">
            </div>
            <div hidden="">
                <input type="text" name="combined_address" id="combined_address" class="form-control">
                <input type="text" name="longitude" id="longitude" class="form-control">
                <input type="text" name="latitude" id="latitude" class="form-control">
            </div>
        </div>
        <button type="button" class="btn btn-primary up-date-button mt-4">Lưu</button>
    </form>
    <script>
        $(document).ready(function () {
            // Lắng nghe sự kiện onchange của các dropdown tỉnh, huyện, xã
            $('#province_id, #district_id, #commune_id').on('change', function () {
                // Gọi hàm để lưu địa chỉ khi có sự thay đổi
                saveAddressOnChange();
            });

            function saveAddressOnChange() {
                // Lấy giá trị từ các dropdown
                var provinceId = $('#province_id').val();
                var codeProvinceId = getCodeFromValue(provinceId);

                var districtId = $('#district_id').val();
                var codeDistrictId = getCodeFromValue(districtId);

                var communeId = $('#commune_id').val();
                var codeCommuneId = getCodeFromValue(communeId);

                // Lấy địa chỉ chi tiết từ input
                var detailAddress = $('#address_detail').val();

                // Gộp các giá trị vào một chuỗi cách nhau bởi dấu phẩy
                var combinedAddress = [ codeProvinceId, codeDistrictId, codeCommuneId, detailAddress].join(',');
                // Gán giá trị vào input ẩn
                console.log(combinedAddress)
                $('#combined_address').val(combinedAddress);
                addNewAddress();
            }

            function getCodeFromValue(value) {
                // Hàm này nhận một giá trị của dropdown và trả về mã code nếu có
                if (value) {
                    let myArray = value.split('-');
                    return myArray.length > 2 ? myArray[2] : '';
                }
                return '';
            }
        });

    </script>
    <script>
        const token = `{{ $_COOKIE['accessToken'] }}`;
        $(document).ready(function () {
            $('.up-date-button').on('click', function () {
                const headers = {
                    'Authorization': `Bearer ${token}`
                };
                let province = $('#province_id').val();
                let myProvince = province.split('-');

                let district = $('#district_id').val();
                let myDistrict = district.split('-');

                let commune = $('#commune_id').val();
                let myCommune = commune.split('-');

                const formData = new FormData();
                formData.append("name", $('#name').val());
                formData.append("name_en", $('#name_en').val());
                formData.append("phone", $('#phone').val());
                formData.append("email", $('#email').val());
                formData.append("combined_address", $('#combined_address').val());
                formData.append("longitude", $('#longitude').val());
                formData.append("latitude", $('#latitude').val());
                formData.append("address_detail", $('#address_detail').val());
                formData.append("address_detail_en", $('#detail_address_en').val());
                formData.append("province_id", myProvince[0]);
                formData.append("district_id", myDistrict[0]);
                formData.append("commune_id",myCommune[0]);
                formData.append("introduce", $('#introduce').val());
                formData.append("open_date", $('#open_date').val());
                formData.append("close_date", $('#close_date').val());
                formData.append("user_id", $('#user_id').val());
                formData.append("status", $('#status').val());

                var filedata = document.getElementById("gallery");
                var i = 0, len = filedata.files.length, img, reader, file;
                for (i; i < len; i++) {
                    file = filedata.files[i];
                    formData.append('gallery[]', file);
                }
                try {
                    $.ajax({
                        url: `{{route('api.backend.clinics.edit',$clinics->id)}}`,
                        method: 'POST',
                        headers: headers,
                        contentType: false,
                        cache: false,
                        processData: false,
                        data: formData,
                        success: function (response) {
                            alert('success');
                            window.location.href = `{{route('homeAdmin.list.clinics')}}`;
                        },
                        error: function (exception) {
                            console.log(exception)
                        }
                    });
                } catch (error) {
                    throw error;
                }
            })
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
            await $.ajax({
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
            await $.ajax({
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
            await $.ajax({
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
                html = html + `<option class="province province-item" data-code="${code}" value="${data.id}-${data.code}-${data.name}">${data.name}</option>`;
            }

            $('#province_id').empty().append(html);
        }

        function showAllDistricts(res) {
            let html = ``;
            for (let i = 0; i < res.length; i++) {
                let data = res[i];
                html = html + `<option class="district district-item" value="${data.id}-${data.code}-${data.name}">${data.name}</option>`;
            }
            $('#district_id').empty().append(html);
        }

        function showAllCommunes(res) {
            let html = ``;
            for (let i = 0; i < res.length; i++) {
                let data = res[i];
                html = html + `<option value="${data.id}-${data.code}-${data.name}">${data.name}</option>`;
            }
            $('#commune_id').empty().append(html);
        }

        function addNewAddress() {
            var newAddress = document.getElementById('combined_address').value;

            if (newAddress) {
                var geocoder = new google.maps.Geocoder();
                geocoder.geocode({'address': newAddress}, function (results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        var latitude = results[0].geometry.location.lat();
                        var longitude = results[0].geometry.location.lng();

                        if (!isNaN(latitude) && !isNaN(longitude)) {
                            $('#latitude').val(latitude);
                            $('#longitude').val(longitude);
                        } else {
                            console.error('Invalid coordinates:', latitude, longitude);
                            alert('Invalid coordinates. Please try again.');
                        }
                    } else {
                        alert('Geocode was not successful for the following reason: ' + status);
                    }
                });
            }
        }
    </script>
@endsection
