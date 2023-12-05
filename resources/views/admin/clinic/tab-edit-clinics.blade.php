@extends('layouts.admin')
<style>
    .list-service {
        list-style-type: none;
        padding: 0;
        margin: 0;
        display: flex;
    }

    .list-service li {
        margin-right: 20px; /* Adjust as needed */
    }

    .list-service li:last-child {
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
    <h1 class="h3 mb-4 text-gray-800">{{ __('Edit') }}</h1>
    <form method="post" action="{{ route('api.backend.clinics.update', ['id' => $clinic->id]) }}">
        @csrf
        @method('POST')

        <div>
            <div class="row">
                <div class="col-md-4">
                    <label for="name">{{ __('home.Name') }}</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{$clinic->name}}">
                </div>
                <div class="col-md-4">
                    <label for="name_en">{{ __('home.name_en') }}</label>
                    <input type="text" class="form-control" id="name_en" name="name_en" value="{{$clinic->name_en}}">
                </div>
                <div class="col-md-4">
                    <label for="name_laos">{{ __('home.name_laos') }}</label>
                    <input type="text" class="form-control" id="name_laos" name="name_laos"
                           value="{{$clinic->name_laos}}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="phone">{{ __('home.PhoneNumber') }}</label>
                    <input type="number" class="form-control" id="phone" name="phone" required
                           value="{{$clinic->phone}}">
                </div>
                <div class="col-md-6">
                    <label for="email">{{ __('home.Email') }}</label>
                    <input type="email" class="form-control" id="email" name="email" required
                           value="{{$clinic->email}}">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4"><label for="address_detail">{{ __('home.địa chỉ chi tiết việt') }}</label>
                    <input type="text" class="form-control" name="address_detail" id="address_detail"
                           value="{{$clinic->address_detail}}">
                </div>
                <div class="col-sm-4"><label for="address_detail_en">{{ __('home.địa chỉ chi tiết anh') }}</label>
                    <input type="text" class="form-control" name="address_detail_en" id="address_detail_en"
                           value="{{$clinic->address_detail_en}}">
                </div>
                <div class="col-sm-4"><label for="address_detail_laos">{{ __('home.địa chỉ chi tiết lào') }}</label>
                    <input type="text" class="form-control" name="address_detail_laos" id="address_detail_laos"
                           value="{{$clinic->address_detail_laos}}">
                </div>
            </div>
            <div class="row">
                @php
                    $combinedAddress = $clinic->address; // Thay bằng giá trị thực tế của bạn
                    $addressParts = explode(',', $combinedAddress);
                    $detailAddress = $addressParts[0];
                    $codeProvince = $addressParts[1];
                    $codeDistrict = $addressParts[2];
                    $codeCommune = $addressParts[3];
                @endphp
                <div class="col-sm-4">
                    <label for="province_id">{{ __('home.Tỉnh') }}</label>
                    <select name="province_id" id="province_id" class="form-control">

                    </select>
                </div>
                <div class="col-sm-4">
                    <label for="district_id">{{ __('home.Quận') }}</label>
                    @php
                        $district = \App\Models\District::find($codeDistrict);
                    @endphp
                    <select name="district_id" id="district_id" class="form-control">
                        @if($district)
                            <option value="{{$district->id}}-{{$district->code}}"> {{$district->name}}</option>
                        @endif

                    </select>
                </div>
                <div class="col-sm-4">
                    <label for="commune_id">{{ __('home.Xã') }}</label>
                    @php
                        $commune = \App\Models\Commune::find($codeCommune);
                    @endphp
                    <select name="commune_id" id="commune_id" class="form-control">
                        @if($commune)
                            <option value="{{$commune->id}}-{{$commune->code}}">{{$commune->name}}</option>
                        @endif

                    </select>
                </div>
            </div>
            <div>
                <label for="introduce">{{ __('home.introduce') }}</label>
                <input type="text" class="form-control" id="introduce" name="introduce" required
                       value="{{$clinic->introduce}}">
            </div>
            <div>
                <label>{{ __('home.gallery') }}</label>
                <input type="file" class="form-control" id="gallery" name="gallery" multiple>
                @php
                    $galleryArray = explode(',', $clinic->gallery);
                @endphp
                @foreach($galleryArray as $productImg)
                    <img width="50px" src="{{$productImg}}" alt="">
                @endforeach
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="status">{{ __('home.Status') }}</label>
                    <select class="custom-select" id="status" name="status">
                        <option
                                value="{{ \App\Enums\ClinicStatus::ACTIVE }}" {{ $clinic->status === \App\Enums\ClinicStatus::ACTIVE ? 'selected' : '' }}>{{ \App\Enums\ClinicStatus::ACTIVE }}</option>
                        <option
                                value="{{ \App\Enums\ClinicStatus::INACTIVE }}" {{ $clinic->status === \App\Enums\ClinicStatus::INACTIVE ? 'selected' : '' }}>{{ \App\Enums\ClinicStatus::INACTIVE }}</option>
                        <option
                                value="{{ \App\Enums\ClinicStatus::DELETED }}" {{ $clinic->status === \App\Enums\ClinicStatus::DELETED ? 'selected' : '' }}>{{ \App\Enums\ClinicStatus::DELETED }}</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="time_work">{{ __('home.Time work') }}</label>
                    <select class="custom-select" id="time_work" name="time_work">
                        @foreach($types as $type)
                            <option
                                    {{ $type == $clinic->time_work ? 'selected' : ''}} value="{{ $type }}">{{ $type }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div hidden="">
                <label for="user_id">{{ __('home.Username') }}</label>
                <input type="text" class="form-control" id="user_id" name="user_id" value="{{Auth::user()->id}}">
            </div>
            <div class="form-group">
                <label for="service_clinic">{{ __('home.Service Clinics') }}</label>
                <input type="text" class="form-control" id="service_clinic" name="service_clinic" disabled>
                <ul class="list-service">
                    @php
                        $arrayService = explode(',', $clinic->service_id);
                    @endphp
                    @foreach($services as $service)

                        <li class="new-select">
                            <input onchange="getInput();" class="service_clinic_item" value="{{$service->id}}"
                                   id="service_{{$service->id}}"
                                   name="service_clinic"
                                   {{ in_array($service->id, $arrayService) ? 'checked' : '' }}
                                   type="checkbox">
                            <label for="service_{{$service->id}}">{{$service->name}}</label>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label for="open_date">{{ __('home.open_date') }}</label>
                    <input type="datetime-local" class="form-control" id="open_date" name="open_date" required
                           value="{{$clinic->open_date}}">
                </div>
                <div class="col-md-4">
                    <label for="close_date">{{ __('home.close_date') }}</label>
                    <input type="datetime-local" class="form-control" id="close_date" name="close_date"
                           value="{{$clinic->close_date}}">
                </div>
                <div class="col-md-4">
                    <label for="type">{{ __('home.type') }}</label>
                    <select class="type-select form-control" id="type" name="time_work">
                        <option
                                value="{{\App\Enums\TypeBusiness::CLINICS}}" {{ $clinic->type === \App\Enums\TypeBusiness::CLINICS ? 'selected' : '' }}>{{\App\Enums\TypeBusiness::CLINICS}}</option>
                        <option
                                value="{{\App\Enums\TypeBusiness::PHARMACIES}}" {{ $clinic->type === \App\Enums\TypeBusiness::PHARMACIES ? 'selected' : '' }}>{{\App\Enums\TypeBusiness::PHARMACIES}}</option>
                        <option
                                value="{{\App\Enums\TypeBusiness::HOSPITALS}}" {{ $clinic->type === \App\Enums\TypeBusiness::HOSPITALS ? 'selected' : '' }}>{{\App\Enums\TypeBusiness::HOSPITALS}}</option>
                    </select>
                </div>

                <div hidden="">
                    <label for="combined_address"></label><input type="text" name="combined_address"
                                                                 id="combined_address" class="form-control">
                    <label for="longitude"></label><input type="text" name="longitude" id="longitude"
                                                          class="form-control">
                    <label for="latitude"></label><input type="text" name="latitude" id="latitude" class="form-control">
                    <label for="clinics_service"></label><input type="text" name="clinics_service" id="clinics_service"
                                                                class="form-control">
                </div>
            </div>
            <button type="button" class="btn btn-primary up-date-button mt-4">{{ __('home.Save') }}</button>
        </div>
    </form>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
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
                var combinedAddress = [detailAddress, codeCommuneId, codeDistrictId, codeProvinceId, 'Việt Nam'].join(',');
                // Gán giá trị vào input ẩn
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
                let myProvince = [];
                if (province) {
                    myProvince = province.split('-');
                }

                let district = $('#district_id').val();
                let myDistrict = [];
                if (district) {
                    myDistrict = district.split('-');
                }

                let commune = $('#commune_id').val();
                let myCommune = [];
                if (commune) {
                    myCommune = commune.split('-');
                }


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
                formData.append("address_detail_laos", $('#detail_address_laos').val());
                formData.append("province_id", myProvince[0]);
                formData.append("district_id", myDistrict[0]);
                formData.append("commune_id", myCommune[0]);
                formData.append("introduce", $('#introduce').val());
                formData.append("open_date", $('#open_date').val());
                formData.append("close_date", $('#close_date').val());
                formData.append("user_id", $('#user_id').val());
                formData.append("time_work", $('#time_work').val());
                formData.append("type", $('#type').val());
                formData.append("status", $('#status').val());
                formData.append("clinics_service", $('#clinics_service').val());

                var filedata = document.getElementById("gallery");
                var i = 0, len = filedata.files.length, img, reader, file;
                for (i; i < len; i++) {
                    file = filedata.files[i];
                    formData.append('gallery[]', file);
                }
                try {
                    $.ajax({
                        url: `{{route('api.backend.clinics.edit',$clinic->id)}}`,
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
            })
        })
    </script>
    <script>
        let province_id;
        let list_address = `{{ $clinic->address }}`;
        console.log(list_address)
        let arrayAddress = list_address.split(',');
        var filtered = arrayAddress.filter(function (el) {
            return el != null;
        });
        if (filtered.length > 3) {
            province_id = filtered[1];
        } else {
            province_id = filtered[0];
        }

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
                let isCheck = '';
                if (province_id == data.id) {
                    isCheck = 'selected';
                }
                let code = data.code;
                html = html + `<option class="province province-item"  ${isCheck}  data-code="${code}" value="${data.id}-${data.code}-${data.name}">${data.name}</option>`;
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
                        }
                    }
                });
            }
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
            let items = document.getElementsByClassName('service_clinic_item');

            arrayItem = checkArray(arrayItem, items);
            arrayNameCategory = getListName(arrayNameCategory, items)

            let listName = arrayNameCategory.toString();

            if (listName) {
                $('#service_clinic').val(listName);
            }

            arrayItem.sort();
            let value = arrayItem.toString();
            console.log(value)
            $('#clinics_service').val(value);
        }

        getInput();
    </script>
@endsection
