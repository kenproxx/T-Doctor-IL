@extends('layouts.admin')
@section('title')
    Create Business
@endsection
<link href="{{ asset('css/tabcreateclinics.css') }}" rel="stylesheet">
<style>

    * {
        box-sizing: border-box;
    }
    .dropdown {
        position: relative;
        margin-bottom: 20px;
    }
    .dropdown .dropdown-list {
        padding: 25px 20px;
        background: #fff;
        position: absolute;
        top: 50px;
        left: 0;
        right: 0;
        border: 1px solid rgba(0, 0, 0, .2);
        max-height: 223px;
        overflow-y: auto;
        background: #fff;
        display: none;
        z-index: 10;
    }
    .dropdown .checkbox {
        opacity: 0;
        transition: opacity 0.2s;
    }
    .dropdown .dropdown-label {
        display: block;
        height: 44px;
        font-size: 16px;
        line-height: 42px;
        background: #fff;
        border: 1px solid rgba(0, 0, 0, .2);
        padding: 0 40px 0 20px;
        cursor: pointer;
        position: relative;
    }
    .dropdown .dropdown-label:before {
        content: '▼';
        position: absolute;
        right: 20px;
        top: 50%;
        transform: translateY(-50%);
        transition: transform 0.25s;
        transform-origin: center center;
    }
    .dropdown.open .dropdown-list {
        display: block;
    }
    .dropdown.open .checkbox {
        transition: 2s opacity 2s;
        opacity: 1;
    }
    .dropdown.open .dropdown-label:before {
        transform: translateY(-50%) rotate(-180deg);
    }
    .checkbox {
        margin-bottom: 20px;
    }
    .checkbox:last-child {
        margin-bottom: 0;
    }
    .checkbox .checkbox-custom {
        display: none;
    }
    .checkbox .checkbox-custom-label {
        display: inline-block;
        position: relative;
        vertical-align: middle;
        cursor: pointer;
    }
    .checkbox .checkbox-custom + .checkbox-custom-label:before {
        content: '';
        background: transparent;
        display: inline-block;
        vertical-align: middle;
        margin-right: 10px;
        text-align: center;
        width: 12px;
        height: 12px;
        border: 1px solid rgba(0, 0, 0, .3);
        border-radius: 2px;
        margin-top: -2px;
    }
    .checkbox .checkbox-custom:checked + .checkbox-custom-label:after {
        content: '';
        position: absolute;
        top: 2px;
        left: 4px;
        height: 4px;
        padding: 2px;
        transform: rotate(45deg);
        text-align: center;
        border: solid #000;
        border-width: 0 2px 2px 0;
    }
    .checkbox .checkbox-custom-label {
        line-height: 16px;
        font-size: 16px;
        margin-right: 0;
        margin-left: 0;
        color: black;
    }


    .list-department,
    .list-symptoms,
    .list-service {
        list-style-type: none;
        padding: 0;
        margin: 0;
    }

    .list-department li,
    .list-symptoms li,
    .list-service li {
        margin-right: 20px; /* Adjust as needed */
    }

    .list-department li:last-child,
    .list-symptoms li:last-child,
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
    <h1 class="h3 mb-4 text-gray-800">{{ __('home.create') }}</h1>
    @if (session('success'))
        <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <form method="post" action="{{ route('api.backend.clinics.create') }}">
        @csrf
        @method('POST')

        <div>
            <div class="row">
                <div class="col-md-4">
                    <label for="name">{{ __('home.Name') }}</label>
                    <input type="text" class="form-control" id="name" name="name" required value="">
                </div>
                <div class="col-md-4">
                    <label for="name_en">{{ __('home.name_en') }}</label>
                    <input type="text" class="form-control" id="name_en" name="name_en" value="">
                </div>
                <div class="col-md-4">
                    <label for="name_laos">{{ __('home.name_laos') }}</label>
                    <input type="text" class="form-control" id="name_laos" name="name_laos" value="">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="phone">{{ __('home.PhoneNumber') }}</label>
                    <input type="number" class="form-control" id="phone" name="phone" required value="">
                </div>
                <div class="col-md-6">
                    <label for="email">{{ __('home.Email') }}</label>
                    <input type="email" class="form-control" id="email" name="email" required value="">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4"><label for="address_detail">{{ __('home.địa chỉ chi tiết việt') }}</label>
                    <input type="text" class="form-control" name="address_detail" id="address_detail" value="">
                </div>
                <div class="col-sm-4"><label for="detail_address_en">{{ __('home.địa chỉ chi tiết anh') }}</label>
                    <input type="text" class="form-control" name="address_detail_en" id="detail_address_en" value="">
                </div>
                <div class="col-sm-4"><label for="detail_address_laos">{{ __('home.địa chỉ chi tiết lào') }}</label>
                    <input type="text" class="form-control" name="address_detail_laos" id="detail_address_laos"
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
            <div>
                <label for="introduce">{{ __('home.introduce') }}</label>
                <input type="text" class="form-control" id="introduce" name="introduce" required
                       value="">
            </div>
            <div>
                <label>{{ __('home.gallery') }}</label>
                <input type="file" class="form-control" id="gallery" name="gallery[]" required multiple
                       accept="image/*">
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="status">{{ __('home.Status') }}</label>
                    <select class="form-select" id="status" name="status">
                        <option
                                value="{{ \App\Enums\ClinicStatus::ACTIVE }}">{{ \App\Enums\ClinicStatus::ACTIVE }}</option>
                        <option
                                value="{{ \App\Enums\ClinicStatus::INACTIVE }}">{{ \App\Enums\ClinicStatus::INACTIVE }}</option>
                        <option
                                value="{{ \App\Enums\ClinicStatus::DELETED }}">{{ \App\Enums\ClinicStatus::DELETED }}</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="time_work">{{ __('home.Time work') }}</label>
                    <select class="form-select" id="time_work" name="time_work">
                        <option value="{{\App\Enums\TypeTimeWork::ALL}}">{{\App\Enums\TypeTimeWork::ALL}}</option>
                        <option value="{{\App\Enums\TypeTimeWork::NONE}}">{{\App\Enums\TypeTimeWork::NONE}}</option>
                        <option
                                value="{{\App\Enums\TypeTimeWork::OFFICE_HOURS}}">{{\App\Enums\TypeTimeWork::OFFICE_HOURS}}</option>
                        <option
                                value="{{\App\Enums\TypeTimeWork::ONLY_AFTERNOON}}">{{\App\Enums\TypeTimeWork::ONLY_MORNING}}</option>
                        <option
                                value="{{\App\Enums\TypeTimeWork::ONLY_AFTERNOON}}">{{\App\Enums\TypeTimeWork::ONLY_AFTERNOON}}</option>
                        <option value="{{\App\Enums\TypeTimeWork::OTHER}}">{{\App\Enums\TypeTimeWork::OTHER}}</option>
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
                    @foreach($services as $service)
                        <li class="new-select">
                            <input onchange="getInputService();" class="service_clinic_item" value="{{$service->id}}"
                                   id="service_{{$service->id}}"
                                   name="service_clinic"
                                   type="checkbox">
                            <label for="service_{{$service->id}}">{{$service->name}}</label>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="form-group">
                <label for="department">{{ __('home.Department') }}</label>
                <input type="text" class="form-control" id="department" name="department_text" disabled>
                <ul class="list-department">
                    @foreach($departments as $department)
                        <li class="new-select">
                            <input onchange="getInputDepartment();" class="department_item" value="{{$department->id}}"
                                   id="department_{{$department->id}}"
                                   name="department"
                                   type="checkbox">
                            <label for="department_{{$department->id}}">{{$department->name}}</label>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="form-group">
                <label for="symptom">{{ __('home.symptoms') }}</label>
                <input type="text" class="form-control" id="symptom" name="symptom" disabled>
                <ul class="list-symptoms">
                    @foreach($symptoms as $symptom)
                        <li class="new-select">
                            <input onchange="getInputSymptom();" class="symptom_item" value="{{$symptom->id}}"
                                   id="symptom_{{$symptom->id}}"
                                   name="symptom"
                                   type="checkbox">
                            <label for="symptom_{{$symptom->id}}">{{$symptom->name}}</label>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <label for="open_date">{{ __('home.open_date') }}</label>
                    <input type="datetime-local" class="form-control" id="open_date" name="open_date" required value="">
                </div>
                <div class="col-md-4">
                    <label for="close_date">{{ __('home.close_date') }}</label>
                    <input type="datetime-local" class="form-control" id="close_date" name="close_date" value="">
                </div>
                <div class="col-md-4">
                    <label for="type">{{ __('home.type') }}</label>
                    <select class="form-select" id="type" name="type">
                        <option
                                value="{{\App\Enums\TypeBusiness::CLINICS}}">{{\App\Enums\TypeBusiness::CLINICS}}</option>
                        <option
                                value="{{\App\Enums\TypeBusiness::PHARMACIES}}">{{\App\Enums\TypeBusiness::PHARMACIES}}</option>
                        <option
                                value="{{\App\Enums\TypeBusiness::HOSPITALS}}">{{\App\Enums\TypeBusiness::HOSPITALS}}</option>
                    </select>
                </div>

                <div hidden="">
                    <input type="text" name="combined_address" id="combined_address" class="form-control">
                    <input type="text" name="longitude" id="longitude" class="form-control">
                    <input type="text" name="latitude" id="latitude" class="form-control">
                    <input type="text" name="clinics_service" id="clinics_service" class="form-control">

                    <label for="departments"></label><input type="text" name="departments" id="departments"
                                                            class="form-control">
                    <label for="symptoms"></label><input type="text" name="symptoms" id="symptoms"
                                                         class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-element">
                        <input name="emergency" id="emergency" type="checkbox" value="1">
                        <label for="emergency">Is there an emergency room?</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-element">
                        <input name="insurance" id="insurance" type="checkbox" value="1">
                        <label for="insurance">Is health insurance applicable?</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-element">
                        <input name="parking" id="parking" type="checkbox" value="1">
                        <label for="parking">Is there parking??</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-element">
                        <label for="costs">Medical examination costs?</label>
                        <input name="costs" id="costs" type="number" placeholder="Nhập chi khám chữa bệnh trung bình">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label for="information">Hospital information</label>
                    <div class="dropdown" data-target="hospital_information">
                        <label class="dropdown-label">Select Options</label>
                        <input type="hidden" name="hospital_information" id="hospital_information" />
                        <div class="dropdown-list">
                            <div class="checkbox">
                                <input type="checkbox" name="dropdown-group" class="check checkbox-custom" id="checkbox-custom_01"/>
                                <label for="checkbox-custom_01" class="checkbox-custom-label">Pediatric examination/treatment</label>
                            </div>

                            <div class="checkbox">
                                <input type="checkbox" name="dropdown-group" class="check checkbox-custom" id="checkbox-custom_02"/>
                                <label for="checkbox-custom_02" class="checkbox-custom-label">Emergency department</label>
                            </div>

                            <div class="checkbox">
                                <input type="checkbox" name="dropdown-group" class="check checkbox-custom" id="checkbox-custom_03"/>
                                <label for="checkbox-custom_03" class="checkbox-custom-label">Female doctor</label>
                            </div>

                            <div class="checkbox">
                                <input type="checkbox" name="dropdown-group" class="check checkbox-custom" id="checkbox-custom_04"/>
                                <label for="checkbox-custom_04" class="checkbox-custom-label">Specialized hospital</label>
                            </div>

                            <div class="checkbox">
                                <input type="checkbox" name="dropdown-group" class="check checkbox-custom" id="checkbox-custom_05"/>
                                <label for="checkbox-custom_05" class="checkbox-custom-label">Check health certificate</label>
                            </div>

                            <div class="checkbox">
                                <input type="checkbox" name="dropdown-group" class="check checkbox-custom" id="checkbox-custom_06"/>
                                <label for="checkbox-custom_06" class="checkbox-custom-label">Physical examination</label>
                            </div>

                            <div class="checkbox">
                                <input type="checkbox" name="dropdown-group" class="check checkbox-custom" id="checkbox-custom_06"/>
                                <label for="checkbox-custom_06" class="checkbox-custom-label">Rapid antigen test</label>
                            </div>

                            <div class="checkbox">
                                <input type="checkbox" name="dropdown-group" class="check checkbox-custom" id="checkbox-custom_07"/>
                                <label for="checkbox-custom_07" class="checkbox-custom-label">PCR test</label>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <div class="row">
                <div class="col-md-12">
                    <label for="information">Hospital facilities</label>
                    <div class="dropdown" data-target="hospital_facilities">
                        <label class="dropdown-label">Select Options</label>
                        <input type="hidden" name="hospital_facilities" id="hospital_facilities" />
                        <div class="dropdown-list">
                            <div class="checkbox">
                                <input type="checkbox" name="dropdown-group" class="check checkbox-custom" id="checkbox-custom_21"/>
                                <label for="checkbox-custom_21" class="checkbox-custom-label">Intensive care unit</label>
                            </div>

                            <div class="checkbox">
                                <input type="checkbox" name="dropdown-group" class="check checkbox-custom" id="checkbox-custom_22"/>
                                <label for="checkbox-custom_22" class="checkbox-custom-label">General hospital room</label>
                            </div>

                            <div class="checkbox">
                                <input type="checkbox" name="dropdown-group" class="check checkbox-custom" id="checkbox-custom_23"/>
                                <label for="checkbox-custom_23" class="checkbox-custom-label">High-class hospital room</label>
                            </div>

                            <div class="checkbox">
                                <input type="checkbox" name="dropdown-group" class="check checkbox-custom" id="checkbox-custom_24"/>
                                <label for="checkbox-custom_24" class="checkbox-custom-label">Surgery room</label>
                            </div>

                            <div class="checkbox">
                                <input type="checkbox" name="dropdown-group" class="check checkbox-custom" id="checkbox-custom_25"/>
                                <label for="checkbox-custom_25" class="checkbox-custom-label">Emergency room</label>
                            </div>

                            <div class="checkbox">
                                <input type="checkbox" name="dropdown-group" class="check checkbox-custom" id="checkbox-custom_26"/>
                                <label for="checkbox-custom_26" class="checkbox-custom-label">Physiotherapy room</label>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-12">
                    <label for="information">Hospital equipment</label>
                    <div class="dropdown" data-target="hospital_equipment">
                        <label class="dropdown-label">Select Options</label>
                        <input type="hidden" name="hospital_equipment" id="hospital_equipment" />
                        <div class="dropdown-list">

                            <div class="checkbox">
                                <input type="checkbox" name="dropdown-group" class="check checkbox-custom" id="checkbox-custom_27"/>
                                <label for="checkbox-custom_27" class="checkbox-custom-label">CT</label>
                            </div>

                            <div class="checkbox">
                                <input type="checkbox" name="dropdown-group" class="check checkbox-custom" id="checkbox-custom_28"/>
                                <label for="checkbox-custom_28" class="checkbox-custom-label">MRI</label>
                            </div>

                            <div class="checkbox">
                                <input type="checkbox" name="dropdown-group" class="check checkbox-custom" id="checkbox-custom_29"/>
                                <label for="checkbox-custom_29" class="checkbox-custom-label">Bone density meter</label>
                            </div>

                            <div class="checkbox">
                                <input type="checkbox" name="dropdown-group" class="check checkbox-custom" id="checkbox-custom_30"/>
                                <label for="checkbox-custom_30" class="checkbox-custom-label">Positron tomography (PET)</label>
                            </div>

                            <div class="checkbox">
                                <input type="checkbox" name="dropdown-group" class="check checkbox-custom" id="checkbox-custom_31"/>
                                <label for="checkbox-custom_31" class="checkbox-custom-label">Tumor treatment device (CYBER KNIFE)</label>
                            </div>


                            <div class="checkbox">
                                <input type="checkbox" name="dropdown-group" class="check checkbox-custom" id="checkbox-custom_33"/>
                                <label for="checkbox-custom_33" class="checkbox-custom-label">Ultrasound imaging equipment</label>
                            </div>

                            <div class="checkbox">
                                <input type="checkbox" name="dropdown-group" class="check checkbox-custom" id="checkbox-custom_32"/>
                                <label for="checkbox-custom_32" class="checkbox-custom-label">Tumor treatment devices (proton therapy devices)</label>
                            </div>

                            <div class="checkbox">
                                <input type="checkbox" name="dropdown-group" class="check checkbox-custom" id="checkbox-custom_34"/>
                                <label for="checkbox-custom_34" class="checkbox-custom-label">Artificial kidney equipment for hemodialysis</label>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <button type="button" class="btn btn-primary up-date-button mt-4">{{ __('home.Save') }}</button>
        </div>
    </form>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDe6qi9czJ2Z6SLnV9sSUzce0nuzhRm3hg"></script>
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

                formData.append("departments", $('#departments').val());
                formData.append("symptoms", $('#symptoms').val());
                formData.append("emergency", $('#emergency').val());
                formData.append("insurance", $('#insurance').val());
                formData.append("parking", $('#parking').val());
                formData.append("facilities", $('#hospital_facilities').val());
                formData.append("equipment", $('#hospital_equipment').val());
                formData.append("information", $('#hospital_information').val());
                formData.append("costs", $('#costs').val());

                var filedata = document.getElementById("gallery");
                var i = 0, len = filedata.files.length, img, reader, file;
                for (i; i < len; i++) {
                    file = filedata.files[i];
                    formData.append('gallery[]', file);
                }
                try {
                    $.ajax({
                        url: `{{route('api.backend.clinics.create')}}`,
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

        function getInputService() {
            let items = document.getElementsByClassName('service_clinic_item');

            arrayItem = checkArray(arrayItem, items);
            arrayNameCategory = getListName(arrayNameCategory, items)

            let listName = arrayNameCategory.toString();

            if (listName) {
                $('#service_clinic').val(listName);
            }

            arrayItem.sort();
            let value = arrayItem.toString();
            $('#clinics_service').val(value);
        }

        let arrayDepartment = [];
        let arrayNameDepartment = [];
        function getInputDepartment() {
            let items = document.getElementsByClassName('department_item');

            arrayDepartment = checkArray(arrayDepartment, items);
            arrayNameDepartment = getListName(arrayNameDepartment, items)

            let listName = arrayNameDepartment.toString();
            if (listName) {
                $('#department').val(listName);
            }

            arrayDepartment.sort();
            let value = arrayDepartment.toString();
            $('#departments').val(value);
        }

        let arraySymptom = [];
        let arrayNameSymptom = [];
        function getInputSymptom() {
            let items = document.getElementsByClassName('symptom_item');

            arraySymptom = checkArray(arraySymptom, items);
            arrayNameSymptom = getListName(arrayNameSymptom, items)

            let listName = arrayNameSymptom.toString();

            if (listName) {
                $('#symptom').val(listName);
            }

            arraySymptom.sort();
            let value = arraySymptom.toString();
            console.log(value)
            $('#symptoms').val(value);
        }
    </script>
    <script>
        function checkboxDropdown(el, targetInputId) {
            var $el = $(el);

            function updateHiddenInputValues($dropdown, targetInputId) {
                var result = [];
                var $label = $dropdown.find('.dropdown-label');
                $dropdown.find('.check:checked').each(function () {
                    var labelText = $(this).next('.checkbox-custom-label').text().trim();
                    result.push(labelText);
                });
                $('#' + targetInputId).val(result.join(', '));
            }

            function updateStatus($dropdown) {
                var $label = $dropdown.find('.dropdown-label');
                updateHiddenInputValues($dropdown, $dropdown.attr('data-target'));
                if (!$label.text().trim()) {
                    $label.html('Select Options');
                }
            }

            $el.each(function () {
                var $dropdown = $(this),
                    $label = $dropdown.find('.dropdown-label'),
                    $checkAll = $dropdown.find('.check-all'),
                    $inputs = $dropdown.find('.check');

                $label.on('click', () => {
                    $dropdown.toggleClass('open');
                });

                $checkAll.on('change', function () {
                    var checked = $(this).is(':checked');
                    $inputs.prop('checked', checked);
                    updateStatus($dropdown);
                });

                $inputs.on('change', function () {
                    updateStatus($dropdown);
                });

                $(document).on('click touchstart', e => {
                    if (!$(e.target).closest($dropdown).length) {
                        $dropdown.removeClass('open');
                    }
                });
            });
        }

        checkboxDropdown('.dropdown[data-target="hospital_information"]', 'hospital_information');
        checkboxDropdown('.dropdown[data-target="hospital_facilities"]', 'hospital_facilities');
        checkboxDropdown('.dropdown[data-target="hospital_equipment"]', 'hospital_equipment');
    </script>







@endsection
